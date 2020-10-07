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

$(document).ready(function(){
    $('.form-avaliar-usuario').validate({
        errorLabelContainer: "#erros",
        wrapper: "p",
        rules: {
            avaliado: 'required',
            rating: 'required',
            comment: 'required'
        },
        messages: {
            avaliado: 'Esse campo é obrigatório!',
            rating: 'Esse campo é obrigatório!',
            comment: 'Esse campo é obrigatório!'
        },
    });
});

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete-product-btn').click(function(e){
        e.preventDefault();
        var delete_val = $(this).closest('tr').find('.delete_val').val();

        Swal.fire({
            title: 'Tem certeza que deseja excluir o produto?',
            text: 'Essa ação não pode ser desfeita',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
        })
        .then((result) => {
            if(result.isConfirmed){
                var data = {
                    "_token": $('input[name="csrf-token"]').val(),
                    "id": delete_val,
                };
                $.ajax({
                    type: 'DELETE',
                    url: 'product-destroy/'+delete_val,
                    data: data,
                    success: function(response){
                        Swal.fire(response.status, {
                            icon: 'success',
                        })
                        .then((result) => {
                            location.reload();
                        });
                    }
                });           
            }
        });
    });

    $('.delete-user-admin-btn').click(function(e){
        e.preventDefault();
        var delete_val = $(this).closest('tr').find('.delete_val').val();

        Swal.fire({
            title: 'Tem certeza que deseja excluir o usuário?',
            text: 'Essa ação não pode ser desfeita',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
        })
        .then((result) => {
            if(result.isConfirmed){
                var data = {
                    "_token": $('input[name="csrf-token"]').val(),
                    "id": delete_val,
                };
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/usuario/destroy/'+delete_val,
                    data: data,
                    success: function(response){
                        Swal.fire(response.status, {
                            icon: 'success',
                        })
                        .then((result) => {
                            location.reload();
                        });
                    }
                });           
            }
        });
    });

    $('.delete-user-btn').click(function(e){
        e.preventDefault();
        var delete_val = $(this).closest('form').find('.delete_val').val();

        Swal.fire({
            title: 'Tem certeza que deseja excluir a sua conta?',
            text: 'Essa ação não pode ser desfeita',
            icon: 'error',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
        })
        .then((result) => {
            if(result.isConfirmed){
                var data = {
                    "_token": $('input[name="csrf-token"]').val(),
                    "id": delete_val,
                };
                $.ajax({
                    type: 'DELETE',
                    url: 'destroy/'+delete_val,
                    data: data,
                    success: function(response){
                        Swal.fire(response.status, {
                            icon: 'success',
                        })
                        .then((result) => {
                            window.location.replace('/');
                        });
                    }
                });           
            }
        });
    });
});
