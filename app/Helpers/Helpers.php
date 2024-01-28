<?php

use App\Models\FE\Account;
use Illuminate\Support\Facades\Session;

function getGoogleData($dataArray){
    $url = config('constants.google_url_captcha');
    $dataArray['secret'] = config('constants.google_secret_captcha');
	$ch = curl_init();
	$data = http_build_query($dataArray);
	$getUrl = $url."?".$data;
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $getUrl);
	curl_setopt($ch, CURLOPT_TIMEOUT, 80);
	 
	$response = curl_exec($ch);
	 
	if(curl_error($ch)){
		return 'Request Error:' . curl_error($ch);
	}
	else
	{
		return json_decode($response,true);
	}
	curl_close($ch);
}

function checkGoogleCaptcha($dataArray){
    $recaptchaResonse = getGoogleData($dataArray);
    $message = null;
    if(is_array($recaptchaResonse))
    {
        if($recaptchaResonse['success'] != 1 || !isset($recaptchaResonse['success']))
        {
            $message = _('Bạn không phải là người');
        }
    }
    return $message;
}

function putAccount($userData){
    Session::put('account', $userData);
}

function logoutAccount(){
    Session::flush();
}

function sendCard($data){
    $partner_key = config('constants.partner_key');
    $partner_id = config('constants.partner_id');
    $url = 'https://doithe1s.vn/chargingws/v2?sign='.md5($partner_key.$data['pin'].$data['serial']).'&telco='.$data['card_type'].'&code='.$data['pin'].'&serial='.$data['serial'].'&amount='.$data['card_amount'].'&request_id='.$data['trans_id'].'&partner_id='.$partner_id.'&command=charging'; //URL GET
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $results = curl_exec($ch);
    curl_close($ch);
    return json_decode($results, true);
}
