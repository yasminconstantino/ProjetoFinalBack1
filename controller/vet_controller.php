<?php
require_once('/opt/lampp/htdocs/projetoback/model/conectBD.php');
require_once('/opt/lampp/htdocs/projetoback/model/vet_functions.php');

// Verifique se o veterinario está logado
/*session_start();
if (!isset($_SESSION['logado'])) {
  header('Location: /projetoback/index.php?page=login');
  exit();
}

// Obtendo as informações do vet logado
$vetId = $_SESSION['vet_id'];
$vet = getVetInfo($conexao, $vetId);

// Processando o envio do formulário para atualizar os dados
if (isset($_POST['update'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $image = $_FILES['image'];

  // Verifica se a imagem foi enviada e faz o upload
  if ($image['tmp_name']) {
    // Garante que o nome do arquivo da imagem seja seguro para ser salvo
    $imageName = basename($image['name']);
    $imagePath = 'assets/images/' . $imageName;
    move_uploaded_file($image['tmp_name'], $imagePath);  // Envia a imagem para a pasta "assets/images"
  } else {
    // Se não enviar imagem, usa a imagem atual do banco de dados
    $imagePath = $vet['image'];
  }

  // Atualiza as informações do vet no banco de dados
  $data = [
    'nome' => $nome,
    'email' => $email,
    'senha' => $senha,
    'image' => $imageName, // Armazena apenas o nome do arquivo no banco
    'numTel' => $numTel
  ];

  $updateSuccess = updateVet($conexao, $vetId, $data);

  // Redireciona ou exibe uma mensagem de sucesso
  if ($updateSuccess) {
    session_start();
    $_SESSION['message'] = "Informações atualizadas com sucesso!";
    header('Location: /projetoback/index.php?page=profile'); // Redireciona de volta para o perfil
    exit();
  } else {
    $_SESSION['message'] = "Erro ao atualizar as informações.";
  }
}*/


// Buscar Vets
if (isset($_GET['searchTermV'])) {
  session_start();
  $searchTermV = $_GET['searchTermV'];
  $vets = searchVets($conexao, $searchTermV);

  header('Location: /projetoback/index.php?page=searchV&searchTermV=' . urlencode($searchTermV));
  exit();
}

// Listar todos os Vets
if (isset($_GET['page']) && $_GET['page'] == 'home') {
  session_start();
  $vets = allVets($conexao);
}

// Informações detalhadas do vet
if (isset($_GET['nome'])) {
  $vet_nome = $_GET['nome'];
  $vet = getVetByNome($conexao, $vet_nome);

  if (!$vet) {
    //header('Location: /projetoback/index.php?page=home');
    //exit();
  }

  include('view/vet.php');
}

if (isset($_POST['delete'])) {
  $deleteSuccess = deleteVet($conexao, $vet_Id);

  if ($deleteSuccess) {
    session_destroy(); // Finaliza a sessão
    header('Location: /projetoback/index.php?page=home'); // Redireciona para a página inicial
    exit();
  } else {
    $_SESSION['message'] = "Erro ao excluir o vet.";
  }
}
?>