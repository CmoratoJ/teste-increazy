# ☄ Proposta do projeto
> Nesse teste será proposta a criação de uma API para realizar a consulta de vários CEPs no ViaCEP e fazer o retorno dos dados da maneira proposta.

# ⚡️ Como Instalar

- Acesse algum diretório de sua preferência e baixe o projeto, usando:
```
git clone https://github.com/CmoratoJ/teste-increazy.git
```
- Acesse o diretório teste-increazy:
```
cd teste-increazy/  
```
- Agora que os arquivos foram devidamente baixados para o seu diretório, execute os comandos abaixo para isntalar as dependências do projeto e onfigurar o seu arquivo .env com base no arquivo .env.example:
```
composer install
```
```
cp .env.example .env
```
- Após realizar a instalação das dependências execute os seguintes comandos
```
php artisan key:generate
```
```
php artisan migrate --seed
```
```
php artisan serve
```

- Acesse a rota http://localhost:8000/search/local/17560246




