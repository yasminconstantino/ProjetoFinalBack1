<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];
$pet = null;

// Se um ID do pet for fornecido, busca as informações do pet
if (isset($_GET['id'])) {
  $pet_id = $_GET['id'];
  $pet = getPetById($conexao, $pet_id);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Pet</title>
</head>
<body>
  <h1>Editar Informações do Pet</h1>
  <?php if ($pet): ?>
    <form action="/projetoback/controller/pet_controller.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="pet_id" value="<?php echo htmlspecialchars($pet['id'], ENT_QUOTES, 'UTF-8'); ?>">

      <label for="nomePet">Nome:</label>
      <input type="text" name="nomePet" id="nomePet" value="<?php echo htmlspecialchars($pet['nomePet'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

      <label for="especie">Espécie:</label>
      <input type="text" name="especie" id="especie" value="<?php echo htmlspecialchars($pet['especie'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

      <label for="raca">Raça:</label>
      <input type="text" name="raca" id="raca" value="<?php echo htmlspecialchars($pet['raca'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

      <label for="dtNasc">Data de Nascimento:</label>
      <input type="date" name="dtNasc" id="dtNasc" value="<?php echo htmlspecialchars($pet['dtNasc'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>

      <label for="image">Foto do Perfil:</label>
      <div>
        <img src="/projetoback/assets/images/<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" 
             alt="Foto do Perfil" width="100" height="100">
        <input type="file" id="image" name="image" accept="image/*">
      </div>
      <br><br>

      <input type="submit" name="editPet" value="Salvar Alterações">
    </form>

    <form action="index.php?page=deletepet&id=<?php echo $pet['id']; ?>" method="POST">
      <input type="submit" name="deletePet" value="Excluir Pet">
    </form>
  <?php else: ?>
    <p>Pet não encontrado.</p>
  <?php endif; ?>
</body>
</html>
