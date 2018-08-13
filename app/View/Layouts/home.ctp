<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $this->Html->css('home/owl.carousel.min'); ?>
    <?php echo $this->Html->css('home/owl.theme.default.min'); ?>
    <?php echo $this->Html->css('home/style'); ?>
    <title><?php if(!empty($titleSeo)){echo $titleSeo;}else{if(!empty($title_for_layout)){echo $title_for_layout;}}?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <?php echo $this->Html->script('home/jquery.min'); ?>
    <?php echo $this->Html->script('home/script'); ?>
<!--    <meta name="keywords" content="--><?php //if(!empty($keyWordSeo)){echo $keyWordSeo;}else{echo "taxi đường dài, taxi di tinh, taxi chieu ve, taxi đường dài giá rẻ, taxi sân bay, taxi san bay, taxi sân bay giá rẻ, taxigo, taxi nội bài.";}?><!--" />-->
    <meta name="author" content="Đệ nhất cổng" />
<!--    <meta name="description" content="--><?php //if(!empty($desciptionSeo)){echo $desciptionSeo;}else{echo "Taxi Nội Bài giá rẻ chỉ từ 160.000đ, Taxi Sân Bay giá rẻ nhất. Ứng dụng đặt xe taxi đường dài giá rẻ chỉ 5000đ/km, Taxi Nội Bài giá rẻ nhất. Tổng đài 1900 0370.";} ?><!--" />-->
</head>
<body>
<header>
    <div class="container">
        <div class="row text-right text-font text-white head-info d-none d-sm-none d-md-block">
            <div class="col-md-12 mt-2">
                <span style="margin-right: 15px;"><i class="fa fa-phone" aria-hidden="true"></i> Hotline điện thoại và Zalo: 0936 535 308 (Dũng)</span>
                <span><i class="fa fa-envelope" aria-hidden="true"></i> Vipcard68@gmail.com</span>
            </div>
        </div>
        <nav class="mb-3">
            <div class="d-none d-sm-none d-md-block">
                <div class="row d-flex align-items-end">
                    <div class="col logo-line text-right">
                        <img src="images/logo-left.png" alt="" class="img-fluid"/>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php"><img src="images/logo.png" alt="" class="img-fluid"/></a>
                    </div>
                    <div class="col logo-line text-left">
                        <img src="images/logo-right.png" alt="" class="img-fluid"/>
                    </div>
                </div>
            </div>
            <div id='cssmenu' class="text-center">
                <ul>
                    <li><a href='index.php'>Trang chủ</a></li>
                    <li><a href=''>Giới thiệu</a></li>
                    <li class='active has-sub'><a href='#'>Sản phẩm</a>
                        <ul>
                            <li class='has-sub'><a href='#'>Cổng nhôm đúc</a>
                                <ul>
                                    <li><a href='#'>Sub Product</a></li>
                                    <li><a href='#'>Sub Product</a></li>
                                </ul>
                            </li>
                            <li class='has-sub'><a href='#'>Lan can - Ban công</a>
                                <ul>
                                    <li><a href='#'>Sub Product</a></li>
                                    <li><a href='#'>Sub Product</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href='album.php'>Công trình</a></li>
                    <li><a href='album.php'>Xưởng SX</a></li>
                    <li><a href='category.php'>Tin tức</a></li>
                    <li><a href='contact.php'>Liên hệ</a></li>
                </ul>
            </div>
            <div class="d-none d-sm-none d-md-block">
                <div class="row d-flex align-items-top">
                    <div class="col logo-line text-right">
                        <img src="images/line-bottom-left.png" alt="" class="img-fluid"/>
                    </div>
                    <div class="col-md-1" style="padding: 0">
                        <a href="index.php"><img src="images/icon-bottom.png" alt="" class="img-fluid"/></a>
                    </div>
                    <div class="col logo-line text-left">
                        <img src="images/line-bottom-right.png" alt="" class="img-fluid"/>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<?php echo $this->fetch('content'); ?>
<footer class="text-font pt-4 pb-5 mt-3">
    <div class="container">
        <div class="footer">
            <div class="row py-4">
                <div class="col-md">
                    <a href=""><img src="images/logo.png" alt="Logo" class="img-fluid"/></a>
                </div>
                <div class="col-md">
                    <h4>Liên hệ</h4>
                    <address>
                        <p class="mb-0"><i class="fa fa-map-marker pr-3"></i> 277 Vũ Tông Phan, Thanh Xuân, Hà Nội</p>
                        <p class="mb-0"><i class="fa fa-phone pr-3"></i> 0936.535.308</p>
                        <p class="mb-0"><i class="fa fa-envelope-o pr-3"></i> vipcard68@gmail.com</p>
                        <p class="mb-0"><i class="fa fa-globe pr-3"></i> www.denhatcong.vn</p>
                    </address>
                </div>
                <div class="col-md">
                    <h4>Giới thiệu</h4>
                    <ul class="list-link">
                        <li><a href="" title="">Sản phẩm</a></li>
                        <li><a href="" title="">Cổng nhôm đúc</a></li>
                        <li><a href="" title="">Lan can - Ban công</a></li>
                        <li><a href="" title="">Cầu thang nhôm đúc</a></li>
                        <li><a href="" title="">Hàng rào nhôm đúc</a></li>
                    </ul>
                </div>
                <div class="col-md">
                    <h4>Hướng dẫn</h4>
                    <ul class="list-link">
                        <li><a href="" title="">Hướng dẫn chọn sản phẩm</a></li>
                        <li><a href="" title="">Chính sách đổi trả</a></li>
                        <li><a href="" title="">Thanh toán giao nhận</a></li>
                        <li><a href="" title="">Chính sách bảo mật</a></li>
                        <li><a href="" title="">Câu hỏi thường gặp</a></li>
                        <li><a href="" title="">Hướng dẫn bảo quản</a></li>
                    </ul>
                </div>
                <div class="col-md">
                    <h4>Chứng nhận</h4>
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="" title=""><img src="images/MasterCard_logo.png" width="60" alt="" title="" class="img-fluid"/></a></li>
                        <li class="list-inline-item"><a href="" title=""><img src="images/maestro-logo.png" width="60" alt="" title="" class="img-fluid"/></a></li>
                        <li class="list-inline-item"><a href="" title=""><img src="images/visalogo.jpeg" width="60" alt="" title="" class="img-fluid"/></a></li>
                    </ul>
                    <a href="" title="">
                        <img src="images/dangky.png" class="img-fluid" alt=""/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php echo $this->Html->script('home/owl.carousel'); ?>
<script>
    $(document).ready(function () {
        var owl = $('.banner');
        owl.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000])
        })
        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay')
        });

        $('.loop').owlCarousel({
            center: true,
            items: 2,
            nav: true,
            dots: false,
            loop: true,
            margin: 10
        });
    });
</script>
</body>
</html>