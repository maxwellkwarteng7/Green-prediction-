<div class="row">
  <div class="col-sm-6 p-3">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Recent Subscribers</h3>
        <table class="table">

          <thead>
            <tr class="text-light">
              <th>Name</th>
              <th>Email</th>
              <th>Send mail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subscribers->take(3) as $sub)
            <tr class="text-light" >
              <td>{{$sub->name}}</td>
              <td>{{$sub->email}}</td>
              <td><a href="{{url('/subscriber_mail',$sub->id)}}" class="btn btn-primary btn-sm">Email</a></td>
            </tr>
          @endforeach
            <tbody>
        </table>
        <div class="p-2 text-center">
          <a class="btn btn-outline-secondary" href="{{url('/view_subscribers')}}">view all</a>
        </div>

      </div>

    </div>

  </div>
  <div class="col-sm-6 p-3">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Recent Contacts</h3>
        <table class="table">

          <thead>
            <tr class="text-light">
              <th>Name</th>
              <th>Email</th>
              <th>View</th>
              <th>Send mail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts->take(3) as $call)
            <tr class="text-light" >
              <td>{{$call->name}}</td>
              <td>{{$call->email}}</td>
              <td><a href="{{url('/contact_details',$call->id)}}" class="btn btn-info btn-sm">View</a></td>
              <td><a href="{{url('/contact_mail',$call->id)}}" class="btn btn-primary btn-sm">Email</a></td>
            </tr>
          @endforeach
            <tbody>
        </table>
        <div class="p-2 text-center">
          <a class="btn btn-outline-secondary" href="">view all</a>
        </div>
      </div>

    </div>

  </div>

</div>
