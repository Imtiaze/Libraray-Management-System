<?php
include "header.php";

if(!isset($_SESSION['librarian'])){
    ?>
    <script type="text/javascript">
    window.location="login.php";
    </script>
    <?php
}

include "connection.php";
?>


<!-- page content area main -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Library Management System</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Send Message to the Students</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <form class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" action="" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <select class="form-control" name="dusername">
                                            <?php
                                            $res = mysqli_query($link, "SELECT * FROM student_registration");
                                            while($row = mysqli_fetch_array($res)){
                                                ?>
                                                <option value="<?php echo $row['username']; ?>">
                                                    <?php echo $row['username']."(".$row['enrollmentno'].")"; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="title" placeholder="Title" class="form-control" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Message
                                        <textarea name="message" class="form-control" rows="7" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit1" value="Send Message" class="btn btn-default form-control" style="background-color:#1abb9c; color:white;" >
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <?php
                        $date = date("d/m/Y");
                        if(isset($_POST['submit1'])){
                            mysqli_query($link, "INSERT INTO messages VALUES('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[message]','$date','n')");
                                ?>
                                <script type="text/javascript">
                                    alert("Message  Sent Successfully !!!");
                                </script>

                                <?php

                        }

                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



<?php include "footer.php"; ?>
