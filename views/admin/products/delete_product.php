<script type="text/javascript">
  document.title = 'Delete Product';
</script> 
<div class="row">
  <div class="col-lg-6">
    <section class="panel" style="box-shadow: none;">
      <header class="panel-heading">
        <h1>Delete Product</h1>
        <a href="/admin/products" class="btn btn-success">Back</a>
      </header>
      <div class="panel-body">
        <?php $form = app\core\Form\Form::begin('', "post") ?>
          <input type="hidden" name="id" id="id" value="<?= $params['productModel']->getId() ?>" />
          <dl class="dl-horizontal">
            <dt>ID</dt><dd><?= $params['productModel']->getId() ?></dd>
            <dt>Category</dt><dd><?= $params['productModel']->getCategory() ?></dd>
            <dt>Description</dt><dd><?= $params['productModel']->getDescription() ?></dd>
            <dt>Price</dt><dd><?= $params['productModel']->getPrice() ?></dd>
          </dl>
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
        <?php app\core\form\Form::end() ?>
      </div>
    </section>
  </div>
</div>