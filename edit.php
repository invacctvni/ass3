<?php
    //Establish DataBase Connection First
    require('db.php');
    //Retrieve the rows from the database
    //Create the query
    $sql = "SELECT * FROM profileimages WHERE image_id=:id";
try {
    $conn=new PDO('mysql:host=172.31.22.43;dbname=Jiaqi200477892', 'Jiaqi200477892', 'WH-tstIK2E');

    // This attribute ensures that any SQL errors are reported
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $error) {
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    $_SESSION['errors'][] = $error->getMessage();
}
    //return the syntax object.
    $stmt = $conn->prepare($sql);
    //bind a parameter id to a variable name id
    $stmt ->bindParam(':id',$_GET['id']);
    //execute the command.
    $stmt ->execute();
    //get the nextline.
    $row = $stmt->fetch();

    var_dump($row);
?>

<!--include headings-->
<!-- Here we will add our header file. -->
<?php require('./header.php');?>
    <main>
        <section class="masthead">
            <div>
                <h1>Uploading Files With PHP</h1>
            </div>
        </section>
<!--Populate the form with the inputted row-->
    <section class="row-one">
        <!-- The ultipart/form-data value is necessary if the user will upload a file through the form -->
        <!--        The profile contains the following items: image, person full name, email, image name and bio-->
        <form method="post" action="update.php" enctype="multipart/form-data">
            <div>
                <label for="photo">Choose a photo</label>
                <input type="file" name="photo">
            </div>
            <div>
                <label for ="person_name">Person Name:</label>
                <input type="text" name = "person_name">
            </div>
            <div>
                <label for ="email">Email:</label>
                <input type="email" name = "email">
            </div>
            <div>
                <label for ="image_name">Image Name:</label>
                <input type="text" name = "image_name">
            </div>
            <div>
                <label for ="bio">Bio:</label>
                <input type="text" name = "bio">
            </div>
            <input type="submit" name="upload">
        </form>
    </section>
    </main>




