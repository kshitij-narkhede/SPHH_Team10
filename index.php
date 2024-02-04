<?php
if(isset($_POST['name'])){
  echo("Done0");
$server="localhost";
$username="root";
$password="";
echo("Done1");

$con=mysqli_connect($server,$username,$password);
echo("Done2");
if(!$con){
    die("Connection to the database failed due to".mysqli_connect_error());
}

echo("Success Connected.");

$name= $_POST['name'];
$email= $_POST['email'];
$userpass= $_POST['userpass'];
$cnfpass = $_POST['cnfpass'];
$phno= $_POST['phno'];
// $dob= $_POST['dob'];
$gender =$_POST['gender'];
$bloodgroup=$_POST['bloodgroup'];
$age= $_POST['age'];

$sql="INSERT INTO `hackathon`.`signup` (`name`, `email`, `userpass`, `cnfpass`, `phno`,`gender`,`bloodgroup`,`age`) VALUES ('$name', '$email', '$userpass', '$cnfpass', '$phno','$gender','$bloodgroup','$age');";
echo $sql;

if($con -> query($sql) == TRUE){
    echo "Sucessfully Inserted";
}
else{
    echo "ERROR: $sql  <br>  $con -> error";
}


$con -> close();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
  <title>Myसुरक्षा </title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Myसुरक्षा </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active ">
          <!-- <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span> </a> -->
          <a class="nav-link" href="index.html ">Home</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="about.html ">About</a>
        </li>
        
        <li class="nav-item"></li>
          <a class="nav-link" href="hospitals.pdf">Hospital Lists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

      </form>
      <div class="mx-2">
        <button class="btn btn-danger" data-toggle="modal" data-target="#SignupModal">Sign UP</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#LoginModal">Login</button>
      </div>
    </div>
  </nav>

  <!-- Login Modal -->
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="LoginModalLabel">Login to iCoder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Health-card Number</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit"  class="btn btn-primary " onclick="hospital()">Hospital Login</button>
            <script>
              function hospital(){
                window.open("https://www.google.com");
              }
             </script>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="checkpassword()">User Login</button>
              <script>
                function user(){
                  window.open("profile.html");
                }
              </script>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Sign UP -->
  <!-- Modal -->
  <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="SignupModalLabel">Sign Up </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">
          <form  method="post">
            <div class="form-group">
              <label for="exampleInputName">Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <!-- <div class="form-group">
              <label for="exampleInputDOB">Date of Birth</label>
              <input type="date" class="form-control" id="dob" required>
            </div> -->
            <div class="form-group">
              <label for="exampleInputPassword1">Create Password</label>
              <input type="password" class="form-control" id="userpass" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm Password</label>
              <input type="password" class="form-control" id="cnfpass" required>
            </div>
            <div class="form-group">
              <label for="phno">Phone Number</label>
              <input type="number" class="form-control" id="phno" required>
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <input type="text" class="form-control" id="gender" required>
            </div>
            <div class="form-group">
              <label for="bloodgroup">Blood Group</label>
              <input type="text" class="form-control" id="bloodgroup" required>
            </div>
            <div class="form-group">
              <label for="age">Age</label>
              <input type="number" class="form-control" id="age" required>
            </div>
            
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">User Confirmation</label>
            </div>
            <!--
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">User Login</label>
            </div> -->
            
            <div class="modal-footer">
              <input type="submit"  >
              <!-- <button type="submit" class="btn btn-primary" onsubmit="confirmpass()">Submit</button> -->
              
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Crousal -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://source.unsplash.com/random/500x500px/?Coding" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/random/500x500px/?Web Development" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h2>The Best Coding Block</h2>
          <p>Technology news development and trends</p>
          <button class="btn btn-danger">Technology</button>
          <button class="btn btn-primary">Web Technology</button>
          <button class="btn btn-success">Tech fun</button>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/random/500x500px/?Web Development" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- ######################   -->
  <div class="container">
    <div class="row mb-2">
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Finance</strong>
            <h3 class="mb-0">Quick Payment</h3>
            <div class="mb-1 text-muted">--------------------------</div>
            <p class="card-text mb-auto">At time of medical bills payment, Amount will be requested by hospital, through safe and secure Patym UPI Gateway</p>
            <p class="card-text mb-auto">Moto: Quick pay for Medical Bills</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="img-fluid" class="bd-placeholder-img" width="200" height="250" src="payment.png">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Emergency Situtions</strong>
            <h3 class="mb-0">Emergency Situtions</h3>
            <div class="mb-1 text-muted">February 13</div>
            <p class="mb-auto">In case of Accidents, after calling Ambulance ,nearby person will scan QR Code (MySurksha Health Card) call or notify to emergency contacts of User.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="img-fluid" class="bd-placeholder-img" width="200" height="250" src="emergency.png">
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-2">
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">India</strong>
            <h3 class="mb-0">Insurance</h3>
            <div class="mb-1 text-muted">February 13</div>
            <p class="card-text mb-auto">Fetched Insurance Data will be visible to hospitals.  </p>
            <p  class="card-text mb-auto">Moto: Ease for mediclaim, less formality faced by paitents </p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="img-fluid" class="bd-placeholder-img" width="200" height="250" src="insurance.png">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">India</strong>
            <h3 class="mb-0">Health Cards</h3>
            <div class="mb-1 text-muted">February 13</div>
            <p class="mb-auto">Portable and your shield</p>
            <p class="mb-auto">Improving Health-Care Data-Management</p>
            <p class="mb-auto">One Step toward Smart Health shield</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img class="img-fluid" class="bd-placeholder-img" width="200" height="250" src="card.png">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    
  </footer>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>