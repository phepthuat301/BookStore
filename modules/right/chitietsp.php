<?php

$sql="select * from sanpham where id_sp='$_GET[id]'";
$num=mysqli_query($conn,$sql);
$dong=mysqli_fetch_array($num);
if(isset($_POST['add_to_cart'])){
    $id=$_GET['id'];
    $soluong=$_POST['soluong'];
    $sql="select * from sanpham where id_sp='$id' limit 1";
    $row=mysqli_query($conn,$sql);
    $dong=mysqli_fetch_array($row);
    if($dong){
        $new_product=array(array('tensp'=>$dong['tensp'],'id'=>$id,'soluong'=>$soluong,'gia'=>$dong['giadexuat']));
        if(isset($_SESSION['product'])){
            $found=true;
            foreach($_SESSION['product'] as $cart_item){
                if($cart_item['id'] == $id){
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$soluong,'gia'=>$cart_item['gia']);
                    $found=true;
                }else{
                    $product[]=array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia']);
                }

            }if($found==true){
                $_SESSION['product']=array_merge($product,$new_product);
            }else{
                $_SESSION['product']=$product;
            }
        }else{
            $_SESSION['product']=$new_product;
        }
    }
    if($soluong > $dong['soluong']){
        echo'<p style="color: red">Vượt quá số lượng hàng đang có!</p>';
        unset($_SESSION['product']);
    }
    else{
    echo'<p style="color: green">Cập Nhật Số Lượng Thành Công. Vui lòng bấm vào nút tiếp tục để mua hàng!</p>';
    echo'<a href="index.php?quanly=dathang" >Tiếp Tục</a>';
    }
}
?>

<div class="tieude">Chi tiết sản phẩm</div>
<div class="box_chitietsp">
    <div class="box_hinhanh">
        <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>"width="230" height="280" />
        <?php
        $sql_gallery=mysqli_query($conn,"select * from gallery where id_sp='$_GET[id]' limit 3");
        $row_gallery=mysqli_num_rows($sql_gallery);
        ?>
    </div>
    <div class="box_info">
        <form action="#" method="post" enctype="multipart/form-data">
            <p><strong>Tên sản phẫm: </strong><em style="color:red; font-size:1.5em"><?php echo $dong['tensp'] ?></em></p>
            <p><strong>Mã sản phẩm:</strong>  <?php echo $dong['masp'] ?> </p>
            <p><strong>Giá bán:</strong><span style="color:red;"> <?php echo number_format($dong['giadexuat']).' '.'VNĐ'?></span></p>
            <p style="color:blue;"><strong> Tình trạng:</strong> Còn hàng(<?php echo ($dong['soluong']) ?>) </p>
            <p><strong>Số lượng:</strong><input type="number" name="soluong" min="1" value="1" style="width:50px;"/></p>
            <input type="submit" name="add_to_cart" value="Mua Hàng" style="margin:10px;width:100px;height:40px;background: #5fafdb;color: #fff;font-size:18px;border-radius: 8px;border: 2px solid white;">

        </form>
    </div><!-- Ket thuc box box_info -->
</div><!-- Ket thuc box chitiet sp -->
<div class="tabs_panel">
    <ul class="tabs">
        <li rel="panel1" class="active">Thông tin sản phẩm</li>
        <li rel="panel2">Hình ảnh sản phẫm</li>
        <li rel="panel3">Khách hàng đánh giá</li>
    </ul>
    <?php
    $sql_thongtinsp=mysqli_query($conn,"select * from sanpham where id_sp='$_GET[id]'");
    $count_thongtinsp=mysqli_num_rows($sql_thongtinsp);
    if($count_thongtinsp>0){
        $dong_thongtinsp=mysqli_fetch_array($sql_thongtinsp);

        ?>
        <div id="panel1" class="panel active">
            <p><?php echo $dong_thongtinsp['noidung'] ?></p>

        </div>
        <?php
    }else{
        echo '<p style="padding:30px;">Hiện chưa có thông tin chính thức</p>';
    }
    ?>
    <div id="panel2" class="panel">
        <?php
        $sql_hinhanhsp=mysqli_query($conn,"select * from gallery where id_sp='$_GET[id]'");
        $count=mysqli_num_rows($sql_hinhanhsp);
        if($count>0){
            while($dong_hinhanhsp=mysqli_fetch_array($sql_hinhanhsp)){

                ?>
                <p style="text-align:center;"><img src="admincp/modules/gallery/uploads/<?php echo $dong_hinhanhsp['hinhanhsp'] ?>" width="600" height="600" /></p>
                <?php
            }
        }else{
            echo '<p>Chưa có hình ảnh</p>';
        }
        ?>
    </div>

    <div id="panel3" class="panel">
        <p><a href="#">Nam</a>: Sách hay</p>

    </div>

</div>
<?php
$sql_lienquan="select * from sanpham where id_loaisp='$_GET[id_loaisp]' and id_sp<>$_GET[id] limit 6";
$row_lienquan=mysqli_query($conn,$sql_lienquan);
$count_lienquan=mysqli_num_rows($row_lienquan);
if($count_lienquan>0){
    ?>
    <div class="sanphamlienquan">
        <div class="tieude">Sản phẩm liên quan</div>
        <ul>
            <?php

            while($dong_lienquan=mysqli_fetch_array($row_lienquan)){
                ?>
                <li><a href="?quanly=chitietsp&id_loaisp=<?php echo $dong_lienquan['id_loaisp'] ?>&id=<?php echo $dong_lienquan['id_sp'] ?>">
                        <img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_lienquan['hinhanh'] ?>" width="150" height="150" />
                        <p>Tên sp : <?php echo $dong_lienquan['tensp'] ?></p>
                        <p style="color:red;">Giá : <?php echo number_format($dong_lienquan['giadexuat']).' '.'VNĐ' ?></p>


                    </a></li>
                <?php
            }
            ?>
        </ul>
    </div><!-- Ket thuc box sp liên quan -->
    <?php
}else{
    echo'<div class="tieude">Sản phẩm liên quan</div>';
    echo '<p style="padding:30px;">Hiện chưa có thêm sản phẩm nào</p>';
}
?>
<div class="clear"></div>

