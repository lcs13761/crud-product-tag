<?php $v->start("style"); ?>
<!-- Sweetalert Css -->
<link href="<?= theme('assets/sweetalert/sweetalert.css',CONF_VIEW_ADMIN) ?>" rel="stylesheet"/>

<?php $v->end(); ?>


<?php $v->start("script"); ?>
<!-- SweetAlert Plugin Js -->

<script src="<?= theme('assets/sweetalert/sweetalert.min.js',CONF_VIEW_ADMIN) ?>"></script>
<script>

    function remove(e, route,type = 'td') {

        swal({
            title: "Você tem certeza?",
            text: "Você não poderá recuperar mais esta informação!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, excluir!",
            cancelButtonText: "Não, cancelar!",
            closeOnConfirm: false,
            closeOnCancel: false,
            showLoaderOnConfirm: true
        }, function (isConfirm) {

            if (isConfirm) {

                jQuery.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: route,
                    data: {_method: 'delete', _token: '{{csrf_token()}}'},
                    success: function (msg) {
                        if (msg['status'] == 'success') {
                            if(type === 'td'){
                                $(e).closest('tr').addClass('animated fadeOutDown')
                                setTimeout(function () {
                                    $(e).closest('tr').remove()
                                }, 800)
                            }
                            if(type === 'div'){
                                $(e).addClass('animated fadeOutDown')
                                setTimeout(function () {
                                    $(e).remove()
                                }, 800)
                            }

                            swal("Deletado!", "Seu registro foi excluído.", "success");
                        } else {
                            swal("Cancelado!", "Houve algum problema com nosso servidor: ERRO: " + msg['error'], "error");
                        }
                    }
                });
            } else {
                swal("Cancelado!", "Seu registro nâo foi excluído", "error");
            }
        })
    }

</script>

<?php $v->end(); ?>
