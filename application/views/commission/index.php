<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-11">
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-1 m-b-xs" style="padding-left:0px; padding-top:17px">
                <a href="<?php echo base_url().'commission/add';?>" class="btn btn-success"><i class="icon-plus"></i> Create</a>
            </div>
        </div>
    </header>
    <section class="hbox stretch">
        <aside class="bg-white-only">
            <?php 
             if($this->session->flashdata('delete_fail')==true){
        ?>
        <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Update Failure!</strong>&nbsp;&nbsp;Sorry last delete operation was not successful.
        </div>
        <?php }//end success?>
            
            <section class="vbox">
                <div class="wrapper">
                    <section class="panel">
                        <div class="table-responsive">
                            <table class="table table-striped b-t text-sm">
                                <thead>
                                    <tr>
                                        <th class="th-sortable active" data-toggle="class">Name</th>
                                        <th class="th-sortable active" data-toggle="class">Insurer</th>
                                        <th class="th-sortable active" data-toggle="class">Coy Rate%</th>
                                        <th class="th-sortable active" data-toggle="class">Comm. Rate%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($_list as $row): ?>
                                    <tr id="tr<?php echo $row['com_sn'];?>">
                                        <td class="name"><?php echo $row['com_name'];?>
                                            <a href="<?php echo base_url().'commission/edit/'.$row['com_sn'];?>" title="Edit"><i class="icon-edit"></i></a>                                            
                                            <?php
                                            
                                            ?>
                                            <button class="del_modal btn btn-link btn-xs" data-toggle="modal" data-target="#myModal" 
                                                    value="<?php echo $row['com_sn'];?>" title="Delete"
                                                    ><i class="icon-trash"></i></button>
                                            
                                        </td>
                                        <td><?php echo $row['com_insure'];?></td>
                                        <td align="middle"><?php echo $row['com_coy_rate'];?></td>
                                        <td align="middle"><?php echo $row['com_rate'];?></td>
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
                                    <?php /*Show
                                    <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                                        <option value="10" selected="selected">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries per page*/?></div>
                                
                                <div class="col-sm-4 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing <?php echo $_pagi_msg;?> of <?php echo $_total_rows;?> items</small>
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">
                                    <?php 
                                    echo $this->pagination->create_links();
                                    /*
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#"><i class="icon-chevron-right"></i></a></li>
                                    </ul>
                                */?>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>
            </section>
        </aside>
    </section>
</section>
<!-- Modal -->
<div class="modal " id="remove_model" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <form method="POST" action="<?php echo base_url().'commission/delete';?>">
          
      
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title" id="myModalLabel">Delete Item</h4>
    </div>
    <div class="modal-body">                    
            <input type="hidden" id="del_com_sn" name="del_com_sn" value=""/>                        
            <h4>Are you sure to delete <strong><span id="com_name"></span></strong> item?</h4>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" id="delete_item_confirm" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
    </div>
      </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>require(['page/commission']);</script>