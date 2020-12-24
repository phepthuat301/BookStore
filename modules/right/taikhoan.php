<?php
$email=$_SESSION['dangnhap'];
$sql=mysqli_query($conn,"select * from user where email='$email' limit 1");
$result=mysqli_fetch_array($sql);
$id=$result['id_user'];
if(isset($_POST['sua'])) {
    $tenkh = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $pass = $_POST['pass'];
    $dienthoai = $_POST['dienthoai'];
    if(trim($pass)<$pass)
    $updateUser_sql = mysqli_query($conn, "update User set username='$tenkh',dienthoai='$dienthoai',diachinhan='$diachi',matkhau='$pass' where id_user = $id");
    echo'<h3 style="color:red">Cập nhật thành công</h3>';
}
?>
<div class="tieude">
    Quản Lý Tài Khoản
</div>
<div class="dangky">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form">
            <p>Họ tên người mua </p>
            <div class="group"><input type="text" name="hoten" value="<?php echo $result['username']?>" required ><i class="fa fa-user"></i></div>
            <p>Địa chỉ Email </p>
            <div class="group"><input type="email" name="email" value ="<?php echo $result['email']?>" required><i class="fa fa-envelope"></i></div>
            <p>Mật khẩu </p>
            <div class="group"><input type="password" name="pass" value ="<?php echo $result['matkhau']?>" required pattern="[A-Za-z0-9]{8,}" title="Vui lòng nhập tối thiếu 8 kí tự chỉ gồm chữ và số"><i class="fa fa-lock"></i></div>
            <p>Số điện thoại </p>
            <div class="group"><input type="tel" name="dienthoai" value ="<?php echo $result['dienthoai']?>" required pattern="[0-9]{10}" title="Vui lòng nhập đúng 10 số"><i class="fa fa-phone"></i></div>
            <p>Địa chỉ nhận </p>
            <div class="group"><input type="text" name="diachi" value ="<?php echo $result['diachinhan']?>" required><i class="fa fa-building"></i></div>
            <button name="sua" type="submit" class="btn btn-info"> <i class="fa fa-send"></i> Sửa Thông Tin</button>
        </div>
    </form>
</div>
