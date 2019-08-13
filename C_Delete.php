<?php 
ob_start();
include 'Controlador.php';
echo  '<br></br><h1>Monedas antiguas</h1>';
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  //echo "Your session is running: " . $_SESSION['user'];
    echo("<button onclick=\"location.href='Admin.php'\">Regresar</button><pre>");
    $id=$_REQUEST['id'];
    $producto=new Producto();
    $res=$producto->Delete($id);
    if($res) {
      echo "si se elimino";
    }
    else{
      echo "no se elimino";
    }
}
else{
    session_unset();
    session_destroy();
    header('location:index.php');
    exit();
}
ob_end_flush();
?>