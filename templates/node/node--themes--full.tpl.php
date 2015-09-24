<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>

<div class="portfolio-single p-popup">
    <div class="portfolio-single-head">
        <h2 class="portfolio-single-title"><?php print $title ?></h2>
        <!-- end title -->
        <?php if($content['field_style_theme']): ?>
        <div class="portfolio-single-cat">
            <span><i class="fa fa-folder"></i>
                <?php
                $x = 1;
                foreach($node->field_style_theme[LANGUAGE_NONE] as $key => $value): ?>
                    <?php $term = $value['taxonomy_term']; ?>
                    <?php if($x == count($node->field_style_theme[LANGUAGE_NONE])){
                       print '<span>'.$term->name.'</span> ';
                     } else {
                        print '<span>'.$term->name.'</span> , ';
                    } ?>
                <?php $x++; endforeach; ?>
            </span>
        </div>
        <?php endif; ?>
        <!-- end cat -->
    </div>
    <!-- end head -->
    <div class="portfolio-single-wapper">
        <div class="portfolio-single-body">
            <div class="row">
                <?php if($content['field_thumnail_theme']): ?>
                <div class="col-sm-6">
                    <div class="portfolio-single-img">
                        <?php print render($content['field_thumnail_theme']); ?>
                    </div>
                    <!-- end image -->
                </div>
                <?php endif; ?>
                <!-- end col -->
                <div class="col-sm-6">
                    <?php if($content['body']): ?>
                    <div class="portfolio-single-desc">
                       <?php print render($content['body']); ?>
                    </div>
                    <?php endif; ?>
                    <!-- end desc -->
                    <div class="portfolio-single-info">
                        <?php if(count($node->field_author_product['und']) > 0 ): $author = $node->field_author_product['und'][0]['entity']; ?>
                        <p><span><i class="fa fa-user"></i>&nbsp;<?php echo t('Author:') ?></span><?php print $author->name; ?></p>
                        <?php endif; ?>
                        <?php if($content['field_compatibility']): ?>
                        <p><span><i class="fa fa-cog"></i>&nbsp;<?php echo t('Compatibility:') ?></span><?php print $node->field_compatibility[LANGUAGE_NONE][0]['taxonomy_term']->name; ?></p>
                        <?php endif; ?>
                        <?php if($content['field_license']): ?>
                        <p><span><i class="fa fa-file-text-o"></i>&nbsp;<?php echo t('License:') ?></span><?php print $node->field_license[LANGUAGE_NONE][0]['value']; ?></p>
                        <?php endif; ?>
                        <p><span><i class="fa fa-money"></i>&nbsp;<?php echo t('Price:') ?></span><span class="text-primary"><?php  if(count($node->field_price_them) > 0) { print print $content['field_price_them'][0]['#markup'] ; } else { print t('Free') ; } ?></span></p>
                    </div>
                    <!-- end desc -->
                    <div class="portfolio-single-button">
                        <a class="btn btn-inverse  btn-icon upp" title="<?php echo $title ?>" href="http://themeforest.net/item/hosting-multipurpose-joomla-template/10628838"><i class="fa fa-cloud-download"></i><span>&nbsp;Free Download</span></a>
                        <a class="btn btn-primary btn-icon uppercase" href="http://demo.joomlavi.com/j3/jv-hosting/" target="_blank"><i class="fa fa-link"></i>Live Demo</a>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end body -->
    </div>
    <!-- end wrapper -->
</div>