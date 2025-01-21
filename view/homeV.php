<?php
require_once('model/conectBD.php');
require_once('model/vet_functions.php');

// Verifica se o tuto está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: index.php?page=login');
  exit();
}

if (isset($_GET['page']) && $_GET['page'] == 'home') {
  $vets = allVets($conexao); // Chama a função allvets para obter todos os livros
}
?>

