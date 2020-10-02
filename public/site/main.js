$(document).ready(function(){
    $('#phone').mask('(00) 00000-0000');
});

$(document).ready(function(){
    $('#form-cadastrar-produto').validate({
        errorLabelContainer: "#erros",
        wrapper: "p",
        rules: {
            name: 'required',
            category: 'required',
            statusProduto: 'required'
        },
        messages: {
            name: 'Esse campo é obrigatório!',
            category: 'Esse campo é obrigatório!',
            statusProduto: 'Esse campo é obrigatório!'
        },
    });
});