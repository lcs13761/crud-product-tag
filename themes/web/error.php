<?php $v->layout("web/template/assets"); ?>


<div class="container-fluid my-5">
    <div class="text-center">
        <div class="error mx-auto" data-text="<?= $error->code ?>"><?= $error->code ?></div>
        <p class="lead text-gray-800 mb-3"><?= $error->title ?></p>
        <p class="text-gray-500 mb-2"><?= $error->message ?></p>
        <?php if($error->link):?>
            <a class = 'btn btn-primary' href="<?= $error->link ?>"><?= $error->linkTitle ?></a>
        <?php endif; ?>
    </div>
</div>