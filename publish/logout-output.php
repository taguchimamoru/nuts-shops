<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require '../menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo 'ログアウトしました。
		<meta http-equiv="refresh" content="1;URL=http://taguchi_mamoru.org/renshu/chap7/product.php">
		'; // TOPへリダイレクトするメタタグ
} else {
	echo 'すでにログアウトしています。';
}
?>
<?php require '../footer.php'; ?>
