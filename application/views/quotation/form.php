<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-11">                
                <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
        </div>
    </header>
    <section class="wrapper">
        <!-- Quotation Details -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Quotation Details</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Ref. No.</label>
                            <label class="col-md-6 " style="padding-top: 7px;" for="input-id-1">QT11</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Date</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  for="input-id-1">06 May 14</label>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Renewal</label>
                            <label class="col-md-6 " style="padding-top: 7px;"  for="input-id-1">No</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">State</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Draft</option>
                                    <option>New</option>
                                    <option>Renewal</option>
                                    <option>Quoted</option>
                                    <option>Sent</option>
                                    <option>Accepted</option>
                                    <option>Lost</option>
                                    <option>Paid</option>
                                    <option>Closed</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="qt_insurance_type_pvt">Insurance Type</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_insurance_type" id="qt_insurance_type_pvt" 
                                                   value="private" checked="">Private</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="qt_insurance_type" id="qt_insurance_type_com" 
                                                   value="commercial" checked="">Commercial</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reasons Lost</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Car Sold</option>
                                    <option>Car Deregistered</option>
                                    <option>Switched-Out</option>
                                    <option>- Direct Insurer</option>
                                    <option>- Competitive Pricing</option>
                                    <option>- Scheme Price</option>
                                    <option>- Staff Price</option>
                                    <option>- Support Relatives/Friends</option>
                                    <option>Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Quotation History</label>
                            <div class="col-md-6">Created by User A on 01 Jan 01 <br> Edited by User B on 02 Jan 01</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Remarks</label>
                            <div class="col-md-6">
                                <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true">Multiline txt</div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        <!-- Assignees Details -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Assignees</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Consultant</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Consultant A</option>
                                    <option>Consultant B</option>
                                    <option>Consultant C</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">External Agent</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>None</option>

                                    <option>Agent A</option>

                                    <option>Agent B</option>

                                </select>

                            </div>

                        </div>

                    </div>	  
                </form>
            </section>
        </section>
        <!-- Customer Details -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Customer Details
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Insured Name</label>
                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>Customer A</option>
                                    <option>Customer B</option>
                                    <option>Customer C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">NRIC/FIN/ACRA</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>S1234567B</option>
                                    <option>S1234568C</option>
                                    <option>S1234569D</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Insured Driving</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Date of Birth</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="Datepicker"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Age</label>

                            <div class="col-md-6">

                                <label class="col-sm-3 control-label" for="input-id-1">(calculated)</label>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Gender</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>Male</option>
                                    <option>Female</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Marital Status</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>Single</option>

                                    <option>Married</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Contact (H)</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Contact (O)</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Contact (hp)</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Fax </label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">E-mail</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="email"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Address Line 1</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Address Line 2</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Postal Code</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Occupation / Nature of Business</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Driving License Pass Date</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="Datepicker"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Driving Experience</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="equation"/>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Instructions</label>

                            <div class="col-md-6">

                                <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                     contenteditable="true">Multiline txt</div>

                            </div>

                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>

        <!-- Private Vehicle & Commercial Vehicle Details -->
        <!-- Private -->
        <section class="panel" id="panel_vehicle_info_pvt">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Vehicle Information (Private)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Number</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>ABC1234A</option>

                                    <option>BCD2345B</option>

                                    <option>CDE3456C</option>

                                </select>

                            </div>

                        </div>

                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Make</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Model</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Scheme Type</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>Normal</option>

                                    <option>Off-peak</option>

                                    <option>Company</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">CC</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="Number"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Year of Manufacture</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="Number"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Regn. Date</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="Datepicker"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Road Tax Expiry Date</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="Datepicker"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1"></label>

                        <div class="col-sm-4">

                            <label class="control-label" for="input-id-1">Additional Features</label>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">sunroof</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">soft-top</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">turbo engine</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">moonroof</label>

                            </div>								

                            <div class="checkbox">

                                <label><input type="checkbox" value="">skyroof</label>

                            </div>								

                            <div class="checkbox">

                                <label><input type="checkbox" value="">roof panoramic</label>

                            </div>								

                        </div>

                        <div class="col-sm-4">

                            <label class="control-label" for="input-id-1">Vehicle Type</label>							

                            <div class="checkbox">

                                <label><input type="checkbox" value="">sport model</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">MPV</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">SUV</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">Sedan</label>

                            </div>								

                            <div class="checkbox">

                                <label><input type="checkbox" value="">Coupe</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">Cabriolet</label>

                            </div>

                            <div class="checkbox">

                                <label><input type="checkbox" value="">Parallel Import</label>

                            </div>								

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Additional Accesories/Coverage</label>

                        <div class="col-sm-7">

                            <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                 contenteditable="true"></div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        
        <!-- Commercial -->
        <section class="panel" id="panel_vehicle_info_com">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Vehicle Information (Commercial)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Number</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>ABC1234A</option>

                                    <option>BCD2345B</option>

                                    <option>CDE3456C</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Make</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Model</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Type</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">
                                    <option>Hood/Canopy</option>
                                    <option>Std Lorry</option>
                                    <option>Std Van</option>
                                    <option>Refrigerated Van</option>
                                    <option>Crane/Tailgate</option>
                                    <option>Garbage Truck</option>
                                    <option>Mixer</option>
                                    <option>Prime Mover</option>
                                    <option>Tipper</option>
                                    <option>Tanker</option>
                                    <option>Ambulance</option>
                                    <option>Tow Truck</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">CC</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="number"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Unladen Weight</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="number"/>

                            </div>

                        </div>

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Laden Weight</label>

                            <div class="col-md-6">

                                <input type="text" class="form-control" id="input-id-1" placeholder="number"/>

                            </div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Tonnage</label>

                            <label class="col-sm-3 control-label" for="input-id-1">[Equation]</label>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Year of Manufacture</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="txt"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Regn. Date</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="datepicker"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Road Tax Expiry Date</label>

                        <div class="col-md-7">

                            <input type="text" class="form-control" id="input-id-1" placeholder="datepicker"/>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label" for="input-id-1">Additional Accesories/Coverage</label>

                        <div class="col-sm-7">

                            <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px"
                                 contenteditable="true">multiline text</div>

                        </div>

                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        
        <!-- Insurance Details -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Current Insurance Details</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Current Company</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>AIG</option>
                                    <option>AXA</option>
                                    <option>China Taiping</option>
                                    <option>Liberty</option>
                                    <option>MSIG</option>
                                    <option>NTUC Income</option>
                                    <option>———</option>
                                    <option>ACE</option>
                                    <option>Aetna</option>
                                    <option>Allianz Global</option>
                                    <option>Allied World Assurance</option>
                                    <option>Aviva</option>
                                    <option>Cigna Europe</option>
                                    <option>Direct Asia</option>
                                    <option>ECICS</option>
                                    <option>EQ</option>
                                    <option>Etiqa</option>
                                    <option>Federal</option>
                                    <option>First Capital</option>
                                    <option>HDI-Gerling Industrie Versicherung</option>
                                    <option>HL Assurance</option>
                                    <option>India International</option>
                                    <option>InterGlobal</option>
                                    <option>Liberty</option>
                                    <option>Lloyds of London</option>
                                    <option>Lonpac</option>
                                    <option>Nipponkoa</option>
                                    <option>Overseas Assurance</option>
                                    <option>QBE</option>
                                    <option>Raffle Health</option>
                                    <option>Royah & Sun Alliance</option>
                                    <option>Singapore Aviation</option>
                                    <option>SHC</option>
                                    <option>Starr International</option>
                                    <option>Tenet Sompo</option>
                                    <option>Tokio Marine</option>
                                    <option>United Overseas</option>
                                    <option>XL</option>
                                    <option>Zurich</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Comprehensive</option>
                                    <option>TPFT</option>
                                    <option>TPO</option>							
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Current Premium</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Current Excess</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Finance Company</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Current NCD</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="percentage">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">

                                    <option>0</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>40</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD affected on Change</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>


                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">SDD</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">SDD Date Check</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        <!-- Insurance Period -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Current Insurance Period</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Start Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">POI End Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Road Tax Due</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Unknown</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims in last 3 years</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>

                </form>
            </section>
        </section>
        <!-- Claim History 1 & 2 -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Claim History (1)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driver Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Vehicle No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Accident Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (OD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Windscreen</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Only</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Private Settlement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Referred to Partner Workshop</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        <?php /*
         * Claim History 
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Claim History (2)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driver Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Vehicle No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Accident Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Date</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (OD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Paid (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>	
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPPD)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Claims Reserved (TPBI)</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Windscreen</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Reporting Only</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Private Settlement</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Referred to Partner Workshop</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        */?>
        <!-- Named Driver 1 & 2 -->

        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Named Driver (1)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NRIC/FIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Relationship</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Date of Birth</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Age</label>
                            <div class="col-md-6">
                                <label class="col-sm-3 control-label" for="input-id-1">[Equation]</label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Gender</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Marital Status</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Occupation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving License Pass Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving Experience</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="Equation">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-3 control-label" for="input-id-1">Claim History (3 Years)</label>
                            <div class="col-sm-7">
                                <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true">Multiline Text</div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </section>
        
        <?php /*
         * Named Driver 2
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Named Driver (2)</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NRIC/FIN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Relationship</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Date of Birth</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Age</label>
                            <div class="col-md-6">
                                <label class="col-sm-3 control-label" for="input-id-1">[Equation]</label>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Gender</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Marital Status</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Single</option>
                                    <option>Married</option>
                                </select>
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Occupation</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving License Pass Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Driving Experience</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="Equation">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="col-sm-3 control-label" for="input-id-1">Claim History (3 Years)</label>
                            <div class="col-sm-7">
                                <div id="editor" class="form-control" style="overflow:scroll;height:150px;max-height:150px" contenteditable="true">Multiline Text</div>
                            </div>
                        </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                <a href="prospect.html" class="btn btn-primary"> Save</a>
                            </div>
                        </div>
                    </div>

                </form>
            </section>
        </section>
        */?>
        
        <!-- Quotation (Private and Commercial) -->
        <!-- Private -->
        <section class="panel" id="panel_quot_pvt">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Quotation (Private)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                </form>
            </section>
        </section>
        <!-- Commercial -->
        <section class="panel" id="panel_quot_com">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">

                            <i class="icon-caret-down text-active"></i>

                            <i class="icon-caret-up text"></i>

                        </a>
                    </li>
                </ul>Quotation (Commercial)
            </header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">

                </form>
            </section>
        </section>
        <!-- Selected Insurance Detail -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Selected Insurance</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Company</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>AIG</option>
                                    <option>AXA</option>
                                    <option>China Taiping</option>
                                    <option>Liberty</option>
                                    <option>MSIG</option>
                                    <option>NTUC Income</option>
                                    <option>———</option>
                                    <option>ACE</option>
                                    <option>Aetna</option>
                                    <option>Allianz Global</option>
                                    <option>Allied World Assurance</option>
                                    <option>Aviva</option>
                                    <option>Cigna Europe</option>
                                    <option>Direct Asia</option>
                                    <option>ECICS</option>
                                    <option>EQ</option>
                                    <option>Etiqa</option>
                                    <option>Federal</option>
                                    <option>First Capital</option>
                                    <option>HDI-Gerling Industrie Versicherung</option>
                                    <option>HL Assurance</option>
                                    <option>India International</option>
                                    <option>InterGlobal</option>
                                    <option>Liberty</option>
                                    <option>Lloyds of London</option>
                                    <option>Lonpac</option>
                                    <option>Nipponkoa</option>
                                    <option>Overseas Assurance</option>
                                    <option>QBE</option>
                                    <option>Raffle Health</option>
                                    <option>Royah & Sun Alliance</option>
                                    <option>Singapore Aviation</option>
                                    <option>SHC</option>
                                    <option>Starr International</option>
                                    <option>Tenet Sompo</option>
                                    <option>Tokio Marine</option>
                                    <option>United Overseas</option>
                                    <option>XL</option>
                                    <option>Zurich</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Type of Coverage</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Comprehensive</option>
                                    <option>TPFT</option>
                                    <option>TPO</option>						
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Premium</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Excess</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Finance Company</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="txt">
                            </div>
                        </div>
                    </div>  
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD % on Renewal</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="number">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">SDD</label>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">SDD Date Check</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Start Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">End Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>				  
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">Road Tax Due</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="input-id-1" placeholder="datepicker">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-3 control-label" for="input-id-1">NCD Protection</label>
                            <div class="col-md-6">
                                <select name="account" class="form-control m-b">
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                            <div class="col-sm-10"></div>
                            <div class="col-sm-2">
                                <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                                    <a href="prospect.html" class="btn btn-primary"> Save</a>
                                </div>
                            </div>
                        </div>
                    </div>	
                </form>
            </section>
        </section>
        <!-- Account Assessment -->
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul>Account Assessment</header>
            <section class="panel-body">
                <form class="form-horizontal" method="get">
                    <div class="form-group">
                        <div class="col-sm-6">

                            <label class="col-sm-3 control-label" for="input-id-1">Commission</label>

                            <div class="col-md-6">

                                <select name="account" class="form-control m-b">

                                    <option>Plan A (5%)</option>

                                    <option>Plan B (7.5%)</option>

                                    <option>Plan C (10%)</option>

                                </select>

                            </div>

                        </div>				  
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                </form>
            </section>
        </section>
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">

                <div class="col-sm-3 m-b-xs" style="padding-left:0px;">
                    <a href="prospect.html" class="btn btn-primary"> Save</a>
                </div>
                <div class="col-sm-1 m-b-xs" style="padding-left:0px;">
                    <a href="prospect.html" class="btn btn-white"> Cancel</a>
                </div>

            </div>
        </div>
    </section>
</section>
<script>require(['page/quotation_add']);</script>