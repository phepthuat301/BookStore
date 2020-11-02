<?php
	$name=$_SESSION['dangnhap'];
	$insert_cart="insert into cart (name) value ('".$name."')";
	$ketqua=mysqli_query($conn,$insert_cart);
	if($ketqua){
		for($i=0;$i<count($_SESSION['product']);$i++){
			$max=mysqli_query($conn,"select max(id_cart) from cart");
			$row=mysqli_fetch_array($max);
			$cart_id=$row[0];
			$product_name=$_SESSION['product'][$i]['tensp'];
			$product_id=$_SESSION['product'][$i]['id'];
			$quantity=$_SESSION['product'][$i]['soluong'];
			$price=$_SESSION['product'][$i]['gia'];
			$insert_cart_detail="insert into cart_detail (id_cart,id_sp,quantity,price) values('".$cart_id."','".$product_id."','".$quantity."','".$price."');";
			$cart_detail=mysqli_query($conn,$insert_cart_detail);
			$update_sanpham="update sanpham set soluong=soluong-'$quantity' where id_sp='$product_id'";
			$sanpham_detail=mysqli_query($conn,$update_sanpham);

		}
	}
	unset($_SESSION['product']);
	echo '<h3 style="margin:20px;">Cảm ơn bạn đã đặt hàng của chúng tôi.</h3>';
	echo '<p><a href="index.php" style="color:red; text-decoration:none; font-size:18px;margin:5px;">Tiếp tục mua hàng</a></p>';
?>
