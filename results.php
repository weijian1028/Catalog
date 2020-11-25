<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<body>
    <h1>Book Search Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $hn = 'localhost';
    $db = 'publications';
    $un = 'wj';
    $pw = 'password';

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['submit'])){
        $searchtype = $_POST['searchtype'];
        $searchterm = $_POST['searchterm'];
    }else{
        echo "No Data";
    }

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal Error");
    }

    // TODO 4: Query the database.
    $query = "SELECT * FROM catalogs WHERE $searchtype LIKE '%$searchterm%'";

    // TODO 5: Retrieve the results.
    $result = $conn->query($query);
    if(!$result){
        die ("Search fail!");
    }else{
        echo "<h1>Search Results:</h1>";
    }
    $rows = $result->num_rows;

    // TODO 6: Display the results back to user.
    echo "<table style='border: 1px solid black'>
    <tr>
        <th>isbn</th>
        <th>author</th>
        <th>title</th>
        <th>price</th>
    </tr>";

    for($i=0; $i<$rows; $i++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo "<tr>";
            for($j=0; $j<4; $j++){
                echo "<td>" . htmlspecialchars($row[$j]) . "</td>";
            }
        echo "</tr>";
    }
    echo "</table>";

    // TODO 7: Disconnecting from the database.
    $result->close();
    $conn->close();

    ?>
</body>
</html>