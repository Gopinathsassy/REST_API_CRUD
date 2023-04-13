<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "explist";

    // Columns
    public $id;
    public $name;
    public $exp_not;
    public $amount;
    public $exp_date;
    public $date;
    public $time;
    public $groupid;
    public $add1;
    public $add2;



    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ALL
    public function gettest(){
        $sqlQuery = "SELECT id, name, exp_not, amount, exp_date, date, time, groupid, add1, add2  FROM " . $this->db_table  ;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createtest(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        
                        name = :name,
                        exp_not = :exp_not,
                        amount = :amount,
                        exp_date = :exp_date,
                        date = :date,
                        time = :time,
                        groupid = :groupid,
                        add1 = :add1,
                        add2 = :add2
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->exp_not=htmlspecialchars(strip_tags($this->exp_not));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->exp_date=htmlspecialchars(strip_tags($this->exp_date));
        $this->date=htmlspecialchars(strip_tags($this->date));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->groupid=htmlspecialchars(strip_tags($this->groupid));
        $this->add1=htmlspecialchars(strip_tags($this->add1));
        $this->add2=htmlspecialchars(strip_tags($this->add2));
        


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":exp_not", $this->exp_not);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":exp_date", $this->exp_date);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ single
        public function getSingletest(){
        $sqlQuery = "SELECT id, name, exp_not, amount, exp_date, date, time, groupid, add1, add2
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
        $this->name = $dataRow['name'];
        $this->exp_not = $dataRow['exp_not'];
        $this->amount = $dataRow['amount'];
        $this->exp_date = $dataRow['exp_date'];
        $this->date = $dataRow['date'];
        $this->time = $dataRow['time'];
        $this->groupid = $dataRow['groupid'];
        $this->add1 = $dataRow['add1'];
        $this->add2 = $dataRow['add2'];
       
        
    }

    // UPDATE
   public function updatetest(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        id = :id,
                        name = :name,
                        exp_not = :exp_not,
                        amount = :amount,
                        exp_date = :exp_date,
                        date = :date,
                        time = :time,
                        groupid = :groupid,
                        add1 = :add1,
                        add2 = :add2
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->exp_not = htmlspecialchars(strip_tags($this->exp_not));
        $this->amount = htmlspecialchars(strip_tags($this->amount));
        $this->exp_date = htmlspecialchars(strip_tags($this->exp_date));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->groupid = htmlspecialchars(strip_tags($this->groupid));
        $this->add1 = htmlspecialchars(strip_tags($this->add1));
        $this->add2 = htmlspecialchars(strip_tags($this->add2));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":exp_not", $this->exp_not);
        $stmt->bindParam(":amount", $this->amount);
        $stmt->bindParam(":exp_date", $this->exp_date);
        $stmt->bindParam(":date", $this->date);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":groupid", $this->groupid);
        $stmt->bindParam(":add1", $this->add1);
        $stmt->bindParam(":add2", $this->add2);
        

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