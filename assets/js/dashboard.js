// Função para mudar cor da tabela
function mudarCorTabela(cor) {
    const tabela = document.getElementById("tabelaSimples");
    tabela.classList.remove("blue", "green", "purple", "grey");
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

// Função para atualizar o corpo da tabela
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

// Manipuladores de clique
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
