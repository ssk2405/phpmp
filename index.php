<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Patient Management System</h1>
        <div class="container">
            <form action="adddata.php" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="">Patient Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label for="">Room No.</label>
                        <select name="room" id="room" class="form-control" required>
                            <option value="">Select room no.</option>
                            <?php for ($i = 1; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i; ?>">Room <?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Phone no.</label>
                        <input type="number" name="phone_no" id="phone_no" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Room no.</th>
                        <th scope="col">Phone no.</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM results";
                    $result = $conn->query($sql_query);
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            $Id = $row['id'];
                            $Name = $row['name'];
                            $room = $row['room'];
                            $phone_no = $row['Phone_no'];
                    ?>
                            <tr class="trow">
                                <td><?php echo $Id; ?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $room; ?></td>
                                <td><?php echo $phone_no; ?></td>
                                <td><a href="updatedata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "Error: " . $conn->error;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
