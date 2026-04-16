<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <h2>Dashboard</h2>
    <p>Welcome to Nanay Livy's POS System.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Today's Sales</h5>
                    <p class="card-text h3">₱ 0.00</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Active Utang (Listahan)</h5>
                    <p class="card-text h3"><?php echo $active_utang_count; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Low Stock Items</h5>
                    <p class="card-text h3">0</p>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>