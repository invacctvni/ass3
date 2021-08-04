<!--include some type of validation besides the pre-built HTML validation.-->
<!-- Global Heading-->
<?php
//include 'header.php';
?>
<section class="update-user">
    <?php
    require('db.php');
    $conn=new PDO('mysql:host=172.31.22.43;dbname=Jiaqi200477892', 'Jiaqi200477892', 'WH-tstIK2E');
    //get id from where clicked
    //$conn = new mysqli('172.31.22.43','Jiaqi200477892','WH-tstIK2E','Jiaqi200477892');
    //update the existing row in the database.
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
    require('db.php');
    $sql =  "UPDATE profileimages SET person_name =:person_name,
                                     email =:email,
                                     image_name =:image_name,                        
                                     bio =:bio
                                    WHERE image_id =:id;
                                     ";
    $cmd = $conn -> prepare($sql);
    //references:
    $cmd ->bindParam(':id',$_GET['id']);
    $cmd ->bindParam(':person_name',$person_name,PDO::PARAM_STR,255);
    $cmd ->bindParam(':email',$email,PDO::PARAM_STR,255);
    $cmd ->bindParam(':image_name',$image_name,PDO::PARAM_STR);
    $cmd ->bindParam(':bio',$bio,PDO::PARAM_STR,255);
    //run it.
    $cmd -> execute();
    //close off the connection.
    $conn =null;

    //session_start();
    try{
        $_SESSION["message"] =  "The super was updated successfully";
        header("Location:index.php");
    }catch (PDOException $e){
        $_SESSION["message"] = "There was an error updating the super".$e->getMessage();
        header("Location:edit.php");
    }


    //header("Location:index.php");
    exit();
    ?>


</section>
<!-- Global Footer-->
<?php
//include 'footer.php';
?>
