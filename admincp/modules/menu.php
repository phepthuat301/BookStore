<?php
	if(isset($_POST['logout'])){
		unset($_SESSION['dangnhap']);
		header('location:login.php');
	}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style=" text-transform: uppercase;">
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=loaisp&amp;ac=them">Quản lý loại sp</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=hieusp&amp;ac=them">Quản lý hiệu sp</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=sanpham&amp;ac=them">Quản lý sản phẩm</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=thongke&amp;ac=lietke">Quản lý thống kê</a></li>
            <form action="" method="post" enctype="multipart/form-data" style="padding: 5px;">
                <input type="submit" name="logout" value="Đăng xuất" style="background: #fff;/* color:#fff; */width:200px;height:30px;">
            </form>
        </ul>
<form action="index.php?quanly=timkiem&ac=sp" method="post" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
    <input type="text" name="masp" placeholder="Nhập tên sản phẩm..."  required="required" class="form-control mr-sm-2" />
    <button type="submit" name="timkiem" class="btn my-2 my-sm-0" style="
    background-color: white;
">Search</button>
</form>
    </div>
</nav>