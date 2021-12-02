<?php
    $categories = get_categories( array(
        'orderby' => 'name',
        'parent' => 0,
        'number'    => 6
    ));
?>
<div id="post-filter" class="post-filter">
	<div class="container">
		<div class="post-filter-inner">
           <ul class="categories-menu">
	           <?php foreach ($categories as $category) : ?>
                    <li class="category-menu-item">
                        <a href="<?php echo esc_url(get_category_link($category->term_id))?>"><?php echo esc_html($category->name); ?></a>
                    </li>
	           <?php endforeach; ?>
           </ul>
		</div>
	</div>
</div>