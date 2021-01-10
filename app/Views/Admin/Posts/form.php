<div class="form-group">
    <input class="form-control" placeholder="Title" type="text" name="title" id="title" value="<?= old('title', $post->title); ?>" />
</div>

<div class="form-group">
    <input class="form-control" placeholder="Sub Title" type="sub_title" name="sub_title" id="sub_title" value="<?= old('sub_title', $post->sub_title); ?>" />
</div>

<div class="form-group">
    <textarea name="content" placeholder="Content" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for="upload">Poster File</label>
    <input class="form-control" type="file" name="upload" id="upload" />
</div>