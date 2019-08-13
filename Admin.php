<!DOCTYPE html>
<head>
  <title>Admin</title>
</head>
<body>
 <?php 
ob_start();
include 'Controlador.php';
$producto=new Producto();
echo  '<br></br><h1>Monedas antiguas</h1>';
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['password'])&&isset($_SESSION['userman'])) {
  echo "Your session is running: " . $_SESSION['user'];
  echo("<button onclick=\"location.href='login.php'\">Logout</button><pre>");
}
else{
    session_unset();
    session_destroy();
    header('location:index.php');
    exit(); 
}
ob_end_flush();
?> 
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
      <?php
        $res=$producto->Show();
        while($row=$res->fetch_assoc()){
      ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td><img height="75px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>"/></td>
            <th><a href="V_Update.php?id=<?php echo $row['id'];?>">Modificar</a></th>
            <th><a href="C_Delete.php?id=<?php echo $row['id'];?>">Eliminar</a></th>
          </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</center>
</body>
</html>
