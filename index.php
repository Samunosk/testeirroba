<?php
define('TITLE','Cadastrar agendamento');

use \App\agendamento;
$obAgendamento = new Agendamento;

//VALIDAÇÃO DO POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obAgendamento->titulo    = $_POST['titulo'];
  $obAgendamento->descricao = $_POST['descricao'];
  
  $obAgendamento->cadastrar();

  header('location: index.php?status=success');
  exit;
}