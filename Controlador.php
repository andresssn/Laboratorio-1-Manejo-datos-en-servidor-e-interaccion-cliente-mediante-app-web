<?php
    include 'ConectBD.php';
    class Users{
        private $conexion=null;
        function __construct(){
            $con=new ConectBD();
            $this->conexion=$con->conectar_Mysql();
            if(isset($this->conexion)) 
            {  
                echo 'conexion exitosa <br/>';
            }
        }
        function login($username, $password)
        {
            $username = mysqli_real_escape_string($this->conexion,$username);
            $password = mysqli_real_escape_string($this->conexion,$password);
            $query = "SELECT * FROM users WHERE user='$username' AND password='$password'";
        
           $result = mysqli_query($this->conexion,$query)or die(mysqli_error());
           $num_row = mysqli_num_rows($result);
        
           if( $num_row != 1 )
           {
              return 0;
           }
          return 1;
        }

    }
    class Producto{
        private $conexion=null;
        function __construct(){
            $con=new ConectBD();
            $this->conexion=$con->conectar_Mysql();
            if(isset($this->conexion)) 
            {  
                echo '<br/>';
            }
        }
        function write($nombre,$precio,$imagen){
            $sql="INSERT INTO producto(nombre,precio,imagen) VALUES('$nombre','$precio','$imagen')";
            $res=$this->conexion->query($sql);
            return $res; 
        }
        function update($id,$nombre,$precio,$imagen){
            $sql="UPDATE producto SET nombre='$nombre',precio='$precio',imagen='$imagen' WHERE id='$id'";
            $res=$this->conexion->query($sql);
            return $res; 
        }
        function Show(){
            $sql="SELECT * FROM producto";
            $res=$this->conexion->query($sql);
            return $res; 
        }
        function Show_Puntual($id){
            $sql="SELECT * FROM producto WHERE id='$id'";
            $res=$this->conexion->query($sql);
            return $res; 
        }
        function Delete($id){
            $sql="DELETE FROM producto WHERE id='$id'";
            $res=$this->conexion->query($sql);
            return $res; 
        }
    }
?>