<?php
define('TITLE','Cadastrar medico');

use \App\medicos;
$obMedico = new Medico;

//VALIDAÇÃO DO POST
if(isset($_POST['nome do medico'],$_POST['especialização'],$_POST['senha'],$_POST['ativo'])){

  $obAgendamento->nm_medico    = $_POST['nome do medico'];
  $obAgendamento->$especializacao = $_POST['especialização'];
  $obAgendamento->$senha = $_POST['senha'];
  $obAgendamento->cadastrar();

  header('location: index.php?status=success');
  exit;
}
