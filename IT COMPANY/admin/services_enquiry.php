<?php include 'includeadmin/header.php';
  ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php'; ?>
</aside>


<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_SESSION['errorMessage'])) {
            ?>
            <div class="alert alert-danger">
                <strong>Action Denied! </strong> <?php echo $_SESSION['errorMessage']; ?>
            </div>
            <?php
                unset($_SESSION['errorMessage']);
            }
            ?>
            <?php
            if (isset($_SESSION['SuccessMessage'])) {
            ?>
            <div class="alert alert-success">
                <strong>Action Accepted! </strong> <?php echo $_SESSION['SuccessMessage']; ?>
            </div>
            <?php
                unset($_SESSION['SuccessMessage']);
            }
            ?>
        </div>
    </div>
    <section class="content-header">
        <h1> Solutions Enquiry List
            <small>Manager  Enquiry</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active">Solutions Enquiry List</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Solutions Enquiry List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="enquiry" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Username Name</th>
                                        <th>Solutions  Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Description</th>                            
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $enquiry = "SELECT * FROM `product_enquiry` AS pe LEFT JOIN services AS se ON se.services_id = pe.product_enquiry_service_id WHERE product_enquiry_status = 1 AND services_status= 1  ORDER BY product_enquiry_id DESC";
                                $enquiry_query = mysqli_query($con, $enquiry);
                                $i = 1;
                                while ($enquiry_list = mysqli_fetch_array($enquiry_query)) {
                                ?>
                                    <tr>
                                        <td><?php echo "$i"; ?></td>
                                        <td><?php echo $enquiry_list['product_enquiry_name']; ?></td>
                                        <td><?php echo $enquiry_list['services_title']; ?></td>
                                        <td> <?php echo $enquiry_list['product_enquiry_phone']; ?></td>
                                        <td><?php echo $enquiry_list['product_enquiry_email']; ?></td>
                                        <td><?php echo $enquiry_list['product_enquiry_interest']; ?></td>
                                        <td> <a href="services_enquiry_view.php?services_enquiry_id=<?php echo $enquiry_list['product_enquiry_id']; ?>">
                                                <button onclick="return updateenquiry()" type="button" title="View Services Enquiry"
                                                    class="btn btn-success"><i class="fa fa-eye"></i>&nbsp;View</button>
                                            </a>
                                            |
                                            <a  href="services_enquiry_delete.php?services_enquiry_id=<?php echo $enquiry_list['product_enquiry_id']; ?>">
                                                <button onclick="return checkdelete()" type="button"
                                                    class="btn btn-danger" title="Delete Services Enquiry"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                $i++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includeadmin/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#enquiry').DataTable();
});
function checkdelete() {
    return confirm("Are You Sure! You Want To Delete This Services enquiry");
}
</script>