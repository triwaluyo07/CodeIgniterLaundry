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

						<a href="<?php echo site_url('admin/Pengguna/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo base_url().'admin/Pengguna/update/'; ?>" method="post" enctype="multipart/form-data" id="form_edit">

							<input type="hidden" name="id" value="<?php echo $id;?>" id="id" />

							<div class="form-group">
								<label for="username">Username</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"
								 id ="username"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_depan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control <?php echo form_error('nama_belakang') ? 'is-invalid':'' ?>"
								 type="text" name="password" placeholder="Password" value="<?php echo $password; ?>"
								 id="nama_belakang"/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
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
