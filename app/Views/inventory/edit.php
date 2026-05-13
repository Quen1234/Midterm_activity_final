<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<style>
    .form-card {
        background: white;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        max-width: 800px;
        margin: 2rem auto;
    }
    .form-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        padding: 2.5rem;
        border-radius: 20px 20px 0 0;
        color: white;
    }
    .input-group-custom {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }
    .input-group-custom:focus-within {
        border-color: var(--primary-color);
        background-color: white;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }
    .input-group-custom label {
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #64748b;
        margin-bottom: 2px;
        display: block;
    }
    .input-group-custom input, .input-group-custom select {
        border: none;
        background: transparent;
        padding: 0;
        font-weight: 500;
        color: #1e293b;
    }
    .input-group-custom input:focus, .input-group-custom select:focus {
        outline: none;
        box-shadow: none;
    }
    .btn-save {
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container py-4">
    <div class="form-card">
        <div class="form-header text-center">
            <div class="mb-3">
                <i class="fas fa-edit fa-3x opacity-50"></i>
            </div>
            <h2 class="fw-bold mb-1">Edit Product</h2>
            <p class="mb-0 opacity-75">Update the details for <strong><?= esc($item['item_name']) ?></strong>.</p>
        </div>

        <div class="p-4 p-md-5">
            <form action="<?= base_url('inventory/update/'.$item['id']) ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="input-group-custom">
                            <label><i class="fas fa-tag me-1"></i> Product Label / Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="<?= esc($item['item_name']) ?>" placeholder="e.g. Coca-Cola 1.5L" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group-custom">
                            <label><i class="fas fa-layer-group me-1"></i> Category</label>
                            <input type="text" name="category" list="categoryOptions" class="form-control" value="<?= esc($item['category']) ?>" placeholder="Select or Type..." required>
                            <datalist id="categoryOptions">
                                <option value="Beverages">
                                <option value="Snacks">
                                <option value="Canned Goods">
                                <option value="Essentials">
                            </datalist>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group-custom">
                            <label><i class="fas fa-coins me-1"></i> Price (₱)</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="<?= esc($item['price']) ?>" placeholder="0.00" required>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group-custom">
                            <label><i class="fas fa-cubes me-1"></i> Quantity</label>
                            <input type="number" name="stock" class="form-control" value="<?= esc($item['stock']) ?>" placeholder="0" required>
                        </div>
                    </div>
                </div>

                <hr class="my-5 opacity-50">

                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= base_url('stock') ?>" class="text-secondary text-decoration-none fw-semibold">
                        <i class="fas fa-arrow-left me-1"></i> Back to Stocks
                    </a>
                    <div>
                        <a href="<?= base_url('stock') ?>" class="btn btn-light px-4 me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-save">
                            <i class="fas fa-check-circle me-2"></i> Update Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
