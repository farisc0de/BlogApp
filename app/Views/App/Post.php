<?= $this->extend("base"); ?>

<?= $this->section("title"); ?>Post<?= $this->endSection(); ?>

<?= $this->section("content"); ?>

<!-- Page Header -->
<header class="masthead" style="background-image: url(<?= site_url("/post/cover/{$post->id}"); ?>)">
    <div class=" overlay">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $post->title; ?></h1>
                    <h2 class="subheading"><?= $post->sub_title; ?></h2>
                    <span class="meta">Posted by
                        <a href="#"><?= $post->username; ?></a>
                        on <?= $post->created_at->humanize(); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $post->content; ?>
            </div>
        </div>
    </div>
</article>

<?= $this->endSection(); ?>