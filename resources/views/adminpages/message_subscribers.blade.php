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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <base href="/public">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  <style media="screen">
    label{
      width:100px;
    }
  </style>
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
            {{-- making a search form  --}}
            {{-- end search form  --}}


            {{-- showing all straight wins in a table --}}
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Message Subscribers</h3>

                  <div class="card-text">
                    <form class="" action="{{url('mail_all_subscribers')}}" method="post">
                      @csrf
                      <div class=" p-2">
                          <label>Greeting :</label>
                          <input class="text-dark" type="text" name="greeting" placeholder="Greeting!!" required>
                      </div>

                      <div class=" p-2">
                          <label>Description :</label>
                          <input type="text" class="text-dark" name="description" placeholder="Enter mail description" required>
                      </div>

                      <div class="p-2">
                          <label>Body :</label>
                          <textarea name="body" rows="5" cols="30" required class="text-dark" placeholder="Enter body of mail"></textarea>
                      </div>

                      <div class="p-2">
                          <label>Button name</label>
                          <input class="text-dark" type="text" name="button" placeholder="Enter link button name " required>
                      </div>

                      <div class=" p-2">
                          <label>Link :</label>
                          <input class="text-dark" type="url" name="link" placeholder="eg: https//:youtube.com" required>
                      </div>

                      <div class=" p-2">
                          <label>Last line :</label>
                          <input type="text" class="text-dark" name="lastline" placeholder="Enter last line" required>
                      </div>

                      <div class=" p-2">
                          <input class="btn btn-outline-info btn-rounded" type="submit" value="Send">
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
