<?php
require_once('../model/conectBD.php');
require_once('../model/vet_functions.php');

// Login
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $array = array($email, $password);
  $vet = loginVet($conexao, $array);

  if ($vet) {
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['vet_id'] = $vet['id'];
    $_SESSION['role'] = $vet['role'];
    header('Location: /projeto-back-front/index.php?page=home');
    exit();
  } else {
    session_start();
    $_SESSION['message'] = "Login inválido";
    header('Location: /projeto-back-front/index.php?page=login');
  }
}

// Registro
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];

  $array = array($name, $email, $password, $role);
  $newVet = registerVet($conexao, $array);
  if ($newVet) {
    $_SESSION['logado'] = true;
    $_SESSION['vet_id'] = $vet['id'];
    $_SESSION['role'] = $vet['role'];
    session_start();
    $_SESSION['message'] = "Cadastro feito com sucesso, realize o login.";
    header('location: /projeto-back-front/index.php?page=home');
    exit();
  }
  
}