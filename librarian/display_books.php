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
                        <h2>Books List</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form name="form1" class="" action="" method="post">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <input type="text" class="form-control"  name="s1" placeholder="Search Book by (Names, Author names)..." value="">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <input type="submit" name="submit1" class="btn btn-default submit form-control" value="Search Book" style="background-color:#1ABB9C; color:white;"></input>
                                </div>
                            </div>



                        </form>


                        <?php

                        if(isset($_POST['submit1'])){

                            $res = mysqli_query($link, "SELECT * FROM add_books WHERE (books_name) LIKE ('%$_POST[s1]%') OR (books_author_name) LIKE '%$_POST[s1]%' ");
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Books Image"; echo "</th>";
                            echo "<th>"; echo "Books Name"; echo "</th>";
                            echo "<th>"; echo "Books Author Name"; echo "</th>";
                            echo "<th>"; echo "Books Publication Name"; echo "</th>";

                            echo "<th>"; echo "Books Purchase Date"; echo "</th>";
                            echo "<th>"; echo "Books Price"; echo "</th>";
                            echo "<th>"; echo "Books Quantity"; echo "</th>";
                            echo "<th>"; echo "Books Available Quantity"; echo "</th>";
                            echo "</tr>";

                            while($row = mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>"; ?> <img src="<?php echo $row['books_image']; ?>" height="100" width="100" alt=""> <?php echo "</td>";
                                echo "<td>"; echo $row['books_name']; echo "</td>";
                                echo "<td>"; echo $row['books_author_name']; echo "</td>";
                                echo "<td>"; echo $row['books_publication_name']; echo "</td>";
                                echo "<td>"; echo $row['books_purchase_date']; echo "</td>";
                                echo "<td>"; echo $row['books_price']; echo "</td>";
                                echo "<td>"; echo $row['books_qty']; echo "</td>";
                                echo "<td>"; echo $row['available_qty']; echo "</td>";
                                echo "</tr>";
                            }

                            echo "<table>";

                        } else{

                            $res = mysqli_query($link, "select * from add_books");
                            echo "<table class='table table-bordered'>";
                            echo "<tr>";
                            echo "<th>"; echo "Books Image"; echo "</th>";
                            echo "<th>"; echo "Books Name"; echo "</th>";
                            echo "<th>"; echo "Books Author Name"; echo "</th>";
                            echo "<th>"; echo "Books Publication Name"; echo "</th>";

                            echo "<th>"; echo "Books Purchase Date"; echo "</th>";
                            echo "<th>"; echo "Books Price"; echo "</th>";
                            echo "<th>"; echo "Books Quantity"; echo "</th>";
                            echo "<th>"; echo "Books Available Quantity"; echo "</th>";
                            echo "</tr>";

                            while($row = mysqli_fetch_array($res)){
                                echo "<tr>";
                                echo "<td>"; ?> <img src="<?php echo $row['books_image']; ?>" height="100" width="100" alt=""> <?php echo "</td>";
                                echo "<td>"; echo $row['books_name']; echo "</td>";
                                echo "<td>"; echo $row['books_author_name']; echo "</td>";
                                echo "<td>"; echo $row['books_publication_name']; echo "</td>";
                                echo "<td>"; echo $row['books_purchase_date']; echo "</td>";
                                echo "<td>"; echo $row['books_price']; echo "</td>";
                                echo "<td>"; echo $row['books_qty']; echo "</td>";
                                echo "<td>"; echo $row['available_qty']; echo "</td>";
                                echo "</tr>";
                            }

                            echo "<table>";
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
