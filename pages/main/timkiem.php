<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.tensanpham LIKE '%" . $tukhoa . "%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<div>
    <?php
    $rowcount=mysqli_num_rows($query_pro);
    if ($rowcount == 0) {
        echo 'Không tìm thấy sản phẩm cho từ khóa ' . '"' . $tukhoa . '"';
    }
    ?>
</div>
<div class="home__categry-product row">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <!-- 1 sp -->
        <div class=" col-md-3 home__categry-product--items ">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="link-product">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="product-img">
                <p class="product-title">
                    <?php echo $row['tensanpham'] ?>
                </p>
                <p class="money-product">
                    <?php echo number_format($row['giasp'], 0, ',', '.') . ' ' . 'vnđ' ?>
                </p>
            </a>
        </div>
    <?php
    }
    ?>
</div>
