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
              <form method="post" action="{{ url('/prosesJurnal') }}">
                 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hari dan Tanggal</label>
                    <input type="date" class="form-control" name="date" id="exampleInputEmail1" placeholder="Enter email">
                    @error('date')
                        <div class="text-danger">Hari tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Kelas</label>
                    <input type="text" name="class" class="form-control" id="exampleInputPassword1" placeholder="Kelas">
                    @error('class')
                        <div class="text-danger">Kelas tidak boleh kosong</div>
                    @enderror
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mapel</label>
                    <input type="text" name="mapel" class="form-control" id="exampleInputPassword1" placeholder="Mapel">
                    <input type="hidden" name="nameTeacher" value="<?php echo session('auth')->name_user; ?>" class="form-control" id="exampleInputPassword1" placeholder="Mapel">
                    @error('class')
                        <div class="text-danger">Class tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Kode KD</label>
                    <input type="text" name="codeKD" class="form-control" id="exampleInputPassword1" placeholder="Kode KD">
                    @error('codeKD')
                        <div class="text-danger">Kode KD tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Materi Pokok</label>
                    <input type="text" name="subjeckMatter" class="form-control" id="exampleInputPassword1" placeholder="Materi Pokok">
                    @error('subjeckMatter')
                        <div class="text-danger">Materi pokok tidak boleh kosong</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea type="text" name="information" class="form-control" id="exampleInputPassword1" placeholder="Keterangan"></textarea> 
                    @error('information')
                        <div class="text-danger">Kterangan pokok tidak boleh kosong</div>
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
                          <th>Hari Tanggal</th>
                          <th>Kelas</th>
                          <th>Nama Guru</th>
                          <th>Kode KD</th>
                          <th>Materi Pokok</th>
                          <th>Keterangan Siswa</th>
                       
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($data as $key): ?>
                          <tr>
                              <td><?php echo date('d F Y', strtotime($key->date)); ?></td>
                              <td><?php echo $key->class; ?></td>
                              <td><?php echo $key->nameTeacher; ?></td>
                              <td><?php echo $key->codeKD; ?></td>
                              <td><?php echo $key->subjeckMatter; ?></td>
                              <td><?php echo $key->information; ?></td>
                            
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Hari Tanggal</th>
                          <th>Kelas</th>
                          <th>Nama Guru</th>
                          <th>Kode KD</th>
                          <th>Materi Pokok</th>
                          <th>Keterangan Siswa</th>
              
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

    
  });
</script>
</body>
</html>


@endsection