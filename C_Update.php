<?php 
ob_start();
include 'Controlador.php';
echo  '<br></br><h1>Monedas antiguas</h1>';
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  //echo "Your session is running: " . $_SESSION['user'];
    echo("<button onclick=\"location.href='Admin.php'\">Regresar</button><pre>");
    $id=$_REQUEST['id'];
    $nombre= $_POST['nombre'];  
    $precio= $_POST['precio']; 
    $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));  //guarda en formato de bits, así como el nombre temporal del archivo
    $producto=new Producto();
    $res=$producto->update($id,$nombre,$precio,$imagen);
    if($res) {
      echo "si se actualizo";
    }
    else{
      echo "no se actualizo";
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