<?php
	if(isset($_POST['gui'])) {
		$tenkh = $_POST['hoten'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		$pass = md5($_POST['pass']);
		$dienthoai = $_POST['dienthoai'];
		$vaitro = 'khachhang';
		$loaithanhtoan = $_POST['thanhtoan'];
		$sql_getmail = mysqli_query($conn,"select * from user where email = '$email'");
		$num = mysqli_num_rows($sql_getmail);
		if($num > 0 ){
			echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Email đã có người sử dụng</p>';
			echo '<p><a href="?quanly=thongtinkh" style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Vui lòng quay lại</a></p>';
		}else{
		$sql_dangky = mysqli_query($conn, "insert into user (username,email,matkhau,dienthoai,diachinhan,vaitro)
			  value('$tenkh','$email','$pass','$dienthoai','$diachi','$vaitro')");
		$insert_cart="insert into cart (name,loaithanhtoan,diachinhan,sdt) value ('$tenkh','$loaithanhtoan','$diachi','$dienthoai')";
		$ketqua=mysqli_query($conn,$insert_cart);
		}
	}else{
		$email = $_SESSION['dangnhap'];
		$sql = mysqli_query($conn,"select * from user where email ='$email'");
		$result = mysqli_fetch_array($sql);
		$tenkh = $result['username'];
		$diachi = $_POST['diachi'];
		$dienthoai = $_POST['dienthoai'];
		$loaithanhtoan = $_POST['thanhtoan'];
		$insert_cart="insert into cart (name,loaithanhtoan,diachinhan,sdt) value ('$tenkh','$loaithanhtoan','$diachi','$dienthoai')";
		$ketqua=mysqli_query($conn,$insert_cart);
	}
	if(isset($ketqua)){
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
		unset($_SESSION['product']);
		echo '<h3 style="margin:20px;">Cảm ơn bạn đã đặt hàng của chúng tôi.</h3>';
		echo '<p><a href="index.php" style="color:red; text-decoration:none; font-size:18px;margin:5px;">Tiếp tục mua hàng</a></p>';
	}
?>
