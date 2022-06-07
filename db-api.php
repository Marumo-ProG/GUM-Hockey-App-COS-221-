<?php

  class Database
  {
      // my class variables 
      public $autho = false;
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
            session_start();
            $_SESSION["email"] = $email;
            if($userType == "Yes"){
              echo "<script>alert('Your account has been created, you have been logged in!'); window.location.href='./admin.php'</script>";
            } else {
              echo "<script>alert('Your account has been created, you have been logged in!'); window.location.href='./dashboard.php'</script>";
            }
            
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
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
          // send a json object with the data
          return $result;
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
      public function getCoach($id){
        $query = "SELECT * FROM coaches WHERE Coaches_id='$id'";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getTeam($id){
        $query = "SELECT * FROM teams WHERE Team_name='$id'";
        $result = $this->conn->query($query);
        
        return $result;
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
      public function getPlayer($id){
        $query = "SELECT * FROM players WHERE Player_id='$id'";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getTeamPlayers($id){
        $query = "SELECT * FROM players WHERE Team_name='$id'";
        $result = $this->conn->query($query);
        return $result;
      }

      public function getTournaments(){
        $query = "SELECT * FROM tournement";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
          // send a json object with the data
          $tournaments = array();   // to hold the array of users;
          while($row = $result->fetch_assoc()){
            array_push($tournaments, $row);
          }

          return $tournaments;
        }
      }

      // adding a register tournament function
      public function registerTournament($name, $season, $country, $city){
        //$id = rand(100,999999999);
        $query = "INSERT INTO tournement VALUES ('$name','$season','$country','$city', NULL)";
        if($this->conn->query($query) == true){
          echo '<script>alert("Tournament added successfully, just reload to see it"); window.location.href="tourMan.php";</script>';
        }
        else {
          echo $this->conn->error;
        }
      }

      public function retriveTournament($id){
        $query = "SELECT * FROM tournement WHERE Tournement_ID='$id'";
        $result = $this->conn->query($query);

        return $result->fetch_assoc();
      }

      public function tournamentUpdate($id,$name, $season, $country, $city, $winner){
        $query = "UPDATE tournement SET Tournement_Name = '$name', Tournement_Season= '$season', Tournement_Location_Country='$country', Tournement_Location_City='$city'
        ,Tournement_Winner = '$winner' WHERE Tournement_ID = '$id';";

        if($this->conn->query($query) == true){
          echo "<script>console.log('Tournament data updated successfully'); window.location.href='./tourMan.php'</script>";
        }else {
          echo $this->conn->error;
        }
      }

      public function teamUpdate($name, $coach_id, $captain, $origin){
        $query = "UPDATE teams SET Coach_id= '$coach_id', Team_Captain='$captain', Team_Origin='$origin' WHERE Team_name = '$name'";
        if($this->conn->query($query) == true){
          echo "<script>console.log('Team data updated successfully'); window.location.href='./tourMan.php'</script>";
        }else {
          echo $this->conn->error;
        }
      }

      public function coachUpdate( $coach_id, $name,$gender, $position,$experience, $sDate, $eDate){
        $query = "UPDATE coaches SET Team_name='$name', Gender='$gender', Position='$position', Experience='$experience', Starting_Date='$sDate', Ending_Date='$eDate' WHERE Coaches_id = '$coach_id'";
        if($this->conn->query($query) == true){
          echo "<script>console.log('Team data updated successfully'); window.location.href='./tourMan.php'</script>";
        }else {
          echo $this->conn->error;
        }
      }

      public function getGames(){
        $query = "SELECT * FROM games";
        $result = $this->conn->query($query);
        
        return $result;
      }
      public function getUmpire($license){
        $query = "SELECT * FROM umpire WHERE Umpire_licence='$license'";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getShorts(){
        $query = "SELECT * FROM event_shots ";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getFouls(){
        $query = "SELECT * FROM event_fouls ";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getHits(){
        $query = "SELECT * FROM event_hits ";
        $result = $this->conn->query($query);
        return $result;
      }

      public function getSubs(){
        $query = "SELECT * FROM event_substitution ";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getGameStats($id){
        $query = "SELECT * FROM game_stats ";
        $result = $this->conn->query($query);
        return $result;
      }
      public function getPlayerStats($id){
        $query = "SELECT * FROM player_stats ";
        $result = $this->conn->query($query);
        return $result;
      }


  }

  $db = Database::instance();
        
?>