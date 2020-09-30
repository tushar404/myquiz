<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
	<h1>Hello, <?php echo $students['st_firstname']." ".$students['st_lastname']; ?> </h1>
    <h1 class="mt-5">Quiz Details</h1>
	<?php  echo $this->session->flashdata('message'); ?>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Quiz Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
			<?php 
				if(isset($quizlist) && !empty($quizlist)){
					foreach($quizlist as $quiz){
			?>
				<tr>
					<td><?php echo $quiz['quiz_name']; ?></td>
					<td><a href="<?php echo BASE_PATH;?>/startquiz/<?php echo $quiz['quiz_id'];?>">Start Quiz</a></td>
				</tr>
			<?php  } }else{ ?>
				<tr><td colspan="4">No Records Found.</td></tr>
			<?php } ?>
		</tbody>
	</table>
  </div>
</main>