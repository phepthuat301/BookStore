	<?php
	$sql_moinhat="select * from sanpham order by id_sp desc limit 0,3";
	$row_moinhat=mysqli_query($conn,$sql_moinhat);
	
?>
	<div class="tieude">Sản phẩm mới nhất</div>
            <ul class="product">
                <?php
                        while($sp_moinhat=mysqli_fetch_array($row_moinhat)){
                    ?>
                    	<li><a href="?quanly=chitietsp&id_loaisp=<?php echo $sp_moinhat['id_loaisp'] ?>&id=<?php echo $sp_moinhat['id_sp'] ?>">
                        	<img src="admincp/modules/quanlysanpham/uploads/<?php echo $sp_moinhat['hinhanh'] ?>" width="150" height="150" />
                            <p><?php echo $sp_moinhat['tensp'] ?></p>
                            <p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
                            height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;"><?php echo number_format($sp_moinhat['giadexuat']).' '.'VNĐ'?></p>
                            </a>
                        </li>
                      <?php
					}
					  ?>
                    </ul>
    <a href="?quanly=tatcasp">Xem thêm tất cả sản phẩm...</a>
                 <div class="clear"></div>
                 
 <?php
 	$sql_loai=mysqli_query($conn,"select * from loaisp limit 4 ");
	
	while($dong_loai=mysqli_fetch_array($sql_loai)){
		
	echo '<div class="tieude">'.$dong_loai['tenloaisp'].'</div>';
 	$sql_loaisp="select * from loaisp inner join sanpham on sanpham.id_loaisp=loaisp.id_loaisp where sanpham.id_loaisp='".$dong_loai['id_loaisp']."' limit 6";
	$row=mysqli_query($conn,$sql_loaisp);
	$count=mysqli_num_rows($row);
	if($count>0){
?>
	<ul class="product">
	<?php
	while($dong=mysqli_fetch_array($row)){
		?>
			<li><a href="?quanly=chitietsp&id_loaisp=<?php echo $dong['id_loaisp'] ?>&id=<?php echo $dong['id_sp'] ?>">
				<img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="150" height="150" />
				<p><?php echo $dong['tensp']?></p>
				<p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
				height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;"><?php echo number_format($dong['giadexuat']).' '.'VNĐ' ?></p>
			</a></li>
		<?php
	}
	}else{
		echo '<h3 style="margin:5px;font-style:italic;color:#000">Hiện chưa có sản phẩm...</h3>';
	}
	?>
	</ul>
		<div class="clear"></div>
	<?php
	}
?>
          
            