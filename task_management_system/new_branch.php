<?php if(!isset($conn)){ include 'db_connect.php'; } ?>


<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-branch">

				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $id : '' ?>">
				<input type="text" name="Editor" value="<?php echo $_SESSION['login_firstname'] ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Client Name:</label>
							<input type="text" class="form-control form-control-sm" name="client" value="<?php echo isset($client) ? $client : '' ?>">
						</div>
					</div>



					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Branch Name:</label>
							<input type="text" class="form-control form-control-sm" name="branch_name" value="<?php echo isset($branch_name) ? $branch_name : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">

				<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Branch Manager Name:</label>
							<input type="text" class="form-control form-control-sm" name="manager" value="<?php echo isset($manager) ? $manager: '' ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Branch Email:</label>
							<input type="text" class="form-control form-control-sm" autocomplete="off" name="email" value="<?php echo isset($email) ?$email : '' ?>">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">location:</label>
							<input type="text" class="form-control form-control-sm" name="location" value="<?php echo isset($location) ? $location : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Category :</label>
							<input type="text" class="form-control form-control-sm" name="category" value="<?php echo isset($category) ? $category : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Software :</label>
							<input type="text" class="form-control form-control-sm" name="software" value="<?php echo isset($software) ? $software : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label"> Country Name:</label>
							<input type="text" class="form-control form-control-sm" name="country_name" value="<?php echo isset($country_name) ? $country_name : '' ?>">
						</div>
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
				<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-branch">Save</button>
				<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
			</div>
		</div>
	</div>
</div>
<script>
	$('#manage-branch').submit(function(e) {
		console.log("ndaje");
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_branch',
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
						location.href = 'index.php?page=branch_list'
					}, 2000)
				}
			}
		})
	})
</script>
