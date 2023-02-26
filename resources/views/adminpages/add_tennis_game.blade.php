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
                    <h3 class="card-title">Add Tennis game here</h3>
                    <div class="p-2">
                      <form action="{{url('/save_tennis_game')}}" method="post">
                        <style media="screen">
                          label{
                            width:100px;
                          }
                        </style>
                        @csrf
                        <div class="p-2">
                          <label>League : </label>
                          <input class="text-dark" type="text" name="league" placeholder="Enter league" required>
                        </div>
                        <div class="p-2">
                          <label>Game : </label>
                          <input class="text-dark"type="text" name="game" placeholder="Enter game" required>
                        </div>
                        <div class="p-2">
                          <label>Time : </label>
                          <input class="text-dark" type="time" name="time" placeholder="choose time" required>
                        </div>
                        <div class="p-2">
                          <label>Prediction : </label>
                          <input class="text-dark"type="text" name="prediction" placeholder="Enter prediction" required>
                        </div>
                        <div class="p-2">
                          <label>Odds :</label>
                          <input class="text-dark" type="text" name="odds" placeholder="Enter odds" required>
                        </div>
                        <div class="p-2">
                          <label>Category : </label>
                          <select class="text-dark" name="category" required>
                            <option selected>Choose category</option>
                            <option>Straight win</option>
                          </select>
                        </div>
                        <div class="p-2">
                          <input class="btn btn-primary" type="submit" value="Send">
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
