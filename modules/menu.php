<div class="id">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="?quanly=dangkymoi">Đăng ký</a></li>
        <li><a href="?quanly=dangnhap">Đăng nhập</a></li>
        <li><a href="?quanly=dathang">Giỏ hàng</a></li>
        <li>
        <?php
        if(isset($_SESSION['dangnhap'])){
        ?>
          <a href="?quanly=dangxuat">Đăng Xuất</a>
        <?php
        }
        ?>
        </li>
    </ul>
</div>