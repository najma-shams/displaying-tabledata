<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Teachers</title>
</head>
<body style="margin: 50px;">
    <h1>List of Teachers</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "teacher_db";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);
                
                // check connection
                if($connection->connect_error){
                    die("connection failed: " . $connection->connect_error);
                }

                // read all row form database table
                $sql = "SELECT * FROM Teachers";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: " . $connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["department"] . "</td>
                   
                     </tr>";
                }

            
            ?>
        </tbody>
    </table>
</body>
</html>