
<div class="button_themsp">
  <a href="index.php?quanly=sanpham&ac=lietke">Liệt kê sp</a> 
</div>
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
</select></td>
</tr>-->
<h3>Thêm sản phẩm</h3>
<p>Tên sản phẩm</p>
<input size="100%" type="text" name="tensp" placeholder="  Nhập tên sản phẩm" required>
<p>Mã sản phẩm</p>
<input size="100%" type="text" name="masp" placeholder="  Vui lòng nhập mã sản phẩm" required>
<p>Hình ảnh</p>
<input type="file" name="hinhanh" required/>
<p>Giá đề xuất</p>
<input size="100%"  type="text" name="giadexuat" placeholder="  Vui lòng nhập giá cần bán" required>
<p>Giá giảm</p>
<input size="100%"  type="text" name="giagiam" placeholder="  Vui lòng nhập giá muốn giảm" required>
<p>Nội dung</p>
<textarea style="width:30%;height:100px" name="noidung"></textarea>
<p>Số lượng</p>
<input type="text" name="soluong" placeholder="  Vui lòng nhập số lượng" required>
<?php
  $sql_loaisp = "select id_loaisp,tenloaisp from loaisp";
  $row_loaisp=mysqli_query($conn,$sql_loaisp);
  ?>
    <p>Loại sản phẩm</p>
    <select name="id_loaisp" class="select-box">
    <?php
	while($dong_loaisp=mysqli_fetch_array($row_loaisp)){
	?>
    	<option value="<?php echo $dong_loaisp['id_loaisp'] ?>"><?php echo $dong_loaisp['tenloaisp'] ?></option>
<?php
	}
?>
    </select> 
    <?php
  $sql_hieusp = "select * from hieusp";
  $row_hieusp=mysqli_query($conn,$sql_hieusp);
  ?>
    <p>Tên nhà xuất bản</p>
    <select name="id_hieusp" class="select-box">
    <?php
	while($dong_hieusp=mysqli_fetch_array($row_hieusp)){
	  ?>
    	<option value="<?php echo $dong_hieusp['id_hieusp'] ?>"><?php echo $dong_hieusp['tenhieusp'] ?></option>
    <?php
	}
		?>
    </select>
    <p>Tình trạng</p>
  <select name="tinhtrang" class="select-box">
    <option value="1">Còn Hàng</option>
    <option value="2">Hết Hàng</option>
  </select><br>
    <button name="them" type="submit" class="btn btn-success text-dark"> <i class="fa fa-send"></i> Thêm danh mục</button>
</form>


