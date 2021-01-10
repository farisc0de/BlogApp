<?= $this->extend("base"); ?>

<?= $this->section("title"); ?>Home<?= $this->endSection(); ?>

<?= $this->section("content"); ?>


<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= site_url('/page/cover/' . $page->slug); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1><?= $page->title; ?></h1>
                    <span class="subheading"><?= $page->sub_title; ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?= $page->content; ?>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>