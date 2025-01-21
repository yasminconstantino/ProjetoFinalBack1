<?php
// função para excluir o tutor
function deleteTutor($conexao, $tutorId) {
  try {
    $query = $conexao->prepare("DELETE FROM Tutor WHERE id = ?");
    return $query->execute([$tutorId]);
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    return false;
  }
}


// Função para verificar login
function loginTutor($conexao, $array)
{
  try {
    $query = $conexao->prepare("select * from Tutor where email=? and senha=?");
    if ($query->execute($array)) {
      $tutor = $query->fetch(); //coloca os dados num array $tutor
      if ($tutor) {
        return $tutor;
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

// Função para registrar um novo tutor
function registerTutor($conexao, $array)
{
    try {
        // Query de inserção
        $query = $conexao->prepare("INSERT INTO Tutor 
            (nomeTutor, email, senha, dtNasc, cpf, numTel) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $resultado = $query->execute($array);

        return $resultado;
    } catch (PDOException $e) {
        echo 'Erro ao registrar tutor: ' . $e->getMessage();
        return false;
    }
}


// Função para obter informações do tutor logado
function getTutorInfo($conexao, $tutorId)
{
  try {
    $query = $conexao->prepare("SELECT * FROM Tutor WHERE id = ?");
    $query->execute([$tutorId]);
    $user = $query->fetch();
    return $user;
  } catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

// Função para atualizar as informações do tutoor
function updateTutor($conexao, $tutorId, $data)
{
    try {
        $query = $conexao->prepare("UPDATE Tutor 
            SET nomeTutor = ?, email = ?, senha = ?, image = ?, numTel = ? 
            WHERE id = ?");
        return $query->execute([
            $data['nomeTutor'],
            $data['email'],
            $data['senha'],
            $data['image'],
            $data['numTel'],
            $tutorId
        ]);
    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
        return false;
    }
}

?>