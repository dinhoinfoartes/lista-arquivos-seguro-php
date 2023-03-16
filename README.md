# lista-arquivos-seguro-php
Esse código é um projeto que implementa a listagem de arquivos em um servidor web de forma segura, utilizando o protocolo de autenticação HTTP Basic.
O projeto é uma alternativa aos arquivos de listagem de servidores como WampServer, XAMPP e Laragon, sendo fácil de usar e personalizar.


##DESCRIÇÃO

Este projeto foi criado para facilitar a visualização e gerenciamento de servidores web em um ambiente local, especialmente para aqueles que não gostam dos arquivos de listagem de servidores convencionais. Ao usar este projeto, os usuários podem personalizar a aparência da lista de servidores, adicionando ícones, descrições e outras informações relevantes.

Este projeto utiliza tecnologias como PHP, HTML, CSS e JavaScript para criar uma interface intuitiva e responsiva. Ele pode ser facilmente integrado com outros sistemas e ferramentas de desenvolvimento web, tornando-se uma opção versátil e eficiente para quem precisa gerenciar servidores em um ambiente local.


##RECURSOS DO SCRIPT

Lista os arquivos do diretório onde ele está;

O código usa funções nativas do PHP, como 'scandir' para obter a lista de arquivos e diretórios e 'mime_content_type' para obter o tipo MIME de cada arquivo.

Os arquivos são listados com seus respectivos icones.

Os icones são gerados automaticamente através da biblioteca Font Awesome.

Exibe o 'mime_type' do arquivo.


##SEGURANÇA

Usuário e Senha são: **admim** (pode ser alterado nas linhas 3 e 4 respectivamente).

Utiliza o protocolo de autenticação HTTP Basic.

**Se for acessado de qualuqer lugar da rede interna ou externa fora do computador local terá que inserir usuário e senha**.

Se acessado em ambiente local (localhost, 127.0.0.1) não necessita entrar com usuário e senha.


##INSTALAÇÃO

O processo de instalação é simples e rápido, basta baixar o arquivo e colocar no diretório principal do seu servidor (httpdocs, www, ...). Se preferir pode renomeá-lo para **"index.php"** (fazendo uma cópia de segurança do arquivo original).

Em seguida, é possível acessar a lista de servidores no navegador, através do endereço "localhost" ou "127.0.0.1" (adicione a porta se necessário).


##CONCLUSÃO
Em resumo, o projeto de Listagem de Servidores Alternativo é uma solução prática e personalizável para visualizar e gerenciar servidores web em um ambiente local, oferecendo uma experiência mais agradável e eficiente do que as opções convencionais disponíveis no mercado.
