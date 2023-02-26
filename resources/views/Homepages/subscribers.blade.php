<section class="featured-section section-padding">
  </style>
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 mx-auto">
                <h2 class="mb-3">subscribe and get newletter from us </h2>
                <div class="card">
                  <div class="card-body">
                    <form  action="{{url('/add_subscriber')}}" method="post">
                      @csrf
                      <div class="p-2">
                        <label>Name</label>
                          <input type="text" name="name" placeholder="Name">
                      </div>

                      <div class="p-2">
                        <label>Email</label>
                          <input type="email" name="email" placeholder="you@email.com">
                      </div>


                      <div class="p-2">
                          <input type="submit" class="btn btn-outline-warning btn-rounded btn-sm" value="subscribe">
                      </div>

                    </form>

                  </div>

                </div>

            </div>
        </div>
    </div>
</section>
