<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Categories Management</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="fas fa-plus me-2"></i>Add New Category
        </button>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories) && is_array($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><i class="<?= esc($category['icon'] ?? 'fas fa-box') ?> fa-lg text-primary"></i></td>
                                    <td><?= esc($category['name']) ?></td>
                                    <td><?= date('M d, Y h:i A', strtotime($category['created_at'])) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white edit-btn" 
                                                data-id="<?= $category['id'] ?>" 
                                                data-name="<?= esc($category['name']) ?>"
                                                data-icon="<?= esc($category['icon'] ?? 'fas fa-box') ?>"
                                                data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger delete-btn" 
                                                data-id="<?= $category['id'] ?>"
                                                data-name="<?= esc($category['name']) ?>"
                                                data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4">No categories found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('categories/store') ?>" method="post" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="categoryIcon" class="form-label">Category Icon (FontAwesome Class)</label>
                    <select class="form-select" id="categoryIcon" name="icon">
                        <option value="fas fa-box">Default Box</option>
                        <option value="fas fa-utensils">Food / Snacks</option>
                        <option value="fas fa-coffee">Beverages</option>
                        <option value="fas fa-bottle-water">Drinks</option>
                        <option value="fas fa-soap">Hygiene / Soap</option>
                        <option value="fas fa-medkit">Medicine</option>
                        <option value="fas fa-apple-whole">Fruits</option>
                        <option value="fas fa-carrot">Vegetables</option>
                        <option value="fas fa-egg">Dairy / Eggs</option>
                        <option value="fas fa-candy-cane">Sweets</option>
                        <option value="fas fa-broom">Cleaning</option>
                        <option value="fas fa-shirt">Clothing</option>
                        <option value="fas fa-spray-can">Beauty Products</option>
                    </select>
                    <small class="text-muted">Choose an icon that best represents this category.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="editCategoryForm" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_method" value="PUT">
                <div class="mb-3">
                    <label for="editCategoryName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="editCategoryName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="editCategoryIcon" class="form-label">Category Icon (FontAwesome Class)</label>
                    <select class="form-select" id="editCategoryIcon" name="icon">
                        <option value="fas fa-box">Default Box</option>
                        <option value="fas fa-utensils">Food / Snacks</option>
                        <option value="fas fa-coffee">Beverages</option>
                        <option value="fas fa-bottle-water">Drinks</option>
                        <option value="fas fa-soap">Hygiene / Soap</option>
                        <option value="fas fa-medkit">Medicine</option>
                        <option value="fas fa-apple-whole">Fruits</option>
                        <option value="fas fa-carrot">Vegetables</option>
                        <option value="fas fa-egg">Dairy / Eggs</option>
                        <option value="fas fa-candy-cane">Sweets</option>
                        <option value="fas fa-broom">Cleaning</option>
                        <option value="fas fa-shirt">Clothing</option>
                        <option value="fas fa-spray-can">Beauty Products</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Category Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="post" id="deleteCategoryForm" class="modal-content">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_method" value="DELETE">
                <p>Are you sure you want to delete category: <strong id="deleteCategoryName"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Category</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Edit button click handler
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const icon = this.dataset.icon;
                
                const form = document.getElementById('editCategoryForm');
                form.action = `<?= base_url('categories/update') ?>/${id}`;
                document.getElementById('editCategoryName').value = name;
                document.getElementById('editCategoryIcon').value = icon;
            });
        });

        // Delete button click handler
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const name = this.dataset.name;
                
                const form = document.getElementById('deleteCategoryForm');
                form.action = `<?= base_url('categories/delete') ?>/${id}`;
                document.getElementById('deleteCategoryName').textContent = name;
            });
        });

        // Auto-dismiss alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => {
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    });
</script>
<?= $this->endSection() ?>
