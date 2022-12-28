<?php
    session_start();

    require("Model/dbConnect.php");
    $db = connectToDatabase();
    require("Model/function_search.php");
    $info_detail = [];

    if(!empty($_GET['col']) && !empty($_GET['table']) && !empty($_GET['value'])){
        $info_detail = detail_search($_GET['table'],$_GET['col'],$_GET['value']);

    }else{
        die("404 : PAGE NOT FOUND ");
    }
?>