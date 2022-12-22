<?php
	session_start();
	include('config/config.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['username'];
		$matkhau = md5($_POST['password']);
		$sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
			echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng,vui lòng nhập lại.");</script>';
			header("Location:login.php");
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admincp</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<body>

<div class="login">
    <div class="d-flex align-items-center justify-content-between results">
        <div class="pb-2 m-auto">Đăng nhập admin</div>
    </div>
    <form action="" autocomplete="of" method="POST">
        <div class="container border border-2 rounded">

            <div class="row m-2">
                <div class="col-4 text-center">Tài khoản</div>
                <div class="col"><input class="w-100" type="text" name="username"></div>
            </div>
            <div class="row m-2">
                <div class="col-4 text-center">Mật khẩu</div>
                <div class="col"><input class="w-100" type="password" name="password"></div>
            </div class="row m-2">
            <div class="row m-2">
                <div class="text-center"><input type="submit" name="dangnhap" value="Đăng nhập"></div>
            </div>
        </div>
    </form>
</div>
<style>
    .login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-70%);
    }
</style>
</body>


