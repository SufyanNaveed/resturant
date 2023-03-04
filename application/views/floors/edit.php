<article class="content-body">
    <div class="card card-block">
        <div id="notify" class="alert alert-success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>

            <div class="message"></div>
        </div>
        <div class="card-body">


            <form method="post" id="data_form" class="form-horizontal">

                <h5><?php echo $this->lang->line('Edit table') ?></h5>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="table_name"><?php echo $this->lang->line('table') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="table Name" value="<?php echo $table['table_num'] ?>" class="form-control margin-bottom required" name="table_num">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="table_name"><?php echo $this->lang->line('Description') ?></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="table Short Description" value="<?php echo $table['description'] ?>" class="form-control margin-bottom required" name="description">
                    </div>
                </div> 
                <input type="hidden" name="table_id" value="<?php echo $table['id'] ?>">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-4">
                        <input type="submit" id="submit-data" class="btn btn-success margin-bottom"
                               value="<?php echo $this->lang->line('Edit Kitchen') ?>" data-loading-text="Adding...">
                        <input type="hidden" value="tables/edittables" id="action-url">
                    </div>
                </div>


            </form>
        </div>
    </div>
</article>

