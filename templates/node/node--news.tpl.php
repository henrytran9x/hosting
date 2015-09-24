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
<div class="blog blog-single">
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
        <div class="blog-meta">
            <?php if ($type_media): ?>
                <div class="blog-meta-icon">
                    <?php $icon = ''; ?>
                    <?php if ($type_media == 'image') {
                        $icon = 'fa-picture-o';
                    } if ($type_media == 'video') {
                        $icon = 'fa fa-film';
                    } ?>
                    <i class="fa <?php echo $icon; ?>"></i>
                </div>
<?php endif; ?>
            <!-- End blog-meta-icon -->
            <div class="blog-meta-date">
                <h4 class="blogDate"><?php print date('d', $node->created); ?></h4>
                <h5 class="blogMonth text-center"><?php print date('F', $node->created); ?></h5>
            </div>
            <!-- End blog-meta-date -->
                <?php $total_vote = fivestar_get_votes('node', $node->nid); ?>
                <?php if ($total_vote): ?>
                <div class="blog-meta-vote text-center">
                    <span class="fa fa-heart-o"></span>
                    <?php if (count($total_vote['count']) > 0) { ?>
                        <h6> <?php print $total_vote['count']['value'] . '&nbsp;' . t('(votes)') ?></h6>
                <?php } else { ?>
                        <h6> <?php print '0' . t('(votes)') ?></h6>
    <?php } ?>
                </div>
<?php endif; ?>
            <!-- End blog-meta-date -->
        </div>
        <div class="blog-body">
            <div class="blog-info">
                <!-- Date created -->
                <span>
                    <i class="fa fa-calendar-o"></i>
                    <span><?php print date('d F Y', $node->created) ?></span>
                </span>
                <!-- End Date created -->
                <!-- Author -->
                <span>
                    <i class="fa fa-user"></i>
                    <span><a href="javascipt:void(0)" title=""><?php print $author_name; ?></a></span>
                </span>
                <!-- End Author -->
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
<?php print render($title_prefix); ?>
            <?php if (!$page): ?>
                <h2<?php print $title_attributes; ?>>
                    <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
                </h2>
<?php endif; ?>
                <?php print render($title_suffix); ?>

            <div class="content clearfix"<?php print $content_attributes; ?>>

                <?php
                // We hide the comments and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                print render($content);
                ?>
            </div>
            <!--
            <?php if ($display_submitted): ?>
                    <div class="meta submitted">
                <?php print $user_picture; ?>
    <?php print $submitted; ?>
                    </div>
                <?php endif; ?>
            -->
            <div class="blog-author clearfix">
<?php print $user_picture; ?>
                <div class="blog-author-detail">
                    <?php if ($author_name): ?>
                        <h3 class="blog-author-name">
                            <a rel="author" href="<?php print base_path() . '/user/' . $uid ?>"><?php print $author_name ?></a>
                        </h3>
                    <?php endif; ?>
                    <?php if ($introduction): ?>
                        <?php print $introduction; ?>
                    <?php endif; ?>
                    <?php if ($email_user): ?>
                        <span class="blog-author-link"><i class="fa fa-globe"></i>&nbsp;<?php print $email_user; ?></span>
                    <?php endif; ?>
<?php if ($website_user): ?>
                        <span class="blog-author-link"><i class="fa fa-envelope-o"></i>&nbsp;<?php print $website_user; ?></span>
            <?php endif; ?>
                </div>
            </div>

            <?php
            // Remove the "Add new comment" link on the teaser page or if the comment
            // form is being displayed on the same page.
            if ($teaser || !empty($content['comments']['comment_form'])) {
                unset($content['links']['comment']['#links']['comment-add']);
            }
            // Only display the wrapper div if there are links.
            $links = render($content['links']);
            if ($links):
                ?>
                <div class="link-wrapper">
                <?php print $links; ?>
                </div>
<?php endif; ?>

<?php print render($content['comments']); ?>
        </div>
    </div>
</div>