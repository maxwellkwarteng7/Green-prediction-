<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="author" content="">

<title>Green Prediction </title>

<!-- CSS FILES -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;500&display=swap" rel="stylesheet">




<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/bootstrap-icons.css" rel="stylesheet">

<link href="css/templatemo-barber-shop.css" rel="stylesheet">

<style media="screen">
  /* .subscribers{

    text-align: justify;
    background:url('/images/ronaldo.jpg');
  } */
  tr{
    font-size: 10px;
  }
</style>

<!--

TemplateMo 585 Barber Shop

https://templatemo.com/tm-585-barber-shop

-->
</head>

<body>
  @include('sweetalert::alert')

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
            <a class="nav-link click-scroll" href="#section_1">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_2">Football</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/nba_home')}}">Basketball</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/tennis_home')}}">Tennis</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#section_4">Games Summary</a>
        </li>

        <li class="nav-item">
            <a class="nav-link click-scroll" href="#section_3">About us</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#contact-section">Contact</a>
        </li>
        <li class="nav-item">
            <a target="_blank" class="nav-link" href="https://twitter.com/GameAnalyst3?s=09">Follow us </a>
        </li>


    </ul>
</div>
</nav>

<div class="col-md-8 ms-sm-auto col-lg-9 p-0">
<section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12">
                    <h1 class="text-white mb-lg-3 mb-4"><strong>Green Prediction </em></strong></h1>
                    <p class="text-black">Get your daily predictions here</p>
                    <br>
                    <a class="btn custom-btn custom-border-btn custom-btn-bg-white smoothscroll me-2 mb-2" href="#section_4">About Us</a>

                    <a class="btn custom-btn smoothscroll mb-2" href="#section_2">Games</a>
                </div>
            </div>
        </div>

        @include('Homepages.magic');
</section>

{{-- Sponsors --}}
  @include('Homepages.sponsors')
{{-- End of Sponsors --}}




@include('Homepages.subscribers')

<section class="services-section " id="section_2">
    {{-- <div class="container"> --}}
        <div class="row">

            <div class="col-lg-12 col-12">
                <h2 class="p-3">Games</h2>
            </div>
            @if(count($straight_wins)>0)
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
                        @foreach($straight_wins->take(3) as $win)
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_straight')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
              <h3>No Straight win games updated yet</h3>

            </div>
          @endif
              @if(count($both_teams)>0)
            <div class="col-lg-12  stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Both teams to Score</h3>
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
                        @foreach($both_teams->take(3) as $win)
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_both')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
              <h3>No both teams to score games updated yet</h3>

            </div>
          @endif
            @if(count($overs)>0)
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
                        @foreach($overs->take(3) as $win)
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_overs')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
              <h3>No Overs/Unders games updated yet</h3>

            </div>
          @endif

            @if(count($corners)>0)
            <div class="col-lg-12  stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Corners</h3>
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
                        @foreach($corners->take(3) as $win)
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_corners')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center">
                <h3>No corner games updated yet</h3>
            </div>
          @endif
            @if(count($scorers)>0)
            <div class="col-lg-12  stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Scorers</h3>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Game</th>
                        <th>league</th>
                        <th>Time</th>
                        <th>Odds</th>
                        <th>Scorer</th>
                        <th>Check</th>

                      </tr>

                      </thead>
                      <tbody>
                        @foreach($scorers->take(3) as $win)
                        <tr>
                          <td>{{$win->game}}</td>
                          <td>{{$win->league}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->Odds}}</td>
                          <td>{{$win->scorer}}</td>
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_scorers')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
              <div class="text-center p-2">
                <h3>No scorer games updated yet</h3>

              </div>
          @endif

            @if(count($predictions)>0)

            <div class="col-lg-12 stretch-card p-3">

              <div class="card">
                <div class="card-body">
                  <h3>Weekend prediction</h3>
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
                        @foreach($predictions->take(3) as $win)
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
                    <a class="btn btn-outline-dark btn-sm" href="{{url('/view_all_weekend')}}">view all</a>
                  </div>

                </div>

              </div>


            </div>
          @else
            <div class="text-center p-2">
                <h3>Weekend predictions will be updated on friday, thank you!</h3>
            </div>
          @endif

        </div>
    {{-- </div> --}}
</section>

<section id="contact-section" class="booking-section section-padding">
<div class="container">
    <div class="row">

        <div class="col-lg-10 col-12 mx-auto">
            <form action="{{url('/add_contact')}}" method="post" class="custom-form booking-form" id="bb-booking-form" role="form">
              @csrf
                <div  class="text-center mb-5">
                    <h2 class="mb-1">Contact us </h2>

                    <p>Please fill out the form and we will get to you ASAP!</p>
                </div>

                <div class="booking-form-body">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <input type="text" name=name id="bb-name" class="form-control" placeholder="Full name" required>
                        </div>

                        <div class="col-lg-6 col-12">
                            <input type="tel" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Mobile 010-020-0340"  required="">
                        </div>

                        <div class="col-lg-6 col-12">
                            <input class="form-control" type="email" name="email"
                             placeholder="name@email.com" required>
                        </div>





                    </div>

                    <textarea rows="3" class="form-control" name="comment" id="bb-message" placeholder="Comment (Optionals)" required></textarea>

                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                        <button type="submit" class="form-control">Submit</button>
                    </div>
                </div>
            </form>
    </div>
</div>
</section>





<section class="price-list-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12">
                <div class="price-list-thumb-wrap">
                    <div class="mb-4">
                        <h2 class="mb-2">Today's matches</h2>

                        <strong>All matches</strong>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                           Straight win
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$straight_count}}</strong>
                        </h6>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                            Corners
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$corners_count}}</strong>
                        </h6>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                            Overs/Unders
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$corners_count}}</strong>
                        </h6>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                            Both team to score
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$both_count}}</strong>
                        </h6>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                            Scorer games
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$scorers_count}}</strong>
                        </h6>
                    </div>

                    <div class="price-list-thumb">
                        <h6 class="d-flex">
                            Weekend prediction
                            <span class="price-list-thumb-divider"></span>

                            <strong>{{$predictions_count}}</strong>
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 custom-block-bg-overlay-wrap mt-5 mb-5 mb-lg-0 mt-lg-0 pt-3 pt-lg-0">
                <img src="images/ronaldo.jpg" class="custom-block-bg-overlay-image img-fluid" alt="">
            </div>

        </div>
    </div>
</section>
  <div class="d-flex" style="justify-content:center;">
    <div class="p-2">
      <h3>Subscribers <span style="color:#B22222;">{{$subscribers}}k+</span>
      </h3>
    </div>
    <div class="p-2">
        <h3>Total games <span style="color:#9ACD32">{{$total_games}}</span></h3>
    </div>
  </div>





<section id="section_3"  class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div  class="col-lg-12 col-12 mx-auto">
                <h2 class="mb-4">About</h2>

                <div class="border-bottom pb-3 mb-5">
                    <p>Dailygreenticks is a sports prediction website that provides expert analysis and predictions on all your favourite sports. We are a team of passionate sports ethusiasts who strive to provide our readers with the best possible information and predictions on a daily basis .

                      <div class="">
                        <h4>Our Goal</h4>
                        Our goal is to help sports fans make informed decisions and increase their chances of success when betting on sports. Whether you are on experienced sports bettor or just a casual fan , we have the expertise and tools you need to succeed. At dailygreenticks , we are dedicated to providing accurate and up-to-date information on all sports, including football , basketball and tennis. We use a combination of statistical analysis, expert insight , and our own proprietary algorithms to provide the most accurate predictions possible .
                        <h4>We understand you </h4>
                        We understand that every sports fan has different needs , and that's why we offer variety of tools and resources to help you succeed. Whether you are looking for detailed game previews , expert picks, or just a quick rundown of the latest odds and trends, we have you covered.
                        <p>
                          so if you are looking for the best sports prediction website around , look no further than <h3 style="font-family:verdana;" >Dailygreenticks!</h3> Join us today and start making informed decisions when betting on sports .
                        </p>
                      </div>

                     </p>
                </div>
            </div>

        </div>
    </div>
</section>

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
                <p class="copyright-text mb-0">Copyright © 2023  Green Prediction
                - Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
                <p>Developer: MaxCode <sub>contact info below </sub></p>

                <ul class="social-icon">
                    <li class="social-icon-item">
                        <a href="https://t.me/maxwell_18" class="social-icon-link bi-telegram" target="_blank">
                        </a>
                    </li>

                    {{-- <li class="social-icon-item">
                        <a href="https://twitter.com/GameAnalyst3?s=09" class="social-icon-link bi-twitter" target="_blank">
                        </a>
                    </li> --}}

                    <li class="social-icon-item">
                        <a href="http://www.snapchat.com/add/kingping1030" class="social-icon-link bi-snapchat" target="_blank">
                        </a>
                    </li>

                    <li class="social-icon-item">
                        <a target="_blank" href="https://en.wh.ms/233554751182" class="social-icon-link bi-whatsapp">
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
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/click-scroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
