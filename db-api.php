<?php
  class Database
  {
      // my class variables 
  
      public static function instance()
      {
          static $instance = null;
          if ($instance === null) $instance = new Database();
          return $instance;
      }
      private function __construct()
      {
          // connecting to the database
          $this->conn = new mysqli("127.0.0.1:3306","root","20485001","field_hockey");
          if($this->conn == false){
              die("error connecting to the database");
          }else{
              echo "<script>console.log('connection to the database is a success')</script>";
          }
      }
      public function __destruct()
      {
          // terminating the connection to the database
          mysqli_close($this->conn);
      }
      public function retrieveUsers()
      {
          // retrieving the user from the database
  
          $query = "SELECT * FROM users";
          $result = $this->conn->query($query);

          $users = array();   // to hold the array of users;
          while($row = $result->fetch_assoc()){
            array_push($users, $row);
          }

          return json_encode($users, true);
      }
      public function signUser($first_name, $last_name, $email, $password, $userType)
      {
          // registering the user and storing their information in our database
          $query = "INSERT INTO users (First_Name, Last_Name, Email, Password, is_admin) VALUES ('$first_name', '$last_name','$email','$password', '$userType')";
          
          if ($this->conn->query($query) === TRUE) {
            echo "<script>New record created successfully</script>";
          } else {
            echo "Error: " . $query . "<br>" . $this->conn->error;
          }
      }
      // this function will be used to retrieve a user using email
      public function retrieveUser($email){
        $query = "SELECT * FROM users WHERE Email='$email'";
          
        $result = $this->conn->query($query);

        return $result;
      }
      // this function will be used to check if a person can login or not using their email and password
      public function login($email, $password){
          // this function will handle user login functionality
          $query = "SELECT * FROM users WHERE Email='$email'";
          
          $result = $this->conn->query($query);

          // if the email is available in the database
          if($result->num_rows > 0){
            // compare the password
            $result = $result->fetch_assoc();
            if(password_verify($password, $result["Password"])){
                return true;
            }
          }
  
          return false;
      }
      // this funtion will be used to delete a user from the database
      public function removeUser($email){
        $query = "DELETE FROM users WHERE Email='$email'";
        if($this->retrieveUser($email)->num_rows > 0 && $this->conn->query($query) == true){
            echo "user deleted successfully";
        } else{
            echo "error deleting the user from the database <br>" . $this->conn->error;
        }
      }

      // this funtion will be used to update users information 

      // this function will be used to get all the teams information in the databse
      public function getTeams(){
        $query = "SELECT * FROM teams";
        $result = $this->con->query($query);
        if($result->num_rows > 0){
          // send a json object with the data
          $teams = array("count" => $result->num_rows, "teams" => []);   // to hold the array of users;
          while($row = $result->fetch_assoc()){
            array_push($teams["teams"], $row);
          }

          return json_encode($teams, true);
        }
      }

      // this function will be used to register teams
      public function registerTeam($name, $coach_id, $captain, $origin){
        $query = "INSERT INTO teams VALUES ('$name', '$coach_id', '$captain', '$origin')";

        if($this->conn->query($query) == true){
          echo '<script>console.log("Team added successfully");</script>';
        }else{
          echo $this->conn->error;
        }
      }

      // this function will be used to add coach into the db
      public function registerCoach($teamName, $gender, $position, $experience, $sDate, $eDate){
   
        $query = "INSERT INTO coaches (Gender,Position,Experience,Starting_Date,Ending_Date) VALUES ( '$gender', '$position', STR_TO_DATE('$experience','%Y-%m-%d'), STR_TO_DATE('$sDate','%Y-%m-%d'), STR_TO_DATE('$eDate','%Y-%m-%d'))";
        if($this->conn->query($query)== true){
          echo "<script>console.log('Coach successfully added!')</script>";
        }else {
          echo $this->conn->error;
        }
      }

      // this funtion will be used to register a player
      public function registerPlayer($player_id,$teamName, $first_name, $last_name, $position, $dob){
        $query = "INSERT INTO players VALUES ('$player_id','$teamName','$first_name','$last_name','$position',STR_TO_DATE('$dob','%Y-%m-%d'))";
        if($this->conn->query($query) == true){
          echo '<script>console.log("Player added successfully")</script>';
        }
        else {
          echo $this->conn->error;
        }
      }

  }

  $db = Database::instance();

    
    
?>