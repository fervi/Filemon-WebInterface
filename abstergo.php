<?php

if(!empty($_GET['id']))
{
$url = $_GET['id'];
$db = new SQLite3('/home/fervi/Filemon/abstergodb.sqlite');
$db2 = new SQLite3('/home/fervi/Abstergo/abstergo.sqlite');
$result = $db->query("SELECT * FROM abstergodb WHERE url='$url' ");
while($res = $result->fetchArray(SQLITE3_ASSOC)){

$photoid = $res['photoid'];

$result2 = $db2->query("SELECT * FROM abstergo WHERE id='$photoid' ");
while($res2 = $result2->fetchArray(SQLITE3_ASSOC)){
echo '<img src="'.$res2["url"].'">';

}

}


}