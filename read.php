<?php
require("connect.php");


$db = new mysqli($db_host,$db_user, $db_password, $db_name); 
if ($db->connect_errno) {
	
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


$query="SELECT * FROM chat ORDER BY id DESC limit 3";

if ($db->real_query($query)) {
	
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
        $username=$row["username"];
        $text=$row["text"];
        $time=date('G:i Y-m-d' , strtotime($row["time"]));
        echo "<p><b>$username:</b>  <span>$time</span> </p>\n";
        echo "<p>$text</p>\n";
        
    }
}else{
	
	
	echo $db->errno;
}

$db->close();
?>
