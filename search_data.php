<?php
session_start();
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="/~sinarayanan/SIT780/assignment2/style.css"/>
    </head>    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
        /*setSearchButton function Description
        * This function is used to assign values of lastname and firstname to the query string of search_api.php page      
        */
        window.setSearchButton = function(){
            var btnSearch = document.getElementById("btn_Search");
           
                var url="search_api.php?firstName="+document.getElementById("firstName").value+"&lastName="+document.getElementById("lastName").value;
					$("#results").load(url); 
        }
	</script>
    <body>

    <a href="display_data.php"> Home Page</a>
    <a href="add_data.php">Add data</a>
    <a href="logout.php">Logout</a>
    <a href="~sinarayanan/SIT780/assignment2/Angular/my-app/src/index.html">Sensor Data</a>  

    <?php 
        echo "<h3> You are logged in as ".$_SESSION['username']."</h3>";
    ?>

        <div>
        <div>
            <div>
            <h2>Search Employee</h2>
            </div>

            <form method="post">
           
            <p>
            <input  placeholder="First Name"  type="text" id="firstName" >
            </p>
            <p>
            <input  placeholder="Last Name"type="text" id="lastName">
            </p>
            <p><input  id="btn_Search" type="button" value="Search" name="submit" onclick="setSearchButton()"></p>
            </form>
        </div>
    </div>


    <div id="results"></div>

    </body>
    </html>
    
	<?php
	
}else{
	echo "please login first";
}
	?>