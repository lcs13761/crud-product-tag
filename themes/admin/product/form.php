<?php $v->layout("admin/template/layout");
$errors = errors();
?>

<?php $v->start('style'); ?>

<link href="<?= theme('assets/bootstrap-select/css/bootstrap-select.css', CONF_VIEW_ADMIN) ?>" rel="stylesheet"/>
<?php $v->end(); ?>

<section class="content">
    <div class="container-lg">
        <div class="card mb-3 p-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header">
                        <h2>
                            <b></b>
                            <small>Preencha as Informações abaixo:</small>
                        </h2>
                        <br>
                        <?php if (isset($product)): ?>
                        <form role="form" id="form_cliente" method="POST"
                              action="<?= url('product.update', ['id' => $product->id]) ?>">
                            <input type="hidden" name="_method" value="PUT"/>
                            <?php else: ?>
                            <form role="form" id="form_cliente" method="POST"
                                  action="<?= url('product.store') ?>" enctype="multipart/form-data">
                                <?php endif; ?>
                                <?= csrf_field(); ?>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group  form-float input-group">
                                            <label class="col-form-label">Produto<i>*</i></label>
                                            <div class="form-line">
                                                <input name="name" type="text" class="form-control  border-0"
                                                       value="<?= $product->name ?? '' ?>"/>
                                            </div>
                                            <?php if (isset($errors->product)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->product[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <div class="help-info">Min. 3, Max. 100 Caracteres</div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float input-group form-line">
                                            <label class="col-form-label"><i>Tags*</i></label>
                                            <select class="form-line form-control border-0 form-select filter-option show-tick"
                                                    name="tags[]" multiple>
                                                <?php foreach ($tags as $tag): ?>
                                                    <option <?= isset($product_tag) && !is_bool(array_search($tag->id,array_column($product_tag,'tag_id')))  ? 'selected' : '' ?>  value="<?= $tag->id ?>"><?= $tag->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if (isset($errors->tags)): ?>
                                                <div class="col-sm-12 p-0">
                                                     <span class="invalid-feedback d-block col-blue">
                                                         <strong><?= $errors->tags[0]; ?></strong>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary waves-effect">Salvar</button>
                                    <a href="<?= url('product.index') ?>" type="button"
                                       class="btn bg-grey waves-effect">Cancelar</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $v->start("scripts"); ?>
<script src="<?= theme('assets/bootstrap-select/js/bootstrap-select.js', CONF_VIEW_ADMIN) ?>"></script>
<script src="<?= theme('assets/bootstrap-select/js/i18n/defaults-pt_BR.min.js', CONF_VIEW_ADMIN) ?>"></script>
<script>
    $('.show-tick').selectpicker();
</script>

<?php $v->end(); ?>

