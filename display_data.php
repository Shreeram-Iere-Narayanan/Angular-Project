<?php
session_start();
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
    <html>
    <head>
      <link rel="stylesheet" href="/~sinarayanan/SIT780/assignment2/style.css"/>
    </head>
    <style>
     
    </style>
    <body>
	
<a href="add_data.php">Add data</a>
<a href="search_data.php">Search data</a>
<a href="logout.php">Logout</a>  
<a href="~sinarayanan/SIT780/assignment2/Angular/my-app/src/index.html">Sensor Data</a>  

<?php 
 echo "<h3> You are logged in as ".$_SESSION['username']."</h3>";
?>
	<div>
    <table id="employees">
    <thead>
      <tr>
        <th>Employee ID</th>	 
        <th>Email</th>
        <th>Last Name</th>
        <th>First Name</th>
      </tr>
    </thead>
      <?php
        $myfile = fopen("data.xml", "r") or die("File cannot be read!");
        $data = fread($myfile,filesize("data.xml"));
        fclose($myfile);
        $xml=simplexml_load_string($data) or die("Error: XML object cannot be created");
        $xml = (array)$xml;
        foreach ($xml['employee'] as $employee) 
        {
            $employee = (array)$employee;
            echo "<tr>";
            echo "<td>";
            echo $employee['employee_id'];
            echo "</td>";
            echo "<td>";
            echo $employee['email'];
            echo "</td>";
            echo "<td>";
            echo $employee['firstname'];
            echo "</td>";
            echo "<td>";
            echo $employee['lastname'];
            echo "</td>";
            echo "</tr>";
        }
        ?>
          </table>
    </div>
    </body>
    </html>
<?php
	
}else{
	echo "please login first";
}
	?>