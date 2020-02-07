<h2 class="text-center mb-2"> ISO 27001 gap analysis tools</h2>
<div class="container">
	<h3>ISO 27001 Requirement</h3>
	<div class="accordion" id="accordionExample">
		<?php
		for ($i = 0; $i < count($main_content); $i++) {
			?>
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link main_heading" id="<?php echo $main_content[$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
							<?php echo ($main_content[$i]['clause_section']) . ": " . $main_content[$i]['title']; ?>
						</button>
					</h2>
				</div>
				<div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body subsection">

						<!-- new accordain-->
						<!-- close -->
						<?php echo $main_content[$i]['title']; ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<div class="container">
	<h3>Statement of applicability – which Annex A security controls are you applying?</h3>
	<b>Information security control</b>
	<div class="accordion" id="accordionExample">
		<?php

		for ($i = 0; $i < count($annex_content); $i++) {
			?>
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link main_heading" id="<?php echo $annex_content[$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
							<?php echo ($annex_content[$i]['clause_section']) . ": " . $annex_content[$i]['title']; ?>
						</button>
					</h2>
				</div>

				<div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body subsection">
						<!-- <?php echo $annex_content[$i]['title']; ?> -->
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<script src=" <?php echo base_url('assets/js/demo/question.js') ?>"></script>
<!-- <script>
	$(document).ready(function() {

		$('.main_heading').click(function() {
			let id = $(this).attr('id')
			let question = {
				qid: id
			}
			$.ajax({
				type: "POST",
				url: baseUrl + "Home/get_data",
				data: question,
				success: function(newquestion) {

					obj = JSON.parse(newquestion)
					// console.log(obj)
					populate_data(obj)
				},
				error: function() {
					console.log("error logind data")
				}
			});

		});

		function populate_data(obj) {
			// console.log(obj)
			let html = ""
			html = `<ul>`
			for (let i = 0; i < obj.length; i++) {
				html += `<a href="<?php echo base_url('Home/question_view/') ?>${obj[i]['sub_title_code']}"  attr="${obj[i]['sub_title_code']}"><li class="btn-link anchr" ><span>${obj[i]['sub_title_code']}</span> ${obj[i]['sub_title']}</li>`
			}
			html += `</ul>`
			$(".subsection").html(html)
		}

		$("#accordionExample").on('click', 'li', function() {
			let id = $(this).parent().attr('attr')
		});

	});
</script> -->
<style>
	ul {
		list-style-type: none;
	}
</style>