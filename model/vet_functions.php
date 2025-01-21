<?php

// Função para verificar login
function loginVet($conexao, $array)
{
  try {
    $query = $conexao->prepare("select * from Veterinario where email=? and senha=?");
    if ($query->execute($array)) {
      $vet = $query->fetch(); //coloca os dados num array $vet
      if ($vet) {
        return $vet;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

// Função para registrar um novo vterinario
function registerVet($conexao, $array)
{
  try {
    $query = $conexao->prepare("insert into Veterinario (nome, email, senha, crm, numTel) values (?, ?, ?, ?, ?)");

    $resultado = $query->execute($array);

    return $resultado;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

// Função para buscar veterinario por nome, especia ou tutor
function searchVets($conexao, $searchTermV)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Veterinario WHERE nome LIKE ? OR especialidade LIKE ?");
    $term = '%' . $searchTermV . '%';
    $query->execute([$term, $term]);
    $vets = $query->fetchAll(PDO::FETCH_ASSOC);
    return $vets;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return [];
  }
}

// Função para buscar todos os veterinario
function allVets($conexao)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Veterinario");
    $query->execute();
    $vets = $query->fetchAll(PDO::FETCH_ASSOC);
    return $vets;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return [];
  }
}

// Função para obter informações do veterunario logado
function getVetInfo($conexao, $vetId)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Veterinario WHERE id = ?");
    $query->execute([$vetId]);
    $user = $query->fetch();
    return $user;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

// Função para atualizar as informações do vet
function updateVet($conexao, $vetId, $data)
{
  try {
    // Prepara a consulta SQL para atualizar as informações
    $query = $conexao->prepare("UPDATE Veterinario SET nome = ?, email = ?, senha = ?, image = ?, numTel = ? WHERE id = ?");
    $result = $query->execute([
      $data['nome'],
      $data['email'],
      $data['senha'],
      $data['image'],
      $data['numTel'],
      $vetId
    ]);

    return $result;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}

// Função para buscar as informações do vet pelo nome
function getVetByNome($conexao, $vet_nome)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Veterinario WHERE nome = :vet_nome");
    $query->bindParam(':vet_nome', $vet_nome, PDO::PARAM_INT);
    $query->execute();
    $vetInfo = $query->fetch(PDO::FETCH_ASSOC);
    return $vetInfo;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return [];
  }
}

// buscar as informações do vet pelo id
function getVetById($conexao, $vet_id) {
  try {
    $query = $conexao->prepare("SELECT * FROM Veterinario WHERE id = :vet_id");
    $query->bindParam(':vet_id', $vet_id, PDO::PARAM_INT);
    $query->execute();
    $vetInfo = $query->fetch(PDO::FETCH_ASSOC);
    return $vetInfo ?: null; // Retorna null se não encontrar o vet
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return null; // Garante retorno mesmo em caso de erro
  }
}

function deleteVet($conexao, $vet_Id) {
  try {
    $query = $conexao->prepare("DELETE FROM Veterinario WHERE id = ?");
    return $query->execute([$vet_Id]);
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}