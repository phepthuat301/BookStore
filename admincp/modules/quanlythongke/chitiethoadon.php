<?php
$sql_chitiethd = "SELECT * FROM sanpham a,cart_detail b,cart c where a.id_sp = b.id_sp and b.id_cart = c.id_cart and c.id_cart = '$_GET[id]'";
$row_chitiethd = mysqli_query($conn,$sql_chitiethd);
?>
<table class="table table-light">
        <tr>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Đơn Giá</th>
            <th scope="col">Tổng Tiền</th>
        </tr>
        <?php
        $thanhtien=0;
        while($result = mysqli_fetch_array($row_chitiethd)){
        ?>
        <tr>
            <td><?php echo $result['tensp'] ?></td>
            <td><img src="modules/quanlysanpham/uploads/<?php echo $result['hinhanh'] ?>" width="80" height="80" />
            <td><?php echo $result['quantity'] ?></td>
            <td><?php echo number_format($result['price']) ?></td>
            <?php $tongtien = $result['quantity']*$result['price'] ?>
            <td><?php echo number_format($tongtien) ?></td>
            <?php $thanhtien = $thanhtien + $tongtien ?>
        </tr>
            <?php
            }
            ?>
    <tr></tr>
    <tr>
        <td><h4>Thành tiền : <?php echo number_format($thanhtien) ?>VND</h4></td>
    </tr>';
</table>
