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
        <h1>Manager General Setting
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">General Setting</a></li>
        </ol>
    </section>
    <div class="content ">
        <!-- section for frist start  -->
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-secondary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Basic Details
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>

                        </div>

                        <div class="box-body pad">
                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                                <?php
                                include 'includeadmin/db_connect.php';
                                $user_fetch = "select * from `general_tbl` where `general_status`= '1'";
                                $query = mysqli_query($con, $user_fetch);
                                $general = mysqli_fetch_array($query);
               
                            ?>
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Name</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_companyname"
                                                    placeholder=""
                                                    value="<?php echo $general['general_companyname'] ?>" required
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Contact Person Name</label><span
                                                    style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_contactpersonname"
                                                    placeholder="Company Contact Person Name"
                                                    value="<?php echo $general['general_contactpersonname'] ?>" required
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Company Phone </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_phoneno"
                                                    placeholder="Company Phone"
                                                    value="<?php echo $general['general_phoneno'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Mobile No.</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_mobilno"
                                                    placeholder="Mobile No."
                                                    value="<?php echo $general['general_mobilno'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">FAX No.</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_fax"
                                                    placeholder="FAX No." value="<?php echo $general['general_fax'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Email </label><span style="color:red;">*</span>
                                                <input type="email" class="form-control" name="general_emailid"
                                                    placeholder="Company Email"
                                                    value="<?php echo $general['general_emailid'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">
                                                    Company Website </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_website"
                                                    placeholder="Company Website "
                                                    value="<?php echo $general['general_website'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">
                                                    Company Address </label><span style="color:red;">*</span>
                                                <textarea name="general_address"
                                                    placeholdder=" course features description" cols="8" rows="3"
                                                    class="form-control" required
                                                    readonly><?php echo $general['general_address'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company iframe address Link </label><span style="color:red;">*</span>
                                                <textarea name="general_iframe_address"
                                                    placeholdder=" course features description" cols="8" rows="3"
                                                    class="form-control" required
                                                    readonly><?php echo $general['general_iframe_address'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company City </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_city"
                                                    placeholder="Company City"
                                                    value="<?php echo $general['general_city'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company State</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="genaral_statename"
                                                    placeholder="Company state"
                                                    value="<?php echo $general['genaral_statename'] ?>" required
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Pincode</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_pincode"
                                                    placeholder="Company Pincode"
                                                    value="<?php echo $general['general_pincode'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Country</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_county"
                                                    placeholder="Company country"
                                                    value="<?php echo $general['general_county'] ?>" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GSTIN </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_gstno"
                                                    placeholder="" value="<?php echo $general['general_gstno'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GSTIN Percentage(%)</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_gstpercentage"
                                                    placeholder=""
                                                    value="<?php echo $general['general_gstpercentage'] ?>" required
                                                    readonly>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PAN NO </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_panno"
                                                    placeholder="" value="<?php echo $general['general_panno'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Facebook </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_facebook"
                                                    placeholder="" value="<?php echo $general['general_facebook'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Twitter</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_twitter"
                                                    placeholder="" value="<?php echo $general['general_twitter'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Linkedin</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_linkedin"
                                                    placeholder="" value="<?php echo $general['general_linkedin'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pinterest</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_pinterest"
                                                    placeholder="" value="<?php echo $general['general_pinterest'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Whatsapp Link</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_whatsapp"
                                                    placeholder="" value="<?php echo $general['general_whatsapp'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Instagram</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_instagram"
                                                    placeholder="" value="<?php echo $general['general_instagram'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Google-plus</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_googleplus"
                                                    placeholder="" value="<?php echo $general['general_googleplus'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Skype</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_skype"
                                                    placeholder="" value="<?php echo $general['general_skype'] ?>"
                                                    required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- section for frist end -->
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-secondary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Advance Setting
                                <small></small>
                            </h2>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>

                        </div>
                        <div class="box-body pad">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Financial Year Start </label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_financial_start_date"
                                                placeholder=""
                                                value="<?php echo $general['general_financial_start_date'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Financial Year End</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_financial_end_date"
                                                placeholder=""
                                                value="<?php echo $general['general_financial_end_date'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Holiday Year Start </label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_holiday_start_date"
                                                placeholder=""
                                                value="<?php echo $general['general_holiday_start_date'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Holiday Year End </label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_holiday_end_date"
                                                placeholder=""
                                                value="<?php echo $general['general_holiday_end_date'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full day Start time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_full_dat_starttime"
                                                placeholder=""
                                                value="<?php echo $general['general_full_dat_starttime'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full day End time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_full_dat_endtime"
                                                placeholder=""
                                                value="<?php echo $general['general_full_dat_endtime'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Half day Start time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_half_day_starttime"
                                                placeholder=""
                                                value="<?php echo $general['general_half_day_starttime'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Half day End time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_half_day_endtime"
                                                placeholder=""
                                                value="<?php echo $general['general_half_day_endtime'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for=""> Travel Link</label><span style="color:red;">*</span> -->
                                            <input type="hidden" class="form-control" name="travel_link"
                                                placeholder=""
                                                value="<?php echo $general['travel_link'] ?>" required
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for="">Accommodation Link</label><span style="color:red;">*</span> -->
                                            <input type="hidden" class="form-control" name="accommodation_link"
                                                placeholder=""
                                                value="<?php echo $general['accommodation_link'];?>" required
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image</lable>
                                                <br>
                                                <img src='<?php echo ROOT_URL_ADMIN ."upload/general/logo/" . $general['general_imgicon']; ?>'
                                                    width='300px' height='100px'>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image 2</lable>
                                                <br>
                                                <img src='<?php echo ROOT_URL_ADMIN ."upload/general/logo/" . $general['image_2']; ?>'
                                                    width='300px' height='100px'>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-secondary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Advance Setting
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body pad">
                            <div class="box-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">About us<span class="text-danger">*</span>
                                                <small style="color:blue">['Keep 100-150 words for small description.
                                                    for footer part only.']
                                                </small></label>
                                            <textarea name="general_about_us"
                                                placeholdder=" course features description" cols="8" rows="3"
                                                class="form-control" required
                                                readonly><?php echo $general['general_about_us'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <a href="edit_general.php?general_id=<?php echo $general['general_id']; ?>">
                        <button onclick="return updatecourse()" type="button" class="btn btn-primary"
                            style="padding:10px 50px;" id="course">Edit</button>
                    </a>

                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "")
}
</script>
<script>
$(document).ready(function() {
    $('#course').DataTable();
});

function updatecourse() {
    return confirm("Are You Sure! You Want To Edit General Setting");
}
</script>

<?php include 'includeadmin/footer.php' ?>

<?php
            include 'includeadmin/db_connect.php';

 
    ?>