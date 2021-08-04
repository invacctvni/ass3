<!doctype html>
<html lang="en">
<head charset="utf-8">
    <title>Save Gallery Image</title>
</head>
<body>
<?php

    $tmp_name = $_FILES['photo']['tmp_name'];
    //capture the inputs: file name & caption and store those in variables.
    //person name
    $person_name = $_POST['person_name'];
    //email
    $email = $_POST['email'];
    //image name
    $image_name = $_FILES['photo']['name'];
    //bio
    $bio = $_POST['bio'];
    session_start();
    $final_name = session_id() . '_' . $image_name;
    move_uploaded_file($tmp_name,"images/$final_name");
    // connect to the database
    require_once ('db.php');
    $sql = "INSERT INTO profileimages (person_name,email,image_name,bio) VALUES (:person_name,:email,:image_name,:bio)";
    $conn=new PDO('mysql:host=172.31.22.43;dbname=Jiaqi200477892', 'Jiaqi200477892', 'WH-tstIK2E');
    $cmd = $conn -> prepare($sql);
    //references:
    $cmd -> bindParam(':person_name',$person_name,PDO::PARAM_STR,100);
    $cmd -> bindParam(':email',$email,PDO::PARAM_STR,100);
    $cmd -> bindParam(':image_name',$image_name,PDO::PARAM_STR,100);
    $cmd -> bindParam(':bio',$bio,PDO::PARAM_STR,255);
    //run it.
    $cmd -> execute();
    //close off the connection.
    $conn =null;
    echo "Successfully Uploaded the Input Information";
?>
</body>
</html>
