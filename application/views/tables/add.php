<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">


            <form method="post" id="data_form" class="form-horizontal">

                <h5><?php echo $this->lang->line('Add New table') ?></h5>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="floor_id"><?php echo $this->lang->line('select_floor') ?></label>
                    <div class="col-sm-6">
                        <select class="form-control margin-bottom required" name="floor_id">
                            <option value="">-- Select Floor --</option>
                            <?php if($floors){ foreach($floors as $key=>$floor){ ?>
                                <option value="<?php echo $floor['id'] ?>"><?php echo $floor['floor_num'] ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="table_name"><?php echo $this->lang->line('table') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Enter Table" class="form-control margin-bottom  required" name="table">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="table_name"><?php echo $this->lang->line('Description') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Table Short Description"class="form-control margin-bottom required" name="description">
                    </div>
                </div> 
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="<?php echo $this->lang->line('Add table') ?>" data-loading-text="Adding...">
                        <input type="hidden" value="tables/addtables" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>

