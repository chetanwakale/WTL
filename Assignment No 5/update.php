

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<style>
       body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            padding: 8px;
            width: 100%;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        form {
            width: 300px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
</style>
<body>
<form method="POST">

            <label>Old Mentee ID:</label>
            <input type="text" name="OldId" >
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
    <button type="submit" name="update">Update Record</button>
    <button type="submit" name="home">HOME -> </button>
</form>
</body>
</html>

<?php
include 'db_connect.php';

if(isset($_POST['update'])){

    $oldID=$_POST['OldId'];
    $mentId = $_POST['mentId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $mentorName = $_POST['mentorName'];
    $address = $_POST['address'];

    $sql = "UPDATE mentees 
    SET mentee_id='$mentId', name='$name', email='$email', phone='$phone', 
        department='$department', mentor_name='$mentorName', address='$address' 
    WHERE mentee_id='$oldID'";
    $conn->query($sql);
    echo "Updated Successfully";

}

if(isset($_POST['home'])){
    header("Location:MenteeManagement.php");
}

?>
