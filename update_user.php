
<?php
include_once 'User.php';
include_once 'database.php';
include_once 'header.php';

//instantiate database..
$database=new Database();
$db=$database->getConnection();

$Userobj=new User($db);

$userid = isset($_GET['userid']) ? $_GET['roomn'] :die('ERROR'); 

$Userobj->roomn=$roomn;

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

    $Userobj->roomn = $_POST['roomn'];
    $Userobj->roomca = $_POST['roomca'];
    $Userobj->pr = $_POST['pr'];
    $Userobj->ava = $_POST['ava'];
    
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?roomn={$roomn}");?>"  method="post">
    <table class='table table-hover table-responsive table-bordered'>
  
        <tr>
            <td>RROM NUMBER</td>
            <td><input type='text'  name='roomn'  value='<?php echo $Userobj->roomn; ?>' 
            class='form-control'  /></td>
        </tr>
        <tr>
            <td>ROOM CATEGORY</td>
            <td><input type='text' name='roomca'  value='<?php echo $Userobj->roomca; ?>' 
            class='form-control'  /></td>
        </tr>
        <tr>
            <td>PRICE</td>
            <td><input type='text' name='pr'  value='<?php echo $Userobj->pr; ?>' 
            class='form-control'  /></td>
        </tr>
        
        <tr>
            <td>AVAILABILITY</td>
            <td><input type='text' name='ava'  value='<?php echo $Userobj->ava; ?>' class='form-control' />
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

