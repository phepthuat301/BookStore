<div class="button_themsp">
    <a href="index.php?quanly=hieusp&ac=lietke">Liệt kê sp</a> 
</div>
<form action="modules/quanlyhieusp/xuly.php" method="post" enctype="multipart/form-data">
    <h3>&nbsp;</h3>
    <h3>Thêm nhà xuất bản sách</h3>
    <p>Tên nhà xuất bản</p>
    <input type="text" name="hieusp" placeholder="  Tên nhà xuất bản" required>
    <p>Tình trạng</p>
    <div class="select-wrap">
        <select name="tinhtrang" class="select-box">
        <option value="1">Kích Hoạt</option>
        <option value="2">Không Kích Hoạt</option>
    </select>
    <div class="select-point">v</div>
    </div>
    <button name="them" type="submit" class="btn btn-outline-success text-dark"> <i class="fa fa-send"></i> Thêm nhà xuất bản</button>
</form>


