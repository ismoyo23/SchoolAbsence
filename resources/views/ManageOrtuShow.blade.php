<?php foreach ($data as $key): ?>
@extends('theme')

@section('container')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Ortu</h1>
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
                <h3 class="card-title">Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('/ManageOrtuUpdate/'.$key->id_user) }}">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input value="<?php echo $key->nik ?>" type="number" class="form-control" name="nik" id="exampleInputEmail1" placeholder="NIK">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Orang Tua</label>
                    <input value="<?php echo $key->name_user; ?>" type="text" class="form-control" name="name_user" id="exampleInputEmail1" placeholder="Nama Orang Tua">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">NISN Siswa</label>
                    <input value="<?php echo $key->class; ?>" name="class" type="text" class="form-control" name="text" id="exampleInputEmail1" placeholder="NISN siswa">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input value="<?php echo $key->majors; ?>" type="text" class="form-control" name="majors" id="exampleInputEmail1" placeholder="Alamat">
                  </div>

          
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Proses</button>
                </div>
              </form>
            </div>

          
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

<?php endforeach ?>