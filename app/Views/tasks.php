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

    <?php if (session()->get('logged_in')): ?>

        <a href="/logout">Logout</a>

    <?php else: ?>

        <a href="/login">Login</a>

    <?php endif; ?>

</nav>


<div class="container">

    <h1>All Tasks</h1>

    <p>Complete list of active tasks in the system.</p>


    <?php if (session()->has('success')): ?>

        <div class="success">
            <p><?= esc(session('success')) ?></p>
        </div>

    <?php endif; ?>


    <?php if (session()->has('error')): ?>

        <div class="errors">
            <p><?= esc(session('error')) ?></p>
        </div>

    <?php endif; ?>


    <?php if (session()->get('logged_in')): ?>

        <p>
            <a href="<?= site_url('tasks/new') ?>">
                Add New Task
            </a>
        </p>

    <?php endif; ?>


    <?php if (!empty($tasks)): ?>

        <table>

            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>

                <?php if (session()->get('logged_in')): ?>
                    <th>Actions</th>
                <?php endif; ?>

            </tr>


            <?php foreach ($tasks as $task): ?>

                <tr>

                    <td>
                        <?= esc($task['title']) ?>
                    </td>

                    <td>
                        <?= esc($task['status']) ?>
                    </td>

                    <td>
                        <?= esc($task['task_date']) ?>
                    </td>


                    <?php if (session()->get('logged_in')): ?>

                        <td>

                            <a href="<?= site_url(
                                'tasks/edit/' . $task['id']
                            ) ?>">
                                Edit
                            </a>


                            <form
                                action="<?= site_url(
                                    'tasks/archive/' . $task['id']
                                ) ?>"
                                method="post"
                                style="display:inline;"
                            >

                                <?= csrf_field() ?>

                                <button type="submit">
                                    Archive
                                </button>

                            </form>

                        </td>

                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>

        </table>

    <?php else: ?>

        <p>No tasks found.</p>

    <?php endif; ?>

</div>

</body>
</html>