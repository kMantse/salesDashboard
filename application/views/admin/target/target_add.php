<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Target</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body my-form-body">
                    <?php if(isset($msg) || validation_errors() !== ''): ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            <?= validation_errors();?>
                            <?= isset($msg)? $msg: ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/target/add'), 'class="form-horizontal"');  ?>
                     <div class="form-group">
                        <label for="product_name" class="col-sm-2 control-label">Product</label>

                        <div class="col-sm-9">
                            <select  name="product_id" class="form-control">
                                <option value=""> Select Product</option>
                                <?php
                                foreach ($get_all_product as $value)
                                { ?>
                                    <option value="<?=$value->product_id?>"><?=$value->product_name?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="branch_name" class="col-sm-2 control-label"> Branch</label>

                        <div class="col-sm-9">
                            <select  name="branch_id" class="form-control">
                                <option value="">Select Branch</option>
                                <?php
                                foreach ($branch_drop_down as $value)
                                { ?>
                                    <option value="<?= $value->branch_id;?>"><?= $value->branch_name;?></option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="target_duration" class="col-sm-2 control-label">Duration</label>

                        <div class="col-sm-9">
                            <select name="user_role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="">Daily</option>
                                <option value="">Weekly</option>
                                <option value="">Monthly</option>
                                <option value="">YTD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_no" class="col-sm-2 control-label">Target Volume</label>

                        <div class="col-sm-9">
                            <input type="number" name="target_volume" class="form-control" id="target_volume" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile_no" class="col-sm-2 control-label">Target Value</label>

                        <div class="col-sm-9">
                            <input type="number" name="target_value" class="form-control" id="target_value" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Add Target" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close( ); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>


<script>
    $("#add_target").addClass('active');
</script>