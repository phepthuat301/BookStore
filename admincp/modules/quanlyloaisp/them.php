<div class="button_themsp">
<a href="index.php?quanly=loaisp&ac=lietke">Liệt kê sp</a> 
</div>
<div class=""></div>
<form action="modules/quanlyloaisp/xuly.php" method="post" enctype="multipart/form-data">
    <h3>&nbsp;</h3>
    <h3>Thêm thể loại sách</h3>
    <p>Thể loại sách</p>
    <input type="text" name="loaisp" placeholder="Tên loại sản phẩm" required>
    <p>Tình trạng</p>
    <div class="select-wrap">
        <select name="tinhtrang" class="select-box">
            <option value="1">Kích Hoạt</option>
            <option value="2">Không Kích Hoạt</option>
        </select>
    <div class="select-point">v</div>
    </div>
    <button name="them" type="submit" class="btn btn-outline-success text-dark"> <i class="fa fa-send"></i> Thêm sản phẩm</button>
</form>


