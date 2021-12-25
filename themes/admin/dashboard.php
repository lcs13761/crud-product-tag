<?php $v->layout("admin/template/layout"); ?>
<div data-ajax="<?= url('dash.ajax') ?>" id="ajaxChart"></div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <div class="chart-pie pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<?php $v->start("scripts"); ?>

<!-- Page level plugins -->
<script src="<?= theme('assets/chart.js/Chart.min.js', CONF_VIEW_ADMIN) ?>"></script>
<script src="<?= theme('assets/js/demo/chart-bar-demo.js', CONF_VIEW_ADMIN) ?>"></script>
<script src="<?= theme('assets/js/demo/chart-pie-demo.js', CONF_VIEW_ADMIN) ?>"></script>

<?php $v->end(); ?>
