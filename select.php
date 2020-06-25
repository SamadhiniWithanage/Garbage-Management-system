<?php
require_once 'config.php';
require_once 'db.php';

//$db = connect($dbHost:DB_HOST,$dbName:DB_NAME,$dbUsername:DB_USERNAME,$dbPassword:DB_PASSWORD);

$db = mysqli_connect("localhost", "root", "", "waste");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

$records = fetchAll($db);
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <title>
            Display Items to Admin
        </title>

    </head>

    <body>
        <br>

        <h2>Display Items to Admin </h2><br>

        <form action="adminDisplayController.php" method="post">

            <table class="table">

                <tr>
                    <th>Name of Seller</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Status </th>

                </tr>

                <tbody>
                    
                    <?php
                    if (count($records)>0):
                    foreach ($records as $record):
                    ?>
                    <tr>

                        <td><?php echo $record['id']; ?></td>

                        <td><?php echo $record['name']; ?></td>

                        <td><?php echo $record['email']; ?></td>

                        <td><?php echo $record['address']; ?></td>

                        <td><?php echo $record['phone']; ?></td>

                        <td>
                            <a href="delete.php?id=<?php echo $record['id']; ?>"> Delete </a>

                            <a href="insert.php?id=<?php echo $record['id']; ?>"> Insert </a>
                        </td>


                    </tr>

                    <?php endforeach;
                    else:
                    ?>

                </tbody>

            </table>

        </form>

    </body>

</html>