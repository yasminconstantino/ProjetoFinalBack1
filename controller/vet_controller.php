<?php
require_once('/opt/lampp/htdocs/projetoback/model/conectBD.php');
require_once('/opt/lampp/htdocs/projetoback/model/vet_functions.php');


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