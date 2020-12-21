<?php
if(isset($_GET['trang'])){
    $trang=$_GET['trang'];
}else{
    $trang='';
}
if($trang =='' || $trang =='1'){
    $trang1=0;
}else{
    $trang1=($trang*15)-15;
}
$sql="select * from sanpham where tinhtrang='1' limit $trang1,15";
$row_tatca=mysqli_query($conn,$sql);
?>
<div class="tieude">Tất cả sản phẩm</div>
<div>
<ul class="product">
    <?php
    while($sp_tatca=mysqli_fetch_array($row_tatca)){
        ?>
        <li><a href="?quanly=chitietsp&id_loaisp=<?php echo $sp_tatca['id_loaisp'] ?>&id=<?php echo $sp_tatca['id_sp'] ?>">
                <img src="admincp/modules/quanlysanpham/uploads/<?php echo $sp_tatca['hinhanh'] ?>" width="150" height="150" />
                <p><?php echo $sp_tatca['tensp'] ?></p>
                <p style="color:red;font-weight:bold; border:1px solid #d9d9d9; width:150px;
                            height:30px; line-height:30px;margin-left:35px;margin-bottom:5px;"><?php echo number_format($sp_tatca['giadexuat']).' '.'VNĐ'?></p>
            </a>
        </li>
    <?php } ?>
</ul>
</div>
<div style="text-align: center;font-size: 25px;font-style: italic;color:#000000">
    <a>Trang :</a>
    <?php
    $sql_trang=mysqli_query($conn,"select * from sanpham");
    $count_sp=mysqli_num_rows($sql_trang);
    $sotrang=ceil($count_sp/15);
    for($b=1;$b<=$sotrang;$b++){

        if($trang==$b){

            echo '<a href="?quanly=tatcasp&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';

        }else{
            echo '<a href="?quanly=tatcasp&trang='.$b.'" style="color:#000000;text-decoration:none;">'.$b.' ' .'</a>';
        }
    }
    ?>
</div>