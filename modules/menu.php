<?php
if(isset($_SESSION['dangnhap'])){
?>
<div class="id">
    <ul>
    <li><a href="index.php">Trang chủ</a></li>
    <li><a href="?quanly=dathang">Giỏ hàng</a></li>
    <li><a href="?quanly=taikhoan">Tài Khoản</a></li>
    <li><a href="?quanly=dangxuat">Đăng Xuất</a></li>
    </ul>
</div>
<?php
}
else {
?>
<div class="id">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="?quanly=dathang">Giỏ hàng</a></li>
        <li><a href="?quanly=dangnhap">Đăng Nhập</a></li>
        <li><a href="?quanly=dangkymoi">Đăng Ký</a></li>
    </ul>
</div>
<?php } ?>