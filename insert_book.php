<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    $hn = 'localhost';
    $db = 'publications';
    $un = 'wj';
    $pw = 'password';

    // TODO 2: Check and filter data coming from the user.
    if(isset($_POST['isbn'])){
        $isbn = $_POST['isbn'];
        $author = $_POST['author'];
        $title = $_POST['title'];
        $price = $_POST['price'];
    }else{
        echo "No Data";
    }

    // TODO 3: Setup a connection to the appropriate database.
    $conn = new mysqli($hn,$un,$pw,$db);
    if($conn->connect_error){
        die("Fatal Error");
    }

    // TODO 4: Query the database.
    $query = "INSERT INTO catalogs VALUE('$isbn', '$author', '$title', $price)";
    $result = $conn->query($query);

    // TODO 5: Display the feedback back to user.
    if(!$result){
        die ("Insert fail!");
    }else{
        echo "Successfully Create!";
        echo "<br>";
        echo "<a href=search.html><button>search Book</button></a>";
    }

    // TODO 6: Disconnecting from the database.
    $conn->close();

    ?>
</body>
</html>