<?php
$host = 'localhost';
$dbname = 'ativa_net';
$usuario = 'root';
$senha = '';

// Conecta ao banco de dados
$conexao = mysqli_connect($host, $usuario, $senha, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}
