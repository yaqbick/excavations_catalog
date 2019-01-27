<?php
require_once('objectController.php');
$objects=get_all();
//print_r($objects[0]->getName());
$arr=array();


if(isset($_GET['value']))
{
    foreach($objects as $object)
    {
        // $json=json_encode($object)->getName();
        // array_push($arr, $json);
    }
    $json=json_encode($objects);
    //print_r($arr);
    echo $json;
}
if(isset($_POST['user']))
{
$user = $_POST['user'];

//Decode the JSON string and convert it into a PHP associative array.
$decoded = json_decode($user, true);
 
//var_dump the array so that we can view it's structure.
var_dump($decoded);
}

?>