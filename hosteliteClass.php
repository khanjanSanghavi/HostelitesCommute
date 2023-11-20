<?php
    class db{
        var $con;
        var $login = false;
        function __construct(){
            try{
                $this->con = new PDO('mysql:host=localhost; dbname=hostelites' , 'root' , '');
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        public function saveStudentRegistration($student_id, $full_name, $phone_number, $hostel_name, $username, $password) {
            $stmt = $this->con->prepare("INSERT INTO studentreg (studentId, studentName, phoneNumber, hostelName, UserName, password) VALUES (:student_id, :full_name, :phone_number, :hostel_name, :username, :password)");
    
            $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':hostel_name', $hostel_name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
    
            $stmt->execute();
            $r = $stmt->rowCount();
            return $r;
            
    }

    public function validate($userName, $password){
        $query = "select * from studentreg where UserName=:userName AND password=:password";
        $stmt = $this->con->prepare($query);
  
        $stmt->bindParam(':userName' , $userName);
        $stmt->bindParam(':password' , $password);
        $stmt->execute();
        $r = $stmt->rowCount();
  
        if($r!=0){
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $login = true;
          return $result;
        }
        else{
          $r = 0;
          return 0;
        }
    }

    public function fetchOne($id){
        $query = "SELECT * FROM studentreg WHERE id = :id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id' , $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addRide($userId, $destination, $date, $time, $passengers) {
        $query = "INSERT INTO ridetbl (id, Destination, Date, Time, PassangerNo) VALUES (:user_id, :destination, :date, :time, :passengers)";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':passengers', $passengers);
        $stmt->bindParam(':user_id', $userId);

        $stmt->execute();
        $r = $stmt->rowCount();
        return $r;
    }

    public function getRides($id){
        $query = "SELECT * FROM ridetbl WHERE id = :id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id' , $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOneRide($id){
        $query = "SELECT * FROM ridetbl WHERE RideId = :id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id' , $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    function delete_ride($RideId)
    {
        $query = "DELETE from ridetbl where RideId=:rid";
        $stmt = $this->con->prepare($query);
        //$stmt->bindParam(':i' , $id);
        $stmt->bindParam(':rid' , $RideId);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function FindMatch($id, $destination, $date){
        $query = "SELECT studentId, studentName,Time,phoneNumber FROM ridetbl AS r INNER JOIN studentreg AS s ON r.id = s.id WHERE destination = :destination AND date = :date AND r.RideId != :id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':id' , $id);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetch_info($id)
    {
        $query= "Select * from studentreg where id=:id";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateStudentInfo($id,$student_id, $full_name, $phone_number, $hostel_name, $username, $password)
    {
        $qry= "UPDATE studentreg set studentId = :student_id, studentName = :full_name, phoneNumber = :phone_number, hostelName = :hostel_name, UserName = :username, password = :password where id = :id ";
        $stmt = $this->con->prepare($qry);

        $stmt->bindParam(':student_id', $student_id);
            $stmt->bindParam(':full_name', $full_name);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':hostel_name', $hostel_name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        
        
        $stmt->execute();

        $r = $stmt->rowCount();
        return $r;
    }

    
    function deleteProfile($id)
    {
        $query = "DELETE s,r FROM RIDETBL AS s INNER JOIN STUDENTREG AS r ON r.id = s.id WHERE s.id = :id ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $r = $stmt->rowCount();
        return $r;
    }

}
?>