<html>
<style>
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<head>
    <title>Catalogue WoodyToys</title>
</head>

<body>
    <h1>Catalogue WoodyToys</h1>

    <?php
    $dbname = getenv('MYSQL_DATABASE');
    $dbuser = getenv('MYSQL_USER');
    $dbpass = getenv('MYSQL_PASSWORD');
    $dbhost = getenv('DB_HOST') ?: 'mariadb';
    $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
    mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");

    $result = mysqli_query($connect, "SELECT id, product_name, product_price FROM products");

    if (!$result) {
        die("Error executing query: " . mysqli_error($connect));
    }
    ?>

    <table>
        <tr>
            <th>Numéro de produit</th>
            <th>Descriptif</th>
            <th>Prix</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><th>" . $row['id'] . "</th> <th>" . $row['product_name'] . "</th> <th>" . $row['product_price'] . "</th></tr>";
        }
        ?>

    </table>
</body>

</html>
