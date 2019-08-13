<?php
    class ConectBD{
        private $usuarioBD='admin';
        private $BD='productos';
        private $passUsrBD='pass';
        private $servidor='127.0.0.1';

        function conectar_Mysql(){
            $mysqli=new mysqli($this->servidor, $this->usuarioBD, $this->passUsrBD,$this->BD,3306);
            if($mysqli->connect_errno)
                echo" fallo al conectar a MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
            return $mysqli;
        }
    }    
?>