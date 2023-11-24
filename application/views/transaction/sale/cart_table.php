<?php if (!empty($cart_items)) : ?>
    <?php foreach ($cart_items as $index => $item) : ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $item['barcode']; ?></td>
            <td><?= $item['product_name']; ?></td>
            <td><?= $item['price']; ?></td>
            <td><?= $item['qty']; ?></td>
            <td><?= $item['discount']; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="6" class="text-center">Tidak ada item</td>
    </tr>
<?php endif; ?>