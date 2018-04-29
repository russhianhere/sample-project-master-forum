<?



$json = json_decode(file_get_contents('php://input'), TRUE);


    $response = API::RegisterUser($json);

    return json_encode($response);







?>