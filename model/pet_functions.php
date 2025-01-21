<?php
// Função para cadastrar um pet
/*function addPet($conexao, $array)
{
  try {
    $query = $conexao->prepare("INSERT INTO Pet (nomePet, especie, raca, dtNasc, idTutor, image) VALUES (?, ?, ?, ?, ?,  ?)");
    $resultado = $query->execute($array);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}*/

function addPet($conexao, $array)
{
  try {
    $query = $conexao->prepare("INSERT INTO Pet (nomePet, especie, raca, dtNasc, idTutor) VALUES (?, ?, ?, ?, ?)");
    $resultado = $query->execute($array);
    return $resultado;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}


// Função para buscar pets por nome, especia ou tutor
function searchPets($conexao, $searchTerm)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Pet WHERE nomePet LIKE ? OR especie LIKE ? OR raca LIKE ?");
    $term = '%' . $searchTerm . '%';
    $query->execute([$term, $term, $term]);
    $pets = $query->fetchAll(PDO::FETCH_ASSOC);
    return $pets;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return [];
  }
}

// Função para buscar todos os pets
function allPets($conexao, $idTutor)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Pet WHERE idTutor = :idTutor");
    $query->bindParam(':idTutor', $idTutor, PDO::PARAM_INT);
    $query->execute();
    $pets = $query->fetchAll(PDO::FETCH_ASSOC);
    return $pets;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return [];
  }
}

// Função para buscar as informações do pet pelo id
function getPetById($conexao, $pet_id) {
  try {
    $query = $conexao->prepare("SELECT * FROM Pet WHERE id = :pet_id");
    $query->bindParam(':pet_id', $pet_id, PDO::PARAM_INT);
    $query->execute();
    $petInfo = $query->fetch(PDO::FETCH_ASSOC);
    return $petInfo ?: null; // Retorna null se não encontrar o pet
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return null; // Garante retorno mesmo em caso de erro
  }
}

// Função para atualizar o pet no banco
/*function updatePet($conexao, $array) {
  try {
    $query = $conexao->prepare("UPDATE Pet SET nomePet = :nomePet, especie = :especie, raca = :raca, dtNasc = :dtNasc, image = :image WHERE id = :id");
    return $query->execute($array);
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}
?>*/

function updatePet($conexao, $array) {
  try {
    $query = $conexao->prepare("UPDATE Pet SET nomePet = :nomePet, especie = :especie, raca = :raca, dtNasc = :dtNasc, image = :image WHERE id = :id");
    return $query->execute($array);
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}
