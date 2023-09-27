<style type="text/css">

    </style>


        <!DOCTYPE html>
<html lang="pt">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">    


<script>
    
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
          
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulario_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('endereco').value="...";
                document.getElementById('bairro').value="...";
               // document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";
              

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    };

    </script>
    <title>Ficha Cadastral</title>
</head>
<body>




<style type="text/css"> 

.form-label
{
  font-family: aktiv-grotesk;
}
.img_logo
{
    width: auto;
    max-width: 100%;
    max-height: 80px;
}
h3{
  margin-top: 20px;
  color: #F48232;
  font-family: aktiv-grotesk;
  text-align: center;
}
h5{
  margin-top: 20px;
  color: #F48232;
  font-family: aktiv-grotesk;
  text-align: center;
}
.form-control
{
  border:2px solid #39783B;

}
.form-check-input
{
  border:2px solid #39783B;

}

</style>


<div class="container">
  <br><Br><br><br>
<CENTER>
  <img class="img_logo" src="citrus-long.jpg"> 
</CENTER>
  <br>
  <h3>FICHA CADASTRAL</h3>
  <hr> 

<br>

<div  name="cadastro" id="cadastro" data-label="cad_nascional">
<form class="form" action="" method="post" > 

  <label for="exampleFormControlInput1" class="form-label">RAZÃO SOCIAL</label>
  <input type="text" class="form-control" name="razao" id="exampleFormControlInput1">
  <label for="exampleFormControlInput1" class="form-label">NOME FANTASIA</label>
  <input type="text" class="form-control" name="fantasia" id="exampleFormControlInput1">
  <div class="row">
   
  <div class="col-md-2">
    <label for="exampleFormControlInput1" class="form-label">CEP</label>
  <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);">
  </div>
  <div class="col-md-8">
  <label for="exampleFormControlInput1" class="form-label">ENDEREÇO</label>
  <input type="text" class="form-control" name="endereco" id="endereco">
</div>
 
<div class="col-md-2">
    <label for="exampleFormControlInput1" class="form-label">NUMERO</label>
  <input type="text" class="form-control" name="NUMERO" id="exampleFormControlInput1">
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">BAIRRO</label>
  <input type="text" class="form-control" name="bairro" id="bairro">
  </div>
  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">CIDADE</label>
  <input type="text" class="form-control" name="cidade" id="cidade">
  </div>

  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">ESTADO</label>
  <input type="text" class="form-control" name="estado" id="estado">
  </div>
  <div class="col-md-3">
    <label for="exampleFormControlInput1" class="form-label">CNPJ</label>
  <input type="text" class="form-control" name="cnpj" id="cnpj">
  </div>
  <div class="col-md-3">
    <label for="exampleFormControlInput1" class="form-label">IE</label>
  <input type="text" class="form-control" name="ie" id="ie">
  </div>
  <div class="col-md-3">
    <label for="exampleFormControlInput1" class="form-label">TELEFONE</label>
  <input type="text" class="form-control" name="telefone" id="telefone">
  </div>
  <div class="col-md-3">
    <label for="exampleFormControlInput1" class="form-label">CELULAR</label>
  <input type="text" class="form-control" name="celular" id="celular">
  </div>
  <div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">E-MAIL</label>
  <input type="email" class="form-control" name="email" id="email">
  </div>
  <div class="col-md-6">
    <label for="exampleFormControlInput1" class="form-label">E-MAIL PARA ENVIO DE XML</label>
  <input type="email" class="form-control" name="xml" id="xml">
  </div>
</div>
  
  <h5>ENDEREÇO DE COBRANÇA</h5>
  <hr>

  <!-- endereço de cobrança  -->
<DIV CLASS="row">
<div class="col-md-2">
    <label for="exampleFormControlInput1" class="form-label">CEP</label>
    <input type="text" class="form-control" name="cep" >
</div>
<div class="col-md-8">
    <label for="exampleFormControlInput1" class="form-label">ENDEREÇO</label>
    <input type="text" class="form-control" name="endereco" >
</div>
<div class="col-md-2">
    <label for="exampleFormControlInput1" class="form-label">NUMERO</label>
    <input type="text" class="form-control" name="NUMERO" >
</div>
<div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">BAIRRO</label>
    <input type="text" class="form-control" name="bairro" >
</div>
<div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">CIDADE</label>
    <input type="text" class="form-control" name="cidade" >
</div>

  <div class="col-md-4">
    <label for="exampleFormControlInput1" class="form-label">ESTADO</label>
  <input type="text" class="form-control" name="estado">
  </div>
</div>
  <!--CADASTRO TIPO DE CLIENTE-->
  <br>
  <div class="row">
  <label for="exampleFormControlInput1" class="form-label">TIPO</label>
  <div class="col-md-2">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="consumidor" >
  <label class="form-label" for="flexRadioDefault1">
    CONSUMIDOR FINAL
  </label>
</div>
</div>
<div class="col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault"  value="produtor" >
  <label class="form-label" for="flexRadioDefault2">
    PRODUTOR RURAL
  </label>
</div>
</div>
<div class="col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="revendedor"  >
  <label class="form-label" for="flexRadioDefault2">
    REVENDEDOR
  </label>
</div>
</div>
<div class="col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="solidario"  >
  <label class="form-label" for="flexRadioDefault2">
    SOLIDÁRIO
  </label>
</div>
</div>
<div class="col-md-2">
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" value="exportacao">
  <label class="form-label" for="flexRadioDefault2">
    EXPORTAÇÃO
  </label>
</div>
</div>
</div>
<hr>
<label for="exampleFormControlInput1" class="form-label">REFERÊNCIA BANCARIA</label>
<div class="row">
  <textarea class="form-control" placeholder="Ex: Banco: Brasil Conta: xxxxxx-x Agencia: xxxx-x" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <hr>

<h5>CONTATO RESPONSÁVEL</h5>
  <div class="row">
  <div class="col-md-3">
  <label for="exampleFormControlInput1" class="form-label">NOME</label>
<input type="text" class="form-control" name="nome" id="nome">
</div>
<div class="col-md-3">
  <label for="exampleFormControlInput1" class="form-label">E-MAIL</label>
<input type="email" class="form-control" name="email" id="email">
</div>
  <div class="col-md-3">
  <label for="exampleFormControlInput1" class="form-label">TELEFONE</label>
<input type="text" placeholder="Ex: +55169999-9999" class="form-control" name="telefone" id="telefone">
</div>
  </div>

  <label for="exampleFormControlInput1" class="form-label">OBSERVAÇÕES</label>
  <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3"></textarea>
</form>
</div>
</div>

</body>
</html>
