<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <nav>
        <a href="/">Home</a>
        <a href="/tasks">Task List</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    <div class="container">

        <h1>User Profile</h1>

        <?php if (!empty($user)): ?>

            <table>
                <tr>
                    <th>Information</th>
                    <th>Details</th>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><?= esc($user['username']) ?></td>
                </tr>

                <tr>
                    <td>Full Name</td>
                    <td><?= esc($user['full_name']) ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?= esc($user['email']) ?></td>
                </tr>

                <tr>
                    <td>Account Created</td>
                    <td><?= esc($user['created_at']) ?></td>
                </tr>

            </table>

        <?php else: ?>

            <p>No user found.</p>

        <?php endif; ?>

    </div>

</body>
</html>