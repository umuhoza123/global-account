<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-device">
			<input type="text" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <input type="text" name="Editor" value="<?php echo $_SESSION['login_firstname'] ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">serial number:</label>
					<input type="text" class="form-control form-control-sm" name="serial" value="<?php echo isset($manager) ? $manager : '' ?>">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Branch Manager: </label>
					<input type="text" class="form-control form-control-sm" name="manager" value="<?php echo isset($email) ? $email : '' ?>">
				</div>
			</div>



          	
		</div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">BranchName:</label>
              <input type="text" class="form-control form-control-sm" autocomplete="off" name="name" value="<?php echo isset($location) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
            </div>
          </div>
		  <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Number of device:</label>
              <input type="text" class="form-control form-control-sm" autocomplete="off" name="device" value="<?php echo isset($location) ? date("Y-m-d",strtotime($start_date)) : '' ?>">
            </div>
          </div>
		</div>
        
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-device">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>
	$('#manage-device').submit(function(e){
		console.log("ndaje");
		e.preventDefault()
		start_load()

		$.ajax({
			url:'ajax.php?action=save_device',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				console.log("ndumiwe" +resp);
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
						location.href = 'index.php?page=device_list'
					},2000)
				}
			}
		})
	})
</script>