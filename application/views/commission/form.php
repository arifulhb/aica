<section class="scrollable" id="pjax-container">
    <header>
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-10">
                 <h3 class="m-t m-b-none"><?php echo $_page_caption;?></h3>
                <p class="block text-muted"><?php echo $_page_description;?></p>
            </div>
            <div class="col-sm-2 m-b-xs text-right" style="padding-left:0px; padding-top:17px">
                <a href="<?php echo base_url().'commission/add';?>" class="btn btn-success"><i class="icon-plus"></i> Create New</a>
            </div>
        </div>
    </header>
    <?php
    if(isset($_record)){
        $_name=$_record[0]['com_name'];
        $_insurer=$_record[0]['com_insure'];
        $_coy_rate=$_record[0]['com_coy_rate'];
        $_com_rate=$_record[0]['com_rate'];
    }else{
        $_name='';
        $_insurer='';
        $_coy_rate='';
        $_com_rate='';
    }
    ?>
    <div class="wrapper">
        <form action="<?php echo base_url().'commission/save'?>" method="POST">
        <input type="hidden" name="_action" id="_action" value="<?php echo $_action?>">
        <?php
        if($_action=='update'){ ?>
        <input type="hidden" name="_com_sn" id="_com_sn" value="<?php echo $_com_sn?>">
            <?php
        }//end if
        if($this->session->flashdata('success')==true){
        ?>
        <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Update Success Message!</strong>&nbsp;&nbsp;Commission Record updated successfully.
        </div>
        <?php }//end success?>
        
        <section class="panel">
            <header class="panel-heading font-bold">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted">
                            <i class="icon-caret-down text-active"></i>
                            <i class="icon-caret-up text"></i>
                        </a>
                    </li>
                </ul><?php echo $_action=='add'?'Create New Plan':'Edit Plan';?>
            </header>
            <section class="panel-body">
                <?php
                //print_r($_record);
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="col-sm-3 control-label" for="c_name">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="c_name" name="c_name"
                                   value="<?php echo $_name;?>" required maxlength="50">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-3 control-label" for="c_insurer">Insurer</label>
                        <div class="col-md-6">
                            <select id="c_insurer" name="c_insurer" required="" class="form-control m-b">
                                    <optgroup>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?> >AIG</option>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>AXA</option>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>China Taiping</option>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>Liberty</option>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>MSIG</option>
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>NTUC Income</option>
                                    </optgroup>
                                    <optgroup label="-----------------">                                   
                                    <option <?php echo $_insurer=='AIG'?'SELECTED':'';?>>ACE</option>
                                    <option <?php echo $_insurer=='Aetna'?'SELECTED':'';?>>Aetna</option>
                                    <option <?php echo $_insurer=='Allianz Global'?'SELECTED':'';?>>Allianz Global</option>
                                    <option <?php echo $_insurer=='Allied World Assurance'?'SELECTED':'';?> >Allied World Assurance</option>
                                    <option <?php echo $_insurer=='Aviva'?'SELECTED':'';?> >Aviva</option>
                                    <option <?php echo $_insurer=='Cigna Europe'?'SELECTED':'';?> >Cigna Europe</option>
                                    <option <?php echo $_insurer=='Direct Asia'?'SELECTED':'';?> >Direct Asia</option>
                                    <option <?php echo $_insurer=='ECICS'?'SELECTED':'';?> >ECICS</option>
                                    <option <?php echo $_insurer=='EQ'?'SELECTED':'';?> >EQ</option>
                                    <option <?php echo $_insurer=='Etiqa'?'SELECTED':'';?> >Etiqa</option>
                                    <option <?php echo $_insurer=='Federal'?'SELECTED':'';?> >Federal</option>
                                    <option <?php echo $_insurer=='First Capital'?'SELECTED':'';?> >First Capital</option>
                                    <option <?php echo $_insurer=='HDI-Gerling Industrie Versicherung'?'SELECTED':'';?> >HDI-Gerling Industrie Versicherung</option>
                                    <option <?php echo $_insurer=='HL Assurance'?'SELECTED':'';?> >HL Assurance</option>
                                    <option <?php echo $_insurer=='India International'?'SELECTED':'';?> >India International</option>
                                    <option <?php echo $_insurer=='InterGlobal'?'SELECTED':'';?> >InterGlobal</option>
                                    <option <?php echo $_insurer=='Liberty'?'SELECTED':'';?> >Liberty</option>
                                    <option <?php echo $_insurer=='Lloyds of London'?'SELECTED':'';?> >Lloyds of London</option>
                                    <option <?php echo $_insurer=='Lonpac'?'SELECTED':'';?> >Lonpac</option>
                                    <option <?php echo $_insurer=='Nipponkoa'?'SELECTED':'';?> >Nipponkoa</option>
                                    <option <?php echo $_insurer=='Overseas Assurance'?'SELECTED':'';?> >Overseas Assurance</option>
                                    <option <?php echo $_insurer=='QBE'?'SELECTED':'';?> >QBE</option>
                                    <option <?php echo $_insurer=='Raffle Health'?'SELECTED':'';?> >Raffle Health</option>
                                    <option <?php echo $_insurer=='Royah &amp; Sun Alliance'?'SELECTED':'';?> >Royah &amp; Sun Alliance</option>
                                    <option <?php echo $_insurer=='Singapore Aviation'?'SELECTED':'';?> >Singapore Aviation</option>
                                    <option <?php echo $_insurer=='SHC'?'SELECTED':'';?> >SHC</option>
                                    <option <?php echo $_insurer=='Starr International'?'SELECTED':'';?> >Starr International</option>
                                    <option <?php echo $_insurer=='Tenet Sompo'?'SELECTED':'';?> >Tenet Sompo</option>
                                    <option <?php echo $_insurer=='Tokio Marine'?'SELECTED':'';?> >Tokio Marine</option>
                                    <option <?php echo $_insurer=='United Overseas'?'SELECTED':'';?> >United Overseas</option>
                                    <option <?php echo $_insurer=='XL'?'SELECTED':'';?> >XL</option>
                                    <option <?php echo $_insurer=='Zurich'?'SELECTED':'';?> >Zurich</option>
                                    </optgroup>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="col-sm-3 control-label" for="c_coy_rate">Coy Rate%</label>
                        <div class="col-md-6"><input type="number" id="c_coy_rate" name="c_coy_rate" max="100" min="0" step="any"
                                                required value="<?php echo $_coy_rate;?>"   class="form-control"></div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-sm-3 control-label" for="c_com_rate">Comm Rate%</label>
                        <div class="col-md-6"><input type="number" id="c_com_rate" name="c_com_rate" value="<?php echo $_com_rate;?>" 
                                               min="0" step="any"   required  max="100" class="form-control"></div>
                    </div>
                </div>
            </section>
        </section>
        <!-- Submit & Cancel Buttons -->
        <div class="col-sm-6">

            <div class="col-sm-3"></div>
            <div class="col-md-6">

                <div class="col-sm-3 m-b-xs" style="padding-left:0px;">                    
                    <button type="submit" class="btn btn-primary" > Save</button>
                </div>
                <div class="col-sm-1 m-b-xs" style="padding-left:0px;">
                    <a href="<?php echo base_url().'commission';?>" class="btn btn-white"> Cancel</a>
                </div>

            </div>
        </div>
    </form>
    </div>

</section>