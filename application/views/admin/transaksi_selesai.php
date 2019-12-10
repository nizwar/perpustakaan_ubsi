<div class="header">
  <h3>Transaksi Selesai</h3>
</div>
<?php foreach ($peminjaman as $p) { ?>
  <form action="<?php echo base_url() . 'admin/transaksi_selesai_act' ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $p->id_pinjam ?>">
    <input type="hidden" name="buku" value="<?php echo $p->id_buku ?>">
    <input type="hidden" name="tgl_kembali" value="<?php echo $p->tgl_kembali ?>">
    <input type="hidden" name="Denda" value="<?php echo $p->denda ?>">
    <div class="form-group">
      <label>Anggota</label>
      <select class="form-control" name="anggota" disabled>
        <option value="">-Pilih Anggota-</option>
        <?php foreach ($anggota as $k) { ?>
          <option <?php if ($p->id_anggota == $k->id_anggota) {
                        echo "selected='selected'";
                      } ?> value="<?php echo $k->id_anggota; ?>"><?php echo $k->nama_anggota; ?></option>
        <?php } ?>
      </select>
    </div>


    <div class="form-group">
      <label>Tanggal Pinjam</label>
      <input class="form-control" type="date" name="tgl_pinjam" style="padding:0px 10px;" value="<?php echo $p->tgl_pinjam ?>" disabled>
    </div>

    <div class="form-group">
      <label>Tanggal Kembali</label>
      <input class="form-control" type="date" name="tgl_kembali" style="padding:0px 10px;" value="<?php echo $p->tgl_kembali ?>" disabled>
    </div>

    <div class="form-group">
      <label>Denda/Hari</label>
      <input class="form-control" type="text" name="denda" value="<?php echo $p->denda ?>" disabled>
    </div>

    <!--     
    <div class="form-group">
      <label>Total Denda</label>
      <?php
        $diff = abs(strtotime($p->tgl_pinjam) - strtotime($p->tgl_kembali));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24)
          / (30 * 60 * 60 * 24));

        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        ?>
      <input class="form-control" type="text" name="denda" value="<?php echo $p->denda *  $days  ?>" disabled>
    </div> -->

    <div class="form-group">
      <label>Tanggal dikembalikan oleh Anggota</label>
      <input class="form-control" type="date" name="tgl_dikembalikan"style="padding:0px 10px;">
      <?php echo form_error('tgl_dikembalikan'); ?>
    </div>

    <div class="form-group">
      <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
    </div>
  </form>
<?php } ?>