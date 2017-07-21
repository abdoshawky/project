<!DOCTYPE html>

<html dir="{!! config('app.locale') == 'ar' ? 'rtl' : 'ltr' !!}" lang="{{ config('app.locale') }}">

<head>

    <title>Green Earth</title>

    <!-- Site Charset -->

    <meta charset="utf-8">

    <!-- Mobile Meta -->

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">


    <link href="{!! url('/assets/frontend/') !!}/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <!-- slick slider -->

    <link href="{!! url('/assets/frontend/') !!}/css/slick.css" rel="stylesheet" type="text/css"/>

    <link href="{!! url('/assets/frontend/') !!}/css/feature-carousel.css" rel="stylesheet" type="text/css"/>

    <!-- BootStrap StyleSheets -->

    <link rel="stylesheet" type="text/css" href="{!! url('/assets/frontend/') !!}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{!! url('/assets/frontend/') !!}/style.css">
    @if(config('app.locale') == 'ar')
        <link rel="stylesheet" type="text/css" href="{!! url('/assets/frontend/') !!}/css/bootstrap-rtl.css">
        <link rel="stylesheet" type="text/css" href="{!! url('/assets/frontend/') !!}/style_ar.css">
    @else
        <link rel="stylesheet" type="text/css" href="{!! url('/assets/frontend/') !!}/style_en.css">
    @endif

    <!-- Main StyleSheet -->



    <link href="{!! url('/assets/frontend/') !!}/css/media.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="{!! url('/assets/frontend/') !!}/js/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="{!! url('/assets/frontend/') !!}/js/jquery.featureCarousel.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#carousel").featureCarousel({
                largeFeatureWidth: 0,
            });

            $("#testimonials_carousel").featureCarousel({
                largeFeatureWidth: 0,
            });
        });
    </script>

</head>

<body>

<div class="container-fluid">

    <header class="col-md-12">

        <div class="container">
            <div class="row">

                <div class="logo col-md-4">
                    <a href="#">
                        <img src="{!! url('/assets/frontend/') !!}/images/logo.png">
                    </a>
                </div>

                <div class="navbar col-md-8">
                    <ul>
                        <a class="scroll" data-scroll="#home"  href="#"><li>{!! Lang::get('main.home') !!}</li></a>
                        <a class="scroll" data-scroll="#about_app" href="#"><li>{!! Lang::get('main.about_app') !!}</li></a>
                        <a class="scroll" data-scroll="#features"  href="#"><li>{!! Lang::get('main.features') !!}</li></a>
                        <a class="scroll" data-scroll="#contact_us"  href="#"><li>{!! Lang::get('main.contact_us') !!}</li></a>

                        <a id="lang" href="#" data-lang="{!! config('app.locale') == 'en' ? 'ar' : 'en' !!}"><li>{!! config('app.locale') == 'en' ? 'العربية' : 'English' !!}</li></a>
                    </ul>

                    <a data-scroll="#vip_service"  class="vip-service scroll" href="#"><i class="fa fa-star"></i><span>{!! Lang::get('main.vip_service') !!}</span></a>
                </div>
            </div>
        </div>
    <form method="post" action="" class="hidden" id="langForm">
        {!! csrf_field() !!}
        <input name="lang" type="hidden" value="" id="langInput">
    </form>
    </header>

    <!-- start main section -->
    <section id="home" class="main-section">
        <!-- Start header -->

        <!-- End header -->

        <div class="container">

            <div class="row">

                <div class="col-md-6 description">
                    <h1>{!! Lang::get('main.download_app') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.download_app_content') !!}</p>
                    <div class="download-icons">
                        <a href="#">
                            <div class="store">
                                <div class="description">
                                    <span>Download it from</span>
                                    <br>
                                    <span class="store-name">google play</span>
                                </div>
                                <div class="image">
                                    <img src="{!! url('/assets/frontend/') !!}/images/GooglePlay.png">
                                </div>

                            </div>
                        </a>

                        <a href="#">
                            <div class="store">
                                <div class="description">
                                    <span>Download it from</span>
                                    <br>
                                    <span class="store-name">app store</span>
                                </div>
                                <div class="image">
                                    <img src="{!! url('/assets/frontend/') !!}/images/AppleLogo.png">
                                </div>

                            </div>
                        </a>

                    </div>
                </div>

                <div class="col-md-6">
                    <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/main_image.png">
                </div>
            </div>
        </div>
    </section>
    <!-- End main section -->

    <!-- start about section -->
    <section class="about">
        <div class="container">
            <div class="company">
                <div class="row">

                    <div class="col-md-6 about-description">

                        <h1>{!! Lang::get('main.about_company') !!}</h1>
                        <p class="desc-p">{!! Lang::get('main.about_company_content') !!}</p>

                    </div>

                    <div class="col-md-6 about-image">
                        <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/about_logo.png">
                    </div>
                </div>
            </div>

            <div id="about_app" class="app">
                <div class="row">

                    <div class="col-md-6">
                        <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/about_app.png">
                    </div>

                    <div class="col-md-6 about-description">
                        <h1>{!! Lang::get('main.about_app') !!}</h1>
                        <p class="desc-p">{!! Lang::get('main.about_app_content') !!}</p>

                        <h2>{!! Lang::get('main.save_your_time') !!}</h2>
                        <p class="desc-p">{!! Lang::get('main.save_your_time_content') !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end about section-->

    <!--Start features section-->
     <section id="features" class="features">

        <div class="container">

            <div class="row">

                <div class="col-md-6 features-description">

                    <h1>{!! Lang::get('main.app_features') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.app_features_content') !!}</p>

                    <h1>{!! Lang::get('main.app_goals') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.app_goals_content') !!}</p>

                </div>

                <div class="col-md-6 features-image">
                    <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/app_features.png">
                </div>

            </div>
        </div>
    </section>
    <!--End features section-->

    <div class="clearfix"></div>

    <!-- Start Build your house section -->
    <section class="build">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <img src="{!! url('/assets/frontend/') !!}/images/build_house.png" class="img-responsive">
                </div>

                <div class="col-md-6">
                    <h1>{!! Lang::get('main.build_your_app') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.build_your_app_content') !!}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End Build your house section -->

    <!-- Start Confused section -->
    <section class="confused">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h1>{!! Lang::get('main.are_you_confused') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.are_you_confused_content') !!}</p>
                </div>

                <div class="col-md-4">
                    <img src="{!! url('/assets/frontend/') !!}/images/confused_image.png" class="img-responsive">
                </div>

                <div class="col-md-4">
                    <h1>{!! Lang::get('main.company_leader') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.company_leader_content') !!}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End Confused section -->

    <!-- Start Best section -->
    <section class="best">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <img src="{!! url('/assets/frontend/') !!}/images/the_best.png" class="img-responsive">
                </div>

                <div class="col-md-6">
                    <h1>{!! Lang::get('main.choose_the_best') !!}</h1>
                    <p class="desc-p">{!! Lang::get('main.choose_the_best_content') !!}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End Best section -->

    <!-- Start Guide section -->
    <section class="guide">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <div class="col-md-3 guide-image">
                        <img src="{!! url('/assets/frontend/') !!}/images/price-tag.png" class="img-responsive">
                    </div>

                    <div class="col-md-9 guide-details">
                        <h2>{!! Lang::get('main.app_prices') !!}</h2>
                        <p class="desc-p">{!! Lang::get('main.app_prices_content') !!}</p>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="col-md-3 guide-image">
                        <img src="{!! url('/assets/frontend/') !!}/images/house.png" class="img-responsive">
                    </div>

                    <div class="col-md-9 guide-details">
                        <h2>{!! Lang::get('main.app_steps') !!}</h2>
                        <p class="desc-p">{!! Lang::get('main.app_steps_content') !!}</p>
                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="col-md-6">

                    <div class="col-md-3 guide-image">
                        <img src="{!! url('/assets/frontend/') !!}/images/medal.png" class="img-responsive">
                    </div>

                    <div class="col-md-9 guide-details">
                        <h2>{!! Lang::get('main.app_quality') !!}</h2>
                        
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="col-md-3 guide-image">
                        <img src="{!! url('/assets/frontend/') !!}/images/brainstorm.png" class="img-responsive">
                    </div>

                    <div class="col-md-9 guide-details">
                        <h2>{!! Lang::get('main.strategic_projects') !!}</h2>
                        <p class="desc-p">{!! Lang::get('main.strategic_projects_content') !!}</p>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- End Guide section -->

    <!-- Start VIP service section -->
    <section id="vip_service" class="vip-service">

        <div class="col-md-6 vip-image">
            <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/Vector_Smart_Object.png">
        </div>

        <div class="col-md-6">
            <h1 class="vip-service-title">
                <i class="fa fa-star"></i>{!! Lang::get('main.vip_service') !!}
            </h1>
            <p class="desc-p">{!! Lang::get('main.vip_service_content') !!}</p>
            <span style="font-weight: bold">{!! Lang::get('main.vip_service_include') !!}</span>
            <ul class="services">
                <li>
                    {!! Lang::get('main.vip_service_include_1') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_2') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_3') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_4') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_5') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_6') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_7') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_8') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_9') !!}
                </li>
                <li>
                    {!! Lang::get('main.vip_service_include_10') !!}
                </li>
            </ul>

        </div>
    </section>
    <!-- End VIP service section -->

    <div class="clearfix"></div>

    <!-- Start Organizations service section -->
    <section class="orgnizations">

        <div class="col-md-6 orgnizations-description">
            <h1 class="orgnizations-title">{!! Lang::get('main.organization_section') !!}</h1>
            <p class="desc-p">{!! Lang::get('main.organization_section_content') !!}</p>
            <span style="font-weight: bold">{!! Lang::get('main.organization_section_communicate') !!}</span>
            <p class="desc-p">
                {!! Lang::get('main.through_email') !!} Investments@greenearth-re.com <br>
               {!! Lang::get('main.local_number') !!} 07730005500
                {!! Lang::get('main.international_number') !!} 009647730005500
            </p>
        </div>

        <div class="col-md-6 orgnizations-image">
            <img class="img-responsive" src="{!! url('/assets/frontend/') !!}/images/Layer_5.png">
        </div>
    </section>
    <!-- End Organizations service section -->

    <div class="clearfix"></div>

    <!-- Start Application image section -->
    <section class="app-images">
        <div class="container">
            <h1 class="text-center">{!! Lang::get('main.application_images') !!}</h1>
            <div id="carousel" class="app-slides col-md-12">

                <div class="carousel-feature">
                  <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/1.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/2.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/3.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/4.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/5.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/6.png" width="200px;"></a>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/7.png" width="200px;"></a>
                </div>

            </div>
        </div>
    </section>
    <!-- End Application image section -->

    <!-- Start Testimonials section -->
    <section class="testimonials">
        <div class="container">
            <h1 class="text-center">{!! Lang::get('main.testimonials') !!}</h1>
            <div id="testimonials_carousel" class="testimonials-slides col-md-12">

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/user.jpg" width="200px;border-radius:50%"></a>
                    <div class="carousel-caption">
                        <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                        </div>
                        <p>
                            {!! Lang::get('main.testimonial') !!}
                        </p>
                    </div>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/user.jpg" width="200px;border-radius:50%"></a>
                    <div class="carousel-caption">
                        <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                        </div>
                        <p>
                            {!! Lang::get('main.testimonial') !!}
                        </p>
                    </div>
                </div>

                <div class="carousel-feature">
                    <a href="#"><img class="img-responsive carousel-image" alt="Image Caption" src="{!! url('/assets/frontend/') !!}/images/user.jpg" width="200px;border-radius:50%"></a>
                    <div class="carousel-caption">
                        <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                        </div>
                        <p>
                            {!! Lang::get('main.testimonial') !!}
                        </p>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!-- End Testimonials section -->

    <!-- Start Download now section -->
    <section class="download-now">
        <div class="container">
            <h1>{!! Lang::get('main.why_wait') !!}</h1>
            <div class="download-icons">
                <a href="#">
                    <div class="store">
                        <div class="description">
                            <span>Download it from</span>
                            <br>
                            <span class="store-name">google play</span>
                        </div>
                        <div class="image">
                            <img src="{!! url('/assets/frontend/') !!}/images/GooglePlay.png">
                        </div>

                    </div>
                </a>

                <a href="#">
                    <div class="store">
                        <div class="description">
                            <span>Download it from</span>
                            <br>
                            <span class="store-name">app store</span>
                        </div>
                        <div class="image">
                            <img src="{!! url('/assets/frontend/') !!}/images/AppleLogo.png">
                        </div>

                    </div>
                </a>

            </div>
        </div>
    </section>
    <!-- End Download now section -->

    <div class="clearfix"></div>

    <!-- Start footer -->
    <footer>
        <div id="contact_us" class="container contact-us">
            <div class="row">

                <div class="col-md-5">
                    <h3>{!! Lang::get('main.contact_us') !!}</h3>
                    <ul class="contact-info">
                        <li><i class="fa fa-map-marker"></i><span class="contact-item">{!! Lang::get('main.contact_address') !!}</span></li>
                        <li><i class="fa fa-mobile"></i><span class="contact-item">01025500219</span></li>
                        <li><i class="fa fa-envelope-o"></i><span class="contact-item">email@email.com</span></li>
                        <li><i class="fa fa-whatsapp"></i><span class="contact-item">009661257522</span></li>
                    </ul>

                    <ul class="social">
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/facebook.png"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/instagram.png"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/twitter.png"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/linkedin.png"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/google_plus.png"></a>
                        </li>
                        <li>
                            <a href="#"><img src="{!! url('/assets/frontend/') !!}/images/youtube.png"></a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-7">
                    <form>

                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" name="name" placeholder="{!! Lang::get('main.name') !!}">
                        </div>

                        <div class="form-group col-md-8">
                            <input type="text" class="form-control col-md-10" name="email" placeholder="{!! Lang::get('main.email') !!}">
                        </div>

                        <div class="form-group col-md-12">
                            <textarea class="form-control" placeholder="{!! Lang::get('main.message') !!}" name="message" rows="10"></textarea>
                        </div>

                        <div class="btn-group col-md-12">
                            <input type="submit" value="{!! Lang::get('main.send_message') !!}" class="btn btn-success btn-block">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer -->



</div>

<!-- JavaScript -->



<script type="text/javascript" src="{!! url('/assets/frontend/') !!}/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{!! url('/assets/frontend/') !!}/js/slick.js"></script>



<script type="text/javascript" src="{!! url('/assets/frontend/') !!}/script.js"></script>

<script>
    $(document).ready(function(){
        $('#lang').click(function(){
           var lang = $('#lang').data('lang');
           $('#langInput').val(lang);
           $('#langForm').submit();
        });
    });
</script>

</body>

</html>