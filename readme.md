Para rodar o projeto é necessário a instalação do apache para criação de um servidor web local, o PHP na sua verão 8.3.x e o MySQL.

Recomendo a instalação do XAMPP pois ele ja faz todo esse processo pra ti.

1 - Acessar o diretório do projeto e rodar o comando 'composer install'

2 - Após instalar todas as dependências do projeto, é necessário rodas as migrações (php artisan migrate --seed) para a criação das tabelas no banco de dados juntamente com o comando -- seed para criar os seeds do projeto

3 - Rodar o 'php artisan serve' para disponibilizar as rotas para o seu endereço ipv4 (locahost);

após isso as APIS ja estarão funcionando devidamente prontas para serem consumidas pelo app.

repositório do front-end: https://github.com/Lucaseduardo20/solidarizame-frontend


