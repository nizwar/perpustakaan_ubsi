<!DOCTYPE html>
<html>
<head>
 <title></title>
</head>
<body>
 <style type="text/css">
 .table-data{
   width: 100%;
   border-collapse: collapse;
  }

  .table-data tr th,
  .table-data tr td{
   border:1px solid black;
   font-size: 10pt;
  }
 </style>

 <h3>Laporan Transaksi Rental Mobil</h3>
 <table>
  <tr>
   <td>Dari Tgl</td>
   <td>:</td>
   <td><?php echo date('d/m/Y',strtotime($_GET['dari'])); ?></td>
  </tr>
  <tr>
   <td>Sampai Tgl</td>
   <td>:</td>
   <td><?php echo date('d/m/Y',strtotime($_GET['sampai'])); ?></td>
  </tr>
 </table>

 <br/>
 <table class="table-data">
  <thead>
   <tr>
     <th>No</th>
     <th>Tanggal</th>
     <th>Nama ANggota</th>
     <th>Judul Buku</th>
     <th>Tgl. Pinjam</th>
     <th>Tgl. Kembali</th>
     <th>Tgl. Dikembalikan</th>
     <th>Total Denda</th>
     <th>Status</th>
   </tr>
  </thead>
  <tbody>
   <?php
   $no = 1;
   foreach($laporan as $l){
   ?>
   <tr>
     <td><?php echo $no++; ?></td>
     <td><?php echo date('d/m/Y',strtotime($l->tgl_input));?></td>
     <td><?php echo $l->nama_anggota; ?></td>
     <td><?php echo $l->judul_buku; ?></td>
     <td><?php echo date('d/m/Y',strtotime($l->tgl_pinjam));?></td>
     <td><?php echo date('d/m/Y',strtotime($l->tgl_kembali));?></td>
     <td>
      <?php
      if($l->tgl_pengembalian =="000000-00"){
      echo "-";
      }else{
       echo date('d/m/Y',strtotime($l->tgl_pengembalian));
      }
      ?>
     </td>
     <td><?php echo "Rp. ". number_format($l->totaldenda).",-";?></td>
     <td>
      <?php
      if($l->status_peminjaman == "1"){
       echo "Selesai";
      }else{
       echo "-";
      }
      ?>
     </td>
   </tr>
   <?php
  }
  ?>
 </tbody>
</table>

</body>
</html>
