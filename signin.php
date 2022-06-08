<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="/Users/tlhalefodikolomela/Desktop/COS 216/COS216-Mock/imgs/faviconEarth.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">


    <title>GUM field hockey--login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark ">
            <!-- navbar-dark bg-dark -->
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="imgs/logo.jpeg" alt="" width="30" height="24"
                        class="d-inline-block align-text-top">
                    GUM Login
                </a></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li><a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="login-form">
        <h3>Please fill in the information below to signup</h3>
        <hr>
        <br>
        <form id="signup-form" action="validate-signup.php" method="POST">
            <div class="form-group">
                <label for="exampleInputFN">First name</label>
                <input type="text" name="first_name" class="form-control" id="exampleInputFN"
                    aria-describedby="emailHelp" placeholder="Enter first name">
               
            </div>
            <div class="form-group">
                <label for="exampleInputLN">Last name</label>
                <input type="text" name="last_name" class="form-control" id="exampleInputLN"
                    aria-describedby="emailHelp" placeholder="Enter last name">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" name="is_admin" value="true" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Are you an admin?</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
    </section>

    <!-- <script>
        var form = document.getElementById("signup-form");
        var is_admin = document.getElementById("exampleCheck1");
        form.addEventListener("submit", function(e){
            // check if the admin checkbox is checked
            e.preventDefault();
            if(is_admin.checked){
                var code = prompt("Please enter the admin code to register as admin:", "");
                if(code === "12345"){
                    form.submit();
                }else{
                    alert("Wrong admin pin");
                }
            }else{
                form.submit();
            }
        })
    </script> -->

<script src="newUser.js" type="text/javascript"></script>
</body>

</html>