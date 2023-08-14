<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <style>
        .formulario{
            width: auto;
            align-items: center;
        }
        tr{
            border: 1px solid whitesmoke;
        }
        th{
            border: 1px solid whites;
        }
    </style>

<body>
    <div class="container">
        
        <table class="table table-borderless table-dark formulario">
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
        <tbody>
                <tr>
                        <td> 1 </td>
                        <td> {{$apiViaCep->cep}} </td>
                        <td> {{$apiViaCep->logradouro}} </td>
                        <td> {{$apiViaCep->complemento}} </td>
                        <td> {{$apiViaCep->bairro}} </td>
                        <td> {{$apiViaCep->localidade}} </td>
                        <td> {{$apiViaCep->uf}} </td>
                        <td> {{$apiViaCep->ibge}} </td>
                        <td> {{$apiViaCep->ddd}} </td>
                        <td> {{$apiViaCep->siafi}} </td>        
                </tr>
        </tbody>
        </table>
    </div>
</body>
</html>