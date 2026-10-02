<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title) ?></title>
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

    <h1>Add New Task</h1>


    <?php if (session()->has('errors')): ?>

        <div class="errors">

            <?php foreach (session('errors') as $error): ?>

                <p><?= esc($error) ?></p>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>


    <form action="<?= site_url('tasks/create') ?>" method="post">

        <?= csrf_field() ?>


        <p>
            <label for="title">Task Title</label><br>

            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
            >
        </p>


        <p>
            <label for="status">Status</label><br>

            <select id="status" name="status">

                <option
                    value="pending"
                    <?= old('status') === 'pending' ? 'selected' : '' ?>
                >
                    Pending
                </option>

                <option
                    value="completed"
                    <?= old('status') === 'completed' ? 'selected' : '' ?>
                >
                    Completed
                </option>

            </select>
        </p>


        <p>
            <label for="task_date">Task Date</label><br>

            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
            >
        </p>


        <button type="submit">
            Add Task
        </button>

    </form>


    <p>
        <a href="<?= site_url('tasks') ?>">
            Back to Task List
        </a>
    </p>

</div>

</body>
</html>