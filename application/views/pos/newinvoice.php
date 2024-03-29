<style>
    .indigo.p-1{
        border: 1px solid black;
        background: #d0efe5;
        margin-bottom: 10px;
        width: 100%;
        padding: 10px 10px 38px 10px!important;
        list-style-type: none;
        margin-top: 15px;
    }
    .indigo.p-1 > a,
    .indigo.p-2 > a{
        color: black;
    }
    .indigo.p-2 {
        border: 1px solid black;
        background: #ffbcc6;
        margin-bottom: 10px;
        width: 100%;
        padding: 10px!important;
        list-style-type: none;
        margin-top: 15px;
    }
    .alertclass{
        padding: 4px;
        font-size: 13px;
        font-weight: 900;
        background-color: #22c2dc !important;
        color: white !important;
    }

    .alertclassinfo{
        padding: 4px;
        font-size: 13px;
        font-weight: 900;
        background-color: #2196f3 !important;
        border-color: #2196f3 !important;
        color: white !important;
    }

    .alertclassprimary{
        padding: 4px;
        font-size: 13px;
        font-weight: 900;
        background-color: #b360c4 !important;
        border-color: #b360c4 !important;
        color: white !important;
        float:left;
    }
    .alertclassprimaryserved{
        padding: 4px;
        font-size: 13px;
        font-weight: 900;
        background-color: #359393 !important;
        border-color: #359393 !important;
        color: white !important;
        float:left;
    }

    .alertclassprimaryserved_color{
        background-color: #16d39a !important;
        border-color: #16d39a !important;
    }
    .alertclassdanger{
        padding: 4px;
        font-size: 13px;
        font-weight: 900;
    }
    .vr {
        border-left: 2px solid #2591c8;
        height: auto;
        margin: 0px -2px 0px -1px;
    }
</style>


<form method="post" id="data_form" class="content-body">
    <div class="sidebar-left sidebar-fixed bg-white">
        <div class="sidebar">
            <div class="sidebar-content ">
                <div class="card-body chat-fixed-search">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ft-search"></i></span>
                        </div>
                        <input type="text" class="form-control" id="pos-customer-box"
                               placeholder="<?php echo $this->lang->line('Enter Customer Name'); ?>"
                               aria-describedby="button-addon2">
                        <div class="input-group-append" id="button-addon2">
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#Pos_addCustomer"> <?php echo $this->lang->line('Add') ?></button>
                        </div>
                    </div>
                    <div id="customer-box-result" class="col-md-12"></div>
                    <div id="customer" class="col-md-12 ml-3" style="margin-bottom: -40px;">
                        <div class="clientinfo">
                            <input type="hidden" name="customer_id" id="customer_id" value="1">
                            <div id="customer_name"><?php echo $this->lang->line('Default'); ?>: <strong>Walk
                                In </strong>
                            </div>
                            <!-- <div style="text-align:right;padding-right: 25px; padding-bottom: 20px;" id="customer_name"> Wholesale Price &nbsp;
                                <input type="checkbox" aria-label="Enable Whole Sale" value="1" id="wholesale_only" style="width: 15px !important; margin-top: -4px;">
                            </div> -->
                        </div>


                    </div>

                    

                </div>
                <div>
                    <div class="users-list-padding media-list">
                        <br>
                        <div class="row">
                            <div class="offset-1 col-10">
                                <div class="input-group" style="margin-bottom: 5px;">
                                    <input class="order_type_radio" type="radio" aria-label="Enable Dine-In Order" value="dine" id="order_type" name="order_type" style="margin-left: 17px;"> &nbsp; <span style="margin-right: 100px;">Dine-in</span> &nbsp;&nbsp;&nbsp;
                                    <input class="order_type_radio" type="radio" aria-label="Enable Online Order" value="online" id="order_type_online" name="order_type"> &nbsp;<span style="margin-right: 100px;">Online Order</span> &nbsp;&nbsp;&nbsp;
                                    <input class="order_type_radio" type="radio" aria-label="Enable Delivery Order" value="delivery" id="order_type_del" name="order_type"> &nbsp;<span> Delivery </span> &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="input-group">
                                    <select class="form-control" id="table_id" name="table_id" style="display:none;">
                                        <option value="">-- Select Table --</option>
                                        <?php if($tables){ foreach($tables as $key=>$table){ if(!existsKeyValue($busy_tables, 'table_id', $table['id'])){ ?>
                                            <option value="<?php echo $table['id'] ?>"><?php echo $table['floor_num'] .'&nbsp;&nbsp;-&nbsp;&nbsp;'.$table['table_no'] ?></option>
                                        <?php } } }  ?>
                                    </select>

                                    <select class="form-control" id="online_id" name="online_id" style="display:none;">
                                        <option value="">-- Select Online Order App --</option>
                                        <?php if($online_order_app){ foreach($online_order_app as $key=>$online_order){ ?>
                                            <option value="<?php echo $online_order['id'] ?>"><?php echo $online_order['name'] ?></option>
                                        <?php }  }  ?>
                                    </select>
                                    <input type="hidden" value="0" name="delivery_id" id="delivery_id">
                                </div>
                            </div>
                            <!-- <div class="col-5">
                                <div class="input-group">
                                    <select class="form-control required" id="kitchen_id" name="kitchen_id">
                                        <option value="">-- Select Kitchen --</option>
                                        <?php if($kitchens){ foreach($kitchens as $key=>$kitchen){ ?>
                                            <option value="<?php echo $kitchen['id'] ?>"><?php echo $kitchen['kitchen_name'] ?></option>
                                        <?php } } ?>
                                    </select> 
                                </div>
                            </div> -->
                        </div>
                        <br>
                        <div class="row bg-gradient-directional-purple white m-0 pt-1 pb-1">
                            <div class="col-4 ">
                                <i class="fa fa-briefcase"></i>
                                <?php echo $this->lang->line('Products') ?></th>
                            </div>
                            <div class="col-2">
                                <i class="fa fa-money"></i><?php echo $this->lang->line('Price') ?>
                            </div>
                            <div class="col-3">
                                <i class="fa fa-money"></i><?php echo $this->lang->line('Wholesale Price') ?>
                            </div>
                            <div class="col-3">
                                <i
                                        class="fa fa-shopping-bag"></i> <?php echo $this->lang->line('Total') ?>
                            </div>
                        </div>
                        <div id="saman-pos2">
                            <div id="pos_items"></div>
                        </div>
                        <input type="hidden" name="total" class="form-control"
                               id="invoiceyoghtml" readonly="">
                        <hr class="mt-1">
                        <div class="row m-2">
                            <div class="col-3">
                                <strong> <?php echo $this->lang->line('Shipping') ?></strong>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control form-control-sm shipVal"
                                       onkeypress="return isNumber(event)"
                                       placeholder="Value"
                                       name="shipping" autocomplete="off"
                                       onkeyup="billUpyog()">
                            </div>
                            <div class="col-3">
                                ( <?php echo $this->lang->line('Tax') ?> <?= $this->config->item('currency'); ?>
                                <span id="ship_final">0</span> )
                            </div>
                        </div>


                        <div class="row m-2">
                            <div class="col-3">
                                <strong> <?php echo $this->lang->line('Total Tax') ?></strong>
                            </div>
                            <div class="col-3"><?php echo currency($this->aauth->get_user()->loc);
                                ?>
                                <span id="taxr" class="mr-1">0</span>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-3">
                                <strong> <?php echo $this->lang->line('Total Discount') ?></strong>
                            </div>
                            <div class="col-9"><?php echo currency($this->aauth->get_user()->loc);
                                ?>
                                <span id="discs"
                                      class="lightMode mr-1">0</span>
                                <small>(<?php echo $this->lang->line('Products') ?>)</small>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-3">
                                <strong> <?php echo $this->lang->line('Grand Total') ?></strong>
                            </div>
                            <div class="col-9"><?php echo currency($this->aauth->get_user()->loc);
                                ?>
                                <span class="font-medium-1 blue text-bold-600"
                                      id="bigtotal">0.00</span>
                            </div>
                        </div>
                        <div class="row m-2">
                            <div class="col-3">
                                <strong> <?php echo $this->lang->line('Extra') . ' ' . $this->lang->line('Discount') ?></strong>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control form-control-sm discVal"
                                       onkeypress="return isNumber(event)"
                                       placeholder="Value" value="0"
                                       name="disc_val" autocomplete="off"
                                       onkeyup="billUpyog()">
                                <input type="hidden"
                                       name="after_disc" id="after_disc" value="0">
                            </div>
                            <div class="col-3">
                                ( <?= $this->config->item('currency'); ?>
                                <span id="disc_final">0</span> )
                            </div>
                        </div>

                        <hr>
                        <?php if ($emp['key1']) { ?>
                            <div class="col">
                                <div class="form-group form-group-sm text-g">
                                    <label for="employee"><?php echo $this->lang->line('Employee') ?></label>

                                    <select id="employee" name="employee" class="form-control form-control-sm">
                                        <?php
                                        foreach ($employee as $row) {
                                            $cid = $row['id'];
                                            $title = $row['name'];
                                            echo "<option value='$cid'>$title</option>";
                                        }
                                        ?>
                                    </select></div>
                            </div>
                        <?php } ?>
                        <div class="m-1">

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary  mr-1 mb-1" id="base-tab1" data-toggle="tab"
                                       aria-controls="tab1" href="#tab1" role="tab" aria-selected="false"><i
                                                class="fa fa-trophy"></i>
                                        <?php echo $this->lang->line('Coupon') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-secondary mr-1 mb-1" id="base-tab2" data-toggle="tab"
                                       aria-controls="tab2" href="#tab2" role="tab" aria-selected="false"><i
                                                class="icon-handbag"></i>
                                        <?php echo $this->lang->line('POS') . ' ' . $this->lang->line('Settings') ?></a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="btn btn-outline-danger  mr-1 mb-1" id="base-tab3" data-toggle="tab"
                                       aria-controls="tab3" href="#tab3" data-id="0" role="tab" aria-selected="false"><i
                                                class="fa fa-save"></i> <?php echo $this->lang->line('orders') ?></a> -->
                                    <a class="btn btn-outline-danger  mr-1 mb-1" id="base-tab3" href="<?php echo base_url('orders') ?>" role="tab"><i class="fa fa-first-order"></i> <?php echo $this->lang->line('orders') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-success mb-1" id="base-tab4" data-toggle="tab"
                                       aria-controls="tab4" href="#tab4" role="tab" aria-selected="false"><i
                                                class="fa fa-cogs"></i>
                                        <?php echo $this->lang->line('Invoice Properties') ?></a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div class="tab-pane" id="tab1" role="tabpanel" aria-labelledby="base-tab1">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="coupon" name="coupon">
                                        <input type="hidden" name="coupon_amount" id="coupon_amount" value="0"><span class="input-group-addon round"> 
                                        <input type="button" class="apply_coupon btn btn-small btn-primary sub-btn" value="<?php echo $this->lang->line('Apply') ?>"></span>
                                    </div>
                                    <input type="hidden" class="text-info" name="i_coupon" id="i_coupon" value="">
                                    <span class="text-primary text-bold-600" id="r_coupon"></span>
                                </div>
                                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="base-tab2">
                                    <div class="row">
                                        <div class="col-4 blue text-xs-center"><?php echo $this->lang->line('Warehouse') ?>
                                            <select
                                                    id="v2_warehouses"
                                                    class="selectpicker form-control round teal">
                                                <?php echo $this->common->default_warehouse();
                                                echo '<option value="0">' . $this->lang->line('All') ?></option><?php foreach ($warehouse as $row) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                                } ?>

                                            </select></div>
                                        <div class="col-4 blue text-xs-center"><?php echo $this->lang->line('Tax') ?>
                                            <select class="form-control round"
                                                    onchange="changeTaxFormat(this.value)"
                                                    id="taxformat">
                                                <?php echo $taxlist; ?>
                                            </select></div>
                                        <div class="col-4 blue text-xs-center">  <?php echo $this->lang->line('Discount') ?>
                                            <select class="form-control round teal"
                                                    onchange="changeDiscountFormat(this.value)"
                                                    id="discountFormat">

                                                <?php echo $this->common->disclist() ?>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="base-tab3">
                                    <?php //foreach ($draft_list as $rowd) { ?>
                                        <!-- <li class="indigo p-1"><a <?php if($rowd['payment'] == 0) { echo 'href="'.base_url().'pos_invoices/draft?id='.$rowd['id'].'"'; } ?> ><span class="alert alert-primary alertclass"><?php echo $rowd['table_no'] ?></span>&nbsp;&nbsp; <span class="alert alert-danger alertclassdanger" id="bill">Bill Payment: <?php echo amountExchange($rowd['subtotal'], 0, $this->aauth->get_user()->loc) ?> </span> &nbsp;&nbsp;(Date: <?php echo $rowd['invoicedate']; ?>)</a></li>'; -->
                                    <?php //} ?>
                                </div>
                                <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="base-tab4">
                                    <div class="form-group row">
                                        <div class="col-sm-3"><label for="invocieno"
                                                                     class="caption"><?php echo $this->lang->line('Invoice Number') ?></label>

                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="icon-file-text-o"
                                                                                     aria-hidden="true"></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Invoice #"
                                                       name="invocieno" id="invocieno"
                                                       value="<?php echo $lastorder > $lastinvoice ? $lastorder + 1 : $lastinvoice + 1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-3"><label for="invocieno"
                                                                     class="caption"><?php echo $this->lang->line('Reference') ?></label>

                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="icon-bookmark-o"
                                                                                     aria-hidden="true"></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                       placeholder="Reference #"
                                                       name="refer">
                                            </div>
                                        </div>


                                        <div class="col-sm-3"><label for="invociedate"
                                                                     class="caption"><?php echo $this->lang->line('Invoice Date'); ?></label>

                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="icon-calendar4"
                                                                                     aria-hidden="true"></span>
                                                </div>
                                                <input type="text" class="form-control required"
                                                       placeholder="Billing Date" name="invoicedate"
                                                       data-toggle="datepicker"
                                                       autocomplete="false">
                                            </div>
                                        </div>
                                        <div class="col-sm-3"><label for="invocieduedate"
                                                                     class="caption"><?php echo $this->lang->line('Invoice Due Date') ?></label>

                                            <div class="input-group">
                                                <div class="input-group-addon"><span class="icon-calendar-o"
                                                                                     aria-hidden="true"></span>
                                                </div>
                                                <input type="text" class="form-control required" id="tsn_due"
                                                       name="invocieduedate"
                                                       placeholder="Due Date" data-toggle="datepicker"
                                                       autocomplete="false">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <?php echo $this->lang->line('Payment Terms') ?> <select
                                                    name="pterms"
                                                    class="selectpicker form-control"><?php foreach ($terms as $row) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                                } ?>

                                            </select>
                                            <?php if ($exchange['active'] == 1) {
                                                echo $this->lang->line('Payment Currency client') ?>
                                            <?php } ?>
                                            <?php if ($exchange['active'] == 1) {
                                                ?>
                                                <select name="mcurrency"
                                                        class="selectpicker form-control">
                                                <option value="0">Default</option>
                                                <?php foreach ($currency as $row) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['symbol'] . ' (' . $row['code'] . ')</option>';
                                                } ?>

                                                </select><?php } ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="toAddInfo"
                                                   class="caption"><?php echo $this->lang->line('Invoice Note') ?></label>
                                            <textarea class="form-control" name="notes" rows="2"></textarea>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="chat-app-window row">
                    <div class="col-sm-12 chat_window">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-barcode p-0"></i>&nbsp;<input type="checkbox" aria-label="Enable BarCode" value="1" id="bar_only">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control text-center round mousetrap" name="product_barcode" placeholder="Enter Product name, code or scan barcode" id="v2_search_bar"  autocomplete="off" autofocus="autofocus">
                                </div>
                            </div>
                            <div class="col-md-3  grey text-xs-center">
                                <select id="v2_categories" class="selectpicker form-control round teal">
                                    <option value="0"><?php echo $this->lang->line('All') ?></option><?php
                                    foreach ($cat as $row) {
                                        $cid = $row['id'];
                                        $title = $row['title'];
                                        echo "<option value='$cid'>$title</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr class="white">
                        <div class="row m-0">
                            <div class="col-md-12 pt-0 " id="pos_item">
                                <!-- pos items -->
                            </div>
                        </div>                        
                    </div>
                    <!-- <div class="running_orders row col-sm-12">
                        <div class="col-sm-6 paid_item" style="display:none;">
                            <h1>Pre-paid Order(s)</h1>
                            <div class="paid_item_orders">
                                <?php if($draft_list) { foreach ($draft_list as $rowd){ if($rowd['payment'] == 1 && $rowd['draft_id'] == 0){ ?>
                                    <li class="indigo p-1 text-center">
                                        <a><span><strong><?php echo 'KOT # '.$rowd['invoice_id'] ?></strong></span>&nbsp;&nbsp; <span><?php if($rowd['table_id'] > 0){ echo $rowd['floor_num'].'&nbsp;-&nbsp;'.$rowd['table_no']; }elseif($rowd['online_id'] > 0){ echo 'Online '.$rowd['order_app_name']. ' Order'; } else { echo 'Home Delivery'; } ?></span>&nbsp;&nbsp;
                                            <br><span><?php echo $rowd['created_at']; ?></span>&nbsp;&nbsp;
                                        </a>
                                        <br> <?php if($rowd['status'] == 0){ echo '<span class="alert alert-primary alertclassprimary">Ready to Cook</span>'; } elseif($rowd['status'] == 1){ echo '<a href="javascript:void(0)" class="update-object" data-object-id="'.$rowd['id'].'"><span class="alert alert-primary alertclassprimaryserved alertclassprimaryserved_color">Serve Order</span></a>'; } elseif($rowd['status'] == 2){ echo '<span class="alert alert-primary alertclassprimaryserved">Served Order</span>'; } ?>
                                        <a style="padding: 0.58rem 0.5rem;color:white;float:right " href="javascript:void(0)" data-object-id="<?php echo $rowd['id']; ?>" class="btn btn-blue btn-sm delete-object">
                                            <i class="fa fa-arrow-circle-o-right"></i> 
                                            <?php echo $this->lang->line('clear_table') ?>
                                        </a>
                                    </li>
                                <?php } } } ?>
                            </div>
                        </div>
                        <div class="vr"></div>
                        <div class="col-sm-6 draft_item" style="display:none;">
                            <h1>Post-paid Order(s)</h1>
                            <div class="draft_item_orders">
                                <?php if($draft_list) { foreach ($draft_list as $rowd){ if($rowd['payment'] == 0 && $rowd['draft_id'] == 1){ ?>
                                    <li class="indigo p-2 text-center">
                                        <a href="<?php echo base_url('pos_invoices/draft?id='.$rowd['kot']) ?>"><span><strong><?php echo 'KOT # '.$rowd['invoice_id'] ?></strong></span>&nbsp;&nbsp; <span><?php if($rowd['table_id'] > 0){ echo $rowd['floor_num'].'&nbsp;-&nbsp;'.$rowd['table_no']; }elseif($rowd['online_id'] > 0){ echo 'Online '.$rowd['order_app_name']. ' Order'; } else { echo 'Home Delivery'; } ?></span>&nbsp;&nbsp; 
                                            <br><span><?php echo $rowd['created_at']; ?></span>&nbsp;&nbsp;                                     
                                        </a>                                    
                                        <br> <?php if($rowd['status'] == 0){ echo '<span class="alert alert-primary alertclassprimary">Ready to Cook</span>'; } elseif($rowd['status'] == 1){ echo '<a href="javascript:void(0)" class="update-object" data-object-id="'.$rowd['id'].'"><span class="alert alert-primary alertclassprimaryserved alertclassprimaryserved_color">Serve Order</span></a>'; } elseif($rowd['status'] == 2){ echo '<span class="alert alert-primary alertclassprimaryserved">Served Order</span>'; } ?>
                                        <a style="padding: 0.58rem 0.5rem;color:white;float:center " href="<?php echo base_url().'pos_invoices/edit?id='.$rowd['kot'].'&draft_id=1'; ?>" class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil"></i> &nbsp; 
                                            <?php echo $this->lang->line('Edit').' '.$this->lang->line('Order') ?>
                                        </a>
                                        
                                        <a style="padding: 0.58rem 0.5rem;color:white;float:right " href="<?php echo base_url().'pos_invoices/thermal_pdf?id='.$rowd['kot'].'&draft_id=1'; ?>" target="_blank" class="btn btn-blue btn-sm">
                                            <i class="fa fa-arrow-circle-o-right"></i> 
                                            <?php echo $this->lang->line('generate_recipt') ?>
                                        </a>
                                    </li>
                                <?php } } } ?>
                            </div>
                        </div>
                    </div> -->
                </section>
                <section class="chat-app-form">
                    <div class="form-group text-center">
                        <!-- Button Group with Icons in different sizes -->
                        <div class="btn-group btn-group-lg" role="group">
                            <button type="button" class="possubmit btn btn-warning"><i
                                        class="fa fa-save"></i> <?php echo $this->lang->line('place_order') ?> </button>
                            <button type="button" class="btn btn-success possubmit3" data-type="6" data-toggle="modal"
                                    data-target="#basicPay"><i
                                        class="fa fa-money"></i> <?php echo $this->lang->line('Payment') ?>
                            </button> <?php

                            if ($enable_card['url']) { ?>
                                <button type="button" class="btn btn-primary possubmit2" data-type="4"
                                        data-toggle="modal" data-target="#cardPay"><i
                                            class="fa fa-credit-card"></i> <?php echo $this->lang->line('Card') ?>
                                </button>     <?php } ?>


                        </div>
                        <a href="<?= base_url('stockreturn/create_client') ?>" class="red float-right"><i
                                    class="fa fa-reply-all"></i></a>
                    </div>


                </section>
            </div>
        </div>
    </div>
    <input type="hidden" value="pos_invoices/action" id="action-url">
    <input type="hidden" value="0" id="subttlform" name="subtotal">
    <input type="hidden" value="search" id="billtype">
    <input type="hidden" value="0" name="counter" id="ganak">
    <input type="hidden" value="0" id="custom_discount">
    <input type="hidden" value="<?php echo currency($this->aauth->get_user()->loc); ?>" name="currency">
    <input type="hidden" value="<?= $taxdetails['handle']; ?>" name="taxformat" id="tax_format">
    <input type="hidden" value="<?= $taxdetails['format']; ?>" name="tax_handle" id="tax_status">
    <input type="hidden" value="yes" name="applyDiscount" id="discount_handle">
    <input type="hidden" value="<?= $this->common->disc_status()['disc_format']; ?>" name="discountFormat"
           id="discount_format">
    <input type="hidden" value="<?= amountFormat_general($this->common->disc_status()['ship_rate']); ?>" name="shipRate"
           id="ship_rate">
    <input type="hidden" value="<?= $this->common->disc_status()['ship_tax']; ?>" name="ship_taxtype"
           id="ship_taxtype">
    <input type="hidden" value="0" name="ship_tax" id="ship_tax">
</form>
<audio id="beep" src="<?= assets_url() ?>assets/js/beep.wav" autoplay="false"></audio>

<div class="modal fade" id="Pos_addCustomer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">
            <form method="post" id="product_action" class="form-horizontal">
                <!-- Modal Header -->
                <div class="modal-header bg-gradient-directional-blue white">
                    <i class="icon-user-plus"></i> <?php echo $this->lang->line('Add Customer') ?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <p id="statusMsg"></p><input type="hidden" name="mcustomer_id" id="mcustomer_id" value="0">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5><?php echo $this->lang->line('Billing Address') ?></h5>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                       for="name"><?php echo $this->lang->line('Name') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Name"
                                           class="form-control margin-bottom" id="mcustomer_name" name="name"
                                           required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                       for="phone"><?php echo $this->lang->line('Phone') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Phone"
                                           class="form-control margin-bottom" name="phone" id="mcustomer_phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                       for="email"><?php echo $this->lang->line('Email') ?></label>
                                <div class="col-sm-10">
                                    <input type="email" placeholder="Email"
                                           class="form-control margin-bottom" name="email"
                                           id="mcustomer_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                       for="address"><?php echo $this->lang->line('Address') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Address"
                                           class="form-control margin-bottom " name="address"
                                           id="mcustomer_address1">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"
                                       for="customergroup"><?php echo $this->lang->line('Group') ?></label>
                                <div class="col-sm-10">
                                    <select name="customergroup" class="form-control">
                                        <?php
                                        foreach ($customergrouplist as $row) {
                                            $cid = $row['id'];
                                            $title = $row['title'];
                                            echo "<option value='$cid'>$title</option>";
                                        }
                                        ?>
                                    </select>


                                </div>
                            </div>

                            <?php
                            if (is_array($custom_fields_c)) {
                                foreach ($custom_fields_c as $row) {
                                    if ($row['f_type'] == 'text') { ?>
                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label"
                                                   for="docid"><?= $row['name'] ?></label>

                                            <div class="col-sm-8">
                                                <input type="text" placeholder="<?= $row['placeholder'] ?>"
                                                       class="form-control margin-bottom b_input"
                                                       name="custom[<?= $row['id'] ?>]">
                                            </div>
                                        </div>


                                    <?php }
                                }
                            }
                            ?>
                        </div>


                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo $this->lang->line('Close') ?></button>
                    <input type="submit" id="mclient_add" class="btn btn-primary submitBtn" value="ADD"/ >
                </div>
            </form>
        </div>
    </div>
</div>
<!--card-->
<div class="modal fade" id="cardPay" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('Make Payment') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>

            </div>

            <!-- Modal Body -->
            <div class="modal-body ">
                <p id="statusMsg"></p>
                <form role="form" id="card_data">

                    <div class="row">
                        <div class="col-6">
                            <label for="cardNumber"><?php echo $this->lang->line('Payment Gateways') ?></label>
                            <select class="form-control" name="gateway"><?php
                                $surcharge_t = false;
                                foreach ($gateway as $row) {
                                    $cid = $row['id'];
                                    $title = $row['name'];
                                    if ($row['surcharge'] > 0) {
                                        $surcharge_t = true;
                                        $fee = '(<span class="gate_total"></span>+' . amountFormat_s($row['surcharge']) . ' %)';
                                    } else {
                                        $fee = '';
                                    }
                                    echo "<option value='$cid'>$title $fee</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4"><br><img class="img-responsive pull-right"
                                                    src="<?php echo assets_url('assets/images/accepted_c22e0.png') ?>">
                        </div>
                    </div>


                    <div class="row mt-1">
                        <div class="col">
                            <button class="btn btn-success btn-lg"
                                    type="submit"
                                    id="pos_card_pay"
                                    data-type="2"><i
                                        class="fa fa-credit-card"></i> <?php echo $this->lang->line('Paynow') ?>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">

                        <?php if ($surcharge_t) echo '<br>' . $this->lang->line('Note: Payment Processing'); ?>

                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-xs-12">
                            <p class="payment-errors"></p>
                        </div>
                    </div>

                    <input type="hidden" value="pos_invoices/action" id="pos_action-url">
                </form>

                <!-- shipping -->


            </div>
            <!-- Modal Footer -->


        </div>
    </div>
</div>
<div class="modal fade" id="basicPay" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">
            <form method="post" id="basicpay_data" class="form-horizontal">
                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title"><?php echo $this->lang->line('Make Payment') ?></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p id="statusMsg"></p>

                    <div class="text-center">
                        <h1 id="b_total"></h1>
                        <br>
                        <Span id="credit_msg"></span>
                        <button class="btn btn-success pull-right new_payment_form" type="button" data-count="0"><i class="fa fa-plus"></i></button><br><br>                                
                    </div>
                    <input type="hidden" value="<?php echo $credit_settings['key1'];?>" name="credit_setting" id="credit_setting">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-title">
                                <label for="cardNumber"><?php echo $this->lang->line('Amount') ?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control  text-bold-600 blue-grey" name="p_amount" placeholder="Amount" onkeypress="return isNumber(event)" id="p_amount" onkeyup="update_pay_pos()" inputmode="numeric" />
                                    <span class="input-group-addon"><i class="icon icon-cash"></i></span>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-6">
                            <div class="card-title">
                                <label for="cardNumber"><?php echo $this->lang->line('Payment Method') ?></label>
                                <select class="form-control" name="p_method" id="p_method">
                                    <option value='Cash'><?php echo $this->lang->line('Cash') ?></option>
                                    <option value='Card Swipe'><?php echo $this->lang->line('Card Swipe') ?></option>
                                    <option value='Bank'><?php echo $this->lang->line('Bank') ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="insert_new_entry"></div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group  text-bold-600 red">
                                <label for="amount"><?php echo $this->lang->line('Balance Due') ?>
                                </label>
                                <input type="text" class="form-control red" name="amount" id="balance1" onkeypress="return isNumber(event)" value="0.00" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-bold-600 text-g">
                                <label for="b_change"><?php echo $this->lang->line('Change') ?></label>
                                <input
                                        type="text" onkeypress="return isNumber(event)"
                                        class="form-control green"
                                        name="b_change" id="change_p" value="0">
                            </div>
                        </div>
                    </div>
                    <?php if (PAC) { ?>
                        <div class="col">
                            <div class="form-group text-bold-600 text-g">
                                <label for="account_p"><?php echo $this->lang->line('Account') ?></label>

                                <select name="p_account" id="p_account" class="form-control">
                                    <?php foreach ($acc_list as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $row['holder'] . ' / ' . $row['acn'] . '</option>';
                                    }
                                    ?>
                                </select></div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-success btn-lg btn-block mb-1"
                                    type="submit"
                                    id="pos_basic_pay" data-type="4"><i
                                        class="fa fa-arrow-circle-o-right"></i> <?php echo $this->lang->line('Paynow') ?>
                            </button>
                            <button class="btn btn-info btn-lg btn-block"
                                    type="submit"
                                    id="pos_basic_print" data-type="4"><i
                                        class="fa fa-print"></i> <?php echo $this->lang->line('Paynow') ?>
                                + <?php echo $this->lang->line('Print') ?></button>
                        </div>
                    </div>

                    <div class="row" style="display:none;">
                        <div class="col-xs-12">
                            <p class="payment-errors"></p>
                        </div>
                    </div>
                    <!-- shipping -->
                </div>
                <!-- Modal Footer -->

            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title"><?php echo $this->lang->line('Your Register') ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>
                </button>

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="text-center m-1"><?php echo $this->lang->line('Active') ?> - <span id="r_date"></span></div>


                <div class="row">
                    <div class="col-6">
                        <div class="form-group  text-bold-600 green">
                            <label for="amount"><?php echo $this->lang->line('Cash') ?>
                                (<?= $this->config->item('currency'); ?>)
                            </label>
                            <input type="number" class="form-control green" id="r_cash"
                                   value="0.00"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-5 col-md-5 pull-right">
                        <div class="form-group text-bold-600 blue">
                            <label for="b_change blue"><?php echo $this->lang->line('Card') ?></label>
                            <input
                                    type="number"
                                    class="form-control blue"
                                    id="r_card" value="0" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group  text-bold-600 indigo">
                            <label for="amount"><?php echo $this->lang->line('Bank') ?>
                            </label>
                            <input type="number" class="form-control indigo" id="r_bank"
                                   value="0.00"
                                   readonly>
                        </div>
                    </div>
                    <div class="col-5 col-md-5 pull-right">
                        <div class="form-group text-bold-600 red">
                            <label for="b_change"><?php echo $this->lang->line('Change') ?>(-)</label>
                            <input
                                    type="number"
                                    class="form-control red"
                                    id="r_change" value="0" readonly>
                        </div>
                    </div>
                </div>


                <div class="row" style="display:none;">
                    <div class="col-xs-12">
                        <p class="payment-errors"></p>
                    </div>
                </div>


                <!-- shipping -->


            </div>
            <!-- Modal Footer -->


        </div>
    </div>
</div>
<div class="modal fade" id="close_register" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title"><?php echo $this->lang->line('Close') ?><?php echo $this->lang->line('Your Register') ?></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <a href="<?= base_url() ?>/register/close" class="btn btn-danger btn-lg btn-block"
                           type="submit"
                        ><i class="icon icon-arrow-circle-o-right"></i> <?php echo $this->lang->line('Yes') ?></a>
                    </div>
                    <div class="col-4"></div>
                </div>

            </div>
            <!-- Modal Footer -->


        </div>
    </div>
</div>
<div class="modal fade" id="stock_alert" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title"><?php echo $this->lang->line('Stock Alert') ?> !</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?php echo $this->lang->line('Close') ?></span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                <div class="row p-1">
                    <div class="alert alert-danger mb-2" role="alert">
                        <strong>Oh snap!</strong> <?php echo $this->lang->line('order or edit the stock') ?>
                    </div>
                </div>

            </div>
            <!-- Modal Footer -->


        </div>
    </div>
</div>
<div id="shortkeyboard" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">ShortCuts</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Alt+X</td>
                        <td>Focus to products search</td>
                    </tr>
                    <tr>
                        <td>Alt+C</td>
                        <td>Focus to customer search</td>
                    </tr>

                    <tr>
                        <td>Alt+S (twice)</td>
                        <td>PayNow + Thermal Print</td>
                    </tr>
                    <tr>
                        <td>Alt+Z</td>
                        <td>Make Card Payment</td>
                    </tr>
                    <tr>
                        <td>Alt+Q</td>
                        <td>Select First product</td>
                    </tr>
                    <tr>
                        <td>Alt+N</td>
                        <td>Create New Invoice</td>
                    </tr>


                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<div id="pos_print" class="modal fade" role="dialog">
    <div class="modal-dialog ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Legacy Print Mode</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body border_no_print" id="print_section">
                <embed src="<?= base_url('assets/images/ssl-seal.png') ?>"
                       type="application/pdf" height="600px" width="470" id="loader_pdf"
                ">
                <input id="loader_file" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- <div id="delete_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('clear') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('clear this table') ?></strong></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" value="">
                <input type="hidden" id="action-url-clear" value="kitchen/update_order_status">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="table-confirm"><?php echo $this->lang->line('yes') ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $this->lang->line('no') ?></button>
            </div>
        </div>
    </div>
</div>

<div id="update_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $this->lang->line('Served') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('Served_this_table') ?></strong></p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="object-id" value="">
                <input type="hidden" id="action-url-update" value="pos_invoices/update_order_status">
                <button type="button" data-dismiss="modal" class="btn btn-primary"
                        id="table-confirm-update"><?php echo $this->lang->line('yes') ?></button>
                <button type="button" data-dismiss="modal"
                        class="btn"><?php echo $this->lang->line('no') ?></button>
            </div>
        </div>
    </div>
</div> -->
<script type="text/javascript">

    $(document).on('click', ".update-object", function (e) {
        e.preventDefault();
        $('#object-id').val($(this).attr('data-object-id'));
        $(this).closest('tr').attr('id',$(this).attr('data-object-id'));
        $('#update_model').modal({backdrop: 'static', keyboard: false});

    });

    $(document).on('click', "#table-confirm-update", function (e) {
        var o_data = 'order=' + $('#object-id').val();
        var action_url= $('#action-url-update').val();
        $('#'+$('#object-id').val()).remove();
        update_table_status(o_data,action_url);
    });
    
    $("#table-confirm").on("click", function() {
        var o_data = 'order=' + $('#object-id').val();
        var action_url= $('#action-url-clear').val();
        $('#'+$('#object-id').val()).remove();
        update_table_status(o_data,action_url);
    });


    function update_table_status(action,action_url) {
        jQuery.ajax({
            url: baseurl + action_url,
            type: 'POST',
            data: action,
            dataType: 'html',
            success: function (data) {
                $('.running_orders').empty().html(data);
            }
        });
        //window.location.reload();
    }

    function update_running_order() {
        jQuery.ajax({
            url: baseurl + 'pos_invoices/update_running_order',
            type: 'GET',
            dataType: 'html',
            success: function (data) {
                $('.chat_window').hide();
                $('.running_orders').empty().html(data);
            }
        }); 
    }


    $("#base-tab3").click(function(){
        var id=$(this).attr('data-id');
        if(id ==0){
            $(".chat_window").addClass("col-sm-6").removeClass("col-sm-12");
            $(".draft_item").show();
            $('.chat_window').hide();
            $("#tab3").hide();
            $(".paid_item").show();
            $("#base-tab3").attr('data-id','1');
            setInterval(update_running_order, 5000);
        

        }else{
            $(".chat_window").addClass("col-sm-12").removeClass("col-sm-6");
            $(".draft_item").hide();
            $(".paid_item").hide();
            $('.chat_window').show();
            $("#tab3").show();
            $("#base-tab3").attr('data-id','0');

        }
    })

    $(".order_type_radio").click(function(){
        var type = $(this).val();
        if(type == 'dine'){
            $("#table_id").show();
            $("#online_id").hide();
            $("#online_id").removeClass("required");
            $("#table_id").addClass("required");

        }else if(type == 'online'){
            $("#table_id").hide();
            $("#online_id").show();
            $("#table_id").removeClass("required");
            $("#online_id").addClass("required");
        }else{
            $("#online_id").removeClass("required");
            $("#table_id").removeClass("required");
            $("#table_id").hide();
            $("#online_id").hide();
            $("#delivery_id").val('1');

        }
    })

    var wait = true;
    $.ajax({
        url: baseurl + 'search_products/v2_pos_search',
        dataType: 'html',
        method: 'POST',
        data: 'cid=' + $('#v2_categories').val() + '&wid=' + $('#v2_warehouses option:selected').val() + '&' + crsf_token + '=' + crsf_hash + '&bar=' + $('#bar_only').prop('checked'),
        success: function (data) {
            $('#pos_item').html(data);

        }
    });

    function update_register() {
        $.ajax({
            url: baseurl + 'register/status',
            dataType: 'json',
            data: crsf_token + '=' + crsf_hash,
            success: function (data) {
                $('#r_cash').val(data.cash);
                $('#r_card').val(data.card);
                $('#r_bank').val(data.bank);
                $('#r_change').val(data.change);
                $('#r_date').text(data.date);
            }
        });
    }

    update_register();
    $(".possubmit").on("click", function (e) {
        e.preventDefault();
        var o_data = $("#data_form").serialize() + '&type=' + $(this).attr('data-type');
        var action_url = $('#action-url').val();
        addObject(o_data, action_url);
    });

    $(".possubmit2").on("click", function (e) {
        e.preventDefault();
        $('#card_total').val(accounting.unformat($('#invoiceyoghtml').val(), accounting.settings.number.decimal));
    });

    $(".possubmit3").on("click", function (e) {
        e.preventDefault();
        var roundoff = parseFloat(accounting.unformat($('#invoiceyoghtml').val(), accounting.settings.number.decimal)).toFixed(two_fixed);

        <?php
        $round_off = $this->custom->api_config(4);
        if ($round_off['other'] == 'PHP_ROUND_HALF_UP') {
            echo ' roundoff=Math.ceil(roundoff);';
        } elseif ($round_off['other'] == 'PHP_ROUND_HALF_DOWN') {
            echo ' roundoff=Math.floor(roundoff);';
        }
        ?>
        $('#b_total').html(' <?= $this->config->item('currency'); ?> ' + accounting.formatNumber(roundoff));
        $('#p_amount').val(accounting.formatNumber(roundoff));

    });

    function update_pay_pos() {
        var counter =  $('.new_payment_form').attr('data-count');
        console.log(counter);
        var am_pos = 0;
        for(var i= 0; i <= counter; i++ ){
            if(i ==0){
                var am_pos = accounting.unformat($('#p_amount').val(), accounting.settings.number.decimal);
            }else if(i > 0){
                var new_pos = accounting.unformat($('#p_amount_'+i).val(), accounting.settings.number.decimal);
                var am_pos = parseInt(new_pos) + parseInt(am_pos);
            }
        }
        var ttl_pos = accounting.unformat($('#invoiceyoghtml').val(), accounting.settings.number.decimal);
        <?php
        $round_off = $this->custom->api_config(4);
        if ($round_off['other'] == 'PHP_ROUND_HALF_UP') {
            echo ' ttl_pos=Math.ceil(ttl_pos);';
        } elseif ($round_off['other'] == 'PHP_ROUND_HALF_DOWN') {
            echo ' ttl_pos=Math.floor(ttl_pos);';
        }
        ?>

        var due = parseFloat(ttl_pos - am_pos).toFixed(two_fixed);

        if (due >= 0) {
            $('#balance1').val(accounting.formatNumber(due));
            $('#change_p').val(0);
        } else {
            due = due * (-1)
            $('#balance1').val(0);
            $('#change_p').val(accounting.formatNumber(due));
        }
    }

    $('#pos_card_pay').on("click", function (e) {
        e.preventDefault();
        $('#cardPay').modal('toggle');
        $("#notify .message").html("<strong>Processing</strong>: .....");
        $("#notify").removeClass("alert-danger").addClass("alert-primary").fadeIn();
        $("html, body").animate({scrollTop: $('body').offset().top - 100}, 1000);
        var o_data = $("#data_form").serialize() + '&' + $("#card_data").serialize() + '&type=' + $(this).attr('data-type');
        var action_url = $('#action-url').val();
        addObject(o_data, action_url);
        update_register();
    });
    $('#pos_basic_pay').on("click", function (e) {
        var credit_setting = $('#credit_setting').val();
        var balance1 = $('#balance1').val();
        if(credit_setting == 1 && parseInt(balance1) > 0 ){
            $('#balance1').css('border','2px solid red');
            $('#credit_msg').html('<b>Your balance due is greater then zero.</b>');
            $('#credit_msg').css('color','red');
            $('#pos_basic_pay #pos_basic_print').attr('disabled','disabled');
            return false;
        }
        
        var counter = $('.new_payment_form').attr('data-count');
        e.preventDefault();
            if(counter == 0 || $('#p_amount_1').val() != ''){
                $('#basicPay').modal('toggle');
            }
            
            $("#notify .message").html("<strong>Processing</strong>: .....");
            $("#notify").removeClass("alert-danger").addClass("alert-primary").fadeIn();
            $("html, body").animate({scrollTop: $('body').offset().top - 100}, 1000);
            var addition_payment = '';
            for(var i=0; i <= counter; i++){
                if(i == 0){
                    addition_payment = "&p_amount=" + accounting.unformat($('#p_amount').val(), accounting.settings.number.decimal) + "&p_method=" + $('#p_method option:selected').val();
                }else if(i > 0){
                    addition_payment = addition_payment + " +&p_amount_"+i+"=" + accounting.unformat($('#p_amount_'+i).val(), accounting.settings.number.decimal) + "&p_method_"+i+"=" +$('#p_method_'+ i +' option:selected').val();
                }
            }
            var o_data = $("#data_form").serialize() + '&type=' + $(this).attr('data-type') + '&account=' + $("#p_account option:selected").val() + '&employee=' + $("#employee option:selected").val() + addition_payment + '&counter_val=' + counter;
            var action_url = $('#action-url').val();
            addObject(o_data, action_url);
            setTimeout(
                function () {
                    update_register();
                }, 3000);
    });

    $('#pos_basic_print').on("click", function (e) {
        e.preventDefault();
        $('#basicPay').modal('toggle');
        $("#notify .message").html("<strong>Processing</strong>: .....");
        $("#notify").removeClass("alert-danger").addClass("alert-primary").fadeIn();
        $("html, body").animate({scrollTop: $('body').offset().top - 100}, 1000);
        var o_data = $("#data_form").serialize() + '&p_amount=' + accounting.unformat($('#p_amount').val(), accounting.settings.number.decimal) + '&p_method=' + $("#p_method option:selected").val() + '&type=' + $(this).attr('data-type') + '&printnow=1' + '&account=' + $("#p_account option:selected").val() + '&employee=' + $("#employee option:selected").val();
        var action_url = $('#action-url').val();
        addObject(o_data, action_url);
        setTimeout(
            function () {
                update_register();
            }, 3000);
    });
    var file_id;
    $(document.body).on('click', '.print_image', function (e) {

        e.preventDefault();

        var inv_id = $(this).attr('data-inid');

        jQuery.ajax({
            url: '<?php echo base_url('pos_invoices/invoice_legacy') ?>',
            type: 'POST',
            data: 'inv=' + inv_id + '&' + crsf_token + '=' + crsf_hash,
            dataType: 'json',
            success: function (data) {
                file_id= data.file_name;
                $("#loader_pdf").attr('src','<?= base_url() ?>userfiles/pos_temp/'+data.file_name+'.pdf');
                $("#loader_file").val(data.file_name);
            },
        });

        $('#pos_print').modal('toggle');
        $("#print_section").printThis({
            //  beforePrint: function (e) {$('#pos_print').modal('hide');},

            printDelay: 500,
            afterPrint: clean_data()
        });
    });


    function clean_data() {
        setTimeout(function(){
        var file_id= $("#loader_file").val();
        jQuery.ajax({
            url: '<?php echo base_url('pos_invoices/invoice_clean') ?>',
            type: 'POST',
            data: 'file_id=' + file_id + '&' + crsf_token + '=' + crsf_hash,
            dataType: 'json',
            success: function (data) {

            },
        });
    }, 2500);

    }



</script>

<!-- Vendor libraries -->
<script type="text/javascript">
    var $form = $('#payment-form');
    $form.on('submit', payWithCard);

    /* If you're using Stripe for payments */
    function payWithCard(e) {
        e.preventDefault();

        /* Visual feedback */
        $form.find('[type=submit]').html('Processing <i class="fa fa-spinner fa-pulse"></i>')
            .prop('disabled', true);

        jQuery.ajax({
            url: '<?php echo base_url('billing/process_card') ?>',
            type: 'POST',
            data: $('#payment-form').serialize() + '&' + crsf_token + '=' + crsf_hash,
            dataType: 'json',
            success: function (data) {
                $form.find('[type=submit]').html('Payment successful <i class="fa fa-check"></i>').prop('disabled', true);
                $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                $("#notify").removeClass("alert-danger").addClass("alert-success").fadeIn();
                $("html, body").animate({scrollTop: $('#notify').offset().top}, 1000);
            },
            error: function () {
                $form.find('[type=submit]').html('There was a problem').removeClass('success').addClass('error');
                /* Show Stripe errors on the form */
                $form.find('.payment-errors').text('Try refreshing the page and trying again.');
                $form.find('.payment-errors').closest('.row').show();
                $form.find('[type=submit]').html('Error! <i class="fa fa-exclamation-circle"></i>')
                    .prop('disabled', true);
                $("#notify .message").html("<strong>Error</strong>: Please try again!");
            }
        });
    }


    $('#v2_categories').change(function () {
        var whr = $('#v2_warehouses option:selected').val();
        var cat = $('#v2_categories option:selected').val();
        $.ajax({
            type: "POST",
            url: baseurl + 'search_products/v2_pos_search',
            data: 'wid=' + whr + '&cid=' + cat + '&' + crsf_token + '=' + crsf_hash,
            beforeSend: function () {
                $("#customer-box").css("background", "#FFF url(" + baseurl + "assets/custom/load-ring.gif) no-repeat 165px");
            },
            success: function (data) {

                $("#pos_item").html(data);

            }
        });
    });
    $('#v2_warehouses').change(function () {
        var whr = $('#v2_warehouses option:selected').val();
        var cat = $('#v2_categories option:selected').val();
        $.ajax({
            type: "POST",
            url: baseurl + 'search_products/v2_pos_search',
            data: 'wid=' + whr + '&cid=' + cat + '&' + crsf_token + '=' + crsf_hash,
            beforeSend: function () {
                $("#customer-box").css("background", "#FFF url(" + baseurl + "assets/custom/load-ring.gif) no-repeat 165px");
            },
            success: function (data) {

                $("#pos_item").html(data);

            }
        });
    })
    $(document).ready(function () {

        if (localStorage.bar_only && localStorage.bar_only != '') {
            $('#bar_only').attr('checked', 'checked');

        } else {
            $('#bar_only').removeAttr('checked');
        }

        $('#bar_only').click(function () {

            if ($('#bar_only').is(':checked')) {

                localStorage.bar_only = $('#bar_only').val();
            } else {
                localStorage.bar_only = '';
            }
            $('#v2_search_bar').attr('readonly', false);
        });

        Mousetrap.bind('alt+x', function () {
            $('#v2_search_bar').focus();
        });
        Mousetrap.bind('alt+c', function () {
            $('#pos-customer-box').focus();
        });

        Mousetrap.bind('alt+z', function () {
            $('.possubmit2').click();
        });
        Mousetrap.bind('alt+n', function () {
            window.location.href = "<?=base_url('pos_invoices/create') ?>";
        });
        Mousetrap.bind('alt+q', function () {
            $('#posp0').click();
            $('#v2_search_bar').val('');
        });
        Mousetrap.bind('alt+s', function () {
            if ($('#basicPay').hasClass('show')) {
                $('#pos_basic_print').click();
            } else {
                $('.possubmit3').click();
            }

        });


        $('#v2_search_bar').keyup(function (event) {

            if (!$(this).attr('readonly')) {
                //$('#v2_search_bar').keyup(function () {
                var whr = $('#v2_warehouses option:selected').val();
                var cat = $('#v2_categories option:selected').val();
                if (this.value.length > 2) {
                    $.ajax({
                        type: "POST",
                        url: baseurl + 'search_products/v2_pos_search',
                        data: 'name=' + $(this).val() + '&wid=' + whr + '&cid=' + cat + '&' + crsf_token + '=' + crsf_hash + '&bar=' + $('#bar_only').prop('checked'),
                        beforeSend: function () {
                            $("#customer-box").css("background", "#FFF url(" + baseurl + "assets/custom/load-ring.gif) no-repeat 165px");
                        },
                        success: function (data) {
                            $("#pos_item").html(data);

                        }
                    });

                }
            }

            if (this.value.length == 13) {
                console.log(this.value.length);
                $('#v2_search_bar').attr('readonly', true);
                wait = false;
                def_timeout(1000).then(function () {
                $('#posp0').click();
                def_timeout(1800).then(function () {


                        var whr = $('#v2_warehouses option:selected').val();
                        var cat = $('#v2_categories option:selected').val();
                        $.ajax({
                            type: "POST",
                            url: baseurl + 'search_products/v2_pos_search',
                            data: 'name=' + $(this).val() + '&wid=' + whr + '&cid=' + cat + '&' + crsf_token + '=' + crsf_hash + '&bar=' + $('#bar_only').prop('checked'),
                            beforeSend: function () {
                                $("#customer-box").css("background", "#FFF url(" + baseurl + "assets/custom/load-ring.gif) no-repeat 165px");
                            },
                            success: function (data) {
                                $("#pos_item").html(data);
                                $('#v2_search_bar').attr('readonly', false);
                                $('#v2_search_bar').val('');
                            }

                        });
                    });


                });


            }
        });
    });

    $(document.body).on('click', '.new_payment_form', function (e) {
        var count = $(this).attr('data-count');
        var  count = parseInt(count) + 1;
        var html = '<button class="btn btn-danger pull-right remove_payment_form" type="button"><i class="fa fa-minus"></i></button><br><br>'+
                    '<div class="row">'+
                        '<div class="col-6">'+
                            '<div class="card-title">'+
                                '<label for="cardNumber"><?php echo $this->lang->line("Amount") ?></label>'+
                                '<div class="input-group">'+
                                    '<input type="text" class="form-control  text-bold-600 blue-grey required" name="p_amount'+ count +'" placeholder="Amount" onkeypress="return isNumber(event)" id="p_amount_'+ count +'" onkeyup="update_pay_pos()" inputmode="numeric"/>'+
                                    '<span class="input-group-addon"><i class="icon icon-cash"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div> '+                     
                        '<div class="col-6">'+
                            '<div class="card-title">'+
                                '<label for="cardNumber"><?php echo $this->lang->line("Payment Method") ?></label>'+
                                '<select class="form-control required" name="p_method_'+ count +'" id="p_method_'+ count +'">'+
                                    '<option value="Cash"><?php echo $this->lang->line("Cash") ?></option>'+
                                    '<option value="Card Swipe" selected><?php echo $this->lang->line("Card Swipe") ?></option>'+
                                    '<option value="Bank"><?php echo $this->lang->line("Bank") ?></option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        $('.insert_new_entry').append(html);
        $('.new_payment_form').attr('data-count',count);
        $('.new_payment_form').hide();      
    });
    
    $(document.body).on('click', '.remove_payment_form', function (e) {
        var count = $('.new_payment_form').attr('data-count');
        var  count = parseInt(count) - 1;        
        $('.insert_new_entry').empty();
        $('.new_payment_form').attr('data-count',count);
        $('.new_payment_form').show(); 
        update_pay_pos().click();     

    });

    $(document.body).on('click', '#wholesale_only', function (e) {
        if($('#wholesale_only').is(':checked')){
            var sum_of_wholesale = 0;
            var id = $('#pos_items').children().last().attr('id');
            var counter = id.split('-');
            for(var i=0; i <= counter[1]; i++){
                if( $('#ppid-'+i).length){
                    var wholesale = $('#ppid-'+i+' > .wholesale_price').text();
                    var quantity = $('#amount-'+i).val();
                    var wholesale_quantity = wholesale * parseInt(quantity)
                    $('#result-'+i).html((wholesale_quantity).toFixed(2));
                    sum_of_wholesale += parseFloat(wholesale_quantity) ;
                    $('#total-'+i).val(wholesale_quantity.toFixed(2));
                    $('#wholesale_check-'+i).val(1);
                }
            }
            $('#bigtotal').html(sum_of_wholesale.toFixed(2));
            $('#invoiceyoghtml').val(sum_of_wholesale.toFixed(2));
            $('#subttlform').val(sum_of_wholesale.toFixed(2)); 
        }else{
            var sum_of_price = 0;
            var id = $('#pos_items').children().last().attr('id');
            var counter = id.split('-');
            for(var i=0; i <= counter[1]; i++){
                if( $('#ppid-'+i).length){
                    var price = $('#ppid-'+i+' > .price').text();
                    var quantity = $('#amount-'+i).val();
                    var price_quantity = price * parseInt(quantity)
                    $('#result-'+i).html((price_quantity).toFixed(2));
                    sum_of_price += parseFloat(price_quantity) ;
                    $('#total-'+i).val(sum_of_price.toFixed(2));
                    $('#wholesale_check-'+i).val(0);
                    
                } 
            }
            $('#bigtotal').html(sum_of_price.toFixed(2));
            $('#invoiceyoghtml').val(sum_of_price.toFixed(2));
            $('#subttlform').val(sum_of_price.toFixed(2));
        }
    });

</script>