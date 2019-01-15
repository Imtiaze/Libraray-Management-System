<?php include "header.php";;
include "connection.php";

mysqli_query($link, "UPDATE messages SET read1='y' WHERE dusername='$_SESSION[username]'");

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
                        <h2>Messages</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php

                        $res = mysqli_query($link, "SELECT * FROM messages WHERE dusername='$_SESSION[username]' ORDER BY id DESC");

                        echo "<table class='table table-bordered'>";
                        echo "<tr>";
                        echo "<th>"; echo "Name"; echo "</th>";
                        echo "<th>"; echo "Title"; echo "</th>";
                        echo "<th>"; echo "Message"; echo "</th>";
                        echo "<th>"; echo "Date"; echo "</th>";

                        echo "</tr>";
                        while ($row = mysqli_fetch_array($res)) {
                            $fullName='';
                            $userName = $row['susername'];
                             $res1 = mysqli_query($link, "SELECT * FROM librarian_registration WHERE username='$row[susername]'");

                             while($row1 = mysqli_fetch_array($res1)){
                                 $fullName = $row1['firstname']." ".$row1['lastname'];
                             }

                            echo "<tr>";
                            echo "<td>"; echo $fullName; echo "</td>";
                            echo "<td>"; echo $row['title']; echo "</td>";
                            echo "<td>"; echo $row['msg']; echo "</td>";
                            echo "<td>"; echo $row['msg_date']; echo "</td>";

                            echo "</tr>";
                        }
                        echo "</table>";

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->



<?php include "footer.php" ?>
