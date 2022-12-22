<div class="grip">
    <div class="header__main">
        <a href="index.php" class="logo-link">
            <img src="assets/img/logo_header.jpg" alt="" class="header__main-logo">
        </a>
        <form class="header__main-formSearch" action="index.php?quanly=timkiem" method="POST">
            <div class="header__main-formSearch--list">
                <input type="text" class="search" name="tukhoa" required>
                <input class="btn btn-outline-success m-1" type="submit" name="timkiem" value="Tìm kiếm">

            </div>
        </form>
        <a href="index.php?quanly=giohang" class="header__main-cart">
            <i class="fas fa-cart-plus header__main-cart-icon "></i>
            <?php
            if (isset($_SESSION['cart'])) {
                $count = 0;
                foreach ($_SESSION['cart'] as $product) {

                    $count++;

            ?>
                <?php
                }
                ?>
                <button class="header__main-cout--cart">
                    <?php
                    echo $count;
                    ?>

                </button>
            <?php
            }
            ?>
        </a>
    </div>
</div>