<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Yasmin Constantino">
  <meta name="date" content="2025-01-20">
  <title>Cadastro - BiblioTech</title>
  <link rel="stylesheet" href="/assets/style/registroV.css">
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
      <form method="POST" action="/controller/autenticaV.php">
        <h2>Cadastro de Veterinario</h2>
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="text" name="crm" placeholder="CRM" required>
        <input type="text" name="especialidade" placeholder="Especialidade" value="Clínico Geral" required>
        <input type="text" name="numTel" placeholder="Numero de Telefone" required>

        <button type="submit" name="register">Cadastrar</button>
        <p>Já tem uma conta? <a href="index.php?page=login">Faça login</a></p>
      </form>
  </div>
</body>

</html>