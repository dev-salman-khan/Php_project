<?php include 'includeadmin/header.php'; 
 ?>
<aside class="main-sidebar">
    <?php include 'includeadmin/aside.php' ?>
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
        <h1>Manager Terms & Conditions
            <small>Terms & Conditions</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="../admin/pages_term.php">Terms & Conditions</a></li>
        </ol>
    </section>
    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `term_codition`  where `term_codition_status`= '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
    <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <form role="form" action="" method="POST">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Welcome text </label>
                                    <input type="text" class="form-control" id="" name="term_condition_title"
                                        placeholder="Enter The Welcome Text" disabled  value="<?php echo $term_list['term_condition_title'];?>" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about university"> Codition Description </label>
                                    <textarea name="term_codition_description" disabled id="about_university"
                                        placeholder="About university" class="form-control"><?php echo $term_list['term_codition_description'];?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-footer">
                            <a href="edit_term.php?condition_id=<?php echo $term_list['term_codition_id']; ?>">
                                <button onclick="return updatecourse()" type="button" class="btn btn-primary"
                                    style="padding:10px 50px;" id="course"> <i class="fa fa-edit"></i>&nbsp;Edit</button>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includeadmin/footer.php' ?>
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
</script>
<script src="https://ckeditor.com/latest/ckeditor.js"></script>
<script>
CKEDITOR.replace('about_university');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>
<script>
function updatecourse() {
    return confirm("Are You Sure! You Want To Edit Term & Condition  Setting");
}
</script>
   