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
        <h1> Enquiry List
            <small>Manager Enquiry</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="enquiry.php">Enquiry List</a></li>
        </ol>
    </section>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Enquiry List</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="enquiry" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Username Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Description</th>                            
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                include 'includeadmin/db_connect.php';
                                $enquiry = "select * from `message_enquiry` where message_enquiry_status = 1 ORDER BY message_enquiry_id DESC";
                                
                                $enquiry_query = mysqli_query($con, $enquiry);
                                $i = 1;
                                while ($enquiry_list = mysqli_fetch_array($enquiry_query)) {
                                ?>
                                    <tr>
                                        <td><?php echo "$i"; ?></td>
                                        <td><?php echo $enquiry_list['message_enquiry_name']; ?></td>
                                        <td> <?php echo $enquiry_list['message_enquiry_email']; ?></td>
                                        <td><?php echo $enquiry_list['message_enquiry_subject']; ?></td>
                                        <td><?php echo $enquiry_list['message_enquiry_message']; ?></td>
                                        <td> <a href="enquiry_view.php?enquiry_id=<?php echo $enquiry_list['message_enquiry_id']; ?>">
                                                <button onclick="return updateenquiry()" type="button" title="View Enquiry"
                                                    class="btn btn-success"><i class="fa fa-eye"></i>&nbsp;View</button>
                                            </a>
                                            |
                                            <a  href="enquiry_delete.php?enquiry_id=<?php echo $enquiry_list['message_enquiry_id']; ?>">
                                                <button onclick="return checkdelete()" type="button"
                                                    class="btn btn-danger" title="Delete Enquiry"><i class="fa fa-trash"></i>&nbsp;Delete</button>
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
    return confirm("Are You Sure! You Want To Delete This enquiry");
}
</script>