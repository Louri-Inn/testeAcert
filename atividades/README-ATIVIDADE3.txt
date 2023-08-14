atividade3.blade.php

    1 - Em tela apresenta 3 botões e o formulário de busca.
    2 - Após pesquisar um CEP a programação entra em Fetch fazendo as verificações e caso algo esteja errado já é devolvido para o usuario uma mensagem de erro.
    2.2 - Assim que estiver tudo correto a programção passa para a montagem da tabela.
    3 - Caso o cliente click no botão de exportar é ativado a função que verifica a tabela pegando as TH (titúlos) e TD (informações) transformando em um
    arquivo CSV, com o nome "atividade3.csv", criando um link e fazendo o download.
    4 - Abaixo fica a keypress para ativar o pesquisar pela tecla enter.
    5 - Nessa atividade a tabela já está inclusa neste blade.php internamente.

atividade3Controller.php

    1 - Ao iniciar a public function consultaCep é iniciado a tratativa do cep usando trim e explode para remover as virgulas da pesquisa.
    2 - Após a tratativa e conexão via cURL ele entra em um elo de repetição para separar os ceps e preencher cada linha da tabela para o CEP especifico.
    3 - Envia as tudo para o atividade3.blade.php