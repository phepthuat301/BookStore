﻿<?php
require_once 'admincp/modules/Session.php';

$tenmaychu='localhost';
$tentaikhoan='root';
$pass='';
$csdl='bookstore';
$conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Ko kết nối được');
mysqli_select_db($conn,$csdl);

$session = new Session();
$session->startSess();

if($session->getSess() != ''){
    $user = $session->getSess();
}
else{
    $user = '';
}

if($user){
    $get_user = "SELECT * FROM user WHERE email = '$user'";
    $query = mysqli_query($conn,$get_user);
    if (mysqli_num_rows($query))
    {
        $data_user = mysqli_fetch_assoc($query);
    }
}
?>