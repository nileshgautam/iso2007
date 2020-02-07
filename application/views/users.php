<!-- Begin Page Content -->
<!-- 
<?php echo "<pre>";
print_r($users);?> -->
<div class="container-fluid">
  <!-- Button to Open the Modal -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <h1 class="h3 mb-0 p-10 col-sm-10">Users Administration</h1>

      <a href="<?php echo base_url('admin/register-user')?>" class="btn btn-primary add_tmp_pr " role="button">
        <i class="fas fa-plus text-white " title="Add New users"></i>
      </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="row m-0 p-0">
          <h6 class="m-0 font-weight-bold text-primary col-sm-11">Employees</h6>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered dataTable" id="dataTableuser" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="fs-14 as-44">#</th>
                <th class="fs-14 ">Name</th>
                <th class="fs-14 ">Login Id</th>
                <!-- <th class="fs-14 as-44">Password</th> -->
                <th class="fs-14 ">Role</th>
                <th class="fs-14 as-44">Company Id</th>
                <th class="fs-14 as-44">Action</th>
                <!-- <th class="fs-14 ">Remark</th>
                <th class="fs-14 ">Action</th> -->
              </tr>
            </thead>
            <tbody id="">
              <?php
              // echo "<pre>";
              // print_r($users[0]);
              for ($i = 0; $i < count($users); $i++) {
                ?>
                <tr>
                  <th class="fs-14 as-44"><?php echo $i+1?></th>
                  <th class="fs-14 "><?php echo $users[$i]['f_name'] . " " . $users[$i]['l_name']; ?></th>
                  <th class="fs-14 "><?php echo $users[$i]['email_id']; ?></th>
                  <!-- <th class="fs-14 as-44"><?php echo $users[$i]['password']; ?></th> -->
                  <th class="fs-14 "><?php echo $users[$i]['user_role']; ?></th>
                  <th class="fs-14 "><?php echo $users[$i]['company_id']; ?></th>
                  <th class="fs-14 as-44">Action</th>
                  <!-- <th class="fs-14 ">Remark</th>
                <th class="fs-14 ">Action</th> -->
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>