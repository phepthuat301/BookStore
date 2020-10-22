<?php
    if(isset($_SESSION['dangnhap'])){

        echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">XIN CHÀO '.$_SESSION['dangnhap'].'</p>';
        exit();
    }
	elseif(isset($_POST['dangnhap'])){
		$email=$_POST['email'];
		$pass=md5($_POST['pass']);
		$sql=mysqli_query($conn,"select * from user where (email='$email' and matkhau='$pass') or (username='$email' and matkhau='$pass')  limit 1");
		$count=mysqli_num_rows($sql);
		$result=mysqli_fetch_array($sql);
		if($count>0){
			$_SESSION['dangnhap']=$email;
            if($result['vaitro'] == 'admin') {
                echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">XIN CHÀO ADMIN</p>';
                echo '<a href="admincp/index.php" style="font-size:20px;">ĐẾN TRANG QUẢN LÝ</a>';
                exit();
            }
            else{
                    echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Bạn đã đăng nhập thành công.</p>';
                    echo '<a href="index.php?quanly=dathang" style="font-size:20px;">Quay lại để thanh toán</a>';
                    exit();
                }

		}
		else{
			echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Email và Tài khoản bị sai</p>';
		}
	}

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="tieude">
    HOAN NGHÊNH QUÝ KHÁCH ĐẾN VỚI BOOK STORE
</div>
<div class="dangky">
    <form action="" method="post" enctype="multipart/form-data">
        <p class="ss">Địa chỉ Email hoặc Họ và tên</p>
        <div class="group"><input type="text" name="email" placeholder="Địa chỉ Email"><i class="fa fa-envelope"></i></div>
        <p class="ss">Mật khẩu *</p>
        <div class="group"><input type="password" name="pass" placeholder="Password"><i class="fa fa-lock"></i></div>

        <button name="dangnhap" type="submit" class="btn btn-info"> <i class="fa fa-send"></i> Đăng nhập</button>
    </form>

</div>
<div>
<h3><a href="?quanly=dangkymoi" style="text-decoration:none;color:#FFF;margin:10px;border-radius:10px;padding:5px;;background:#F00;float:right;" >Đăng ký tài khoản để mua hàng.</a></h3>

</div>


