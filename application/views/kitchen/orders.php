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
</style>

<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5><?php echo $this->lang->line('kitchen_order') ?> <a
                        href="<?php echo base_url('kitchen') ?>"
                        class="btn btn-primary btn-sm rounded">
                    <?php echo $this->lang->line('Manage kitchen') ?>
                </a>  </h5> 
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a href="<?php echo base_url('kitchen/view_orders/'.$kitchen_id) ?>" class="btn btn-info btn-sm rounded">
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
                <div class="row" id="orders_div">
                    <?php if($orders) { foreach($orders as $key=>$order){ ?>
                        <div class="col-md-3 col-xs-6 order_div_<?php echo $order['id'] ?>">
                            <div class="small-box bg-gray">
                                <div class="inner">
                                    <h4 class="text-center">Kot# <?php echo $order['invoice_id'] ?></h4>
                                    <table class="table no-margin no-border table-slim">
                                        <tbody>
                                                <tr>
                                                    <th>Placed at</th>
                                                    <td><?php echo $order['created_at'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Order status</th>
                                                    <td><span class="alert alert-primary">Received</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Customer</th>
                                                    <td><?php echo $order['cus_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Floor - Table</th>
                                                    <td><?php echo $order['floor_num'].'&nbsp; - &nbsp;'.$order['table_no']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Status</th>
                                                    <td><span class="alert alert-success"><?php echo $order['payment'] == 1 ? 'Paid' : 'Unpaid'; ?></span></td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-success small-box-footer mark_as_cooked_btn" data-order_id="<?php echo $order['id'] ?>"><i class="fa fa-check-square-o"></i> Mark as cooked</a>
                                <a href="#" class="btn btn-info small-box-footer btn-modal" data-href="" data-container=".view_modal">Order details <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    <?php } }else{ echo '<span style="padding: 0px 620px;">'.$this->lang->line('available_data_in_kitchen').'</span>'; } ?>
                </div>
            </div>
        </div>
        
    <div id="delete_model" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title"><?php echo $this->lang->line('Delete') ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p><?php echo $this->lang->line('delete this kitchen') ?></strong></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="object-id" value="">
                    <input type="hidden" id="action-url" value="kitchen/delete">
                    <button type="button" data-dismiss="modal" class="btn btn-primary"
                            id="delete-confirm"><?php echo $this->lang->line('Delete') ?></button>
                    <button type="button" data-dismiss="modal"
                            class="btn"><?php echo $this->lang->line('Cancel') ?></button>
                </div>
            </div>
        </div>
    </div>



<script> 
    $(function () {
        'use strict';
        
        $('.mark_as_cooked_btn').click(function (e) { 
            var order_id = $(this).attr('data-order_id');
            jQuery.ajax({

                url: baseurl + 'kitchen/update_order_status',
                type: 'POST',
                dataType: 'json',
                data: {
                    order_id: order_id,
                    '<?=$this->security->get_csrf_token_name()?>': crsf_hash
                },
                success: function (data) {
                    $(".order_div_"+ order_id).hide();
                }
            });

        });
    }); 
</script>