<?php if ($this->session->flashdata('error') != "") { ?>
  <script>
    showAlert("<?php echo $this->session->flashdata('error'); ?>", 'danger');
  </script>
<?php } ?>
<div class="container mt-30">
  <div>
    <?php
    if (isset($_SESSION['company_data'])) {
      ?>
    <label><?php echo $_SESSION['company_data']['company_name']; ?> </label>&nbsp;<span> <?php echo $_SESSION['company_data']['email']; ?></span>
    <?php } ?>
  </div>
  <div>
    <h2>Choose Services</h2>
  </div>
  <div class="container">
			<a href="#demo" class="btn btn-primary" data-toggle="collapse">Statement of Applicability – which Annex A security controls are you applying?</a>
			<div id="demo" class="collapse show">
      <form action="<?php echo base_url('Home/set_services')?>" method="POST">
				<ol class="text-justify">
        <?php
        for ($j = 0; $j < count($annex); $j++) {
          // echo $annex[$j]['clause_section'];
          ?>
					   <div class="row container py-2">
              <div class="col-sm-9">
              <!-- <li style="padding-left:1em"> <?php echo $annex[$j]['title'] ?> </li> -->
              <span><?php echo $annex[$j]['clause_section'];?> :</span> <?php echo $annex[$j]['title'] ?>
                </div>
                <div class="col-sm-2">
                <input type="checkbox" value="<?php echo $annex[$j]['clause_section']?>" name="<?php echo $j?>" checked="checked"> 
                </div>
              </div>
          <?php }?>
        </ol>
        <input type="hidden" value="2" name="services_type">
        <button class="btn btn-primary offset-9" type="submit" >Apply</button>
        </form>
			</div>
		</div>
</div>