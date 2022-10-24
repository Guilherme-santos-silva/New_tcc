<?php
require('db/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Dados</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
<h1>Inserindo Dados</h1>s

<!-- formulario para inserir dados -->
<form id="form_salva" method="post">
    <input type="text" name="CPF" placeholder="Digite seu cpf" required>
    <input type="text" name="DataPagamento" placeholder="Digite seu nome" required>
    <input type="text" name="OrdemServico" placeholder="Digite seu sobrenome" required>
    <input type="text" name="OrdemVenda" placeholder="Digite seu telefone" required>
    <input type="text" name="Preco" placeholder="Digite seu email" required>
            
    <button type="submit" name="salvar">salvar</button>
</form>

<!-- formulario para atualizar dados -->
<form class="oculto" id="form_atualiza" method="post">
    <input type="hidden" id="id_editado" name="id_editado" placeholder="ID" required>
    <input type="text" id="cpf_editado" name="cpf_editado" placeholder="Editar cpf" required>
    <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required>
    <input type="text" id="sobremome_editado" name="sobrenome_editado" placeholder="Editar sobrenome" required>
    <input type="text" id="telefone_editado" name="telefone_editado" placeholder="Editar telefone" required>
    <input type="email" id="email_editado" name="email_editado" placeholder="Editar email" required>
    <input type="text" id="banco_editado" name="banco_editado" placeholder="Editar banco" required>
    <input type="text" id="cep_editado" name="cep_editado" placeholder="Editar cep" required>
    <input type="text" id="endereco_editado" name="endereco_editado" placeholder="Editar endereço" required>
    <input type="text" id="cidade_editado" name="cidade_editado" placeholder="Editar cidade" required>
    <input type="text" id="logradouro_editado" name="logradouro_editado" placeholder="Editar logradouro" required>
    
    <button type="submit" name="atualizar">Atualizar</button>
    <button type="button" id="cancelar" name="cancelar">Cancelar</button>
</form> 

<!-- formulario para deletar dados -->
<form class="oculto" id="form_deleta" method="post">
    <input type="hidden" id="id_deleta" name="id_deleta" placeholder="ID" required>
    <input type="hidden" id="cpf_deleta" name="cpf_deleta" placeholder="Editar cpf" required>
    <input type="hidden" id="nome_deleta" name="nome_deleta" placeholder="Editar nome" required>
    <input type="hidden" id="sobrenome_deleta" name="sobrenome_deleta" placeholder="Editar sobrenome" required>
    <input type="hidden" id="telefone_deleta" name="telefone_deleta" placeholder="Editar telefone" required>
    <input type="hidden" id="email_deleta" name="email_deleta" placeholder="Editar email" required>  
    <input type="hidden" id="banco_deleta" name="banco_deleta" placeholder="Editar banco" required>
    <input type="hidden" id="cep_deleta" name="cep_deleta" placeholder="Editar cep" required>
    <input type="hidden" id="endereco_deleta" name="endereco_deleta" placeholder="Editar endereço" required>
    <input type="hidden" id="cidade_deleta" name="cidade_deleta" placeholder="Editar cidade" required>
    <input type="hidden" id="logradouro_deleta" name="logradouro_deleta" placeholder="Editar logradouro" required>

    <b>Tem certeza que quer deletar cliente <span id="tbmClientes"></span>?</b>

    <button type="submit" name="deletar">Confirmar</button>
    <button type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>
</form> 

<br>

<?php
//inserir dados no banco
if(
    isset($_POST['CPF']) && 
    isset($_POST['DataPagamento']) &&
    isset($_POST['OrdemServico']) && 
    isset($_POST['OrdemVenda']) && 
    isset($_POST['Preco'])
){

$CPF= limpaPost($_POST['CPF']);
$DataPagamento= limpaPost($_POST['DataPagamento']);
$OrdemServico= limpaPost($_POST['OrdemServico']);
$OrdemVenda= limpaPost($_POST['OrdemVenda']);
$Preco= limpaPost($_POST['Preco']);

//validaçao de campo vazio
if ($CPF == "" || $CPF == null){
    echo "<b style='color:red'>Insira um cpf</b>";
    exit();
}

if ($DataPagamento == "" || $DataPagamento == null){
    echo "<b style='color:red'>Insira um nome</b>";
    exit();
}

if ($OrdemServico == "" || $OrdemServico == null){
    echo "<b style='color:red'>Insira um sobrenome</b>";
    exit();
}

if ($OrdemVenda == "" || $OrdemVenda == null){
    echo "<b style='color:red'>Insira um telefone</b>";
    exit();
}

if ($Preco == "" || $Preco == null){
    echo "<b style='color:red'>Insira um email</b>";
    exit();
}


$sql = $pdo->prepare("INSERT INTO tblvendas VALUES (?, ?, ?, ?, ?)");
$sql->execute(array($CPF, $DataPagamento, $OrdemServico, $OrdemVenda, $Preco));

echo "<b style='color:green'>Cliente inserido com sucesso!</b>";

}

//atualizaçao de dados
if(
    isset($_POST['atualizar']) && 
    isset($_POST['id_editado']) &&
    isset($_POST['cpf_editado']) && 
    isset($_POST['nome_editado']) &&
    isset($_POST['sobrenome_editado']) && 
    isset($_POST['telefone_editado']) &&  
    isset($_POST['email_editado']) &&
    isset($_POST['banco_editado']) && 
    isset($_POST['cep_editado']) && 
    isset($_POST['endereco_editado']) && 
    isset($_POST['cidade_editado']) && 
    isset($_POST['logradouro_editado'])
    ){
    
    $id=limpaPost($_POST['id_editado']);
    $cpf=limpaPost($_POST['cpf_editado']);
    $nome=limpaPost($_POST['nome_editado']);
    $sobrenome=limpaPost($_POST['sobrenome_editado']);
    $telefone=limpaPost($_POST['telefone_editado']);
    $email=limpaPost($_POST['email_editado']);
    $banco=limpaPost($_POST['banco_editado']);
    $cep=limpaPost($_POST['cpf_editado']);
    $endereco=limpaPost($_POST['endereco_editado']);
    $cidade=limpaPost($_POST['cidade_editado']);
    $logradouro=limpaPost($_POST['logradouro_editado']);

    //validaçao de campo vazio
    if ($cpf == "" || $cpf == null){
        echo "<b style='color:red'>Insira um cpf</b>";
        exit();
    }
    
    if ($nome == "" || $nome == null){
        echo "<b style='color:red'>Insira um nome</b>";
        exit();
    }
    
    if ($sobrenome == "" || $sobrenome == null){
        echo "<b style='color:red'>Insira um sobrenome</b>";
        exit();
    }
    
    if ($telefone == "" || $telefone == null){
        echo "<b style='color:red'>Insira um telefone</b>";
        exit();
    }
    
    if ($email == "" || $email == null){
        echo "<b style='color:red'>Insira um email</b>";
        exit();
    }
    
    if ($banco == "" || $banco == null){
        echo "<b style='color:red'>Insira um banco</b>";
        exit();
    }
    
    if ($cep == "" || $cep == null){
        echo "<b style='color:red'>Insira um cep</b>";
        exit();
    }
    
    if ($endereco == "" || $endereco == null){
        echo "<b style='color:red'>Insira um endereço</b>";
        exit();
    }
    
    if ($cidade == "" || $cidade == null){
        echo "<b style='color:red'>Insira um cidade</b>";
        exit();
    }
    
    if ($logradouro == "" || $logradouro == null){
        echo "<b style='color:red'>Insira um logradouro</b>";
        exit();
    }
    
    //validaçao de nome e email

    if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        echo "<b style='color:red'>Somente permitido letras e espaços em branco para o nome</b>";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<b style='color:red'>Formato de email inválido!</b>";
        exit();
    }

    //comando para atualizar
    $sql = $pdo->prepare("UPDATE tblClientes SET cpf=?, nome=?, sobrenome=?, telefone=?, email=?, banco=?, cep=?, endereco=?, cidade=?, logradouro=? WHERE id=?");
    $sql->execute(array($cpf,$nome,$sobrenome,$telefone,$email,$banco,$cep,$endereco,$cidade,$logradouro,$id));

    echo "Atualizado ".$sql->rowCount()." registros!";

}

//deletar dados
if(
    isset($_POST['deletar']) && 
    isset($_POST['id_deleta']) &&
    isset($_POST['cpf_deleta']) && 
    isset($_POST['nome_deleta']) &&
    isset($_POST['sobrenome_deleta']) && 
    isset($_POST['telefone_deleta']) &&  
    isset($_POST['email_deleta']) &&
    isset($_POST['banco_deleta']) && 
    isset($_POST['cep_deleta']) && 
    isset($_POST['endereco_deleta']) && 
    isset($_POST['cidade_deleta']) && 
    isset($_POST['logradouro_deleta'])
    ){
    
    $id=limpaPost($_POST['id_deleta']);
    $cpf=limpaPost($_POST['cpf_deleta']);
    $nome=limpaPost($_POST['nome_deleta']);
    $sobrenome=limpaPost($_POST['sobrenome_deleta']);
    $telefone=limpaPost($_POST['telefone_deleta']);
    $email=limpaPost($_POST['email_deleta']); 
    $banco=limpaPost($_POST['banco_deleta']);
    $cep=limpaPost($_POST['cep_deleta']);
    $endereco=limpaPost($_POST['endereco_deleta']);
    $cidade=limpaPost($_POST['cidade_deleta']);
    $logradouro=limpaPost($_POST['logradouro_deleta']);

    //comando para deletar     
    $sql = $pdo->prepare("DELETE FROM tblClientes WHERE id=? AND cpf =? AND nome=? AND sobrenome=? AND telefone=? AND email=? AND banco=? AND cep=? AND endereco=? AND cidade=? AND logradouro=?");
    $sql->execute(array($id, $cpf, $nome, $sobrenome, $telefone, $email, $banco, $cep, $endereco, $cidade, $logradouro));

    echo "Deletado com sucesso!";

}

//seleciona dados na tabela
$sql = $pdo->prepare("SELECT * FROM tblvendas");
$sql->execute();
$dados = $sql->fetchAll();


//verifica se existem dados na tabela
if(count($dados) > 0){
    //constroi a parte superior da tabela
    echo "<br><br><table>
    <tr>
        <th>CPF</th>
        <th>DataPagamento</th>
        <th>OrdemServico</th>
        <th>OrdemVenda</th>
        <th>Preco</th>
    </tr>";

    //laço de repetiçao para adiçao de linha
    foreach($dados as $chave => $valor){
        echo " <tr>
            <td>".$valor['CPF']."</td>
            <td>".$valor['DataPagamento']."</td>
            <td>".$valor['OrdemServico']."</td>
            <td>".$valor['OrdemVenda']."</td>
            <td>".$valor['Preco']."</td>
            <td><a href='#' class='btn-atualizar' data-CPF='".$valor['CPF']."' data-DataPagamento='".$valor['DataPagamento']."' data-OrdemServico='".$valor['OrdemServico']."' data-OrdemVenda='".$valor['OrdemVenda']."' data-Preco='".$valor['Preco']."'>Deletar</a></td>
       </tr>";
    }

    //fecha tabela
    echo "</table>";
}else{
    //caso a tabela n tenha dados
    echo "<p>Nenhum cliente cadastrado</p>";
}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(".btn-atualizar").click(function(){
            var CPF = $(this).attr('data-CPF');
            var cpf = $(this).attr('data-cpf');
            var nome =  $(this).attr('data-nome');
            var sobrenome =  $(this).attr('data-sobrenome');
            var telefone =  $(this).attr('data-telefone');
            var email = $(this).attr('data-email');
            var banco =  $(this).attr('data-banco');
            var cep =  $(this).attr('data-cep');
            var endereco =  $(this).attr('data-endereco');
            var cidade =  $(this).attr('data-cidade');
            var logradouro =  $(this).attr('data-logradouro');

            $('#form_salva').addClass('oculto');
            $('#form_atualiza').removeClass('oculto');

            $("#id_editado").val(id);
            $("#cpf_editado").val(cpf);
            $("#nome_editado").val(nome);
            ("#sobrenome_editado").val(sobrenome);
            ("#telefone_editado").val(telefone);
            $("#email_editado").val(email);
            ("#banco_editado").val(banco);
            ("#cep_editado").val(cep);
            ("#endereco_editado").val(endereco);
            ("#cidade_editado").val(cidade);
            ("#logradouro_editado").val(logradouro);

        });

        $('#cancelar').click(function(){
            $('#form_salva').removeClass('oculto');
            $('#form_atualiza').addClass('oculto');
        });

        $(".btn-deletar").click(function(){
            var id = $(this).attr('data-id');
            var cpf = $(this).attr('data-cpf');
            var nome =  $(this).attr('data-nome');
            var sobrenome =  $(this).attr('data-sobrenome');
            var telefone =  $(this).attr('data-telefone');
            var email = $(this).attr('data-email');
            var banco =  $(this).attr('data-banco');
            var cep =  $(this).attr('data-cep');
            var endereco =  $(this).attr('data-endereco');
            var cidade =  $(this).attr('data-cidade');
            var logradouro =  $(this).attr('data-logradouro');

            $("#id_deleta").val(id);
            $("#cpf_deleta").val(cpf);
            $("#nome_deleta").val(nome);
            $("#sobrenome_deleta").val(sobrenome);
            $("#telefone_deleta").val(telefone);
            $("#email_deleta").val(email);
            $("#banco_deleta").val(banco);
            $("#cep_deleta").val(cep);
            $("#endereco_deleta").val(endereco);
            $("#cidade_deleta").val(cidade);
            $("#logradouro_deleta").val(logradouro);
            $("#cliente").html(nome);           

            $('#form_salva').addClass('oculto');
            $('#form_atualiza').addClass('oculto');  
            $('#form_deleta').removeClass('oculto');          

        });

        $('#cancelar').click(function(){
            $('#form_salva').removeClass('oculto');
            $('#form_atualiza').addClass('oculto');
            $('#form_deleta').addClass('oculto');
        });

        $('#cancelar_delete').click(function(){
            $('#form_salva').removeClass('oculto');
            $('#form_atualiza').addClass('oculto');
            $('#form_deleta').addClass('oculto');
        });
    </script>         

</body>
</html>

2147483647
1
0000-00-00
0000-00-00
1
iniciado
auxilio

