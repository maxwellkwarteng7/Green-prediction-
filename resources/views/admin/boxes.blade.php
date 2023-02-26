<div class="row col-lg-12">
  <div class="col-sm-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h5>Number of subscribers</h5>
        <div class="row">
          <div class="col-8 col-sm-12 col-xl-8 my-auto">
            <div class="d-flex d-sm-block d-md-flex align-items-center">
              <h2 class="mb-0">{{$subscribers_count}}</h2>

            </div>
            <div style="padding-top:20px;">
            <a href="{{url('/view_subscribers')}}"
             class="btn btn-info">view subscribers</a>
           </div>
          </div>
          <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
            <i class="icon-lg mdi mdi-contacts text-primary ms-auto"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

    {{-- another box --}}
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Number of Contacts</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$contacts_count}}</h2>

              </div>
              <div style="padding-top:20px;">
              <a href="{{url('/view_contacts')}}"
               class="btn btn-info">view contacts</a>
             </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-phone text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- another box  --}}
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Add football</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <p class="">football games : </p>
                <h2 class="mb-0">{{$football}}</h2>

              </div>
              <div style="padding-top:20px;">
              <a href="{{url('/add_game')}}"
               class="btn btn-success">Add here</a>
             </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-soccer text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- another box  --}}
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Add Scorer game</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <p>Scorer games :</p>
                <h2 class="mb-0">{{$scorers}}</h2>

              </div>
              <div style="padding-top:20px;">
              <a href="{{url('/add_scorer')}}"
               class="btn btn-warning">Add here</a>
             </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-football text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- another box --}}
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Add Basketball</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <p>Basketball games :</p>
                <h2 class="mb-0">{{$basketball}}</h2>
              </div>
              <div style="padding-top:20px;">
              <a href="{{url('/add_basket_game')}}"
               class="btn btn-secondary">Add here</a>
             </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-basketball text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- last box --}}

    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Add tennis</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <p>Tennis games :</p>
                <h2 class="mb-0">{{$tennis}}</h2>

              </div>
              <div style="padding-top:20px;">
              <a href="{{url('/add_tennis_game')}}"
               class="btn btn-primary">Add here</a>
             </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-tennis text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>







</div>
