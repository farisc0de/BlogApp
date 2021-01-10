<?= $this->extend("Admin/base"); ?>

<?= $this->section("title"); ?>Add new post<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<h1 class="title">Add new post</h1>

<?php if (session()->has('errors')) : ?>
    <ul>
        <?php foreach (session('errors') as $error) : ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="container">
    <?= form_open_multipart("/admin/posts/create"); ?>
    <input value="<?= $user->id; ?>" name="user_id" hidden>
    <div class="container-fluid">
        <?= $this->include('/Admin/Posts/form'); ?>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Save</button>
        <a class="btn btn-danger" href="<?= site_url("/admin/posts"); ?>">Cancle</a>
    </div>

    <?= form_close() ?>
</div>

<?= $this->endSection(); ?>