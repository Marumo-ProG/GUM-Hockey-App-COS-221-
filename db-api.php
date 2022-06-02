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
  
          return $result;
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

  }

  $db = Database::instance();

    
    
?>