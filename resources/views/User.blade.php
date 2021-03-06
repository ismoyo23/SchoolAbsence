@extends('theme')

@section('container')

<!-- modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" method="post" action="{{ url('/import') }}">
      <div class="modal-body">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlFile1">Import Excel</label>
            <input name="select_file" type="file" class="form-control-file" id="exampleFormControlFile1">
            @error('select_file')
                        <div class="text-danger">Tipe file salah</div>
            @enderror
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="input" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('/addUser') }}">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Guru</label>
                    <input type="number" class="form-control" name="nik" id="exampleInputEmail1" placeholder="Kode Guru">
                    @error('nik')
                        <div class="text-danger">Kode guru tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">NUPT</label>
                    <input type="text" class="form-control" name="nupt" id="exampleInputEmail1" placeholder="NUPT">
                    @error('nupt')
                        <div class="text-danger">NUPT tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input name="name" type="text" class="form-control" name="text" id="exampleInputEmail1" placeholder="Nama Guru">
                    @error('name')
                        <div class="text-danger">Nama guru tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mapel</label>
                    <input type="text" class="form-control" name="mapel" id="exampleInputEmail1" placeholder="Mata Pelajaran">
                    @error('mapel')
                        <div class="text-danger">Mapel tidak boleh kosong</div>
                    @enderror
                  </div>

          
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Proses</button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Import
                  </button>
                </div>
              </form>
            </div>
            <!-- /.card -->

                  <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                    <h3>Data Guru</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Kode Guru</th>
                          <th>NUPT</th>
                          <th>Nama Guru</th>
                          <th>Mapel</th>
                          <th>Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $key): ?>
                          <tr>
                              <td><?php echo $key->nik ?></td>
                              <td><?php echo $key->letter; ?></td>
                              <td><?php echo $key->name_user; ?></td>
                              <td><?php echo $key->class; ?></td>
                              <td>
                                <a href="{{ url('/showDataTeacher/'.$key->id_user) }}" class="btn btn-primary ">Update</a>
                                <a href="{{ url('/deleteTeacher/'.$key->id_user) }}" class="btn btn-danger delete-confirm">Hapus</a>
                              </td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Kode Guru</th>
                          <th>NUPT</th>
                          <th>Nama Guru</th>
                          <th>Mapel</th>
                          <th>Tindakan</th>
              
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->

          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js') }}"></script>
<!-- page script -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});

    
  });
</script>
</body>
</html>


@endsection