<?php
namespace SmsCustomer;
class SmsCustomer
{
    public function smsCustomer($mobile, $content){
    	// Tạo mới một CURL
        $ch = curl_init();
        $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$mobile.'&Content='.$content.'&ApiKey=D9F1E89642B6211F10B6C7C1D19EE4&SecretKey=82FDB880EE8AA46FE776B96999F1C8&Brandname=CSKH-SPA&SmsType=2';
        // Cấu hình cho CURL
        curl_setopt($ch, CURLOPT_URL, $url);

        // print_r(substr($headers[0], 9, 3));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        // Thực thi CURL
        $result = [
        			'mobile' => $mobile,
        			'response' => curl_exec($ch)
        			];

        // Ngắt CURL, giải phóng
        curl_close($ch);

        return $result;
    }
}