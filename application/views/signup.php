
<!-- <h1 class="text-center"> ISO 27001:2013 Gap analysis for your information security management system</h1> -->
<?php if ($this->session->flashdata('error') != "") { ?>
  <script>
    showAlert("<?php echo $this->session->flashdata('error'); ?>", 'success');
  </script>
<?php } ?>	
<div class="container mt-30">
		<form action ="<?php echo base_url('loginauth/user_register')?>" method="POST">
			<div class="form-group">
				<label for="first_name_inptxt">First Name</label>
				<input type="text" class="form-control" name="first_name_inptxt" id="first_name_inptxt" required>
				<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
			</div>
			<div class="form-group">
				<label for="last_name_inptxt">Last Name</label>
				<input type="text" class="form-control" id="last_name_inptxt" name="last_name_inptxt" required>
				<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
			</div>
			<div class="form-group">
				<label for="InputEmail1">Email address</label>
				<input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp" autocomplete="off">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="InputPassword">Select company</label>
				<select name="comp_id" id="comp_id" class="form-control">
					<?php for($i=0; $i<count($company); $i++) {?>
					<option value="<?php echo $company[$i]['id']?>"><?php echo $company[$i]['company_name']?></option>
					<!-- <input type="hidden" name="company_id" value="<?php echo $company[$i]['id']?>"> -->
					<?php }?>
				</select>
				
				<!-- <input type="password" class="form-control" id="InputPassword" name="InputPassword" autocomplete="off"> -->
			</div>
			<div class="form-group">
				<label for="InputConfirmPassword1">Contact No.</label>
				<input type="text" class="form-control" id="InputConfirmPassword" name='contact' autocomplete="off">
			</div>
			<div class="form-group">
				<label for="InputConfirmPassword1">Role</label>
				<input type="text" class="form-control" id="userrole" autocomplete="off" name="urole" placeholder="Enter Role" required>
			</div>
			<button type="submit" class="btn btn-primary">Register</button> &nbsp;
			<!-- <a type="button" class="btn btn-danger text-white" href="<?php echo base_url('Home/c_users/').$_SESSION['userInfo']['id'] ?>">Cancel</a> -->
			<a type="button" class="btn btn-danger text-white" href="<?php echo base_url('admin/users')?>">Cancel</a>
		</form>
	</div>
