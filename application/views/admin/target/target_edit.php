<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Product</h3>
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

                    <?php echo form_open(site_url('admin/target/edit/'.$target['target_id']), 'class="form-horizontal"' )?>
                    <div class="form-group">
                        <label for="product_ids" class="col-sm-2 control-label">Product Name</label>

                        <div class="col-sm-9">
                            
                            <select name="product_id" class="form-control">
                        		<option value="<?php echo $product['product_id']?>" selected> <?php echo $product['product_name']?></option>
                        		<?php 
                        		foreach ($products as $p)
                                { if($p['product_id'] != $product['product_id']) {?>
                                    <option value="<?=$p['product_id']; ?>"><?=$p['product_name'];?></option>
                                <?php } }?>
                        		
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="branch_id" class="col-sm-2 control-label">Branch Name</label>

                        <div class="col-sm-9">
                            
                            <select name="branch_id" class="form-control">
                        		<option value="<?php echo $branch['branch_id']?>" selected> <?php echo $branch['branch_name']?></option>
                        		<?php 
                        		foreach ($branches as $b)
                                { if($b['branch_id'] != $branch['branch_id']) {?>
                                    <option value="<?=$b['branch_id']; ?>"><?=$b['branch_name'];?></option>
                                <?php } }?>
                        		
                        	</select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="product" class="col-sm-2 control-label">Volume</label>
                        <div class="col-sm-9">
                            <input type="text" name="target_volume" class="form-control" value="<?php echo $target['target_volume']; ?>" placeholder="<?php echo $target['target_volume']; ?>">
                        </div>
                       </div>
                     <div class="form-group">
                        <label for="product" class="col-sm-2 control-label">Value</label>
                        <div class="col-sm-9">
                            <input type="text" name="target_value" class="form-control" value="<?php echo $target['target_value']; ?>" placeholder="<?php echo $target['target_value']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product" class="col-sm-2 control-label">Duration</label>
                        <div class="col-sm-9">
                        	<select name="target_duration" class="form-control">
                        		<option value="<?php echo $target['target_duration']?>" selected> <?php echo $target['target_duration']?></option>
                        		<option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>
                                <option value="YTD">YTD</option>
                        		
                        	</select>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Update Product" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>