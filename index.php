<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giày XSHOP</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="bs3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-beta2-web/css/all.css">
</head>

<body>
    <?php
    session_start()
    ?>
    <main class="main">
        <header class="header">
        <?php
                            include("admincp/config/config.php");
                            include("pages/main/header.php");
                            ?>
            <div class="header__nav">
                <div class="grip">
                    <div class="nav__list" style="justify-content: center;">
                        <div>
                            <?php
                            include("admincp/config/config.php");
                            include("pages/sidebar/sidebar.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="slider container">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img src="assets/img/bander1.png" alt=""> 
                       
                    </div>
                    <div class="item">
                        <img src="assets/img/bander3.jpg" alt="">
                    </div>
                    <div class="item active">
                        <img style="height: 380px;" src="assets/img/banner4.jpg" alt="">

                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

        </div>
        <div class="content">
            <div id="home-block" class="container ">
                <div class="">
                    <a href="" class="col-md-3 home-block-link">
                        <img src="assets/img/moi100.png" alt="" class="img-responsive ">
                    </a>
                </div>
                <div class="">
                    <a href="" class="col-md-3 home-block-link">
                        <img src="assets/img/mienphi_vc.png" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="">
                    <a href="" class="col-md-3 home-block-link">
                        <img src="assets/img/giaohang2h.png" alt="" class="img-responsive">
                    </a>
                </div>
                <div class="">
                    <a href="" class="col-md-3 home-block-link">
                        <img src="assets/img/baohanh.png" alt="" class="img-responsive">
                    </a>
                </div>
            </div>

        </div>
        <div class=" home__product container">
            <div class="home">
                <div>
                    <?php
                    include("admincp/config/config.php");
                    include("pages/main.php");
                    ?>
                </div>
            </div>
        </div>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                     <img src="assets/img/logo_header.jpg" alt="" class="header__main-logo"> 
                      
                        <p class="text-justify"> Hệ thống giày thể thao số 1 Hà Nội  <br>

                                                 Tại shop chúng tôi các nhân viên luôn hỗ trợ khách hàng nhiệt tình nhất.Các sản phẩm của chúng tôi bảo đảm chất lượng 100%, sản phẩm được ưa chuộng cũng nhưng đc khách hàng trên cả nước tin dùng. Shop chúng tôi đảm bảo đem lại cảm giác thoải mái nhất đến với đôi chân của mọi người. Shop xin cảm ơn mọi người đã tin tưởng và sử dụng sản phẩm cảu shop!  <br>

                                                 

                        </p>
                    </div>

                    <div class="col-xs-6 col-md-2">
                        <h4>HỖ TRỢ</h4>
                        <ul class="footer-links">
                            <li><a href="http://scanfcode.com/category/c-language/">7 cách bảo vệ giày thể thao tốt nhất</a></li>
                            <li><a href="http://scanfcode.com/category/front-end-development/">Giữ “phong độ” cho Sneaker trắng ra sao</a></li>
                            <li><a href="http://scanfcode.com/category/back-end-development/">9 kỹ thuật làm đẹp dành cho U30</a></li>
                        <!--    <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
                            <li><a href="http://scanfcode.com/category/android/">Android</a></li>
                            <li><a href="http://scanfcode.com/category/templates/">Templates</a></li> -->
                        </ul>
                    </div>

                    <div class="col-xs-6 col-md-2">
                        <h4>DỊCH VỤ KHÁC HÀNG</h4>
                        <ul class="footer-links">
                            <li><a href="http://scanfcode.com/about/">Giới thiệu XSHOP</a></li>
                            <li><a href="http://scanfcode.com/contact/">Hướng dẫn đặt hàng</a></li>
                            <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Chính sách đổi trả và bảo hành</a></li>
                            <li><a href="http://scanfcode.com/privacy-policy/">Chính sách bảo mật</a></li>
                            <li><a href="http://scanfcode.com/sitemap/">Liên hệ XSHOP</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <h4>LIÊN HỆ</h4>
                        <p class="text-justify"> Hotline 097.567.1080 <br>

                                                 Store 1: 57 Quan Hoa, Cầu Giấy, HN <br>

                                                 Store 2: 29 Trần Đại Nghĩa, Hai Bà Trưng, HN <br>

                                                 Email: lienhe@shopgiay.com
                                                </p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <p class="copyright-text">Copyright &copy; © 2021 – ShopGiay.com
                            <a href="#">- ShopGiay.</a>.
                        </p>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <ul class="social-icons">
                            <li><a class="facebooks" href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a class="instagrams" href="#"><i class="fab fa-instagram"></i></i></a></li>
                            <li><a class="googles" href="#"><i class="fab fa-google-plus"></i></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="assets/js/jquery.js"></script>
    <script src="bs3/js/bootstrap.min.js"></script>
</body>

</html>