<?php
if(isset($_GET['trang'])){
    $trang=$_GET['trang'];
}else{
    $trang='';
}
if($trang =='' || $trang =='1'){
    $trang1=0;
}else{
    $trang1=($trang*10)-10;
}
$sql_lietketk = "SELECT * FROM cart order by createdate desc limit $trang1,10";
$row_lietketk=mysqli_query($conn,$sql_lietketk);

?>

<table class="table table-light">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Ngày mua</th>
        <th scope="col">Email</th>
    </tr>
    <?php
    $i=1;
    while($result=mysqli_fetch_array($row_lietketk)){

        ?>
        <tr>
            <td><?php  echo $i;?></td>
            <td><a href="index.php?quanly=thongke&ac=chitiethoadon&id=<?php echo $result['id_cart'] ?>"><?php echo $result['createdate'] ?></a></td>
            <td><?php echo $result['name'] ?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
</table>
<div class="trang">
    Trang :
    <?php
    $sql_trang=mysqli_query($conn,"SELECT * FROM cart");
    $count_trang=mysqli_num_rows($sql_trang);
    $a=ceil($count_trang/10);
    for($b=1;$b<=$a;$b++){

        if($trang==$b){

            echo '<a href="index.php?quanly=thongke&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';

        }else{
            echo '<a href="index.php?quanly=thongke&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#fff;">'.$b.' ' .'</a>';
        }
    }
    ?>
</div>
