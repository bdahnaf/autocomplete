<?php


//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  $array = array();
  $con=mysqli_connect("localhost","root","","demos");
  $query=mysqli_query($con, "select * from cfg_demos where title LIKE '%{$q}%'");
  while($row=mysqli_fetch_assoc($query))
    {
      //$array[] = $row['title'];
	  $hint = $row['title'] . "<br />";
    }
  //echo json_encode($array);
  //$hint = $array;
  mysqli_close($con);
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>