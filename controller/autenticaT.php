<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('/opt/lampp/htdocs/projetoback/model/conectBD.php');
require_once('/opt/lampp/htdocs/projetoback/model/tutor_functions.php');

// Login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $array = array($email, $password);
  $tutor = loginTutor($conexao, $array);

  if ($tutor) {
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['tutor_id'] = $tutor['id'];
    $_SESSION['role'] = $tutor['role'];
    header('Location: /projetoback/index.php?page=home');
    exit();
  } else {
    session_start();
    $_SESSION['message'] = "Login inválido";
    header('Location: /projetoback/index.php?page=login');
  }
}

// Registro
if (isset($_POST['register'])) {
  $nomeTutor = $_POST['nomeTutor'];
  $email = $_POST['email'];
  $senha = $_POST['senha']; // Hash da senha
  $dtNasc = $_POST['dtNasc'];
  $cpf = $_POST['CPF'];
  $numTel = $_POST['numTel'];

  // Dados organizados em array para inserção
  $array = [$nomeTutor, $email, $senha, $dtNasc, $cpf, $numTel];

  // Inserir dados no banco
  $newTutor = registerTutor($conexao, $array);
  if ($newTutor) {
      session_start();
      $_SESSION['message'] = "Cadastro realizado com sucesso. Faça login.";
      header('Location: /projetoback/index.php?page=login');
      exit();
  } else {
      $_SESSION['message'] = "Erro ao realizar cadastro. Verifique os dados.";
  }
  
}