<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="http://localhost/ban_hang/admincp/">ADMIN</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
            </li>
            <li class="nav-item" style="position: absolute; right: 0">
                <button class="btn-danger">
                    <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất :
                        <?php if (isset($_SESSION['dangnhap'])) {
                            echo $_SESSION['dangnhap'];
                        }?>
                    </a>
                </button>
            </li>
        </ul>
    </div>
</nav>