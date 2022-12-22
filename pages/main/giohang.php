<div class="d-flex align-items-center justify-content-between py-4 results">

    <div class="cart">Giỏ hàng</div>
</div>
<div class="container" style="width: 100%;position: relative; left: 0; right: 0; margin: auto">
    <div class="row">
        <div class="col">
            <table class="table table__cart">
                <tr class="table__cart-category">
                    <th class="table__cart-category--title">Sản phẩm</th>
                    <th class="table__cart-category--title">Số lượng</th>
                    <th class="table__cart-category--title">Đơn giá</th>
                    <th class="table__cart-category--title">Số tiền </th>
                    <th class="table__cart-category--title">Thao tác</th>
                </tr>
                <?php
                if (isset($_SESSION['cart'])) {
                    $tongtien = 0;
                    foreach ($_SESSION['cart'] as $cart_item) {
                        $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                        $tongtien += $thanhtien;
                ?>


                        <tr class="table__cart-products">
                            <td class=" table__cart-products--info">
                                <div class="table__cart-products-one">
                                    <img class="table__cart-products-img" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px">
                                    <p class="table__cart-products-name"><?php echo $cart_item['tensanpham']; ?></p>
                                </div>

                            </td>
                            <td>
                                <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" style="color: #000; font-size: 10px;" aria-hidden="true"></i></a>
                                <?php echo $cart_item['soluong']; ?>
                                <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" style="color: #000; font-size: 10px;" aria-hidden="true"></i></a>

                            </td>
                            <td class="table__cart-products--info"><?php echo number_format($cart_item['giasp'], 0, ',', '.') . 'vnđ'; ?></td>
                            <td class="table__cart-products--info"><?php echo number_format($thanhtien, 0, ',', '.') . 'vnđ' ?></td>
                            <td class="table__cart-products--info"><button class="oder-btn"><a class="table__cart-products--link" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr class="table__oder ">
                        <td colspan="6" class="table__oder-row">
                            <div class="table__order-product">
                                <p class="table__oder-totalmoney">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . 'vnđ' ?></p>
                                <button class="oder-btn table__oder-deleteAll"><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></button>


                            </div>
                        </td>

                    </tr>
                    <tr class="table__check">
                        <td colspan="5">
                            <div class="table__check-row">
                                <button class="oder-btn table__oder-btnPay js-btn-pay"><a href="#">Đặt hàng</a></button>

                            </div>

                        </td>

                    </tr>
                <?php
                } else {
                ?>
                    <tr>
                        <td colspan="6">
                            <div class="no-cart">Giỏ hàng đang trống</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

</div>
<!-- thông tin đặt hàng -->
<!-- MODAL -->
<?php
if (isset($_POST['giohang#'])) {
    $tenkhachhang = $_POST['hovaten'];
    $diachi = $_POST['diachi'];
    $gmail = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,diachi,email,dienthoai) VALUE('" . $tenkhachhang . "','" . $diachi . "','" . $gmail . "','" . $dienthoai . "')");
    if ($sql_dangky) {
        //lấy id mới nhất
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        //header('Location:../../index.php');
    }
    $code_order = rand(0, 9999);
    $id_khachhang = $_SESSION['id_khachhang'];
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('" . $id_khachhang . "','" . $code_order . "',1)";
    $cart_query = mysqli_query($mysqli, $insert_cart);
    // header('Location: .');
    if ($cart_query) {
        //them gio hang chi tiet
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" . $id_sanpham . "','" . $code_order . "','" . $soluong . "')";

            $san_pham = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_sanpham = " . $id_sanpham . ";";
            $query_sanpham = mysqli_query($mysqli, $san_pham);
            $soluong_sp = 0;

            while ($row = mysqli_fetch_array($query_sanpham)) {
                $soluong_sp = $row['soluong'];
            }
            $soluong_sp = $soluong_sp - $soluong;
            $check = $soluong_sp < 0;
            if ($check == 1) {

                $del_cart = "DELETE FROM tbl_cart WHERE code_cart=" . $code_order . ";";
                $del_cart_detail = "DELETE FROM tbl_cart_details WHERE code_cart=" . $code_order . ";";
                mysqli_query($mysqli, $del_cart);
                mysqli_query($mysqli, $del_cart_detail);
                header('Location:../../index.php?quanly=xinloi');
            } else {
                $update_sanpham = "UPDATE tbl_sanpham SET tbl_sanpham.soluong = " . $soluong_sp . " WHERE tbl_sanpham.id_sanpham = " . $id_sanpham . ";";
                mysqli_query($mysqli, $update_sanpham);
                mysqli_query($mysqli, $insert_order_details);
                echo " <script type=\"text/javascript\"> document.location.replace(\"http://localhost/ban_hang/index.php?quanly=camon\"); </script>";
            }
        }
    }
    unset($_SESSION['cart']);

    //  require 'pages/main/thanhtoan.php'; 
}

?>

<div class="modal12 js-modal">
    <div class="modal_container">
        <i class="fas fa-times modal_icon js-icon"></i>
        <div class="modal_header">

            <p class="modal_info-customer">
                Thông tin khách hàng
            </p>
        </div>

        <body class="modal_body">
            <form action="" method="POST" class="modal_form">
                <lable class="modal_lable">
                    <p class="modal_lable-title">
                        Họ và tên
                    </p>
                </lable>
                <input type="text" class="modal_input" name="hovaten" required>

                <lable class="modal_lable">
                    <p class="modal_lable-title">
                        Địa chỉ
                    </p>
                </lable>
                <input type="text" class="modal_input" name="diachi" required>

                <lable class="modal_lable">
                    <p class="modal_lable-title">
                        Gmail
                    </p>
                </lable>
                <input type="text" class="modal_input" name="email" required>

                <lable class="modal_lable">
                    <p class="modal_lable-title">
                        Số điện thoại
                    </p>
                </lable>
                <input type="text" class="modal_input" name="dienthoai" required>



                <div class="modal_btn">
                    <button type="submit" name="giohang#" class="modal_btn-pay">HOÀN TẤT ĐẶT HÀNG</button>

                </div>
            </form>

        </body>
        <footer class="modal_footer">

        </footer>
    </div>
</div>

<script>
    const icon = document.querySelector('.js-icon')
    const btnPay = document.querySelector('.js-btn-pay')
    const modal = document.querySelector('.modal12')
    const modalContainer = document.querySelector('.modal_container')

    function showModal() {
        modal.classList.add('open')
    }

    function hideModal() {
        modal.classList.remove('open')
    }

    function proparation() {
        event.stopPropagation()
    }
    btnPay.addEventListener('click', showModal)
    icon.addEventListener('click', hideModal)
    modal.addEventListener('click', hideModal)
    modalContainer.addEventListener('click', proparation)
</script>


<style>
    .slider,
    #home-block {
        display: none;
    }

    .cart {
        margin-top: 30px;
        margin-bottom: 25px;
        text-align: center;
        font-size: 24px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .table__cart {
        background-color: #fff;
        border: 1px solid #ddd;


    }

    .table__cart-category {}

    .table__cart-category--title {}

    .table__cart-products {}

    .table__cart-products-img {}

    .table__cart-products-name {
        font-weight: bold;
        padding-left: 20px;
    }

    .table__cart-products--info {}

    .table__cart-products-one {
        display: flex;
    }

    .table__cart-products--link {}

    .table__oder {}

    .table__oder-row {
        right: 0;
    }

    .table__order-product {
        display: flex;
        text-align: center;
        justify-content: space-between;
        align-items: baseline;
        padding-right: 28px;
    }

    .table__oder-totalmoney {
        font-weight: 700;
        font-size: 16px;
    }

    .table__oder-deleteAll {}

    .table__oder-btnPay {}

    .table__check {}

    .table__check-row {
        text-align: center;

    }

    .table__check-note {
        min-width: 800px;
        height: 50px;
        border: 1px solid #ccc;
        padding: 5px 5px;
    }

    .oder-btn {
        background-color: #dd2b2b;
        border: 0;
        border-radius: 2px;
        color: #fff;
        padding: 8px 8px;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 500;
    }

    .oder-btn:hover {
        background: #ff3945;
        border-color: #ff3945;
        opacity: .9;
    }

    .no-cart {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        color: #dd2b2b;

    }

    a {
        text-decoration: none !important;
        color: #fff;

    }

    a:hover {
        color: #fff;
    }

    /* modal */
</style>