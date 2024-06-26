<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Form Produk - Kategori</h1>
</div>

<div class="card shadow mb-4">
    <?php $this->load->view('messages') ?>
    <div class="card-header py-3 bg-gradient-dark">
        <div class="float-right">
            <a href="<?php echo base_url() . 'kategori/add_kategori' ?>" class="btn btn-primary btn-flat btn-sm">
                <i class="fa fa-user-plus"></i> Tambah Kategori
            </a>
        </div>
        <h6 class="m-0 font-weight-bold text-gray-100 text-lg">Data Kategori</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $pk => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?php echo $no++ ?></td>
                            <td><?php echo $data->nama_kategori ?></td>
                            <td class=" text-center" width="160px">
                                <a href="<?php echo base_url() . 'kategori/edit_kategori/' . $data->id_kategori ?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a href="<?php echo base_url() . 'kategori/delete_kategori/' . $data->id_kategori ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>