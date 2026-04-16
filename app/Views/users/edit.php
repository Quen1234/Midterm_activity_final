<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <h2>Edit User</h2>
    <div class="card mt-3">
        <div class="card-body">
            <form action="/users/update/<?= $user['id'] ?>" method="post">
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
                </div>
                <div class="mb-3">
                    <label>Password (Leave blank to keep current password)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="/users" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>