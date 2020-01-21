<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/form_baru') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Depan</th>
										<th>Nama Belakang</th>
										<th>Berat Laundry</th>
										<th>Alamat</th>
										<th>Email</th>
										<th>Jenis Laundry</th>
										<th>Waktu</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data as $product): ?>
									<tr>
										
										<td width="150">
											<?php echo $product['nama_depan'] ?>
										</td>
										<td width="150">
											<?php echo $product['nama_belakang'] ?>
										</td>
										<td width="150">
											<?php echo $product['berat'] ?> kg
										</td>
										<td class="small">
											<?php echo substr($product['alamat'], 0, 120) ?>
										</td>
										<td width="150">
											<?php echo $product['email'] ?>
										</td>
										<td width="150">
											<?php echo $product['jenis_laundry'] ?>
										</td>
										<td width="150">
											<?php echo $product['waktu'] ?>
										</td>
										<td width="150">
											<?php echo $product['harga'] ?>
										</td>
										<td width="250">
											<a href="<?php echo base_url()."admin/products/edit/".$product['product_id']; ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/Products/delete/'.$product['product_id']) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}

		// function edit(nama_depan,nama_belakang,jenis_kelamin,alamat,email,jenis_laundry,waktu,harga){
		// 	$("#nama_depan").val(nama_depan);
		// 	$("#nama_belakang").val(nama_belakang);
		// 	$("#jenis_kelamin").val(jenis_kelamin);
		// 	$("#alamat").val(alamat);
		// 	$("#email").val(email);
		// 	$("#jenis_laundry").val(jenis_laundry);
		// 	$("#waktu").val(waktu);
		// 	$("#harga").val(harga);
		// 	$('#form_edit').attr('action', '<?php echo base_url()."admin/products/update"; ?>');
		// }
	</script>
</body>

</html>
