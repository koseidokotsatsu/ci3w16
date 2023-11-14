<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR-Code Product <?= $row->barcode ?></title>
</head>
<body>
    <img src="<?= base_url('uploads/qr-code/item-'.$row->barcode.'.png') ?>" style="width: 250px;">
</body>
</html>
