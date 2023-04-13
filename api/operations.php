<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "dummy";

    // Columns
    public $id;
    public $test1;
    public $test2;
    public $test3;
    public $test4;
    public $test5;
    public $test6;
    public $test7;
    public $test8;
    public $test9;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, test1, test2, test3, test4, test5, test6, test7, test8, test9  FROM " . $this->db_table  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        test1 = :test1,
                        test2 = :test2,
                        test3 = :test3,
                        test4 = :test4,
                        test5 = :test5,
                        test6 = :test6,
                        test7 = :test7,
                        test8 = :test8,
                        test9 = :test9
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->test1=htmlspecialchars(strip_tags($this->test1));
        $this->test2=htmlspecialchars(strip_tags($this->test2));
        $this->test3=htmlspecialchars(strip_tags($this->test3));
        $this->test4=htmlspecialchars(strip_tags($this->test4));
        $this->test5=htmlspecialchars(strip_tags($this->test5));
        $this->test6=htmlspecialchars(strip_tags($this->test6));
        $this->test7=htmlspecialchars(strip_tags($this->test7));
        $this->test8=htmlspecialchars(strip_tags($this->test8));
        $this->test9=htmlspecialchars(strip_tags($this->test9));
        


        // bind data
        $stmt->bindParam(":test1", $this->test1);
        $stmt->bindParam(":test2", $this->test2);
        $stmt->bindParam(":test3", $this->test3);
        $stmt->bindParam(":test4", $this->test4);
        $stmt->bindParam(":test5", $this->test5);
        $stmt->bindParam(":test6", $this->test6);
        $stmt->bindParam(":test7", $this->test7);
        $stmt->bindParam(":test8", $this->test8);
        $stmt->bindParam(":test9", $this->test9);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, test1, test2, test3, test4, test5, test6, test7, test8, test9
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
        $this->test1 = $dataRow['test1'];
        $this->test2 = $dataRow['test2'];
        $this->test3 = $dataRow['test3'];
        $this->test4 = $dataRow['test4'];
        $this->test5 = $dataRow['test5'];
        $this->test6 = $dataRow['test6'];
        $this->test7 = $dataRow['test7'];
        $this->test8 = $dataRow['test8'];
        $this->test9 = $dataRow['test9'];
       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        test1 = :test1,
                        test2 = :test2,
                        test3 = :test3,
                        test4 = :test4,
                        test5 = :test5,
                        test6 = :test6,
                        test7 = :test7,
                        test8 = :test8,
                        test9 = :test9
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->test1 = htmlspecialchars(strip_tags($this->test1));
        $this->test2 = htmlspecialchars(strip_tags($this->test2));
        $this->test3 = htmlspecialchars(strip_tags($this->test3));
        $this->test4 = htmlspecialchars(strip_tags($this->test4));
        $this->test5 = htmlspecialchars(strip_tags($this->test5));
        $this->test6 = htmlspecialchars(strip_tags($this->test6));
        $this->test7 = htmlspecialchars(strip_tags($this->test7));
        $this->test8 = htmlspecialchars(strip_tags($this->test8));
        $this->test9 = htmlspecialchars(strip_tags($this->test9));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":test1", $this->test1);
        $stmt->bindParam(":test2", $this->test2);
        $stmt->bindParam(":test3", $this->test3);
        $stmt->bindParam(":test4", $this->test4);
        $stmt->bindParam(":test5", $this->test5);
        $stmt->bindParam(":test6", $this->test6);
        $stmt->bindParam(":test7", $this->test7);
        $stmt->bindParam(":test8", $this->test8);
        $stmt->bindParam(":test9", $this->test9);
        

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