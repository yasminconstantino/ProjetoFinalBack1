<?php
require_once('model/conectBD.php');
require_once('model/vet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}
// Verificar se foi enviado um termo de busca
$searchTermV = isset($_GET['searchTermV']) ? $_GET['searchTermV'] : '';
$vets = [];

if (!empty($searchTermV)) {
  // Chamar a função para buscar os veterinari
  $vets = searchVets($conexao, $searchTermV);
}

if (isset($_GET['id'])) {
  $vet_id = $_GET['id'];
  $vet = getVetById($conexao, $vet_id);

  if (!$vet) {
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
  <link rel="stylesheet" href="/assets/style/buscaV.css">
  <link rel="stylesheet" href="/assets/style/footer.css">
</head>
<?php require('includes/header.php'); ?>

<body>
  <h1>Resultados da Busca</h1>
  <div id="vets-list">
    <?php if (!empty($vets)): ?>
      <?php foreach ($vets as $vet): ?>
        <div class="vet">
          <a href="index.php?page=vet_info&id=<?php echo $vet['id']; ?>">
          <img src="assets/images/<?php echo htmlspecialchars($vet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do Veterinário" class="vet-image" width='100px' height='100px'/>
          <h3><?php echo htmlspecialchars($vet['nome'], ENT_QUOTES, 'UTF-8'); ?></h3>
          <p><strong>Email:</strong> <?php echo htmlspecialchars($vet['email'], ENT_QUOTES, 'UTF-8'); ?></p>
          <p><strong>Telefone:</strong> <?php echo htmlspecialchars($vet['numTel'], ENT_QUOTES, 'UTF-8'); ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div id="no-results">
        <p>Infelizmente nenhum veterinario foi encontrado"<?php echo htmlspecialchars($searchTermV, ENT_QUOTES, 'UTF-8'); ?>".</p>
      </div>
    <?php endif; ?>
  </div>
</body>
<?php require('includes/footer.php'); ?>

</html>