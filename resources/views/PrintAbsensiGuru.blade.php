<?php  ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Print Absensi Guru</title>
  </head>
  <body>
    <table class="table">
  <thead>
    <tr>
      <th>Kode Guru</th>
        <th>Kode Kelas</th>
        <th>Nama Guru</th>
       <th>Kelas</th>
       <th>Jam</th>
       <th>Materi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $key): ?>
                  <tr>
                    <td><?php echo $key->nik; ?></td>
                    <td><?php echo $key->code_room; ?>
                    </td>
                    <td><?php echo $key->name_user; ?></td>
                    <td><?php echo $key->class; ?></td>
                    <td><?php echo $key->jam_ke; ?></td>
                    <td><?php echo $key->materi; ?></td>
                    
                  </tr>
                <?php endforeach ?>
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	window.print()
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>