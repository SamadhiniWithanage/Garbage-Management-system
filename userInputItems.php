<!DOCTYPE html>
<html lang="en">

    <head>
        <title> User Input Items </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container">

            <br>
            <h2> Input Items </h2>
            <form action="inputSuccess.php" method="post">

                <br>

                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name here..." name="name"
                           required>
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email here..." name="email"
                           required>
                </div>

                <div class="form-group">
                    <label for="address">Address :</label>
                    <textarea class="form-control" rows="5" id="address" placeholder="Enter your address here..."
                              name="address" required></textarea>
                </div>

                <!--
                            <div class="form-group">
                              <label for="location">Location :</label>
                              <textarea class="form-control" rows="5" id="location" placeholder="Enter your address here..." name="maps" required> </textarea> 
                            </div>
                -->

                <div class="form-group">
                    <label for="phone">Phone No :</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your phone no here..."
                           name="phone" required>
                </div>


                <div class="form-group">
                    <label for="address">Items :</label>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Polythen or Plastic </td>
                                <td> <input type="text" class="form-control" name="plasticQty" id="plasticQty" placeholder="Enter your polythene qantity in Kg here...Or else enter 0" required> </td>
                            </tr>
                            <tr>
                                <td>Metal</td>
                                <td> <input type="text" class="form-control" name="metalQty" id="metalQty" placeholder="Enter your metal quantity in Kg here...Or else enter 0" required> </td>
                            </tr>
                            <tr>
                                <td> Building Waste </td>
                                <td> <input type="text" class="form-control" name="buildingQty" id="buildingQty" placeholder="Enter your building waste quantity in Kg here...Or else enter 0" required> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </body>

</html>