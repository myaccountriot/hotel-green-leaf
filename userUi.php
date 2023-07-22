<link rel="stylesheet" href="UserStyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/b7bcf82c33.js" crossorigin="anonymous"></script>
<?php
include_once 'database.php';
include_once 'User.php';
include_once 'header.php';
// instantiate database 
$database = new Database();
$db = $database->getConnection();

//create user object
$Userobj = new User($db);
$stmt = $Userobj->search();

$total_rows=$stmt->rowCount();

echo "<div class='row'>";
if($total_rows>0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<td>USER_ID</th>";
            echo "<th>USER_NAME</th>";
            echo "<th>USER_ADDRESS</th>";
            echo "</tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
            echo "<td>{$User_id}</td>"; 
            echo "<td>{$User_name}</td>";
            echo "<td>{$User_address}</td>";
            echo "<td>";
                echo "<a href='update_user.php?userid={$User_id}' class='btn btn-primary'>
                    <i class='fa-solid fa-pen-to-square'></i> UPDATE </a>";
                echo "&ensp;";
                echo "<button class='btn btn-danger'>
                <i class='fa-solid fa-trash'></i> DELETE</button>";
           echo "</td>";
        echo "</tr>"; 
        }
        echo "</table>";
}    
    echo "<a href='create_user.php' class='btn btn-success'>
    <i class='fa-regular fa-plus'></i> CREATE </a>";

echo "</div>";
echo "<br><br>";
?>
<?php
    include_once 'footer.php';
?> 