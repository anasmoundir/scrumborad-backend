<?php
// include 'index.php';
if($_SERVER['REQUEST_METHOD']== "POST")
{
if(!empty($_POST["title"]) && !empty($_POST["task-type"]) && !empty($_POST["priorities"]) && !empty($_POST["status"]) && !empty("date") && !empty("Description"))
{ 
      if(!empty($postcode) )
      {
      $posttitle=trim(htmlspecialchars($_POST["title"]));
      $postdescription = trim(htmlspecialchars($_POST["Description"]));


      if($posttitle ==  false && $postdescription == false )
      {
            Exit('please enter a valid inputs ');
      }
      }
}
}
?>