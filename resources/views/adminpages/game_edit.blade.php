
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daily Green Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <base href="/public">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
</head>


  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
          @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @include('sweetalert::alert')

            {{-- creating a form to accept game data --}}
            <div class="row" style="margin:auto;">
              <div class="col-lg-8 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Edit game here</h3>
                    <div class="p-2">
                      <form action="{{url('/update_game',$game->id)}}" method="post">
                        <style media="screen">
                          label{
                            width:80px;
                          }
                        </style>
                        @csrf
                        <div class="p-2">
                          <label>League : </label>
                          <input class="text-dark" type="text" name="league" placeholder="Enter league" value="{{$game->league}}" required>
                        </div>
                        <div class="p-2">
                          <label>Game : </label>
                          <input class="text-dark"type="text" value="{{$game->game}}" name="game" placeholder="Enter game" required>
                        </div>
                        <div class="p-2">
                          <label>Time : </label>
                          <input class="text-dark" type="time" value="{{$game->time}}" name="time" placeholder="choose time" required>
                        </div>
                        <div class="p-2">
                          <label>Prediction : </label>
                          <input class="text-dark"type="text" value="{{$game->prediction}}" name="prediction" placeholder="Enter prediction" required>
                        </div>
                        <div class="p-2">
                          <label>Odds :</label>
                          <input class="text-dark"  type="text" value="{{$game->odds}}" name="odds" placeholder="Enter odds" required>
                        </div>
                        <div class="p-2 ">
                          <label>Category : </label>
                          <select value="{{$game->category}}" class="text-dark" name="category" required>
                            <option selected>{{$game->category}}</option>
                            <option>Straight win</option>
                            <option>Both team to score</option>
                            <option>Overs/Unders</option>
                            <option>Corners</option>
                            <option>Weekend prediction</option>
                          </select>
                        </div>
                        <div class="p-2">
                          <input class="btn btn-success btn-rounded" type="submit" value="Update">
                        </div>

                      </form>

                    </div>

                  </div>

                </div>

              </div>

            </div>











          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>
