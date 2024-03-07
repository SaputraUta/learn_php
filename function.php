<?php
function search($conn, $keyword) {
    $query = "SELECT * FROM products WHERE nama LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
    return $result;
}
?>