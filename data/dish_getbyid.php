<?php
/*
*   该php页面用于main.html
*   向客户端分页返回菜名数据，以JSON格式
*/

$output = array();
@$did = $_REQUEST['did'];
if(!$did){
    echo '[]';
    return;
}

$conn = mysqli_connect('127.0.0.1','root','root','kaifanla'); //访问数据库
$sql = 'SET NAMES UTF8';
mysqli_query($conn, $sql);
$sql = "SELECT did,name,price,img_lg,material,detail FROM kf_dish WHERE did=$did";
$result = mysqli_query($conn, $sql);
if(($row=mysqli_fetch_assoc($result))!== NULL){  //一行一行读取数据
    $output[] = $row;
}

echo json_encode($output);

?>