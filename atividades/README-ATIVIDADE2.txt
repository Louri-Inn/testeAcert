atividadesController.php

	1 - Ao pesquisar um usuario a public function consultaUsuario no atividadesController se conecta ao github via cURL

	2 - Antes de mostrar a informação de data e hora para o usuario ambas são formatas do padrão americano para o padrão brasileiro pelo private function formataData.

	3 - Quando tudo estiver correto e formato o controller retorna o usuarios.blade.php para visualização.

atividade2.blade.php

	1 - Caso não tenha nada escrito no formulario, já é retornado uma mensagem de campo vazio.

	2 - Após fazer essa verificação de campo vazio, a programação entra em Fetch consultando o usuario escrito no formulario.

	2.2 - Aqui é feito outra verificação caso o usuario seja invalido, onde já é retornado uma mensagem de erro.

	2.3 - Caso não tenha nenhuma informação valida a tabela apaga a pesquisa anterior.

	3 - Abaixo foi montado um keypress, quando a tecla enter for apertada o botão pesquisar é clickado automaticamente.

usuarios.blade.php

	1 - Aqui é onde é montado a tabela visual para o cliente.