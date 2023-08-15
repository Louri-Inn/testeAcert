# Teste Grupo Acert.

Nesse documento teremos informações de como rodar as aplicações e passo a passo do que cada atividade do teste faz.

## Instalação

Antes de rodar a aplicação em laravel rodar o seguinte comando no terminal na pasta raiz do projeto.

	composer install

Após atualizar as dependencias para testar a aplicação rodar o comando abaixo.

	php artisan serve

## Virtual Host

Para rodar o projeto no apache siga os seguintes passos:

- 1 - Criar o vitual host com o nome de atividades.conf na pasta /etc/apache2/sites-available com o seguinte conteudo:

		<VirtualHost *:80>
			ServerAdmin dashboard@localhost
			ServerName atividades
			ServerAlias www.atividades
			DocumentRoot /var/www/atividades/public
			<Directory /var/www/atividades/public>
				Options -Indexes +FollowSymLinks +MultiViews
				AllowOverride All
				Require all granted
			</Directory>
			ErrorLog ${APACHE_LOG_DIR}/error.log
			CustomLog ${APACHE_LOG_DIR}/access.log combined
		</VirtualHost>

- 2 - Vá ao etc/hosts e coloque o codigo abaixo.

		127.0.0.1	atividades

- 3 - Rode os dois comandos abaixo em console root.

		a2ensite atividades.conf
		service apache2 restart0

# Passo a passo
Abaixo segue como cada atividade se comporta quando a aplicação é rodada.

Para aquelas atividades que tenham mais de um arquivo foi separado para explicar melhor a utilidade de cada arquivo e como se comportam.

# Atividade 1
## atividade1.html
- 1 - Quando o site atividade1.html é aberto, ele já começa lendo o Script Function, a aplicação acessa a rota pelo var uri e entra em fetch.
- 2 - O primeiro then serve para apontar o tipo de reposta que desejo ter, nesse caso um json.
- 3 - O segundo then é para quando receber um json fazer determinada função, nesse caso a função console log que guarda e mostra as informações recebidas dentro do console do próprio navegador.
- 4 - O catch está a apontar o que a aplicação deve fazer caso não receba esse json ou algum erro de conexão com a rota aconteça.
- 5 - Após ler toda parte do function ele retorna para document.addEventListener que está rodando toda essa função e conecta.
- 6 - A Atividade deu erro CORS pelo Fetch não ter permissão de segurança dentro da API BuscaCEP, o ideal seria fazer essa requisição via backend pelo cURL, sendo assim é inviavel rodar a aplicação como a atividade solicita.

# Atividade 2
A atividade 2 é composta por três arquivos com as seguintes funções.

atividade2Controller é por onde a aplicação faz a conexão com o gitHub e formata as informações buscadas.

atividade2.blade é o arquivo que liga os outros dois, faz as consultas de usuarios e verificações de erros.

usuarios.blade é a parte visual da aplicação, que gera a tabela com as informações consultadas e validadas.

## atividadesController.php

- 1 - Ao pesquisar um usuario a public function consultaUsuario no atividadesController se conecta ao github via cURL
- 2 - Antes de mostrar a informação de data e hora para o usuario ambas são formatas do padrão americano para o padrão brasileiro pelo private function formataData.
- 3 - Quando tudo estiver correto e formato o controller retorna o usuarios.blade.php para visualização.

## atividade2.blade.php

- 1 - Caso não tenha nada escrito no formulario, já é retornado uma mensagem de campo vazio.
- 2 - Após fazer essa verificação de campo vazio, a programação entra em Fetch consultando o usuario escrito no formulario.
- 2.2 - Aqui é feito outra verificação caso o usuario seja invalido, onde já é retornado uma mensagem de erro.
- 2.3 - Caso não tenha nenhuma informação valida a tabela apaga a pesquisa anterior.
- 3 - Abaixo foi montado um keypress, quando a tecla enter for apertada o botão pesquisar é clickado automaticamente.

## usuarios.blade.php

- 1 - Aqui é onde é montado a tabela visual para o cliente.

# Atividade 3
A atividade 3 foi composta por dois arquivos, a parte visual já imbutida no blade original segue abaixo funções.

ativiade3Controller é por onde a aplicação conecta ao viacep por um cURL e faz as correções no cep informado para pesquisar mais de um por vez.

atividade3.blade é toda a parte visual e funcional da aplicação, incluindo a função de exportar as tables de acordo com a pesquisa do usuario.

## atividade3Controller

- 1 - Ao iniciar a public function consultaCep é iniciado a tratativa do cep usando trim e explode para remover as virgulas da pesquisa.
- 2 - Após a tratativa e conexão via cURL ele entra em um elo de repetição para separar os ceps e preencher cada linha da tabela para o CEP especifico.
- 3 - Envia as tudo para o atividade3.blade.php

## atividade3.blade

- 1 - Em tela apresenta 3 botões e o formulário de busca.
- 2 - Após pesquisar um CEP a programação entra em Fetch fazendo as verificações e caso algo esteja errado já é devolvido para o usuario uma mensagem de erro.
- 2.2 - Assim que estiver tudo correto a programação passa para a montagem da tabela.
- 3 - Caso o cliente click no botão de exportar, é ativado a função que verifica a tabela pegando os TH (titúlos) e TD (informações), transformando a tabela em um arquivo CSV, com o nome "atividade3.csv", criando um link e fazendo o download.
- 4 - Abaixo fica a keypress para ativar o pesquisar pela tecla enter.
