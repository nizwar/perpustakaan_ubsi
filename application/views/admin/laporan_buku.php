<div class="page-header">
  <h3>Cetak Data Buku</h3>
</div>
<a class="btn btn-default btn-md" href="<?php echo base_url().'admin/laporan_print_buku' ?>">
  <span class="glyphicon glyphicon-print"></span>
Print</a>
<a class="btn btn-warning btn-md" href="<?php echo base_url().'admin/laporan_pdf_buku' ?>">
  <span class="glyphicon glyphicon-print"></span>
Cetak PDF</a>
<br><br>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>No</th>

        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th>ISBN</th>
        <th>Lokasi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($buku as $b) {
      ?>
      <tr>
        <td><?php echo $no++; ?></td>

        <td><?php echo $b->judul_buku ?></td>
        <td><?php echo $b->pengarang ?></td>
        <td><?php echo $b->penerbit ?></td>
        <td><?php echo $b->thn_terbit ?></td>
        <td><?php echo $b->isbn ?></td>
        <td><?php echo $b->lokasi ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
