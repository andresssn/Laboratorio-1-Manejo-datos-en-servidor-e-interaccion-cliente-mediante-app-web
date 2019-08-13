<?php 
ob_start();
include 'Controlador.php';
error_reporting(E_ALL);
ini_set('display_errors','1');

 if( isset($_POST['user']) && $_POST['user'] != "" && isset($_POST['password']) && $_POST['password'] != "" ){
	$user = str_replace(" ", "", $_POST['user']);
	$password = str_replace(" ", "", $_POST['password']);
	echo  '<br></br><h1>Monedas antiguas</h1>';
	echo "<pre> <br><b>user: {$user}</b><pre>";
	//echo "pass: {$password}<pre>";
	echo("<button onclick=\"location.href='index.php'\">Logout</button><pre>");
	
	$userman=new Users(); 
	//$producto=new Producto();
	//echo '<br/> usuarios leidos: '.$Users->lee($user,$password)->num_rows;
	$loginOK= $userman->login($user,$password);

	//inicio de sesion
	
	if($loginOK){
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
				$_SESSION['id_session'] = session_id();
				$_SESSION['userman'] = $userman;
				echo "<pre>";
				header('location:Admin.php');
        }
	else{
				header('location:index.php');
				exit();
		}
}
 else{
    header('location:index.php');
	exit();
}
ob_end_flush();
?>
