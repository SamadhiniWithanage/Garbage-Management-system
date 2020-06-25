<?php
include './adminDisplayController.php';
require_once 'config.php';
require_once 'db.php';

$db = mysqli_connect("localhost", "root", "", "webtwo");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

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


        <style>
            table tr:not(:first-child){
                cursor: pointer;transition: all .25s ease-in-out;
            }
            table tr:not(:first-child):hover{background-color: #ddd;}
        </style>

    </head>

    <body>

        <br>

        <div class="container1">
            <br>

            <form action="insert.php" method="post">

                <div class="form-group">
                    <label for="name"> Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="name"> Email:</label> 
                    <input type="text" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="name"> Address:</label> 
                    <input type="text" class="form-control" name="address" id="address">
                </div>

                <div class="form-group">
                    <label for="name"> Phone:</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>

                <div class="form-group">
                    <label for="name"> Plastic Quantity:</label>
                    <input type="text" class="form-control" name="plasticQty" id="plasticQty">
                </div>

                <div class="form-group">
                    <label for="name"> Metal Quantity:</label>
                    <input type="text" class="form-control" name="metalQty" id="metalQty">
                </div>

                <div class="form-group">
                    <label for="name"> Building Waste Quantity:</label>
                    <input type="text" class="form-control" name="buildingQty" id="buildingQty">
                </div>

                <!--
                Address : <input type="text" name="address" id="address"><br><br>
                Phone : <input type="text" name="phone" id="phone"><br><br>
                Plastic Quantity : <input type="text" name="plasticQty" id="plasticQty"><br><br>
                Metal Quantity : <input type="text" name="metalQty" id="metalQty"><br><br>
                <div class="form-group">
                    Building Waste Quantity : <input type="text" name="buildingQty" id="buildingQty"><br><br>
                </div>
                -->
                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

        <br><br>

        <h2>Display Items to Admin </h2><br>

        <form action="adminDisplayController.php" method="post">

            <table  id="table" class="table">

                <tr>
                    <th> ID </th>
                    <th>Name of Seller</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th> Plastic Qty </th>
                    <th> Metal Qty </th>
                    <th> Building Waste Qty </th>
                    <th>Status </th>


                </tr>

                <tbody>
                    <?php
                    if ($result->num_rows > 0) {

                        while ($rows = $result->fetch_assoc()) {
                            ?>

                            <tr>

                                <td><?php echo $rows['id']; ?></td>

                                <td><?php echo $rows['name']; ?></td>

                                <td><?php echo $rows['email']; ?></td>

                                <td><?php echo $rows['address']; ?></td>

                                <td><?php echo $rows['phone']; ?></td>

                                <td><?php echo $rows['plasticQty']; ?></td>

                                <td><?php echo $rows['metalQty']; ?></td>

                                <td><?php echo $rows['buildingQty']; ?></td>

                                <td>

                                    <a href="delete.php?id=<?php echo $rows['id']; ?>"> Delete </a>

                                </td>


                            </tr>

                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>

                </tbody>

            </table>

            <script>

                var table = document.getElementById('table');

                for (var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function ()
                    {
                        //rIndex = this.rowIndex;

                        document.getElementById("name").value = this.cells[1].innerHTML;
                        document.getElementById("email").value = this.cells[2].innerHTML;
                        document.getElementById("address").value = this.cells[3].innerHTML;
                        document.getElementById("phone").value = this.cells[4].innerHTML;
                        document.getElementById("plasticQty").value = this.cells[5].innerHTML;
                        document.getElementById("metalQty").value = this.cells[6].innerHTML;
                        document.getElementById("buildingQty").value = this.cells[7].innerHTML;
                    };
                }

            </script>

        </form>

    </body>

</html>