<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <style>
                .formulario{
                    width: auto;
                    align-items: center;
                }
                tr{
                    border: 1px solid whitesmoke;
                }
                th{
                    border: 1px solid whites
                }
            </style>
            <script>
                function consultacep(cep){

                    var uri = "/consultacep"
                    var requestInfo = {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json",
                            'X-CSRF-TOKEN': $("[name='_token']").val()
                        },
                        body: JSON.stringify({"cep" : cep})
                    }
                    fetch(uri,requestInfo)
                        .then(function (response) {
                            return response.json()
                        })
                        .then(function (json) {
                            //escrever a logica de tratamento dos dados recebidos            
                            var dados = json
                            if (dados.erro) {
                                swal({
                                title: 'Mensagem!',
                                text: 'CEP NÃO EXISTE',
                                icon: 'warning'
                            }).then(function (value) {
                            })
                            return
                            }
                            var tabela = ''
                            num = 0
                            for (let j = 0; j < dados.length; j++) {
                                num++
                                tabela += '<tr><th scope="row">'+num+'</th>'+
                                '<td>'+dados[j].cep+'</td>'+
                                '<td>'+dados[j].logradouro+'</td>'+
                                '<td>'+dados[j].complemento+'</td>'+
                                '<td>'+dados[j].bairro+'</td>'+
                                '<td>'+dados[j].localidade+'</td>'+
                                '<td>'+dados[j].uf+'</td>'+
                                '<td>'+dados[j].ibge+'</td>'+
                                '<td>'+dados[j].gia+'</td>'+
                                '<td>'+dados[j].ddd+'</td>'+
                                '<td>'+dados[j].siafi+'</td></tr>'
                            }
                            $('.formulario').prop('hidden', false)
                            $('#valoresCep').html(tabela)

                        })
                        .catch(function (error) {
                            alert('Ocorreu algum erro:: ' + error.message)
                            throw error
                        })

                }
                function exportar() {

                    var titles = [];
                    var data = [];
                    
                            $('.table tr').each(function() {
                                    data.push($(this));
                                });

                        csv_data = []

                    data.forEach(function(item,index){
                        td = item[0].children
                        for(i=0;i<td.length;i++){
                        
                        csv_data.push(td[i].innerText)
                        }
                    
                        csv_data.push('\r\n')
                    })

                        var downloadLink = document.createElement("a");
                        var blob = new Blob(["\ufeff", csv_data]);
                        var url = URL.createObjectURL(blob);
                        downloadLink.href = url;
                        downloadLink.download = "atividade3.csv";
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    }
        $(document).keypress(function(e) {
            if(e.which == 13) $('#enter').click();
        });

                    
            </script>
    </head>

<body>
    <div class="container">
    
    <br>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquise seu CEP, separe-os por virgula." id="cep" aria-label="Pesquise seu CEP" aria-describedby="basic-addon2">
            <button type="button" class="btn btn-primary" id="enter" onclick="javascript:consultacep($('#cep').val())">Pesquisar</button>
            <button type="button" class="btn btn-primary" onclick="exportar()">Exportar</button>
            <button type="button" class="btn btn-primary" onclick="$('#valoresCep').html(''), $('.formulario').prop('hidden', true) ">Limpar</button>
        </div>
    @csrf
        <br>
        <table class="table table-borderless table-dark formulario" hidden>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CEP</th>
                <th scope="col">LOGRADOURO</th>
                <th scope="col">COMPLEMENTO</th>
                <th scope="col">BAIRRO</th>
                <th scope="col">LOCALIDADE</th>
                <th scope="col">UF</th>
                <th scope="col">IBGE</th>
                <th scope="col">GIA</th>
                <th scope="col">DDD</th>
                <th scope="col">SIAFI</th>
            </tr>
        </thead>
        <tbody id="valoresCep">
        </tbody>
        </table>
    </div>
</body>
</html>