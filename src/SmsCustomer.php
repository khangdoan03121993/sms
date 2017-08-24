<?php
namespace SmsCustomer;
class SmsCustomer
{
    public function smsCustomer($mobile, $content){
    	// Tạo mới một CURL
        $ch = curl_init();
        $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$mobile.'&Content='.$content.'&ApiKey=987F4671D6487060744C4E21FC0A90&SecretKey=EA6DFC765BCF3B9E23F35F84FDF2E1&SmsType=4';
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