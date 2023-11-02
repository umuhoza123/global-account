<?php if(!isset($conn)){ include 'db_connect.php'; } ?>


<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="account_profile">

				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">First Name:</label>
							<input type="text" class="form-control form-control-sm" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
					</div>



					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">TIN:</label>
							<input type="text" class="form-control form-control-sm" name="tin" value="<?php echo isset($tin) ? $tin : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">

				<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Last Name:</label>
							<input type="text" class="form-control form-control-sm" name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Company Name:</label>
							<input type="text" class="form-control form-control-sm" autocomplete="off" name="company_name" value="<?php echo isset($company_name) ?$company_name : '' ?>">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Email:</label>
							<input type="text" class="form-control form-control-sm" name="email" value="<?php echo isset($email) ? $email : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Momo :</label>
							<input type="text" class="form-control form-control-sm" name="momo" value="<?php echo isset($momo) ? $momo : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Phone :</label>
							<input type="text" class="form-control form-control-sm" name="phone" value="<?php echo isset($phone) ? $phone : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label"> Country :</label>
							<input type="text" class="form-control form-control-sm" name="country" value="<?php echo isset($country) ? $country : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Password :</label>
							<input type="text" class="form-control form-control-sm" name="password" value="<?php echo isset($password) ? $password : '' ?>" readonly>
						</div>
					</div>

					<!-- <div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label"> Confirm Password:</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($tin) ? $tin : '' ?>">
						</div>
					</div> -->
				</div>


				
			</form>
		</div>
		<div class="card-footer border-top border-info">
			<div class="d-flex w-100 justify-content-center align-items-center">
				<button class="btn btn-flat  bg-gradient-primary mx-2" form="account_profile">Save</button>
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
		</div>
	</div>
</div>
<script>
	$('#account_profile').submit(function(e) {
		console.log("ndaje");
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_profile',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				console.log("ndumiwe" +resp);

				if (resp == 1) {
					alert_toast('Data successfully saved', "success");
					setTimeout(function() {
						location.href = 'index.php?page=edit_profile&id=<?php echo $_SESSION['login_id'] ?>'
					}, 2000)
				}
			}
		})
	})
</script>
