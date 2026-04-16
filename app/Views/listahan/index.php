<!-- Use your existing layout/header -->
<div class="container mt-4">
    <h2>Digital Listahan (Utang)</h2>
    
    <!-- Add Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Add New Entry</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Items</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listahan as $item): ?>
            <tr>
                <td><?= $item['customer_name'] ?></td>
                <td><?= $item['items'] ?></td>
                <td>₱<?= number_format($item['amount'], 2) ?></td>
                <td><?= date('M d, Y', strtotime($item['created_at'])) ?></td>
                <td>
                    <a href="/listahan/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <form action="/listahan/store" method="POST" class="modal-content">
      <div class="modal-header"><h5>Add New Utang</h5></div>
      <div class="modal-body">
        <div class="mb-3">
            <label>Customer Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Items (Description)</label>
            <textarea name="items" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save Entry</button>
      </div>
    </form>
  </div>
</div>