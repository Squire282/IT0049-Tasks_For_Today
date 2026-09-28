<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
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

        <h1>All Tasks</h1>

        <p>Complete list of tasks in the system.</p>

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

            <p>No tasks found.</p>

        <?php endif; ?>

    </div>

</body>
</html>