<div class="container mt-4">
    <h3>Inventory List</h3>
    <a href="<?= base_url('inventory/add') ?>" class="btn btn-primary mb-3">Add New Item</a>

    <?php if(session()->getFlashdata('status')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('status') ?></div>
    <?php endif; ?>

    <table class="table table-striped border">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inventory as $item): ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['item_name'] ?></td>
                <td><?= $item['category'] ?></td>
                <td>₱<?= number_format($item['price'], 2) ?></td>
                <td>
                    <?= $item['stock'] ?>
                    <?php if($item['stock'] <= 5): ?>
                        <span class="badge bg-danger">Low!</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>