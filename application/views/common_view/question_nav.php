<!-- <?php print_r($_SESSION['question']['iso']);
      print_r(count($_SESSION['question']['iso']));
      // die;
      ?>  -->
<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <!-- Access menu for Admin -->
    <!-- <?php if ($_SESSION['userInfo']['user_role'] === '1') : ?> -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon rotate-n-0">
        <i class="fas fa-industry"></i>
      </div>
      <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['sub_Comp_Info']['company_name']; ?></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->

    <!-- Nav Item - Create user Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span>ISO 27001 Requirement</span>
      </a>
      <div id="collapseusers" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Mandatory ISMS</h6>
          <div class="accordion" id="accordionExample">
            <?php
                                            for ($i = 0; $i < count($_SESSION['question']['iso']); $i++) {
            ?>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link main_heading" id="<?php echo $_SESSION['question']['iso'][$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
                      <?php echo ($_SESSION['question']['iso'][$i]['clause_section']) . ": " . $_SESSION['question']['iso'][$i]['title']; ?>
                    </button>
                  </h2>
                </div>
                <div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body subsection " style="padding:0px;">
                    <?php echo $main_content[$i]['title']; ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- <a class="btn btn-link btn-primary text-white offset-11" href="<?php echo base_url('Home/annex_view/') . $id ?>">Next</a> -->
            <input type="hidden" id="com_id" value="<?php echo $id ?>">
          </div>

        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-table"></i>
        <span>Annex A controls</span>
      </a>
      <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white collapse-inner rounded">
          <h6 class="collapse-header">Annex A controls</h6>
          <div class="accordion" id="AccordionExample">
            <?php

                                                                                                                                                                                                                                                                    $annex_data = $_SESSION['question']['annex'];
                                                                                                                                                                                                                                                                    for ($i = 0; $i < count($annex_data); $i++) {
            ?>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link main_heading" id="<?php echo $annex_data[$i]['clause_section']; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo ($i + 1); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($i + 1); ?>">
                      <?php echo ($annex_data[$i]['clause_section']) . ": " . $annex_data[$i]['title']; ?>
                    </button>
                  </h2>
                </div>
                <div id="collapse<?php echo ($i + 1); ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body subsection" style="padding:0px;">

                    <!-- new accordain-->
                    <!-- close -->
                    <?php echo $annex_data[$i]['title']; ?>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- <input type="hidden" name="comp_id" id="comp_id" value="<?php echo $_SESSION['sub_Comp_Info']['id'] ?>"> -->
            <!-- <a class="btn offset-11 btn-primary text-white btn-link" href="<?php echo base_url('Home/thank_you/') . $id ?>">save</a> -->
          </div>
        </div>
      </div>
    </li>

    <!--ACCESS MENUS FOR Process-->


    <!-- <?php elseif ($_SESSION['userInfo']['user_role'] === '0') : ?> -->
    <!-- <?php endif; ?> -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  </ul>
  <!-- End of Sidebar -->
  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav id="navbar" class="navbar navbar-expand navbar-dark text-white bg-dark topbar static-top shadow ">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0  navbar-search">
          <div class="input-group">
            <a href="<?php echo base_url('Home/admin') ?>"><img class="h-25" src="<?php echo base_url('assets/img/logoiso27001.png') ?>" alt="Logo"></a>
          </div>
        </form>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
          <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userInfo']['username'];; ?></span>
              <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png') ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <script>
        $(document).ready(function() {
          let company_responce = [];
          let c_id = $('#com_id').val();
          comp_id = {
            comp: c_id
          }

          $.ajax({
            type: "POST",
            url: baseUrl + "Home/company_responce",
            data: comp_id,
            success: function(comp_responce) {


              obj = JSON.parse(comp_responce)
              if (obj) {
                // console.log(obj)
                company_responce = obj;
              }
            },
            error: function() {
              console.log("error logind data")
            }
          });

          $('.main_heading').click(function() {
            let id = $(this).attr('id');
            //  let c_id = $('#com_id').val();
            let question = {
              qid: id
              //  comp_id: c_id
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

              let r = company_responce.find((item) => {
                let itemobj = JSON.parse(item.question_responce);
                let firstkey = Object.keys(itemobj)[0];
                firstkey = firstkey.replace(/_/g, '.');
                return firstkey.startsWith(obj[i]['sub_title_code'])

              })
              //console.log(r);
              let tickhtml = "";
              if (r) {
                tickhtml = `<i class="fa fa-check text-success" aria-hidden="true"></i>
`;
              }
              html += `<a href="<?php echo base_url('Home/question_view/') ?>${obj[i]['sub_title_code']}"  attr="${obj[i]['sub_title_code']}"><li class="btn-link anchr" ><span>${obj[i]['sub_title_code']}</span> ${obj[i]['sub_title']} ${tickhtml}</li>`
            }


            //  html += `<a href="<?php echo base_url('Home/question_view/') ?>${obj[i]['sub_title_code']}"  attr="${obj[i]['sub_title_code']}"><li class="btn-link anchr" ><span>${obj[i]['sub_title_code']}</span> ${obj[i]['sub_title']} </li>`

            html += `</ul>`
            $(".subsection").html(html)
          }
          $("#accordionExample").on('click', 'li', function() {
            let id = $(this).parent().attr('attr')
          });
        });
      </script>

      <?php if ($this->session->flashdata('msg') != "") { ?>
        <script>
          showAlert("<?php echo $this->session->flashdata('msg'); ?>", 'success');
        </script>
      <?php } ?>