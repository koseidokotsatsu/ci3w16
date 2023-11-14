<section class="content-header">
    <h1>
        Items
        <small>Data Barang</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header text-center">
            <h3 class="box-title">Barcode <i class="fa fa-barcode"></i></h3>
            <div class="pull-right">
                <a href="<?= site_url('item'); ?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"></i>&nbsp;&nbsp;Return
                </a>
            </div>
        </div>
        <div class="box-body" style="margin-left: 40%;">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
            echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128_B);
            ?>
            <?= $row->barcode?>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title" style="margin-left: 43%;">QR-Code <i class="fa fa-qrcode"></i></h3>
        </div>
        <div class="box-body" style="margin-left: 38%;">
            <?php
            use Endroid\QrCode\Builder\Builder;
            use Endroid\QrCode\Color\Color;
            use Endroid\QrCode\Encoding\Encoding;
            use Endroid\QrCode\ErrorCorrectionLevel;
            use Endroid\QrCode\QrCode;
            use Endroid\QrCode\Label\Label;
            use Endroid\QrCode\Logo\Logo;
            use Endroid\QrCode\RoundBlockSizeMode;
            use Endroid\QrCode\Writer\PngWriter;
            use Endroid\QrCode\Writer\ValidationException;
            
            $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($row->barcode)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            // ->logoPath(__DIR__.'/assets/symfony.png')
            // ->labelText($row->barcode)
            // ->labelFont(new NotoSans(20))
            // ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        // Save it to a file
        $folder_qrcode = "";
        $result->saveToFile('uploads/qr-code/item-'.$row->barcode.'.png');

        // $qrCode = new Endroid\QrCode\QrCode($row->barcode);
        // $qrCode->writeFile('uploads/qr-code/item-'.$row->barcode.'.png');
        ?>
        <img src="<?=base_url('uploads/qr-code/item-'.$row->barcode.'.png')?>" style="width:200px">
            <br>
            <?=$row->barcode?>
            <br><br>
            <a href="<?=site_url('item/qrcode_print/'.$row->id_item)?>" target="_blank" class="btn btn-default btn-sm">
                <i class="fa fa-print"></i> Print
            </a>
        </div>
    </div>
</section>