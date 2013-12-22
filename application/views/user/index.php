<?php
/**
 * User Management
 */
?>
<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-10">
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-2 text-right m-b-xs" style="padding-left:0px; padding-top:17px">
                <a href="<?php echo base_url().'user/add';?>" class="btn btn-success"><i class="icon-plus"></i> Create User</a>
            </div>
        </div>
    </header>
    <?php
//print_r($this->session->userdata('user_access'));
?>
    <section class="hbox stretch">
        <aside class="bg-white-only">
            <section class="vbox">
                <div class="wrapper">
                    <section class="panel">
                        <div class="table-responsive">
                            <table class="table table-striped b-t text-sm">
                                <thead>
                                    <tr>
                                        <th class="th-sortable active" data-toggle="class">Name</th>
                                        <th class="th-sortable active" data-toggle="class">Role</th>
                                        <th class="th-sortable active" data-toggle="class">Status</th>
                                        <th class="th-sortable active" data-toggle="class">Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($users as $user){ ?>
                                    <tr>
                                        <td><a href="#"><?php echo $user['user_name'];?></a>
                                            <a href="<?php echo base_url().'user/edit/'.$user['user_sn'];?>"
                                               title="Edit <?php echo $user['user_name'];?>"><i class="icon-edit"></i></a>
                                        </td>
                                        <td><div class="data-role" value="<?php echo $user['user_role'];?>">
                                            <input type="hidden" class="role_sn" value="<?php echo $user['user_role'];?>">
                                            <div class="role"></div>
                                            </div>
                                        </td>
                                        <td><?php echo ucfirst($user['user_status']);?></td>
                                        <td><?php echo date('d M y - h:i:s A',strtotime($user['last_login']));?></td>
                                    </tr>
                                        <?php
                                    }//end foreach
                                    ?>                                    
                                </tbody>
                            </table>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs" style="text-valign:center; margin-bottom:10px; margin-top:10px">
                                    <?php /*
                                    Show
                                    <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries per page */?> </div>
                                <div class="col-sm-4 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo $_pagi_msg;?> of <?php echo $_total_rows;?> items</small>
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">
                                    
                                    <?php 
                                    echo $this->pagination->create_links();
                                    /*
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li><a href="#"><i class="icon-chevron-left"></i></a>.</li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#"><i class="icon-chevron-right"></i></a>.</li>
                                    </ul> */?>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>
            </section>
        </aside>
    </section>
</section>
    <script>require(['page/user_index']);</script>