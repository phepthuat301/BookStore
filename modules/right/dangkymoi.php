<style>
  strong{
    color:red;
  }
</style>
<?php
	if(isset($_POST['gui'])){
		$tenkh=$_POST['hoten'];
		$email=$_POST['email'];
		$diachi=$_POST['diachi'];
		$pass=md5($_POST['pass']);
		$dienthoai=$_POST['dienthoai'];
		$vaitro='khachhang';
    $sql_dangky=mysqli_query($conn,"insert into user (username,email,matkhau,dienthoai,diachinhan,vaitro)
      value('$tenkh','$email','$pass','$dienthoai','$diachi','$vaitro')");
		    
	if($sql_dangky){
		echo '<h3 style="margin-left:5px;">Bạn đã đăng ký thành công</h3>';
        echo '<a href="?quanly=dangnhap" style="margin:20px;text-decoration:none;">
              Quay lại để đăng nhập mua hàng</a>';
	}
	}
?>

<div class="tieude">
	HOAN NGHÊNH QUÝ BẠN ĐẶT HÀNG TẠI BOOK STORE
</div>
<div class="dangky">
    <p style="font-size:18px; color:red;margin:5px;">Các mục dấu * là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác (Số nhà, Ngõ, thôn xóm/ấp, Phường/xã, huyện/quận, tỉnh, TP)</p>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form">
            <p>Họ tên người mua *</p>
            <div class="group"><input type="text" name="hoten" placeholder="Họ và tên" required><i class="fa fa-user"></i></div>
            <p>Địa chỉ Email *</p>
            <div class="group"><input type="text" name="email" placeholder="Địa chỉ Email" required><i class="fa fa-envelope"></i></div>
            <p>Mật khẩu *</p>
            <div class="group"><input type="password" name="pass" placeholder="Password" required><i class="fa fa-lock"></i></div>
            <p>Số điện thoại *</p>
            <div class="group"><input type="text" name="dienthoai" placeholder="Số điện thoại" required><i class="fa fa-phone"></i></div>
            <p>Địa chỉ nhận *</p>
            <div class="group"><input type="text" name="diachi" placeholder="Vui lòng nhập địa chỉ của quý khách!" required><i class="fa fa-building"></i></div>
            <button name="gui" type="submit" class="btn btn-info"> <i class="fa fa-send"></i> Tạo tài khoản</button>
        </div>
    </form>
</div>