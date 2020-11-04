<?php
	$sql_lietkesp="select * from hieusp order by id_hieusp desc ";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);

?>
<div class="button_themsp">
<a href="index.php?quanly=hieusp&ac=them">Thêm Mới</a> 
</div>

<table class="table table-light">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên hiệu sản phẩm</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Sửa</th>
      <th scope="col">Xóa</th>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['tenhieusp'] ?></td>
    <td><?php
	if($dong['tinhtrang'] == 1 ){
		echo 'Còn Hàng';
	}else{
		echo 'Hết Hàng';
	}
    ?>
    </td>
    <td><a href="index.php?quanly=hieusp&ac=sua&id=<?php echo $dong['id_hieusp'] ?>"><img src="../imgs/pencil.png" width="30" height="30" /></a></td>
    <td><a href="modules/quanlyhieusp/xuly.php?id=<?php echo $dong['id_hieusp']?>" class="delete_link"><img src="../imgs/del.png" width="30" height="30" /></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
