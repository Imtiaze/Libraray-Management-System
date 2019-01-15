<?php
include "connection.php";

$id = $_GET['id'];
$d = date("d/m/Y");

mysqli_query($link, "UPDATE issue_books SET books_return_date='$d' WHERE id='$id'");

$bookName="";
$res = mysqli_query($link, "SELECT books_name from issue_books WHERE id='$id'");

while($row = mysqli_fetch_array($res)){
    $bookName = $row['books_name'];
}

mysqli_query($link, "UPDATE add_books SET available_qty=available_qty+1 WHERE books_name='$bookName'");

 ?>

<script type="text/javascript">

    alert("Book return Successfully!!!");
    window.location="return_books.php";
</script>
