<?php if (!empty($session['cart'])) : ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>image</th>
                    <th>name</th>
                    <th>qty</th>
                    <th>price</th>
                    <td><span class="glyphicon glyphicon-remove text-danger"></span></td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item) : ?>
                <tr>
                    <td><?= \yii\helpers\Html::img('@web/images/products/' . $item['img'], ['alt' => $item['name'], 'height' => '50']) ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><span class="glyphicon glyphicon-remove text-danger del-item" data-id="<?= $id ?>"></span></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td colspan="4">Qty: </td>
                    <td><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">Total: </td>
                    <td><?= $session['cart.sum'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <h3>Корзина пуста!</h3>
<?php endif; ?>

