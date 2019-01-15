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
                <h3>Plain Page</h3>
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
                        <h2>Issue Books to the Students</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="" name="form1" action="" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <select class="form-control" name="enr">
                                            <?php
                                            $res = mysqli_query($link, "SELECT (enrollmentno) FROM student_registration");
                                            while($row = mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["enrollmentno"];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="submit" name="submit1" class="btn btn-default" value="Search" style="margin-top:5px; background-color:#1ABB9C; color:white;"></td>
                                </tr>
                            </table>
                        </form>

                        <?php

                        if(isset($_POST['submit1'])){

                            $res1 = mysqli_query($link, "SELECT * FROM student_registration WHERE enrollmentno='$_POST[enr]' ");

                            while($row1 = mysqli_fetch_array($res1)){
                                $firstName = $row1['firstname'];
                                $lastName = $row1['lastname'];
                                $userName = $row1['username'];
                                $contact = $row1['contact'];
                                $email = $row1['email'];
                                $semester = $row1['sem'];
                                $enrollmentNo = $row1['enrollmentno'];
                                $_SESSION["enrollment"] = $enrollmentNo;

                            }

                            ?>
                            <form action="" name="" method="post">
                                <table class="table table-bordered col-lg-6">
                                    <tr>
                                        <td><input type="text" name="enrollmentno" placeholder="Enrollment Number" value="<?php echo $enrollmentNo; ?>"  class="form-control" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" placeholder="Student Name" value="<?php echo $firstName; ?>" name="name" class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Student Semester" name="semester" value="<?php echo $semester; ?>"  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Student Contact" name="contact" value="<?php echo $contact; ?>"  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Student Email" name="email" value="<?php echo $email; ?>"  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select class="form-control" name="book">
                                                <?php
                                                $res2 = mysqli_query($link, "SELECT * FROM add_books");
                                                while($row2 = mysqli_fetch_array($res2)){
                                                    echo "<option>";
                                                    echo $row2['books_name'];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Issue Date" name="issuedate" value="<?php echo date("d/m/Y"); ?>"  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Return Date" name="returndate" value=""  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" placeholder="Student Username" name="uname" value="<?php echo $userName; ?>"  class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="submit" value="Submit" name="submit2" class="btn btn-default form-control" style="background-color:blue; color:white;"></td>
                                    </tr>
                                </table>


                                <?php
                            }

                            ?>
                        </form>

                        <?php

                        if(isset($_POST['submit2'])){

                            $inputBook = $_POST['book'];
                            $r =  mysqli_query($link, "SELECT *  FROM issue_books WHERE student_enrollment='$_SESSION[enrollment]'");

                            $exits = false;

                            while($rr = mysqli_fetch_array($r)){

                                if ($rr['books_name'] == $inputBook && $rr['books_return_date'] == '') {
                                    $exits = true;
                                }

                            }
                            if ($exits == true) {
                                ?>
                                <script type="text/javascript">
                                alert("Books already issued !!!");
                                </script>
                                <?php
                            }
                            else {
                                $qty='';
                                $res3 = mysqli_query($link, "SELECT * FROM add_books WHERE books_name='$_POST[book]'");
                                while ($row3 = mysqli_fetch_array($res3)) {
                                    $qty = $row3['available_qty'];
                                }
                                if($qty == 0){
                                    ?>

                                    <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                        <p  style="text-align: center;">Book <strong style="color:white"><?php echo $_POST['book']; ?></strong> are not <strong style="color:white">Available</strong>
                                        </p>
                                    </div>

                                    <?php
                                }
                                else{

                                    mysqli_query($link, "INSERT INTO issue_books VALUES('','$_SESSION[enrollment]','$_POST[name]','$_POST[semester]','$_POST[contact]','$_POST[email]','$_POST[book]','$_POST[issuedate]','','$_POST[uname]')");

                                    mysqli_query($link, "UPDATE add_books set available_qty=available_qty-1 WHERE books_name='$_POST[book]'");

                                    // my way off decresing book after issuing books
                                    // $booksQuantity = mysqli_query($link, "SELECT available_qty FROM add_books WHERE books_name='$_POST[book]'");
                                    //
                                    // while($booksRow = mysqli_fetch_array($booksQuantity)){
                                    //     $booksAvailableQuantity = $booksRow['available_qty'];
                                    // }
                                    // $booksAvailableQuantity = $booksAvailableQuantity - 1;
                                    //
                                    // mysqli_query($link, "UPDATE add_books SET available_qty='$booksAvailableQuantity' WHERE books_name='$_POST[book]' ");

                                    ?>

                                    <script type="text/javascript">
                                    alert("Book Issued Successfully !!!");
                                    window.location.href = window.location.href;
                                    </script>

                                    <?php
                                }
                            }

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
