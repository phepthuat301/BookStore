<?php
	$sql_loaisp="select * from sanpham where sanpham.id_loaisp='$_GET[id]'";
	$num_loaisp=mysqli_query($conn,$sql_loaisp);
	$count=mysqli_num_rows($num_loaisp);
	$sql_tenloaisp="select tenloaisp from loaisp where id_loaisp='$_GET[id]' ";
	$row=mysqli_query($conn,$sql_tenloaisp);
	$dong=mysqli_fetch_array($row);
?>
<div class="tieude"><?php echo $dong['tenloaisp'] ?></div>
	<ul class="product">
		<?php
		if($count>0){
		while($dong_loaisp=mysqli_fetch_array($num_loaisp)){
		?>
		<li><a href="?quanly=chitietsp&id_loaisp=<?php echo $dong_loaisp['id_loaisp'] ?>&id=<?php echo $dong_loaisp['id_sp'] ?>">
			<img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_loaisp['hinhanh'] ?>" width="150" height="150" />
			<p><?php echo $dong_loaisp['tensp'] ?></p>
			<p><?php echo $dong_loaisp['giadexuat'] ?></p>
			<p>Chi tiết</p>
		</a></li>
		<?php
		}
		}else{
			echo 'Hiện chưa có sản phẩm...';
		}
		?>
	</ul>
</div>