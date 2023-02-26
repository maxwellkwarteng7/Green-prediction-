<!DOCTYPE html>
<html lang="en">
  @include('admin.head')
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

            @include('admin.boxes')








{{-- A table  --}}
            @include('admin.table')








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
