<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
require '../connect.php';
<<<<<<< HEAD
foreach ($pdo->query('select * from product') as $row) {
=======

$sql = $pdo->prepare( 
	"SELECT * from product
	WHERE id = ?"
);

$sql->execute( [$_GET['id']] ) ;
// var_dump( $sql);
foreach ( $sql as $row) {

>>>>>>> shuke
	echo '<tr>';
	echo '<td>', htmlspecialchars($row['id']), '</td>';
	echo '<td>', htmlspecialchars($row['name']), '</td>';
	echo '<td>', htmlspecialchars($row['price']), '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
<?php require '../footer.php'; ?>
