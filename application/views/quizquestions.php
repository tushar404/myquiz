<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Questions</h1>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<form method="post" action="<?php echo BASE_PATH;?>/quizsubmit">
        <tbody>
		<?php 
		if(isset($questions) && !empty($questions)){
			?>
			<input type="hidden" name="quiz_id" value="<?php echo $quizId; ?>"/>
		<?php
			foreach($questions as $question){
		?>
			<tr>
				<td><input type="hidden" name="qt_name_<?php echo  $question['qu_id']; ?>" value="<?php echo $question['qu_id']; ?>"><?php echo $question['qu_question']; ?></td>
				<td><input type="radio" name="qt_option_<?php echo $question['qu_id'];?>" value="<?php echo $question['option1']; ?>" required><?php echo $question['option1']; ?></td>
				<td><input type="radio" name="qt_option_<?php echo $question['qu_id'];?>" value="<?php echo $question['option2']; ?>" required><?php echo $question['option2']; ?></td>
				<td><input type="radio" name="qt_option_<?php echo $question['qu_id'];?>" value="<?php echo $question['option3']; ?>" required><?php echo $question['option3']; ?></td>
				<td><input type="radio" name="qt_option_<?php echo $question['qu_id'];?>" value="<?php echo $question['option4']; ?>" required><?php echo $question['option4']; ?></td>
			</tr>
		<?php } ?>
			<tr>
				<td colspan="5">
					<button type="submit" class="btn btn-primary">Submit</button>
				</td>
			</tr>
		<?php }else{ ?>
			<tr><td colspan="4">No Records Found.</td></tr>
		<?php } ?>
		</tbody>
		
		</form>
	</table>
  </div>
</main>