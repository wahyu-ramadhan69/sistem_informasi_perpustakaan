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
											$total_denda = $denda->row();

											if ($pinjam->status == 'Di Kembalikan') {
												echo $this->M_Admin->rp($total_denda->denda);
											} else {
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
									<tr>
										<td>Data Buku</td>
										<td>:</td>
										<td>
											<table class="table table-striped">
												<thead>
													<tr>
														<th>No</th>
														<th>Title</th>
														<th>Penerbit</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($pin as $isi) {
														$buku = $this->M_Admin->get_tableid_edit('tbl_buku', 'buku_id', $isi['buku_id']);
													?>
														<tr>
															<td><?= $no; ?></td>
															<td><?= $buku->title; ?></td>
															<td><?= $buku->penerbit; ?></td>
														</tr>
													<?php $no++;
													} ?>
												</tbody>
											</table>
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
		</div>
	</div>


	<?php $this->load->view('base/footer'); ?>