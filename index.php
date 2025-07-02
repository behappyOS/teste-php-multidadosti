<?php
require_once 'DataRequest.php';

$dataRequest = new DataRequest();
$clientes = $dataRequest->dadosClientes('c');
$usuarios = $dataRequest->dadosUsuarios('c');
$fornecedores = $dataRequest->dadosFornecedores('c');
?>

<?php include 'includes/cabecalho.php'; ?>
<?php include 'includes/menu.php'; ?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title">
            Dashboard <small>tudo que você precisa à um click.</small>
        </h3>

        <div class="row">
            <!-- CARD 1 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat blue">
                    <div class="visual"><i class="fa fa-shopping-cart"></i></div>
                    <div class="details">
                        <div class="number"><?= $clientes ?></div>
                        <div class="desc">Clientes</div>
                    </div>
                    <a class="more" href="#" id="btn-clientes">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat green">
                    <div class="visual"><i class="fa fa-group"></i></div>
                    <div class="details">
                        <div class="number"><?= $usuarios ?></div>
                        <div class="desc">Usuários</div>
                    </div>
                    <a class="more" href="#" id="btn-usuarios">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat purple">
                    <div class="visual"><i class="fa fa-globe"></i></div>
                    <div class="details">
                        <div class="number"><?= $fornecedores ?></div>
                        <div class="desc">Fornecedores</div>
                    </div>
                    <a class="more" href="#" id="btn-fornecedores">Visualizar <i class="m-icon-swapright m-icon-white"></i></a>
                </div>
            </div>
        </div>

        <!-- TABELA -->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box grey" id="tabelaSimples">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-folder-open"></i>Tabela Simples</div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Usuário</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr><td>1</td><td>Mark</td><td>Otto</td><td>makr124</td><td><span class="label label-success">Aprovado</span></td></tr>
                                <tr><td>2</td><td>Jacob</td><td>Nilson</td><td>jac123</td><td><span class="label label-info">Pendente</span></td></tr>
                                <tr><td>3</td><td>Larry</td><td>Cooper</td><td>lar</td><td><span class="label label-warning">Suspenso</span></td></tr>
                                <tr><td>4</td><td>Sandy</td><td>Lim</td><td>sanlim</td><td><span class="label label-danger">Bloqueado</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Função para mudar cor da tabela
    function mudarCorTabela(cor) {
        const tabela = document.getElementById("tabelaSimples");
        tabela.classList.remove("blue", "green", "purple", "grey"); // remove cores antigas
        tabela.classList.add(cor);
    }

    // Função para atualizar o cabeçalho da tabela conforme o tipo
    function atualizarCabecalho(tipo) {
        let theadHtml = '';
        switch(tipo) {
            case 'clientes':
                theadHtml = `
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                    </tr>
                `;
                break;
            case 'usuarios':
                theadHtml = `
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Usuário</th>
                        <th>Telefone</th>
                    </tr>
                `;
                break;
            case 'fornecedores':
                theadHtml = `
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                    </tr>
                `;
                break;
        }
        $('table.table-hover thead').html(theadHtml);
    }

    // Função para atualizar o corpo da tabela com dados recebidos
    function atualizarTabela(dados, tipo) {
        let tbody = '';

        if (!dados || dados.error) {
            tbody = `<tr><td colspan="5" style="text-align:center;">Nenhum dado disponível</td></tr>`;
        } else {
            dados.forEach((item, index) => {
                if (tipo === 'clientes') {
                    tbody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.nome || ''}</td>
                                <td>${item.cpf || ''}</td>
                                <td>${item.telefone || ''}</td>
                                <td>${item.email || ''}</td>
                              </tr>`;
                } else if (tipo === 'usuarios') {
                    tbody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.nome || ''}</td>
                                <td>${item.endereco || ''}</td>
                                <td>${item.usuario || ''}</td>
                                <td>${item.telefone || ''}</td>
                              </tr>`;
                } else if (tipo === 'fornecedores') {
                    tbody += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.nome || ''}</td>
                                <td>${item.cidade || ''}</td>
                                <td>${item.cpf || ''}</td>
                                <td>${item.email || ''}</td>
                              </tr>`;
                }
            });
        }

        $('table.table-hover tbody').html(tbody);
    }

    // Manipuladores de clique nos botões Visualizar
    $('#btn-clientes').click(function(e) {
        e.preventDefault();
        mudarCorTabela('blue');
        atualizarCabecalho('clientes');
        $.ajax({
            url: 'fetch_data.php',
            method: 'GET',
            data: { tipo: 'clientes' },
            dataType: 'json',
            success: function(data) {
                atualizarTabela(data, 'clientes');
            },
            error: function() {
                alert('Erro ao buscar dados dos clientes.');
            }
        });
    });

    $('#btn-usuarios').click(function(e) {
        e.preventDefault();
        mudarCorTabela('green');
        atualizarCabecalho('usuarios');
        $.ajax({
            url: 'fetch_data.php',
            method: 'GET',
            data: { tipo: 'usuarios' },
            dataType: 'json',
            success: function(data) {
                atualizarTabela(data, 'usuarios');
            },
            error: function() {
                alert('Erro ao buscar dados dos usuários.');
            }
        });
    });

    $('#btn-fornecedores').click(function(e) {
        e.preventDefault();
        mudarCorTabela('purple');
        atualizarCabecalho('fornecedores');
        $.ajax({
            url: 'fetch_data.php',
            method: 'GET',
            data: { tipo: 'fornecedores' },
            dataType: 'json',
            success: function(data) {
                atualizarTabela(data, 'fornecedores');
            },
            error: function() {
                alert('Erro ao buscar dados dos fornecedores.');
            }
        });
    });
</script>

<?php include 'includes/rodape.php'; ?>
