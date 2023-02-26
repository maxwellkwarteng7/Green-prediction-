
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">

<title>Daily green ticks </title>

<!-- CSS FILES -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">
<base href="public">

<link href="nba/css/bootstrap.min.css" rel="stylesheet">

<link href="nba/css/bootstrap-icons.css" rel="stylesheet">

<link href="nba/css/templatemo-barber-shop.css" rel="stylesheet">

<!--

TemplateMo 585 Barber Shop

https://templatemo.com/tm-585-barber-shop

-->
</head>

<body>

<div class="container-fluid">
<div class="row">

<button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<nav id="sidebarMenu" class="col-md-4 col-lg-3 d-md-block sidebar collapse p-0">

<div class="position-sticky sidebar-sticky d-flex flex-column justify-content-center align-items-center">
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="images/dailylogo.jpg" class="logo-image img-fluid" align="">
    </a>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">Home</a>
        </li>



        <li class="nav-item">
            <a class="nav-link smoothscroll" href="#section_3">Games Summary</a>
        </li>
        @auth
          <li>
              <x-app-layout>

              </x-app-layout>
          </li>
        @endauth


    </ul>
</div>
</nav>

<div class="col-md-8 ms-sm-auto col-lg-9 p-0">
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                    <h1 class="text-white mb-lg-3 mb-4"><strong>Basketball Games</em></strong></h1>
                    <p class="text-black">Get all Basketball predictions here</p>
                    <br>


                    <a class="btn custom-btn smoothscroll mb-2" href="#section_2">Games</a>
                </div>
            </div>
        </div>

        <div class="custom-block d-lg-flex flex-column justify-content-center align-items-center">
            <img src="nba/images/lebron.jpg" class="custom-block-image img-fluid" alt="">

            <h4><strong class="text-white">Go for the magic odds </strong></h4>

            <a target="_blank" href="https://paystack.com/pay/magicodds" class="smoothscroll btn custom-btn custom-btn-italic mt-3">Magic odds</a>
        </div>
</section>

{{-- Sponsors --}}
  @include('Homepages.sponsors')
{{-- End of Sponsors --}}




@include('Homepages.subscribers')


<section class="services-section section-padding" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2 class="mb-5">Basketball Games</h2>
            </div>
            @if(count($basket_straight_wins)>0)
            <div class="col-lg-12  stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Straight Win</h3>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Game</th>
                        <th>league</th>
                        <th>Time</th>
                        <th>Odds</th>
                        <th>Prediction</th>
                        <th>Check</th>

                      </tr>

                      </thead>
                      <tbody>
                        @foreach($basket_straight_wins->take(3) as $win)
                        <tr>
                          <td>{{$win->game}}</td>
                          <td>{{$win->league}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->odds}}</td>
                          <td>{{$win->prediction}}</td>


                         @if($win->check=="won")
                            <td>
                              <a class="btn btn-success btn-sm" >{{$win->check}}</a>
                            </td>
                          @elseif ($win->check=="lost")
                            <td>
                              <a class="btn btn-danger btn-sm" >{{$win->check}}</a>
                            </td>
                          @else
                            <td>
                              <a class="btn btn-warning btn-sm" >{{$win->check}}</a>
                            </td>
                          @endif

                        </tr>
                      @endforeach


                      </tbody>


                    </table>


                  </div>
                  <div class="text-center p-2">
                    <a class="btn btn-outline-dark btn-sm" href="{{url('all_straight_basketball')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
                <h3>No straight wins updated yet</h3>
            </div>
          @endif
          @if(count($basket_overs)>0)
            <div class="col-lg-12  stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Overs/Unders</h3>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Game</th>
                        <th>league</th>
                        <th>Time</th>
                        <th>Odds</th>
                        <th>Prediction</th>
                        <th>Check</th>

                      </tr>

                      </thead>
                      <tbody>
                        @foreach($basket_overs->take(3) as $win)
                        <tr>
                          <td>{{$win->game}}</td>
                          <td>{{$win->league}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->odds}}</td>
                          <td>{{$win->prediction}}</td>

                          @if($win->check=="won")
                            <td>
                              <a class="btn btn-success btn-sm" >{{$win->check}}</a>
                            </td>
                          @elseif ($win->check=="lost")
                            <td>
                              <a class="btn btn-danger btn-sm" >{{$win->check}}</a>
                            </td>
                          @else
                            <td>
                              <a class="btn btn-warning btn-sm" >{{$win->check}}</a>
                            </td>
                          @endif

                        </tr>
                      @endforeach

                      </tbody>


                    </table>

                  </div>
                  <div class="text-center p-2">
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/all_overs_basketball')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
                <h3>No Overs/Unders games updated yet</h3>
            </div>
          @endif
        </div>
    </div>
</section>



<section class="price-list-section section-padding" id="section_3" >
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12">
                <div class="price-list-thumb-wrap">
                    <div class="mb-4">
                        <h2 class="mb-2">Basketball matches</h2>

                        <strong>All matches</strong>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                           Straight win
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$basket_straight_count}}</strong>
                        </h6>
                    </div>
                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                           Overs/Unders
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$basket_overs_count}}</strong>
                        </h6>
                    </div>
                  </div>
                </div>

            <div class="col-lg-4 col-12 custom-block-bg-overlay-wrap mt-5 mb-5 mb-lg-0 mt-lg-0 pt-3 pt-lg-0">
                <img style="width:450px; height:400px;" src="nba/images/alltime.jpg" class="custom-block-bg-overlay-image img-fluid" alt="">
            </div>

        </div>
    </div>
</section>


<section class="contact-section" id="section_4">
<div class="section-padding section-bg">
    <div class="container">

    </div>
</div>



<div class="section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h5 class="mb-3"><strong>Contact</strong> Information</h5>


                <p class="text-white d-flex">
                    <a href="" class="site-footer-link">
                        GameAnalyst
                    </a>
                </p>

                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="https://t.me/dailygreenticks" class="social-icon-link bi-telegram" target="_blank">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="https://twitter.com/GameAnalyst3?s=09" class="social-icon-link bi-twitter" target="_blank">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="http://www.snapchat.com/add/gameanalyst" class="social-icon-link bi-snapchat" target="_blank">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-youtube">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-5 col-12 contact-block-wrap mt-5 mt-lg-0 pt-4 pt-lg-0 mx-auto">
                <div class="contact-block">
                    <h6 class="mb-0">
                        <i class="custom-icon bi-shop me-3"></i>

                        <strong>Open Daily</strong>

                        <span class="ms-auto">24hrs</span>
                    </h6>
                </div>
            </div>



        </div>
    </div>
</div>
</section>

<footer class="site-footer">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4 class="site-footer-title mb-4">Visit us daily</h4>
        </div>
    </div>
</div>

<div class="site-footer-bottom">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-8 col-12 mt-4">
                <p class="copyright-text mb-0">Copyright © 2023 dailyGreen
                - Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
                <p>Developer: MaxCode</p>
                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-facebook">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-youtube">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-3 mt-lg-4 ms-auto">
                <a href="#section_1" class="back-top-icon smoothscroll" title="Back Top">
                    <i class="bi-arrow-up-circle"></i>
                </a>
            </div>

        </div>
    </div>
</div>
</footer>
</div>

<!-- JAVASCRIPT FILES -->
<script src="nba/js/jquery.min.js"></script>
<script src="nba/js/bootstrap.min.js"></script>
<script src="nba/js/click-scroll.js"></script>
<script src="nba/js/custom.js"></script>

</body>
</html>
