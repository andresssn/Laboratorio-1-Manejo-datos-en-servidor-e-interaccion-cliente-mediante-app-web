<html>
 <head>
  <title>Index</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
  <style>
	body {
	background-color: white;
	text-align: center;
	color: blue;
	font-family: Arial, Helvetica, sans-serif;
	}
  </style>
 </head>
 <body>
 <br></br>
 <h1>Monedas antiguas</h1>
	<div class="contenedor">
		<div class="columnas">
			<div class="col-md-6 col-md-offset-3" style="margin-top:15%;">
				<form method="post" action="login.php">
					<br>
					<input class="form-control" type="user" name="user" placeholder="user">
					<br>
					<input class="form-control" type="password" name="password" placeholder="password">
					<br>
					<button class="btn btn-info"> Login </button>
				</form>
			</div>
		</div>
	</div>
<?php 
	ob_start();
	include 'Controlador.php';
	$producto=new Producto();
?>
<div class="contenedor2">
<center>
  <table border="2">
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
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
            <td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']);?>"/></td>
          </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</center>
<?php
ob_end_flush();
?> 
</div>
 </body>
</html>