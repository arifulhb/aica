<?php 
/*
 * Customer Index page
 */
?>
<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-11">
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-1 m-b-xs" style="padding-left:0px; padding-top:17px">
                <a href="<?php echo base_url().'customer/add';?>" class="btn btn-success"><i class="icon-plus"></i> Create</a>
            </div>
        </div>
    </header>
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
                                        <th class="th-sortable active" data-toggle="class">Occupation</th>
                                        <th class="th-sortable active" data-toggle="class">Type</th>
                                        <th class="th-sortable active" data-toggle="class">License Pass Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $customers=$_cust_list;
                                    foreach($customers as $row):
                                        ?>
                                            <tr id="row_<?php echo $row['sn'];?>">
                                            <td><a href="<?php echo base_url().'customer/profile/'.$row['sn'];?>"><?php echo $row['name'];?></a>
                                                <a href="<?php echo base_url().'customer/edit/'.$row['sn'];?>"><i class="icon-edit"></i></a>
                                            </td>
                                                <td><?php echo $row['occupation'];?></td>
                                                <td><?php echo $row['type'];?></td>
                                                <td><?php echo date('d F, Y',$row['license_date']);?></td>
                                            </tr>
                                        <?php
                                    endforeach;
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
                                    </select> entries per page*/?>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo $_pagi_msg;?> of <?php echo $_total_rows;?> items</small>
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">
                                    <?php
                                    echo $this->pagination->create_links();
                                    /*
                                    ?>
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li><a href="#"><i class="icon-chevron-left"></i></a>.</li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#"><i class="icon-chevron-right"></i></a>.</li>
                                    </ul>
                                    <?php
                                    */
                                    ?>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>
            </section>
        </aside>
    </section>
</section>    