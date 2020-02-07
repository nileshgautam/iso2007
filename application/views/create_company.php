<!-- <div class="container p-0">
    <div class="card o-hidden border-0">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body 
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-2">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Company Registration</h1>
                        </div>
                        <form class="user" name="adduser" action="<?php echo base_url('admin/create/user') ?>" method="post" onsubmit="return validation();">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user pading-1" id="exampleFirstName" name="f_name" placeholder="First Name" autocomplete="off" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user pading-1" id="exampleLastName" name="l_name" placeholder="Last Name" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user pading-1" id="exampleInputEmail" name="email" placeholder="Email Address" autocomplete="off" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user pading-1" id="exampleInputPassword" name="pass" placeholder="Password" autocomplete="off" required>
                                </div>
                                <div class=" form-group row col-sm-6">
                                    <input type="password" class="form-control form-control-user pading-1 text-right" id="exampleRepeatPassword" placeholder="Re-enter Password" autocomplete="off" name="repass" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label for="sel1">Select list:</label> 
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-user role" name="role">
                                        <option>Select Role</option>
                                        <?php for ($i = 0; $i < count($roles); $i++) { ?>
                                            <option><?php echo $roles[$i]['role'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user pading-1" name="s_s_name" id="" placeholder="User Short Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="btn-group col-sm-12">
                                <button type="submit" class="btn btn-primary btn-user ">
                                    Register Account
                                </button>
                                <button type="button" class="btn btn-danger btn-user " data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php if ($this->session->flashdata('error') != "") { ?>
  <script>
    showAlert("<?php echo $this->session->flashdata('error'); ?>", 'success');
  </script>
<?php } ?>
<div class="container mt-30">

  <div>
    <h2>Company Registration Form</h2>
  </div>
  <form action="<?php echo base_url('Home/company_register') ?>" method="POST">
    <div class="form-group">
      <label for="InputName">Name</label>
      <input type="text" class="form-control" id="InputName" name="InputName" placeholder="Company Name" required>
    </div>
    <div class="form-group">
      <label for="InputName">GST Number</label>
      <input type="text" class="form-control" id="InputName" name="GST_Number" placeholder="Enter GST Number" required>
    </div>
    <div class="form-group">
      <label for="Address">Address</label>
      <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address" required>

    </div>
    <div class="form-group">
      <label for="Country">Country</label>
      <select class="form-control" id="Country" name="Country" placeholder=" Select Country">
        <?php for ($i = 0; $i < count($country); $i++) { ?>
          <option id="<?php echo $country[$i]['id']; ?>"><?php echo $country[$i]['name']; ?></option>
        <?php } ?>
      </select>
      <!-- <input type="text" class="form-control" id="Country" name="Country" placeholder=" Enter Country" required> -->
    </div>

    <div class="form-group">
      <label for="State">State</label>
      <select class="form-control" id="State" name="State" placeholder=" Select State">
      </select>
      <!-- <input type="text" class="form-control" id="State" name="State" placeholder="Enter State" required> -->
    </div>

    <div class="form-group">
      <label for="City">City</label>
      <select class="form-control" id="City" name="City" placeholder=" Select City">
      </select>
      <!-- <input type="text" class="form-control" id="City" name="City" placeholder="Enter City" required> -->
    </div>
    <div class="form-group">
      <label for="Zip/Pin Code">Zip/Pin Code</label>
      <input type="text" class="form-control" id="Zip/Pin Code" name="Zip_Pin_Code" placeholder="Enter Zip/Pin Code" required>
    </div>
    <div class="form-group">
      <label for="Contact_No">Contact No.</label>
      <input type="text" class="form-control" id="Contact_No" name="Contact_No" placeholder=" Enter Contact No." required>
    </div>

    <div class="form-group">
      <label for="Email">Email</label>
      <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email" required>
    </div>
    <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="chck" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
    <button type="submit" class="btn btn-primary">Submit</button> 
    <a href="<?php echo base_url('admin')?>"  class="btn btn-link text-white btn-danger">Cancel</a>
  </form>
</div>
<script>
  $(document).ready(function() {

    $("#Country").change(function() {
   
      let id = $(this).children("option:selected").attr('id');
      country_id = {
        c_id: id
      }
      $.ajax({
        type: "POST",
        url: baseUrl + "Home/select_state",
        data: country_id,
        success: function(comp_responce) {
          obj = JSON.parse(comp_responce)
          if (obj) {
            // console.log(obj)
            let data = populate_option(obj);
            //  console.log(data);
            $('#State').append(data);
            // company_responce = obj;
          }
        },
        error: function() {
          console.log("error logind data")
        }
      });
      // alert(id);
    });


    $("#State").change(function() {
      let id = $(this).children("option:selected").attr('id');
      country_id = {
        c_id: id
      }

      $.ajax({
        type: "POST",
        url: baseUrl + "Home/select_cities",
        data: country_id,
        success: function(comp_responce) {
          obj = JSON.parse(comp_responce)
          if (obj) {
            console.log(obj)
            let data = populate_cities(obj);
            //  console.log(data);
            $('#City').append(data);
            // company_responce = obj;
          }
        },
        error: function() {
          console.log("error logind data")
        }
      });
      // alert(id);
    });

    function populate_option(obj) {
      let html = '';
      for (let i = 0; i < obj.length; i++) {
        html += `<option id="${obj[i]['id']}" >${obj[i]['name']}</option>`
      }
      return html;
    }

    function populate_cities(obj) {
      let html = '';
      for (let i = 0; i < obj.length; i++) {
        html += `<option id="${obj[i]['state_id']}" >${obj[i]['name']}</option>`
      }
      return html;
    }
  });
</script>