<?php
include('./includes/header.php'); ?>

<!-- Start Page Title Section -->
<div class="page-title-area item-bg1" style="background-image:url(<?php
// banner  is fetch here
while ($banner = mysqli_fetch_assoc($banner_query)) {
    if (empty($banner['banner_page_banner'])) {
        echo ROOT_URL.'assets/img/page-title-bg.jpg';

    }
    else {  
        echo ROOT_URL.'upload/header/'. $banner['banner_page_banner'];
    }
}
?>)">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Trainings</h2>
                    <ul>
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Trainings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Section -->

<!-- Start Blog Section -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="section-title">
                    <?php   
       // fetching data 
        $term_fetech = "SELECT * FROM `dash_home` WHERE `dash_status`= '1' AND dash_id = '1'";
        $term_query = mysqli_query($con, $term_fetech);
        $term_list = mysqli_fetch_array($term_query);   
    ?>
                    <h6 class="sub-title"><?php echo $term_list['dash_link'];?></h6> <br>
                    <h2><?php echo $term_list['dash_title'];?></h2>
                </div>
                <p><?php echo $term_list['dash_description'];?></p>
            </div>


            <section class="content comments-area">

                <div class="box box-primary" style="margin-top:25px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h2 class="box-title mb-5">Trainings List </h2>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Sertification Code</th>
                                                <th>Code Title</th>
                                                <th>Duration Hourse/Days</th>
                                                <th>Training Mode</th>
                                                <th>Audience</th>
                                                <th>Pre Requisties</th>
                                                <th>Cost Per Student(Min.2 Student)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $selectquery = "select * from training where training_status = '1'  ORDER BY training_id DESC";
                                                $query_seo = mysqli_query($con, $selectquery);
                                                $i = 1;
                                                while ($trainings_list = mysqli_fetch_array($query_seo)) {
                                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo ucwords($trainings_list['training_sertification_code']) ?>
                                                </td>
                                                <td><?php echo ucwords($trainings_list['training_code_title']) ?></td>
                                                <td><?php echo ucwords($trainings_list['training_duration_day']) ?></td>
                                                <td><?php echo ucwords($trainings_list['training_mode']) ?></td>
                                                <td><?php echo ucwords($trainings_list['training_audience']) ?></td>
                                                <td><?php echo ucwords($trainings_list['training_per_req']) ?></td>
                                                <td><?php echo ucwords($trainings_list['training_cost_per_student']) ?>
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
            </section>
        </div>
    </div>
</section>
<!-- End Blog Section -->


<?php
include('./includes/footer.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable();
});
</script>