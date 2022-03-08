<?php
 include_once '../header.php'; 

 require '../connect.php'; 

$sql = $pdo->prepare( 
		"SELECT count(*)
		FROM `favorite`
		WHERE `product_id` = ?"
	);

$sql->execute( $_REQUEST['id'] ) ;
$count1 = $sql->fetch();
	/* フェッチ関数は結果が1行しか無いときに
		ループせず"配列"に変換する
	*/

	$sql = $pdo->prepare( 
		"SELECT count(*)
		FROM `purchase_detail`
		WHERE `product_id` = ?"
	);

$sql->execute( [$_REQUEST['id']] ) ;
$count2 = $sql->fetch();
?>

<div class="row">
  <aside>
    <?php require 'sidebar.php'; ?>
  </aside>
  <main>
	
	<?php 
	if( !empty($count1["count(*)"]) || !empty($count2["count(*)"])){
		echo"あるので消せない";
	}else{
		//無いのでけしていい
		$sql=$pdo->prepare('delete from product where id=?');
		if ($sql->execute([$_REQUEST['id']])) {
			echo '削除に成功しました。';
		} else {
			echo '削除に失敗しました。';
		}
	}	
			/*
			string(1) "1" bool(false)
			string(1) "3" bool(false)
				あってもなくても同じ値が返ってくる
			*/ 
?>
<?php require '../footer.php'; ?>
