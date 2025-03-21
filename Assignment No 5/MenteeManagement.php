<?php
include "db_connect.php";

if (isset($_POST['b3'])) {
    header("Location:delete.html");
}

if (isset($_POST['b2'])) {
    header("Location:update.php");
}

if (isset($_POST['b1'])){

    $mentId = $_POST['mentId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $mentorName = $_POST['mentorName'];
    $address = $_POST['address'];


        if (isset($_POST['b1'])) { // Add Mentee
            $sql = "INSERT INTO mentees (mentee_id, name, email, phone, department, mentor_name, address) 
                    VALUES ('$mentId', '$name', '$email', '$phone', '$department', '$mentorName', '$address')";
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color:green; text-align:center;'>Mentee Added Successfully!</p>";
            }
        }
    }
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-top: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        .btn {
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            width: 23%;
        }
        .btn-add { background: green; color: white; }
        .btn-update { background: blue; color: white; }
        .btn-delete { background: red; color: white; }
        .btn-display { background: orange; color: white; }
        /* Table Styling */
        .table-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Mentee Management System</h2>
        <form action="" method="post">
            <label>Mentee ID:</label>
            <input type="text" name="mentId" >

            <label>Mentee Name:</label>
            <input type="text" name="name" >

            <label>Email:</label>
            <input type="email" name="email" >

            <label>Mobile No:</label>
            <input type="number" name="phone" >

            <label>Department:</label>
            <input type="text" name="department" >

            <label>Mentor Name:</label>
            <input type="text" name="mentorName" >

            <label>Address:</label>
            <input type="text" name="address" >

            <div class="button-group">
                <input type="submit" name="b1" value="Add" class="btn btn-add"/>
                <input type="submit" name="b2" value="Update" class="btn btn-update"/>
                <input type="submit" name="b3" value="Delete" class="btn btn-delete"/>
                <input type="submit" name="b4" value="Display" class="btn btn-display"/>
            </div>
        </form>
    </div>
    

    <div class="table-container">
        <?php
        // Database Connection
        $conn = new mysqli("localhost", "root", "root", "mentee_management");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['b4'])) {
            $result = $conn->query("SELECT * FROM mentees");
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Mentor</th>
                            <th>Address</th>
                        </tr>";
    
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['mentee_id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['department'] . "</td>
                            <td>" . $row['mentor_name'] . "</td>
                            <td>" . $row['address'] . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p style='text-align:center; color:red;'>No mentees found in the database.</p>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>