<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style-login.css" />
    <link rel="stylesheet" type="text/css" href="/BookStore/css/bootstrap.css">
<title>Quản Lý BOOK STORE</title>
</head>
<?php
	session_start();
	include('modules/config2.php');
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql="select * from user where username='$username' and matkhau='$password' and vaitro='admin' limit 1 ";
		$row=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap']=$username;
			header('location:index.php');
		}else{
			echo '<script>alert("Tài khoản hoặc mật khẩu không đúng.Làm ơn đăng nhập lại.");</script>';
			header('location:login.php');
		}
	}
?>
<body>
	<form class="form-group" action="login.php" method="post" enctype="multipart/form-data">
    <h2>Đăng nhập</h2>
        <input class="form-control" type="text" name="username" id="username" placeholder="Enter username..." required="required" />
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter password..." required="required" />
        <input class="form-control btn-dark" type="submit" name="login" id="button" value="Sign in"/>
    </form>
</body>
</html>