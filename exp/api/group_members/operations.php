<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "group_members";

    // Columns
    public $id;
    public $groupid;
    public $groupname;
    public $mem_name;
    public $mobile_num;
    public $type;
    public $add1;
    public $add2;
    public $add3;
    public $add4;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, groupid, groupname, mem_name, mobile_num, type, add1, add2, add3, add4  FROM " . $this->db_table  ;
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
                        mem_name = :mem_name,
                        mobile_num = :mobile_num,
                        type = :type,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->groupid=htmlspecialchars(strip_tags($this->groupid));
        $this->groupname=htmlspecialchars(strip_tags($this->groupname));
        $this->mem_name=htmlspecialchars(strip_tags($this->mem_name));
        $this->mobile_num=htmlspecialchars(strip_tags($this->mobile_num));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->add1=htmlspecialchars(strip_tags($this->add1));
        $this->add2=htmlspecialchars(strip_tags($this->add2));
        $this->add3=htmlspecialchars(strip_tags($this->add3));
        $this->add4=htmlspecialchars(strip_tags($this->add4));
        


        // bind data
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":groupname", $this->groupname);
        $stmt->bindParam(":mem_name", $this->mem_name);
        $stmt->bindParam(":mobile_num", $this->mobile_num);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        $stmt->bindParam(":add3", $this->add3);
        $stmt->bindParam(":add4", $this->add4);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, groupid, groupname, mem_name, mobile_num, type, add1, add2, add3, add4
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
        $this->mem_name = $dataRow['mem_name'];
        $this->mobile_num = $dataRow['mobile_num'];
        $this->type = $dataRow['type'];
        $this->add1 = $dataRow['add1'];
        $this->add2 = $dataRow['add2'];
        $this->add3 = $dataRow['add3'];
        $this->add4 = $dataRow['add4'];
       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        groupid = :groupid,
                        groupname = :groupname,
                        mem_name = :mem_name,
                        mobile_num = :mobile_num,
                        type = :type,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->groupid = htmlspecialchars(strip_tags($this->groupid));
        $this->groupname = htmlspecialchars(strip_tags($this->groupname));
        $this->mem_name = htmlspecialchars(strip_tags($this->mem_name));
        $this->mobile_num = htmlspecialchars(strip_tags($this->mobile_num));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->add1 = htmlspecialchars(strip_tags($this->add1));
        $this->add2 = htmlspecialchars(strip_tags($this->add2));
        $this->add3 = htmlspecialchars(strip_tags($this->add3));
        $this->add4 = htmlspecialchars(strip_tags($this->add4));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":groupname", $this->groupname);
        $stmt->bindParam(":mem_name", $this->mem_name);
        $stmt->bindParam(":mobile_num", $this->mobile_num);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        $stmt->bindParam(":add3", $this->add3);
        $stmt->bindParam(":add4", $this->add4);
        

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