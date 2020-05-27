<?php
  $tags = get_category_tags(array('category_name' => 'blog'));
?>
<div class="block page-header-block">
  <div class="container">
    <div class="control-panel">
      <div class="filter-action">
        <h1 class="title">
          QOL Blog
        </h1>
        <form action=".">
          <select name="tag_id" class="custom-select" onChange="this.form.submit()">
            <option value="">All products</option>
            @foreach($tags as $tag)
              <option value="{{ $tag->tag_id }}" {{ isset($_GET['tag_id']) ? ($tag->tag_id == $_GET['tag_id'] ? 'selected' : '') : '' }}>{{ $tag->tag_name }}</option>
            @endforeach
          </select>
        </form>
      </div>
      <div class="filter-buttons">
        {{-- <a href="#" class="btn btn-success btn-selected">
          News
          <i class="icon icon-close-white icon-ts"></i>
        </a>
        <a href="#" class="btn btn-success btn-selected">
          Events
          <i class="icon icon-close-white icon-ts"></i>
        </a>
        <a href="#" class="btn btn-outline-success btn-selected">
          Resources
          <i class="icon icon-plus-green icon-ts"></i>
          <i class="icon icon-plus-white icon-ts"></i>
        </a> --}}
      </div>
    </div>
  </div>
</div>