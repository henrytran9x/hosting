<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php $x = 0;$y = 0; ?>
<div class="row">
    <div class="col-sm-6">
        <ul class="list-unstyled list-links-icon">
            <?php foreach ($rows as $id => $row): ?>
                <?php if ($x > 0 && $y <= count($rows)/2) { ?>
                    <li>
                        <?php print $row; ?>
                    </li>
                <?php } $x++; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-sm-6">
        <ul class="list-unstyled list-links-icon">
            <?php foreach ($rows as $id => $row): ?>
                <?php if ($x > count($rows)/2 && $y <= count($rows)) { ?>
                    <li>
                        <?php print $row; ?>
                    </li>
                <?php } $x++;?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
