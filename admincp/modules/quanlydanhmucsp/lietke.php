<?php
	$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY tbl_danhmuc.id_danhmuc DESC";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<div class="d-flex justify-content-between results">
    <div style="font-weight: bold">Liệt kê danh mục sản phẩm</div>
</div>

<table class="table">
    <tr>
        <th class="text-center">Id</th>
        <th>Tên danh mục</th>
        <th class="text-center">Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
    ?>
    <tr>
        <td class="text-center"><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td class="text-center">
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a>
            |
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>