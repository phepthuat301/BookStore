
<?php
	if(isset($_POST['timkiem'])){
	$search=$_POST['masp'];
	echo 'Tên tìm kiếm :<strong>'.' '.$search.'</strong><br/>';
	$sql_timkiem="select * from sanpham,hieusp,loaisp where sanpham.id_loaisp=loaisp.id_loaisp and sanpham.id_hieusp=hieusp.id_hieusp and tensp like '%".$search."%'";
	$row_timkiem=mysqli_query($conn,$sql_timkiem);
	$count=mysqli_num_rows($row_timkiem);
	if($count>0){
?>
<h3>Kết quả tìm kiếm</h3>

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
      <th scope="col">Quản lý</th>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_timkiem)){
  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['tensp'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="80" height="80" /></td>
    <td><?php echo $dong['giadexuat'] ?></td>
    <td><?php echo $dong['giagiam'] ?></td>
    <td><?php echo $dong['soluong'] ?></td>
    <td><?php echo $dong['tenloaisp'] ?></td>
    <td><?php echo $dong['tenhieusp'] ?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['id_sp'] ?>"><center><img src="../imgs/pencil.png" width="30" height="30" /></center></a></td>
    <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['id_sp']?>"><center><img src="../imgs/del.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
	}else{
	  echo 'Không tìm thấy kết quả';
  }
  }
  ?>
</table>
