<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economic Data Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include_once "Data.php";
    getData(); ?>

    <center>
        <a href="index.php"><button>
                <h1>Refresh</h1>
            </button> </a>
    </center>





</body>

</html>