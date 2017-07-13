        <!DOCTYPE html>

<html>

    <head>

        <title>{!! Config::get('app.name') !!}</title>

        <!-- Site Charset -->

        <meta charset="utf-8">

        <!-- Mobile Meta -->

        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">



        <link href="{!! url('/') !!}/assets/frontend/css/animate.css" rel="stylesheet" type="text/css"/>

        <link href="{!! url('/') !!}/assets/frontend/css/hover.css" rel="stylesheet" type="text/css"/>

        <link href="{!! url('/') !!}/assets/frontend/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="{{ url('/') }}/assets/backend/plugins/sweetalert-master/dist/sweetalert.css" rel="stylesheet">    

        <!-- light owl -->

        <link href="{!! url('/') !!}/assets/frontend/css/owl.carousel.css" rel="stylesheet" type="text/css"/>

        <link href="{!! url('/') !!}/assets/frontend/css/royalslider.css" rel="stylesheet" type="text/css"/>

        <link href="{!! url('/') !!}/assets/frontend/css/rs-universal.css" rel="stylesheet" type="text/css"/>


        <!-- BootStrap StyleSheets -->

        <link href="{!! url('/') !!}/assets/frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Main StyleSheet -->

        <link href="{!! url('/') !!}/assets/frontend/style.css" rel="stylesheet" type="text/css" >

        <link href="{!! url('/') !!}/assets/frontend/css/media.css" rel="stylesheet" type="text/css"/>

        @yield('header')


    </head>

    <body>

        <div id="csrf_token" data-token="{!! csrf_token() !!}"></div>

        <header>

            <div class="header_top">

                <div class="container">

                    <ul class="list-inline">

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-globe"></i> {!! App::isLocale('en') ? 'English' : 'Portuguese' !!} <span class="caret"></span>  </a>

                            <ul id="langOption" class="dropdown-menu">
                                <li><a data-lang="en" href="#">English </a></li>
                                <li><a data-lang="po" href="#">Portuguese </a></li>                               
                            </ul>

                            <form action="{!! url('lang') !!}" method="post" id="langForm" class="hidden">
                                <input type="text" name="lang" id="langInput" value="">
                                {!! csrf_field() !!}
                            </form>

                        </li>

                        @if(!Auth::check())

                        <li data-toggle="modal" data-target="#loginModal"> <a href="#">{!! Lang::get('main.login') !!}</a></li>

                        <li data-toggle="modal" data-target="#registerModel"> <a href="#">{!! Lang::get('main.register') !!}</a></li>

                        @else

                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> {!! Lang::get('main.welcome') !!}, {!! Auth::user()->name !!} <span class="caret"></span>  </a>

                            <ul class="dropdown-menu">
                                <li><a href="{!! url('profile') !!}">profile </a></li>
                                @if(Auth::user()->type == 'admin')
                                <li><a href="{!! url('dashboard') !!}">dashboard </a></li>
                                @endif
                                @if(Auth::user()->type == 'shop')
                                <li><a href="{!! url('shops/'.Auth::id()) !!}">products </a></li>
                                @endif
                                <li><a href="{!! url('logout') !!}">logout </a></li>                               
                            </ul>

                        </li>

                        @endif

                    </ul>

                    @if(!Auth::check())
                    <!-- Login Modal -->
                    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form method="post" action="{!! url('login') !!}">

                                    {!! csrf_field() !!}

                                    <div class="form-group" id="lognEmail">                                    
                                        <input type="email" name="email" class="form-control" placeholder="your E-mail">
                                    </div>

                                    <input type="password" name="password" class="form-control" placeholder="Password">

                                    <!-- <a href="#" class="bac">Forgot your password?</a> -->

                                    <!-- <div class="social">

                                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-facebook   wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1.2s' ></i></a>

                                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-google-plus  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1s' ></i></a>

                                    </div> -->

                                    <button type="submit" class="btn btn-default">Log in</button>

                                    <ul class="list-inline">

                                        <li>New to Baquia?</li>

                                        <li id="toRegisterModal"><span>sign up</span></li>

                                    </ul>

                                </form>

                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                    </div><!-- /.modal -->


                    <!-- Register Modal -->
                    <div class="modal fade" id="registerModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form id="registerForm" method="post" action="{!! url('/register') !!}">

                                    {!! csrf_field() !!}

                                    <div class="form-group has-error" id="register_email">
                                        <input type="email" name="email" class="form-control" placeholder="your E-mail">
                                        <span style="color: #d82320;font-size: 16px;font-weight: bold;"></span>
                                    </div>

                                    <div class="form-group" id="register_password">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span style="color: #d82320;font-size: 16px;font-weight: bold;"></span>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                                        <span style="color: #d82320;font-size: 16px;font-weight: bold;"></span>
                                    </div>

                                    <div class="form-group" id="register_type">
                                        <select name="type" class="form-control">
                                            <option value="user">User</option>
                                            <option value="shop">Shop</option>
                                        </select>
                                        <span style="color: #d82320;font-size: 16px;font-weight: bold;"></span>
                                    </div>
                                    <!-- <a href="#" class="bac">Forgot your password?</a> -->

                                    <!-- <div class="social">

                                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-facebook   wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1.2s' ></i></a>

                                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-google-plus  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1s' ></i></a>

                                    </div> -->

                                    <button type="submit" id="register" class="btn btn-default">Register</button>

                                    <ul class="list-inline">

                                        <li>Already have an account?</li>

                                        <li id="toLoginModal"><span>login</span></li>

                                    </ul>

                                </form>

                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->

                    </div><!-- /.modal -->

                    @endif

                    <div class="social">

                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-instagram   wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1.2s' ></i></a>

                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-youtube-play  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1s' ></i></a>

                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-google-plus  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.6s' ></i></a>

                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-twitter wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.4s'></i></a>

                        <a href="#" class="hvr-wobble-vertical"><i class="fa fa-facebook wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.2s' ></i></a>

                    </div><!-- end social -->

                </div>

            </div>

            <div class="header_center">

                <div class="container">

                    <div class="logo">

                        <a href="{!! url('/') !!}"><img src="{!! url('/') !!}/assets/frontend/images/logo3.png" /></a>

                    </div>

                    <form action="{!! url('search') !!}">
                        <div class="search">

                            <div class="input-group">

                                <input type="text" name="s" value="@if(isset($_GET['s'])) {!! $_GET['s'] !!}@endif" class="form-control" placeholder="search">

                                <span class="input-group-btn">

                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>

                                </span>

                            </div><!-- /input-group -->

                        </div>
                    </form>

                    <div class="cart">

                        <a href="{!! url('profile') !!}">

                            <img src="{!! url('/') !!}/assets/frontend/images/cart.png" />

                        </a>

                        <span>{!! DB::table('carts')->where('user_id',Auth::id())->count() !!}</span>

                    </div>

                </div>

            </div>

            <nav class="visible-xs">

                <div id="menu" class="menu_mobile">

                    <div class="menu-header"> main MENU </div>

                    <ul>

                        <li><a href="{!! url('/') !!}">{!! Lang::get('main.home') !!}</a></li>

                        <li><a href="#">{!! Lang::get('main.promotion') !!}</a>

                            <ul class="submenu">

                                <li><a href="#"> Dress</a></li>

                                <li><a href="#">Jacket </a></li>

                                <li><a href="#">T-Shirt </a></li>

                                <li><a href="#">Pullover </a></li>

                            </ul>

                        </li>

                        <li>

                            <a href="#">{!! Lang::get('main.clothing_accessories') !!}</a>

                            <ul class="submenu">

                                <li><a href="#"> women </a>

                                    <ul class="submenu">

                                        <li><a href="#"> All Brands</a></li>

                                        <li><a href="#">Colcci </a></li>

                                        <li><a href="#"> Osklen</a></li>

                                        <li><a href="#"> Triton</a></li>

                                        <li><a href="#"> Forum</a></li>

                                        <li><a href="#">Ellus </a></li>



                                    </ul>

                                </li>

                                <li><a href="#"> men </a>

                                    <ul class="submenu">

                                        <li><a href="#"> All Brands</a></li>

                                        <li><a href="#">Colcci </a></li>

                                        <li><a href="#"> Osklen</a></li>

                                        <li><a href="#"> Triton</a></li>

                                        <li><a href="#"> Forum</a></li>

                                        <li><a href="#">Ellus </a></li>



                                    </ul>

                                </li>

                                <li><a href="#"> kids </a>

                                    <ul class="submenu">

                                        <li><a href="#"> All Brands</a></li>

                                        <li><a href="#">Colcci </a></li>

                                        <li><a href="#"> Osklen</a></li>

                                        <li><a href="#"> Triton</a></li>

                                        <li><a href="#"> Forum</a></li>

                                        <li><a href="#">Ellus </a></li>



                                    </ul>

                                </li>

                                <li><a href="#"> Hosting</a></li>

                                <li><a href="#"> Design </a></li>

                            </ul>

                        </li>

                        <li><a href="#"> {!! Lang::get('main.accessories') !!}</a></li>

                        <li><a href="#"> {!! Lang::get('main.cosmetics') !!}</a></li>

                        <li><a href="#"> {!! Lang::get('main.contact') !!}</a></li>

                    </ul>



                </div>

            </nav>

            <div class="menu text-center hidden-xs">

                <nav class="navbar navbar-default">

                    <div class="container">

                        <!-- Brand and toggle get grouped for better mobile display -->

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                                <span class="sr-only">Toggle navigation</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>



                        </div>



                        <!-- Collect the nav links, forms, and other content for toggling -->

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav ">

                                <li class="active"><a href="{!! url('/') !!}">{!! Lang::get('main.home') !!} </a></li>

                                <li class="dropdown">

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! Lang::get('main.promotion') !!}  </a>

                                    <ul class="dropdown-menu">

                                        <div class="slider-last">

                                            <div class="container">

                                                <div class="slider-prodcut">

                                                    <div id="mobile" class="owl-carousel owl-theme">

                                                        @foreach($promotion as $item)
                                                        <div class="item">

                                                            <div class="photo">

                                                                <img height="175px" src="{!! url('/images/normal/'.$item->image) !!}" />

                                                                <a href="{!! url('products/'.$item->id) !!}" class="btn btn-default"><i class="fa fa-plus"></i></a>

                                                            </div>

                                                            <div class="info">

                                                                <table class="table">

                                                                    <tbody>

                                                                        <tr>

                                                                            <td>Name</td>

                                                                            <td>{!! Lang::get('main.product_'.$item->id.'_name') !!}</td>

                                                                        </tr>

                                                                        <tr>

                                                                            <td>Brand</td>

                                                                            <td><a href="{!! url('shops/'.$item->shop->id) !!}">{!! $item->shop->name !!}</a></td>

                                                                        </tr>

                                                                        <tr>

                                                                            <td>Price</td>

                                                                            <td>{!! $item->price !!}$</td>

                                                                            <td>{!! $item->discount !!} %</td>

                                                                        </tr>

                                                                    </tbody>

                                                                </table>

                                                            </div>

                                                        </div>
                                                        @endforeach

                                                    </div>

                                                </div><!-- slider-prodcut -->

                                            </div>

                                        </div> 

                                        <!-- end slider-last -->

                                    </ul>

                                </li>


                                <!-- Clothing Accessories -->
                                @include('site.parts.nav.clothes')
                                

                                <li><a href="{!! url('category/15') !!}"> {!! Lang::get('main.accessories') !!}</a></li>

                                <li><a href="{!! url('category/16') !!}"> {!! Lang::get('main.cosmetics') !!}</a></li>

                                <li><a href="#"> {!! Lang::get('main.contact') !!}</a></li>

                            </ul>

                        </div><!-- /.navbar-collapse -->

                    </div><!-- /.container-fluid -->

                </nav>

            </div><!-- end menu -->

        </header>

        @yield('content')

        <div class="banner">

            <div class="container">

                <a href="#">

                    <img src="{!! url('/') !!}/assets/frontend/images/banner22.png">

                </a>

            </div>

        </div>

        <div class="footer_top">

            <h2 class="heading">De volta ao topo</h2>

            <div class="container">

                <div class="row">

                    <div class="col-md-6">

                        <img src="{!! url('/') !!}/assets/frontend/images/fo_logo.png" class="img-responsive left"/>

                        <ul class="list-inline">

                            <h4>{!! Lang::get('main.get_application') !!}</h4>

                            <li>{!! Lang::get('main.comming_soon') !!}</li>

                            <li><a href="#"><img src="{!! url('/') !!}/assets/frontend/images/apple.png" class="img-responsive" /></a></li>

                            <li><a href="#"><img src="{!! url('/') !!}/assets/frontend/images/android.png" class="img-responsive"/></a></li>

                        </ul>

                    </div>

                    <div class="col-md-6">

                        <div class="box_mail">    

                            <h2 class="title">{!! Lang::get('main.mailing_list') !!}</h2>

                            <!-- <p class="style">Subscribe to the mailing list to receive new offers and products</p> -->

                            <div class="mail">

                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="E mail">

                                    <span class="input-group-btn">

                                        <button class="btn btn-default" type="button">{!! Lang::get('main.subscribe') !!}</button>

                                    </span>

                                </div><!-- /input-group -->

                            </div><!-- end mail -->

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <footer>

            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-6">

                        <h3 class="title">{!! Lang::get('main.we_can_help') !!}</h3>

                        <ul class="list-unstyled">

                            <li><a href="#">{!! Lang::get('main.contact') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.how_to_buy') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.payment_options') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.delivery_policy') !!}</a></li>

                            <li><a href="#"></a></li>



                        </ul>



                    </div>

                    <div class="col-md-3 col-sm-6">

                        <h3 class="title">{!! Lang::get('main.about_us') !!}</h3>

                        <ul class="list-unstyled">

                            <li><a href="#">{!! Lang::get('main.about_baquia') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.wrok_at_baquia') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.privacy_policy') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.terms_and_conditions') !!}</a></li>

                        </ul>



                    </div>

                    <div class="col-md-3 col-sm-6">

                        <h3 class="title">{!! Lang::get('main.list') !!}</h3>

                        <ul class="list-unstyled">

                            <li><a href="{!! url('/') !!}">{!! Lang::get('main.home') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.promotion') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.clothing_accessories') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.accessories') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.cosmetics') !!}</a></li>



                        </ul>



                    </div>

                    <div class="col-md-3 col-sm-6">

                        <h3 class="title">{!! Lang::get('main.earn_money') !!}</h3>

                        <ul class="list-unstyled">

                            <li><a href="#">{!! Lang::get('main.sell_baquia') !!}</a></li>

                            <li><a href="#">{!! Lang::get('main.affiliate_program') !!}</a></li>

                        </ul>



                    </div>

                    <div class="col-md-12 col-sm-12">

                        <h3 class="title text-center">{!! Lang::get('main.follow_us') !!}</h3>

                        <div class="social">

                            <a href="#" class="hvr-wobble-vertical"><i class="fa fa-instagram   wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1.2s' ></i></a>

                            <a href="#" class="hvr-wobble-vertical"><i class="fa fa-youtube-play  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='1s' ></i></a>

                            <a href="#" class="hvr-wobble-vertical"><i class="fa fa-google-plus  wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.6s' ></i></a>

                            <a href="#" class="hvr-wobble-vertical"><i class="fa fa-twitter wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.4s'></i></a>

                            <a href="#" class="hvr-wobble-vertical"><i class="fa fa-facebook wow  fadeInDown" data-wow-duration="1s" data-wow-delay='.2s' ></i></a>

                        </div><!-- end social -->

                    </div>

                </div>

            </div>

        </footer>

        <!-- JavaScript -->

        <script type="text/javascript" src="{!! url('/') !!}/assets/frontend/js/jquery.min.js"></script>

        <script type="text/javascript" src="{!! url('/') !!}/assets/frontend/js/bootstrap.min.js"></script>

        <script src="{!! url('/') !!}/assets/frontend/js/owl.carousel.js" type="text/javascript"></script>

        <script type="text/javascript" src="{!! url('/') !!}/assets/frontend/js/wow.min.js"></script>

        <script src="{!! url('/') !!}/assets/frontend/js/script.js" type="text/javascript"></script>

        <script src="{!! url('/') !!}/assets/frontend/js/jquery.royalslider.min.js" type="text/javascript"></script>

        <script src="{{ url('/') }}/assets/backend/plugins/sweetalert-master/dist/sweetalert.min.js"></script>
    
        <script>
        $(document).ready(function(){
            $('#toLoginModal').click(function(){
                $('#registerModel').modal('hide');
                $('#loginModal').modal('show');
            });

            $('#toRegisterModal').click(function(){
                $('#loginModal').modal('hide');
                $('#registerModel').modal('show');
            });
        });
        </script>

        <script type="text/javascript">
            $('#register').click(function(e){
                e.preventDefault();

                $.ajax({
                    url: "{!! url('register') !!}",
                    method: "POST",
                    dataType: "json",
                    data: $('#registerForm').serialize(),
                    success: function(data){
                        
                        if(data['status'] == 'erorr'){
                            $.each(data, function(i, val){
                                $('#register_'+i).addClass('has-error').children('span').text(val);
                            });    
                        }else{
                            window.location.href = "{!! url('profile/edit') !!}";
                        }
                        
                    },
                });
            });

            $('#langOption li a').click(function(){
                $('#langForm #langInput').val($(this).data('lang'));
                $('#langForm').submit();
            });
        </script>

        @yield('footer')

        <script type="text/javascript" src="{!! url('/') !!}/js/ajax.js"></script>

        <script type="text/javascript" src="{!! url('/') !!}/assets/frontend/js/main.js"></script>
        
    </body>

</html>