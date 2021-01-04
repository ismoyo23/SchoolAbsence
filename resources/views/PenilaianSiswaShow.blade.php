@extends('theme')

@section('container')

<?php foreach ($data as $dta): ?>
  

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
              <li class="breadcrumb-item active">Penialan siswa</li>
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
                <h3 class="card-title">Penilaian Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ url('/PenilaianSiswaUpdate') }}">
                 @csrf
                <div class="card-body">
                <div class="form-group">
                  <label>Nama Siswa</label>
                  <select name="nik" class="form-control select2" style="width: 100%;">
                    <?php foreach ($student as $key): ?>
                      <?php if ($key->nik == $dta->nik): ?>
                        <option selected value="<?php echo $key->nik ?>"><?php echo $key->name_user; ?></option>
                        <?php else: ?>
                          <option value="<?php echo $key->nik ?>"><?php echo $key->name_user; ?></option>
                      <?php endif ?>
                      
                    <?php endforeach ?>
                  </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mapel</label>
                    <input value="<?php echo $dta->mata_pelajaran; ?>" type="text" class="form-control" name="mapel" id="exampleInputEmail1" placeholder="Mata Pelajaran">
                  
                  </div>
                <!-- /.card-body -->

                <div class="form-group">
                    <label for="exampleInputEmail1">Ulangan Harian 1</label>
                    <input value="<?php echo $dta->uh1; ?>" type="text" class="form-control" name="uh1" id="exampleInputEmail1" placeholder="Ulangan Harian 1">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ulangan Harian 2</label>
                    <input value="<?php echo $dta->uh2; ?>" type="text" class="form-control" name="uh2" id="exampleInputEmail1" placeholder="Ulangan Harian 2">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ulangan Harian 3</label>
                    <input value="<?php echo $dta->uh3; ?>" type="text" class="form-control" name="uh3" id="exampleInputEmail1" placeholder="Ulangan Harian 3">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ulangan Harian 4</label>
                    <input value="<?php echo $dta->uh4; ?>" type="text" class="form-control" name="uh4" id="exampleInputEmail1" placeholder="Ulangan Harian 4">
                    <input type="hidden" value="<?php echo $dta->id; ?>" name="id">
                  </div>

                <div class="form-group">
                  <label>Semester</label>
                  <select name="semester" class="form-control" style="width: 100%;">
                    <?php foreach ($array as $key): ?>
                      <?php if ($key == $dta->semester): ?>
                        <option selected><?php echo $key; ?></option>
                        <?php else: ?>
                        <option><?php echo $key; ?></option>
                      <?php endif ?>
                      
                    <?php endforeach ?>
                      
                      
                  </select>
                </div>

                <input type="hidden" name="teacher" value="<?php echo session('auth')->name_user; ?>">

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Proses</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          
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
<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {

    $('.select2').select2()

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

<?php endforeach ?>

@endsection