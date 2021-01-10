<?= $this->extend("Admin/base"); ?>

<?= $this->section("title"); ?>Update a Post<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<h1 class="title">Update a Post</h1>

<div class="container">
    <?= form_open("/admin/posts/update/{$post->id}"); ?>

    <?= $this->include('/Admin/Posts/form'); ?>

    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-danger" href="<?= site_url("/admin/posts/show/{$post->id}"); ?>">Cancle</a>

    <?= form_close() ?>
</div>

<?= $this->endSection(); ?>