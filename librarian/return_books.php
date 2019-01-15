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
                        <h2>Return Books</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="" action="" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="col-md-8 col-sm-8 col-xs-8">
                                        <select class="form-control" name="enr">
                                            <?php
                                            $res = mysqli_query($link, "SELECT student_enrollment FROM issue_books WHERE books_return_date='' ");

                                            while($row = mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row['student_enrollment'];
                                                echo "</option>";
                                            }

                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="submit" name="submit1" value="Search" class="btn btn-default form-control" style="background-color:#1ABB9C; color:white;"></td>
                                </tr>
                            </table>
                        </form>

                        <!-- submit button Clicked -->
                        <?php

                        if(isset($_POST['submit1'])){
                            $res1 = mysqli_query($link, "SELECT * FROM issue_books WHERE student_enrollment='$_POST[enr]' AND books_return_date='' ");

                            // $count = mysqli_num_rows($res1);
                            // echo $count;

                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Enrollment No"; echo"</th>";
                            echo "<th>"; echo "Name"; echo"</th>";
                            echo "<th>"; echo "Semester"; echo"</th>";
                            echo "<th>"; echo "Contact"; echo"</th>";
                            echo "<th>"; echo "Email"; echo"</th>";
                            echo "<th>"; echo "Book Name"; echo"</th>";
                            echo "<th>"; echo "Book Issue Date"; echo"</th>";
                            echo "<th>"; echo "Return Book"; echo"</th>";
                            echo "<tr/>";

                            while($row1= mysqli_fetch_array($res1)){
                                echo "<tr>";
                                echo "<td>"; echo $row1['student_enrollment'];  echo "</td>";
                                echo "<td>"; echo $row1['student_name'];  echo "</td>";
                                echo "<td>"; echo $row1['student_sem'];  echo "</td>";
                                echo "<td>"; echo $row1['student_contact'];  echo "</td>";
                                echo "<td>"; echo $row1['student_email'];  echo "</td>";
                                echo "<td>"; echo $row1['books_name'];  echo "</td>";
                                echo "<td>"; echo $row1['books_issue_date'];  echo "</td>";
                                echo "<td>"; ?> <a href="return.php?id=<?php echo $row1['id']; ?>">Return Book</a><?php  echo "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
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
