<?= $this->extend("Admin/base"); ?>

<?= $this->section("title"); ?>View Post<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<h1 class="title">Post</h1>

<a href="<?= site_url("/admin/posts"); ?>">&laquo; Back to index</a>

<div class="content">
    <dl>
        <dt class="has-text-weight-bold">Post Title</dt>
        <dd><?= esc($post->title); ?></dd>

        <dt class="has-text-weight-bold">Post Subtitle</dt>
        <dd><?= esc($post->sub_title); ?></dd>

        <dt class="has-text-weight-bold">Posted By</dt>
        <dd><?= $post->username; ?></dd>

        <dt class="has-text-weight-bold">Created at</dt>
        <dd><?= $post->created_at->humanize(); ?></dd>

        <dt class="has-text-weight-bold">Updated at</dt>
        <dd><?= $post->updated_at->humanize(); ?></dd>
    </dl>
</div>

<a class="button is-link" href="<?= site_url("/admin/posts/edit/{$post->id}"); ?>">Edit Post</a>
<a class="button is-danger" href="<?= site_url("/admin/posts/delete/{$post->id}"); ?>">Delete Post</a>

<?= $this->endSection(); ?>