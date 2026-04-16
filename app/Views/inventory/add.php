<div class="container mt-4">
    <h4>Add New Product</h4>
    <form action="<?= base_url('inventory/store') ?>" method="POST">
        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="item_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stock Quantity</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save Item</button>
        <a href="<?= base_url('inventory') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>