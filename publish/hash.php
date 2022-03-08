<?php
$a = 'asdf3333';
//ハッシュ化したパスワードの生成
//newcustomer-output
$b = password_hash( $a , PASSWORD_DEFAULT );
var_dump($b);
 
//照合する方         (平文、ハッシュ値)
//login-output
var_dump( password_verify($a,$b));//正しければtrue