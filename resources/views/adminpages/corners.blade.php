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
            <div class="text-center p-5">
              <form class="" action="{{url('/search_corners')}}" method="get">
                @csrf
                <div class="d-flex">
                  <div class="p-2">
                    <input type="text" name="search" placeholder="Search a match" class="text-dark">
                  </div>
                  <div class="p-3">
                    <input type="submit" class="btn btn-primary" value="search">

                  </div>
                </div>


              </form>

            </div>
            {{-- end search form  --}}


            {{-- showing all straight wins in a table --}}
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">All Corners</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>League</th>
                          <th>Game</th>
                          <th>Time</th>
                          <th>Prediction</th>
                          <th>Odds</th>
                          <th>Won</th>
                          <th>Lost</th>
                          <th>Edit</th>
                      </tr>

                      </thead>
                      <tbody>
                        @foreach($corners as $win)
                        <tr class="text-light">
                          <td>{{$win->league}}</td>
                          <td>{{$win->game}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->prediction}}</td>
                          <td>{{$win->odds}}</td>

                          @if($win->check=="pending")
                          <td>
                            <a onclick="confirmation(event)" href="{{url('/match_won',$win->id)}}" class="btn btn-success btn-rounded btn-sm">Won</a>
                          </td>

                          <td>
                            <a onclick="confirmation(event)" href="{{url('/match_lost',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">Lost</a>
                          </td>
                        @else
                          <td>Match ended</td>
                          <td>Match ended</td>
                        @endif
                          <td>
                            <a  href="{{url('/game_edit',$win->id)}}" class="btn btn-info btn-rounded btn-sm">Edit</a>
                          </td>




                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <div class="p-2">
                      {{$corners->links()}}
                    </div>
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
