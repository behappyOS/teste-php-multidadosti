# Teste PHP Multidadosti

Este projeto é um painel administrativo desenvolvido em **PHP puro** com **frontend dinâmico** e **consultas assíncronas via AJAX (jQuery)**, focado em tarefas de manipulação de dados e renderização dinâmica de interface. Ideal para testes técnicos e demonstração de conhecimentos em PHP procedural, organização de código e uso de Docker.

## Funcionalidades

- Dashboard com cards dinâmicos que mostram total de Clientes, Usuários e Fornecedores.
- Tabela dinâmica que muda conforme o botão “Visualizar” clicado.
- Alteração de cor da tabela com base na cor da caixa clicada.
- Consulta de dados via AJAX com retorno em JSON.
- Menu lateral dinâmico gerado por array PHP.
- Layout modularizado usando includes (`cabecalho.php`, `menu.php`, `rodape.php`).
- Pronto para rodar via **Docker**.

## Tecnologias Utilizadas

- PHP 8.1
- HTML5 + CSS3 + Bootstrap 3
- Font Awesome
- JavaScript + jQuery
- Docker & Docker Compose
- Apache HTTP Server

## Estrutura do Projeto

```
raiz
├── DataRequest.php             # Classe com os dados simulados
├── fetch_data.php             # Endpoint AJAX para retornar dados
├── index.php                  # Página principal do dashboard
├── includes/
│   ├── cabecalho.php          # Cabeçalho HTML
│   ├── menu.php               # Menu lateral dinâmico
│   └── rodape.php             # Rodapé HTML
├── assets/                    # Imagens, CSS, JS e fontes
├── Dockerfile                 # Imagem personalizada com Apache + PHP
├── docker-compose.yml         # Orquestração com volume e porta
└── .idea/                     # Configurações do IntelliJ (opcional)
```

## Como Executar o Projeto com Docker

### Pré-requisitos

- [Docker](https://www.docker.com/) instalado
- [Docker Compose](https://docs.docker.com/compose/install/) instalado

### 1. Clone o repositório

```bash
git clone https://github.com/behappyOS/teste-php-multidadosti.git
cd teste-php-multidadosti
```

### 2. Suba o ambiente

```bash
docker-compose up --build
```

### 3. Acesse o sistema

Abra o navegador e vá até:

```
http://localhost:8080
```

Você verá a dashboard com os cards e tabela funcionando dinamicamente.

## Scripts Importantes

- `fetch_data.php`: Endpoint que serve os dados da `DataRequest` em formato JSON.
- `index.php`: Renderiza a tela com base nos dados da classe e responde aos eventos AJAX.

## Requisitos Atendidos

- [x] Menu dinâmico gerado a partir de array
- [x] Dashboard com contadores dinâmicos
- [x] Integração com AJAX para popular tabela
- [x] Mudança de cor dinâmica da tabela com JavaScript
- [x] Estrutura limpa e reutilizável
- [x] Compatível com Docker

## Autor

Desenvolvido por [Gabriel Felicissimo](https://github.com/behappyOS) como parte de um teste técnico.

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).