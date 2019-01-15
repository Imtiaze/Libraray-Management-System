<?php include "header.php";
include "connection.php";

if(!isset($_SESSION['username'])){
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
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
                        <h2>All Books List</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form class="" action="" method="post">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <input type="text" name="s" placeholder="Search Books by name..." value="" class="form-control" required>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <input type="submit" name="submit1" value="Search" class="btn btn-default form-control" style="background-color:#1ABB9C; color:white;">
                                </div>
                            </div>
                        </form>

                        <?php

                        if(isset($_POST['submit1'])){
                            $res = mysqli_query($link, "SELECT * FROM add_books WHERE books_name LIKE('%$_POST[s]%') ");

                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            while($row = mysqli_fetch_array($res)){

                                echo "<td>";
                                ?> <img src="../librarian/<?php echo $row['books_image']; ?>" alt="" height="200" width="200"> <?php
                                echo "<br><strong>".$row['books_name']."</strong>";
                                echo "<br><strong>".$row['available_qty']."</strong>";
                                echo "</td>";

                            }
                            echo "</tr>";
                            echo "</table>";
                        }
                        else{
                            $i=0;
                            $res = mysqli_query($link, "SELECT * FROM add_books WHERE available_qty>0 ");

                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            while($row = mysqli_fetch_array($res)){
                                $i=$i+1;
                                echo "<td>";
                                ?> <img src="../librarian/<?php echo $row['books_image']; ?>" alt="" height="200" width="200"> <?php
                                echo "<br><strong>".$row['books_name']."</strong>";
                                echo "<br><strong>"."Available: ".$row['available_qty']."</strong>";
                                echo "</td>";
                                if($i==3){
                                    echo "<tr>";
                                    echo "</tr>";
                                    $i = 0;
                                }

                            }
                            echo "</tr>";
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
