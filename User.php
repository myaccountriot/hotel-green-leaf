<?php
class User
{
    private $conn;
   
    private $table_name = "User";
   

    // object properties
    public $userid;

    public $name;

    public $useraddress;

    public function __construct($db){
        $this->conn = $db;
       // echo $this->conn;
    }
    public function search()
    {
        // select query
        $query = "SELECT * from User";
                
        //echo "<br>" .$query;
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
        
        // execute query
        $stmt->execute();
        // echo "<br>" .$stmt->rowCount();
        
        // return values from database
        return $stmt;
    }

    //Create student
    function create(){
                
        $query = "insert into
                    " . $this->table_name . "
                    (User_name,User_address)
                values (
                    :name,
                    :useraddress
                )";
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->useraddress=htmlspecialchars(strip_tags($this->useraddress));
        
        // bind parameters
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":useraddress", $this->useraddress);

        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
          
    }
    function setorg(){
  
        $query = "SELECT * FROM  " . $this->table_name . " WHERE User_id = ? LIMIT 0,1";
      
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->userid);
        
        $stmt->execute();
      
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $this->name = $row['User_name'];
        $this->useraddress = $row['User_address'];

    }

    //update student
    function update(){
                
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    User_name=:name,
                    User_address=:useraddress
                WHERE
                    User_id=:userid";
        // echo $query;
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->userid=htmlspecialchars(strip_tags($this->userid));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->useraddress=htmlspecialchars(strip_tags($this->useraddress));
        
        // bind parameters
        $stmt->bindParam(":userid", $this->userid);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":useraddress", $this->useraddress);
      
        // execute the query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
}
?>