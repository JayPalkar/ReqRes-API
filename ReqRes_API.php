<?php
//Task 1
$url = "https://reqres.in/api/users";
$data = array(
    "name" => "morpheus",
    "job" => "leader"
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);

$context  = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    echo "Error creating user.\n";
} else {
    echo "<h3>Create User using POST</h3>";
    $formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
    echo "<pre>" . $formatted_response . "</pre>";
}

//Task 2
$url = "https://reqres.in/api/users/10";
$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Error fetching user.\n";
} else {
    echo "<h3>fetch result and show</h3>";
    $formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
    echo "<pre>" . $formatted_response . "</pre>";
}

//Task 3
$url = "https://reqres.in/api/users?page=2";
$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Error listing users.\n";
} else {
    echo "<h3>List All the users</h3>";
    $formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
    echo "<pre>" . $formatted_response . "</pre>";
}

?>
