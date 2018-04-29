<?

class SMS{

    private $api = "1D97EE07-94F3-61DE-9255-4089AA5686F4";

    public function SendSMS($phone,$text){

        $ch = curl_init("https://sms.ru/sms/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        "api_id" => $this->api,
        "to" => $phone,
        "msg" => $text,
        "json" => 1 // Для получения более развернутого ответа от сервера
        )));

        $response = curl_exec($ch);
        curl_close($ch);
        
        $json = json_decode ($response);

        return $json;

    }


    
}











?>