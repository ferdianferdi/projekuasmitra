<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-900 font-weight-bold">Form Produk - Item</h1>
</div>

<div class="container-fluid">
    <div class="card mb-4 mx-auto mt-3 w-50">
        <div class="card-header bg-gradient-dark">
            <h5 class="m-0 font-weight-bold text-gray-100 text-lg">Form Item</h5>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="<?php echo site_url('item/process') ?>" method="post">
                    <div class="form-group mb-3">
                        <label>Nama Item</label>
                        <input type="hidden" name="id_item" value="<?php echo $row->id_item ?>">
                        <input type="text" name="nama_item" value="<?php echo $row->nama_item ?>" class="form-control"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($kategori->result() as $pk => $data) { ?>
                                <option value="<?php echo $data->id_kategori ?>" <?php echo ($data->id_kategori == $row->id_kategori) ? 'selected' : 'null' ?>>
                                    <?php echo $data->nama_kategori ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Unit</label>
                        <select name="unit" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($unit->result() as $pu => $data) { ?>
                                <option value="<?php echo $data->id_unit ?>" <?php echo ($data->id_unit == $row->id_unit) ? 'selected' : 'null' ?>>
                                    <?php echo $data->nama_unit ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="harga_item" value="<?php echo $row->harga_item ?>"
                                class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group mb-3">
                        <button type="submit" name="<?php echo $page ?>" class="btn btn-success btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="float-right">
                            <a href="<?php echo site_url() . 'item' ?>" class="btn btn-danger btn-sm"><i
                                    class="fa fa-undo"></i>
                                Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>