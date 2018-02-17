<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

// if session is not set this will redirect to login page

 if( !isset($_SESSION['users']) ) {

  header("Location: index.php");

  exit;

 }

 // select logged-in users detail

 $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['users']);

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Welcome - <?php echo $userRow['userName']; ?></title>

</head>

<body>

             <nav class="navbar navbar">
	    <div class="container">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="#" id="brand">welcome <?php echo $userRow['userName']; ?>!</a>
	      </div>
	      
			

		  <div class="pull-right">
        <ul class="nav navbar-nav">
            <li><button type="submit" class="navbar-form navbar-right" name="logout" id="logoutbtn"><a href="logout.php?logout" id="signoutbtn">Sign Out</a></button></li>
        </ul>     
</div>
		  
		   
	   
	 </nav>

	 <!--main image -->

<div class="container img-responsive" id="heroimg" >
  		<div class="row">
	  		<div class="col-md-12 col-xs-12">
		  	<p class="text-center" id="titlephrase">cars rental</p>

		  	</div>
		 </div>
	  
</div>

	<!--container containing all media types -->

<hr>
   
    <div class="container">
    
    
      <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal2" onclick="showofficelist()" style="width: 200px;">Office List</button>
    <div>
    <hr>
  
    <button onclick="showcarlist()" class="btn btn-danger btn-lg" style="width: 200px;">Car List</button>
    <p id="demo2"></p>
    </div>
    <hr>
   
    <button  style="width: 200px;"  onclick="locar()" class="btn btn-lg btn-danger">Cars Location </button>
    <hr>
  <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Office List</h4>
          </div>
          <div class="modal-body">
              <p id="demo"></p>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      
    </div>
  
  </div>
  
    <p id="demo4"></p>


    
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal1" onclick="carlocation()"  style="width: 200px;">Report Now </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal1" role="dialog">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Location</h4>
              </div>
              <div class="modal-body">
                <p id="demo3"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
  </div>
  <hr>

  <script>
  function showofficelist(){
        var obj, dbParam, xmlhttp;
        obj = {}; // Define an object containing a table property and a limit property
        dbParam = JSON.stringify(obj); // Convert the Object into a JSON
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "office_list.php?office=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters
        xmlhttp.send(); // Display the result received from the PHP file
        }
        function showcarlist(){
        var obj, dbParam, xmlhttp;
        obj = {}; // Define an object containing a table property and a limit property
        dbParam = JSON.stringify(obj); // Convert the Object into a JSON
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "cars_list.php?CarList=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters
        xmlhttp.send(); // Display the result received from the PHP file
        }


        function carlocation(){
          var obj, dbParam, xmlhttp;
          obj = {}; // Define an object containing a table property and a limit property
          dbParam = JSON.stringify(obj); // Convert the Object into a JSON
          xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("demo3").innerHTML = this.responseText;
              }
          };
          xmlhttp.open("GET", "cars_locations.php?location=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters
          xmlhttp.send();
    }
        function locar(){
        var obj, dbParam, xmlhttp;
        obj = {}; // Define an object containing a table property and a limit property
        dbParam = JSON.stringify(obj); // Convert the Object into a JSON
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo4").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "locar.php?locar=" + dbParam, true); // Send a request to the PHP file, with the JSON string as a parameters
        xmlhttp.send(); // Display the result received from the PHP file
        }

</script>
            
      
   

</body>


</html>

<?php ob_end_flush(); ?>