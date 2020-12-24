
<?php
	$sql = "select * from sanpham where id_sp='$_GET[id]' ";
	$row=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($row);
 ?>
<div class="button_themsp">
<a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sp</a> 
</div>
<form action="modules/quanlysanpham/xuly.php?id=<?php echo $dong['id_sp'] ?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Sửa sản phẩm</td>
  </tr>
  <tr>
    <td>Tên sản phẫm</td>
    <td><input size="100%" type="text" name="tensp" value="<?php echo $dong['tensp'] ?>" required></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" accept="image/*" /><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>"  width="80" height="80"></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="giadexuat" value="<?php echo $dong['giadexuat'] ?>" min="1" required></td>
  </tr>
  <tr>
    <td>Giá giảm</td>
    <td><input type="text" name="giagiam" value="<?php echo $dong['giagiam'] ?>" min="1" required></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" cols="40" rows="10"><?php echo $dong['noidung'] ?></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" value="<?php echo $dong['soluong'] ?>" min="1" required></td>
  </tr>
  <tr>
  <?php
  $sql_loaisp = "select * from loaisp";
  $row_loaisp=mysqli_query($conn,$sql_loaisp);
  ?>
    <td>Loại sản phẩm</td>
    <td><select name="id_loaisp">
     <?php
	while($dong_loaisp=mysqli_fetch_array($row_loaisp)){
		if($dong['id_loaisp']==$dong_loaisp['id_loaisp']){
	?>
    	<option selected="selected" value="<?php echo $dong_loaisp['id_loaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
        <?php
	}else{
		?>
       <option value="<?php echo $dong_loaisp['id_loaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
        <?php
	}
	}
		?>
    </select></td>
  </tr>
  <tr>
      <?php
  $sql_hieusp = "select * from hieusp";
  $row_hieusp=mysqli_query($conn,$sql_hieusp);
  ?>
    <td>Tên nhà sx</td>
    <td><select name="id_hieusp">
    <?php
	while($dong_hieusp=mysqli_fetch_array($row_hieusp)){
		if($dong['id_hieusp']==$dong_hieusp['id_hieusp']){
	?>
    	<option selected="selected" value="<?php echo $dong_hieusp['id_hieusp'] ?>"><?php echo $dong_hieusp['tenhieusp'] ?></option>
        <?php
	}else{
		?>
        <option value="<?php echo $dong_hieusp['id_hieusp'] ?>"><?php echo $dong_hieusp['tenhieusp'] ?></option>
        <?php
	}
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td><select name="tinhtrang">
            <?php
            if($dong['tinhtrang'] == 1){
                ?>
                <option value="1" selected="selected">Kích hoạt</option>
                <option value="2">Không kích hoạt</option>
                <?php
            }else{
                ?>
                <option value="1">Kích hoạt</option>
                <option value="2" selected="selected">Không kích hoạt</option>
                <?php
            }
            ?>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa sản phẩm">
    </div></td>
  </tr>
</table>
</form>


