<?php
session_start();
?>
<?php
    
    include_once 'dbh.inc.php';

    $req_id = $_SESSION['faculty_id'];
    $Start_date = $_POST['Start_date'];
    $number_of_days = $_POST['number_of_days'];
    $coom = $_POST['coom'];

    $sql = "CALL apply_leave('$req_id','$Start_date','$number_of_days','$coom')";
    mysqli_query($conn, $sql);
    

    header("Location: ../generalpage.php?LeaveApplication=success");