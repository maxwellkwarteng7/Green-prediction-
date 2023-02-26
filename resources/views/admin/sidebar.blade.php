<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="{{url('/redirect')}}"><img style="height:50px; width:90px;" src="images/dailylogo.png" alt="logo" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{url('/redirect')}}"></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">
              <li class="nav-item">
              <x-app-layout>

              </x-app-layout>
            </li>
        </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/redirect')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/add_game')}}">
        <span class="menu-icon">
          <i class="mdi mdi-football"></i>
        </span>
        <span class="menu-title">Add football Game</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/add_scorer')}}">
        <span class="menu-icon">
          <i class="mdi mdi-table"></i>
        </span>
        <span class="menu-title">Add Scorer game</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/add_basket_game')}}">
        <span class="menu-icon">
          <i class="mdi mdi-basketball"></i>
        </span>
        <span class="menu-title">Add Basketball Game</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/add_tennis_game')}}">
        <span class="menu-icon">
          <i class="mdi mdi-tennis-ball"></i>
        </span>
        <span class="menu-title">Add Tennis Game</span>
      </a>
    </li>

    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Soccer Games</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/straight_win')}}">Straight win</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/both_teams')}}">Both team to score</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/overs')}}">Over/Unders</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('/corners')}}">Corners</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('/scorers')}}">Scorers</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('/weekend_prediction')}}">weekend Prediction</a></li>
        </ul>
      </div>
    </li>



    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/all_games')}}">
        <span class="menu-icon">
          <i class="mdi mdi-chart-bar"></i>
        </span>
        <span class="menu-title">All football games</span>
      </a>
    </li>


    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-security"></i>
        </span>
        <span class="menu-title">Basketball games</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/basket_straight')}}">Straight win </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{url('/basket_overs')}}"> Overs/Unders</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-bs-toggle="collapse" href="#tennis" aria-expanded="false" aria-controls="auth">
        <span class="menu-icon">
          <i class="mdi mdi-book"></i>
        </span>
        <span class="menu-title">Tennis games</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tennis" >
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{url('/tennis_straight')}}">Straight win </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/view_subscribers')}}">
        <span class="menu-icon">
          <i class="mdi mdi-table"></i>
        </span>
        <span class="menu-title">Subscribers</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/view_contacts')}}">
        <span class="menu-icon">
          <i class="mdi mdi-contacts"></i>
        </span>
        <span class="menu-title">Contacts</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('/as')}}">
        <span class="menu-icon">
          <i class="mdi mdi-book"></i>
        </span>
        <span class="menu-title">As</span>
      </a>
    </li>
  </ul>
</nav>
