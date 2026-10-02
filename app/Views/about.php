<!DOCTYPE html>
<html>
<head>
    <title>About</title>
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

        <h1>About</h1>

        <h2>Tasks for Today Management System</h2>

        <p>
            The Tasks for Today Management System is a simple web
            application developed using CodeIgniter 4.
        </p>

        <p>
            The system allows users to view tasks scheduled for today,
            view a complete list of tasks, and access user profile
            information.
        </p>

        <h2>Developer</h2>

        <p>
            <strong>Name:</strong> Mc Kenrick Cafugauan
        </p>

    </div>

</body>
</html>