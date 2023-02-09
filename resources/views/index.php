<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro </title>
    <meta charset="utf-8"/>
</head>
<body>
    <form class="formulario" method="post"> 
        <p> Preencha o formulário abaixo</p>
        
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome*" required>
        </div>

        <div class="field">
            <label for="email">Seu E-Mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu E-Mail*" required>
        </div>        

        <div class="field">
            <label for="">Senha:</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha*" required>
        </div>

        <input type="submit" name="acao" value="Enviar">
    </form>
</body>
</html>