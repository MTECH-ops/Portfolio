<?php

    if(isset($_POST['submit']))
    {
            // print_r('materia: ' . $_POST['materia']);
            // print_r('<br>');
            // print_r('importancia: ' . $_POST['importancia']);
            // print_r('<br>');
            // print_r('concluido: ' . $_POST['concluido']);
            // print_r('<br>');
            // print_r('Data de entrega: ' . $_POST['data_de_entrega']);
            // print_r('<br>');
            // print_r('descricao: ' . $_POST['descricao']);
            // print_r('<br>');


        include_once('config.php');

            $materia = $_POST['materia'];
            $importancia = $_POST['importancia'];
            $concluido = $_POST['concluido'];
            $data_entrega = $_POST['data_de_entrega'];
            $descricao = $_POST['descricao'];

            $result = mysqli_query($conexao, "INSERT INTO lembretes(materia, importancia, concluido, data_de_entrega, descricao) VALUES ('$materia', '$importancia', '$concluido', '$data_entrega', '$descricao')");
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
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
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
        #data_de_entrega{
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
    <div class="box">
    <form action="lembretes.php" method="POST">
        <fieldset>
                <legend><b>Lembretes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="materia" id="materia" class="inputUser" required>
                    <label for="materia" class="labelInput">Matéria</label>
                </div>
                <br><br>
                <p>Importância:</p>
                <input type="radio" id="muito_importante" name="importancia" value="muito_importante" required>
                <label for="muito_importante">Muito importante</label>
                <br>
                <input type="radio" id="importante" name="importancia" value="importante" required>
                <label for="importante">Importante</label>
                <br>
                <input type="radio" id="normal" name="importancia" value="normal" required>
                <label for="normal">normal</label>
                <br><br>
                <p>Marcar o lembrete como concluído:</p>
                <input type="checkbox" id="concluido" name="concluido" value="concluido" optional>
                <label class="form-check-label" for="concluido">Concluído</label>
                <br>
                <p>
                <label for="data_de_entrega"><b>Data de entrega:</b></label>
                <input type="date" name="data_de_entrega" id="data_de_entrega" required>
                <br><br><br>
                </p>
                <div class="inputBox">
                    <input type="text" name="descricao" id="descricao" class="inputUser" optional>
                    <label for="descricao" class="labelInput">Descrição do lembrete (opcional)</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>