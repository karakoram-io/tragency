<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/head'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header'); ?>
        <?php $this->load->view('admin/include/sidebar'); ?>

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                <div class="row mb-4">
                    <div class="col-md-12 mb-3">
                        <div class="card text-left">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <h3 class="mr-2">Destinations</h3>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="float-right">
                                            <a href="<?php echo base_url() ?>admin/destinations/add"
                                                class="btn btn-primary btn-block btn-rounded ">Add New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php $this->load->view('admin/include/message-alert'); ?>
                                <div class="table-responsive table table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th width="20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($destinations) > 0) {
                                                foreach ($destinations as $destination) {
                                                    ?>
                                                    <tr>
                                                        <td class="text-right">#
                                                            <?php echo $destination->id; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $destination->name; ?>
                                                        </td>
                                                        <td>
                                                            <img class="img-thumbnail" style="height: 103px;width: auto;" src="<?php echo base_url() ?>uploads/destinations/<?php echo $destination->image; ?>
                                                            ">
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="text-primary mr-2"
                                                                href="<?php echo $this->controllerUrl . 'edit/' . $destination->id; ?>">
                                                                <span class="btn btn-sm btn-primary">
                                                                    <i class="nav-icon i-Pen-3"></i> Edit
                                                                </span>
                                                            </a>
                                                            <?php
                                                            if ($destination->status) {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $destination->id ?>/<?php echo $destination->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-warning">
                                                                        <i class="fa fa trash"></i>Deactivate
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php echo $this->controllerUrl ?>activate_deactivate/<?php echo $destination->id ?>/<?php echo $destination->status ?>"
                                                                    class="text-primary mr-2">
                                                                    <span class="btn btn-sm btn-success">
                                                                        <i class="fa fa trash"></i>Activate
                                                                    </span>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>
                                                            <a onclick="deleteRow(<?php echo $destination->id ?>)"
                                                                class="text-primary mr-2">
                                                                <span class="btn btn-sm btn-danger">
                                                                    <i class="fa fa trash"></i>Delete
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="pagination">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1"></div>
        </div>
    </div>
    <?php $this->load->view('admin/include/footerscript'); ?>
    <script>
        function deleteRow(id) {
            if (confirm("Are you sure?")) {
                location.href = "<?php echo base_url() ?>admin/destinations/delete/" + id;
            }
        }
    </script>
</body>

</html>