    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      
      <!--end::Header-->
      <!--begin::Sidebar-->
      
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">

      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Scanning Bottle</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>


        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                      <div class="row">
                          <div class="col-11">
                            <h3 class="card-title">Rewards List</h3>
                          </div>
                      </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <tr>
                                    <td>No</td>
                                    <td>jumlah botol</td>
                                    <td>jumlah point</td>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach($data as $row)

                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$row->jml_botol}}</td>
                                <td>{{$row->jml_point}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">

          </div>
</section>
</main>
      <!--end::App Main-->
      <!--begin::Footer-->
      

      <!--end::Footer-->
    </div>