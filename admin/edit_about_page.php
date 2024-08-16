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
        <h1>Manager About Us Setting
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="">About Us Setting</a></li>
        </ol>
    </section>
    <div class="content">
        <!-- section one start  -->
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box ">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Section 1 Edit
                                <small></small>
                            </h2>

                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box-body pad">
                            <form role="form" method="POST" enctype="multipart/form-data">
                                <?php
                                     $about_id = $_GET['about_id'];
                                    $user_fetch = "select * from `about` where `about_status`= '1' and about_id ='$about_id' ";
                                    $home_query = mysqli_query($con, $user_fetch);
                                    $home = mysqli_fetch_array($home_query);
                               ?>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Feature Image<span style="color:red;">* </span>
                                                        <small style="color:blue">[For Best View Of
                                                            Feature Width="319px" Height="336px"]
                                                        </small><br>
                                                        <span style="color:red;"> When You Want Insert to New Image
                                                            Rename Image Name</span>
                                                    </label>
                                                    <input type="file" id="file-upload" accept="image/*"
                                                        onchange="previewImage(event);" class="form control"
                                                        name="about_img_1">
                                                    <input type="hidden" class="form control" name="about_img_1_old"
                                                        value="<?php echo $home['about_img_1'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Feature Image 2<span style="color:red;">*</span>
                                                        <small style="color:blue">[For Best View Of
                                                            Feature Width="319px" Height="336px"]
                                                        </small></label>
                                                    <input type="file" id="file-upload" accept="image/*"
                                                        onchange="previewImage2(event);" class="form control"
                                                        name="about_img_2">
                                                    <input type="hidden" class="form control" name="about_img_2_old"
                                                        value="<?php echo $home['about_img_2'];?>">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Feature Image<span style="color:red;">* </span>

                                                    </label>
                                                    <br>
                                                    <img src='<?php echo ROOT_URL_ADMIN ."upload/pages/about/" . $home['about_img_1']; ?>'
                                                        width='100%' height='200px' id="preview-selected-image">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Feature Image<span style="color:red;">*</span>
                                                    </label>
                                                    <br>
                                                    <img src='<?php echo ROOT_URL_ADMIN ."upload/pages/about/" . $home['about_img_2']; ?>'
                                                        width='100%' height='200px' id="preview-selected-image2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Title <span style="color:red;">*</span><small
                                                        style="color:blue">[For Best View for title Characters
                                                        Should be 40 to 55 ]
                                                    </small> </label>
                                                <input type="text" class="form-control" name="about_title"
                                                    placeholder="Title" value="<?php echo $home['about_title'] ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Sub Title <span style="color:red;">*</span>  <small
                                                    style="color:blue">[For Best View for Description Characters
                                                    Should be 100 to 120 ]
                                                </small></label>
                                                <textarea class="form-control" name="about_sub_title"
                                                required><?php echo $home['about_sub_title'] ?></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 1 <span style="color:red;">*</span> <small
                                                    style="color:blue">[For Best View for Heading Characters
                                                    Should be 12 to 18]
                                                </small></label>
                                            <input type="text" class="form-control" name="about_word_1"
                                                placeholder=" Title 1" value="<?php echo $home['about_word_1'] ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description 1 <span style="color:red;">*</span> <small
                                                    style="color:blue">[For Best View for Description Characters
                                                    Should be 60 to 70 ]
                                                </small></label>
                                            <textarea class="form-control" name="about_des_1"
                                                required><?php echo $home['about_des_1'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 2 <span style="color:red;">*</span><small
                                                    style="color:blue">[For Best View for Heading Characters
                                                    Should be 12 to 18]
                                                </small> </label>
                                            <input type="text" class="form-control" name="about_word_2"
                                                placeholder=" Title 2" value="<?php echo $home['about_word_2'] ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description 2 <span style="color:red;">*</span> <small
                                                    style="color:blue">[For Best View for Description Characters
                                                    Should be 60 to 70 ]
                                                </small></label> <textarea class="form-control" name="about_des_2"
                                                required><?php echo $home['about_des_2'] ?></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 3 <span style="color:red;">*</span><small
                                                    style="color:blue">[For Best View for Heading Characters
                                                    Should be 12 to 18]
                                                </small></label>
                                            <input type="text" class="form-control" name="about_word_3"
                                                placeholder=" Title 3" value="<?php echo $home['about_word_3'] ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description 3 <span style="color:red;">*</span> <small
                                                    style="color:blue">[For Best View for Description Characters
                                                    Should be 60 to 70 ]
                                                </small></label>
                                            <textarea class="form-control" name="about_des_3"
                                                required><?php echo $home['about_des_3'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 4 <span style="color:red;">*</span><small
                                                    style="color:blue">[For Best View for Heading Characters
                                                    Should be 12 to 18]
                                                </small></label>
                                            <input type="text" class="form-control" name="about_word_4"
                                                placeholder=" Title 4" value="<?php echo $home['about_word_4'] ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description 4 <span style="color:red;">*</span> <small
                                                    style="color:blue">[For Best View for Description Characters
                                                    Should be 60 to 70 ]
                                                </small></label>

                                            <textarea class="form-control" name="about_des_4"
                                                required><?php echo $home['about_des_4'] ?></textarea>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section one end  -->
        <!-- second  Country Section start  -->
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Section 2 Edit
                                <small></small>
                            </h2>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box-body pad">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Service Title <span style="color:red;">*</span> </label>
                                            <input type="text" class="form-control" name="about_title_2"
                                                placeholder="Service Title"
                                                value="<?php echo $home['about_title_2'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Service Sub Title <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="about_sub_title_2"
                                                placeholder="Service Sub Title"
                                                value="<?php echo $home['about_sub_title_2'] ?>" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section country second End -->
     
        <section class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-">
                        <div class="box-header" style="background-color:#3c8dbc;">
                            <h2 class="box-title" style="color:white;">Section 3 Edit
                                <small></small>
                            </h2>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-secondary btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box-body pad">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Testimonial Title <span style="color:red;">*</span> </label>
                                            <input type="text" class="form-control" name="about_title_3"
                                                placeholder="Testimonial Title"
                                                value="<?php echo $home['about_title_3'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Testimonial Sub Title <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="about_sub_title_3"
                                                placeholder="Testimonial Sub Title"
                                                value="<?php echo $home['about_sub_title_3'] ?>" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section six end  -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="padding:10px 50px;" name="save_home"><i
                            class="fa fa-edit"></i>&nbsp;Edit</button>
                </div>
            </div>
        </div>
        </form>
        <?php
        if(isset($_POST['save_home'])){
            $about_id = $_GET['about_id'];
            $about_title = $_POST['about_title'];
            $about_sub_title = $_POST['about_sub_title'];
            $about_word_1 = $_POST['about_word_1'];
            $about_img_1 = $_FILES['about_img_1']['name'];
            $about_img_1_old = $_POST['about_img_1_old'];
            $about_des_1 = $_POST['about_des_1'];
            $about_word_2 = $_POST['about_word_2'];
            $about_des_2 = $_POST['about_des_2'];
            $about_word_3 = $_POST['about_word_3'];
            $about_des_3 = $_POST['about_des_3'];
            $about_word_4 = $_POST['about_word_4'];
            $about_des_4 = $_POST['about_des_4'];
            $about_title_2 = $_POST['about_title_2'];
            $about_sub_title_2 = $_POST['about_sub_title_2'];
            $about_title_3 = $_POST['about_title_3'];
            $about_sub_title_3 = $_POST['about_sub_title_3'];
            $about_img_2 = $_FILES['about_img_2']['name'];
            $about_img_2_old = $_POST['about_img_2_old'];
           
            $about_status = '1';
            
            $about_date_time = date('d-m-y h:i:sa');
            // validation for image 1
            

            if (empty($about_img_1)) {
                $update_image_1 = $about_img_1_old ;
            }
            else{
                $allowed_extension = array('gif','png','jpg','jpeg');
                $about_img_1 = $_FILES['about_img_1']['name'];
                $file_extension_sn1 = pathinfo($about_img_1, PATHINFO_EXTENSION);
                if (!in_array($file_extension_sn1,$allowed_extension)) {
                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                    ?>
        <script>
        const myKeysValue = window.location.search;
        const urlParams = new URLSearchParams(myKeysValue);
        const home_id = urlParams.get('about_id');
        location.replace("edit_about_page.php?about_id=" + about_id);
        </script>
        <?php
                }
                if (file_exists("../upload/pages/about/".$about_img_1)) {
                    $_SESSION['errorMessage'] = "Image Already Exists " .$about_img_1;
                    ?>
        <script>
        const myKeysValue = window.location.search;
        const urlParams = new URLSearchParams(myKeysValue);
        const about_id = urlParams.get('about_id');
        location.replace("edit_about_page.php?about_id=" + about_id);
        </script>
        <?php
                }
                $about_img_1 = $_FILES['about_img_1']['name'];

                $update_image_1 = $about_img_1 ;
            }
            

            if (empty($about_img_2)) {
                $update_about_img_2 = $about_img_2_old;
            }
            else{
                $allowed_extension = array('gif','png','jpg','jpeg');
                $about_img_2 = $_FILES['about_img_2']['name'];
                $file_extension_sn2 = pathinfo($about_img_2, PATHINFO_EXTENSION);
                if (!in_array($file_extension_sn2,$allowed_extension)) {
                    $_SESSION['errorMessage'] = "Upload Valid Images. Only PNG, JPEG, JPG And GIF are Allowed.";
                    ?>
        <script>
        const myKeysValue = window.location.search;
        const urlParams = new URLSearchParams(myKeysValue);
        const about_id = urlParams.get('about_id');
        location.replace("edit_about_page.php?about_id=" + about_id);
        </script>
        <?php
                }
                if (file_exists("../upload/pages/about/".$about_img_2)) {
                    $_SESSION['errorMessage'] = "Image Already Exists " .$about_img_2;
                    ?>
        <script>
        const myKeysValue = window.location.search;
        const urlParams = new URLSearchParams(myKeysValue);
        const about_id = urlParams.get('about_id');
        location.replace("edit_about_page.php?about_id=" + about_id);
        </script>
        <?php
                }
                $about_img_2 = $_FILES['about_img_2']['name'];

                $update_about_img_2 = $about_img_2;
            }
       
            // query is update by post
           $update_home ="UPDATE `about` SET `about_title`='$about_title',`about_sub_title`='$about_sub_title',`about_word_1`='$about_word_1',`about_des_1`='$about_des_1',`about_word_2`='$about_word_2',`about_des_2`='$about_des_2',`about_word_3`='$about_word_3',`about_des_3`='$about_des_3',`about_word_4`='$about_word_4',`about_des_4`='$about_des_4',`about_title_2`='$about_title_2',`about_sub_title_2`='$about_sub_title_2',`about_title_3`='$about_title_3',`about_sub_title_3`='$about_sub_title_3',`about_status`='$about_status',`about_img_1`='$update_image_1',`about_img_2`='$update_about_img_2',`about_date_time`='$about_date_time' WHERE `about_id`='$about_id'";
           $update_query = mysqli_query($con, $update_home);
        if ($update_query) {
                // upload new image if UPDATE Image
              
                    // moveing file to the folder
                    move_uploaded_file($_FILES ["about_img_1"]["tmp_name"], "../upload/pages/about/" .$about_img_1);
                    // remove the old file from folder
                
               
                    // moveing file to the folder
                    move_uploaded_file($_FILES ["about_img_2"]["tmp_name"], "../upload/pages/about/" .$about_img_2);
                    // remove the old file from folder
               
                            
                     
    
            $_SESSION['SuccessMessage'] =" About Us Page Data Update Successfully!";
            ?>
        <script>
        location.replace("about_page.php")
        </script>
        <?php
        } 
        else{
            $_SESSION['errorMessage'] = "Un Execpted Error!";
            ?>

        <script>
        location.replace("about_page.php")
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
<script>
$(document).ready(function() {
    $('#course').DataTable();
});

function updatecourse() {
    return confirm("Are You Sure! You Want To Edit Home Setting");
}
</script>

<?php include 'includeadmin/footer.php' ?>
<script>
const previewImage2 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image2");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};

const previewImage = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
const previewImage3 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image3");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
const previewImage4 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image4");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
const previewImage5 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image5");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
const previewImage6 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image6");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};

const previewImage7 = (event) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector("#preview-selected-image7");
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};
</script>