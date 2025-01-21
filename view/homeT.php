<?php
require_once('model/conectBD.php');
require_once('model/pet_functions.php');
require_once('model/vet_functions.php'); 

// Verifica se o tutor está logado
if (!isset($_SESSION['tutor_id'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

$tutor_id = $_SESSION['tutor_id'];

if (isset($_GET['page']) && $_GET['page'] == 'home') {
  // Chama a função allPets para obter apenas os pets do tutor logado
  $pets = allPets($conexao, $tutor_id);
  $vets = allVets($conexao);
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
  <title>Home Tutor</title>
  <link rel="stylesheet" href="/assets/style/header.css">
  <link rel="stylesheet" href="/assets/style/homeT.css">
  <link rel="stylesheet" href="/assets/style/footer.css">
  <link rel="shortcut icon" type="imagex/png" href="imagens/logoFindVetTransparent.png">
</head>

<?php require('includes/header.php'); ?>
<body>
  <h1>Bem-vindo à FindVet</h1>
  <a href="index.php?page=profile">seu perfil</a>
  <h2>Seus pets cadastrados</h2>
  <div id="pets-list">
    <?php if (!empty($pets)): ?>
      <?php foreach ($pets as $pet): ?>
        <div class="pet-item">
        <a href="index.php?page=pet&id=<?php echo $pet['id']; ?>">
            <div>
              <img src="assets/images/<?php echo htmlspecialchars($pet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do pet" width='100px' height='100px'/>
            </div>
            <h3><?php echo htmlspecialchars($pet['nomePet'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Especie: <?php echo htmlspecialchars($pet['especie'], ENT_QUOTES, 'UTF-8'); ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Infelizmente nenhum pet foi encontrado</p>
    <?php endif; ?>
    <br>
    <a href="index.php?page=addpet">Adicionar novo pet</a>
  </div>
<!-- busca pet, busca por todos no bd, desnecessario para o tutor ver ouyttros pets
  <form method="GET" class="buscaPet" action="/projetoback/controller/pet_controller.php" enctype="multipart/form-data">
    <h2>Buscar seus pets</h2>
    <input type="text" name="searchTerm" placeholder="Buscar por nome, especie ou raça">
    <button type="submit">Buscar</button>
  </form>-->
  <form method="GET" class="buscaVet" action="/projetoback/controller/vet_controller.php" enctype="multipart/form-data">
    <h2>Buscar por Veterinario</h2>
    <input type="text" name="searchTermV" placeholder="Buscar por nome ou especialidade">
    <button type="submit2">Buscar</button>
  </form>
  <hr>
  <h2>Veterinarios Disponiveis</h2>
  <div id="vets-list">
    <?php if (!empty($vets)): ?>
      <?php foreach ($vets as $vet): ?>
        <div class="vet-item">
        <a href="index.php?page=vet&id=<?php echo $vet['id']; ?>">
            <div>
              <img src="assets/images/<?php echo htmlspecialchars($vet['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Foto do Veterinario" width='100px' height='100px'/>
            </div>
            <h3><?php echo htmlspecialchars($vet['nome'], ENT_QUOTES, 'UTF-8'); ?></h3>
            <p>Especialidade: <?php echo htmlspecialchars($vet['especialidade'], ENT_QUOTES, 'UTF-8'); ?></p>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Infelizmente nenhum veterinario foi encontrado</p>
    <?php endif; ?>
  </div>
</body>
<?php require('includes/footer.php'); ?>

</html>