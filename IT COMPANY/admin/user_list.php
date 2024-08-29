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
        <h1>User List
            <small>Manager User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="../admin/index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="../admin/user_list.php">User List</a></li>
        </ol>
        </section>
        <div class="container col-md-12">
        <div class="box box-primary" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="Table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>User Name</th>
                                        <th>E-Mail</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                        <th>Login Date / Time</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_list_query = "select * from admin where admin_status = 1";
                                    $query = mysqli_query($con, $user_list_query);
                                    $i = 1;
                                    while ($user_list = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo "$i"; ?></td>
                                            <td><a style="color: blue;" href="user_detail_view.php?user_id=<?php echo $user_list['admin_id']; ?>"><?php echo $user_list['admin_username']; ?></a></td>
                                            <td><?php echo $user_list['admin_email']; ?></td>
                                            <td><?php echo $user_list['firstname']; ?></td>
                                            <td><?php echo $user_list['admin_lastname']; ?></td>
                                            <td><?php echo $user_list['phonenumber']; ?></td>
                                            <td><?php echo $user_list['admin_entrydt']; ?></td>
                                            <td><?php $user_type = $user_list['admin_user_type'];
                                                if ($user_type == 'super_admin') {
                                                ?>
                                                    <span class="label bg-navy">
                                                        <?php
                                                        echo "Super Admin";
                                                        ?>
                                                    </span>
                                                <?php
                                                }
                                                 else {
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <a href="edit_user.php?user_id=<?php echo $user_list['admin_id']; ?>">
                                                    <button type="button" title="Edit User" class="btn btn-success"> <i class="fa fa-edit"></i>&nbsp;Edit</button>
                                                </a>
                                            |
                                                <a href="delete_user.php?user_id=<?php echo $user_list['admin_id']; ?>">
                                                    <button onclick="return checkdelete()" title="Delete User" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i>&nbsp;Delete</button>
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
<script>
    function checkdelete() {
        return confirm("Are You Sure! You Want To Delete This User");
    }
</script>
<?php include 'includeadmin/footer.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#Table').DataTable();
    });
</script>