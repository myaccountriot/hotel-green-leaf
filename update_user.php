
<?php
include_once 'User.php';
include_once 'database.php';
include_once 'header.php';

//instantiate database..
$database=new Database();
$db=$database->getConnection();

$Userobj=new User($db);

$userid = isset($_GET['userid']) ? $_GET['userid'] :die('ERROR'); 

$Userobj->userid=$userid;

$Userobj->setorg();

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
if($_POST){
  
    // set user property values

    $Userobj->userid = $_POST['userid'];
    $Userobj->name = $_POST['name'];
    $Userobj->useraddress = $_POST['useraddress'];
    
    
    // update user
    if($Userobj->update())
    {
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "USER is updated";
        echo "</div>";
    }
  
    // if unable to update the user 
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "USER is not updated";
        echo "</div>";
    }
}
?>
<!-- 'Update Student' form will be here -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?userid={$userid}");?>"  method="post">
    <table class='table table-hover table-responsive table-bordered'>
  
        <tr>
            <td>USERID</td>
            <td><input type='text' readonly name='userid'  value='<?php echo $Userobj->userid; ?>' 
            class='form-control'  /></td>
        </tr>
        <tr>
            <td>USERNAME</td>
            <td><input type='text' name='name'  value='<?php echo $Userobj->name; ?>' 
            class='form-control'  /></td>
        </tr>
        
        <tr>
            <td>ADDRESS</td>
            <td><input type='text' name='useraddress'  value='<?php echo $Userobj->useraddress; ?>' class='form-control' />
            </td>
     
        </tr>        
    </table>
    <div class="text-center">
    <button type=submit class="btn btn-success" >UPDATE</button>
</div>
</form>
<?php
echo "<br><br>";
include_once 'footer.php';
?>

