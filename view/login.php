<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Login - FindVet</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <div class="container">
    <div class="image-container">
      <div class="welcome-text">
        <h1>Bem-vindo à FindVet</h1>
        <p>Facilitando a saude dos pets.</p>
      </div>
    </div>

    <section class="loginTutor">
    <div class="form-container">
      <form id="login-form" method="POST" action="/projetoback/controller/autenticaT.php" enctype="multipart/form-data">
        <h2>Login</h2>
        <input type="email" name="email" placeholder="Digite seu email" required>
        <input type="password" name="password" placeholder="Digite sua senha" required>
        <?php if (isset($_SESSION['message'])): ?>
          <div class="message">
            <?php echo htmlspecialchars($_SESSION['message']);
            unset($_SESSION['message']); ?>
          </div>
        <?php endif; ?>
        <button type="submit" name="login">Entrar</button>
        <p>Não tem uma conta? <a href="index.php?page=register">Crie agora</a></p>
      </form>
    </div>
    </section>
  </div>
</body>

</html>