<!--include some type of validation besides the pre-built HTML validation.-->
<!-- Global Heading-->
<?php
//include 'header.php';
?>
<section class="delete-user">
    <?php
    require('db.php');
    //get id from where clicked
    $sql = "DELETE FROM profileimages WHERE image_id = '" . $_GET["ID"] . "'";
    $conn = new mysqli('172.31.22.43','Jiaqi200477892','WH-tstIK2E','Jiaqi200477892');
    if(mysqli_query($conn,$sql))
    {
        echo '<div class="sign"><p>Record has been deleted</p>';
        echo "<a href='index.php'>Click Here to Return Home Page</a></p>";
    }
    else
    {
        echo "<p>Error in deleting record: ". mysqli_error($conn) . "</p>";
    }
    //mysqli_close();
    ?>
</section>
<!-- Global Footer-->
<?php
//include 'footer.php';
?>
