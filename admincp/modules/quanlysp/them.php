<div class="d-flex justify-content-between results">
    <div style="font-weight: bold">Thêm sản phẩm</div>
</div>
<div class="w-100 border border-1 container rounded">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data" class="p-2">
        <div class="row p-2">
            <div class="col-2">Tên sản phẩm</div>
            <div class="col"><input class="w-100" type="text" name="tensanpham"></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Mã sp</div>
            <div class="col"><input class="w-100" type="text" name="masp"></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Giá sp</div>
            <div class="col"><input class="w-100" type="text" name="giasp"></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Số lượng</div>
            <div class="col"><input class="w-100" type="text" name="soluong"></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Hình ảnh</div>
            <div class="col"><input class="w-100" type="file" name="hinhanh"></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Tóm tắt</div>
            <div class="col"><textarea class="w-100" name="tomtat" style="resize: none"></textarea></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Nội dung</div>
            <div class="col"><textarea class="w-100" name="noidung"></textarea></div>
        </div>
        <div class="row p-2">
            <div class="col-2">Danh mục sản phẩm</div>
            <div class="col">
                <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row p-2">
            <div class="col-2">Tình trạng</div>
            <div class="col">
                <select name="tinhtrang">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
        </div>
        <div class="row p-2 text-center">
            <div><input type="submit" name="themsanpham" value="Thêm sản phẩm"></div>
        </div>
    </form>
</div>