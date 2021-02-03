<?php

    class db{

        private $host = 'localhost';
        private $usuario = 'root';
        private $senha = '';
        private $data_base = 'db_lets_work';

        function conecta_mysql(){
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->data_base);

            mysqli_set_charset($con, 'utf-8');

            if(mysqli_connect_errno()){
                echo 'Erro ao tentar se conectar com o banco de dados MySQL em questão' . mysqli_connect_error();
            }

            return $con;
        }

    }

?>