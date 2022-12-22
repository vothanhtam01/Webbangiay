<?php
$sql_chitiet = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham='$_GET[id]'";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    $sql_danhmuc = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = " . $row_chitiet['id_danhmuc'];
    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
    <div>
        <div>
            <a href="index . php">Trang chủ</a> /
            <a style="text-transform: lowercase" href="http://localhost/ban_hang/index.php?quanly=danhmucsanpham&id=<?php echo $row_chitiet['id_danhmuc'] ?>">
                <?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    echo $row_danhmuc['tendanhmuc'];
                } ?>
            </a>
        </div>
        <div class="product ">
            <div class="product__info ">
                <div class="product__info-img">
                    <img class="product__info-img--img1" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
                </div>
                <div class="product__info-form ">
                    <div class="product__name">
                        <?php echo $row_chitiet['tensanpham'] ?>
                    </div>
                    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>">
                        <div>
                            <p class="product__info-form--config"></p>
                            <pre class="config"><?php echo $row_chitiet['noidung'] ?></pre>
                            <br>
                            <p class="product__info-form--money"><?php echo number_format($row_chitiet['giasp'], 0, ',', '.') . 'vnđ' ?></p>
                            <br>
                            <input class="product__info-form--btn btn btn-primary btn-xl btn-full" name="themgiohang" type="submit" value="Mua hàng">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="product__title ">
           
            <div class="product__title-content ">

                <pre class="product__title-content--pre">
                <p class="product__title-content--introduction">Mô tả sản phẩm: <?php echo $row_chitiet['tensanpham'] ?></p>
                <p class="product__title-content--summary"><?php echo $row_chitiet['tomtat'] ?></p> 
            </pre>
            </div>
        </div>
    <?php
}
    ?>
    </div>
    <style>
        .product {
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
            padding: 10px 10px;
            background-color: #fff;
            border-radius: 6px;
            margin: 20px 0 20px 0;

        }

        .product__name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product__info {
            display: flex;
            margin: 10px 10px;

        }

        .product__info-img {
            margin-right: 40px;
        }

        .product__info-img--img1 {
            width: 400px;   
        }

        .product__info-form {}

        .product__info-form--money {
            padding-top: 10px;
            color: #e60000;
            font-size: 18px;
            line-height: 1.6;
            font-weight: 600;
            display: block;

        }

        .product__info-form--config {
            padding-top: 20px;
            font-size: 14px;
            border-top: 1px solid #dfe7ef;
            word-wrap: break-word;
            text-align: justify;
        }

        .config {
            background-color: #fff;
            color: #000;
            display: block;
            min-width: 100px;
            min-height: 50px;
            padding: 0;
            border: 0;
        }

        .product__info-form--btn {
            background: #EB000E;
            color: #fff;
            border: 2px #EB000E solid;
            width: 200px;
            font-size: 16px;
            line-height: 34px;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 5px;
            display: block;
            border-radius: 6px;
            height: 38px;
            padding: 0;
        }

        .product__info-form--btn:hover {
            background: #ff3945;
            border-color: #ff3945;
            opacity: .8;
        }

        .product__title {
            padding: 0 0;
        }

        .product__title-header {
            font-size: 15px;
            font-weight: 550;
            background-color: #fff;
            padding: 8px 10px;
            display: block;
            margin-top: 20px;
            margin-bottom: 18px;
            border-radius: 4px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
        }

        .product__title-content {
            padding: 0 0;
        }

        .product__title-content--pre {
            background-color: #fff;
            border: none;
            border-radius: 4px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
        }

        .product__title-content--introduction {
            margin-bottom: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .product__title-content--summary {
            font-size: 14px;

        }
    </style>