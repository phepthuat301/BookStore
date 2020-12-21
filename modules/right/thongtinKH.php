<?php
if(isset($_SESSION['dangnhap'])){
    $email = $_SESSION['dangnhap'];
    $sql = "select * from user where email = '$email'" ;
    $row = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($row);
?>
    <form action="?quanly=thanhtoan" method="post" autocomplete="on" >
        <div class="tieude">Địa chỉ & SĐT Người Nhận</div>
            <div class="dangky">
                <p>Địa chỉ nhận</p>
                <div class="group"><input type="text" name="diachi" value="<?php echo $result['diachinhan'] ?>"></div>
                <p>Số điện thoại</p>
                <div class="group"><input type="tel" name="dienthoai" value="<?php echo $result['dienthoai'] ?>" pattern="{10}"></div>
            </div>
            <div class="tieude">Phương thức thanh toán</div>
            <div class="radiokh" style="margin:10px 10px; padding:5px; font-size: 20px">
                <input type="radio" id="cod" value="Thanh toán khi nhận hàng" name="thanhtoan">
                <label for="cod">Thanh toán khi nhận hàng</label><br>
                <input type="radio" id="atm" value="Thanh toán bằng thẻ" name="thanhtoan">
                <label for="atm">Thanh toán bằng thẻ</label><br>
            </div>
            <div class="dangky">
                <button name="send" type="submit" class="btn btn-info"> <i class="fa fa-send"></i>Xác nhận thanh toán</button>
            </div>
    </form>
<?php
} else {
?>
    <form action="?quanly=thanhtoan" method="post" autocomplete="on" >
            <div class="tieude">Địa chỉ Giao Hàng & Đăng Ký</div>
            <br>
            <div class="dangky">
            <p>Họ tên người mua</p>
            <div class="group"><input type="text" name="hoten" placeholder="Họ và tên" required><i class="fa fa-user"></i></div>
            <p>Địa chỉ Email</p>
            <div class="group"><input type="email" name="email" placeholder="Địa chỉ Email" required><i class="fa fa-envelope"></i></div>
            <p>Mật khẩu</p>
            <div class="group"><input type="password" name="pass" placeholder="Password" required><i class="fa fa-lock"></i></div>
            <p>Số điện thoại</p>
            <div class="group"><input type="tel" name="dienthoai" placeholder="0905123456" pattern="{10}" required><i class="fa fa-phone"></i></div>
            <p>Địa chỉ nhận</p>
            <div class="group"><input type="text" name="diachi" placeholder="Vui lòng nhập địa chỉ của quý khách!" required><i class="fa fa-building"></i></div>
            </div>
            <div class="tieude">Phương thức thanh toán</div>
            <div class="radiokh" style="margin:10px 10px; padding:5px; font-size: 20px">
            <input type="radio" id="cod" value="Thanh toán khi nhận hàng" name="thanhtoan">
            <label for="cod">Thanh toán khi nhận hàng</label><br>
            <input type="radio" id="atm" value="Thanh toán bằng thẻ" name="thanhtoan">
            <label for="atm">Thanh toán bằng thẻ</label><br>
            </div>
            <div class="dangky">
            <button name="gui" type="submit" class="btn btn-info"> <i class="fa fa-send"></i>Xác nhận thanh toán</button>
            </div>
    </form>
<?php } ?>