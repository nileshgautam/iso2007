<div class="container mt-30">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row m-0 p-0">
                <h6 class="m-0 font-weight-bold text-primary col-sm-11">Company List</h6>
            </div>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable21" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Name</th>
                            <th class="">Email</th>
                            <th class="">Audit Staus</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="company_list">
                        <?php
                        if (!empty($company_list)) {

                            for ($i = 0; $i < count($company_list); $i++) {
                                ?>
                                <tr>
                                    <td class="as-44"><?php echo $i + 1 ?></td>
                                    <td class=""><a href="<?php echo base_url('Home/comp_dashboard/'.$company_list[$i]['id'])?>"><?php echo $company_list[$i]['company_name'] ?></td>
                                    <td class=""><?php echo $company_list[$i]['email'] ?></td>
                                    <td class="">Status</td>
                                    <td class="as-44">
                                        <a href="<?php echo base_url('Home/audit_view/') . $company_list[$i]['id']; ?>"> <i class="fa fa-power-off" aria-hidden="true" title="Start Audit"></i></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>