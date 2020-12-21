<?php
	$sql_lietkesp="select * from loaisp order by id_loaisp desc ";
	$row_lietkesp=mysqli_query($conn,$sql_lietkesp);

?>
<div class="button_themsp">
<a href="index.php?quanly=loaisp&ac=them">Thêm Mới</a>
</div>

<table class="table table-light">
  <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên loại sản phẩm</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Chỉnh sửa</th>
      <<th scope="col">Xóa</th>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['tenloaisp'] ?></td>
    <td><?php
          if($dong['tinhtrang'] == 1 ){
              echo 'Kích hoạt';
          }else{
              echo 'Không kích hoạt';
          }
          ?>
    </td>
    <td><a href="index.php?quanly=loaisp&ac=sua&id=<?php echo $dong['id_loaisp'] ?>"><img src="../imgs/pencil.png" width="30" height="30" /></a></td>
    <td><a href="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['id_loaisp']?>" class="delete_link"><img src="../imgs/del.png" width="30" height="30" /></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
