<h2 class="text-center mb-2"> ISO 27001 gap analysis tools</h2>
<div class="container">
	<form action="<?php echo base_url('Home/insert_question_responce') ?>" method="POST">
		<div class="row">
			<div class="col-sm-12">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Clause/Section</th>
							<th scope="col">ISO 27001 requirement / Annex A Control</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php for ($i = 0; $i < count($question); $i++) {
							?>
							<tr>
								<th scope="row">1</th>
								<td><?php echo $question[$i]['question_code']; ?></td>
								<td><?php echo $question[$i]['question']; ?></td>

								<td><select name="<?php echo $question[$i]['question_code']; ?>" id="status">
										<?php for ($j = 0; $j < count($status); $j++) {
												?>
											<option value="<?php echo $status[$j]['status'] ?>"><?php echo $status[$j]['status'] ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<hr class="sidebar-divider">
		<div class="row">
			<div class="col-sm-6">
				<div class="col-sm-6">
					<label for="note">Note</label></div>
				<div class="col-sm-6">
					<textarea name="note" cols="50" rows="5" id="note"></textarea>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="col-sm-12">
					<label for="responceBy"> Responce by</label>
				</div>
				<div class="col-sm-6">
					<select name="responceBy" id="responceBy">
						<?php for ($k = 0; $k < count($users); $k++) {
							?>
							<option value="<?php echo $users[$k]['f_name'] ." ". $users[$k]['l_name'] ?>"><?php echo $users[$k]['f_name'] . $users[$k]['l_name']  ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<input type="hidden" name="hiddenComp_id" value="<?php echo $id ?>">
		<input type="hidden" name="qt" value="<?php echo $question[0]['question_code']?>">

		<div class=""><button class="btn btn-primary offset-9" type="submit">Save</button></div>
	</form>
</div>