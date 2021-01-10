<?= $this->extend("base"); ?>

<?= $this->section("title"); ?>Login<?= $this->endSection(); ?>

<?= $this->section("content"); ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= site_url('/img/login-bg.jpg'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?php if (session()->has('warning')) : ?>
        <div class="alert alert-danger">
            <p>
                <i class="fa fa-times-circle"></i> <?= session('warning'); ?>
            </p>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?= form_open("/login/create"); ?>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" id="name" required data-validation-required-message="Please enter your username." value="<?= old('username'); ?>">
                </div>
            </div>

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required data-validation-required-message="Please enter your password.">
                </div>
            </div>

            <div class="form-group mt-4">
                <input type="checkbox" class="control" name="remember_me" id="remember_me" <?php if (old('remember_me')) : ?>checked<?php endif; ?>>
                <label for="remember_me">Remember Me</label>
            </div>

            <div class="control-group mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>