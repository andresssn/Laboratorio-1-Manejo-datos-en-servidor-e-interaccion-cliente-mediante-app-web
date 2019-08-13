<?php @session_start();?> 
 <?php 
 //session_start();
ob_start();
include 'Controlador.php';
$producto=new Producto();
echo  '<br></br><h1>Monedas antiguas</h1>';
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  echo "Your session is running: " . $_SESSION['user'];
  echo("<button onclick=\"location.href='login.php'\">Logout</button><pre>");
  $res=$producto->Show();
  echo'
  <center>
  <table border="2">
    <thead>
      <tr>
        <th colspan="6"><a href="V_Write.php">Nuevo</a></th>
      </tr>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th colspan="2">Operaciones</th>
      </tr>
    </thead>
    <tbody>
    ';
   
  while($row=$res->fetch_assoc()){
    echo'
      <tr>
      <td>'.$row['id'].'</td>
      <td>'.$row['nombre'].'</td>
      <td>'.$row['precio'].'</td>
      <td><img height="75px" src="data:image/jpg;base64,'.base64_encode($row['imagen']).'"/></td>
      <th><a href="V_Update.php?id='.$row['id'].'">Modificar</a></th>
      <th><a href="C_Delete.php?id='.$row['id'].'">Eliminar</a></th>
    </tr>';
  }
  echo'
    </tbody>
  </table>
  </center>
  ';
}
else{
    session_unset();
    session_destroy();
    header('location:index.php');
    exit(); 
}
ob_end_flush();
?>