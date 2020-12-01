<?php  ?>
@extends('theme')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jurnal Manager</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Upload Semester</li>
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
                <h3 class="card-title">Upload Semester</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" method="post" action="{{ url('/uploadSemester') }}">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Guru</label>
                    <input type="number" class="form-control" name="nik" id="exampleInputEmail1" placeholder="Enter email">
                    @error('nik')
                        <div class="text-danger">Kode guru tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">NUPT</label>
                    <input type="date" class="form-control" name="nupt" id="exampleInputEmail1" placeholder="Enter email">
                    @error('nupt')
                        <div class="text-danger">NUPT tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Guru</label>
                    <input type="text" class="form-control" name="text" id="exampleInputEmail1" placeholder="Enter email">
                    @error('nupt')
                        <div class="text-danger">Hari tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mapel</label>
                    <input type="text" class="form-control" name="text" id="exampleInputEmail1" placeholder="Enter email">
                    @error('nupt')
                        <div class="text-danger">Hari tidak boleh kosong</div>
                    @enderror
                  </div>

          
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Proses</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

                  <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                    <h3>Jurnal Manager</h3>
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
                              <td><?php echo $key->majors; ?></td>
                              <td>
                              	<a href="{{ url('/teacherDataDelete/'.$key->id_user) }}" class="btn btn-primary ">Donwload</a>
                              	<a href="{{ url('/uploadSemesterDelete/'.$key->id_user) }}" class="btn btn-danger delete-confirm">Hapus</a>
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