</div> <!-- Content Area -->

<footer class="footer">
    <div class="container text-center">
        <div class="row justify-content-center">
            <!-- Lokasi Kami -->
            <div class="col-md-4 mb-2 mb-md-0">
                <h5 class="font-weight-bold mb-3">Lokasi Kami</h5>
                <iframe src="https://www.google.com/maps?q=-6.388865498059864,107.29881738383853&z=15&output=embed" width="100%" height="200" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <!-- Informasi Kontak -->
            <div class="col-md-4 mb-2 mb-md-0">
                <h5 class="font-weight-bold mb-3">Informasi Kontak</h5>
                <p><strong>PT. Aisin Indonesia</strong><br> Kawasan Industri KIIC Lot LL No. 9 - 10, Jl. Harapan 8, Kel. Parung Mulia, Kec. Ciampel, Parungmulya, Kec. Ciampel, Karawang, Jawa Barat<br> Telepon: <a href="tel:02678643131" class="text-white">02678643131</a><br> Email: <a href="mailto:info@aisin.co.id" class="text-white">info@aisin.co.id</a></p>
            </div>
            <!-- Ikuti Kami -->
            <div class="col-md-2 mb-2 mb-md-0">
                <h5 class="font-weight-bold mb-3">Ikuti Kami</h5>
                <div class="d-flex flex-column align-items-center">
                    <a href="#" class="text-white mb-2"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="#" class="text-white mb-2"><i class="fab fa-instagram"></i> Instagram</a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="bg-primary text-center">
    <p class="mb-0 py-3 text-white">&copy; <?= date('Y'); ?> PT. Aisin Indonesia. All Rights Reserved.</p>
</div>

<!-- Script -->
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    // Script untuk animasi atau efek lainnya (jika diperlukan)
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });
</script>
</body>

</html>