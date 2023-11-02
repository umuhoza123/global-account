<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-staff">
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <input type="hidden" name="Editor" value="<?php echo $_SESSION['login_firstname'] ?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Branch Name:</label>
					<input type="text" class="form-control form-control-sm" name="name" value="<?php echo isset($name) ? $name : '' ?>">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="control-label">Type Device: </label>
					<input type="text" class="form-control form-control-sm" name="type_device" value="<?php echo isset($type_device) ? $type_device : '' ?>">
				</div>
			</div>



          	
		</div>
		<div class="row">
			<div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Staff :</label>
              <input type="text" class="form-control form-control-sm" autocomplete="off" name="staff" value="<?php echo isset($staff) ? $staff : '' ?>">
            </div>
          </div>
		  
        
        </form>
    	</div>
    	<div class="card-footer border-top border-info">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-staff">Save</button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=project_list'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>
<script>
	$('#manage-staff').submit(function(e){
		console.log("ndaje");
		e.preventDefault()
		start_load()

		$.ajax({
			url:'ajax.php?action=save_staff',
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
						location.href = 'index.php?page=staff_list'
					},2000)
				}
			}
		})
	})
</script>