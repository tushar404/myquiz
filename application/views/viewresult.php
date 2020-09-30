<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">View in more Detail Quiz Result</h1>
<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<td>Question</td>
				<td>Answer</td>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(isset($quizresults) && !empty($quizresults)){ 
			foreach($quizresults as $quizresult){
		?>
			<tr>
				<td><?php echo $quizresult['qu_question'];?></td>
				<td><?php
					if($quizresult['qu_answer'] == $quizresult['st_answer']){
						echo "True";
					}else{
						echo "False";
					}
				?></td>
			</tr>
		<?php }}else{ ?>
			<tr><td colspan="2">No Result found.</td></tr>
		<?php } ?>
		</tbody>
	</table>
</div>
</main>