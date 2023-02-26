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
            @include('sweetalert::alert')
            {{-- making a search form  --}}

            {{-- end search form  --}}


            {{-- showing all straight wins in a table --}}
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Contact details</h3>
                  <div class="card-text">
                    <div class="p-3">
                    Name:  <h3>{{$contact->name}}</h3>
                    </div>
                    <div class="p-3">
                    Phone:  <h3>{{$contact->phone}}</h3>
                    </div>
                    <div class="p-3">
                    Email:  <h3>{{$contact->email}}</h3>
                    </div>
                    <div class="p-3">
                    Message:  <p>{{$contact->comment}}</p>
                    </div>

                  </div>
                  </div>
                  <div class="text-center p-3">
                    <a class="btn btn-primary" href="{{url('/view_contacts')}}">Go back</a>
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
