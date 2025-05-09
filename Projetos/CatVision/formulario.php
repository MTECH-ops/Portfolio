<?php

    if(isset($_POST['submit']))
    {
            // print_r('Nome: ' . $_POST['nome']);
            // print_r('<br>');
            // print_r('Email: ' . $_POST['email']);
            // print_r('<br>');
            // print_r('Senha: ' . $_POST['senha']);
            // print_r('<br>');
            // print_r('Repita: ' . $_POST['repita']);
            // print_r('<br>');
            // print_r('Telefone: ' . $_POST['telefone']);
            // print_r('<br>');
            // print_r('Sexo: ' . $_POST['genero']);
            // print_r('<br>');
            // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
            // print_r('<br>');
            // print_r('Cidade: ' . $_POST['cidade']);
            // print_r('<br>');
            // print_r('Estado: ' . $_POST['estado']);
            // print_r('<br>');
            // print_r('Endereço: ' . $_POST['endereco']);


        include_once('config.php');

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $repita = $_POST['repita'];
            $telefone = $_POST['telefone'];
            $sexo = $_POST['genero'];
            $data_nasc = $_POST['data_nascimento'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $endereco = $_POST['endereco'];


            $result = 
            mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha,repita,telefone,sexo,data_nasc,cidade,estado,endereco) 
            VALUES('$nome','$email','$senha','$repita','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");

            if(!$result) {
                die("Query failed: " . mysqli_error($conexao));
            }
            
        header('Location: login.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, Cyan, rgb(0, 85, 255));
        }
        .box{
            color: white;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <a href="http://localhost/log.php/">Voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="email" name="email" id="email" class="inputUser" required oninput="emailValidate()">
                    <label for="email" class="labelInput">Email</label>
                    <span class="span-required">Digite um email válido</span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required oninput="mainPasswordValidate()">
                    <label for="senha" class="labelInput">Senha</label>
                    <span class="span-required">Digite uma senha com no mínimo 8 caracteres</span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="repita" id="repita" class="inputUser" required oninput="comparePassword()">
                    <label for="repita" class="labelInput">Repita a sua senha</label>
                    <span class="span-required">Senhas devem ser compatíveis</span>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" optional>
                    <label for="telefone" class="labelInput">Telefone (opcional)</label>
                </div>
                <p>Sexo (opcional):</p>
                <input type="radio" id="feminino" name="genero" value="feminino" optional>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" optional>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" id="outro" name="genero" value="outro" optional>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b>Data de Nascimento (opcional):</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" optional>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" optional>
                    <label for="cidade" class="labelInput">Cidade (opcional)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" optional>
                    <label for="estado" class="labelInput">Estado (opcional)</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" optional>
                    <label for="endereco" class="labelInput">Endereço (opcional)</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
                <div style="width: 80px; height: 50px; left: 0px; top: 15px; position: absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                        <a href="http://localhost/log.php/">xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/></a>
                      </svg>
                    <div style="width: 31.65px; height: 56.20px; left: 50px; top: 11.90px; position: absolute"></div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
<script>
    const form   = document.getElementById('form');
    const campos = document.querySelectorAll('.required');
    const spans  = document.querySelectorAll('.span-required');
    const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        nameValidate();
        emailValidate();
        mainPasswordValidate();
        comparePassword();
    });

    function setError(index){
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }

    function removeError(index){
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }

    function nameValidate(){
        if(campos[0].value.length < 3)
        {
            setError(0);
        }
        else
        {
            removeError(0);
        }
    }

    function emailValidate(){
        if(!emailRegex.test(campos[1].value))
        {
            setError(1);
        }
        else
        {
            removeError(1);
        }
    }

    function mainPasswordValidate(){
        if(campos[2].value.length < 8)
        {
            setError(2);
        }
        else
        {
            removeError(2);
            comparePassword();
        }
    }

    function comparePassword(){
        if(campos[2].value == campos[3].value && campos[3].value.length >= 8)
        {
            removeError(3);
        }
        else
        {
            setError(3);
        }
    }

</script>
</html>