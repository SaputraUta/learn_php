<?php
require("database.php");
require("function.php");
$conn = connect();

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (isset($_POST["search"])){
    $search = $_POST["keyword"];
    $result = search($conn, $search);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>

<body>
    <header>
        <h1>Produk elekronik</h1>
    </header>
    <main>
        <form action="" method="post">
            <input type="text" name="keyword" placeholder="cari nama produk">
            <button type="submit" name="search">Cari</button>
        </form>
        <br>
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Nama produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['deskripsi'] . "</td>";
                echo "<td> Rp. " . $row['harga'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>
</body>

</html>