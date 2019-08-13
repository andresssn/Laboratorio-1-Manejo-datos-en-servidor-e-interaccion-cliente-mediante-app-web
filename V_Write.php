<?php 
ob_start();
echo  '<br></br><h1>Monedas antiguas</h1>';
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  echo "Your session is running: " . $_SESSION['user'];
  echo("<button onclick=\"location.href='Admin.php'\">Regresar</button><pre>");
  echo '<center><br/><br/>
    <form action="C_Write.php" method="POST" enctype="multipart/form-data">	
      <input type="text" REQUIRED name="nombre" placeholder="Nombre..." value=""/><br/><br/>
      <input type="text" REQUIRED name="precio" placeholder="Precio..." value=""/><br/><br/>
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