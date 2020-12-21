
<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang =='' || $trang =='1'){
		$trang1=0;
	}else{
		$trang1=($trang*5)-5;
	}
	$sql_lietkesp="select id_sp,hinhanh,tensp,giadexuat,giagiam,soluong,tenloaisp,tenhieusp,sanpham.tinhtrang from sanpham,hieusp,loaisp where loaisp.id_loaisp=sanpham.id_loaisp and hieusp.id_hieusp=sanpham.id_hieusp order by sanpham.id_sp desc limit $trang1,5 ";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);

?>
<div class="button_themsp">
<a href="index.php?quanly=sanpham&ac=them">Thêm Mới</a> 
</div>

<table class="table table-light">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá đề xuất</th>
      <th scope="col">Giá giảm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Loại hàng</th>
      <th scope="col">Nhà SX</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){

  ?>
  <tr>
  	
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['tensp'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="80" height="80" />
    <a href="index.php?quanly=gallery&ac=lietke&id=<?php echo $dong['id_sp'] ?>" style="text-align:center;text-decoration:none; font-size:18px;color:#06F;">Gallery</a>
    </td>
    <td><?php echo number_format($dong['giadexuat']) ?></td>
    <td><?php echo number_format($dong['giagiam']) ?></td>
    <td><?php echo $dong['soluong'] ?></td>
    <td><?php echo $dong['tenloaisp'] ?></td>
    <td><?php echo $dong['tenhieusp'] ?></td>
    <td><?php if($dong['tinhtrang']==1){
        echo "Kích hoạt";
        }else echo "Không kích hoạt"?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['id_sp'] ?>" ><img src="../imgs/pencil.png" width="30" height="30" /></a></td>
    <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['id_sp']?>" class="delete_link"><img src="../imgs/del.png" width="30" height="30"   /></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($conn,"select * from sanpham");
	$count_sp=mysqli_num_rows($sql_trang);
	$sotrang=ceil($count_sp/5);
	for($b=1;$b<=$sotrang;$b++){
		
		if($trang==$b){
		
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
	}else{
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#fff;">'.$b.' ' .'</a>';
	}
	}
	?>
</div>
