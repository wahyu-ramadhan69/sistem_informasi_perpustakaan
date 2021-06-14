<?php
$idkat = $buku->id_kategori;
$idrak = $buku->id_rak;

$kat = $this->M_Admin->get_tableid_edit('tbl_kategori', 'id_kategori', $idkat);
$rak = $this->M_Admin->get_tableid_edit('tbl_rak', 'id_rak', $idrak);
?>
<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
	<?php $this->load->view('base/nav'); ?>

	<div class="main-content container-fluid">
		<div class="page-title">
			<h3>Informasi Buku</h3>
		</div>
		<section class="section">
			<div class="row" id="table-hover-row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">

						</div>
						<div class="card-content">
							<div class="card-body">
								<table class="table table-striped table-bordered">
									<tr>
										<td style="width:20%">ISBN</td>
										<td><?= $buku->isbn; ?></td>
									</tr>
									<tr>
										<td>Sampul Buku</td>
										<td><?php if (!empty($buku->sampul !== "0")) { ?>
												<a href="<?= base_url('assets_style/image/buku/' . $buku->sampul); ?>" target="_blank">
													<img src="<?= base_url('assets_style/image/buku/' . $buku->sampul); ?>" style="width:170px;height:170px;" class="img-responsive">
												</a>
											<?php } else {
												echo '<br/><p style="color:red">* Tidak ada Sampul</p>';
											} ?>
										</td>
									</tr>
									<tr>
										<td>Judul Buku</td>
										<td><?= $buku->title; ?></td>
									</tr>
									<tr>
										<td>Kategori</td>
										<td><?= $kat->nama_kategori; ?></td>
									</tr>
									<tr>
										<td>Penerbit</td>
										<td><?= $buku->penerbit; ?></td>
									</tr>
									<tr>
										<td>Pengarang</td>
										<td><?= $buku->pengarang; ?></td>
									</tr>
									<tr>
										<td>Tahun Terbit</td>
										<td><?= $buku->thn_buku; ?></td>
									</tr>
									<tr>
										<td>Jumlah Buku</td>
										<td><?= $buku->jml; ?></td>
									</tr>

									<tr>
										<td>Keterangan Lainnya</td>
										<td><?= $buku->isi; ?></td>
									</tr>
									<tr>
										<td>Rak / Lokasi</td>
										<td><?= $rak->nama_rak; ?></td>
									</tr>
									<tr>
										<td>Lampiran</td>
										<td><?php if (!empty($buku->lampiran !== "0")) { ?>
												<a href="<?= base_url('assets_style/image/buku/' . $buku->lampiran); ?>" class="btn btn-primary btn-md" target="_blank">
													<i class="fa fa-download"></i> Sample Buku
												</a>
											<?php  } else {
												echo '<br/><p style="color:red">* Tidak ada Lampiran</p>';
											} ?>
										</td>
									</tr>
									<tr>
										<td>Tanggal Masuk</td>
										<td><?= $buku->tgl_masuk; ?></td>
									</tr>
								</table>
								<a href="<?= base_url('data'); ?>" class="btn btn-danger btn-md">Kembali</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!--modal import -->
	<div class="modal fade" id="TableAnggota">
		<div class="modal-dialog" style="width:70%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"> Anggota Yang Sedang Pinjam</h4>
				</div>
				<div id="modal_body" class="modal-body fileSelection1">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Nama</th>
								<th>Jenkel</th>
								<th>Telepon</th>
								<th>Tgl Pinjam</th>
								<th>Lama Pinjam</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$bukuid = $buku->buku_id;
							$pin = $this->db->query("SELECT * FROM tbl_pinjam WHERE buku_id ='$bukuid' AND status = 'Dipinjam'")->result_array();
							foreach ($pin as $si) {
								$isi = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $si['anggota_id']);
								if ($isi->level == 'Anggota') {
							?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $isi->anggota_id; ?></td>
										<td><?= $isi->nama; ?></td>
										<td><?= $isi->jenkel; ?></td>
										<td><?= $isi->telepon; ?></td>
										<td><?= $si['tgl_pinjam']; ?></td>
										<td><?= $si['lama_pinjam']; ?> Hari</td>
									</tr>
							<?php $no++;
								}
							} ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<?php $this->load->view('base/footer'); ?>