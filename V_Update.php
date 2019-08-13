<?php 
ob_start();
include 'Controlador.php';
echo  '<br></br><h1>Monedas antiguas</h1>';
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  echo "Your session is running: " . $_SESSION['user'];
  echo("<button onclick=\"location.href='Admin.php'\">Regresar</button><pre>");
  
  $id=$_REQUEST['id'];
  $producto=new Producto();
  $res=$producto->Show_Puntual($id);
  $row=$res->fetch_assoc();
  echo '<center><br/><br/>
    <form action="C_Update.php?id='.$row['id'].'" method="POST" enctype="multipart/form-data">	
      <input type="text" REQUIRED name="nombre" placeholder="Nombre..." value="'.$row['nombre'].'"/><br/><br/>
      <input type="text" REQUIRED name="precio" placeholder="Precio..." value="'.$row['precio'].'"/><br/><br/>
      <img height="75px" src="data:image/jpg;base64,'.base64_encode($row['imagen']).'"/>
      <input type="file" REQUIRED name="imagen"/><br/><br/>
      <input type="submit" value="Aceptar"/><br/>
    </form>
    </center>';
}
else{
    session_unset();
    session_destroy();
    header('location:index.php');
    exit(); 
}
ob_end_flush();
?> 