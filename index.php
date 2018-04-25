<html><head><title>I am the bone of my sword</title></head><body>

<?php

$db = new SQLite3('/home/fervi/Filemon/filemon.sqlite');

$result = $db->query("SELECT * FROM cheetaheater ORDER BY ID DESC");

if(!empty($_GET['nolimit']))
{
$limit=-1;
}
else
{
$limit = 100;
}

$count = 0;
$stealed = 0;


$table = '<table width="100%" border="1">';
$table = $table.'<tr><td>ID:</td><td>Zelda:</td><td>Saucenao:</td><td>Yandex:</td><td>Intinte Abstergo:</td><td>Result:</td></tr>';
while($res = $result->fetchArray(SQLITE3_ASSOC)){
$plagiat = 0;
$count = $count + 1;

if( ($res['saucenao']+$res['yandex']+$res['abstergo']) > 0) { $plagiat = 1; $stealed++; }

if($limit!=0)
{
$table=$table.'<tr><td><a href="https://steemit.com'.$res["stmurl"].'">'.$res['id'].'</a></td><td><a href="'.$res["url"].'">'.$res['url'].'</a></td><td><a href="http://saucenao.com/search.php?db=999&dbmaski=32768&url='.$res["url"].'">'.$res['saucenao'].'</a></td><td><a href="https://www.yandex.com/images/search?text='.$res["url"].'&img_url='.$res["url"].'&rpt=imageview">'.$res['yandex'].'</a></td><td><a href="abstergo.php?id='.$res["url"].'">'.$res['abstergo'].'</a></td><td>'.$plagiat.'</td></tr>';
$limit--;
}

}

$table=$table.'</table>';

echo '<center><b>'.round(($stealed / $count)*100).'%  of memes from Dmania are "from other source".</b></center>';

echo $table;

echo '<center><small>Just kidding, it\'s '.($stealed / $count)*100 .'%</small><br><h2>Say NO to <a href="https://steemit.com/steemit/@funkit/reward-pool-rape">Pool Reward Rape!</a></h2></center>';

?>

</body></html>