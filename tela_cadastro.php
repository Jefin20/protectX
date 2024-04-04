<!-- tela_cadastro.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro | GN</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, black, gray);
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
            padding: 15px;
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
            border-radius: 12px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right, rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="tela_cadastro.php" method="post">
            <fieldset>
                <legend><b> Cadastro de usuário </b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="user_id" id="user_id" class="inputUser" required>
                    <label for="user_id" class="labelInput">Crie seu usuário</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="confirmar_senha" id="confirmar_senha" class="inputUser" required>
                    <label for="confirmar_senha" class="labelInput">Confirmar Senha</label>
                </div>
                <br><br>
                <p>Genero:</p>
                <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br><br>
                <input type="radio" id="masculino" name="genero" value="masculino">
                <label for="masculino">Masculino</label>
                <br><br>
                <input type="radio" id="outro" name="genero" value="outro">
                <label for="outro">Outro</label>
                <br><br>
                <label for="Data_Nascimento"><b>Data de Nascimento</b>:</label>
                <input type="date" name="Data_Nascimento" id="Data_Nascimento" required>
                <div class="inputBox"></div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conecta ao banco de dados MySQL
        $servername = "localhost";
        $username = "usuario";
        $password = "Arroba 34";
        $database = "formulario_cadastro";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Recupera os valores do formulário
        $nome = $_POST['nome'];
        $user_id = $_POST['user_id'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        $genero = $_POST['genero'];
        $Data_Nascimento = $_POST['Data_Nascimento'];

        // Construindo a consulta SQL
        $sql = "INSERT INTO cadastro_user (nome, user_id, telefone, senha, genero, Data_Nascimento) VALUES ";
        $sql .= "('$nome', '$user_id', '$telefone', '$senha', '$genero', '$Data_Nascimento')";

        // Executando a consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }

        // Fecha a conexão
        $conn->close();
    }
    ?>
</body>
</html>