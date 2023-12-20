<?php
// Check if there's a flash message in the session
$flashMessage = $this->session->flashdata('message');
?>

<section class="content-header">
    <h1>Sales
        <small>Sales</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Sales</li>
    </ol>
</section>

<section class="content">
    <?php if (!empty($flashMessage)) : ?>
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $flashMessage ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('sale/transaction'); ?>" method="post">
        <div class="row">
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <table>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top; width:30%">
                                    <label for="text">Kasir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" value="<?= $this->fuct->user_login()->name ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="customer">Customer</label>
                                </td>
                                <td>
                                    <div>
                                        <select id="customer" class="form-control" name="customer">
                                            <option selected value="Umum">Umum</option>
                                            <?php foreach ($customer as $cust => $value) {
                                                echo '<option value="' . $value->id_customer . '">' . $value->name . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top; width:30%">
                                    <label for="barcode">Barcode</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="id_item">
                                        <input type="hidden" id="name">
                                        <input type="hidden" id="price">
                                        <input type="hidden" id="stock">
                                        <input type="text" id="barcode" class="form-control" autofocus>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="qty">Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="qty" name="qty" min="1" value="1" class="form-control" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <!-- <a href="#" class="btn btn-primary add-qty">
                                            <i class="fa fa-cart-plus"></i> Add
                                        </a> -->
                                        <button type="button" id="add-cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"></i> Add
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box box-widget">
                    <div class="box-body">
                        <div align="right">
                            <?php
                            $subtotal = 0;
                            foreach ($this->cart->contents() as $itemTotal) {
                                $subtotal += $itemTotal['subtotal'];
                            }
                            ?>
                            <h4>Invoice <b><span name="invoice" id="invoice"><?= $invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size:50pt"><?= indo_currency($subtotal) ?></span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget">
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Product Item</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th style="width: 30px;"></th>
                                </tr>
                            </thead>
                            <tbody id="cart-table">
                                <?php
                                if (!empty($this->cart->contents())) {
                                    foreach ($this->cart->contents() as $items) { ?>
                                        <tr>
                                            <td>
                                                <span><?= $items['barcode']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $items['name']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $items['qty']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $items['price']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $items['subtotal']; ?></span>
                                            </td>
                                            <td align="center">
                                                <a onclick="location.href = '<?= base_url(); ?>sale/hapus_cart/<?= $items['rowid']; ?>';" title="Batalkan">
                                                    <i class="fa fa-trash-o tip pointer posdel"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                    } else { ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top; width:30%">
                                    <label for="sub_total">Sub Total</label>
                                </td>
                                <td class="form-group">
                                    <input type="number" name="sub_total" id="sub_total" value="<?= $subtotal ?>" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="discount">Discount</label>
                                </td>
                                <td class="form-group">
                                    <input type="number" name="discount" id="id_discount" value="0" min="0" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="grand_total">Total</label>
                                </td>
                                <td class="form-group">
                                    <input type="number" name="total" id="total" value="0" class="form-control" readonly>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top; width: 30%">
                                    <label for="cash">Cash</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="cash" id="cash" value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top; width: 30%">
                                    <label for="change">Change</label>
                                </td>
                                <td>
                                    <div>
                                        <input type="number" name="change" id="change" class="form-control" value="0" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box box-widget">
                    <div class="box-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="note">Note</label>
                                </td>
                                <td>
                                    <div>
                                        <textarea name="note" id="note" rows="3" class="form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div>
                    <a href="sale/cancel" class="btn btn-flat btn-warning" type="reset">
                        <i class="fa fa-refresh"></i> Cancel
                    </a><br><br>
                    <button id="transaction" name="transaction" class="btn btn-flat btn-lg btn-success" type="submit">
                        <i class="fa fa-paper-plane-o"></i> Process Payment
                    </button>
                </div>
            </div>
        </div>
    </form>

</section>

<!-- Modal Barcode-->
<div class="modal fade" id="modal-item">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item as $row) { ?>
                            <tr>
                                <td hidden><?= $row->id_item ?></td>
                                <td><?= $row->barcode ?></td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->unit_name ?></td>
                                <td class="text-right"><?= indo_currency($row->price) ?></td>
                                <td class="text-right"><?= $row->stock ?></td>
                                <td>
                                    <!-- <a href="<?= base_url() . 'sale/tambah_barang/' . $row->id_item . '/1' ?>" class="btn btn-sm btn-info select-item" style="margin-left: 20px;">
                                        <i class="fa fa-check"></i>&nbsp;Select
                                    </a> -->
                                    <button class="btn btn-sm btn-info select-item" style="margin-left: 20px;" id="select" data-id="<?= $row->id_item ?>" data-barcode="<?= $row->barcode ?>" data-name="<?= $row->name ?>" data-unit="<?= $row->unit_name ?>" data-stock="<?= $row->stock ?>" data-price="<?= $row->price ?>">
                                        <i class="fa fa-check"></i>&nbsp;Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi resetForm untuk mereset semua nilai input dan data
        function resetForm() {
            // Reset nilai input
            $("#date").val('<?= date('Y-m-d') ?>');
            $("#user").val('<?= $this->fuct->user_login()->name ?>');
            $("#customer").val('');

            $("#id_item").val('');
            $("#price").val('');
            $("#stock").val('');
            $("#barcode").val('');
            $("#qty").val(1);

            // Reset nilai subtotal dan total
            $("#sub_total").val('');
            $("#id_discount").val(0);
            $("#total").val('');

            // Reset nilai uang tunai dan kembalian
            $("#cash").val(0);
            $("#change").val('');

            // Reset catatan
            $("#note").val('');

            // Reset keranjang belanja
            $("#cart-table").empty();

            // Reset informasi invoice
            $("#invoice").text('<?= $invoice ?>');
            $("#grand_total2").text('0');
        }
        // Inisialisasi penghitung untuk nomor baris
        var counter = 1;
        var subtotal = 0; // Menyimpan nilai subtotal

        function formatRupiah(amount) {
            var currency = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return currency.format(amount);
        }

        // Simpan data terkait item yang dipilih
        var selectedItem = {};

        // Event handler untuk tombol "Pilih" di modal
        $("#modal-item").on("click", ".select-item", function() {
            // Dapatkan nilai dari baris yang dipilih di modal
            selectedItem = {
                id_item: $(this).data("id"),
                barcode: $(this).data("barcode"),
                qty: parseInt($("#qty").val()) || 1,
                price: $(this).data("price"),
                formattedPrice: formatRupiah($(this).data("price")),
                name: $(this).data("name"),
                stock: $(this).data("stock")
            };

            console.log(selectedItem);

            $("#id_item").val(selectedItem.id_item);
            $("#name").val(selectedItem.name);
            $("#stock").val(selectedItem.stock);
            // $("#qty").val(selectedItem.qty);
            $("#barcode").val(selectedItem.barcode);
            $("#price").val(selectedItem.price);
            $("#formatted-price").text(selectedItem.formattedPrice);

            // Tutup modal
            $("#modal-item").modal("hide");
        });

        $("#add-cart").click(function() {
            // Make sure an item is selected
            if ($.isEmptyObject(selectedItem)) {
                alert('Please select an item first.');
                return;
            }
            // Get the values from hidden inputs and input fields
            var id_item = $("#id_item").val();
            var barcode = $("#barcode").val();
            var qty = $("#qty").val();
            var price = $("#price").val();
            var stock = $("#stock").val();
            var name = $("#name").val();

            // Perform any additional checks or processing here
            var addToCartUrl = baseUrl + 'sale/tambah_barang/' + id_item + '/' + qty;

            window.location.href = addToCartUrl;

            console.log("Add to Cart URL:", addToCartUrl);

            // Example: Log the values to the console
            console.log("ID Item:", id_item);
            console.log("Barcode:", barcode);
            console.log("Qty:", qty);
            console.log("Price:", price);
            console.log("Stock:", stock);
            console.log("Name:", name);

        });

        // Event handler for discount input
        $("#id_discount").on("input", function() {
            updateTotal();
            updateChange(); // Update change when discount changes
        });

        // Function to update the total based on the discount
        function updateTotal() {
            var subtotal = 0;

            // Calculate subtotal from cart table
            $("#cart-table tr").each(function() {
                var price = parseFloat($(this).find("td:eq(3)").text()) || 0;
                var qty = parseInt($(this).find("td:eq(2)").text()) || 0;
                subtotal += price * qty;
            });

            var discount = parseFloat($("#id_discount").val()) || 0;

            // Calculate total after applying discount
            var total = subtotal - discount;

            // Set the total value in the input field with 2 decimal places
            $("#total").val(parseFloat(total.toFixed(2)));
        }

        // Event handler for cash input
        $("#cash").on("input", function() {
            updateChange();
        });

        // Function to update the change based on cash input
        function updateChange() {
            var total = parseFloat($("#total").val()) || 0;
            var cash = parseFloat($("#cash").val()) || 0;

            // Calculate change
            var change = cash - total;

            // Set the change value in the input field with 2 decimal places
            $("#change").val(parseFloat(change.toFixed(2)));
        }

        // Event handler for the "Print Receipt" button
$("#transaction").on("click", function() {
    printReceipt();
});

// Function to print the receipt
function printReceipt() {
    // Open a new window for printing
    var printWindow = window.open('', '_blank');

    // Build the content of the receipt
    var receiptContent = buildReceiptContent();

    // Write the content to the new window
    printWindow.document.write(receiptContent);

    // Close the document for writing
    printWindow.document.close();

    // Print the receipt
    printWindow.print();
}

// Function to build the content of the receipt
function buildReceiptContent() {
    var receiptContent = '<html>';
    receiptContent += '<head><title>Receipt</title></head>';
    receiptContent += '<body>';
    receiptContent += '<h1>Receipt</h1>';

    // Add details such as date, cashier, customer, etc.
    receiptContent += '<p>Date: ' + $("#date").val() + '</p>';
    receiptContent += '<p>Cashier: ' + $("#user").val() + '</p>';
    receiptContent += '<p>Customer: ' + $("#customer").val() + '</p>';

    // Add the items in the cart
    receiptContent += '<table border="1">';
    receiptContent += '<tr><th>Item</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>';

    $("#cart-table tr").each(function() {
        var itemName = $(this).find("td:eq(1)").text();
        var itemQty = $(this).find("td:eq(2)").text();
        var itemPrice = $(this).find("td:eq(3)").text();
        var itemSubtotal = $(this).find("td:eq(4)").text();

        receiptContent += '<tr><td>' + itemName + '</td><td>' + itemQty + '</td><td>' + itemPrice + '</td><td>' + itemSubtotal + '</td></tr>';
    });

    receiptContent += '</table>';

    // Add total, discount, cash, change, and note
    receiptContent += '<p>Total: ' + $("#total").val() + '</p>';
    receiptContent += '<p>Discount: ' + $("#id_discount").val() + '</p>';
    receiptContent += '<p>Cash: ' + $("#cash").val() + '</p>';
    receiptContent += '<p>Change: ' + $("#change").val() + '</p>';
    receiptContent += '<p>Note: ' + $("#note").val() + '</p>';

    receiptContent += '</body>';
    receiptContent += '</html>';

    return receiptContent;
}



        //     $("#add_cart").click(function() {
        //         // Get the quantity value from the input field
        //         var qty = parseInt($("#qty").val()) || 1;

        //         // Make sure an item is selected
        //         if ($.isEmptyObject(selectedItem)) {
        //             alert('Please select an item first.');
        //             return;
        //         }

        //         // Update the selected item's quantity
        //         selectedItem.qty = qty;

        //         // Calculate subtotal based on the updated quantity
        //         var itemSubtotal = selectedItem.price * qty;
        //         subtotal += itemSubtotal;

        //         // Update total after applying discount
        //         var discount = $("#id_discount").val();
        //         var total = subtotal - discount;

        //         // Update subtotal and total values
        //         $("#sub_total").val(subtotal);
        //         $("#total").val(total);

        //         // Update the total displayed on the page
        //         $("#grand_total2").text(formatRupiah(total));

        //         // Add a new row to the cart table
        //         var newRow = "<tr>" +
        //             "<td>" + counter + "</td>" +
        //             "<td>" + selectedItem.barcode + "</td>" +
        //             "<td>" + selectedItem.name + "</td>" +
        //             "<td>" + selectedItem.formattedPrice + "</td>" +
        //             "<td>" + selectedItem.qty + "</td>" +
        //             "<input type='hidden' name='id_item[]' value='" + selectedItem.id_item + "'>" +
        //             "<input type='hidden' name='barcode[]' value='" + selectedItem.barcode + "'>" +
        //             "</tr>";

        //         $("#cart-table").append(newRow);

        //         // Increment the counter for the next row
        //         counter++;

        //         // Reset input values and selected item
        //         $("#barcode").val("");
        //         $("#qty").val(1);
        //         selectedItem = {};
        //     });


        //     // Event handler untuk memperbarui total saat nilai diskon berubah
        //     $("#id_discount").on("input", function() {
        //         var discount = $(this).val();
        //         var total = subtotal - discount;

        //         // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total
        //         $("#total").val(total);

        //         // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total product item
        //         $("#grand_total2").text(formatRupiah(total));
        //     });

        //     // Event handler untuk memperbarui kembalian saat nilai uang tunai berubah
        //     $("#cash").on("input", function() {
        //         updateChange(); // Panggil fungsi untuk memperbarui kembalian
        //     });

        //     // Fungsi untuk memperbarui kembalian
        //     function updateChange() {
        //         var cash = parseFloat($("#cash").val());
        //         var total = parseFloat($("#total").val());

        //         // Pastikan kedua nilai adalah angka valid
        //         if (isNaN(cash) || isNaN(total)) {
        //             alert('Mohon masukkan angka yang valid.');
        //             return;
        //         }

        //         // Hitung kembalian
        //         var change = cash - total;

        //         // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan kembalian
        //         $("#change").val(change);
        //     }

        //     // Event handler untuk tombol "Process Payment"
        //     $("#transaction").click(function() {
        //         // Cek apakah pembayaran sudah dilakukan
        //         var cash = parseFloat($("#cash").val());
        //         var total = parseFloat($("#total").val());

        //         // Pastikan kedua nilai adalah angka valid
        //         if (isNaN(cash) || isNaN(total)) {
        //             alert('Mohon masukkan angka yang valid.');
        //             return;
        //         }

        //         if (cash < total) {
        //             alert('Jumlah uang tunai kurang dari total pembelian. Silakan periksa kembali.');
        //             return;
        //         }

        //         // Selain itu, proses pembayaran dan print struk
        //         //printReceipt();
        //     });

        //     // Fungsi untuk mencetak struk
        //     function printReceipt() {
        //         // Dapatkan informasi yang diperlukan untuk dicetak
        //         var invoiceNumber = $("#invoice").text();
        //         var date = $("#date").val();
        //         var cashier = $("#user").val();
        //         var customer = $("#customer option:selected").text();
        //         var subTotal = $("#sub_total").val();
        //         var discount = $("#id_discount").val();
        //         var grandTotal = $("#total").val();
        //         var cash = $("#cash").val();
        //         var change = $("#change").val();
        //         var note = $("#note").val();

        //         // Buat struk dalam format HTML
        //         var receiptContent = `
        //             <div style="text-align: center; font-family: 'Arial', sans-serif;">
        //                 <h2 style="color: #333; margin-bottom: 10px;">MEDICALPOS INVOICE</h2>
        //                 <p style="margin: 5px 0;">Invoice Number: ${invoiceNumber}</p>
        //                 <p style="margin: 5px 0;">Date: ${date}</p>
        //                 <p style="margin: 5px 0;">Cashier: ${cashier}</p>
        //                 <p style="margin: 5px 0;">Customer: ${customer}</p>
        //                 <hr style="border: 1px dashed #ccc; margin: 15px 0;">
        //                 <table style="width: 100%; margin-bottom: 15px;">
        //                     <!-- Tambahkan baris untuk setiap item yang dibeli -->
        //                 </table>
        //                 <hr style="border: 1px dashed #ccc; margin: 15px 0;">
        //                 <p style="margin: 5px 0;">Sub Total: ${subTotal}</p>
        //                 <p style="margin: 5px 0;">Discount: ${discount}</p>
        //                 <p style="margin: 5px 0; font-weight: bold; font-size: 18px;">Total: ${grandTotal}</p>
        //                 <p style="margin: 5px 0;">Cash: ${cash}</p>
        //                 <p style="margin: 5px 0;">Change: ${change}</p>
        //                 <p style="margin: 5px 0;">Note: ${note}</p>
        //             </div>
        //         `;
        //         // Buka jendela baru untuk mencetak struk
        //         var printWindow = window.open('', '_blank');
        //         printWindow.document.open();
        //         printWindow.document.write(`
        //             <html>
        //             <head>
        //                 <title>Receipt</title>
        //                 <style>
        //                     body {
        //                         margin: 0;
        //                         padding: 20px;
        //                         background-color: #f5f5f5;
        //                         font-size: 8pt; /* Set the font size as needed */
        //                     }
        //                     table {
        //                         width: 100%;
        //                         border-collapse: collapse;
        //                         margin-top: 10px;
        //                     }
        //                     th, td {
        //                         border: 1px solid #ddd;
        //                         padding: 8px;
        //                         text-align: left;
        //                     }
        //                 </style>
        //             </head>
        //             <body>${receiptContent}</body>
        //             </html>
        //         `);
        //         printWindow.document.close();

        //         // Cetak struk
        //         printWindow.print();
        //         printWindow.onafterprint = function() {
        //             printWindow.close();
        //         };
        // }
        // Event handler untuk tombol "Cancel"
        // $("#cancel_payment").click(function() {
        //     resetForm(); // Panggil fungsi resetForm saat tombol "Cancel" ditekan
        // });
    });
</script>