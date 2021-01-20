@extends('theme')

@section('container')

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
              <form method="post" action="{{ url('/PenilaianSiswa') }}">
                 @csrf
                <div class="card-body">
                <div class="form-group">
                  <label>Nama Siswa</label>
                  <select name="nik" class="form-control select2" style="width: 100%;">
                    <?php foreach ($student as $key): ?>
                      <option value="<?php echo $key->nik ?>"><?php echo $key->name_user; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mapel</label>
                    <input type="text" class="form-control" name="mapel" id="exampleInputEmail1" placeholder="Mata Pelajaran">
                    @error('mapel')
                        <div class="text-danger">Mapel tidak boleh kosong</div>
                    @enderror
                  </div>
                <!-- /.card-body -->

                <div class="form-group">
                  <label>Semester</label>
                  <select name="semester" class="form-control" style="width: 100%;">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                  </select>
                </div>

                <input type="hidden" name="teacher" value="<?php echo session('auth')->name_user; ?>">

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Proses</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

                  <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                  <form>
                    <div class="row">
                      
                      <h3>Data Guru</h3>

                      <div style="margin-left: 10px" class="form-group">
                        <select name="semester" class="form-control" style="width: 100%;">
                            <option>Semua Semester</option>
                            <?php foreach ($array as $key): ?>
                              <?php if ($key == $semester): ?>
                                <option selected><?php echo $key; ?></option>
                                <?php else: ?>
                                  <option><?php echo $key; ?></option>
                              <?php endif ?>
                              
                            <?php endforeach ?>
                            
                        </select>
                      </div>

                      <div style="margin-left: 10px" class="form-group">
                        <select name="class" class="form-control" style="width: 100%;">
                            <option>Pilih</option>
                            <?php foreach ($class as $key): ?>
                                  <option><?php echo $key->name_class; ?></option>
                            <?php endforeach ?>
                            
                        </select>
                      </div>

                      <div style="margin-left: 10px" class="form-group">
                        <select name="majors" class="form-control" style="width: 100%;">
                            <option>Pilih</option>
                            <?php foreach ($majors as $key): ?>
                                  <option><?php echo $key->name_majors; ?></option>
                            <?php endforeach ?>
                            
                        </select>
                      </div>

                      <div style="margin-left: 10px" class="form-group">
                        <select name="letter" class="form-control" style="width: 100%;">
                            <option>Pilih</option>
                            <?php foreach ($letter as $key): ?>
                                  <option><?php echo $key->letter; ?></option>
                            <?php endforeach ?>
                            
                        </select>
                      </div>

                    

                      <input style="margin-left: 21px; height: 42px;" type="submit" class="btn btn-primary" value="Filter">
                      </form>

                      <!-- Button trigger modal -->
                        <button style="margin-left: 21px; height: 42px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Reset
                        </button>
                    </div>
                    
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>NISN</th>
                          <th>Mapel</th>
                          <th>Nama Siswa</th>
                          <th>Semester</th>
                          <th>Nama Guru</th>
                          <th>UH 1</th>
                          <th>UH 2</th>
                          <th>UH 3</th>
                          <th>UH 4</th>
                          <th>Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $key): ?>
                          <tr>
                              <td><?php echo $key->nik ?></td>
                              <td><?php echo $key->mata_pelajaran; ?></td>
                              <td><?php echo $key->name_user; ?></td>
                              <td><?php echo $key->semester; ?></td>
                              <td><?php echo $key->teacher; ?></td>
                              <td><?php echo $key->uh1; ?></td>
                              <td><?php echo $key->uh2; ?></td>
                              <td><?php echo $key->uh3; ?></td>
                              <td><?php echo $key->uh4; ?></td>
                              <td>
                                <a href="{{url('/PenilaianSiswa/'.$key->id)}}" class="btn btn-primary">Nilai</a>
                              </td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>NISN</th>
                          <th>Mapel</th>
                          <th>Nama Siswa</th>
                          <th>Semester</th>
                          <th>Nama Guru</th>
                          <th>UH 1</th>
                          <th>UH 2</th>
                          <th>UH 3</th>
                          <th>UH 4</th>
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


@endsection