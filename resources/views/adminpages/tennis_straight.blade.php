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
              <form class="" action="{{url('/search_tennis_straight')}}" method="get">
                @csrf
                <div class="d-flex">
                  <div class="p-2">
                    <input type="text" name="search" placeholder="Search straight win match" class="text-dark">
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
                  <h3 class="card-title">All Straight wins</h3>
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
                          <th>Date&time</th>
                          <th>Delete</th>
                      </tr>

                      </thead>
                      <tbody>
                        @foreach($tennis_straight as $win)
                        <tr class="text-light">
                          <td>{{$win->league}}</td>
                          <td>{{$win->game}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->prediction}}</td>
                          <td>{{$win->odds}}</td>

                          @if($win->check=="pending")
                          <td>
                            <a onclick="confirmation(event)" href="{{url('/tennis_match_won',$win->id)}}" class="btn btn-success btn-rounded btn-sm">Won</a>
                          </td>

                          <td>
                            <a onclick="confirmation(event)" href="{{url('/tennis_match_lost',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">Lost</a>
                          </td>
                        @else
                          <td>Match ended</td>
                          <td>Match ended</td>
                        @endif
                          <td>
                            <a  href="{{url('/tennis_game_edit',$win->id)}}" class="btn btn-info btn-rounded btn-sm">Edit</a>
                          </td>
                          <td>{{$win->created_at }}</td>
                          <td>
                            <a onclick="confirmation(event)"  href="{{url('/remove_tennis_game',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">delete</a>
                          </td>


                        </tr>
                      @endforeach
                      </tbody>
                      <div class="text-center p-2">
                      <a onclick="confirmation(event)" class="btn btn-danger btn-lg" href="{{url('/delete_tennis_games')}}">Delete all</a>
                      <p class="p-1">this button deletes all tennis games</p>
                      </div>
                    </table>
                    <div class="p-2">
                      {{$tennis_straight->links()}}
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
