<!DOCTYPE html>
<html data-navigation-type="default" data-navbar-horizontal-shape="default" lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>


    {{-- Favicons --}}

    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicons/favicon.ico">
    {{-- <link rel="manifest" href="../../../assets/img/favicons/manifest.json"> --}}
    <meta name="msapplication-TileImage" content="../../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    @include('backend.layouts.css_assets');

  </head>

  <body>

  {{-- main content start--}}
    <main class="main" id="top">

      @include('frontend.layouts.navbar')
      
      <div class="ecommerce-homepage pt-5 mb-9">
        
        {{-- category start --}}
        <section class="py-0">

          <div class="container-small">
            <div class="scrollbar">
              <div class="d-flex justify-content-between"><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2 bg-warning-subtle light"><span class="fs-4 uil uil-star text-warning"></span></div>
                  <p class="nav-label">Deals</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-shopping-bag"></span></div>
                  <p class="nav-label">Grocery</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-watch-alt"></span></div>
                  <p class="nav-label">Fashion</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-mobile-android"></span></div>
                  <p class="nav-label">Mobile</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-monitor"></span></div>
                  <p class="nav-label">Electronics</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-estate"></span></div>
                  <p class="nav-label">Home</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-lamp"></span></div>
                  <p class="nav-label">Dining</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-gift"></span></div>
                  <p class="nav-label">Gifts</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-wrench"></span></div>
                  <p class="nav-label">Tools</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-plane-departure"></span></div>
                  <p class="nav-label">Travel</p>
                </a><a class="icon-nav-item" href="#!">
                  <div class="icon-container mb-2"><span class="fs-4 uil uil-palette"></span></div>
                  <p class="nav-label">Others</p>
                </a>
              </div>
            </div>
          </div>

        </section>
        {{-- category end --}}


       <section class="py-0 px-xl-3">

         <div class="container px-xl-0 px-xxl-3">

            {{-- banner section start --}}
            <div class="row g-3 mb-9">

                    {{-- banner-1 start --}}
                    <div class="col-12">
                        <div class="whooping-banner w-100 rounded-3 overflow-hidden">
                        <div class="bg-holder z-n1 product-bg" style="background-image:url(../../../assets/img/e-commerce/whooping_banner_product.png);background-position: bottom right;">
                        </div>
                        <!--/.bg-holder-->

                        <div class="bg-holder z-n1 shape-bg" style="background-image:url(../../../assets/img/e-commerce/whooping_banner_shape_2.png);background-position: bottom left;">
                        </div>
                        <!--/.bg-holder-->

                        <div class="banner-text" data-bs-theme="light">
                            <h2 class="text-warning-light fw-bolder fs-lg-3 fs-xxl-2">Whooping <span class="gradient-text">60% </span>Off</h2>
                            <h3 class="fw-bolder fs-lg-5 fs-xxl-3 text-white">on everyday items</h3>
                        </div><a class="btn btn-lg btn-primary rounded-pill banner-button" href="#!">Shop Now</a>
                        </div>
                    </div>
                

                {{-- banner-2 start --}}
                    <div class="col-12 col-xl-6">
                        <div class="gift-items-banner w-100 rounded-3 overflow-hidden">
                        <div class="bg-holder z-n1 banner-bg" style="background-image:url(../../../assets/img/e-commerce/gift-items-banner-bg.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="banner-text text-md-center">
                            <h2 class="text-white fw-bolder fs-xl-4">Get <span class="gradient-text">10% Off </span><br class="d-md-none"> on gift items</h2><a class="btn btn-lg btn-primary rounded-pill banner-button" href="#!">Buy Now</a>
                        </div>
                        </div>
                    </div>
                
                    <div class="col-12 col-xl-6">
                        <div class="best-in-market-banner d-flex h-100 px-4 px-sm-7 py-5 px-md-11 rounded-3 overflow-hidden">
                        <div class="bg-holder z-n1 banner-bg" style="background-image:url(../../../assets/img/e-commerce/best-in-market-bg.png);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="row align-items-center w-sm-100">
                            <div class="col-8">
                            <div class="banner-text">
                                <h2 class="text-white fw-bolder fs-sm-4 mb-5">MI 11 Pro<br><span class="fs-7 fs-sm-6"> Best in the market</span></h2><a class="btn btn-lg btn-warning rounded-pill banner-button" href="#!">Buy Now</a>
                            </div>
                            </div>
                            <div class="col-4"><img class="w-100 w-sm-75" src="../../../assets/img/e-commerce/5.png" alt=""></div>
                        </div>
                        </div>
                    </div>
                    
            </div>
            {{-- banner section end --}}


            {{-- Top deals section start --}}
            <div class="row g-4 mb-6">

                <div class="col-12 col-lg-9 col-xxl-10">
                    <div class="d-flex flex-between-center mb-3">
                    <div class="d-flex"><span class="fas fa-bolt text-warning fs-6"></span>
                        <h3 class="mx-2">Top Deals today</h3><span class="fas fa-bolt text-warning fs-6"></span>
                    </div><a class="btn btn-link btn-lg p-0 d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                    </div>
                    <div class="swiper-theme-container products-slider">
                    <div class="swiper swiper theme-slider" data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"768":{"slidesPerView":3,"spaceBetween":20},"1200":{"slidesPerView":4,"spaceBetween":16},"1540":{"slidesPerView":5,"spaceBetween":16}}}'>
                        <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/6.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">PlayStation 5 DualSense Wireless Controller</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(67 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <p class="fs-9 text-body-highlight fw-bold mb-2">dbrand skin available</p>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="me-2 text-body text-decoration-line-through mb-0">$125.00</p>
                                    <h3 class="text-body-emphasis mb-0">$89.00</h3>
                                </div>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/1.png" alt="" /><span class="badge text-bg-success fs-10 product-verified-badge">Verified<span class="fas fa-check ms-1"></span></span>
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature ...</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(74 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="me-2 text-body text-decoration-line-through mb-0">$49.99</p>
                                    <h3 class="text-body-emphasis mb-0">$34.99</h3>
                                </div>
                                <p class="text-success fw-bold fs-9 lh-1 mb-0">Deal time ends in days</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/2.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">iPhone 13 pro max-Pacific Blue, 128GB storage</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(33 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <p class="fs-9 text-body-highlight fw-bold mb-2">Stock limited</p>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="me-2 text-body text-decoration-line-through mb-0">$899.99</p>
                                    <h3 class="text-body-emphasis mb-0">$850.99</h3>
                                </div>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">5 colors</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/3.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">Apple MacBook Pro 13 inch-M1-8/256GB-Space Gray</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(97 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <p class="fs-9 text-body-highlight fw-bold mb-2">Apple care included</p>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="me-2 text-body text-decoration-line-through mb-0">$1299.00</p>
                                    <h3 class="text-body-emphasis mb-0">$1149.00</h3>
                                </div>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/4.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">Apple iMac 24&quot; 4K Retina Display M1 8 Core CPU, 7 Core GPU, 256GB SSD, Green (MJV83ZP/A) 2021</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(134 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <p class="fs-9 text-body-highlight fw-bold mb-2">Exchange with kidney</p>
                                <div class="d-flex align-items-center mb-1">
                                    <p class="me-2 text-body text-decoration-line-through mb-0">$1499.00</p>
                                    <h3 class="text-body-emphasis mb-0">$1399.00</h3>
                                </div>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">7 colors</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                                <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                    <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                    </button><img class="img-fluid" src="../../../assets/img/products/5.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                    <h6 class="mb-2 lh-sm line-clamp-3 product-name">Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(59 people rated)</span>
                                </p>
                                </div>
                                <div>
                                <h3 class="text-body-emphasis">$59.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="swiper-nav swiper-product-nav">
                        <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                        <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                    </div><a class="fw-bold d-md-none px-0" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                </div>

                <div class="col-lg-3 d-none d-lg-block col-xxl-2">
                    <div class="h-100 position-relative rounded-3 overflow-hidden">
                    <div class="bg-holder" style="background-image:url(../../../assets/img/e-commerce/4.png);">
                    </div>
                    <!--/.bg-holder-->

                    </div>
                </div>
            <div class="col-12 d-lg-none"><a href="#!"><img class="w-100 rounded-3" src="../../../assets/img/e-commerce/6.png" alt="" /></a></div>
                </div>
            {{-- Top deals section end --}}



            {{-- Top electronics section start --}}
                <div class="mb-6">
                <div class="d-flex flex-between-center mb-3">
                    <h3>Top Electronics</h3><a class="fw-bold d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                </div>
                <div class="swiper-theme-container products-slider">
                    <div class="swiper swiper theme-slider" data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/5.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(59 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <h3 class="text-body-emphasis">$59.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/7.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">2021 Apple 12.9-inch iPad Pro (Wi‑Fi, 128GB) - Space Gray</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(13 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <h3 class="text-body-emphasis">$799.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/12.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">HORI Racing Wheel Apex for PlayStation 4/3, and PC</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(64 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <p class="fs-9 text-body-highlight fs-9 mb-0 fw-bold">Leather cover add-on available</p>
                                <p class="fs-9 text-body-tertiary fs-9 mb-2">supports Windows 11</p>
                                <h3 class="text-body-emphasis">$299.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">1 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container active" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove from wishlist"><span class="fas fa-heart"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/1.png" alt="" /><span class="badge text-bg-success fs-10 product-verified-badge">Verified<span class="fas fa-check ms-1"></span></span>
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Amazfit T-Rex Pro Smart Watch with GPS, Outdoor Fitness Watch for Men, Military Standard Certified</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(32 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <h3 class="text-body-emphasis">$20.00</h3>
                                <p class="text-success fw-bold fs-9 lh-1 mb-0">Deal time ends in 24 hours</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/16.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Apple AirPods Pro</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="text-body-quaternary fw-semibold ms-1">(39 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <p class="fs-9 text-body-highlight fs-9 mb-0 fw-bold">Free with iPhone 5s</p>
                                <p class="fs-9 text-body-tertiary fs-9 mb-2">Ships to Canada</p>
                                <h3 class="text-body-emphasis">$59.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">3 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/10.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Apple Magic Mouse (Wireless, Rechargable) - Silver</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light"></span><span class="fa-regular fa-star text-warning-light"></span><span class="fa-regular fa-star text-warning-light"></span><span class="fa-regular fa-star text-warning-light"></span><span class="text-body-quaternary fw-semibold ms-1">(6 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <p class="fs-9 text-body-highlight fs-9 mb-0 fw-bold">Bundle available</p>
                                <p class="fs-9 text-body-tertiary fs-9 mb-2">Charger not included</p>
                                <h3 class="text-body-emphasis">$89.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">2 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/8.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Amazon Basics Matte Black Wired Keyboard - US Layout (QWERTY)</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light"></span><span class="fa-regular fa-star text-warning-light"></span><span class="text-body-quaternary fw-semibold ms-1">(7 people rated)</span>
                                </p>
                            </div>
                            <div>
                                <h3 class="text-body-emphasis">$98.00</h3>
                                <p class="text-body-tertiary fw-semibold fs-9 lh-1 mb-0">1 colors</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="swiper-nav">
                    <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                    <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div><a class="fw-bold d-md-none" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                </div>
            {{-- Top electronics section end --}}



            {{-- Best Offers section start --}}
                <div class="mb-6">
                <div class="d-flex flex-between-center mb-3">
                    <h3>Best Offers</h3><a class="fw-bold d-none d-md-block" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                </div>
                <div class="swiper-theme-container products-slider">
                    <div class="swiper swiper theme-slider" data-swiper='{"slidesPerView":1,"spaceBetween":16,"breakpoints":{"450":{"slidesPerView":2,"spaceBetween":16},"576":{"slidesPerView":3,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":20},"992":{"slidesPerView":5,"spaceBetween":20},"1200":{"slidesPerView":6,"spaceBetween":16}}}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/25.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">RESPAWN 200 Racing Style Gaming Chair, in Gray RSP 200 GRY</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">35% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/27.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">LEVOIT Humidifiers for Bedroom Large Room 6L Warm and Cool Mist for...</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">18% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/26.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">NETGEAR Nighthawk Pro Gaming XR500 Wi-Fi Router with 4 Ethernet Ports...</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">15% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/18.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Rachael Ray Cucina Bakeware Set Includes Nonstick Bread Baking Cookie Sheet...</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star-half-alt star-icon text-warning"></span><span class="fa-regular fa-star text-warning-light"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">20% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/17.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Xbox Series S</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">12% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/24.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">FURINNO Computer Writing Desk, Walnut</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">16% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="position-relative text-decoration-none product-card h-100">
                            <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                                <div class="border border-1 border-translucent rounded-3 position-relative mb-3">
                                <button class="btn btn-wish btn-wish-primary z-2 d-toggle-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"><span class="fas fa-heart d-block-hover"></span><span class="far fa-heart d-none-hover"></span>
                                </button><img class="img-fluid" src="../../../assets/img/products/18.png" alt="" />
                                </div><a class="stretched-link" href="../../../apps/e-commerce/landing/product-details.html">
                                <h6 class="mb-2 lh-sm line-clamp-3 product-name">Seagate Portable 2TB External Hard Drive Portable HDD</h6>
                                </a>
                                <p class="fs-9"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa-regular fa-star text-warning-light"></span>
                                </p>
                            </div>
                            <div>
                                <h6 class="text-success lh-1 mb-0">15% off</h6>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="swiper-nav">
                    <div class="swiper-button-next"><span class="fas fa-chevron-right nav-icon"></span></div>
                    <div class="swiper-button-prev"><span class="fas fa-chevron-left nav-icon"></span></div>
                    </div>
                </div><a class="fw-bold d-md-none" href="#!">Explore more<span class="fas fa-chevron-right fs-9 ms-1"></span></a>
                </div>
            {{-- Best Offers section end --}}



            {{-- additinal section start --}}
                <div class="row flex-center mb-15 mt-11 gy-6">
                <div class="col-auto"><img class="d-dark-none" src="../../../assets/img/spot-illustrations/light_30.png" alt="" width="305" /><img class="d-light-none" src="../../../assets/img/spot-illustrations/dark_30.png" alt="" width="305" /></div>
                <div class="col-auto">
                    <div class="text-center text-lg-start">
                    <h3 class="text-body-highlight mb-2"><span class="fw-semibold">Want to have the </span>ultimate <br class="d-md-none" />customer experience?</h3>
                    <h1 class="display-3 fw-semibold mb-4">Become a <span class="text-primary fw-bolder">member </span>today!</h1><a class="btn btn-lg btn-primary px-7" href="../../../pages/authentication/simple/sign-up.html">Sign up<span class="fas fa-chevron-right ms-2 fs-9"></span></a>
                    </div>
                </div>
                </div>
            {{-- additinal section end --}}

           </div>

      </section>
       
      </div>

      <div class="support-chat-container">
        <div class="container-fluid support-chat">
          <div class="card bg-body-emphasis">
            <div class="card-header d-flex flex-between-center px-4 py-3 border-bottom border-translucent">
              <h5 class="mb-0 d-flex align-items-center gap-2">Demo widget<span class="fa-solid fa-circle text-success fs-11"></span></h5>
              <div class="btn-reveal-trigger">
                <button class="btn btn-link p-0 dropdown-toggle dropdown-caret-none transition-none d-flex" type="button" id="support-chat-dropdown" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h text-body"></span></button>
                <div class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="support-chat-dropdown"><a class="dropdown-item" href="#!">Request a callback</a><a class="dropdown-item" href="#!">Search in chat</a><a class="dropdown-item" href="#!">Show history</a><a class="dropdown-item" href="#!">Report to Admin</a><a class="dropdown-item btn-support-chat" href="#!">Close Support</a></div>
              </div>
            </div>
            <div class="card-body chat p-0">
              <div class="d-flex flex-column-reverse scrollbar h-100 p-3">
                <div class="text-end mt-6"><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">I need help with something</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">I can’t reorder a product I previously ordered</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="mb-2 d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">How do I place an order?</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a><a class="false d-inline-flex align-items-center text-decoration-none text-body-emphasis bg-body-hover rounded-pill border border-primary py-2 ps-4 pe-3" href="#!">
                    <p class="mb-0 fw-semibold fs-9">My payment method not working</p><span class="fa-solid fa-paper-plane text-primary fs-9 ms-3"></span>
                  </a>
                </div>
                <div class="text-center mt-auto">
                  <div class="avatar avatar-3xl status-online"><img class="rounded-circle border border-3 border-light-subtle" src="../../../assets/img/team/30.webp" alt="" /></div>
                  <h5 class="mt-2 mb-3">Eric</h5>
                  <p class="text-center text-body-emphasis mb-0">Ask us anything – we’ll get back to you here or by email within 24 hours.</p>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center gap-2 border-top border-translucent ps-3 pe-4 py-3">
              <div class="d-flex align-items-center flex-1 gap-3 border border-translucent rounded-pill px-4">
                <input class="form-control outline-none border-0 flex-1 fs-9 px-0" type="text" placeholder="Write message" />
                <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatPhotos"><span class="fa-solid fa-image"></span></label>
                <input class="d-none" type="file" accept="image/*" id="supportChatPhotos" />
                <label class="btn btn-link d-flex p-0 text-body-quaternary fs-9 border-0" for="supportChatAttachment"> <span class="fa-solid fa-paperclip"></span></label>
                <input class="d-none" type="file" id="supportChatAttachment" />
              </div>
              <button class="btn p-0 border-0 send-btn"><span class="fa-solid fa-paper-plane fs-9"></span></button>
            </div>
          </div>
        </div>
        <button class="btn p-0 border border-translucent btn-support-chat"><span class="fs-8 btn-text text-primary text-nowrap">Chat demo</span><span class="fa-solid fa-circle text-success fs-9 ms-2"></span><span class="fa-solid fa-chevron-down text-primary fs-7"></span></button>
      </div>

      @include('frontend.layouts.footer')

    </main>
     {{-- main content end--}}


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header align-items-start border-bottom flex-column border-translucent">
        <div class="pt-1 w-100 mb-6 d-flex justify-content-between align-items-start">
          <div>
            <h5 class="mb-2 me-2 lh-sm"><span class="fas fa-palette me-2 fs-8"></span>Theme Customizer</h5>
            <p class="mb-0 fs-9">Explore different styles according to your preferences</p>
          </div>
          <button class="btn p-1 fw-bolder" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><span class="fas fa-times fs-8"> </span></button>
        </div>
        <button class="btn btn-phoenix-secondary w-100" data-theme-control="reset"><span class="fas fa-arrows-rotate me-2 fs-10"></span>Reset to default</button>
      </div>
      <div class="offcanvas-body scrollbar px-card" id="themeController">
        <div class="setting-panel-item mt-0">
          <h5 class="setting-panel-item-title">Color Scheme</h5>
          <div class="row gx-2">
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherLight"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/default-light.png" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherDark"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/default-dark.png" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
            <div class="col-4">
              <input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio" value="auto" data-theme-control="phoenixTheme" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="themeSwitcherAuto"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/auto.png" alt=""/></span><span class="label-text"> Auto</span></label>
            </div>
          </div>
        </div>
        <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="setting-panel-item-title mb-1">RTL </h5>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixIsRTL" />
            </div>
          </div>
          <p class="mb-0 text-body-tertiary">Change text direction</p>
        </div>
        <div class="border border-translucent rounded-3 p-4 setting-panel-item bg-body-emphasis">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="setting-panel-item-title mb-1">Support Chat </h5>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input ms-auto" type="checkbox" data-theme-control="phoenixSupportChat" />
            </div>
          </div>
          <p class="mb-0 text-body-tertiary">Toggle support chat</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Navigation Type</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarPositionVertical" name="navigation-type" type="radio" value="vertical" data-theme-control="phoenixNavbarPosition" data-page-url="../../../documentation/layouts/vertical-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionVertical"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/default-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/default-dark.png" alt=""/></span><span class="label-text">Vertical</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionHorizontal" name="navigation-type" type="radio" value="horizontal" data-theme-control="phoenixNavbarPosition" data-page-url="../../../documentation/layouts/horizontal-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionHorizontal"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/top-default-dark.png" alt=""/></span><span class="label-text"> Horizontal</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionCombo" name="navigation-type" type="radio" value="combo" data-theme-control="phoenixNavbarPosition" disabled="disabled" data-page-url="../../../documentation/layouts/combo-navbar.html" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionCombo"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/nav-combo-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/nav-combo-dark.png" alt=""/></span><span class="label-text"> Combo</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarPositionTopDouble" name="navigation-type" type="radio" value="dual-nav" data-theme-control="phoenixNavbarPosition" disabled="disabled" data-page-url="../../../documentation/layouts/dual-nav.html" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarPositionTopDouble"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/dual-light.png" alt=""/><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/dual-dark.png" alt=""/></span><span class="label-text"> Dual nav</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update navigation type in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Vertical Navbar Appearance</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-default" type="radio" name="config.name" value="default" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" />
              <label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-default"> <img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/default-light.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/default-dark.png" alt="" /><span class="label-text d-dark-none"> Default</span><span class="label-text d-light-none">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-dark" type="radio" name="config.name" value="darker" data-theme-control="phoenixNavbarVerticalStyle" disabled="disabled" />
              <label class="btn d-block w-100 btn-navbar-style fs-9" for="navbar-style-dark"> <img class="img-fluid img-prototype d-dark-none" src="../../../assets/img/generic/vertical-darker.png" alt="" /><img class="img-fluid img-prototype d-light-none" src="../../../assets/img/generic/vertical-lighter.png" alt="" /><span class="label-text d-dark-none"> Darker</span><span class="label-text d-light-none">Lighter</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update vertical navbar appearance in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Horizontal Navbar Shape</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarShapeDefault" name="navbar-shape" type="radio" value="default" data-theme-control="phoenixNavbarTopShape" data-page-url="../../../documentation/layouts/horizontal-navbar.html" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-default-dark.png" alt=""/></span><span class="label-text">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarShapeSlim" name="navbar-shape" type="radio" value="slim" data-theme-control="phoenixNavbarTopShape" data-page-url="../../../documentation/layouts/horizontal-navbar.html#horizontal-navbar-slim" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarShapeSlim"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-slim.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-slim-dark.png" alt=""/></span><span class="label-text"> Slim</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar shape in this page</p>
        </div>
        <div class="setting-panel-item">
          <h5 class="setting-panel-item-title">Horizontal Navbar Appearance</h5>
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbarTopDefault" name="navbar-top-style" type="radio" value="default" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDefault"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/top-default.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-style-darker.png" alt=""/></span><span class="label-text">Default</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbarTopDarker" name="navbar-top-style" type="radio" value="darker" data-theme-control="phoenixNavbarTopStyle" disabled="disabled" />
              <label class="btn d-inline-block btn-navbar-style fs-9" for="navbarTopDarker"> <span class="mb-2 rounded d-block"><img class="img-fluid img-prototype d-dark-none mb-0" src="../../../assets/img/generic/navbar-top-style-light.png" alt=""/><img class="img-fluid img-prototype d-light-none mb-0" src="../../../assets/img/generic/top-style-lighter.png" alt=""/></span><span class="label-text d-dark-none">Darker</span><span class="label-text d-light-none">Lighter</span></label>
            </div>
          </div>
          <p class="text-warning-dark font-medium"> <span class="fa-solid fa-triangle-exclamation me-2 text-warning"></span>You can't update horizontal navbar appearance in this page</p>
        </div><a class="bun btn-primary d-grid mb-3 text-white mt-5 btn btn-primary" href="https://themes.getbootstrap.com/product/phoenix-admin-dashboard-webapp-template/" target="_blank">Purchase template</a>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center px-2 py-1">
        <div class="position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-body-tertiary fw-bold py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>

    @include('backend.layouts.js_assets');

  </body>

</html>