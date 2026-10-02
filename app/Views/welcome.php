<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

    <nav>
    <a href="/">Home</a>
    <a href="/tasks">Task List</a>
    <a href="/profile">Profile</a>
    <a href="/about">About</a>

    <?php if (session()->get('logged_in')): ?>
        <a href="/logout">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
    <?php endif; ?>
    </nav>

    <div class="container">

        <h1>Tasks for Today</h1>

        <p>Here are the tasks scheduled for today.</p>

        <?php if (!empty($tasks)): ?>

            <table>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>

                <?php foreach ($tasks as $task): ?>

                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td><?= esc($task['status']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                    </tr>

                <?php endforeach; ?>

            </table>

        <?php else: ?>

            <p>No tasks scheduled for today.</p>

        <?php endif; ?>

    </div>

</body>
</html>