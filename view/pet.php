<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];

// Inicializa a variável $pet como null para evitar erros
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
  <title>Informações do Pet</title>
</head>

<body>
  <h1>Informações do Pet</h1>
  <?php if ($pet): ?>
    <div>
      <img src="assets/images/<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do pet" width='150px' height='150px'>
      <h2>Nome: <?php echo htmlspecialchars($pet['nomePet'], ENT_QUOTES, 'UTF-8'); ?></h2>
      <p>Espécie: <?php echo htmlspecialchars($pet['especie'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p>Raça: <?php echo htmlspecialchars($pet['raca'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p>Data de Nascimento: <?php echo htmlspecialchars($pet['dtNasc'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
  <?php else: ?>
    <p>Não foram encontradas informações para este pet.</p>
  <?php endif; ?>
  <br>
  <a href="index.php?page=editapet&id=<?php echo $pet['id']; ?>">Editar</a>
  <br>
  <a href="index.php?page=home">Voltar</a>
</body>

</html>
