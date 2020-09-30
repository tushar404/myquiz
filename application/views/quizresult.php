<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Quiz Result</h1>
	<?php  echo $this->session->flashdata('message'); ?>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<td>Quiz name</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(isset($studentquizlists) && !empty($studentquizlists)){ 
			foreach($studentquizlists as $studentquizlist){
		?>
			<tr>
				<td><?php echo $studentquizlist['quiz_name'];?></td>
				<td><a href="<?php echo BASE_PATH;?>/viewresult/<?php echo $studentquizlist['quiz_id'];?>">View Result</a></td>
			</tr>
		<?php }}else{ ?>
			<tr><td colspan="2">No Result found.</td></tr>
		<?php } ?>
		</tbody>
	</table>
	</div>
</main>