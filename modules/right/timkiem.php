<?php
if(isset($_POST['timkiem'])){
$search=$_POST['value'];
echo 'Tên tìm kiếm :<strong>'.$search.'</strong><br/>';
$sql_timkiemsp="select * from sanpham,hieusp,loaisp where sanpham.id_loaisp=loaisp.id_loaisp and sanpham.id_hieusp=hieusp.id_hieusp and sanpham.tinhtrang='1' and (tensp like '%".$search."%' or tenhieusp like '%".$search."%' or tenloaisp like '%".$search."%')";
$row_timkiemsp=mysqli_query($conn,$sql_timkiemsp);
$countsp=mysqli_num_rows($row_timkiemsp);
if($countsp>0){
?>
<div class="tieude">Kết quả tìm kiếm tên sản phẩm</div>
<ul class="product">
    <?php
    while($sp_timkiem=mysqli_fetch_array($row_timkiemsp)){
        ?>
        <li><a href="?quanly=chitietsp&id_loaisp=<?php echo $sp_timkiem['id_loaisp'] ?>&id=<?php echo $sp_timkiem['id_sp'] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $sp_timkiem['hinhanh'] ?>" width="150" height="150" />
                <p><?php echo $sp_timkiem['tensp'] ?></p>
                <p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
                            height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;"><?php echo number_format($sp_timkiem['giadexuat']).' '.'VNĐ'?></p>
            </a>
        </li>
        <?php
         }
    }
else{
        echo 'Không tìm thấy kết quả';
    }
}
    ?>
</ul>

            