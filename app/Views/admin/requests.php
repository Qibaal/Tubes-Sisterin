<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Adoption Requests</title>
</head>
<body>
    <h1>Adoption Requests</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Animal</th>
                <th>Income</th>
                <th>Living Type</th>
                <th>Has Pets</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><?= esc($request['id']) ?></td>
                    <td><?= esc($request['full_name']) ?></td>
                    <td><?= esc($request['animal_name']) ?></td>
                    <td><?= esc($request['income']) ?></td>
                    <td><?= esc($request['living_type']) ?></td>
                    <td><?= $request['has_pets'] ? 'Yes' : 'No' ?></td>
                    <td><?= esc($request['reason']) ?></td>
                    <td><?= esc($request['status']) ?></td>
                    <td>
                        <form action="/admin/requests/update/<?= $request['id'] ?>/approved" method="post">
                            <button type="submit">Approve</button>
                        </form>
                        <form action="/admin/requests/update/<?= $request['id'] ?>/rejected" method="post">
                            <button type="submit">Reject</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
