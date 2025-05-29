<?php


$url = "sens-humboldt";
$uri = $_SERVER['REQUEST_URI'];

$uri = strtok($_SERVER["REQUEST_URI"], '?');


function base_url(){
    return "/sens-humboldt/";
}

$server_output = "[]";

$ch = curl_init("http://adm.atvarquitectos.com/api");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "uri=".$uri."&site=2");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS, 
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);
curl_close($ch);
$datadb = json_decode($server_output,true);