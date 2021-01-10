<?= $this->extend("Admin/base"); ?>

<?= $this->section('title') ?>Delete Post<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<h1 class="title">Delete the post</h1>

<p>Are you sure ?</p>

<?= form_open('/admin/posts/delete/' . $post->id); ?>
<button class="btn btn-primary" type="submit">Yes</button>
<a class="btn btn-danger" href="<?= site_url("/admin/posts/show/{$post->id}"); ?>">Cancle</a>
<?= form_close(); ?>

<?= $this->endSection() ?>