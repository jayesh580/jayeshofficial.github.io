<?php
require "include\common2.php";
session_start();
if(isset($_SESSION['name'])){
    $name1 = $_SESSION['name'];
    $last_name = $_SESSION['last_name'];
    $branch1="SELECT * FROM `branch`";
    $branch_result=mysqli_query($conn,$branch1)or die(mysqli_error($conn));
    
}else
{
    header('location:login.php');
}
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>subjects</title>
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
            <div class="container col-lg-9 col-lg-offset-2 jumbotron">
                <form action="add_subject_process.php" method="POST">
                    <div class="form-group">
                    <table border="0">
                        <thead>
                            <tr>
                                <th colspan="2" class="cen note">Add Subjects</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Enter subject name:</td>
                                <td><input type="text" class="form-control" placeholder="Enter subject name" name="subject_name"></td>
                            </tr>
                            <tr>
                                <td>Enter semister:</td>
                                <td class="cen">
                                    <select name="semister">
                                        <?php 
                                        for($i=1;$i<=8;$i++)
                                        {?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Select branch:</td>
                                <td class="cen">
                                    <select name="branch">
                                        <?php 
                                    while($branch=mysqli_fetch_array($branch_result))
                                    {
                                    ?>
                                    <option value="<?php echo $branch['Branch_name']; ?>"><?php echo $branch['Branch_name']; ?></option>
                                    <?php 
                                    } 
                                    ?>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="cen note"><button type="submit" name="submit" class="btn btn-primary">Submit</button></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                </form>
            </div>
        </div>