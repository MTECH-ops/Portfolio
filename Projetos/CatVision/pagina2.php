<?php
include('config.php');

if(empty($_POST['email']) || empty($_POST['senha'])) {
    header("Location: log.php");
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, email from usuarios where email = '{$email}' and senha = nd5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if(row == 1) {
    $_SESSION['email'] = $email;
    header('Location: painel.php');
    exit();
} else {
    header('Location: log.php');
    exit();

}


?>


<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    header('Location: login.php');
    exit();
}

$logado = $_SESSION['email'];

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}

$result = mysqli_query($conexao, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="width: 100%; height: 100%; position: relative; background: white; overflow: hidden">
    <Style>
        Body{
            background-image: linear-gradient(45deg, Cyan, rgb(0, 85, 255));
        }
    </Style>
    <div style="width: 390px; height: 824px; left: 0px; top: 0px; position: absolute; background: white"></div>
    <div style="width: 80px; height: 80px; left: 44px; top: 93px; position: absolute">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            <a href="index.html">xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/></a>
          </svg>
        <div style="width: 31.65px; height: 56.20px; left: 50px; top: 11.90px; position: absolute; background: white"></div>
    </div>
    <div style="width: 653px; height: 256px; padding-bottom: 21px; left: 394px; top: 299px; position: absolute; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 16px; display: inline-flex">
        <div style="align-self: stretch; height: 40px; padding-left: 16px; padding-right: 16px; padding-top: 8px; padding-bottom: 8px; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 8px; outline: 1px #E0E0E0 solid; outline-offset: -1px; justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
            <style>
                input{
                    padding: 15px; width: 900px;
                }
            </style>
            <input type="text" placeholder="email@domain.com">
            <div style="flex: 1 1 0; color: #828282; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 19.60px; word-wrap: break-word"></div>
        </div>
        <div style="align-self: stretch; height: 40px; padding-left: 16px; padding-right: 16px; padding-top: 8px; padding-bottom: 8px; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 8px; outline: 1px #E0E0E0 solid; outline-offset: -1px; justify-content: flex-start; align-items: center; gap: 16px; display: inline-flex">
            <style>
                input{
                    padding: 15px; width: 900px;
                }
            </style>
            <input type="text" placeholder="Senha">
            <div style="flex: 1 1 0; color: #828282; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 19.60px; word-wrap: break-word"></div>
        </div>
        <div style="align-self: stretch; height: 40px; padding-left: 16px; padding-right: 16px; background: black; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 8px; justify-content: center; align-items: center; gap: 8px; display: inline-flex">
            <a href="Paginalembretes.html"><div style="justify-content: center; display: flex; flex-direction: column; color: white; font-size: 14px; font-family: Inter; font-weight: 500; line-height: 19.60px; word-wrap: break-word">Continue</div></a>
        </div>
        <div style="width: 262px; height: 80px; left: 196px; top: 200px; position: absolute; text-align: center; color: black; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 19.60px; word-wrap: break-word">Ao continuar você concorda com os Termos de Uso e Política de Privacidade</div>
    </div>
    <div style="left: 595px; top: 191px; position: absolute; text-align: center; color: black; font-size: 36px; font-family: Inter; font-weight: 400; line-height: 50.40px; word-wrap: break-word; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Faça o seu login</div>
    <div style="left: 642px; top: 614px; position: absolute; text-align: center; color: #2D6EFF; font-size: 30px; font-family: Inter; font-weight: 400; line-height: 42px; word-wrap: break-word; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"><a href="http://localhost/formulario.php/">Cadastre-se</a></div>
    <div style="left: 708px; top: 566px; position: absolute; text-align: center; color: black; font-size: 20px; font-family: Inter; font-weight: 400; line-height: 28px; word-wrap: break-word">ou</div>
</div>
</body>
</html>