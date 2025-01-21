<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}
// Verificar se foi enviado um termo de busca
$searchTerm = isset($_GET['searchTerm']) ? htmlspecialchars(trim($_GET['searchTerm']), ENT_QUOTES, 'UTF-8') : '';
$pets = [];

if (!empty($searchTerm)) {
  // Chamar a função para buscar os pets
  $pets = searchPets($conexao, $searchTerm);
}

if (isset($_GET['id'])) {
  $pet_id = $_GET['id'];
  $pet = getPetById($conexao, $pet_id);

  if (!$pet) {
    header('Location: /projetoback/index.php?page=home');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Resultados da Busca</title>
  <link rel="stylesheet" href="/assets/style/header.css">
  <link rel="stylesheet" href="/assets/style/buscaP.css">
  <link rel="stylesheet" href="/assets/style/footer.css">
</head>
<?php require('includes/header.php'); ?>

<body>
  <h1>Resultados da Busca</h1>
  <div id="pets-list">
    <?php if (!empty($pets)): ?>
      <?php foreach ($pets as $pet): ?>
        <div class="pet">
          <a href="index.php?page=pet_info&id=<?php echo $pet['id']; ?>">
            <div>
              <img src="assets/images/<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do Pet" width='100px' height='100px' />
            </div>
            <h3><?php echo htmlspecialchars($pet['nomePet'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Especie: <?php echo htmlspecialchars($pet['especie'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Raça: <?php echo htmlspecialchars($pet['raca'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Tutor: <?php echo htmlspecialchars($pet['idTutor'], ENT_QUOTES, 'UTF-8'); ?></p>
            </form>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div id="no-results">
        <p>Infelizmente nenhum Pet foi encontrado"<?php echo htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8'); ?>".</p>
      </div>
    <?php endif; ?>
  </div>
</body>
<?php require('includes/footer.php'); ?>

</html>