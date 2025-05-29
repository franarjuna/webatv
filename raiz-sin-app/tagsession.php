<?php 
session_start();
if(isset($_GET['utm_source'])){
    $_SESSION['utm_source'] = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $_SESSION['utm_medium'] = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $_SESSION['utm_campaign'] = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $_SESSION['utm_term'] = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    $_SESSION['utm_content'] = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';
}

if(isset($_GET['vs'])){
    var_dump($_SESSION);
    die();
}

?>