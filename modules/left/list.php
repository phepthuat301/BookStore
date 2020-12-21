<?php
	$sql_loai="select * from loaisp where tinhtrang='1' order by id_loaisp asc";
	$row_loai=mysqli_query($conn,$sql_loai)
?>
<div class="box_list">
            <div class="tieude">
            	<h3>Thể Loại</h3>
            </div>
            	<ul class="list">
                <?php
				while($dong_loai=mysqli_fetch_array($row_loai)){
				?>
                	<li><a href="index.php?quanly=loaisp&id=<?php echo $dong_loai['id_loaisp'] ?>"><?php echo $dong_loai['tenloaisp'] ?></a></li>
                  <?php
				}
				  ?>
                </ul>
                </div>
               <?php
	$sql_hieu="select * from hieusp where tinhtrang='1' order by id_hieusp asc";
	$row_hieu=mysqli_query($conn,$sql_hieu);
?>
                <div class="box_list">
            <div class="tieude">
            	<h3>Nhà Xuất Bản</h3>
            </div>
            	<ul class="list">
                <?php
				while($dong_hieu=mysqli_fetch_array($row_hieu)){
				?>
                	<li><a href="index.php?quanly=hieusp&id=<?php echo $dong_hieu['id_hieusp'] ?>"><?php echo $dong_hieu['tenhieusp'] ?></a></li>
                  <?php
				}
				  ?>
                </ul>
                </div>
                 <div class="box_list">
                 
                   <div class="tieude">
            	        <h3>Sách Nên Mua</h3>
            		</div>
                    <?php
					$sql_banchay=mysqli_query($conn,"select * from sanpham where tinhtrang ='1' order by id_sp desc limit 5");
					
					?>
            	<ul class="hangbanchay">	
                <?php
				while($dong_banchay=mysqli_fetch_array($sql_banchay)){
				?>
                	<li><a href="?quanly=chitietsp&id_loaisp=<?php echo $dong_banchay['id_loaisp'] ?>&id=<?php echo $dong_banchay['id_sp'] ?>">
                    	<img src="admincp/modules/quanlysanpham/uploads/<?php echo $dong_banchay['hinhanh'] ?>" width="150" height="150" />
                    	<p><?php echo $dong_banchay['tensp'] ?></p>
                        <p style="color:red;"><?php echo number_format($dong_banchay['giadexuat']).' '.'VNĐ' ?></p>
                    </a></li>
                    <?php
				}
					?>
                </ul>
                </div>
