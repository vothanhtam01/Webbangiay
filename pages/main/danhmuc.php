<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$id' ORDER BY id_sanpham DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
// //get ten danh muc
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$id' LIMIT 1";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<div class="header-home-product">
    <div class="results">
        <div class="name-category"><?php echo $row_title['tendanhmuc'] ?></div>
    </div>
    <!-- lọc theo giá -->
    <div class="form-inline">
        <label>Sắp xếp theo</label>
        <select name="sort-product" id="sort-product" class="form-control">
            <option value="id_sanpham DESC">Mới nhất</option>
            <option value="giasp ASC">Giá từ thấp đến cao</option>
            <option value="giasp DESC">Giá từ cao đến thấp</option>
        </select>
    </div>
</div>
<div class="home__categry-product row">
    <?php
    while ($row = mysqli_fetch_assoc($query_pro)) {
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#sort-product").on("change", function() {
            // lấy tên value option
            var value = $(this).val();
            var id = <?php echo $_GET['id']; ?>;
            $.ajax({
                url: "pages/main/sort-dm.php",
                type: "POST",
                data: {
                    id: id,
                    value: value
                },
                BeforeSend: function() {
                    $(".home__product").html("<span>Working...</span>");
                },

                success: function(data) {
                    //  vùng chứa
                    $(".home__categry-product ").html(data);
                }
            });

        });
    });
</script>