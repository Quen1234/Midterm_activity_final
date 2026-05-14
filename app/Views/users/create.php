<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <h2>Add New User</h2>
    <div class="card mt-3">
        <div class="card-body">
            <form action="<?= base_url('users/store') ?>" method="post">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Save User</button>
                <a href="/users" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>