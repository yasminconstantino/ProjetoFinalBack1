<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Cadastro - FindVet</title>
  <link rel="stylesheet" href="/assets/style/registroT.css">
</head>

<body>
  <div class="container">
    <!-- Lado esquerdo com imagem e texto -->
    <div class="image-container">
      <div class="welcome-text">
        <h1>Crie sua conta na FindVet</h1>
        <p>A melhor maneira de gerenciar a saude dos Pets para Veterinários e Tutores.</p>
      </div>
    </div>

    <!-- Lado direito com o formulário -->
    <div class="form-container">
      <form method="POST" action="/projetoback/controller/autenticaT.php" enctype="multipart/form-data">
        <h2>Cadastro de tutor</h2>
        <input type="text" name="nomeTutor" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="date" id="dtNasc" name="dtNasc" placeholder="Data de Nascimento" required>
        <input type="text" id="cpf" name="CPF" placeholder="cpf" required>
        <input type="text" name="numTel" placeholder="Numero de Telefone" required>
        <button type="submit" name="register">Cadastrar</button>
        <p>Já tem uma conta? <a href="index.php?page=login">Faça login</a></p>
      </form>
  </div>
</body>

</html>