<div class="blog masonry">
<div class="blog-item">
    <!-- Item Image -->
   <?php print render($content['field_media_file']); ?>
    <!-- End Item Image  -->
    <div class="blog-body">
        <!-- Item title -->
        <h4 class="blog-title">
            <a href="<?php print base_path().  drupal_lookup_path('alias','node/'.$node->nid); ?>" title="<?php print $title; ?>"><?php print $title; ?></a>
        </h4>
        <!-- End Item title -->
       <div class="blog-info">
                <!-- Date created -->
                <span>
                    <i class="fa fa-calendar-o"></i>
                    <span><?php print date('d F Y', $node->created) ?></span>
                </span>
                <!-- End Date created -->
                <!-- category -->
                <span>
                    <i class="fa fa-folder-open"></i>
                    <span><a href="#" title=""><?php print $node->type; ?></a></span>
                </span>
                <!-- end category -->
                <!-- comments -->
                <span>
                    <i class="fa fa-comments-o"></i>
                    <span><a href="#" title=""><?php print $comment_count; ?></a></span>
                </span>
                <!-- end comments -->
                <div class="blog-rating">
            <?php print render($content['field_rate']); ?>
                </div>
                <!-- end rating -->
            </div>
        <!-- End blog-info -->
        <div class="blog-content">
            <?php print render($content['body']) ?>
        </div>
        <!-- End blog-content -->
    </div>
    <!-- end blog-content -->
</div>
</div>