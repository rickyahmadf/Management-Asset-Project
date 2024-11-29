<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode - Asset <?= $row->kode_asset?></title>
</head>
<body>
<img width="150px" src="<?= base_url('asset/images/' . $value->kode_asset . '.png') ?>">
</body>
</html>