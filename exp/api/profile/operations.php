<?php
class testclass{

    // Connection
    private $conn;

    // Table
    private $db_table = "profile";

    // Columns
    public $id;
    public $name;
    public $phone_num;
    public $password;
    public $mail_id;
    public $image;
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
        $sqlQuery = "SELECT id, name, phone_num, password, mail_id, image, add1, add2, add3, add4  FROM " . $this->db_table  ;
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
                        phone_num = :phone_num,
                        password = :password,
                        mail_id = :mail_id,
                        image = :image,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4
                        ";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->phone_num=htmlspecialchars(strip_tags($this->phone_num));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->mail_id=htmlspecialchars(strip_tags($this->mail_id));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->add1=htmlspecialchars(strip_tags($this->add1));
        $this->add2=htmlspecialchars(strip_tags($this->add2));
        $this->add3=htmlspecialchars(strip_tags($this->add3));
        $this->add4=htmlspecialchars(strip_tags($this->add4));
        


        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone_num", $this->phone_num);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":mail_id", $this->mail_id);
        $stmt->bindParam(":image", $this->image);
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
        $sqlQuery = "SELECT id, name, phone_num, password, mail_id, image, add1, add2, add3, add4
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
        $this->phone_num = $dataRow['phone_num'];
        $this->password = $dataRow['password'];
        $this->mail_id = $dataRow['mail_id'];
        $this->image = $dataRow['image'];
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
                        name = :name,
                        phone_num = :phone_num,
                        password = :password,
                        mail_id = :mail_id,
                        image = :image,
                        add1 = :add1,
                        add2 = :add2,
                        add3 = :add3,
                        add4 = :add4
                       
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->phone_num = htmlspecialchars(strip_tags($this->phone_num));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->mail_id = htmlspecialchars(strip_tags($this->mail_id));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->add1 = htmlspecialchars(strip_tags($this->add1));
        $this->add2 = htmlspecialchars(strip_tags($this->add2));
        $this->add3 = htmlspecialchars(strip_tags($this->add3));
        $this->add4 = htmlspecialchars(strip_tags($this->add4));
        


        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":phone_num", $this->phone_num);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":mail_id", $this->mail_id);
        $stmt->bindParam(":image", $this->image);
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