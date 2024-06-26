<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Form User</h1>
</div>

<div class="container-fluid">
    <div class="card mb-4 mx-auto mt-3 w-50">
        <div class="card-header bg-gradient-dark">
            <h3 class="m-0 font-weight-bold text-gray-100 text-lg">Form Edit User</h3>

        </div>
        <div class="card-body">
            <div class="form-group">
                <form action="" method="post">
                    <div class="form-group mb-3 <?php echo form_error('nama') ? 'has-error' : null ?>">
                        <label>Nama</label>
                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                        <input type="text" name="nama"
                            value="<?php echo $this->input->post('nama') ? $this->input->post('nama') : $row->nama ?>"
                            class="form-control">
                        <?php echo form_error('nama'); ?>
                    </div>
                    <div class="form-group mb-3 <?php echo form_error('username') ? 'has-error' : null ?>">
                        <label>Username</label>
                        <input type="text" name="username"
                            value="<?php echo $this->input->post('username') ? $this->input->post('username') : $row->username ?>"
                            class="form-control">
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group mb-3 <?php echo form_error('password') ? 'has-error' : null ?>">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $this->input->post('password') ?>"
                            class="form-control">
                        <?php echo form_error('password'); ?>
                    </div>
                    <div class="form-group mb-3 <?php echo form_error('konfpass') ? 'has-error' : null ?>">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="konfpass" value="<?php echo $this->input->post('konfpass') ?>"
                            class="form-control">
                        <?php echo form_error('konfpass'); ?>
                    </div>
                    <div class="form-group mb-3 <?php echo form_error('posisi') ? 'has-error' : null ?>">
                        <label>Posisi</label>
                        <select name="posisi" class="form-control">
                            <?php $posisi = $this->input->post('posisi') ? $this->input->post('posisi') : $row->posisi ?>
                            <option value="Admin" <?= $posisi == 'Admin' ? 'selected' : null ?>>Admin</option>
                            <option value="Kasir" <?= $posisi == 'Kasir' ? 'selected' : null ?>>Kasir</option>
                        </select>
                        <?php echo form_error('posisi'); ?>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <div class="float-right">
                            <a href="<?php echo site_url() . 'user' ?>" class="btn btn-danger btn-flat"><i
                                    class="fa fa-undo"></i>
                                Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>