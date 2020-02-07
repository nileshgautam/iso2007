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
    <label><?php echo $_SESSION['company_data']['company_name']; ?> </label><span><?php echo $_SESSION['company_data']['email']; ?></span>
    <?php } ?>
  </div>
  <div>
    <h5>Choose Services</h5>
  </div>
  <div class="container">
    <a href="#demo1" class="btn btn-primary" data-toggle="collapse">ISO 27001 Gap Analysis</a>
    <div id="demo1" class="collapse show">
      <form action="<?php echo base_url('Home/set_services')?>" method="POST">
        <ol class="text-justify">
          <?php
          for ($i = 0; $i < count($iso27001); $i++) {
            ?>
            <div class="row container py-2">
              <div class="col-sm-9">
              <span><?php echo $iso27001[$i]['clause_section'];?> :</span> <?php echo $iso27001[$i]['title'] ?></li>
              </div>
              <div class="col-sm-2"><input type="checkbox"  value="<?php echo $iso27001[$i]['clause_section']?>" name="<?php echo $i?>" checked="checked"> </div>

            </div>

          <?php   } ?>
        </ol>
        <input type="hidden" value="1" name="services_type">
        <button class="btn btn-primary offset-9" type="submit">Apply</button>
      </form>
    </div>
  </div> <br>

