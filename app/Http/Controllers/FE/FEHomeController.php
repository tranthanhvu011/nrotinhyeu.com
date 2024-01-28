<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\FE\Account;
use App\Models\FE\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FEHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = ForumPost::with(['user'])->orderBy('created_at', 'DESC');
        $items = $query->paginate(config('constants.items_per_page'));
        return view('fe.home', compact('items'));
    }
    
    public function dieuKhoang(){
        return view('fe.dieu-khoang');
    }
     public function suKienMoi(){
        return view('fe.su-kien-moi');
    }
     public function huongDanTanThu(){
        return view('fe.Huong-Dan-Tan-Thu');
    }
     public function linhThu(){
        return view('fe.LinhThu');
    }
     public function suKienX2(){
        return view('fe.event-august');
    }
     public function suKienNoel(){
        return view('fe.SuKienNoel');
    }
     public function halloween(){
        return view('fe.halloween');
    }
    public function supportNewbie(){
        return view('fe.support-newbie');
    }
    public function quyDoiThoiVang(){
        return view('fe.QuyDoi');
    }
    
    public function downloadGameAndroid(){
        return view('fe.download-game-android');
    }

    public function downloadGamePC(){
        return view('fe.download-game-pc');
    }

    public function downloadGameIOS(){
        return view('fe.download-game-ios');
    }
}
