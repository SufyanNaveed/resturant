<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">


            <form method="post" id="data_form" class="form-horizontal">

                <h5><?php echo $this->lang->line('Edit Kitchen') ?></h5>
                <hr>

                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="kitchen_name"><?php echo $this->lang->line('kitchen_name') ?></label>

                    <div class="col-sm-6">
                        <input type="text" placeholder="Kitchen Name" value="<?php echo $kitchen['kitchen_name'] ?>"
                               class="form-control margin-bottom  required" name="kitchen_name">
                    </div>
                </div>
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"
                           for="kitchen_name"><?php echo $this->lang->line('Description') ?></label>

                    <div class="col-sm-6">
                        <input type="text" placeholder="kitchen Short Description" value="<?php echo $kitchen['kitchen_description'] ?>"
                               class="form-control margin-bottom required" name="kitchen_description">
                    </div>
                </div> 
                <input type="hidden" name="kitchen_id" value="<?php echo $kitchen['id'] ?>">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="<?php echo $this->lang->line('Edit Kitchen') ?>" data-loading-text="Adding...">
                        <input type="hidden" value="kitchen/editkitchen" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>

