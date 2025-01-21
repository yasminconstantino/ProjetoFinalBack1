<?php
require_once('/opt/lampp/htdocs/projetoback/model/conectBD.php');
require_once('/opt/lampp/htdocs/projetoback/model/tutor_functions.php');

session_start();

// Verifique se o tutor está logado
if (!isset($_SESSION['logado'])) {
    header('Location: /projetoback/index.php?page=login');
    exit();
}

$tutorId = $_SESSION['tutor_id'];
$tutor = getTutorInfo($conexao, $tutorId);

// Processar envio do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $nomeTutor = $_POST['nomeTutor'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // salvar a senha com hash, para criptografia: $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $numTel = $_POST['numTel'];
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

    // Atualizar os dados no banco
    $data = [
        'nomeTutor' => $nomeTutor,
        'email' => $email,
        'senha' => $senha,
        'image' => $imageName,
        'numTel' => $numTel
    ];

    if (updateTutor($conexao, $tutorId, $data)) {
        $_SESSION['message'] = "Informações atualizadas com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao atualizar as informações.";
    }

    header('Location: /projetoback/index.php?page=profile');
    exit();
}

if (isset($_POST['delete'])) {
  $deleteSuccess = deleteTutor($conexao, $tutorId);

  if ($deleteSuccess) {
    session_destroy(); // Finaliza a sessão
    header('Location: /projetoback/index.php?page=home'); // Redireciona para a página inicial
    exit();
  } else {
    $_SESSION['message'] = "Erro ao excluir o tutor.";
  }
}
?>