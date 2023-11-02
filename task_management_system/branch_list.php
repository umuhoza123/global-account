<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_branch"><i class="fa fa-plus"></i> Add New Branch</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-condensed" id="list">
				<colgroup>
					<col width="2%">
					<col width="10%">
					<col width="20%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">Id</th>
						<th>client </th>
						<th>Manager</th>
						<th>email</th>
						
						<th>location</th>
                        <th>software</th>

						<th>category</th>
						<!-- <th>Country</th> -->
						
						<th>actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					$editor = $_SESSION['login_firstname'];
					$qry = $conn->query("SELECT * FROM system_branch WHERE editor = '$editor'");
                    while ($row = $qry->fetch_assoc()):

					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td>
							<p><b><?php echo ucwords($row['client']) ?></b></p>
						</td>
						<td>
							<p><b><?php echo ucwords($row['manager']) ?></b></p>
							
						</td>
						<td><b><?php echo $row['email'] ?></b></td>
						<td><b><?php echo $row['location'] ?></b></td>
						<td><b><?php echo $row['software'] ?></b></td>
						<td><b><?php echo $row['category'] ?></b></td>
						<!-- <td><b><?php echo $row['country_name'] ?></b></td> -->
						
						
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
			                    <div class="dropdown-menu" style="">
			                      <a class="dropdown-item new_productivity" data-pid = '<?php echo $row['pid'] ?>' data-tid = '<?php echo $row['id'] ?>'  data-task = '<?php echo ucwords($row['task']) ?>'  href="javascript:void(0)">Add Productivity</a>
								</div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table p{
		margin: unset !important;
	}
	table td{
		vertical-align: middle !important
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.new_productivity').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Progress for: "+$(this).attr('data-task'),"manage_progress.php?pid="+$(this).attr('data-pid')+"&tid="+$(this).attr('data-tid'),'large')
	})
	})
	function delete_project($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_project',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>