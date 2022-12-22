<?php
    if ($sql_dangky) {
        //lấy id mới nhất
        $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);
        //header('Location:../../index.php');
        
        $code_order = rand(0, 9999);
        $id_khachhang = $_SESSION['id_khachhang'];
        $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('" . $id_khachhang . "','" . $code_order . "',1)";
        $cart_query = mysqli_query($mysqli, $insert_cart);
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
                    header('Location:../../index.php?quanly=camon');
                }
            }
        }
        unset($_SESSION['cart']);

    

    }
?>