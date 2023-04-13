<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "Groups";

    // Columns
    public $id;
    public $groupid;
    public $groupname;
    public $admin;
    public $add1;
    public $add2;
    public $add3;
    public $add4;
    public $add5;
    public $add6;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, groupid, groupname, admin, add1, add2, add3, add4, add5, add6  FROM " . $this->db_table  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        groupid = :groupid,
                        groupname = :groupname,
                        admin = :admin,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4,
                        add5 = :add5,
                        add6 = :add6
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->groupid=htmlspecialchars(strip_tags($this->groupid));
        $this->groupname=htmlspecialchars(strip_tags($this->groupname));
        $this->admin=htmlspecialchars(strip_tags($this->admin));
        $this->add1=htmlspecialchars(strip_tags($this->add1));
        $this->add2=htmlspecialchars(strip_tags($this->add2));
        $this->add3=htmlspecialchars(strip_tags($this->add3));
        $this->add4=htmlspecialchars(strip_tags($this->add4));
        $this->add5=htmlspecialchars(strip_tags($this->add5));
        $this->add6=htmlspecialchars(strip_tags($this->add6));
        


        // bind data
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":groupname", $this->groupname);
        $stmt->bindParam(":admin", $this->admin);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        $stmt->bindParam(":add3", $this->add3);
        $stmt->bindParam(":add4", $this->add4);
        $stmt->bindParam(":add5", $this->add5);
        $stmt->bindParam(":add6", $this->add6);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, groupid, groupname, admin, add1, add2, add3, add4, add5, add6
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

        $stmt = $this->conn->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $dataRow['id'];
        $this->groupid = $dataRow['groupid'];
        $this->groupname = $dataRow['groupname'];
        $this->admin = $dataRow['admin'];
        $this->add1 = $dataRow['add1'];
        $this->add2 = $dataRow['add2'];
        $this->add3 = $dataRow['add3'];
        $this->add4 = $dataRow['add4'];
        $this->add5 = $dataRow['add5'];
        $this->add6 = $dataRow['add6'];
       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        groupid = :groupid,
                        groupname = :groupname,
                        admin = :admin,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4,
                        add5 = :add5,
                        add6 = :add6
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->groupid = htmlspecialchars(strip_tags($this->groupid));
        $this->groupname = htmlspecialchars(strip_tags($this->groupname));
        $this->admin = htmlspecialchars(strip_tags($this->admin));
        $this->add1 = htmlspecialchars(strip_tags($this->add1));
        $this->add2 = htmlspecialchars(strip_tags($this->add2));
        $this->add3 = htmlspecialchars(strip_tags($this->add3));
        $this->add4 = htmlspecialchars(strip_tags($this->add4));
        $this->add5 = htmlspecialchars(strip_tags($this->add5));
        $this->add6 = htmlspecialchars(strip_tags($this->add6));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":groupname", $this->groupname);
        $stmt->bindParam(":admin", $this->admin);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        $stmt->bindParam(":add3", $this->add3);
        $stmt->bindParam(":add4", $this->add4);
        $stmt->bindParam(":add5", $this->add5);
        $stmt->bindParam(":add6", $this->add6);
        

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // DELETE
    function deletetest(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}
?>