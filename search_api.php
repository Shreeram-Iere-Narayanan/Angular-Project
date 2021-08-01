

<?php
if(isset($_REQUEST['firstName']) && isset($_REQUEST['firstName'])){
    $firstName =  $_REQUEST['firstName'];
    $lastName = $_REQUEST['lastName'];
   
}else{
    $firstName =  '';
    $lastName = '';
}



$myfile = fopen("data.xml", "r") or die("Unable to open file!");
        $data = fread($myfile,filesize("data.xml"));
        fclose($myfile);
        $xml=simplexml_load_string($data) or die("Error: Cannot create object");
        $xml = (array)$xml;
        $filered_data=array();
        foreach ($xml['employee'] as $employee) 
        {
            $employee = (array)$employee;
            if($firstName != '' && $lastName != ''){
                if(stripos($employee['firstname'],$firstName) !== false && stripos($employee['lastname'],$lastName) !== false){
                    array_push($filered_data,$employee);
                }
            }elseif($firstName != '' && $lastName == ''){
                if(stripos($employee['firstname'],$firstName) !== false){
                    array_push($filered_data,$employee);
                }
            }elseif($firstName == '' && $lastName != ''){
                if(stripos($employee['lastname'],$lastName) !== false){
                    array_push($filered_data,$employee);
                }
            }else{
                array_push($filered_data,$employee);
            }
        }
        
?>
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
            foreach ($filered_data as $employee) 
            {
                echo "<tr>";
                echo "<td>";
                echo $employee['employee_id'];
                echo "</td>";
                echo "<td>";
                echo $employee['email'];
                echo "</td>";
                echo "<td>";
                echo $employee['lastname'];
                echo "</td>";
                echo "<td>";
                echo $employee['firstname'];
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>"; 
?>


