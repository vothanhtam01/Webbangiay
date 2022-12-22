<?php
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>

<?php
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['dangky']);
    }
?>

<nar class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; width: 60%; z-index: 99; font-weight: bold; border-bottom: 1px solid black">
    <div class="collapse navbar-collapse">
        <div class="navbar-nav">
            <div class="nav-item active px-3 py-1">
                <a class="nav-link" href="index.php">Trang chủ</a>
            </div>
            <div class="nav-item active px-3 py-1">
                <a class="nav-link" href="index.php?quanly=lienhe">Liên hệ</a>
            </div>
            <div class="nav-item active px-3 py-1" style="display: inherit">
                <i class="fas fa-shopping-cart" style="position: relative; top: 12px"></i>
                <a class="nav-link" href="index.php?quanly=giohang">Giỏ hàng</a>
            </div>
            <?php
            if (isset($_SESSION['dangky'])) {
                ?>
                <div class="nav-item active px-3 py-1">
                    <a class="nav-link" href="index.php?dangxuat=1">Đăng xuất</a>
                </div>
                <div class="nav-item active px-3 py-1">
                    <a class="nav-link" href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a>
                </div>
                <?php
            } else {
                ?>
                <div class="nav-item active px-3 py-1">
                    <a class="nav-link" href="index.php?quanly=dangky">Đăng ký</a>
                </div>
                <div class="nav-item active px-3 py-1">
                    <a class="nav-link" href="index.php?quanly=dangnhap">Đăng nhập</a>
                </div>
                <?php
            }
            ?>
<!--            <div class="nav-item active px-3 py-1">-->
<!--                <a class="nav-link" href="admincp/index.php">Admin</a>-->
<!--            </div>-->
        </div>
    </div>
    <!-- tìm kiếm  -->
    <nav class="navbar navbar-light bg-light">
        <form style="display: inherit" action="index.php?quanly=timkiem" method="POST">
            <input class="form-control m-1 border-dark" type="search" placeholder="Tìm kiếm sản phẩm" name="tukhoa" required>
            <select class="selectpicker border border-1 border-dark rounded" name="danhmuc" style="width: 78px; height: 38px; position: relative; top: 4px;">

                <?php
                while ($row = mysqli_fetch_array($query_danhmuc)) {?>
                    <option value="<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></option>
                    <?php
                }
                ?>
            </select>
            <input class="btn btn-outline-success m-1" type="submit" name="timkiem" value="Tìm kiếm">
        </form>
    </nav>
</nar>

<div style="height: 70px">
</div>