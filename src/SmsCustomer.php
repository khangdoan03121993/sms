<?php
namespace SmsCustomer;
use yii\queue\Queue;

class SmsCustomer implements \yii\queue\Job
{
    public $mobile;
    public $content;
    public $apikey;
    public $secretkey;
    public $brandname;
    public $typesms;

    public function smsCustomer($mobile, $content, $apikey, $secretkey, $brandname,$typesms){
        // Tạo mới một CURL
        $ch = curl_init();
        if($typesms == 2){
            $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$mobile.'&Content='.$content.'&ApiKey='.$apikey.'&SecretKey='.$secretkey.'&Brandname='.$brandname.'&SmsType='.$typesms;
        }else if($typesms == 4){
            $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$mobile.'&Content='.$content.'&ApiKey='.$apikey.'&SecretKey='.$secretkey.'&SmsType='.$typesms;
        }
        
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

    /**
     * @param Queue $queue which pushed and is handling the job
     */
    public function execute($queue)
    {
        $url = '';
        // Tạo mới một CURL
        $ch = curl_init();
        if($this->typesms == 2){
            $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$this->mobile.'&Content='.$this->content.'&ApiKey='.$this->apikey.'&SecretKey='.$this->secretkey.'&Brandname='.$this->brandname.'&SmsType='.$this->typesms;
        }else if($this->typesms == 4){
            $url = 'http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone='.$this->mobile.'&Content='.$this->content.'&ApiKey='.$this->apikey.'&SecretKey='.$this->secretkey.'&SmsType='.$this->typesms;
        }

        // Cấu hình cho CURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        
        // Thực thi CURL
        $result = [
            'mobile' => $this->mobile,
            'response' => curl_exec($ch)
        ];

        // Ngắt CURL, giải phóng
        curl_close($ch);

        return $result;
    }
}