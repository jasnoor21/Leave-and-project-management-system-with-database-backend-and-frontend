<?php
include_once 'includes/dbh.inc.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply Leave</title>
    <link rel="stylesheet" type="text/css" href="index.css"> 
</head>
<body>
<div class="w3-panel ">
<h1><center>Home Page</center></h1>
</div>

<hr>
<br>

<!--<p>Apply for Leave</p>-->
<form action="index1.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Apply Leave</button></center>
    <br>
</form>

<br>


<!--<p>Act on Leave</p>-->
<?php
    if($_SESSION['designation'] == 1 OR $_SESSION['designation'] == 2 OR $_SESSION['designation'] ==3){
?>
    <form action="index2.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Act on leave</button></center>
    <br>
    </form>
<?php
    }
?>
<br>
<!--<p>Previously Applied leaves</p>-->
    <form action="index12.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Previously Applied leaves</button></center>
    <br>
    </form>
    <br>
    
<!--<p>Appoint Dean and Hod</p>-->
<?php
    if($_SESSION['designation'] == 3){
?>
    <form action="index3.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Appoint Dean</button></center>
    <br>
    </form>
    <br>
    <form action="index4.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Appoint HoD</button></center>
    <br>
    </form>
<?php
    }
?>
<br>

    <!--start new project-->
    <form action="index5.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Apply for project</button></center>
    <br>
    </form>

    <br>

    <!-- projects you're a part of'-->
    <form action="index13.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Your Projects</button></center>
    </form>

    <br>

    <!-- approve expenditure req for Dean SP-->
    <?php
    $sql3 = "SELECT id FROM deans WHERE post=2;";
    $result = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_assoc($result);
    $myid1 = $row['id'];

    if($myid1 == $_SESSION['faculty_id'] ){
        ?>
    <form action="index11.php" method="POST">
    <center><button  class="w3-button w3-khaki" type="submit" name ="submit">Approve expenditure req. for Dean SP</button></center>
    </form>

        <?php } ?>

    <br>



</body>
</html>