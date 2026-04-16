<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <div class="d-flex justify-content-between mb-3">
        <h2>User Management</h2>
        <a href="/users/create" class="btn btn-success">Add New User</a>
    </div>

    <?php if(session()->getFlashdata('success')):?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif;?>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><span class="badge bg-<?= $user['role'] == 'admin' ? 'primary' : 'secondary' ?>"><?= ucfirst($user['role']) ?></span></td>
                        <td>
                            <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>