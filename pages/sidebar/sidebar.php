
<ul class="category">
    <li class="category-items"><a href="index.php" class="category-items-link">Trang chủ</a></li>
<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc  ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
while ($row = mysqli_fetch_array($query_danhmuc)) {
    ?>
        
        <li class="category-items"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>" class="category-items-link"><?php echo $row['tendanhmuc'] ?></a></li>
    <?php
}
?>  
</ul>
