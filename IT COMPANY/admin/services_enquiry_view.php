<?php include 'includeadmin/header.php';
include 'includeadmin/db_connect.php';
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
        <h1>Manager Enquiry
            <small> Solutions Enquiry Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#">Solutions Enquiry Details View</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                
                    <div class="box-header with-border" style="margin-bottom:20px;">
                        <h3 class="box-title">Solutions Enquiry Details</h3>
                    </div>
                        
                    <div class="box-body">
                        <form role="form" action="" method="POST">
                            <?php
                                $message = $_GET['services_enquiry_id'];
                                $enquiry = "SELECT * FROM `product_enquiry` AS pe LEFT JOIN services AS se ON se.services_id = pe.product_enquiry_service_id WHERE product_enquiry_status = 1 AND services_status= 1 AND product_enquiry_id= '$message'";
                                $enquiry_query = mysqli_query($con, $enquiry);
                               $enquiry_list_view = mysqli_fetch_array($enquiry_query);
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Person Name</label>
                                    <input type="text" class="form-control" name="Enquiry_title"
                                        value="<?php echo $enquiry_list_view['product_enquiry_name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Solutions Name</label>
                                    <input type="text" class="form-control" name="Enquiry_title"
                                        value="<?php echo $enquiry_list_view['services_title']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Person Email<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $enquiry_list_view['product_enquiry_email']; ?>" readonly>
                                </div>
                            </div>
                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Person Phone<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $enquiry_list_view['product_enquiry_phone']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Person Interest<span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $enquiry_list_view['product_enquiry_details']; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Person description </label>
                                    <textarea name="Enquiry_description" cols="8" rows="3" class="form-control"
                                        readonly><?php echo $enquiry_list_view['product_enquiry_interest']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Solutions Image </label>
                                    <br>

                                    <img
                                                        src='<?php echo ROOT_URL_ADMIN ."upload/services/" . $enquiry_list_view['services_image']; ?>'
                                                        alt="" width="150px" height="150px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <a target="_blank" href="mailto:'<?php echo $enquiry_list_view['product_enquiry_email']; ?>'" class="btn btn-success"><i class="fa fa-reply"></i> Replay To Mail</a>
                                <a target="_blank" href="tel:'<?php echo $enquiry_list_view['product_enquiry_phone']; ?>'" class="btn btn-danger" style="float:right;"><i class="fa fa-reply"></i> Call To Person</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
</div>

<?php include 'includeadmin/footer.php'; ?>