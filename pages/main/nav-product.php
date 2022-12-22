<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 3) - 3;
}
$sql_new = "SELECT * FROM tbl_sanpham ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 5";
$query_new = mysqli_query($mysqli, $sql_new);
$sql_pro = "SELECT * FROM tbl_sanpham ORDER BY tbl_sanpham.soluong ASC LIMIT 5";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<!--  -->
<h2 class="home__head">
    <a href="" class="home__head-link">SẢN PHẨM MỚI</a>
</h2>
<!-- chứa sản phẩm -->
<div class="home__categry-product row">
    <?php
    while ($row = mysqli_fetch_array($query_new)) {
    ?>
        <!-- 1 sp -->
        <div class="col-xs-6 col-md-5ths  home__categry-product--items ">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="link-product">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="product-img">
                <p class="product-title">
                    <?php echo $row['tensanpham'] ?>
                </p>
                <p class="money-product">
                    <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                </p>
            </a>
        </div>
    <?php
    }
    ?>

</div>
<!--  -->
<h2 class="home__head">
    <a href="" class="home__head-link">SẢN PHẨM BÁN CHẠY</a>
</h2>
<!-- chứa sản phẩm -->
<div class="home__categry-product row">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <!-- 1 sp -->
        <div class="col-xs-6 col-md-5ths home__categry-product--items ">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="link-product">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="product-img">
                <p class="product-title">
                    <?php echo $row['tensanpham'] ?>
                </p>
                <p class="money-product">
                    <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                </p>
            </a>
        </div>
    <?php
    }
    ?>

</div>


<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
foreach ($query_danhmuc as $danhmuc) {
    // echo " <script type=\"text/javascript\"> console.log(" . $danhmuc['tendanhmuc'] . "); </script>";
    $id_danhmuc = $danhmuc['id_danhmuc'];
    $sql_sanpham = "SELECT * FROM tbl_sanpham  WHERE id_danhmuc = $id_danhmuc limit 5" ;
    $query_sanpham = mysqli_query($mysqli, $sql_sanpham);
?>
    <h2 class="home__head">
        <a class="home__head-link"><?php echo $danhmuc['tendanhmuc'] ?></a>
        <a href="<?php echo  "/ban_hang/index.php?quanly=danhmucsanpham&id=" . $id_danhmuc; ?>" class="see_more">Xem thêm >></a>
    </h2>
    <!-- chứa sản phẩm -->
    <div class="home__categry-product row">
        <?php
        while ($row = mysqli_fetch_array($query_sanpham)) {
        ?>
            <!-- 1 sp -->
            <div class="col-xs-6 col-md-5ths home__categry-product--items ">
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="link-product">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="product-img">
                    <p class="product-title">
                        <?php echo $row['tensanpham'] ?>
                    </p>
                    <p class="money-product">
                        <?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?>
                    </p>
                </a>
            </div>
        <?php
        }
        ?>

    </div>

<?php
}
?>
<!--  -->
</div>