<?php
if(isset($_SESSION['product'])){
    if(isset($_SESSION['dangnhap'])){
        echo '<div class="tieude">Giỏ hàng của bạn | <span>Xin chào bạn:<strong><em> '.$_SESSION['dangnhap'].'</em></strong></span></div>';
    }else{
        echo '<div class="tieude">Giỏ hàng của bạn</div>';
    }
    echo '<div class="box_giohang">';
    echo '  <table width="100%" border="1" style="border-collapse:collapse; margin:5px; text-align:center;">';
    echo'  <tr>';
    echo '<th>MÃ SP</th>';
    echo'<th>Tên SP</th>';
    echo'<th>Hình ảnh</th>';
    echo'<th>Giá sp</th>';
    echo'<th>SL</th>';
    echo'<th>Tổng tiền</th>';
    echo'<th>Quản lý</th>';
    echo'</tr>';
    $thanhtien=0;
    foreach($_SESSION['product'] as $cart_item){
        $id=$cart_item['id'];
        $sql="select * from sanpham where id_sp='$id'";
        $row=mysqli_query($conn,$sql);
        $dong=mysqli_fetch_array($row);
        echo'<tr>';
        echo'<td>'.$dong['masp'].'</td>';
        echo'<td>'.$dong['tensp'].'</td>';
        echo'<td><img src="admincp/modules/quanlysanpham/uploads/'.$dong['hinhanh'].'" width="100" height="100" /></td>';
        echo'<td>'.number_format($dong['giadexuat']).'</td>';

        echo'<td><a href="update_cart.php?cong='.$cart_item['id'].'" style="margin-right:2px;"><img src="imgs/plus.png" width="20" height="20"></a>'.$cart_item['soluong'].'<a href="update_cart.php?tru='.$cart_item['id'].'" style="margin-left:2px;"><img src="imgs/subtract.png" width="20" height="20"></a></td>';
        $tongtien=0;
        $tongtien=$cart_item['soluong']*$cart_item['gia'];
        $thanhtien=($thanhtien + $tongtien);
        echo'<td>'.number_format($tongtien).'</td>';
        echo'<td><a href="update_cart.php?xoa='.$cart_item['id'].'"><img src="imgs/deletered.png" width="30" height="30"></a></td>';
        echo'</tr>';
        echo '<tr>';
        echo'</tr>';
    }
    echo '<tr>
				<td colspan="6">
				<a href="update_cart.php?xoatoanbo=1"  style="text-decoration:none;" >Xóa toàn bộ</a>	
				</td>
				<td>Thành tiền : '.number_format($thanhtien).'VNĐ'.'</td>
			</tr>';

}else{
    echo 'Giỏ hàng của bạn trống';
}
echo'</table>';
?>
<ul	class="control">
    <p><a href="index.php">Tiếp tục mua hàng</a></p>
    <p><a href="?quanly=dangkymoi">Đăng ký mới</a></p>
    <p><a href="?quanly=dangnhap">Bạn đã có tài khoản</a></p>
    <?php
    if(!isset($_SESSION['dangnhap'])&&isset($_SESSION['product'])){
        ?>
        <p style="float:right; background:#FF0;text-decoration:none;">
            <a href="?quanly=dangnhap" style="color:#000;margin:5px;">Vui lòng đăng nhập để thanh toán</a>
        </p>
        <?php
    }
    ?>
    <?php
    if(isset($_SESSION['dangnhap'])&&isset($_SESSION['product'])){
        ?>
        <p style="float:right; background:#FF0;text-decoration:none;">
            <a href="?quanly=thanhtoan" style="color:#000;margin:5px;">Thanh toán</a>
        </p>
        <?php
    }
    ?>
</ul>

</div>
