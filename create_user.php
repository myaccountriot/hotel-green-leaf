<?php
include_once 'header.php';
include_once 'database.php';
include_once 'User.php';
// instantiate database and student object
$database = new Database();
$db = $database->getConnection();

$Userobj = new User($db);
  
// contents will be here
echo "<div class='right-button-margin'>";
echo "<a href='userUI.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> DISPLAY USER";
echo "</a>";
echo "</div>";
echo "</br>";
echo "</br>";
?>
<!-- post code will be here -->
<?php 
// if the form was submitted
if($_GET){
  
    // set user property values

    $Userobj->userid = $_GET['userid'];
    $Userobj->name = $_GET['name'];
    $Userobj->useraddress = $_GET['useraddress'];
    
    
    // add user
    if($Userobj->create())
    {
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "USER is Added";
        echo "</div>";
    }
  
    // if unable to update the user 
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "USER not added";
        echo "</div>";
    }
}
?>
<!-- 'Update Student' form will be here -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] );?>" method="get">
    <table class='table table-hover table-responsive table-bordered'>
  
        <tr>
            <td>USERID</td>
            <td><input type='text' readonly name='userid'   
            class='form-control'  /></td>
        </tr>
        <tr>
            <td>USERNAME</td>
            <td><input type='text' name='name'   
            class='form-control'  /></td>
        </tr>
        
        <tr>
            <td>ADDRESS</td>
            <td><input type='text' name='useraddress'   class='form-control' />
            </td>
     
        </tr>        
    </table>
    <div class="text-center">
    <button type=submit class="btn btn-success" >INSERT</button>
</div>
</form>
<?php
echo "<br><br>";
include_once 'footer.php';
?>