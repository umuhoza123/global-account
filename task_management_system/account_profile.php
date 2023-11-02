<?php if (!isset($conn)) {
	include 'db_connect.php';
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Retrieve user information using the $id
    $sql = "SELECT * FROM users WHERE id = $id"; // Replace 'users' with your table name
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        // Extract user data
        $firstname = $row['firstname'];
		$lastname = $row['lastname'];
        $tin = $row['tin'];
        $company_name = $row['company_name'];
        $email = $row['email'];
		$password= $row['password'];
		$momo = $row['momo'];
		$country =$row['country'];
		$phone = $row['phone'];

        // ... Retrieve other fields similarly
    }}


?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="account_profile">

				<input type="text" name="id" value="<?php echo isset($_GET['id']) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">First Name:</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
					</div>



					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">TIN:</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($tin) ? $tin : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">

				<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Last Name:</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Company Name:</label>
							<input type="text" class="form-control form-control-sm" autocomplete="off" name="start_date" value="<?php echo isset($company_name) ?$company_name : '' ?>">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Email:</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($email) ? $email : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Momo :</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($momo) ? $momo : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Phone :</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($phone) ? $phone : '' ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label"> Country :</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($country) ? $country : '' ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="" class="control-label">Password :</label>
							<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($password) ? $password : '' ?>" readonly>
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
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=account_profile',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast('Data successfully saved', "success");
					setTimeout(function() {
						location.href = 'index.php?page=account_profile'
					}, 2000)
				}
			}
		})
	})
</script>