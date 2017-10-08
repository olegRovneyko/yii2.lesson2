
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>name</th>
            <th>qty</th>
            <th>price</th>
            <th>sum</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($session['cart'] as $id => $item) : ?>
            <tr>
                <td><?= $item['name'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= ($item['qty'] * $item['price']) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Qty: </td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="3">Total: </td>
            <td><?= $session['cart.sum'] ?></td>
        </tr>
        </tbody>
    </table>
</div>

