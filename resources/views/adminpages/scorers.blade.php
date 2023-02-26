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
              <form class="" action="{{url('/search_scorer')}}" method="get">
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
                  <h3 class="card-title">All Scorers</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>League</th>
                          <th>Game</th>
                          <th>Time</th>
                          <th>Scorer</th>
                          <th>Odds</th>
                          <th>Check</th>
                          <th>Won</th>
                          <th>Lost</th>
                          <th>delete</th>
                      </tr>

                      </thead>
                      <tbody>
                        @foreach($scorers as $win)
                        <tr class="text-light">
                          <td>{{$win->league}}</td>
                          <td>{{$win->game}}</td>
                          <td>{{$win->time}}</td>
                          <td>{{$win->scorer}}</td>
                          <td>{{$win->Odds}}</td>
                          @if($win->check=="won")
                          <td>
                            <a class="btn btn-success btn-sm">
                            {{$win->check}}
                          </a>
                          </td>
                        @elseif ($win->check=="lost")
                          <td>
                            <a class="btn btn-danger btn-sm">
                            {{$win->check}}
                          </a>
                          </td>
                          @else
                            <td>
                              <a class="btn btn-warning btn-sm">
                              {{$win->check}}
                            </a>
                            </td>
                          @endif

                          @if($win->check=="pending")
                          <td>
                            <a onclick="confirmation(event)" href="{{url('/scorer_won',$win->id)}}" class="btn btn-success btn-rounded btn-sm">Won</a>
                          </td>

                          <td>
                            <a onclick="confirmation(event)" href="{{url('/scorer_lost',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">Lost</a>
                          </td>
                        @else
                          <td>Match Ended</td>
                          <td>Match Ended</td>
                        @endif
                          <td>
                            <a href="{{url('edit_scorer',$win->id)}}" class="btn btn-info btn-rounded btn-sm">Edit</a>
                          </td>
                          <td>
                              <a onclick="confirmation(event)" href="{{url('delete_scorer',$win->id)}}" class="btn btn-danger btn-rounded btn-sm">Delete</a>
                          </td>



                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <div class="p-2">
                      {{$scorers->links()}}
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
