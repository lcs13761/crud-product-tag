<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= theme('assets/fontawesome-free/css/all.min.css', CONF_VIEW_ADMIN) ?>" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href=" <?= theme('assets/css/style.css', CONF_VIEW_ADMIN) ?>" rel="stylesheet">
    <?= $v->section("style"); ?>
    <?= $v->section("styles"); ?>
</head>


<body id="page-top">

<?= $v->section("content"); ?>

<!-- Bootstrap core JavaScript-->
<script src="<?= theme('assets/jquery/jquery.min.js', CONF_VIEW_ADMIN) ?>"></script>

<script src="<?= theme('assets/bootstrap/js/bootstrap.bundle.min.js', CONF_VIEW_ADMIN) ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= theme('assets/js/sb-admin-2.min.js', CONF_VIEW_ADMIN) ?>"></script>

<?= $v->section("script"); ?>
<?= $v->section("scripts"); ?>
</body>

</html>