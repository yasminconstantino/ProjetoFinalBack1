<?php
require_once('/opt/lampp/htdocs/projetoback/model/conectBD.php');
require_once('/opt/lampp/htdocs/projetoback/model/pet_functions.php');

// Cadastrar Pet
if (isset($_POST['addPet'])) {
  $nomePet = $_POST['nomePet'];
  $especie = $_POST['especie'];
  $raca = $_POST['raca'];
  $dtNasc = $_POST['dtNasc'];
  $idTutor = $_POST['idTutor'];

 // Certifique-se de iniciar a sessão
session_start();

// Obtenha o ID do tutor logado da sessão
if (isset($_SESSION['tutor_id'])) {
  $idTutor = $_SESSION['tutor_id'];
} else {
  // Caso o tutor não esteja logado, redirecione para a página de login
  header('Location: /projetoback/index.php?page=login');
  exit();
}

// Dados para a função addPet
$array = [
  $nomePet, 
  $especie, 
  $raca,  
  $dtNasc,
  $idTutor  // Usa o ID do tutor logado
];

$updateSuccess = addPet($conexao, $array);

if ($updateSuccess) {
  $_SESSION['message'] = 'Pet cadastrado com sucesso!';
  header('Location: /projetoback/index.php?page=home');
  exit();
} else {
  echo "Erro ao cadastrar o pet.";
}

}

// Buscar Pets
if (isset($_GET['searchTerm'])) {
  session_start();
  $searchTerm = $_GET['searchTerm'];
  $pets = searchPets($conexao, $searchTerm);

  header('Location: /projetoback/index.php?page=search&searchTerm=' . urlencode($searchTerm));
  exit();
}

// Listar todos os Pets
if (isset($_GET['page']) && $_GET['page'] == 'home') {
  session_start();
  $pets = allPets($conexao, $idTutor);

  header('Location: /projetoback/index.php?page=home');
  exit();
}

// Informações detalhadas do pet
if (isset($_GET['id'])) {
  $pet_id = intval($_GET['id']); // Garante que a ID seja um inteiro
  $pet = getPetById($conexao, $pet_id);

  if ($pet) {
    include('view/pet.php'); // Inclui a view do pet
    exit(); // Para evitar o restante da execução
  } else {
    // Mostra uma mensagem amigável ao invés de redirecionar
    echo "<p>Não foi possível encontrar informações para este pet.</p>";
  }
}

// Se o formulário de edição for enviado
if (isset($_POST['editPet'])) {
  $pet_id = $_POST['pet_id'];  // O ID do pet para edição
  $nomePet = $_POST['nomePet'];
  $especie = $_POST['especie'];
  $raca = $_POST['raca'];
  $dtNasc = $_POST['dtNasc'];
  $imageName = $tutor['image']; // Mantém a imagem anterior como padrão

  // Verifica se há um arquivo de imagem enviado
  if (!empty($_FILES['image']['name'])) {
      $imageTmp = $_FILES['image']['tmp_name'];
      $imageName = uniqid() . '_' . $_FILES['image']['name'];
      $uploadPath = '/opt/lampp/htdocs/projetoback/assets/images/' . $imageName;

      if (!move_uploaded_file($imageTmp, $uploadPath)) {
          $_SESSION['message'] = "Erro ao fazer upload da imagem.";
          header('Location: /projetoback/index.php?page=profile');
          exit();
      }
  }
  // Atualiza os dados do pet
  $array = [
    'id' => $pet_id,
    'nomePet' => $nomePet,
    'especie' => $especie,
    'raca' => $raca,
    'dtNasc' => $dtNasc,
    'image' => $imageName ? $imageName : $pet['image'],  // Caso não tenha nova imagem, usa a atual
  ];

  $updateSuccess = updatePet($conexao, $array);

  if ($updateSuccess) {
    $_SESSION['message'] = 'Pet atualizado com sucesso!';
    header('Location: /projetoback/index.php?page=home');
    exit();
  } else {
    echo "Erro ao editar o pet.";
  }
}