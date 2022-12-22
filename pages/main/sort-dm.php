
<?php
include('../../admincp/config/config.php');

if (isset($_POST["id"] , $_POST["value"])) {
    //lấy tham số từ ajax
    $id = $_POST["id"];
    $request = $_POST["value"];
    $sql_pro = "SELECT * FROM tbl_sanpham where tbl_sanpham.id_danhmuc='$id' ORDER BY  $request";
    $query   = mysqli_query($mysqli, $sql_pro);
?>

    <!-- //hiển thị tên danh mục -->
    
    <!-- hiển  thị sản phẩm -->
    <div class="home__categry-product ">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
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