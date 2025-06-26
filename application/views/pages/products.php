<h1 class="mt-3 text-black">Produk Kami</h1>
<div class="row mt-2">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="<?= base_url('assets/images/products/' . $product->gambar); ?>" class="card-img-top" alt="<?= $product->nama; ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $product->nama; ?></h5>
                        <p class="card-text" style="white-space: normal;"><?= nl2br($product->deskripsi); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>