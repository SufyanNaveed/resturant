<style>
.small-box{    
    border: 1px solid #d5d3d3;
    background: #e8eced;
    border-radius: 20px;
}
.inner > h4{
    padding-top: 15px;
}
.small-box-footer{
    margin:10px;
}
.alert-primary{
    padding: 3px 6px;
    background: #2370bb !important;
    color: #fff !important;
}
.alert-success{
    padding: 3px 6px;
}
.table th, .table td{
    padding: 0.75rem 1.0rem !important;
}
.mark_as_cooked_btn{
    margin-left: 15px;
}
.mt{
    margin-top :10px;
}
</style>
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

<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5><?php echo $this->lang->line('Orders') ?> </h5> 
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a href="<?php echo base_url('orders') ?>" class="btn btn-info btn-sm rounded">
                            <i class="fa fa-refresh"></i> &nbsp; Refresh
                        </a> 
                    </li>
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div id="notify" class="alert alert-success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <div class="message"></div>
            </div>

            <div class="card-body">
                <?php if($draft_list) {  ?>
                    <div class="running_orders row col-sm-12">
                        <div class="col-sm-6 paid_item">
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
                        <div class="col-sm-6 draft_item">
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
                    </div>
                <?php }else{ echo '<span style="padding: 0px 520px;">'.$this->lang->line('available_order_data').'</span>'; } ?>
            </div>
        </div>
        <div id="delete_model" class="modal fade">
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
</div>
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
                //$('.chat_window').hide();
                $('.running_orders').empty().html(data);
            }
        }); 
    }

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
    });

    $(function () {
        'use strict';
        //setInterval(update_running_order, 5000);
    });



</script>