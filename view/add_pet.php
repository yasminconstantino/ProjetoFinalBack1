<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Pet</title>
</head>
<body>
  <h1>Cadastrar Novo Pet</h1>
  <form action="/projetoback/controller/pet_controller.php" method="POST" enctype="multipart/form-data" >
    <label for="nomePet">Nome:</label>
    <input type="text" name="nomePet" id="nomePet" required><br><br>

    <label for="especie">Espécie:</label>
    <input type="text" name="especie" id="especie" required><br><br>

    <label for="raca">Raça:</label>
    <input type="text" name="raca" id="raca" required><br><br>

    <label for="dtNasc">Data de Nascimento:</label>
    <input type="date" name="dtNasc" id="dtNasc" required><br><br>

    <input type="submit" name="addPet" value="Cadastrar Pet">
  </form>
</body>
</html>
