<?php
	$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
	$query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp);
?>
<div class="d-flex justify-content-between results">
    <div style="font-weight: bold">Sửa danh mục sản phẩm</div>
</div>
<div class="w-50">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
        <?php
        while($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
        ?>
        <div class="row">
            <div class="col-3">Tên danh mục</div>
            <div class="col-7"><input class="w-100" type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></div>
            <div class="col-2"><input type="submit" name="suadanhmuc" value="Sửa"></div>
        </div>
        <?php
        }
        ?>
    </form>
</div>