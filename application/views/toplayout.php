<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?= anchor('member', 'Perpustakaan', ['class' => 'navbar-brand']) ?>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav navbar-right">
				<li><?php echo anchor('member', 'Home'); ?></li>
				<li>
					<?php
					$text_cart_url  = '<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="margin-right:10px;"></i>';

					$text_cart_url .= ' Booking Cart: ' . $this->M_perpus->edit_data(array('id_anggota' => $this->session->userdata('id_agt')), 'transaksi')->num_rows() . ' Buku';
					?>
					<?= anchor('peminjaman/lihat_keranjang', $text_cart_url) ?>
				</li>
				<?php if ($this->session->userdata('id_agt')) { ?>
					<li>
						<a href="#">
							Hai <b><?= $this->session->userdata('nama_agt') ?></b>
						</a>
					</li>
					<li><?php echo anchor('admin/logout', 'Logout'); ?></li>
				<?php } else { ?>
					<li><?php echo anchor('welcome', 'Login'); ?></li>
				<?php } ?>
			</ul>

		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>