<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <a href="/users/create">Add New User</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <?php foreach ($user->roles as $role): ?>
                            <?= $role->name ?>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <form action="/users/<?= $user->id ?>/delete" method="POST">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
