<?php session_start();
 require "../header.php";
 require "../menu.php";
 require '../connect.php';

  // var_dump($sql->fetch()['count(*)']);
 // exit;
 
 
 if (isset($_SESSION['customer'])) {
	//  ※ログインしてるか
	$id = $_SESSION['customer']['id'];

	if ( $_REQUEST['login'] != $_SESSION['customer']['login']) {
		// ログイン名を変更しようとしてる
			 $sql = $pdo->prepare(
					 'SELECT count(*) from customer 
					 WHERE login = ?
					 AND id != ? ' //自分のidではない
				 );
				 // 自分のidと一致しない,かつログイン名が一致する行
			 $sql->execute([ $_REQUEST['login'],  $_SESSION['customer']['id'] ]);

			 if( $sql->fetch()['count(*)'] > 0 ){
				 echo "ログイン名が使われてるので戻って入れ直してください";
				 exit; // 中断
			 }

 } elseif( $_REQUEST['login'] != $_SESSION['customer']['login'] ) {
	 // メールを変更しようとしている
		 $sql = $pdo->prepare(
			 'SELECT count(*) from customer 
			 WHERE email = ?
			 AND id != ? ' //自分のidではない
		 );
		 // 
		 $sql->execute([ $_REQUEST['email'],  $_SESSION['customer']['id'] ]);

		 if( $sql->fetch()['count(*)'] > 0 ){
			 echo "そのメールアドレスは使われてます";
			 exit; // 中断
		 }
 } 

	 
	 $sql=$pdo->prepare(
		 '	UPDATE customer set 
					 name=?, 
					 address=? ,
					 login=?, 
					 email=?,
					 password=? 
			 WHERE id=?');
 // 既存顧客情報の上書き
	 $sql->execute([   // ?の数だけ書く
				 $_REQUEST['name'],
				 $_REQUEST['address'],
				 $_REQUEST['login'],  //変更があってもなくても上書きする
				 $_REQUEST['email'],  // 〃
				 $_REQUEST['password'],
				 $id]
			 );
	 //ログインセッションに値を代入		
	 $_SESSION['customer']=[
		 'id'=>$id, //配列全体が上書きされるので入れる
		 'name'=>$_REQUEST['name'],
		 'address'=>$_REQUEST['address'],
		 'login'=>$_REQUEST['login'],
		 'email'=>$_REQUEST['email'],
		 'password'=>$_REQUEST['password']
	 ];
	 echo 'お客様情報を更新しました。';
	 //既存ユーザの処理は終わり


} 
?>

<?php require "../footer.php";?>

