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
    <form action="<?= base_url('sale/process_payment'); ?>" method="post">
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
                                            <option value="">Umum</option>
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
                                        <input type="number" id="qty" value="1" min="1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
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
                            <h4>Invoice <b><span name="invoice" id="invoice"><?= $invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
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
                                    <th>#</th>
                                    <th>Barcode</th>
                                    <th>Product Item</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody id="cart-table">
                                <!-- <tr>
                                <td colspan="9" class="text-center">No Items</td>
                            </tr> -->
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
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="discount">Discount</label>
                                </td>
                                <td class="form-group">
                                    <input type="number" name="discount"  id="id_discount" value="0" min="0" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top">
                                    <label for="grand_total">Total</label>
                                </td>
                                <td class="form-group">
                                    <input type="number" name="total" id="total" class="form-control" readonly>
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
                                        <input type="number" name="change" id="change" class="form-control" readonly>
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
                    <button id="cancel_payment" class="btn btn-flat btn-warning" type="reset">
                        <i class="fa fa-refresh"></i> Cancel
                    </button><br><br>
                    <button id="process_payment" name="process_payment" class="btn btn-flat btn-lg btn-success" type="submit">
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
                        <?php foreach ($item as $i => $data) { ?>
                            <tr>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->name_unit ?></td>
                                <td class="text-right"><?= indo_currency($data->price) ?></td>
                                <td class="text-right"><?= $data->stock ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info select-item" style="margin-left: 20px;" id="select" data-id="<?= $data->id_item ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-unit="<?= $data->name_unit ?>" data-stock="<?= $data->stock ?>" data-price="<?= $data->price ?>">
                                        <i class="fa fa-check">Select</i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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

        // Event handler untuk tombol "Tambah"
        $("#add_cart").click(function() {
            // Dapatkan nilai dari kolom input
            var qty = $("#qty").val();

            // Pastikan item telah dipilih sebelum menambahkannya ke dalam tabel
            if ($.isEmptyObject(selectedItem)) {
                alert('Silakan pilih item terlebih dahulu.');
                return;
            }

            // Hitung subtotal berdasarkan harga item dan qty
            var itemSubtotal = selectedItem.price * qty;
            subtotal += itemSubtotal;

            // Hitung total setelah mengambil diskon jika ada
            var discount = $("#id_discount").val();
            var total = subtotal - discount;

            // Perbarui nilai input subtotal dan total dengan format rupiah
            $("#sub_total").val(subtotal);

            // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total
            $("#total").val(total);

            // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total product item
            $("#grand_total2").text(formatRupiah(total));

            // Tambahkan baris baru ke tabel keranjang
            var newRow = "<tr>" +
                "<td>" + counter + "</td>" +
                "<td>" + selectedItem.barcode + "</td>" +
                "<td>" + selectedItem.name + "</td>" +
                "<td>" + selectedItem.formattedPrice + "</td>" +
                "<td>" + qty + "</td>" +
                "</tr>";

            $("#cart-table").append(newRow);

            // Tambahkan penghitung baris
            counter++;

            // Reset nilai input barcode, item yang dipilih, dan qty
            $("#barcode").val("");
            $("#qty").val(1);
            selectedItem = {};
        });

        // Event handler untuk tombol "Pilih" di modal
        $("#modal-item").on("click", ".select-item", function() {
            // Dapatkan nilai dari baris yang dipilih di modal
            selectedItem = {
                barcode: $(this).data("barcode"),
                qty: $("#qty").val(),
                price: $(this).data("price"),
                formattedPrice: formatRupiah($(this).data("price")),
                name: $(this).data("name")
            };

            // Anda mungkin perlu memperbarui nilai dalam kolom input
            $("#barcode").val(selectedItem.barcode);
            $("#price").val(selectedItem.price);
            $("#formatted-price").text(selectedItem.formattedPrice);

            // Tutup modal
            $("#modal-item").modal("hide");
        });

        // Event handler untuk memperbarui total saat nilai diskon berubah
        $("#id_discount").on("input", function() {
            var discount = $(this).val();
            var total = subtotal - discount;

            // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total
            $("#total").val(total);

            // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan total product item
            $("#grand_total2").text(formatRupiah(total));
        });

        // Event handler untuk memperbarui kembalian saat nilai uang tunai berubah
        $("#cash").on("input", function() {
            updateChange(); // Panggil fungsi untuk memperbarui kembalian
        });

        // Fungsi untuk memperbarui kembalian
        function updateChange() {
            var cash = parseFloat($("#cash").val());
            var total = parseFloat($("#total").val());

            // Pastikan kedua nilai adalah angka valid
            if (isNaN(cash) || isNaN(total)) {
                alert('Mohon masukkan angka yang valid.');
                return;
            }

            // Hitung kembalian
            var change = cash - total;

            // Perbarui nilai pada elemen dengan ID tertentu untuk menampilkan kembalian
            $("#change").val(change);
        }

        // Event handler untuk tombol "Process Payment"
        $("#process_payment").click(function() {
            // Cek apakah pembayaran sudah dilakukan
            var cash = parseFloat($("#cash").val());
            var total = parseFloat($("#total").val());

            // Pastikan kedua nilai adalah angka valid
            if (isNaN(cash) || isNaN(total)) {
                alert('Mohon masukkan angka yang valid.');
                return;
            }

            if (cash < total) {
                alert('Jumlah uang tunai kurang dari total pembelian. Silakan periksa kembali.');
                return;
            }

            // Selain itu, proses pembayaran dan print struk
            printReceipt();
        });

        // Fungsi untuk mencetak struk
        function printReceipt() {
            // Dapatkan informasi yang diperlukan untuk dicetak
            var invoiceNumber = $("#invoice").text();
            var date = $("#date").val();
            var cashier = $("#user").val();
            var customer = $("#customer option:selected").text();
            var subTotal = $("#sub_total").val();
            var discount = $("#id_discount").val();
            var grandTotal = $("#total").val();
            var cash = $("#cash").val();
            var change = $("#change").val();
            var note = $("#note").val();

            // Buat struk dalam format HTML
            var receiptContent = `
            <h2>MEDICALPOS INVOICE</h2>
            <p>Invoice Number: ${invoiceNumber}</p>
            <p>Date: ${date}</p>
            <p>Cashier: ${cashier}</p>
            <p>Customer: ${customer}</p>
            <hr>
            <table>
                <!-- Tambahkan baris untuk setiap item yang dibeli -->
            </table>
            <hr>
            <p>Sub Total: ${subTotal}</p>
            <p>Discount: ${discount}</p>
            <p>Total: ${grandTotal}</p>
            <p>Cash: ${cash}</p>
            <p>Change: ${change}</p>
            <p>Note: ${note}</p>
        `;

            // Buka jendela baru untuk mencetak struk
            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(`
            <html>
                <head>
                    <title>Receipt</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                        }
                        h2 {
                            text-align: center;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        table, th, td {
                            border: 1px solid #ddd;
                        }
                        th, td {
                            padding: 8px;
                            text-align: left;
                        }
                    </style>
                </head>
                <body>
                    ${receiptContent}
                </body>
            </html>
        `);
            printWindow.document.close();

            // Cetak struk
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
            };
        }
        // Event handler untuk tombol "Cancel"
        $("#cancel_payment").click(function() {
            resetForm(); // Panggil fungsi resetForm saat tombol "Cancel" ditekan
        });
    });
</script>