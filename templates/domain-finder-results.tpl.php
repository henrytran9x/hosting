<?php

/**
 * @file
 * This file will print the domain attributes.
 */
?>

<div class="jv-checkdomain" id="jv-checkdomain">
<?php
   print render($domain_finder_search_form);
 ?>
<div class="resultWrap">
      <div id="caption" class="caption h4"><?php print $domain_finder_results_title; ?></div>
      <div id="result" class="result">
        <div class="row">
              <?php print $domain_finder_results; ?>
        </div>
      </div>
</div>
<script type="text/javascript">
  (function($){
    $(document).ready(function() {
      $('.domain-finder #section-main-content > .dexp-container').addClass('container');
    });
  }(jQuery));

</script>
