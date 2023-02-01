<?php

$API_KEY = "";

function device_reg() {
    global $API_KEY;
    if ($API_KEY == "") {
        throw new Exception("API key is required");
    }

    $headers = array(
        'x-api-key' => $API_KEY,
        'Content-Type' => 'application/json'
    );
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://tiktokapi.dev/device-reg",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array_map(function($key, $value) {
            return $key . ': ' . $value;
        }, array_keys($headers), $headers)
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true);
}

print_r(device_reg());

?>
