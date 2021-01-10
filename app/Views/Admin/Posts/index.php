<?= $this->extend("Admin/base"); ?>

<?= $this->section("title"); ?>Posts<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<div class="container">
    <h1 class="title">Posts</h1>

    <a class="button is-link" href="<?= site_url('/admin/posts/new'); ?>">Add a Post</a>
    <div class="row">
        <div class="col">
            <?php if ($posts) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Post Title</th>
                            <th>Post Subtitle</th>
                            <th>Posted By</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post) : ?>
                            <tr>
                                <td>
                                    <a href="<?= site_url('/admin/posts/show/' . $post->id); ?>">
                                        <?= $post->title; ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $post->sub_title; ?>
                                </td>
                                <td>
                                    <?= $post->username; ?>
                                </td>
                                <td>
                                    <?= $post->created_at->humanize(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <?= $pages->simpleLinks(); ?>
            <?php else : ?>
                <p>There are no posts</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>