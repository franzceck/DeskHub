<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['userdata']) && !strpos($link, 'login.php') && !strpos($link, 'register.php')){
	redirect('user/login.php');
}
if(isset($_SESSION['userdata']) && (strpos($link, 'login.php') || strpos($link, 'register.php'))){
	redirect('user/index.php');
}
$module = array('','admin','faculty','student');
if(isset($_SESSION['userdata']) && (strpos($link, 'index.php') || strpos($link, 'user/') && !strpos($link, 'login.php'))){
    // redirect('user/login.php');
    // exit;
}
