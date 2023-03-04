<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">


            <form method="post" id="data_form" class="form-horizontal">

                <h5><?php echo $this->lang->line('Add New floor') ?></h5>
                <hr>        

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="floor_name"><?php echo $this->lang->line('floor') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Floor Name" class="form-control margin-bottom  required" name="floor_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="floor_name"><?php echo $this->lang->line('Description') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Floor Short Description"class="form-control margin-bottom required" name="description">
                    </div>
                </div> 
                <div class="form-group row">

                    <label class="col-sm-2 col-form-label"></label>

                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="<?php echo $this->lang->line('Add floor') ?>" data-loading-text="Adding...">
                        <input type="hidden" value="floors/addfloor" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>

