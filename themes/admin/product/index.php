<?php $v->layout("admin/template/layout"); ?>

<?= $v->insert('admin/includes/datatables'); ?>
<?= $v->insert('admin/includes/dialog-remove'); ?>

    <section>
      <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3 header row">
                    <h2 class="col-md-6"><b>TAGS</b></h2>
                    <ul class="col-md-6 text-md-right list-inline">
                        <li>
                            <a class='btn btn-primary' href="<?= url('product.create'); ?>">
                                <i class="fa fa-plus"></i>
                                Novo Produto
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover jsDataTable" id="dataTable" width="100%"
                               cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Tags</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($products)): ?>
                                <?php
                                $i = 0;
                                foreach ($products as $product):?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td><?= $product->name ?></td>
                                        <td>
                                       <?php
                                       $x = 0;
                                       foreach ($products_tags as $value){
                                           if($product->id == $value->product_id){
                                               $break = $x >= 2  ?  "</br>" : ($x == 0 ? "" : ", ");
                                               echo  $break . $value->name;
                                               $x >= 2 ? $x = 0 :  $x++;
                                           }
                                       }
                                         ?>
                                        </td>
                                        <td>
                                            <div class="text-center btn-center">
                                                <a href="<?= url('product.edit', ['id' => $product->id]) ?>"
                                                   class="btn btn-success waves-effect" data-toggle="tooltip"
                                                   data-placement="bottom" title="" data-original-title="Editar">
                                                    <i class="fas fa-pen px-2 py-1"></i>
                                                </a>
                                                <a onclick="remove(this,'<?= url('product.destroy', ['id' => $product->id]) ?>')"
                                                   class="btn btn-danger waves-effect" data-toggle="tooltip"
                                                   data-placement="bottom" title="" data-original-title="Excluir">
                                                    <i class="fas fa-trash px-2 py-1"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


