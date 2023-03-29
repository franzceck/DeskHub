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
$parentFolder = 'user/';
// if (strpos($link, 'admin'))
//     $parentFolder = 'admin/';
if((!isset($_SESSION['userdata']) || $_SESSION['userdata']['login_type'] < 4) && !strpos($link, 'login.php') && !strpos($link, 'register.php')){
	redirect($parentFolder.'login.php');
}
if(isset($_SESSION['userdata']) && $_SESSION['userdata']['login_type'] == 4 && (strpos($link, 'login.php') || strpos($link, 'register.php'))){
	redirect($parentFolder.'index.php');
}
$module = array('','admin','faculty','student');
if(isset($_SESSION['userdata']) && (strpos($link, 'index.php') || strpos($link, 'user/') && !strpos($link, 'login.php')) && $_SESSION['userdata']['login_type'] != 4){
    redirect($parentFolder.'login.php');
	// echo "<script>alert('Access Denied!');location.replace('".base_url.$module[$_SESSION['userdata']['login_type']]."');</script>";
    exit;
}
