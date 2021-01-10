<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(0);
?>
<nav>
    <ul class="pager">
        <a class="btn btn-primary float-right <?= $pager->hasPrevious() ? '' : 'hidden' ?>" href="<?= $pager->getPrevious() ?? '#' ?>" <?= $pager->hasPrevious() ? '' : 'hidden' ?>><?= lang('Pager.older') ?> &rarr;</a>

        <a class="btn btn-primary float-left" href="<?= $pager->getnext() ?? '#' ?>" <?= $pager->hasNext() ? '' : 'hidden' ?>> &larr; <?= lang('Pager.newer') ?></a>
    </ul>
</nav>