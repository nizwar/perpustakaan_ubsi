<div style="padding: 25px;">
	<div style="position: relative; left: 25%">
		<table>
			<?php
				foreach ($useraktif as $a) {
			?>
			<tr><th colspan="3">Terima Kasih <?php echo $a->nama_anggota; ?></th></tr>
			<tr><th colspan="3">Buku Yang ingin Anda Pinjam Adalah Sebagai berikut:</th></tr>
			<?php }

			?>
			<tr>
				<td colspan="3">
					<br/><br/>
					<div class="page-header">
						<h3>Data Buku</h3>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover" id="table-datatable" >
							<thead>
								<tr>
									<th>No</th>
									<th>Judul Buku</th>
									<th>Pengarang</th>
									<th>Penerbit</th>
									<th>Tahun</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$no = 1;
									foreach($items as $b){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td style="max-width: 200px"><?php echo $b->judul_buku; ?></td>
									<td><?php echo $b->pengarang; ?></td>
									<td><?php echo $b->penerbit; ?></td>
									<td><?php echo substr($b->thn_terbit,0,4); ?></td>
									</form>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
			<tr><td colspan="3"><hr></td></tr>
			<tr>
				<td align="left" colspan="3">
					<a class="btn btn-sm btn-primary" href="<?php echo base_url().'member'; ?>"><span class="glyphicon glyphicon-delete"></span> Selesai</a>
				</td>
			</tr>
		</table>
	</div>
</div>
