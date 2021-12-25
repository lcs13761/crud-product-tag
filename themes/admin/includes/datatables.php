<?php $v->start("styles"); ?>
<link href="<?= theme('assets/datatables/dataTables.bootstrap4.css',CONF_VIEW_ADMIN) ?>" rel="stylesheet">
<style>
    .dtflex{
        display: flex !important;
        justify-content: space-between !important;
        width: 100%;
        align-items: center !important;
    }

    .dtflex .dt-buttons a{
        padding: 0px 5px 0px 5px;
    }
    .btn-center a{
        margin: 0px 1px;
    }
    .btn-add  li  a {
        margin-top: -10px;
        margin-right: 20px;
    }

    .th-action{
        position: static !important;
        padding: 0px 0px 10px 0px !important;
    }
</style>

<?php $v->end(); ?>

<?php $v->start("scripts"); ?>
    <script src="<?= theme('assets/datatables/jquery.dataTables.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/dataTables.bootstrap4.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/dataTables.buttons.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/buttons.flash.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/jszip.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/pdfmake.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/vfs_fonts.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/buttons.html5.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/datatables/extensions/export/buttons.print.min.js', CONF_VIEW_ADMIN) ?>"></script>
    <script src="<?= theme('assets/js/demo/datatables-demo.js', CONF_VIEW_ADMIN) ?>"></script>
<?php $v->end(); ?>