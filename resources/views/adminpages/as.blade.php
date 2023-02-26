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

            {{-- creating a form to accept game data --}}
            <div class="row" style="margin:auto;">
              <div class="col-lg-8 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">AS</h3>
                    <div class="p-2">
                      <form action="{{url('/save_as')}}" method="post">
                        <style media="screen">
                          label{
                            width:100px;
                          }
                        </style>
                        @csrf
                        <div class="p-2">
                          <label>Number : </label>
                          <input class="text-dark" type="number" name="number" placeholder="Enter number" required>
                        </div>

                        <div class="p-2">
                          <input class="btn btn-success btn-rounded" type="submit" value="Save">
                        </div>

                      </form>

                    </div>

                  </div>

                </div>

              </div>

            </div>


{{-- showing the number of subscribers  --}}

      <div class="col-lg-8 p-3">
          <div class="card">
            <div class="card-body">
              <h3 class="card-text">AS</h3>
              <div class="d-flex" style="">
                <div class="p-3">
                  <h3>Number :</h3>
                </div>
                <div class="p-3">
                  <h3>{{$number}} </h3>
                </div>
                <div class="" style="margin-left:80px;">
                  <h3>
                  <a style="margin-top:10px;" class="btn btn-primary" href="{{url('/edit_as',$number_id)}}">Edit</a>
                </h3>
                </div>

              </div>


            </div>

          </div>
      </div>



      <div class="col-lg-8 p-3">
        <div class="card">
            <div class="card-body">
              <h3 class="card-title">Edit As number here</h3>
              <style media="screen">
                label{
                  width:80px;
                }
              </style>
              <form action="{{url('save_edited_as',$number_id)}}" method="post">
                @csrf

                <div class="p-2">
                  <label>New number :</label>
                  <input  class="text-dark" type="number" name="number" value="{{$number}}">

                </div>

                <div class="p-2">
                  <input type="submit" class="btn btn-info "  value="Update">

                </div>

              </form>


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
