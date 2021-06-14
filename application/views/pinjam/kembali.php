<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>

</div>
</div>
<div id="main">
	<?php $this->load->view('base/nav'); ?>

	<div class="main-content container-fluid">
		<div class="page-title">
			<h3>Kategori Buku</h3>
		</div>
		<section class="section">
			<div class="row match-height">
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
						</div>
						<div class="card-content">
							<div class="card-body">
								<table class="table">
									<tr>
										<td colspan="3">Data Transaksi</td>
									</tr>
									<tr>
										<td>No Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->pinjam_id; ?>
										</td>
									</tr>
									<tr>
										<td>Tgl Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_pinjam; ?>
										</td>
									</tr>
									<tr>
										<td>Tgl pengembalian</td>
										<td>:</td>
										<td>
											<?= $pinjam->tgl_balik; ?>
										</td>
									</tr>
									<tr>
										<td>ID Anggota</td>
										<td>:</td>
										<td>
											<?= $pinjam->anggota_id; ?>
										</td>
									</tr>

									<tr>
										<td>Lama Peminjaman</td>
										<td>:</td>
										<td>
											<?= $pinjam->lama_pinjam; ?> Hari
										</td>
									</tr>
								</table>

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<div class="card">
						<div class="card-header">
						</div>
						<div class="card-content">
							<div class="card-body">
								<table class="table">
									<tr">
										<td colspan="3">Pinjam Buku</td>
										</tr>
										<tr>
											<td>Status</td>
											<td>:</td>
											<td>
												<?= $pinjam->status; ?>
											</td>
										</tr>
										<tr>
											<td>Tgl Kembali</td>
											<td>:</td>
											<td>
												<?php
												if ($pinjam->tgl_kembali == '0') {
													echo '<p style="color:red;">belum dikembalikan</p>';
												} else {
													echo $pinjam->tgl_kembali;
												}

												?>
											</td>
										</tr>
										<tr>
											<td>Denda</td>
											<td>:</td>
											<td>
												<?php
												$pinjam_id = $pinjam->pinjam_id;
												$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");

												$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
												$date1 = date('Ymd');
												$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
												$diff = $date1 - $date2;
												/*	$datetime1 = new DateTime($date1);
													$datetime2 = new DateTime($date2);
													$difference = $datetime1->diff($datetime2); */
												// echo $difference->days;
												if ($diff > 0) {
													echo $diff . ' hari';
													$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
													echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
													</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
												} else {
													echo '<p style="color:green;text-align:center;">
													Tidak Ada Denda</p>';
												}
												?>
											</td>
										</tr>

										<tr>
											<td>Kode Buku</td>
											<td>:</td>
											<td>
												<?php
												$pin = $this->M_Admin->get_tableid('tbl_pinjam', 'pinjam_id', $pinjam->pinjam_id);
												$no = 1;
												foreach ($pin as $isi) {
													$buku = $this->M_Admin->get_tableid_edit('tbl_buku', 'buku_id', $isi['buku_id']);
													echo $no . '. ' . $buku->buku_id . '<br/>';
													$no++;
												}

												?>
											</td>
										</tr>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="pull-right">
			<a data-toggle="modal" data-target="#TableDenda" class="btn btn-primary btn-md" style="margin-left:1pc;">
				<i class="fas fa-undo"></i> Kembalikan</a>
			<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
		</div>
	</div>

	<!--modal import -->
	<div class="modal fade" id="TableDenda">
		<div class="modal-dialog" style="width:70%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> Pengembalian Buku</h4>
				</div>
				<div id="modal_body" class="modal-body fileSelection1">
					<table class="table">
						<tr>
							<td colspan="3">Data Peminjaman Buku</td>
						</tr>
						<tr>
							<td>No Peminjaman</td>
							<td>:</td>
							<td>
								<?= $pinjam->pinjam_id; ?>
							</td>
						</tr>
						<tr>
							<td>Tgl Peminjaman</td>
							<td>:</td>
							<td>
								<?= $pinjam->tgl_pinjam; ?>
							</td>
						</tr>

						<tr>
							<td>ID Anggota</td>
							<td>:</td>
							<td>
								<?= $pinjam->anggota_id; ?>
								<?php
								$user = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $pinjam->anggota_id);
								error_reporting(0);
								if ($user->nama != null) {
									echo ' ( ' . $user->nama . ' )';
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Lama Peminjaman</td>
							<td>:</td>
							<td>
								<?= $pinjam->lama_pinjam; ?> Hari
							</td>
						</tr>
						<tr>
							<td>Tanggal Pengembalian</td>
							<td>:</td>
							<td>
								<?= date('Y-m-d'); ?> ( Sekarang )
							</td>
						</tr>
						<tr>
							<td>Terlewat Masa Pengembalian</td>
							<td>:</td>
							<td>
								<?php

								$date1 = date('Ymd');
								$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
								$diff = $date1 - $date2;
								if ($diff > 0) {
									echo abs($diff);
								} else {
									echo '0';
								}
								?> Hari
							</td>
						</tr>
						<tr>
							<td>Total Denda</td>
							<td>:</td>
							<td>
								<?php
								$pinjam_id = $pinjam->pinjam_id;
								$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");

								$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
								$date1 = date('Ymd');
								$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
								$diff = $date1 - $date2;
								/* $datetime1 = new DateTime($date1);
					$datetime2 = new DateTime($date2);
					$difference = $datetime1->diff($datetime2);*/
								// echo $difference->days;
								if ($diff > 0) {
									$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
									echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
					</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
								} else {
									echo '<p style="color:green;text-align:center;">
					Tidak Ada Denda</p>';
								}
								?>
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<div class="pull-right">
						<a href="<?= base_url('transaksi/prosespinjam?kembali=' . $pinjam->pinjam_id); ?>">
							<button class="btn btn-primary"> Proses Pengembalian</button></a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<?php $this->load->view('base/footer'); ?>