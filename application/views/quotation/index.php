<!--quotation/index-->

<section class="scrollable" id="pjax-container">
          <header>
			<div class="row b-b m-l-none m-r-none">
				<div class="col-sm-11">
					<h3 class="m-t m-b-none">Quotations</h3>
					<p class="block text-muted">List View of Quotations	</p>
				</div>
				<div class="col-sm-1 m-b-xs" style="padding-left:0px; padding-top:17px">
                                    <?php
                                    if(in_array('quotation_add', $this->session->userdata('user_access'))){
                                    ?>
                                    <a href="<?php echo base_url().'quotation/add';?>" class="btn btn-success"><i class="icon-plus"></i> Create</a>
                                    <?php }//end ?>
				</div>
            </div>
          </header>
          <section class="hbox stretch">
            <aside class="bg-white-only">
              <section class="vbox">
                <header class="header bg-white b-b clearfix">
				  <div class="row m-t-sm">
					<div class="col-sm-6 m-b-xs">
                      <div class="input-group">
                      <input type="text" class="input-sm form-control" placeholder="Customer Name or Car No."> 
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-white" type="button">
                          <span class="input-group-btn">Go!</span>
                        </button>
                      </span></div>
                    </div>
					<div class="col-sm-5 m-b-xs"></div>
					<div class="col-sm-1 m-b-xs " style="padding-left:40px;">
						<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-info">
						<i class="icon-caret-right text icon-large "></i>
						<i class="icon-caret-left text-active icon-large"></i>
						</a>
					</div>
                  </div>
                </header>
                <div class="wrapper">
                  <section class="panel">
                    <div class="table-responsive">
                      <table class="table table-striped b-t text-sm">
                        <thead>
                          <tr>
                            <th class="th-sortable active" data-toggle="class">Date</th>
                            <th class="th-sortable active" data-toggle="class">Ref. No.</th>
                            <th class="th-sortable active" data-toggle="class">Name</th>
                            <th class="th-sortable active" data-toggle="class">Reg. No.</th>
                            <th class="th-sortable active" data-toggle="class">Reg. Date</th>
                            <th class="th-sortable active" data-toggle="class">Insurer</th>
                            <th class="th-sortable active" data-toggle="class">Policy No.</th>
                            <th class="th-sortable active" data-toggle="class">Start Date</th>
                            <th class="th-sortable active" data-toggle="class">POI End</th>
                            <th class="th-sortable active" data-toggle="class">Premium</th>
                            <th class="th-sortable active" data-toggle="class">Consultant</th>
                            <th class="th-sortable active" data-toggle="class">Agent</th>
                            <th class="th-sortable active" data-toggle="class">State</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($_list as $row):?>
                              
                            <tr>
                            <td><?php echo date('d M y',$row['qt_date']);?></td>
                            <td>
                            <b>
                                <a href="<?php echo base_url().'quotation/view/'.$row['qt_ref_no'];?>" style="color:#13608b;">QT<?php echo $row['qt_ref_no'];?></a>
                            </b> 
                            <a href="<?php echo base_url().'quotation/edit/'.$row['qt_ref_no'];?>"><i class="icon-edit"></i></a></td>
                            <td><?php echo $row['cust_name'];?></td>
                            <td align="middle"><?php echo $row['reg_no'];?></td>
                            <td align="middle"><?php echo date('d M y',$row['regn_date']);?></td>
                            <td align="middle"><?php echo $row['ci_company'];?></td>
                            <td align="middle"><?php echo $row['ci_policy_no'];?></td>
                            <td align="middle"><?php echo date('d M y',$row['start_date']);?></td>
                            <td align="middle"><?php echo date('d M y',$row['end_date']);?></td>
                            <td align="middle"><?php echo $row['premium'];?></td>
                            <td><?php echo $row['consultant_name'];?></td>
                            <td><?php echo $row['agent_name'];?></td>
                            <td><?php echo $row['qt_state'];?></td>
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
                            /* Paginatin
                             * 
                          <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li>
                            	<a href="prospect.html"><i class="icon-chevron-left"></i>.</a>
                            </li>
                            <li>
                              <a href="prospect.html">1</a>
                            </li>
                            <li>
                              <a href="prospect.html">2</a>
                            </li>
                            <li>
                              <a href="prospect.html">3</a>
                            </li>
                            <li>
                              <a href="prospect.html">4</a>
                            </li>
                            <li>
                              <a href="prospect.html">5</a>
                            </li>
                            <li>
                              <a href="prospect.html">.<i class="icon-chevron-right"></i></a>
                            </li>
                          </ul>
                            */?>
                        </div>
                      </div>
                    </footer>
                  </section>
                </div>
              </section>
            </aside>
			<aside class="aside bg-white b-r" id="subNav">
              <div class="wrapper b-b font-bold">Filters</div>
              
			  <form class="form-horizontal" method="get">
                <div class="form-group">
                    <label class="col-sm-6 control-label" for="input-id-1">Date from:</label>
					<div class="col-md-10">
						<input class="input-sm datepicker-input form-control" size="16" type="text" value="12-02-2013" data-date-format="dd-mm-yyyy">
					</div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                    <label class="col-sm-5 control-label" for="input-id-1">Date To:</label>
					<div class="col-md-10">
						<input class="input-sm datepicker-input form-control" size="16" type="text" value="12-02-2013" data-date-format="dd-mm-yyyy">
					</div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                    <label class="col-sm-3 control-label" for="input-id-1">Insurer</label><br><br>
					<div class="col-md-10">
						<select name="account" class="form-control m-b">
							<option>Insurer A</option>
							<option>Insurer B</option>
							<option>Insurer C</option>
						</select>
                      </div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                    <label class="col-sm-3 control-label" for="input-id-1">Status</label><br><br>
					<div class="col-md-10">
						<select name="account" class="form-control m-b">
							<option>Draft</option>
							<option>New</option>
							<option>Renewal</option>
							<option>Quoted</option>
							<option>Accepted</option>
							<option>Paid</option>
							<option>Closed</option>
						</select>
                      </div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                    <label class="col-sm-3 control-label" for="input-id-1">Consultant</label><br><br>
					<div class="col-md-10">
						<select name="account" class="form-control m-b">
							<option>Consultant A</option>
							<option>Consultant B</option>
							<option>Consultant C</option>
						</select>
                      </div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                    <label class="col-sm-3 control-label" for="input-id-1">Agent</label><br><br>
					<div class="col-md-10">
						<select name="account" class="form-control m-b">
							<option>Agent A</option>
							<option>Agent B</option>
							<option>Agent C</option>
						</select>
                      </div>
                </div>
				<div class="line line-dashed line-lg pull-in"></div>
				<div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                      </div>
                    </div>
			  </form>
            </aside>
		  </section>
        </section>
<script>require(['page/quotation_index']);</script>