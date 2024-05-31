<?php

require '../inc/dbcon.php';


function getCustomerList(){
    global $conn;
    $query = "SELECT * FROM data_api";
    $query_run = mysqli_query($conn, $query);
if($query_run){
if(mysqli_num_rows($query_run) > 0){
    $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

    $data = [
      
        'data' => $res

    ];
    header("HTTP/1.0.200 data fetched");
    echo json_encode($data);

}
else{
    $data = [
        'status' => 404,
        'message' => $requestMethod, 'no data found',

    ];
    header("HTTP/1.0.404 no data found");
    return json_encode($data);
}
}

else{
    $data = [
        'status' => 500,
        'message' => $requestMethod, 'Method Not allowed',

    ];
    header("HTTP/1.0.500 internal server error");
    return json_encode($data);
}

}


?>