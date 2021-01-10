<?= $this->extend("base"); ?>

<?= $this->section("title"); ?>Home<?= $this->endSection(); ?>

<?= $this->section("content"); ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= site_url('/img/home-bg.jpg'); ?>')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>Clean Blog</h1>
          <span class="subheading">A Blog Theme by Start Bootstrap</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php if (!empty($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
          <div class="post-preview">
            <a href="<?= site_url("/post/view/{$post->id}"); ?>">
              <h2 class="post-title">
                <?= esc($post->title); ?>
              </h2>
              <h3 class="post-subtitle">
                <?= esc($post->sub_title); ?>
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#"><?= esc($post->username); ?></a>
              on <?= $post->created_at->humanize(); ?>
            </p>
          </div>
          <hr>
        <?php endforeach; ?>
        <!-- Pager -->
        <div class="clearfix">
          <?= $pages->simpleLinks(); ?>
        </div>
      <?php else : ?>
        <h3>No posts found ):</h3>
      <?php endif; ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>