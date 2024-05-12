<!DOCTYPE html>
<html lang="en">
<?php require_once APPPATH . 'Views\\Template\\head.php'; ?>

<body>

    <div class="container center" style="height: 100vh;">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <h2>Login</h2>
                <form action="<?= base_url() ?>/login" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary m-1">Login</button>
                </form>
                <a href="/" class="btn btn-secondary m-1">Back to Home</a>
            </div>
        </div>
    </div>

</body>


</html>