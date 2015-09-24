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
<?php
$x = 1 ;
$term_style = '';
if(count($node->field_style_theme[LANGUAGE_NONE]) > 0){
    foreach($node->field_style_theme[LANGUAGE_NONE] as $key => $value):
        $term = $value['taxonomy_term'];
        if($x == count($node->field_style_theme[LANGUAGE_NONE]))
        {
            $term_style.= $term->name;
        }
        else
        {
            $term_style.= $term->name.', ';
        }
        $x++;
    endforeach;
}

// check icon Compatibility
?>
<?php $path_them = drupal_get_path('theme','hosting'); ?>
<?php $image = $node->field_thumnail_theme; ?>
<div class="portfolio-item">
    <a href="#" title="Conquer" class="portfolio-image" style="background-image: url(<?php print file_create_url($image[LANGUAGE_NONE][0]['uri']) ?>);">
        <img src="<?php echo $path_them.'/images/27x23.png'; ?>" alt="<?php echo $title ?>">
    </a>
    <!-- end portfolio-image -->
    <div class="portfolio-overlay"></div>
    <div class="portfolio-links">
        <a class="btn-images portfolio-imgpopup" href="<?php print file_create_url($image[LANGUAGE_NONE][0]['uri']) ?>" data-id="<?php echo $node->nid ?>" title="<?php echo $title; ?>"><i class="fa fa-image"></i></a>
        <a class="btn-quickview" href="<?php echo base_path().drupal_lookup_path('alias','node/'.$node->nid); ?>" title="<?php echo $title; ?>"><i class="fa fa-external-link"></i></a>
        <?php if(count($image[LANGUAGE_NONE]) > 1){ $x=0; ?>
        <p class="hidden">
            <?php for($i=1 ; $i <= count($image[LANGUAGE_NONE]) ; $i++){ ?>
                <?php if($x > 0){ ?>
                <a href="<?php print file_create_url($image[LANGUAGE_NONE][$x]['uri']) ?>" title="<?php echo $title ?>" class="portfolio-imgpopup"></a>
                <?php } ?>
            <?php $x++; } ?>
        </p>
        <?php } ?>
    </div>
    <!-- end portfolio-links -->
    <div class="portfolio-info">
        <!-- Item title -->
        <h4 class="portfolio-title"><a href="<?php echo base_path().drupal_lookup_path('alias','node/'.$node->nid); ?>" title=""><?php echo $title; ?></a></h4>
        <div class="portfolio-detail">
            <span><i class="fa fa-folder"></i>
                <?php print $term_style; ?>
            </span>
            <?php if(count($node->field_version['und']) > 0) :?>
            <span><i class="fa <?php print isset($node->field_compatibility['und'][0]['taxonomy_term']->name) ? 'fa-'.strtolower($node->field_compatibility['und'][0]['taxonomy_term']->name) : ''; ?>"></i>&nbsp;<?php print $node->field_version['und'][0]['value']; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <!-- end portfolio-info -->
</div>