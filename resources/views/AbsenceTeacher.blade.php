@extends('theme')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
          
              <li class="breadcrumb-item active">Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
               <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                    <div class='row'>
                    <div class="col-md-6">
                    <form method='GET' action="">
                      <div class="row">
                      
                      <div class="col-md-3">
                        <select style='margin-top: 30px' name='class' class="form-control" id="exampleFormControlSelect1">
                          <?php foreach ($class as $key): ?>
                            <?php if ($key->name_class == $classParams): ?>
                              <option selected><?php echo $key->name_class; ?></option>
                              <?php else: ?>
                                <option><?php echo $key->name_class; ?></option>
                            <?php endif ?>
                            
                          <?php endforeach ?>
                          
                        </select>
                        <input type="hidden" name="date" value='<?php echo $date; ?>'>
                        </div>

                         <div class="col-md-3">
                        <select style='margin-top: 30px' name='majors' class="form-control" id="exampleFormControlSelect1">
                          <?php foreach ($majors as $key): ?>
                            <?php if ($key->name_majors == $majorsParams): ?>
                              <option selected><?php echo $key->name_majors; ?></option>
                              <?php else: ?>
                                <option><?php echo $key->name_majors; ?></option>
                            <?php endif ?>
                            
                          <?php endforeach ?>
                          
                        </select>
                        
                        </div>
                        <div class="col-md-3">
                        <select style='margin-top: 30px' name='majors' class="form-control" id="exampleFormControlSelect1">
                          <?php foreach ($letter as $key): ?>
                            <?php if ($key->letter == $letterParams): ?>
                              <option selected><?php echo $key->letter; ?></option>
                              <?php else: ?>
                                <option><?php echo $key->letter; ?></option>
                            <?php endif ?>
                            
                          <?php endforeach ?>
                          
                        </select>
                        
                        </div>
                        <div class="col-md-2" style='margin-top: 30px'>
                          <button type="submit" class="btn btn-light"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        </div>
                        </div>
                        </form>

                        
                        
                        <div class="col-md-4" style='margin-top: 30px'>
                        <form action=''>
                        <div class="form-group">
                        <div class='row'>
                          <input type="date" style='width: 300px;' name='date' data-date-format="Y-m-d" value="<?php echo $date; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <input type="hidden" name="majors" value='<?php echo $majorsParams ?>'>
                          <input type="hidden" name="class" value="<?php echo $classParams ?>">
                          <input type="hidden" name="letter" value="<?php echo $letterParams ?>">
                          <button type="submit" class="btn btn-light"><i class="fa fa-search" aria-hidden="true"></i></button>
                          </div>
                          </div>
                          </form>
                        </div>
                        
                        </div>
                       
                        
                          </div>
                      </div>

                    
                </div>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3>Table Absensi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Foto</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>

                <?php foreach ($tableAbsence as $key): ?>
                  <tr>
                    <td><img style="width: 100px;" src="{{ url('image') }}/<?php echo $key->image ?>"></td>
                    <td><?php echo $key->nik; ?>
                    </td>
                    <td><?php echo $key->name_user; ?></td>
                    <td><?php echo $key->name_majors; ?></td>
                    <td><?php echo $key->count; ?></td>
                    <td><span href="#" class="badge badge-info"><?php echo $key->status; ?></span></td>
                    <td>
                      <a href="/change?status=Masuk&id=<?php echo $key->id_absence; ?>&date=<?php echo $date; ?>&majors=<?php echo $majorsParams; ?>&class=<?php echo $classParams; ?>" class="badge badge-primary">Masuk</a> 
                      <a href="/change?status=Izin&id=<?php echo $key->id_absence; ?>&date=<?php echo $date; ?>&majors=<?php echo $majorsParams; ?>&class=<?php echo $classParams; ?>" class="badge badge-success">Izin</a>
                      <a href="/change?status=Sakit&id=<?php echo $key->id_absence; ?>&date=<?php echo $date; ?>&majors=<?php echo $majorsParams; ?>&class=<?php echo $classParams; ?>" class="badge badge-warning">Sakit</a>
                      <a href="/change?status=Alva&id=<?php echo $key->id_absence; ?>&date=<?php echo $date; ?>&majors=<?php echo $majorsParams; ?>&class=<?php echo $classParams; ?>" class="badge badge-danger">Alva</a>
                    </td>
                  </tr>
                <?php endforeach ?>
                  
                

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Foto</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Kelas</th>
                    <th>Status</th>
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Powered By Tim SMK Negeri 2 Trenggalek.</strong>
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

</body>
</html>
@endsection