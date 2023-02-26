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
              <form class="" action="{{url('/search_game')}}" method="get">
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
                  <h3 class="card-title">All Games</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>League</th>
                          <th>Game</th>
                          <th>Time</th>
                          <th>Prediction</th>
                          <th>Category</th>
                          <th>Odds</th>
                          <th>Time</th>
                          <th>Check</th>
                          <th>Edit</th>
                          <th>Delete</th>


                      </tr>

                      </thead>
                      <tbody>
                        @foreach($all_games as $win)
                        <tr class="text-light">
                          <td>{{$win->league}}</td>
                          <td>{{$win->game}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->prediction}}</td>
                          <td>{{$win->category}}</td>
                          <td>{{$win->odds}}</td>
                          <td>{{$win->created_at}}</td>
                          @if($win->check=="pending")
                          <td>
                          <a class="btn btn-warning btn-sm">{{$win->check}}</a>
                          </td>
                        @elseif ($win->check=="won")
                          <td>
                          <a class="btn btn-success btn-sm">{{$win->check}}</a>
                          </td>
                        @else
                          <td>
                          <a class="btn btn-danger btn-sm">{{$win->check}}</a>
                          </td>
                        @endif
                          <td>
                            <a href="{{url('/game_edit',$win->id)}}" class="btn btn-info btn-rounded btn-sm">Edit</a>
                          </td>
                          <td>
                            <a onclick="confirmation(event)" href="{{url('/delete_football_game',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">Delete</a>
                          </td>




                        </tr>
                      @endforeach
                      </tbody>
                      <div class="p-3 text-center">
                        <a onclick="confirmation(event)" href="{{url('/delete_all_games')}}" class="btn btn-danger btn-lg">Delete all</a>
                        <p>This button deletes all football games except scorer games</p>
                      </div>
                    </table>
                    <div class="p-3">
                      {{$all_games->links()}}
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
