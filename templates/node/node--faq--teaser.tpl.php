<div class="panel-heading">
    <h4 class="panel-title">
        <a data-toggle="collapse" data-number="16" data-parent="#accordion40" class="collapsed" href="<?php echo '#collapse-'.$node->nid ?>"><i class=""></i>
            <?php echo $title ?>
        </a>
    </h4>
</div>

<div id="<?php echo 'collapse-'.$node->nid ?>" class="panel-collapse collapse" style="height: 0;">
    <div class="panel-body">
        <?php print render($content['field_answer_faq']); ?>
    </div>
</div>