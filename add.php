<?php
require_once("db.inc.php");
if(
    !empty($_REQUEST["number"]) &&
    !empty($_REQUEST["title"]) &&
    !empty($_REQUEST["description"]) &&
    !empty($_REQUEST["link"])){
    
    $create_at = date("Y-m-d h:i:s");
    $user_id = (empty($_REQUEST["user_id"])?0:intval($_REQUEST["user_id"]));
    $status = (empty($_REQUEST["status"])?"New":$_REQUEST["status"]);

    $sql = "INSERT INTO tickets (number,title,description,link,user_id,status,create_at) values('".$_REQUEST["number"]."','".$_REQUEST["title"]."','".$_REQUEST["description"]."','".$_REQUEST["link"]."','{$user_id}','{$status}','{$create_at}')";

    queryExec($sql);
    header("location: index.php");
}
else {
    die("ERROR : No/title/desc/link can not be empty!");
}

?>
