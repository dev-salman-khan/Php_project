<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "it_company";

$con = mysqli_connect($server, $user, $password, $db);
if ($con) {
    
} else {
?>
    <script>
        // alert("No Connection")
    </script>
<?php
}
?>