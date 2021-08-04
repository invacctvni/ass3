<!-- Here we will add our header file. -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Uploading</title>
    <meta name="description" content="This week we will be looking at how to upload files to our database.">
    <meta name="robots" content="noidex, nofollow">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<!-- This will hold our global navigation. We will add this here so that we can reuse this section of code and not have to recreate it over and over again. -->
<header>
    <!-- logo container -->
    <div>
        <a href="index.php"><img src="./img/logos-white.png" alt="logo"></a>
    </div>
    <!-- navigation -->
    <nav>
        <ul>
            <li><a href="#">Menu 1</a></li>
            <li><a href="#">Menu 2</a></li>
            <li><a href="#">Menu 3</a></li>
            <li><a href="#">Menu 4</a></li>
        </ul>
    </nav>
</header>
<main>
    <section class="masthead">
        <div>
            <h1>Uploading Files With PHP</h1>
        </div>
    </section>
    <section class="row-one">
        <!-- The ultipart/form-data value is necessary if the user will upload a file through the form -->
<!--        The profile contains the following items: image, person full name, email, image name and bio-->
        <form method="post" action="save-image.php" enctype="multipart/form-data">
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
            <input type="submit" name="upload" value="Upload">
        </form>
    </section>
</main>
<!-- Let's add our footer file. -->
<!-- Just like the header we will create our footer content here, so that it can be reused for all of our pages. -->
<?php
//Check Authentication
$conn=new PDO('mysql:host=172.31.22.43;dbname=Jiaqi200477892', 'Jiaqi200477892', 'WH-tstIK2E');
//check for authentication before we show any data.
//session_start();
//select * from the table.
$sql = "SELECT * FROM profileimages";
//run the query.
$result = $conn -> query($sql);
//start creating table.
//echo out section class
echo '<section class="person-row">';
echo '<table>
                        <tr>
                           
                            <th>person Name</th>
                            <th>email</th>
                            <th>Image Name</th>
                            <th>bio</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
foreach($result as $row)
{
    echo '<tr>
                   
                           <td>' . $row['person_name'] . '</td>
                           <td>' . $row['email'] . '</td>
                           <td>' . $row['image_name'] . '</td>
                           <td>' . $row['bio'] . '</td>
                           <td><a href="edit.php?ID=' . $row['image_id'] . '">Update</a></td>
                           <td><a href="delete.php?ID=' .$row['image_id'] . '"
                           onclick="return confirm(\'Are you sure you want to delete ' . $row['person_name'] .
        '?\');">Delete</a></td>
                            </tr>';
}
echo '</table>';
echo '<a href="logout.php">Logout</a>';
echo '</section>';
//disconnect
$conn = null;

?>
<br>
<?php
echo '<a href="index.php">Click Here to Return Home Page</a>';
echo '</section>';
//take user to the gallery
//header('location:gallery.php');


?>
<footer>
    <div>
        <h5>I'm A Footer!!</h5>
    </div>
</footer>
</body>
</html>
