<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewCardRequest;
use App\Models\FE\Account;
use App\Models\FE\TransLog;
use Illuminate\Http\Request;
use Log, Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use TheSeer\Tokenizer\Token;
use Illuminate\Support\Str;

class FEAddCardController extends Controller
{
    public function getAddCard(){
        $cards_type = [
            'VIETTEL' => 'VIETTEL',
            'MOBIFONE' => 'MOBIFONE',
            'VINAPHONE' => 'VINAPHONE'
        ];
        $cards_amount = [
            10000 => number_format(10000, 0, ',', '.'),
            20000 => number_format(20000, 0, ',', '.'),
            30000 => number_format(30000, 0, ',', '.'),
            50000 => number_format(50000, 0, ',', '.'),
            100000 => number_format(100000, 0, ',', '.'),
            200000 => number_format(200000, 0, ',', '.'),
            300000 => number_format(300000, 0, ',', '.'),
            500000 => number_format(500000, 0, ',', '.'),
            1000000 => number_format(1000000, 0, ',', '.')
        ];
        return view('fe.add-card', compact('cards_type', 'cards_amount'));
    }

    public function createTransactionKey(){
        $key = Str::random(40);
        $transLog = TransLog::where('trans_id', $key)->first();
        if($transLog){
            return $this->createTransactionKey();
        }
        return $key;
    }

    public function postAddCard(AddNewCardRequest $request){
        try{
            $user = Auth::user();
            $data = $request->all();
            $data['trans_id'] = $this->createTransactionKey();
            $result = sendCard($data);
            $message = null;
            $status = null;
            if($result['status'] != 1 && $result['status'] != 99){
            $count = TransLog::where('name', $user->username)->where('status', '<>', 1)->whereDate('date', '>=', '2023-07-27')->count();
            if($count >= 100){
                    $message = 'Tài khoản của bạn đã bị khóa do nạp thẻ sai quá nhiều lần';
                    Account::find($user->account->id)->update([
                        'ban' => 1
                    ]);
                    Auth::logout();
                    Session::flush();
                    Session::flash('error', $message);
                    return redirect()->route('home');
                }
            }
            if($result['status'] == 100) {
                $status = TransLog::STATUS_ERROR;
                $message = $result['message'];
            }
            elseif($result['status'] == 1) {
                $status = TransLog::STATUS_SUCCESS;
                $message = 'Thẻ thành công đúng mệnh giá';
            }
            elseif($result['status'] == 2) {
                $status = TransLog::STATUS_WRONG_AMOUNT;
                $message = "Thẻ thành công sai mệnh giá";
            }
            elseif($result['status'] == 3) {
                $status = TransLog::STATUS_ERROR;
                $message = "Thẻ bị lỗi";
            }
            elseif($result['status'] == 4) {
                $status = TransLog::STATUS_SYSTEM_ERROR;
                $message = "Hệ thống bảo trì";
            }
            elseif($result['status'] == 99) {
                $status = TransLog::STATUS_PROCESSING;
                $message = "Thẻ chờ xử lý";
            }
            else{
                $status = TransLog::STATUS_ERROR;
                $message = "Thông tin thẻ không chính xác hoặc thẻ bị lỗi";
            }

            switch($status){
                case TransLog::STATUS_SUCCESS:
                    Session::flash('success', $message);
                    break;
                case TransLog::STATUS_PROCESSING:
                    Session::flash('warning', $message);
                    break;
                default:
                    Session::flash('error', $message);
                    break;
            }
            TransLog::create([
                'name' => $user->username,
                'trans_id' => $data['trans_id'],
                'amount' => $data['card_amount'],
                'pin' => $data['pin'],
                'seri' => $data['serial'],
                'type' => $data['card_type'],
                'status' => $status
            ]);
            return back();
        }catch(Exception $e){
            Log::error('FEAddCardController|postAddCard|' . $e->getMessage() . $e->getTraceAsString());
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

    public function cardCallback(Request $request){
        try{
            $res = $request->all();
            $partner_key = config('constants.partner_key');
            $partner_id = config('constants.partner_id');
            $callback_sign = md5($partner_key . $res['code'] . $res['serial']);
            if($callback_sign == $res['callback_sign']){
                $status = null;
                $transLog = TransLog::where('trans_id', $res['request_id'])->first();
                switch ($res['status']) {
                    case 1:
                        $status = TransLog::STATUS_SUCCESS;
                        if($transLog){
                            $tichdiem = $transLog->amount/1000;
                            $account = Account::where('username', $transLog->name)->first();
                            if($account){
                                $account->update([
                                    'vnd' => round($account->vnd + $transLog->amount),
                                    'tongnap' => round($account->tongnap + $transLog->amount),
                                    'tichdiemweb' => round($account->tichdiemweb + $tichdiem),
                                ]);
                            }
                        }
                        break;
                    case 2:
                        $status = TransLog::STATUS_ERROR;
                        break;
                    case 3:
                        $status = TransLog::STATUS_WRONG_AMOUNT;
                        break;
                    default:
                        $status = TransLog::STATUS_WRONG_AMOUNT;
                        break;
                }
                $transLog->update([
                    'status' => $status
                ]);
            }
        }catch(Exception $e){
            Log::error('FEAddCardController|cardCallback|' . $e->getMessage() . $e->getTraceAsString());
        }
    }

    public function addCardHistory(){
        $user = Auth::user();
        $query = TransLog::where('name', $user->username)->orderBy('date', 'desc');
        $items = $query->paginate(config('constants.items_per_page'));
        return view('fe.add-card-history', compact('items'));
    }
}
