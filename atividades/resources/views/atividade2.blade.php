<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
    </head>

    <script>
    function consultaUsuario(usuario) {

        if (usuario==='') {
            $('#divUsuario').html('')
            alert('Campo vazio.')
        }else{
            var uri = "/consultausuario/"+usuario
            fetch(uri)

                .then(function (response) {
                    return response.text()
                })
                .then(function (text) {
                        try {
                            erro = JSON.parse(text)
                                if (erro.message) {
                                    $('#divUsuario').html('')
                                    alert(erro.message)
                                    return
                                }
                        } catch (error) {}
                    $('#divUsuario').html(text)
                })
                .catch(function (error) {
                    alert('Ocorreu algum erro:: ' + error.message)
                    throw error
                })
        }
    }  
        $(document).keypress(function(e) {
            if(e.which == 13) $('#enter').click();
        });
    </script>

    <style>
    </style>

<body>
    <div class="container">
        <br>
        
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquise o Usuario" id="usuario" aria-label="Pesquise o Usuario" aria-describedby="basic-addon2">
            <button type="button" class="btn btn-primary" id="enter" onclick="javascript:consultaUsuario($('#usuario').val())">Pesquisar</button>
        </div>
        <br>

        <div id="divUsuario">
        </div>
        
    </div>
</body>
</html>