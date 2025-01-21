<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];

if (isset($_POST['deletePet']) && isset($_GET['id'])) {
  $pet_id = $_GET['id'];

  // Deleta o pet
  $deleteSuccess = deletePet($conexao, $pet_id);

  if ($deleteSuccess) {
    header('Location: /projetoback/index.php?page=home');
    exit();
  } else {
    echo "Erro ao excluir o pet.";
  }
}

// Função para excluir o pet do banco
function deletePet($conexao, $pet_id) {
  try {
    $query = $conexao->prepare("DELETE FROM Pet WHERE id = :pet_id");
    $query->bindParam(':pet_id', $pet_id, PDO::PARAM_INT);
    return $query->execute();
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}
?>
