<?php
	include('../config2.php');
	$tensp=$_POST['tensp'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	$giadexuat=$_POST['giadexuat'];
	$giagiam=$_POST['giagiam'];
	$soluong=$_POST['soluong'];
	$noidung=$_POST['noidung'];
	$loaisp=$_POST['id_loaisp'];
	$nhasx=$_POST['id_hieusp'];
	$tinhtrang=$_POST['tinhtrang'];
	$imageFileType = pathinfo($hinhanh,PATHINFO_EXTENSION);
	$allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
	if(isset($_POST['them'])){
		//them
		if (!in_array($imageFileType,$allowtypes ))
		{
			header('location:../../index.php?quanly=sanpham&ac=them');
		}else {
			move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
			$sql_them=("insert into sanpham (tensp,hinhanh,giadexuat,giagiam,soluong,noidung,id_loaisp,id_hieusp,tinhtrang) value('$tensp','$hinhanh','$giadexuat','$giagiam','$soluong','$noidung','$loaisp','$nhasx','$tinhtrang')");
			mysqli_query($conn,$sql_them);
			header('location:../../index.php?quanly=sanpham&ac=lietke');
		}
	}elseif(isset($_POST['sua'])){
		//sua
		if (!in_array($imageFileType,$allowtypes ))
		{
			header('location:../../index.php?quanly=sanpham&ac=lietke');
		}else{
			if($hinhanh!=''){
				$sql_sua = "update sanpham set tensp='$tensp',hinhanh='$hinhanh',giadexuat='$giadexuat',giagiam='$giagiam',soluong='$soluong',noidung='$noidung',id_loaisp='$loaisp',id_hieusp='$nhasx',tinhtrang='$tinhtrang' where id_sp='$_GET[id]'";
			}else{
				$sql_sua = "update sanpham set tensp='$tensp',giadexuat='$giadexuat',giagiam='$giagiam',soluong='$soluong',noidung='$noidung',id_loaisp='$loaisp',id_hieusp='$nhasx',tinhtrang='$tinhtrang' where id_sp='$_GET[id]'";
			}
		}
		mysqli_query($conn,$sql_sua);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}else{
		$sql_xoa = "delete from sanpham where id_sp = '$_GET[id]'";
		mysqli_query($conn,$sql_xoa);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}
?>
