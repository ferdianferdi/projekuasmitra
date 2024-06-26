<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-900 font-weight-bold">Form Transaksi - Penjualan</h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div align="right">
                            <h5>Invoice :</h5>
                            <h1><b><span id="struk"><?php echo $struk ?></span></b></h1>
                            <h4><span id="total_harga" style="font-size: 40px;">Rp. 0</span></h4>
                        </div>
                    </div><br>
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width: 25%">
                                <label for="tanggal">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>"
                                        class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 25%">
                                <label for="user" user>Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="user" id="user"
                                        value="<?= $this->fungsi->login_user()->nama ?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3"></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatables" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th width="15%">Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tambbah_keranjang">
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width: 25%">
                                <label for="customer">Customer</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select id="customer" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach ($customer as $cust => $data) {
                                            echo '<option value="' . $data->id_customer . '">' . $data->nama_customer . '
                                                </option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style=" vertical-align: top; width: 25%">
                                <label for="item">Item</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="text" id="id_item" class="form-control" autofocus>
                                    <input type="hidden" id="nama_item">
                                    <input type="hidden" id="harga_item">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-item">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <td style="width: 25%">
                            <label for="jumlah">Jumlah</label>
                        </td>
                        <td>
                            <input type="number" id="jumlah" value="0" class="form-control">
                        </td>
                        <td>
                            <div>
                                <button type="button" id="tambah_keranjang"
                                    class="btn btn-primary btn-sm">Tambah</button>
                            </div>
                        </td>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                </div>
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width: 25%">
                                <label for="total">Total Harga</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 25%">
                                <label for="tunai">Tunai</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="tunai" value="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <td style="width: 25%">
                            <label for="kembalian">Kembalian</label>
                        </td>
                        <td>
                            <input type="number" id="kembalian" class="form-control" readonly>
                        </td>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <br><br>
            <div>
                <button id="bayar_pesanan" class="btn btn-success btn-lg"><i class="fas fa-check-circle"></i>
                    Bayar</button>
                <br><br>
                <button id="batal_bayar" class="btn btn-danger btn-lg"><i class="fas fa-times-circle"></i>
                    Batal</button>
            </div>
        </div>
    </div>
</div>