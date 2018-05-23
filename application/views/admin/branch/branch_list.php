<!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Branches</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <!--   <table id="example1" class="table table-bordered table-striped "> -->
            <div class="btn-group">
                <a href="<?=site_url('admin/branch/add')?>" id="editable_table_new" class="btn btn-info pull-right">
                    Add Branch <i class="fa fa-plus"></i>
                </a>
                </div>
            <table id="example1" class="table  table-striped table-bordered table-hover dataTable no-footer" id="editable_table" role="grid">
                <thead>
                <tr>
                    <th>Branch Name</th>
                    <th style="width: 100px;" class="text-right">Option</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count ($all_branch)): ?>
                    <?php foreach($all_branch as $row): ?>
                        <tr>
                            <td><?php echo $row['branch_name']; ?></td>
                            <td class="text-right"><a href="<?= site_url('admin/branch/edit/'.$row['branch_id']); ?>" class="btn btn-info btn-flat">Edit</a><a href="<?= site_url('admin/branch/del/'.$row['branch_id']); ?>" class="btn btn-danger btn-flat">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>No Records found</tr>


                <?php endif;?>
                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
<script>
    $("#view_branch").addClass('active');
</script>
/