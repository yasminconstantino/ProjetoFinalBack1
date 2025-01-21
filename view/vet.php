<?php
require_once('model/conectBD.php');
require_once('model/vet_functions.php');

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];

// Inicializa a variável $vet como null para evitar erros
$vet = null;

// Se um ID do vet for fornecido, busca as informações do vet
if (isset($_GET['id'])) {
  $vet_id = $_GET['id'];
  $vet = getVetById($conexao, $vet_id);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Informações do Veterinario</title>
  <link rel="stylesheet" href="/assets/style/header.css">
  <link rel="stylesheet" href="/assets/style/pet.css">
  <link rel="stylesheet" href="/assets/style/footer.css">

</head>

<?php require('includes/footer.php'); ?>

<body>
  <h1>Informações do Veterinario</h1>
  <div class="vet-info-container">
    <div class="vet-info">
      <div class="vet-details">
      <?php if ($vet): ?>
      <img src="assets/images/<?php echo htmlspecialchars($vet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do Veterinário" width='100px' height='100px' />
      <h3><?php echo htmlspecialchars($vet['nome'], ENT_QUOTES, 'UTF-8'); ?></h3>
      <p><strong>Especialidade:</strong> <?php echo htmlspecialchars($vet['especialidade'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($vet['email'], ENT_QUOTES, 'UTF-8'); ?></p>
      <p><strong>Telefone:</strong> <?php echo nl2br(htmlspecialchars($vet['numTel'], ENT_QUOTES, 'UTF-8')); ?></p>
    <?php else: ?>
      <p>Informações do veterinário não encontradas.</p>
    <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</body>
<?php require('includes/footer.php'); ?>

</html>