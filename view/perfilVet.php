<?php
require_once('model/conectBD.php');
require_once('model/vet_functions.php');

// Verifique se o vet está logado
if (!isset($_SESSION['logado'])) {
  header('Location: /projeto-back-front/index.php?page=login');
  exit();
}

// Obtendo as informações do vet logado
$vetId = $_SESSION['vet_id'];
$vet = getVetInfo($conexao, $vetId);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Perfil Veterinario - Editar Informações</title>
  <link rel="stylesheet" href="assets/style/header.css">
  <link rel="stylesheet" href="assets/style/perfilVet.css">
  <link rel="stylesheet" href="assets/style/footer.css">
</head>

<?php require('includes/header.php'); ?>

<body>
  <h1>Editar Perfil</h1>
  <form method="POST" action="controllers/ProfileController.php" enctype="multipart/form-data">
    <?php if (isset($_SESSION['message'])): ?>
      <div class="message">
        <?php echo htmlspecialchars($_SESSION['message']);
        unset($_SESSION['message']); ?>
      </div>
    <?php endif; ?>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($tutor['nome']); ?>" required>
    <br><br>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($tutor['email']); ?>" required>
    <br><br>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" value="<?php echo htmlspecialchars($tutor['senha']); ?>" required>
    <br><br>

    <label for="numTel">Numero de Telefone:</label>
    <input type="text" id="numTel" name="numTel" value="<?php echo htmlspecialchars($tutor['numTel']); ?>" required>
    <br><br>

    <div class="drag-drop-area" id="dragDropArea">
      <p>Arraste e solte sua imagem aqui ou clique para selecionar</p>
      <img src="assets/images<?php echo htmlspecialchars($tutor['image']); ?>" alt="Foto de Perfil" id="previewImage" class="profile-image">

      <input type="file" id="image" name="image" accept="image/*" style="display: none;">
    </div>
    <br><br>


    <button type="submit" name="update">Atualizar</button>
  </form>
  <script src="assets/script/script.js"></script>
</body>
<?php require('includes/footer.php'); ?>

</html>