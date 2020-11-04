<?php
if(isset($_SESSION['dangnhap'])){
?>
<div class="id">
    <ul>
    <li><a href="index.php">Trang chủ</a></li>
    <li><a href="?quanly=dathang">Giỏ hàng</a></li>
    <li><a href="?quanly=taikhoan">Tài Khoản</a></li>
    <li><a href="?quanly=dangxuat">Đăng Xuất</a></li>
    <li><form action="index.php?quanly=timkiem" method="post">
                    <input style="padding: 6px 10px;font-size: 17px;border: none;cursor: pointer;" type="text" placeholder="Tìm..." name="tensp">
                    <button style="border: none;border-radius: 5px;padding: 6px 10px;; font-size: 17px" type="submit" name="timkiem">Search</button>
         </form>
    </li>
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
        <li><form action="index.php?quanly=timkiem" method="post">
                <input style="padding: 6px 10px;font-size: 17px;border: none;cursor: pointer;" type="text" placeholder="Tìm..." name="tensp">
                <button style="border: none;border-radius: 5px;padding: 6px 10px;; font-size: 17px" type="submit" name="timkiem">Search</button>
            </form>
        </li>
    </ul>
</div>
<?php } ?>