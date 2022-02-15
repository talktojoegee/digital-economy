<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="img/favicon.png" rel="apple-touch-icon-precomposed">
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{config('app.name')}} - @yield('title')</title>
    <link rel="stylesheet" href="/main/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/main/fonts/Linearicons/Font/demo-files/demo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:400,500,600,700&amp;display=swap&amp;ver=1607580870">
    <link rel="stylesheet" href="/main/plugins/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="/main/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="/main/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="/main/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="/main/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="/main/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/main/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="/main/plugins/noUiSlider/nouislider.css">
    <link rel="stylesheet" href="/main/css/style.css">
    <link rel="stylesheet" href="/main/css/home-12.css">
</head>

<body>
<div class="ps-page">
    @include('partial.frontend._top-header-menu')
    <div class="ps-home ps-home--12">
        <div class="ps-home__content">
            <section class="ps-section--banner">
                <div class="ps-section__overlay">
                    <div class="ps-section__loading"></div>
                </div>
                <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                    <div class="ps-banner--round">
                        <div class="ps-banner" style="background:#fcfcfe;">
                            <div class="container container-initial">
                                <div class="ps-banner__block">
                                    <div class="ps-banner__content">
                                        <h2 class="ps-banner__title">Antibacterial <br/>Medical Mask</h2>
                                        <div class="ps-banner__desc">Just a few seconds to measure your <br/>body temperature.</div>
                                        <div class="ps-banner__btn-group">
                                            <div class="ps-banner__btn"><img src="/main/img/icon/bacterial.svg" alt="alt" style="filter: invert(9%) sepia(19%) saturate(9%) hue-rotate(352deg) brightness(101%) contrast(91%);" />Anti-Bacterial</div>
                                            <div class="ps-banner__btn"><img src="/main/img/icon/virus.svg" alt="alt" style="filter: invert(9%) sepia(19%) saturate(9%) hue-rotate(352deg) brightness(101%) contrast(91%);" />Anti-Virus</div>
                                        </div><a class="bg-warning ps-banner__shop" href="#">Shop now</a>
                                    </div>
                                    <div class="ps-banner__thumnail">
                                        <img class="ps-banner__round" src="/main/img/round5.png" alt="alt" />
                                        <img class="ps-banner__image" src="/main/img/girl-face-mask.png" alt="alt" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-banner--round">
                        <div class="ps-banner" style="background:#fcfcfe;">
                            <div class="container container-initial">
                                <div class="ps-banner__block">
                                    <div class="ps-banner__content">
                                        <h2 class="ps-banner__title">Antibacterial <br/>Medical Mask</h2>
                                        <div class="ps-banner__desc">Just a few seconds to measure your <br/>body temperature.</div>
                                        <div class="ps-banner__btn-group">
                                            <div class="ps-banner__btn"><img src="/main/img/icon/bacterial.svg" alt="alt" style="filter: invert(9%) sepia(19%) saturate(9%) hue-rotate(352deg) brightness(101%) contrast(91%);" />Anti-Bacterial</div>
                                            <div class="ps-banner__btn"><img src="/main/img/icon/virus.svg" alt="alt" style="filter: invert(9%) sepia(19%) saturate(9%) hue-rotate(352deg) brightness(101%) contrast(91%);" />Anti-Virus</div>
                                        </div><a class="bg-warning ps-banner__shop" href="#">Shop now</a>
                                    </div>
                                    <div class="ps-banner__thumnail">
                                        <img class="ps-banner__round" src="/main/img/round5.png" alt="alt" />
                                        <img class="ps-banner__image" src="/main/img/promotion/home6-bg.jpg" alt="alt" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ps-mask--service">
                <div class="container">
                    <div class="ps-mask__content">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="ps-mask__left">
                                    <div class="ps-mask__item">
                                        <div class="ps-mask__icon"> <img src="/main/img/icon/certificate-1.png" alt="icon"></div>
                                        <h4 class="ps-mask__title">Health Certificate 2000 - professional care</h4>
                                        <p class="ps-mask__desc">The highest quality and protection for your family</p>
                                    </div>
                                    <div class="ps-mask__item">
                                        <div class="ps-mask__icon"> <img src="/main/img/heart-white.png" alt="icon"></div>
                                        <h4 class="ps-mask__title">Surgical quality and wearing comfort</h4>
                                        <p class="ps-mask__desc">At the same time, it protects and whitens</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-6">
                                <div class="ps-mask__thumbnail"> <img src="/main/img/promotion/img-mask.png" alt="mask"></div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="ps-mask__right">
                                    <div class="ps-mask__item">
                                        <div class="ps-mask__icon"> <img src="/main/img/icon/bacteria-1.png" alt="icon"></div>
                                        <h4 class="ps-mask__title">It has antiviral and antibacterial properties</h4>
                                        <p class="ps-mask__desc">Round, rectangular and super-wide</p>
                                    </div>
                                    <div class="ps-mask__item">
                                        <div class="ps-mask__icon"> <img src="/main/img/icon/paramedic-white.png" alt="icon"></div>
                                        <h4 class="ps-mask__title">Used in operating theaters</h4>
                                        <p class="ps-mask__desc">Health Certificate 2000 - <br>professional care</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ps-project--info">
                <div class="container">
                    <h2 class="ps-project__title">Effective & reliable <br>protection for your family</h2>
                    <div class="ps-project__content">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="ps-project__item">
                                    <div class="ps-project__thumbnail"> <img src="/main/img/promotion/goby-tD3GaS9ysF4-unsplash.jpg" alt=""></div>
                                    <h4 class="ps-project__name">Health Certificate <br>2000 - professional care</h4>
                                    <p class="ps-project__desc">Just a few seconds to measure your body temperature. <br>Up to 5 users! The battery lasts up to 2 years.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="ps-project__item">
                                    <div class="ps-project__thumbnail"> <img src="/main/img/promotion/goby-tD3GaS9ysF4-unsplash2.jpg" alt=""></div>
                                    <h4 class="ps-project__name">The possibility of testing when <br>applied to the forehead. Ready to <br>work in 30 seconds.</h4>
                                    <p class="ps-project__desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered altevration in some form, </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ps-about--info">
                <h2 class="ps-about__title">Best quality on the market</h2>
                <div class="ps-about__extent">
                    <div class="row m-0">
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img src="/main/img/icon/certificate-info.png" alt=""></div>
                                <h4 class="ps-block__title">Health Certificate 2000 - <br/>professional care</h4>
                                <div class="ps-block__subtitle">The highest quality and protection for your teeth</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img src="/main/img/icon/dentistry-info.png" alt=""></div>
                                <h4 class="ps-block__title">Sonic cleaning <br/>and whitening power</h4>
                                <div class="ps-block__subtitle">At the same time, it protects and whitens</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 p-0">
                            <div class="ps-block--about">
                                <div class="ps-block__icon"><img src="/main/img/icon/toothbrush-info.png" alt=""></div>
                                <h4 class="ps-block__title">3 types <br/>of cleaning tips</h4>
                                <div class="ps-block__subtitle">Round, rectangular and super-wide</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ps-section--mask-info">
                <div class="container">
                    <h2 class="ps-section__title">3 different headband <br>binding finishes</h2>
                    <p class="ps-section__subtitle">Choose the one that is most comfortable for you</p>
                    <div class="ps-section__content">
                        <div class="ps-section__item">
                            <div class="ps-section__thumbnail"> <img src="/main/img/products/mask1.png" alt="Rubber finish"></div>
                            <h5 class="ps-section__text"><a href="#">Rubber finish</a></h5><a class="ps-btn ps-btn--warning" href="#">Choose</a>
                        </div>
                        <div class="ps-section__item">
                            <div class="ps-section__thumbnail"> <img src="/main/img/products/mask2.png" alt="Knotted fabric finish"></div>
                            <h5 class="ps-section__text"><a href="#">Knotted fabric finish</a></h5><a class="ps-btn ps-btn--warning" href="#">Choose</a>
                        </div>
                        <div class="ps-section__item">
                            <div class="ps-section__thumbnail"> <img src="/main/img/products/mask3.png" alt="Knotted rubber finish"></div>
                            <h5 class="ps-section__text"><a href="#">Knotted rubber finish</a></h5><a class="ps-btn ps-btn--warning" href="#">Choose</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ps-section--newsletter ps-section--newsletter-info" data-background="/main/img/bg-newsletter12.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="ps-section__body">
                                <h3 class="ps-section__title">Join our newsletter and get <br/>$20 discount for your first order</h3>
                                <div class="ps-section__content">
                                    <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
                                        <div class="ps-form--subscribe">
                                            <div class="ps-form__control">
                                                <input class="form-control ps-input" type="email" placeholder="Enter your email address" />
                                                <button class="ps-btn ps-btn--warning">Subscribe</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <footer class="ps-footer ps-footer--12">
        <div class="ps-footer--top">
            <div class="container">
                <div class="row m-0">
                    <div class="col-12 col-sm-4 p-0">
                        <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-wallet"></i>100% Money back</a></p>
                    </div>
                    <div class="col-12 col-sm-4 p-0">
                        <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-bag2"></i>Non-contact shipping</a></p>
                    </div>
                    <div class="col-12 col-sm-4 p-0">
                        <p class="text-center"><a class="ps-footer__link" href="#"><i class="icon-truck"></i>Free delivery for order over $200</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ps-footer__middle">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="ps-footer--address">
                                    <div class="ps-logo"><a href="index.html"> <img src="img/sticky-logo.png" alt><img class="logo-white" src="img/logo-white.png" alt><img class="logo-black" src="img/Logo-black.png" alt><img class="logo-white-all" src="img/logo-white1.png" alt><img class="logo-green" src="img/logo-green.png" alt></a></div>
                                    <div class="ps-footer__title">Our store</div>
                                    <p>1487 Rocky Horse Carrefour<br>Arlington, TX 16819</p>
                                    <p><a target="_blank" href="https://www.google.com/maps/place/Arlington,+TX,+USA/@32.701968,-97.2054529,12z/data=!3m1!4b1!4m8!1m2!2m1!1s1487+Rocky+Horse+Carrefour+Arlington,+TX+16819!3m4!1s0x864e62d2e40898d3:0xb5ef6ac1fa05351!8m2!3d32.735687!4d-97.1080656">Show on map</a></p>
                                    <ul class="ps-social">
                                        <li><a class="ps-social__link facebook" href="#"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                        <li><a class="ps-social__link instagram" href="#"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                        <li><a class="ps-social__link youtube" href="#"><i class="fa fa-youtube-play"></i><span class="ps-tooltip">Youtube</span></a></li>
                                        <li><a class="ps-social__link pinterest" href="#"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                        <li><a class="ps-social__link linkedin" href="#"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="ps-footer--contact">
                                    <h5 class="ps-footer__title">Need help</h5>
                                    <div class="ps-footer__fax"><i class="icon-telephone"></i>0020 500 – MYMEDI – 000</div>
                                    <p class="ps-footer__work">Monday – Friday: 9:00-20:00<br>Saturday: 11:00 – 15:00</p>
                                    <hr>
                                    <p><a class="ps-footer__email" href="http://nouthemes.net/cdn-cgi/l/email-protection#a1c2cecfd5c0c2d5e1c4d9c0ccd1cdc48fc2cecc"> <i class="icon-envelope"></i><span class="__cf_email__" data-cfemail="a5c6cacbd1c4c6d1e5c0ddc4c8d5c9c08bc6cac8">[email&#160;protected]</span> </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Information</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="about-us.html">About us</a></li>
                                        <li><a href="#">Delivery information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Sales</a></li>
                                        <li><a href="#">Terms &amp; Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Account</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="#">My account</a></li>
                                        <li><a href="#">My orders</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="ps-footer--block">
                                    <h5 class="ps-block__title">Store</h5>
                                    <ul class="ps-block__list">
                                        <li><a href="#">Affiliate</a></li>
                                        <li><a href="#">Bestsellers</a></li>
                                        <li><a href="#">Discount</a></li>
                                        <li><a href="#">Latest products</a></li>
                                        <li><a href="#">Sale</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-footer--bottom">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p>Copyright © 2021 Mymedi. All Rights Reserved</p>
                    </div>
                    <div class="col-12 col-md-6 text-right"><img src="img/payment.png" alt><img class="payment-light" src="img/payment-light.png" alt></div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="ps-search">
    <div class="ps-search__content ps-search--mobile"><a class="ps-search__close" href="#" id="close-search"><i class="icon-cross"></i></a>
        <h3>Search</h3>
        <form action="http://nouthemes.net/html/mymedi/do_action" method="post">
            <div class="ps-search-table">
                <div class="input-group">
                    <input class="form-control ps-input" type="text" placeholder="Search for products">
                    <div class="input-group-append"><a href="#"><i class="fa fa-search"></i></a></div>
                </div>
            </div>
        </form>
        <div class="ps-search__result">
            <div class="ps-search__item">
                <div class="ps-product ps-product--horizontal">
                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                            <figure><img src="img/products/052.jpg" alt="alt" /></figure>
                        </a></div>
                    <div class="ps-product__content">
                        <h5 class="ps-product__title"><a>3-layer <span class='hightlight'>mask</span> with an elastic band (1 piece)</a></h5>
                        <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                        <div class="ps-product__meta"><span class="ps-product__price">$38.24</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-search__item">
                <div class="ps-product ps-product--horizontal">
                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                            <figure><img src="img/products/033.jpg" alt="alt" /></figure>
                        </a></div>
                    <div class="ps-product__content">
                        <h5 class="ps-product__title"><a>3 Layer Disposable Protective Face <span class='hightlight'>mask</span>s</a></h5>
                        <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                        <div class="ps-product__meta"><span class="ps-product__price sale">$14.52</span><span class="ps-product__del">$17.24</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-search__item">
                <div class="ps-product ps-product--horizontal">
                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                            <figure><img src="img/products/051.jpg" alt="alt" /></figure>
                        </a></div>
                    <div class="ps-product__content">
                        <h5 class="ps-product__title"><a>3-Ply Ear-Loop Disposable Blue Face <span class='hightlight'>mask</span></a></h5>
                        <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                        <div class="ps-product__meta"><span class="ps-product__price sale">$14.99</span><span class="ps-product__del">$38.24</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-search__item">
                <div class="ps-product ps-product--horizontal">
                    <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                            <figure><img src="img/products/050.jpg" alt="alt" /></figure>
                        </a></div>
                    <div class="ps-product__content">
                        <h5 class="ps-product__title"><a>Disposable Face <span class='hightlight'>mask</span> for Unisex</a></h5>
                        <p class="ps-product__desc">Study history up to 30 days Up to 5 users simultaneously Has HEALTH certificate</p>
                        <div class="ps-product__meta"><span class="ps-product__price sale">$8.15</span><span class="ps-product__del">$12.24</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ps-navigation--footer">
    <div class="ps-nav__item"><a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a></div>
    <div class="ps-nav__item"><a href="index.html"><i class="icon-home2"></i></a></div>
    <div class="ps-nav__item"><a href="my-account.html"><i class="icon-user"></i></a></div>
    <div class="ps-nav__item"><a href="wishlist.html"><i class="fa fa-heart-o"></i><span class="badge">3</span></a></div>
    <div class="ps-nav__item"><a href="shopping-cart.html"><i class="icon-cart-empty"></i><span class="badge">2</span></a></div>
</div>
<div class="ps-menu--slidebar">
    <div class="ps-menu__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children"><a href="#">Products</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="#">Wound Care</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="category-list.html">Bandages</a></li>
                            <li><a href="category-list.html">Gypsum foundations</a></li>
                            <li><a href="category-list.html">Patches and tapes</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Higiene</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="category-list.html">Disposable products</a></li>
                            <li><a href="category-list.html">Face masks</a></li>
                            <li><a href="category-list.html">Gloves</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Laboratory</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="category-list.html">Devices</a></li>
                            <li><a href="category-list.html">Diagnostic tests</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Home Medical Supplies</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="category-list.html">Diagnosis</a></li>
                    <li><a href="category-list.html">Accessories Tools</a></li>
                    <li><a href="category-list.html">Bandages</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Homepages</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="index.html">Home 01</a></li>
                    <li><a href="home2.html">Home 02</a></li>
                    <li><a href="home3.html">Home 03</a></li>
                    <li><a href="home4.html">Home 04</a></li>
                    <li><a href="home5.html">Home 05</a></li>
                    <li><a href="home6.html">Home 06</a></li>
                    <li><a href="home7.html">Home 07</a></li>
                    <li><a href="home8.html">Home 08</a></li>
                    <li><a href="home9.html">Home 09</a></li>
                    <li><a href="home10.html">Home 10</a></li>
                    <li><a href="home11.html">Home 11</a></li>
                    <li><a href="home12.html">Home 12</a></li>
                    <li><a href="home13.html">Home 13</a></li>
                    <li><a href="home14.html">Home 14</a></li>
                    <li><a href="home15.html">Home 15</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="category-list.html">Shop</a></li>
            <li class="menu-item-has-children"><a href="#">Pages</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="#">Category</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="category-grid.html">Grid</a></li>
                            <li><a href="category-grid-detail.html">Grid with details</a></li>
                            <li><a href="category-grid-green.html">Grid with header green</a></li>
                            <li><a href="category-grid-dark.html">Grid with header dark</a></li>
                            <li><a href="category-grid-separate.html">Grid separate</a></li>
                            <li><a href="category-list.html">List</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Product</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="product1.html">Layout 01</a></li>
                            <li><a href="product2.html">Layout 02</a></li>
                            <li><a href="product3.html">Layout 03</a></li>
                            <li><a href="product4.html">Layout 04</a></li>
                            <li><a href="product5.html">Layout 05</a></li>
                            <li><a href="product6.html">Layout 06</a></li>
                            <li><a href="product7.html">Layout 07</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                        <ul class="sub-menu">
                            <li><a href="404.html">404</a></li>
                            <li><a href="about-us.html">About us</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="coming-soon-v1.html">Coming soon 1</a></li>
                            <li><a href="coming-soon-v2.html">Coming soon 2</a></li>
                            <li><a href="blog-post1.html">Blog post 1</a></li>
                            <li><a href="blog-post2.html">Blog post 2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="#">Collection</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                <ul class="sub-menu">
                    <li><a href="category-list.html">Face masks</a></li>
                    <li><a href="category-list.html">Dental</a></li>
                    <li><a href="category-list.html">Micrscope</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a href="blog-sidebar1.html">Blog</a></li>
            <li class="menu-item-has-children"><a href="contact-us.html">Contact</a></li>
        </ul>
    </div>
    <div class="ps-menu__footer">
        <div class="ps-menu__item">
            <ul class="ps-language-currency">
                <li class="menu-item-has-children"><a href="#">English</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">Français</a></li>
                        <li><a href="#">Deutsch</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">USD</a><span class="sub-toggle"><i class="fa fa-chevron-down"></i></span>
                    <ul class="sub-menu">
                        <li><a href="#">USD</a></li>
                        <li><a href="#">EUR</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="ps-menu__item">
            <div class="ps-menu__contact">Need help? <strong>0020 500 - MYMEDI - 000</strong></div>
        </div>
    </div>
</div>
<button class="btn scroll-top"><i class="fa fa-angle-double-up"></i></button>
<div class="ps-preloader" id="preloader">
    <div class="ps-preloader-section ps-preloader-left"></div>
    <div class="ps-preloader-section ps-preloader-right"></div>
</div>
<div class="modal fade" id="popupQuickview" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ps-quickview">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-quickview__body">
                    <button class="close ps-quickview__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="ps-product--gallery">
                                    <div class="ps-product__thumbnail">
                                        <div class="slide"><img src="img/products/001.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/047.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/008.jpg" alt="alt" /></div>
                                        <div class="slide"><img src="img/products/034.jpg" alt="alt" /></div>
                                    </div>
                                    <div class="ps-gallery--image">
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/001.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/047.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/008.jpg" alt="alt" /></div>
                                        </div>
                                        <div class="slide">
                                            <div class="ps-gallery__item"><img src="img/products/034.jpg" alt="alt" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="ps-product__info">
                                    <div class="ps-product__badge"><span class="ps-badge ps-badge--instock"> IN STOCK</span>
                                    </div>
                                    <div class="ps-product__branch"><a href="#">HeartRate</a></div>
                                    <div class="ps-product__title"><a href="#">Blood Pressure Monitor</a></div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">(5 Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                    </div>
                                    <div class="ps-product__quantity">
                                        <h6>Quantity</h6>
                                        <div class="d-md-flex align-items-center">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div><a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcartV2">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="ps-product__type">
                                        <ul class="ps-product__list">
                                            <li> <span class="ps-list__title">Tags: </span><a class="ps-list__text" href="#">Health</a><a class="ps-list__text" href="#">Thermometer</a>
                                            </li>
                                            <li> <span class="ps-list__title">SKU: </span><a class="ps-list__text" href="#">SF-006</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupCompare" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered ps-compare--popup">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider ps-compare__body">
                    <button class="close ps-compare__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-compare--product">
                        <div class="ps-compare__header">
                            <div class="container">
                                <h2>Compare Products</h2>
                            </div>
                        </div>
                        <div class="ps-compare__content">
                            <div class="ps-compare__table">
                                <table class="table ps-table">
                                    <tbody>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <div class="ps-product__remove"><a href="#"><i class="fa fa-times"></i></a></div>
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                    <figure><img src="img/products/001.jpg" alt></figure>
                                                </a></div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="product1.html">Blood Pressure Monitor</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__price">$77.65</span>
                                                </div>
                                                <button class="ps-btn ps-btn--warning">Add to cart</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="ps-product__remove"><a href="#"><i class="fa fa-times"></i></a></div>
                                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                                    <figure><img src="img/products/034.jpg" alt></figure>
                                                </a></div>
                                            <div class="ps-product__content">
                                                <h5 class="ps-product__title"><a href="product1.html">Blood Pressure Monitor Upper Arm</a></h5>
                                                <div class="ps-product__meta"><span class="ps-product__del">$64.65</span><span class="ps-product__price sale">$86.67</span>
                                                </div>
                                                <button class="ps-btn ps-btn--warning">Add to cart</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <ul class="ps-product__list">
                                                <li class="ps-check-line">5 cleaning programs</li>
                                                <li class="ps-check-line">Digital display</li>
                                                <li class="ps-check-line">Memory for 3 user</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="ps-product__list">
                                                <li class="ps-check-line">5 cleaning programs</li>
                                                <li class="ps-check-line">Digital display</li>
                                                <li class="ps-check-line">Memory for 3 user</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Availability</th>
                                        <td>
                                            <p class="ps-product__text ps-check-line">in stock</p>
                                        </td>
                                        <td>
                                            <p class="ps-product__text ps-check-line">in stock</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <td>
                                            <p class="ps-product__text">10 kg</p>
                                        </td>
                                        <td>
                                            <p class="ps-product__text">10 kg</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Dimensions</th>
                                        <td>
                                            <p class="ps-product__text">10 × 10 × 10 cm</p>
                                        </td>
                                        <td>
                                            <p class="ps-product__text">10 × 10 × 10 cm</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Color</th>
                                        <td>
                                            <p class="ps-product__text">Red, Navy</p>
                                        </td>
                                        <td>
                                            <p class="ps-product__text">Green</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sku</th>
                                        <td>
                                            <p class="ps-product__text">SF-006</p>
                                        </td>
                                        <td>
                                            <p class="ps-product__text">BE-001</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><span class="ps-product__price">$77.65</span>
                                        </td>
                                        <td><span class="ps-product__del">$64.65</span><span class="ps-product__price sale">$86.67</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupLanguage" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ps-popup--select">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid">
                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-popup__body">
                        <h2 class="ps-popup__title">Select language</h2>
                        <ul class="ps-popup__list">
                            <li class="language-item"> <a class="active btn" href="javascript:void(0);" data-value="English">English</a></li>
                            <li class="language-item"> <a class="btn" href="javascript:void(0);" data-value="Deutsch">Deutsch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupCurrency" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ps-popup--select">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid">
                    <button class="close ps-popup__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="ps-popup__body">
                        <h2 class="ps-popup__title">Select currency</h2>
                        <ul class="ps-popup__list">
                            <li class="currency-item"> <a class="active btn" href="javascript:void(0);" data-value="USD">USD</a></li>
                            <li class="currency-item"> <a class="btn" href="javascript:void(0);" data-value="EUR">EUR</a></li>
                            <li class="currency-item"> <a class="btn" href="javascript:void(0);" data-value="JPY">JPY</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupAddcart" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-addcart__body">
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/015.jpg" alt="alt" /><img src="img/products/040.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--sale">Sale</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional Adjustable Multifunctional</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$89.65</span><span class="ps-product__del">$60.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="ps-addcart__content">
                                <p>There are two items in your cart.</p>
                                <p class="ps-addcart__total">Total: <span class="ps-price">$44.00</span></p><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal" aria-label="Close">Continue shopping</a><a class="ps-btn ps-btn--border" href="shopping-cart.html">View cart</a><a class="ps-btn ps-btn--warning" href="checkout.html">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popupAddcartV2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered ps-addcart">
        <div class="modal-content">
            <div class="modal-body">
                <div class="wrap-modal-slider container-fluid ps-addcart__body">
                    <div class="ps-addcart__overlay">
                        <div class="ps-addcart__loading"></div>
                    </div>
                    <button class="close ps-addcart__close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="ps-addcart__noti"> <i class="fa fa-check"> </i>Added to cart succesfully</p>
                    <div class="ps-addcart__product">
                        <div class="ps-product ps-product--standard">
                            <div class="ps-product__thumbnail"><a class="ps-product__image" href="#">
                                    <figure><img src="img/products/015.jpg" alt><img src="img/products/040.jpg" alt></figure>
                                </a></div>
                            <div class="ps-product__content">
                                <div class="ps-product__title"><a>Lens Frame Professional Adjustable Multifunctional</a></div>
                                <div class="ps-product__quantity"><span>x2</span></div>
                                <div class="ps-product__meta"><span class="ps-product__price">$89.65</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-addcart__header">
                        <h3>Want o add one of these?</h3>
                        <p>People who buy this product buy also:</p>
                    </div>
                    <div class="ps-addcart__content">
                        <div class="owl-carousel" data-owl-auto="false" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/015.jpg" alt="alt" /><img src="img/products/040.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--sale">Sale</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Lens Frame Professional Adjustable Multifunctional</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$89.65</span><span class="ps-product__del">$60.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/028.jpg" alt="alt" /><img src="img/products/045.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Digital Thermometer X30-Pro</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price sale">$60.39</span><span class="ps-product__del">$89.99</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--standard">
                                <div class="ps-product__thumbnail"><a class="ps-product__image" href="product1.html">
                                        <figure><img src="img/products/020.jpg" alt="alt" /><img src="img/products/008.jpg" alt="alt" />
                                        </figure>
                                    </a>
                                    <div class="ps-product__actions">
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="#" data-toggle="modal" data-target="#popupCompare"><i class="fa fa-align-left"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Quick view"><a href="#" data-toggle="modal" data-target="#popupQuickview"><i class="fa fa-search"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#" data-toggle="modal" data-target="#popupAddcart"><i class="fa fa-shopping-basket"></i></a></div>
                                    </div>
                                    <div class="ps-product__badge">
                                        <div class="ps-badge ps-badge--hot">Hot</div>
                                    </div>
                                </div>
                                <div class="ps-product__content">
                                    <h5 class="ps-product__title"><a href="product1.html">Bronze Blood Pressure Monitor</a></h5>
                                    <div class="ps-product__meta"><span class="ps-product__price">$56.65 - $97.65</span>
                                    </div>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5" selected="selected">5</option>
                                        </select><span class="ps-product__review">( Reviews)</span>
                                    </div>
                                    <div class="ps-product__desc">
                                        <ul class="ps-product__list">
                                            <li>Study history up to 30 days</li>
                                            <li>Up to 5 users simultaneously</li>
                                            <li>Has HEALTH certificate</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__actions ps-product__group-mobile">
                                        <div class="ps-product__quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="ps-product__cart"> <a class="ps-btn ps-btn--warning" href="#" data-toggle="modal" data-target="#popupAddcart">Add to cart</a></div>
                                        <div class="ps-product__item cart" data-toggle="tooltip" data-placement="left" title="Add to cart"><a href="#"><i class="fa fa-shopping-basket"></i></a></div>
                                        <div class="ps-product__item" data-toggle="tooltip" data-placement="left" title="Wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></div>
                                        <div class="ps-product__item rotate" data-toggle="tooltip" data-placement="left" title="Add to compare"><a href="compare.html"><i class="fa fa-align-left"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-addcart__footer"><a class="ps-btn ps-btn--border" href="#" data-dismiss="modal" aria-label="Close">No thanks :(</a><a class="ps-btn ps-btn--warning" href="shopping-cart.html">Continue to Cart</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/main/plugins/jquery.min.js"></script>
<script src="/main/plugins/popper.min.js"></script>
<script src="/main/plugins/bootstrap4/js/bootstrap.min.js"></script>
<script src="/main/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="/main/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="/main/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="/main/plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
<script src="/main/plugins/slick/slick/slick.min.js"></script>
<script src="/main/plugins/noUiSlider/nouislider.min.js"></script>
<script src="/main/js/main.js"></script>
</body>
</html>
