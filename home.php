<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
    <h2>Case Management System</h2>
    <button>Add New Case</button>
    <button>Show all cases</button>
    <?php
    require './insert.php';
    echo $data;
    ?>
</body>
</html>