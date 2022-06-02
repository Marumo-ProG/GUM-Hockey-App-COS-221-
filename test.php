
<?php
        // this file was made for testing the php api integration into a html file, please dont change or modify
?>

<?php include "db-api.php" ?>
<!DOCTYPE html>
<html>

<head>

<body>
    <hr>
    <h3>Hello, Please enter the information to request</h3>
    <hr>
    <button id="users">request Users</button>
    <button id="teams">request teams</button>

    <br>
    <h3> this section is for testing the adding of a new user using ajax</h3>
    <hr>
    

    <script>
        document.getElementById('users').addEventListener('click', function() {

            // making an ajax call here
            var xhr = new XMLHttpRequest();

            // Making our connection  
            var url = 'getUsers.php';
            xhr.open("GET", url, true);

            // function execute after request is successful 
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            }
            // Sending our request 
            xhr.send();
        })
    </script>
</body>
</head>

</html>