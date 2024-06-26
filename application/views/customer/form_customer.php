<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Form Customer</h1>
</div>

<div class="container-fluid">
    <div class="card mb-4 mx-auto mt-3 w-50">
        <div class="card-header bg-gradient-dark">
            <h3 class="m-0 font-weight-bold text-gray-100 text-lg">Form Tambah Customer</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="<?php echo site_url('customer/process') ?>" method="post">
                    <div class="form-group mb-3">
                        <label>Nama Customer</label>
                        <input type="hidden" name="id_customer" value="<?php echo $row->id_customer ?>">
                        <input type="text" name="nama_customer" value="<?php echo $row->nama_customer ?>"
                            class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <select name="jk_customer" value="<?php echo $row->jk_customer ?>" class="form-control"
                            required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-Laki">L</option>
                            <option value="Wanita">W</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="<?php echo $page ?>" class="btn btn-success btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <div class="float-right">
                            <a href="<?php echo site_url() . 'customer' ?>" class="btn btn-danger btn-sm"><i
                                    class="fa fa-undo"></i>
                                Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>