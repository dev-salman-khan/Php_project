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

        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Basic Details
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="remove"
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
                                                    placeholder="Company Name"
                                                    value="<?php echo $general['general_companyname'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Contact Person Name</label><span
                                                    style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_contactpersonname"
                                                    placeholder="Company Contact Person Name"
                                                    value="<?php echo $general['general_contactpersonname'] ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Company Phone </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_phoneno"
                                                    placeholder="Company Phone"
                                                    value="<?php echo $general['general_phoneno'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Mobile No.</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_mobilno"
                                                    placeholder="Mobile No."
                                                    value="<?php echo $general['general_mobilno'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">FAX No.</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_fax"
                                                    placeholder="FAX No." value="<?php echo $general['general_fax'] ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Email </label><span style="color:red;">*</span>
                                                <input type="email" class="form-control" name="general_emailid"
                                                    placeholder="Company Email"
                                                    value="<?php echo $general['general_emailid'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">
                                                    Company Website <small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_website"
                                                    placeholder="Company Website "
                                                    value="<?php echo $general['general_website'] ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">
                                                    Company Address </label><span style="color:red;">*</span>
                                                <textarea name="general_address"
                                                    placeholdder=" course features description" cols="8" rows="3"
                                                    class="form-control"
                                                    required><?php echo $general['general_address'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company iframe address Link</label><span style="color:red;">*</span>
                                                <textarea name="general_iframe_address"
                                                    placeholdder=" course features description" cols="8" rows="3"
                                                    class="form-control"
                                                    required><?php echo $general['general_iframe_address'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company City </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_city"
                                                    placeholder="Company City"
                                                    value="<?php echo $general['general_city'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company State</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="genaral_statename"
                                                    placeholder="Company state"
                                                    value="<?php echo $general['genaral_statename'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Pincode</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_pincode"
                                                    placeholder="Company Pincode"
                                                    value="<?php echo $general['general_pincode'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Country</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_county"
                                                    placeholder="Company country"
                                                    value="<?php echo $general['general_county'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GSTIN </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_gstno"
                                                    placeholder="" value="<?php echo $general['general_gstno'] ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GSTIN Percentage(%)</label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_gstpercentage"
                                                    placeholder=""
                                                    value="<?php echo $general['general_gstpercentage'] ?>" required>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>PAN NO </label><span style="color:red;">*</span>
                                                <input type="text" class="form-control" name="general_panno"
                                                    placeholder="" value="<?php echo $general['general_panno'] ?>"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Facebook <small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_facebook"
                                                    placeholder="" value="<?php echo $general['general_facebook'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Twitter<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_twitter"
                                                    placeholder="" value="<?php echo $general['general_twitter'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Linkedin<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_linkedin"
                                                    placeholder="" value="<?php echo $general['general_linkedin'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pinterest<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_pinterest"
                                                    placeholder="" value="<?php echo $general['general_pinterest'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Whatsapp<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_whatsapp"
                                                    placeholder="Link" value="<?php echo $general['general_whatsapp'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Instagram<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_instagram"
                                                    placeholder="" value="<?php echo $general['general_instagram'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Google-plus<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_googleplus"
                                                    placeholder="" value="<?php echo $general['general_googleplus'] ?>"
                                                    >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Skype<small style="color:blue">['Does't have a link put #']
                                                </small></label>
                                                <input type="text" class="form-control" name="general_skype"
                                                    placeholder="" value="<?php echo $general['general_skype'] ?>"
                                                    >
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
                    <div class="box box-primary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Advance Setting
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="remove"
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
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_financial_start_date'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Financial Year End</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_financial_end_date"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_financial_end_date'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Holiday Year Start </label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_holiday_start_date"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_holiday_start_date'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Holiday Year End </label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_holiday_end_date"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_holiday_end_date'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full day Start time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_full_dat_starttime"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_full_dat_starttime'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full day End time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_full_dat_endtime"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_full_dat_endtime'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Half day Start time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_half_day_starttime"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_half_day_starttime'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""> Half day End time</label><span style="color:red;">*</span>
                                            <input type="text" class="form-control" name="general_half_day_endtime"
                                                placeholder="Company Name"
                                                value="<?php echo $general['general_half_day_endtime'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for=""> Travel Link</label><span style="color:red;">*</span> -->
                                            <input type="hidden" class="form-control" name="travel_link"
                                                placeholder=""
                                                value="<?php echo $general['travel_link'] ?>" required
                                                >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label for="">Accommodation Link</label><span style="color:red;">*</span> -->
                                            <input type="hidden" class="form-control" name="accommodation_link"
                                                placeholder=""
                                                value="<?php echo $general['accommodation_link'];?>" required
                                                >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image<span class="text-danger">*</span>
                                                <small style="color:blue">[For Best View Of Logo height="200px" /Width="60px"]
                                                </small></label>
                                            <input type="file" class="form-control" name="general_imgicon">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image</lable>
                                            <br>
                                            <img src='<?php echo ROOT_URL_ADMIN ."upload/general/logo/" . $general['general_imgicon']; ?>'
                                        width='300px' height='100px'>
                                        <input type="hidden" value="<?php echo  $general['general_imgicon']; ?>" class="form-control" name="general_imgicon_old">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image 2<span class="text-danger">*</span>
                                                <small style="color:blue">[For Best View Of Logo height="200px" /Width="60px"]
                                                </small></label>
                                            <input type="file" class="form-control" name="image_2">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Company Logo image2</lable>
                                            <br>
                                            <img src='<?php echo ROOT_URL_ADMIN ."upload/general/logo/" . $general['image_2']; ?>'
                                        width='300px' height='100px'>
                                        <input type="hidden" value="<?php echo  $general['image_2']; ?>" class="form-control" name="image_2_old">

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
                    <div class="box box-primary">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Advance Setting
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-seconddary btn-sm" data-widget="remove"
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
                                                class="form-control"
                                                required><?php echo $general['general_about_us'] ?></textarea>
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
                    <button type="submit" class="btn btn-primary" style="padding:10px 50px;"
                        name="update_general">Update</button>
                </div>
            </div>
        </div>

        </form>
        <?php
          
            if (isset($_POST['update_general'])) {
                $general_id = $_GET['general_id'];
                $general_companyname = $_POST['general_companyname'];
                $travel_link = $_POST['travel_link'];
                $accommodation_link = $_POST['accommodation_link'];
                $general_contactpersonname = $_POST['general_contactpersonname'];
                $general_phoneno = $_POST['general_phoneno'];
                $general_mobilno = $_POST['general_mobilno'];
                $general_fax = $_POST['general_fax'];
                $general_emailid = $_POST['general_emailid'];
                $general_website = $_POST['general_website'];
                $general_address = $_POST['general_address'];
                $general_iframe_address = $_POST['general_iframe_address'];
                $general_city = $_POST['general_city'];
                $genaral_statename = $_POST['genaral_statename'];
                $general_pincode = $_POST['general_pincode'];
                $general_county = $_POST['general_county'];
                $general_gstno = $_POST['general_gstno'];
                $general_gstpercentage = $_POST['general_gstpercentage'];
                $general_panno = $_POST['general_panno'];
                $general_facebook = $_POST['general_facebook'];
                $general_twitter = $_POST['general_twitter'];
                $general_linkedin = $_POST['general_linkedin'];
                $general_pinterest = $_POST['general_pinterest'];
                $general_whatsapp = $_POST['general_whatsapp'];
                $general_instagram = $_POST['general_instagram'];
                $general_googleplus = $_POST['general_googleplus'];
                $general_imgicon = $_FILES['general_imgicon']['name'];
                $general_skype = $_POST['general_skype'];
                $general_financial_start_date = $_POST['general_financial_start_date'];
                $general_financial_end_date = $_POST['general_financial_end_date'];
                $general_holiday_start_date = $_POST['general_holiday_start_date'];
                $general_holiday_end_date = $_POST['general_holiday_end_date'];
                $general_full_dat_starttime = $_POST['general_full_dat_starttime'];
                $general_full_dat_endtime = $_POST['general_full_dat_endtime'];
                $general_half_day_starttime = $_POST['general_half_day_starttime'];
                $general_half_day_endtime = $_POST['general_half_day_endtime'];
                $general_about_us = $_POST['general_about_us'];
                $general_status = 1;
                $general_entrydt = date('d-m-y h:i:sa');
                $general_imgicon_old = $_POST['general_imgicon_old'];
                $image_2_old = $_POST['image_2_old'];
                $image_2 = $_FILES['image_2']['name'];

                // putting condition for database
                if (empty($general_imgicon)) {
                    $update_image = $general_imgicon_old ;
                }
                else{
                    $allowed_extension = array('gif','png','jpg','jpeg');
                    $general_imgicon = $_FILES['general_imgicon']['name'];
                    $file_extension = pathinfo($general_imgicon, PATHINFO_EXTENSION);
                    if (!in_array($file_extension,$allowed_extension)) {
                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                        header('general_setting.php');
                    }
                    if (file_exists("../upload/general/logo/".$general_imgicon)) {
                        $_SESSION['errorMessage'] = "Image Already Exists " .$general_imgicon;
                        header('general_setting.php');
                    }
                    $update_image = $general_imgicon ;
                }
                if (empty($image_2)) {
                    $update_image2 = $image_2_old ;
                }
                else{
                    $allowed_extension = array('gif','png','jpg','jpeg');
                $image_2 = $_FILES['image_2']['name'];
                   
                    $file_extension = pathinfo($image_2, PATHINFO_EXTENSION);
                    if (!in_array($file_extension,$allowed_extension)) {
                        $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                        header('general_setting.php');
                    }
                    if (file_exists("../upload/general/logo/".$image_2)) {
                        $_SESSION['errorMessage'] = "Image Already Exists " .$image_2;
                        header('general_setting.php');
                    }
                    $update_image2 = $image_2 ;
                }
                // inseting data to data base
               $query ="UPDATE `general_tbl` SET `general_imgicon`='$update_image',`general_companyname`='$general_companyname',`general_contactpersonname`='$general_contactpersonname',`general_address`='$general_address',`general_pincode`='$general_pincode',`general_city`='$general_city',`general_county`='$general_county',`general_phoneno`='$general_phoneno',`general_emailid`='$general_emailid',`general_entrydt`='$general_entrydt',`general_status`='$general_status',`general_gstno`='$general_gstno',`general_gstpercentage`='$general_gstpercentage',`general_mobilno`='$general_mobilno',`general_website`='$general_website',`general_panno`='$general_panno',`general_financial_start_date`='$general_financial_start_date',`general_financial_end_date`='$general_financial_end_date',`genaral_statename`='$genaral_statename',`general_half_day_starttime`='$general_half_day_starttime',`general_half_day_endtime`='$general_half_day_endtime',`general_full_dat_starttime`='$general_full_dat_starttime',`general_full_dat_endtime`='$general_full_dat_endtime',`general_holiday_start_date`='$general_holiday_start_date',`general_holiday_end_date`='$general_holiday_end_date',`general_fax`='$general_fax',`general_iframe_address`='$general_iframe_address',`general_facebook`='$general_facebook',`general_twitter`='$general_twitter',`general_linkedin`='$general_linkedin',`general_pinterest`='$general_pinterest',`general_whatsapp`='$general_whatsapp',`general_instagram`='$general_instagram',`general_googleplus`='$general_googleplus',`general_skype`='$general_skype',`general_about_us`='$general_about_us',`travel_link`='$travel_link',`accommodation_link`='$accommodation_link',`image_2`='$update_image2' WHERE `general_id`='$general_id'";
                    $updatequery = mysqli_query($con, $query);
                    if ($updatequery){
                         // upload new image if UPDATE Image
                         if (!empty($general_imgicon)) {
                                    // moveing file to the folder
                                move_uploaded_file($_FILES ["general_imgicon"]["tmp_name"], "../upload/general/logo/".$_FILES["general_imgicon"]["name"]);
                                unlink("../upload/general/logo/".$general_imgicon_old);
                         }
                         if (!empty($image_2)) {
                            // moveing file to the folder
                        move_uploaded_file($_FILES ["image_2"]["tmp_name"], "../upload/general/logo/".$_FILES["image_2"]["name"]);
                        unlink("../upload/general/logo/".$image_2_old);
                 }
                                $_SESSION['SuccessMessage'] = " Data Update Successfully!";
                                        ?>
                                    <script>
                                    location.replace("general_setting.php")
                                    </script>
                                <?php
                    } 
                    else {
                         $_SESSION['errorMessage'] = "Un Execpted Error!";
                         ?>
                         <script>
                         location.replace("general_setting.php")
                         </script>
                     <?php
                    }
            } 
                    ?>

    </div>

</div>

<script>
function numberonly(input) {
    var num = /[^0-9]/gi;
    input.value = input.value.replace(num, "")
}
</script>

<?php include 'includeadmin/footer.php' ?>

