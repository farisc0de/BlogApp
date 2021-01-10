<?= $this->extend("Admin/base"); ?>

<?= $this->section("title"); ?>Dashboard<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<div class="container">
    <h1 class="title">Dashboard</h1>

    <ul>
        <li><a href="<?= site_url("/admin/posts"); ?>">Posts</a></li>
        <li><a href="<?= site_url("/admin/users"); ?>">Users</a></li>
    </ul>
</div>

<?= $this->endSection(); ?>