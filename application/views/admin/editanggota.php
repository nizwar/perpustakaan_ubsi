<div class="page-header">
  <h3>Edit Anggota</h3>
</div>
<?php foreach ($anggota as $a){ ?>
<form action="<?php echo base_url().'admin/update_anggota' ?>" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label>Nama Anggota</label>
    <input type="hidden" name="id" value="<?php echo $a->id_anggota; ?>">
    <input type="text" name="nama_anggota" class="form-control" value="<?php echo $a->nama_anggota; ?>">
    <?php echo form_error('nama_anggota'); ?>
  </div>

  <div class="form-group">
    <label>Gender</label>
    <select name="gender" class="form-control">
      <option <?php if($a->gender == "Laki-Laki"){echo "selected='selected'";} echo $a->gender; ?> value="Laki-Laki">Laki-Laki</option>
      <option <?php if($a->gender == "Perempuan"){echo "selected='selected'";} echo $a->gender; ?> value="Perempuan">Perempuan</option>
    </select>
    <?php echo form_error('gender'); ?>
  </div>

  <div class="form-group">
    <label>No.Telpon</label>
    <input type="text" name="no_telp" class="form-control" value="<?php echo $a->no_telp; ?>">
    <?php echo form_error('no_telp'); ?>
  </div>

  <div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?php echo $a->alamat; ?>">
    <?php echo form_error('alamat'); ?>
  </div>

  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="<?php echo $a->email; ?>">
    <?php echo form_error('email'); ?>
  </div>

  <div class="form-group">
    <label>Buku</label>
    <input type="password" name="password" class="form-control" value="<?php echo $a->password; ?>">
    <?php echo form_error('password'); ?>
  </div>

  <div class="form-group">
    <input type="submit" value="Update" class="btn btn-default">
		<input type="button" value="Kembali" class="btn btn-primary" onclick="window.history.go(-1)">
  </div>
  </form>
  <?php } ?>
