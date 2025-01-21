<?php
require_once('model/conectBD.php');
require_once('model/tutor_functions.php');

// Verifique se o tutor está logado
if (!isset($_SESSION['logado'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

// Obtendo as informações do tutor logado
$tutorId = $_SESSION['tutor_id'];
$tutor = getTutorInfo($conexao, $tutorId);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Tutor</title>
  <link rel="stylesheet" href="/assets/style/style.css">
</head>

<body>
 <a href="index.php?page=home">Voltar</a>
  <h1>Editar Perfil</h1>
  <?php if (isset($_SESSION['message'])): ?>
    <div class="message">
      <?php echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?>
    </div>
  <?php endif; ?>

  <form method="POST" action="/projetoback/controller/tutor_controller.php" enctype="multipart/form-data">
    <label for="nomeTutor">Nome:</label>
    <input type="text" id="nomeTutor" name="nomeTutor" value="<?php echo htmlspecialchars($tutor['nomeTutor']); ?>" required>
    <br><br>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($tutor['email']); ?>" required>
    <br><br>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>
    <br><br>

    <label for="numTel">Telefone:</label>
    <input type="text" id="numTel" name="numTel" value="<?php echo htmlspecialchars($tutor['numTel']); ?>" required>
    <br><br>

    <label for="image">Foto do Perfil:</label>
    <div>
      <img src="/projetoback/assets/images/<?php echo htmlspecialchars($tutor['image'], ENT_QUOTES, 'UTF-8'); ?>" 
           alt="Foto do Perfil" width="100" height="100">
      <input type="file" id="image" name="image" accept="image/*">
    </div>
    <br><br>

    <button type="submit" name="update">Atualizar</button>
  </form>
<br><br>
  <form method="POST" action="/projetoback/controller/tutor_controller.php">
  <button type="submit" name="delete" class="delete-btn">Excluir Conta</button>
</form>
</body>

</html>
