<div class="content-body">
    <div class="card">
        <div class="card-header">
            <h5><?php echo $this->lang->line('kitchen_order') ?> <a
                        href="<?php echo base_url('kitchen') ?>"
                        class="btn btn-primary btn-sm rounded">
                    <?php echo $this->lang->line('Manage kitchen') ?>
                </a>  <a
                        href="<?php echo base_url('kitchen') ?>?group=yes"
                        class="btn btn-purple btn-sm rounded"><i class="ft-grid"></i></a> <a
                        href="<?php echo base_url('kitchen') ?>"
                        class="btn btn-purple btn-sm rounded"><i class="ft-list"></i></a></h5>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
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


                <table id="kitchentable" class="table table-striped table-bordered zero-configuration" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('Name') ?></th>
                        <th><?php echo $this->lang->line('Description') ?></th>
                        <th><?php echo $this->lang->line('Action') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if($kitchens) { foreach($kitchens as $key=>$kitchen){ ?>
                            <tr>
                                <td><?php echo $key+1; ?></td> 
                                <td><?php echo $kitchen['kitchen_name']; ?></td> 
                                <td><?php echo $kitchen['kitchen_description']; ?></td> 
                                <td>
                                    <a href="<?php echo base_url('kitchen/view_orders/'.$kitchen['id'])?>" class="btn btn-success btn-sm " title='View Orders'><span class="fa fa-view"></span><?php echo 'View Orders' ?></a>
                                    <a href="<?php echo base_url('kitchen/edit/'.$kitchen['id'])?>" class="btn btn-primary btn-sm " title='Edit'><span class="fa fa-pencil"></span><?php echo $this->lang->line('edit') ?></a>
                                    <a href="javascript:void(0)" data-object-id='<?php echo $kitchen['id']; ?>' class="btn btn-danger btn-sm delete-object" title='Delete'><span class="fa fa-trash"></span><?php echo $this->lang->line('delete') ?></a>
                                </td> 
                            </tr>
                        <?php } } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo $this->lang->line('Name') ?></th>
                        <th><?php echo $this->lang->line('Description') ?></th>
                        <th><?php echo $this->lang->line('Action') ?></th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function () {

            //datatables
            $('#kitchentable').DataTable({
                responsive: true, <?php datatable_lang();?> dom: 'Blfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        footer: true,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ],
            });

        });
    </script>
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