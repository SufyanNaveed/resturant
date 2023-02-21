<div class="content-body">
    <div class="card">
        <div class="card-header pb-0">
            <h5><?php echo 'Add New Recipe' ?></h5>
            <hr>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>

        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">
            <form method="post" id="data_form">


                <input type="hidden" name="act" value="add_recipe">


                <div class="form-group row">


                    <div class="col-sm-6">
                        <label class="col-form-label"for="recipe_name"><?php echo 'Recipe Name' ?>*</label>
                        <input type="text" placeholder="Recipe Name" class="form-control margin-bottom required" name="recipe_name">
                    </div>

                    <div class="col-sm-6"><label class="col-form-label" for="recipe_code"><?php echo 'Recipe Code' ?></label>
                        <input type="text" placeholder="Recipe Code" class="form-control" name="recipe_code">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6"> 
                        <label class="col-form-label" for="product_cat"><?php echo $this->lang->line('Warehouse') ?>*</label>
                        <select name="product_warehouse" class="form-control">
                            <?php
                            foreach ($warehouse as $row) {
                                $cid = $row['id'];
                                $title = $row['title'];
                                echo "<option value='$cid'>$title</option>";
                            }
                            ?>
                        </select>
                    </div>
                
                    <div class="col-sm-6"><label class="col-form-label"
                                                 for="product_cat"><?php echo $this->lang->line('Product Category') ?>
                            *</label>
                        <select name="product_cat" id="product_cat" class="form-control">
                            <?php
                            foreach ($cat as $row) {
                                $cid = $row['id'];
                                $title = $row['title'];
                                echo "<option value='$cid'>$title</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    
                <div class="col-sm-6">
                    <label class="col-sm-2 col-form-label"><?php echo $this->lang->line('Image') ?></label>
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <!-- The container for the uploaded files -->
                        <table id="files" class="files"></table>
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Select files...</span>
                                                <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files[]">
                        </span>
                        <br>
                        <pre>Allowed: gif, jpeg, png (Use light small weight images for fast loading - 200x200)</pre>
                        <br>
                        
                </div>

                <div class="col-sm-6">
                    
                    <label class="col-form-label"><?php echo $this->lang->line('Description') ?></label>

                        <textarea placeholder="Description"
                                  class="form-control margin-bottom" name="product_desc"
                        ></textarea>
                    </div>
                </div>

                <h3>Add Ingredients:</h3><br>
                
                <div id="saman-row">
                        <table class="table-responsive tfr my_stripe">
                            <thead>

                            <tr class="item_header bg-gradient-directional-amber">
                                <th width="30%" class="text-center"><?php echo $this->lang->line('Item Name') ?></th>
                                <th width="20%" class="text-center"><?php echo $this->lang->line('Unit') ?></th>
                                <th width="20%" class="text-center"><?php echo 'Measurement' ?></th>
                                <th width="20%" class="text-center"><?php echo $this->lang->line('Rate') ?></th>
                                <th width="30%" class="text-center">
                                    <?php echo $this->lang->line('Amount') ?>
                                    (<?php echo $this->config->item('currency'); ?>)
                                </th>
                                <th width="25%" class="text-center"><?php echo $this->lang->line('Action') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="text" class="form-control text-center required" name="product_name[]"
                                           placeholder="<?php echo $this->lang->line('Enter Product name').' or Barcode' ?>"
                                           id='getproductname-0'>
                                </td>
                                <td>
                                    <select class="form-control req unt" name="unit[]" id="unit-0">
                                        <option value="">Select Unit</option>
                                        <?php if($all_units) { foreach($all_units as $key=>$units){ ?>
                                            <option value="<?php echo $units['id'] ?>"><?php echo $units['code'] ?></option>
                                        <?php } } ?>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control req amnt" name="product_qty[]" id="amount-0"
                                    onkeypress="return isNumber(event)" onkeyup="calrowTotal('0'), billUpyog()"
                                    autocomplete="off" value=""></td>
                                <td><span id="punit-0"></span>
                                    <input type="text" class="form-control req prc" name="product_price[]" id="price-0"
                                           onkeypress="return isNumber(event)" onkeyup="calrowTotal('0'), billUpyog()"
                                           autocomplete="off"></td> 
                                
                                           <td><span class="currenty"><?php echo $this->config->item('currency'); ?></span>
                                    <strong><span class='ttlText' id="result-0">0</span></strong>

                                    <input type="hidden" name="total_item_price[]" value="" id="total_item_price-0">

                                </td>                               
                            </tr>
                            <!-- <tr>
                                <td colspan="9"><textarea id="dpid-0" class="form-control" name="product_description[]"
                                                          placeholder="<?php echo $this->lang->line('Enter Product description'); ?>"
                                                          autocomplete="off"></textarea><br></td>
                            </tr> -->

                            <tr class="last-item-row">
                                <td class="add-row">
                                    <button type="button" class="btn btn-success" aria-label="Left Align"
                                            id="addnewproduct">
                                        <i class="fa fa-plus-square"></i> <?php echo $this->lang->line('Add Row') ?>
                                    </button>
                                </td>
                                <td colspan="7"></td>
                            </tr>
                            <td align="right" colspan="4">
                                <input type="submit" class="btn btn-success sub-btn" value="<?php echo 'Make Recipe'; ?>" id="submit-data" data-loading-text="Creating...">
                            </td>
                            </tbody>
                        </table>
                    </div>
                
                
                    <input type="hidden" name="image" id="image" value="default.png">
                    <input type="hidden" value="recipe/addproduct" id="action-url">
                    <input type="hidden" class="pdIn" name="pid[]" id="pid-0" value="0">
                    <input type="hidden" value="product_search" id="billtype">
                    <input type="hidden" value="0" name="counter" id="ganak">

            </form>
        </div>
    </div>
</div>
<script src="<?php echo assets_url('assets/myjs/jquery.ui.widget.js'); ?>"></script>
<script src="<?php echo assets_url('assets/myjs/jquery.fileupload.js') ?>"></script>

<script>
$(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '<?php echo base_url() ?>products/file_handling';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            formData: {'<?=$this->security->get_csrf_token_name()?>': crsf_hash},
            done: function (e, data) {
                var img = 'default.png';
                $.each(data.result.files, function (index, file) {
                    $('#files').html('<tr><td><a data-url="<?php echo base_url() ?>products/file_handling?op=delete&name=' + file.name + '" class="aj_delete"><i class="btn-danger btn-sm icon-trash-a"></i> ' + file.name + ' </a><img style="max-height:200px;" src="<?php echo base_url() ?>userfiles/product/' + file.name + '"></td></tr>');
                    img = file.name;
                });

                $('#image').val(img);
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

    
var billtype = $('#billtype').val();
var d_csrf = crsf_token + '=' + crsf_hash;
$('#addnewproduct').on('click', function () {
    var cvalue = parseInt($('#ganak').val()) + 1;
    var nxt = parseInt(cvalue);
    $('#ganak').val(nxt);
    var functionNum = "'" + cvalue + "'";
    count = $('#saman-row div').length;
//product row
    var data = '<tr><td><input type="text" class="form-control required" name="product_name[]" placeholder="Enter Product name or Code" id="getproductname-' + cvalue + '"></td>'+
    '<td>'+
        '<select class="form-control req" name="unit[]" id="unit-0">'+
            '<option value="">Select Unit</option>'+
            '<?php if($all_units) { foreach($all_units as $key=>$units){ ?>'+
                '<option value="<?php echo $units['id'] ?>"><?php echo $units['code'] ?></option>'+
            '<?php } } ?>'+
        '</select>'+
    '</td>'+
    '<td><input type="text" class="form-control req amnt" name="product_qty[]" id="amount-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="calrowTotal(' + functionNum + '), billUpyog()" autocomplete="off" value=""  inputmode="numeric"><input type="hidden" id="alert-' + cvalue + '" value=""  name="alert[]"> </td>'+ 
    '<td><span id="punit-' + cvalue + '"><input type="text" class="form-control req prc" name="product_price[]" id="price-' + cvalue + '" onkeypress="return isNumber(event)" onkeyup="calrowTotal(' + functionNum + '), billUpyog()" autocomplete="off" inputmode="numeric"></td><td><span class="currenty">' + currency + '</span> <strong><span class=\'ttlText\' id="result-' + cvalue + '">0</span></strong><input type="hidden" name="total_item_price[]" value="" id="total_item_price-' + cvalue + '"></td>'+
    '<td class="text-center"><button type="button" data-rowid="' + cvalue + '" class="btn btn-danger removeProd" title="Remove" > <i class="fa fa-minus-square"></i> </button> </td><input type="hidden" name="taxa[]" id="taxa-' + cvalue + '" value="0"><input type="hidden" name="disca[]" id="disca-' + cvalue + '" value="0"><input type="hidden" class="ttInput" name="product_subtotal[]" id="total-' + cvalue + '" value="0"> <input type="hidden" class="pdIn" name="pid[]" id="pid-' + cvalue + '" value="0"> <input type="hidden" name="hsn[]" id="hsn-' + cvalue + '" value=""> <input type="hidden" name="serial[]" id="serial-' + cvalue + '" value=""></tr>';
    //ajax request
    // $('#saman-row').append(data);
    $('tr.last-item-row').before(data);

    row = cvalue;

    $('#getproductname-' + cvalue).autocomplete({
        source: function (request, response) {
            $.ajax({
                url: baseurl + 'recipe/product_search',
                dataType: "json",
                method: 'post',
                data: 'name_startsWith=' + request.term + '&type=product_list&row_num=' + row + '&wid=' + $("#s_warehouses option:selected").val() + '&' + d_csrf,
                success: function (data) {
                    response($.map(data, function (item) {
                        var product_d = item[0];
                        return {
                            label: product_d,
                            value: product_d,
                            data: item
                        };
                    }));
                }
            });
        },
        autoFocus: true,
        minLength: 0,
        select: function (event, ui) {
            id_arr = $(this).attr('id');
            id = id_arr.split("-");
            var t_r = ui.item.data[3];
            if ($("#taxformat option:selected").attr('data-trate')) {

                t_r = $("#taxformat option:selected").attr('data-trate');
            }
            var discount = ui.item.data[4];
            var custom_discount = $('#custom_discount').val();
            if (custom_discount > 0) discount = deciFormat(custom_discount);

            // $('#amount-' + id[1]).val(1);
            var unit= ui.item.data[6] == 'kg' ? 'per (g)' : ui.item.data[6] == 'liter' ? 'per (li)' : ''; 
            var price_per_unit = ui.item.data[6] == 'kg' ||  ui.item.data[6] == 'liter' ? (ui.item.data[1]/1000) : 0
            $('#price-' + id[1]).val(price_per_unit);
            $('#punit-' + id[1]).val(unit);
            $('#pid-' + id[1]).val(ui.item.data[2]);
            // $('#vat-' + id[1]).val(t_r);
            // $('#discount-' + id[1]).val(discount);
            // $('#dpid-' + id[1]).val(ui.item.data[5]);
            // $('#unit-' + id[1]).val(ui.item.data[6]);
            // $('#hsn-' + id[1]).val(ui.item.data[7]);
            // $('#alert-' + id[1]).val(ui.item.data[8]);
            // $('#serial-' + id[1]).val(ui.item.data[10]);
            // rowTotal(cvalue);
            billUpyog();


        },
        create: function (e) {
            $(this).prev('.ui-helper-hidden-accessible').remove();
        }
    });
});

</script>
