<?php
if(isset($_SESSION['dangnhap'])){
    $email = $_SESSION['dangnhap'];
    $sql="select * from user where email='$email'";
    $row=mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($row);
    $vaitro = $result['vaitro'];
    if($vaitro == 'khachhang'){
?>
<div class="id">
    <ul>
    <li><a href="index.php">Trang chủ</a></li>
    <li><a href="?quanly=dathang">Giỏ hàng</a></li>
    <li><a href="?quanly=taikhoan">Tài Khoản</a></li>
    <li><a href="?quanly=dangxuat">Đăng Xuất</a></li>
    <li><form action="index.php?quanly=timkiem" method="post">
            <input style="padding: 6px 10px;border: none;cursor: pointer;" type="text" placeholder="Tìm..." name="value">
            <button style="border: none;border-radius: 5px;padding: 6px 10px;cursor: pointer" type="submit" name="timkiem">Search</button>
         </form>
    </li>
    </ul>
</div>
<?php
    }
    elseif($vaitro=='admin'){
?>
    <div class="id">
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="?quanly=dathang">Giỏ hàng</a></li>
            <li><a href="admincp/index.php">Quản Lý</a></li>
            <li><a href="?quanly=dangxuat">Đăng Xuất</a></li>
            <li><form action="index.php?quanly=timkiem" method="post">
                    <input style="padding: 6px 10px;border: none;cursor: pointer;" type="text" placeholder="Tìm..." name="value">
                    <button style="border: none;border-radius: 5px;padding: 6px 10px;cursor: pointer" type="submit" name="timkiem">Search</button>
                </form>
            </li>
        </ul>
    </div>
<?php
    }
}
else {
?>
<div class="id">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="?quanly=dathang">Giỏ hàng</a></li>
        <li><a href="?quanly=dangnhap">Đăng Nhập</a></li>
        <li><a href="?quanly=dangkymoi">Đăng Ký</a></li>
        <li><form action="index.php?quanly=timkiem" method="post">
                <input style="padding: 6px 10px;border: none;cursor: pointer;" type="text" placeholder="Tìm..." name="value">
                <button style="border: none;border-radius: 5px;padding: 6px 10px;cursor: pointer" type="submit" name="timkiem">Search</button>
            </form>
        </li>
    </ul>
</div>
<?php } ?>