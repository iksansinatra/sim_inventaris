<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>
<style>
table {
  border-collapse: collapse;
}

table, th {
  border: 1px solid black;
  text-align: center;
}

table, td{
  text-align: center;
    vertical-align: middle;
}
</style>

<h1 style="text-align: center;">Data Transportasi Darat</h1>
<div class="row">
<div class="col-lg-12">

<div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped" border="1">
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Input</th>
                  <th>Verifikasi</th>
                  <th>Satuan</th>
                  <th>Sumber Data</th>
                  <th>File</th>

                </tr>
                <?php
                  $no=1;
                  foreach ($tdarat as $key) {

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                    <td><?php echo $key->tdarat_name;?></td>
                    <td><?php echo $key->tdarat_input;?></td>
                    <td><?php echo $key->tdarat_verifikasi;?></td>
                    <td><?php echo $key->tdarat_satuan;?></td>
                    <td><?php echo $key->tdarat_sumber;?></td>
                    <td><?php echo $key->tdarat_file;?></td>
                </tr>
                <?php
                $no++;
                }
                ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
  </div>
</body>
</html>
