<?php
session_start();
include('model/conectBD.php');

//mostrar os erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definir a página padrão
$page = isset($_GET['page']) ? $_GET['page'] : 'login'; // Definindo a página como "home" caso não tenha sido especificada

// Verificar se o tutor está autenticado
if (!isset($_SESSION['tutor_id']) && $page !== 'login' && $page !== 'register') {
  // Se o tutor não estiver logado e tentar acessar páginas protegidas, redireciona para a página de login
  header('Location: index.php?page=login');
  exit();
}

// Verificar se o vet está autenticado
//if (!isset($_SESSION['vet_id']) && $page !== 'login' && $page !== 'register') {
  // Se o vet não estiver logado e tentar acessar páginas protegidas, redireciona para a página de login
//  header('Location: index.php?page=login');
//  exit();
//}

// Lógica de exibição do conteúdo
switch ($page) {
  case 'login':
    include('view/login.php');
    break;

  case 'register':
    include('view/registraT.php');
    break;

  case 'astutor':
    include('view/registraT.php');
    break;

  case 'home':
    include('view/homeT.php');
    break;

  case 'search':
      include('view/buscaPet.php');
      break;

  case 'searchV':
      include('view/buscaVet.php');
      break;
  
  case 'pet_info':
      include('view/buscaPet.php');
      break;

  case 'pet':
      include('view/pet.php');
      break;
  
  case 'vet':
      include('view/vet.php');
      break;

  case 'vet_info':
    include('view/buscaVet.php');
    break;

  case 'profile':
    include('view/perfilTutor.php');
    break;

  case 'contact':
    include('view/contato.php');
    break;

  case 'addpet':
    include ('view/add_pet.php');
    break;
  
  case 'editapet':
    include ('view/edit_pet.php');
    break;

  case 'deletepet':
    include ('view/delete_pet.php');
    break;
/*
  case 'admin':
    if ($_SESSION['role'] !== 'admin') {
      echo "Acesso restrito.";
      exit();
    }
    include('views/admin.php');
    break;
  
  case 'loans':
    include('views/loans.php');
    break;    

  case 'logout':
    include('config/logout.php');
    break;

  default:
    echo "Página não encontrada!";
    break;*/
}