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
              <form class="" action="{{url('/search_subscriber')}}" method="get">
                @csrf
                <div class="d-flex">
                  <div class="p-2">
                    <input type="text" name="search" placeholder="Search subscriber" class="text-dark">
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
                  <h3 class="card-title">All Subscribers</h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Time&Date</th>
                          <th>Send mail</th>
                          <th>Delete</th>

                      </tr>

                      </thead>
                      <tbody>
                        @foreach($subscribers as $subscriber)
                        <tr class="text-light">
                          <td>{{$subscriber->name}}</td>
                          <td>{{$subscriber->email}}</td>
                          <td>{{$subscriber->created_at}}</td>
                          <td>
                            <a class="btn btn-primary btn-sm btn-rounded" href="{{url('/subscriber_mail',$subscriber->id)}}">Email</a>
                          </td>
                          <td>
                            <a onclick="confirmation(event)" href="{{url('/delete_subscriber',$subscriber->id)}}" class="btn btn-danger btn-rounded btn-sm">delete</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <div class="p-3 text-center">
                        <a class="btn btn-secondary btn-lg" href="{{url('/message_subscribers')}}">Message</a>
                      </div>
                    </table>
                    <div class="p-2">
                      {{$subscribers->links()}}
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
