$(document).ready(function () {
    $("#cxCadastrar, #cxEditar").hide();

    $("#bntFecharCadastrar").click(function () {
        $("#cxCadastrar").hide();
    });

    $("#bntFecharEditar").click(function () {
        $("#cxEditar").hide();
    });

    $("#btnNovoBotao").click(function () {
        $("#cxCadastrar").show();
    });

    $("#btnGerenciar").click(function () {
        atualizarListas();
    });

    $("#btnCadastrar").click(function () {
        const nome_capturado = $("#cx_nome").val();
        const setor_capturado = $("#cx_setor").val();

        $.ajax({
            url: "cadastro.php",
            method: "POST",
            data: { nome: nome_capturado, setor: setor_capturado },
            success: function (resposta) {
                alert(resposta);
                $("#cxCadastrar").hide();
                atualizarListas();
            },
            error: function () {
                alert("Erro ao tentar realizar o cadastro");
            }
        });
    });

    $(document).on("click", ".cartoes", function () {
        abrirEditar(this);
    });
});

function abrirEditar(cartao) {
    $("#cxEditar").show();
    const matricula = $(cartao).find(".matricula_func").text();
    const nome = $(cartao).find(".nome_func").text();
    const setor = $(cartao).find(".setor_func").text();
    const situacao = $(cartao).find(".situacao_func").text();

    $("#caixa_matricula2").val(matricula);
    $("#cx_nome2").val(nome);
    $("#cx_setor2").val(setor);
    $("#caixa_situacao2").val(situacao);

    $("#btnSalvarAlteracoes").off("click").click(function () {
        salvarAlteracoes(matricula);
    });

    $("#btnDeletar").off("click").click(function () {
        deletarFunc(matricula);
    });
}

function salvarAlteracoes(matricula) {
    const nome = $("#cx_nome2").val();
    const setor = $("#cx_setor2").val();
    const situacao = $("#caixa_situacao2").val();
    
    $.ajax({
        type: "POST",
        url: "atualizar.php",
        data: { matricula, nome, setor, situacao },
        success: function (resposta) {
            alert(resposta);
            $("#cxEditar").hide();
            atualizarListas();
        },
        error: function () {
            alert("Erro ao tentar atualizar");
        }
    });
}

function deletarFunc(matricula) {
    $.ajax({
        url: "deletar.php",
        type: "POST",
        data: { matricula },
        success: function (resposta) {
            alert(resposta);
            $("#cxEditar").hide();
            atualizarListas();
        },
        error: function () {
            alert("Erro ao tentar deletar o funcionário.");
        }
    });
};

function atualizarListas() {
    $("#cxadm").load("consultar-admin.php");
    $("#cxfin").load("consultar-fina.php");
    $("#cxsup").load("consultar-sup.php");
};