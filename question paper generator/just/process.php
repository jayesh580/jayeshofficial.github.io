<?php
require "include\common2.php";
session_start();
if(isset($_SESSION['name'])){
    $name1 = $_SESSION['name'];
    $last_name = $_SESSION['last_name'];
}else
{
    header('location:login.php');
}
$university1 = $_POST['university'];
$university = mysqli_real_escape_string($conn, $university1);
$branch2 = $_POST['branch'];
$branch = mysqli_real_escape_string($conn, $branch2);
$subject3= $_POST['subject'];
$subject = mysqli_real_escape_string($conn, $subject3);
$semister4= $_POST['semister'];
$semister = mysqli_real_escape_string($conn, $semister4);
$time5= $_POST['time'];
$time = mysqli_real_escape_string($conn, $time5);
$mark6= $_POST['marks'];
$mark = mysqli_real_escape_string($conn, $mark6);
$edate7= $_POST['edate'];
$edate = mysqli_real_escape_string($conn, $edate7);

    
    $b = "SELECT * FROM `branch` WHERE Branch_name='$branch'";
    $b1 = mysqli_query($conn,$b)or die(mysqli_error($conn));
    $b2 = mysqli_fetch_assoc($b1);
    $br_id = $b2['Br_id'];
    
    
    
    $s1="SELECT * FROM `subject` WHERE Subject_name='$subject' && Br_id='$br_id'";
    $s2 = mysqli_query($conn,$s1)or die(mysqli_error($conn));
    $s3 = mysqli_fetch_assoc($s2);
    $sub_id = $s3['Sub_id'];
    

$question_id4="SELECT * FROM question WHERE Sub_id='$sub_id' AND Br_id='$br_id' AND Marks='10' order by rand() limit 20";
$question10=mysqli_query($conn,$question_id4)or die(mysqli_error($conn));
$question_id5="SELECT * FROM question WHERE Sub_id='$sub_id' AND Br_id='$br_id' AND Marks='5' AND Type='Short' order by rand() limit 20";
$question5brief = mysqli_query($conn,$question_id5)or die(mysqli_error($conn));
$question_id6="SELECT * FROM question WHERE Sub_id='$sub_id' AND Br_id='$br_id' AND Marks='5' AND Type='Defination' order by rand() limit 20";
$question5define=mysqli_query($conn,$question_id6)or die(mysqli_error($conn));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Paper Format</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="col-lg-3 navbar-brand">
                    <?php echo 'welcome'.' : '.$name1.' '.$last_name; ?>
                </div>
                <div class="col-lg-offset-8 col-lg-1">
                    <a href="logout.php" class=""><u>Logout</u></a>
                </div>
            </nav>
            <div class="row">
                <div class="col-lg-12 details">
                    <p  class="">Paper / Subject Code: 52707 / <?php echo $subject; ?>                                                        
               <?php echo $semister; ?>/ <?php echo $branch; ?> / CREDIT BASE I /  <?php echo $edate; ?> </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 note">
                    <table>
                                    <tr>
                                        <td>Note :</td><td>1. Question 1 is compulsory.</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2"></td>
                                        <td>2. Attempt any 3 from Q2 to Q6.</td>
                                    </tr>
                                    <tr>
                                        <td>3. Indicate your answer with various sketches whenever necessary.</td>
                                    </tr>
                                </table>
                </div>
                <div class="col-lg-2 note">
                    <table>
                        <tbody>
                            <tr>
                                <td>Max.Marks: <?php echo $mark; ?></td>
                            </tr>
                            <tr>
                                <td>Time: <?php echo $time; ?> hours</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q1.</div>
                <div class="col-lg-10">
                    <div class="row note1">Attempt any Four.</div>
                    <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=5)
                        {
                        $row = mysqli_fetch_assoc($question5brief);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                        
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q2.</div>
                <div class="col-lg-10">
                    
                    <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=2)
                        {
                        $row = mysqli_fetch_assoc($question10);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                    
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q3.</div>
                <div class="col-lg-10">
                    
                        <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=2)
                        {
                        $row = mysqli_fetch_assoc($question10);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                    
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q4.</div>
                <div class="col-lg-10">
                    
                        <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=2)
                        {
                        $row = mysqli_fetch_assoc($question10);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                    
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q5.</div>
                <div class="col-lg-10">
                    
                        <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=2)
                        {
                        $row = mysqli_fetch_assoc($question10);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                    
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row note">
                <div class="col-lg-1">Q6.</div>
                <div class="col-lg-10">
                    <div class="row note1">Write short note on following <b>(Any four)</b></div>
                    
                        <div class="row">
                        <ol type="a">
                            
                    <?php 
                    $i = 1;
                    while ($i<=5)
                        {
                        $row = mysqli_fetch_assoc($question5define);
                        
                        ?>
                            <li><?php echo $row['Question']; ?></li>
                        <?php 
                        $i++;
                        } 
                        ?> 
                        </ol>
                    </div>
                  
                    
                </div>
                <div class="col-lg-1">[20]</div>
            </div>
            <div class="row">
                    <div class="col-lg-offset-5 col-lg-2">
                        <input type="submit" value="Print" class="btn btn-primary" onclick="myFunction()">
                    </div>
            </div>
        <script src="bootstrap/js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
            function myFunction()
            {
                window.print();
            }
        </script>
        <div class="footer">
            
        </div>
        
        </div>
    </body>
</html>