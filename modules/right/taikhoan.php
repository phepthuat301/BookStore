<?php
$email=$_SESSION['dangnhap'];
$sql=mysqli_query($conn,"select * from user where email='$email' limit 1");
$result=mysqli_fetch_array($sql);
$id=$result['id_user'];
if(isset($_POST['sua'])) {
    $tenkh = $_POST['hoten'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $pass = md5($_POST['pass']);
    $dienthoai = $_POST['dienthoai'];
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
            <div class="group"><input type="text" name="hoten" value="<?php echo $result['username']?>" ><i class="fa fa-user"></i></div>
            <p>Địa chỉ Email </p>
            <div class="group"><input type="email" name="email" value ="<?php echo $result['email']?>"><i class="fa fa-envelope"></i></div>
            <p>Mật khẩu </p>
            <div class="group"><input type="password" name="pass" value ="<?php echo $result['matkhau']?>"><i class="fa fa-lock"></i></div>
            <p>Số điện thoại </p>
            <div class="group"><input type="text" name="dienthoai" value ="<?php echo $result['dienthoai']?>"><i class="fa fa-phone"></i></div>
            <p>Địa chỉ nhận </p>
            <div class="group"><input type="text" name="diachi" value ="<?php echo $result['diachinhan']?>" required><i class="fa fa-building"></i></div>
            <button name="sua" type="submit" class="btn btn-info"> <i class="fa fa-send"></i> Sửa Thông Tin</button>
        </div>
    </form>
</div>
