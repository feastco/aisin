<h1 class="mt-3 text-black">Kontak Kami</h1>
<p>Informasi kontak akan ditampilkan di sini.</p>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="row mt-2">
    <div class="col-md-6">
        <!-- <h3>Hubungi Kami</h3> -->
        <form method="post" action="<?= base_url('Contact/kirim') ?>">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Tulis pesan Anda" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
    <div class="col-md-6 text-black d-flex justify-content-center align-items-center">
        <!-- <h3>Lokasi Kami</h3> -->
        <!-- Image Embed -->
        <img src="<?= base_url('assets/images/Webinar-rafiki.png') ?>" alt="ask" class="img-fluid" style="max-height: 300px; object-fit: cover; border:0;">
    </div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000); // 5 seconds
    });
</script>