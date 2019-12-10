<div class="page-header">
  <h3>Data Transaksi</h3>
</div>
<a href="<?php echo base_url() . 'admin/tambah_peminjaman'; ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span> Transaksi Baru</a>
<br><br>
<div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" id="table-datatable">
    <thead>
      <tr>
        <th>No</th>
        <th>Anggota</th>
        <th>Tgl. Pinjam</th>
        <th>Tgl. Kembali</th>
        <th>Tgl. Dikembalikan</th>
        <th>Total Denda</th>
        <th>Status Pinjam</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($peminjaman as $p) {
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $p->id_anggota ?></td>
          <td><?php echo date('d/m/Y', strtotime($p->tgl_pinjam)); ?></td>
          <td><?php echo date('d/m/Y', strtotime($p->tgl_kembali)); ?></td> 
          <td>
            <?php
              if ($p->tgl_pinjam == "0000-00-00") {
                echo "-";
              } else {
                echo date('d/m/Y', strtotime($p->tgl_pengembalian));
              } ?>
          </td>
          <td><?php echo "Rp. " . number_format($p->totaldenda) . " ,-"; ?></td>
          <td>
            <?php
              if ($p->status_peminjaman == "Selesai") {
                echo "Selesai";
              } else if ($p->status_peminjaman == "Booking") { ?>
              <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'peminjaman/pinjam/' . $p->id_pinjam; ?>"><span class="glyphicon glyphicon-ok"></span> Pinjam</a>
            <?php } else { ?>
              <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'admin/transaksi_selesai/' . $p->id_pinjam; ?>"><span class="glyphicon glyphicon-ok"></span> Transaksi Selesai</a>
              <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'admin/transaksi_hapus/' . $p->id_pinjam; ?>"><span class="glyphicon glyphicon-remove"></span> Batalkan Transaksi </a> -->
            <?php } ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>