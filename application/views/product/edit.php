<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" data-url="<?= base_url('Product') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('Product') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow">
                                <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                                <div class="card-body">
                                    <form action="<?= base_url('product/edit/' . $product->id) ?>" id="form-tambah" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="nama"><strong>Nama Product</strong></label>
                                            <input type="text" name="nama" class="form-control" required value="<?= $product->nama ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi"><strong>Deskripsi</strong></label>
                                            <textarea name="deskripsi" class="form-control" required><?= $product->deskripsi ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar"><strong>Gambar</strong></label>
                                            <input type="file" name="gambar" class="form-control-file">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                            <?php if($product->gambar): ?>
                                                <div class="mt-2">
                                                    <img src="<?= base_url('assets/images/products/' . $product->gambar) ?>" width="100">
                                                </div>
                                            <?php endif ?>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- load footer -->
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <?php $this->load->view('partials/js.php') ?>
</body>

</html>