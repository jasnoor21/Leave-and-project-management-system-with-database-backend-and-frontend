<?php 
    session_start();
    include_once 'includes/dbh.inc.php';   
?>

<!DOCTYPE html>
<html>
<head>
    <title>Act on leaves(For HoDs)</title>
    <link rel="stylesheet" type="text/css" href="index.css"> 
</head>
<body>
<center>
<h1>Act on leaves</h1>
<hr>
<br>

<php
    pre_r($_POST);
?>

<form action="includes/actonleave.inc.php","" method="POST">
    Enter the required leave ID:
    <input class="w3-input" type="number" name ="req_id" placeholder="LeaveID">
    <br><br>
    Do you wish to accept:
    <input class="w3-input" type="radio" id="Allow" name="yes_no" value="1">
    <label for="Allow">Allow</label>
    <br>
    <input class="w3-input" type="radio" id="Decline" name="yes_no" value="0">
    <label for="Decline">Decline</label>
    <br><br>
    Any comments:
    <input class="w3-input" type="text" name ="coom" placeholder="Comments">
    <br>
    <button   class="w3-button w3-khaki" type="submit" name ="submit">Submit</button>
    <br>
</form>
<br>
<hr>
<br>
<h1>Leave applications</h1>
    <br>



<?php

    if($_SESSION['designation'] == 1)
    {
        $sql = "SELECT l.id,l.faculty_id, f.name, l.from_day, l.to_day, l.faculty_comment  FROM leaves l, faculty f WHERE (status_id = 0 OR status_id = 6 ) AND l.faculty_id = f.id AND f.dept = '$_SESSION[department]';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    ?>
        <table class="w3-table w3-striped w3-bordered">
        <tr>
            <th> Leave ID </th>
            <th> Faculty ID </th>
            <th> Faculty Name </th>
            <th> Start Day </th> 
            <th> End Day </th> 
            <th> Faculty Comment </th> 
        </tr>
    <?php
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                <tr>
                <?php
                foreach($row as $value) 
                {
                    ?>
                    <td><?php echo $value;?></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
        }
        ?>
        
        </table>
        <?php

    }

    else if($_SESSION['designation'] == 2)
    {
        $sql = "SELECT l.id,l.faculty_id, f.name, l.from_day, l.to_day, l.faculty_comment, l.hod_comment  FROM leaves l, faculty f WHERE (status_id = 1 OR status_id = 7 ) AND l.faculty_id = f.id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    ?>
        <table class="w3-table w3-striped w3-bordered">
        <tr>
            <th> Leave ID </th>
            <th> Faculty ID </th>
            <th> Faculty Name </th>
            <th> Start Day </th> 
            <th> End Day </th> 
            <th> Faculty Comment </th>
            <th> HOD Comment </th> 
        </tr>
    <?php
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                <tr>
                <?php
                foreach($row as $value) 
                {
                    ?>
                    <td><?php echo $value;?></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
        }
        ?>
        
        </table>
        <?php

    }



/*
    else if($_SESSION['designation'] == 3){
        $sql = "SELECT l.id,l.faculty_id, f.name, l.from_day, l.to_day, l.faculty_comment  FROM leaves l, faculty f WHERE (status_id =3   OR status_id =4 OR status_id =9 OR status_id =10 OR status_id =8) AND l.faculty_id = f.id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

    
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $value){
                echo $value."...........";
            }
            echo "<br>";
        }
    }
    }
*/



    else if($_SESSION['designation'] == 3)
    {
        $sql = "SELECT l.id,l.faculty_id, f.name, l.from_day, l.to_day, l.faculty_comment, l.hod_comment, l.dean_comment  FROM leaves l, faculty f WHERE (status_id =3   OR status_id =4 OR status_id =9 OR status_id =10 OR status_id =8) AND l.faculty_id = f.id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    ?>
        <table class="w3-table w3-striped w3-bordered">
        <tr>
            <th> Leave ID </th>
            <th> Faculty ID </th>
            <th> Faculty Name </th>
            <th> Start Day </th> 
            <th> End Day </th> 
            <th> Faculty Comment </th>
            <th> HOD Comment </th> 
            <th> Dean Comment </th>
        </tr>
    <?php
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                ?>
                <tr>
                <?php
                foreach($row as $value) 
                {
                    ?>
                    <td><?php echo $value;?></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
        }
        ?>
        
        </table>
        <?php

    }



?>
<br><br><br>
</center>
</body>
</html>