<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
<<<<<<< HEAD
require '../connect.php';
$sql=$pdo->prepare('select * from product where name like ?');


if( !empty($_REQUEST['keyword'])){
	$sql->execute(['%'.$_REQUEST['keyword'].'%']);
	
	foreach ($sql as $row) {
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '</tr>';
		echo "\n";
	} 
} // end if
	?>
=======
 require '../connect.php'; 

$sql=$pdo->prepare('select * from product where id=?');
$sql->execute([$_REQUEST['keyword']]);
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td>', $row['name'], '</td>';
	echo '<td>', $row['price'], '</td>';
	echo '</tr>';
	echo "\n";
}
?>
>>>>>>> shuke
</table>
<?php require '../footer.php'; ?>
