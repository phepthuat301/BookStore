<?php
if(isset($_POST['timkiem'])){
$search=$_POST['tensp'];
echo 'Tên tìm kiếm :<strong>'.' '.$search.'</strong><br/>';
$sql_timkiem="select * from sanpham,hieusp,loaisp where sanpham.id_loaisp=loaisp.id_loaisp and sanpham.id_hieusp=hieusp.id_hieusp and tensp like '%".$search."%'";
$row_timkiem=mysqli_query($conn,$sql_timkiem);
$count=mysqli_num_rows($row_timkiem);
if($count>0){
?>
<div class="tieude">Kết quả tìm kiếm</div>
<ul class="product">
    <?php
    while($sp_timkiem=mysqli_fetch_array($row_timkiem)){
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
 }else{
        echo 'Không tìm thấy kết quả';
    }
}
    ?>
</ul>

            