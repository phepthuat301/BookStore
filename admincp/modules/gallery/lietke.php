<?php
	$sql=mysqli_query($conn,"select * from sanpham where id_sp='$_GET[id]'");
	$dong=mysqli_fetch_array($sql);
	$id=$_GET['id'];
?>
<div class="button_themsp">
<a href="index.php?quanly=gallery&ac=them&id=<?php echo $id ?>">Thêm gallery</a> 
</div>
<div class="button_themsp">
<a href="index.php?quanly=quanlysanpham&ac=them">Quay lại</a> 
</div>
<table width="100%" border="1">
  <tr>
    <td>Tên sp</td>
    <td>Hình ảnh</td>
    <td>Gallery</td>
    <td>Quản lý</td>
  </tr>
  <tr>
    <td><?php echo $dong['tensp'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="150"></td>
    <td>
    <?php
	$sql_gal=mysqli_query($conn,"select hinhanhsp from gallery where id_sp='$_GET[id]'");
	$count=mysqli_num_rows($sql_gal);
	if($count>0){
	while($dong_gal=mysqli_fetch_array($sql_gal)){
	?>
    <p style="margin-bottom:10px;"><img src="modules/gallery/uploads/<?php echo $dong_gal['hinhanhsp'] ?>" width="150" height="150"></p>
    <?php
	}

	}else{
		echo 'Chưa có hình ảnh sản phẫm. Làm ơn Thêm Gallery';
	}
	?>
    </td>
    <td><a class="delete_link" href="modules/gallery/xuly.php?quanly=xoa&id=<?php echo $id ?>" style="text-decoration:none;color:#000;font-size:20px;">Xóa tất cả hình ảnh</a></td>
  </tr>
</table>
