<?php
class User
{
    private $conn;
   
    private $table_name = "rooms";
   

    // object properties
    public $roomn;

    public $roomca;

    public $pr;

    public $ava;

    public function __construct($db){
        $this->conn = $db;
       // echo $this->conn;
    }
    public function search()
    {
        // select query
        $query = "SELECT * from rooms";
                
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
                    (Roomno,Roomcat,Price,Availability)
                values (
                    :roomn,
                    :roomca,
                    :pr,
                    :ava;
                )";
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->roomn=htmlspecialchars(strip_tags($this->roomn));
        $this->roomca=htmlspecialchars(strip_tags($this->roomca));
        $this->pr=htmlspecialchars(strip_tags($this->pr));
        $this->ava=htmlspecialchars(strip_tags($this->ava));
        
        // bind parameters
        $stmt->bindParam(":roomn", $this->roomn);
        $stmt->bindParam(":roomca", $this->roomca);
        $stmt->bindParam(":pr", $this->pr);
        $stmt->bindParam(":ava", $this->ava);


        // execute the query
        if($stmt->execute()){
            return true;
        }
        return false;
          
    }
    function setorg(){
  
        $query = "SELECT * FROM  " . $this->table_name . " WHERE Roomno = ? LIMIT 0,1";
      
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->userid);
        
        $stmt->execute();
      
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
        $this->roomca = $row['Roomcat'];
        $this->pr = $row['Price'];
        $this->ava = $row['Availability'];

    }

    //update student
    function update(){
                
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    Roomcat=:roomca,
                    Price=:pr,
                    Availability:=ava;
                WHERE
                    Roomno=:roomn";
        // echo $query;
        $stmt = $this->conn->prepare($query);
        
        // posted values
        $this->roomn=htmlspecialchars(strip_tags($this->roomn));
        $this->roomca=htmlspecialchars(strip_tags($this->roomca));
        $this->pr=htmlspecialchars(strip_tags($this->pr));
        $this->ava=htmlspecialchars(strip_tags($this->ava));
        
        // bind parameters
        $stmt->bindParam(":roomn", $this->roomn);
        $stmt->bindParam(":roomca", $this->roomca);
        $stmt->bindParam(":pr", $this->pr);
        $stmt->bindParam(":ava", $this->ava);
      
        // execute the query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }
}
?>