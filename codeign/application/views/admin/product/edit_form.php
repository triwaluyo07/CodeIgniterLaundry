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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url().'admin/Products/update/'; ?>" method="post" enctype="multipart/form-data" id="form_edit">

							<input type="hidden" name="product_id" value="<?php echo $product_id;?>" id="product_id" />

							<div class="form-group">
								<label for="nama_depan">Nama Depan</label>
								<input class="form-control <?php echo form_error('nama_depan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_depan" value="<?php echo $nama_depan; ?>"
								 id ="nama_depan"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_depan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_belakang">Nama Belakang</label>
								<input class="form-control <?php echo form_error('nama_belakang') ? 'is-invalid':'' ?>"
								 type="text" name="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>"
								 id="nama_belakang"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_belakang') ?>
								</div>
							</div>

							
							Berat Laundry
							<div class="input-group mb-3 <?php echo form_error('berat') ? 'is-invalid':'' ?>">
							<input type="text" class="form-control" placeholder="Berat" id="berat" name="berat"
							value="<?php echo $berat; ?>">
							<div class="input-group-append">
							<span class="input-group-text">kg</span>
							</div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Alamat" value="<?php echo $alamat;?>" 
								 id="alamat"/>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" placeholder="email" value="<?php echo $email; ?>"
								 id="email"/>
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
							<label for="jenis_laundry">Jenis Laundry :</label>
							<select class="form-control" id="jenis_laundry" name="jenis_laundry"
							<?php echo form_error('jenis_laundry') ? 'is-invalid':'' ?>>
							 	<option><?php echo $jenis_laundry; ?></option>
								<option>Basah</option>
								<option>Kering</option>
								<option>Kering + Setrika</option>
								<option>Kering + Setrika + Parfum</option>
							</select>
								<div class="invalid-feedback">
									<?php echo form_error('jenis_laundry') ?>
								</div>
							</div> 

							<div class="form-group">
							<label for="waktu">Waktu :</label>
							<select class="form-control" id="waktu" name="waktu"
							<?php echo form_error('jenis_laundry') ? 'is-invalid':'' ?> >
							<option><?php echo $waktu; ?></option>
								<option>Reguler 3 Hari</option>
								<option>Cepat 1 Hari </option>
								<option>Kilat 12 Jam</option>
								<option>Super Kilat 5 Jam</option>
							</select>
								<div class="invalid-feedback">
									<?php echo form_error('waktu') ?>
								</div>
							</div> 

							<div class="form-group">
								<label for="harga">Harga</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga" min="0" placeholder="harga" value="<?php echo $harga; ?>"
								 id="harga"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>

							<input class="btn btn-primary" type="submit" name="btn" value="Save"/>
						</form>

					</div>

					<div class="card-footer small text-muted">
						Harus diisi semua
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

		<?php $this->load->view("admin/_partials/js.php") ?>
		<script type="text/javascript">
		function cek_input()
            {
                if($("#nama_depan").val().trim()==""){
                    alert("Mohon isi gan");
                    $("#nama_depan").focus();
                    return false;
                }else if($("#nama_belakang").val().trim()==""){
                    alert("Mohon isi gan");
                    $("#nama_belakang").focus();
                    return false;
                }else if($("#alamat").val().trim()==""){
                    alert("Mohon isi gan");
                    $("#alamat").focus();
                    return false;
                }else if($("#email").val().trim()==""){
                    alert("Mohon isi gan");
                    $("#email").focus();
                    return false;
                }
                return true;
            }

            $(document).ready(function()
            { 
                $("#form_edit").submit(function(e){
                    if(cek_input()==false)
                        e.preventDefault();
                });
            });
		</script>
</body>

</html>
