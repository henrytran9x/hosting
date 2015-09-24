  <div class="blk-domain blk-grey-bold">
      <div class="container">
        <div class="jv-checkdomain">
          <form  method="post" id="<?php print $domain['#form_id'] ?>" class="jv-checkdomainForm clearfix" accept-charset="UTF-8">
              <span class="jvLabel pull-left wow fadeIn">Get Domain:</span>
              <div class="input-group pull-left wow fadeIn" data-wow-delay="0.2s">
                  <span class="input-group-addon">www.</span>
                  <!--<input class="form-control" name="domainname" type="text">-->
                  <?php print render($domain['domain_text']); ?>
              </div>
              <!-- end input-group -->
              <div class="dropdown pull-left wow fadeIn" data-wow-delay="0.4s">
                  <button class="btn btn-default btn-lg dropdown-toggle" type="button" id="domaintypes" data-toggle="dropdown">
                      Domain Types <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu" role="menu" aria-labelledby="domaintypes">
                      <div class="form clearfix">
                        <div class="checkbox all">
                          <label>
                                  <input type="checkbox" name="all" checked="checked">Check All Domain Types</label>
                        </div>
                        <hr/>
                      <?php print render($domain['exts']) ?>
                      </div>
                  </div>
                  <!-- End dropdown menu -->
              </div>
              <!-- End dropdown -->
              <!--<input class="btn btn-primary btn-lg pull-left wow fadeIn" data-wow-delay="0.6s" type="submit" name="submitBtn" value="Search"> -->
               <?php print render($domain['submit']) ?>
               <?php print render($domain['form_build_id']); ?>
               <?php print render($domain['form_token']);?>
               <?php print render($domain['form_id'])?>

          </form>
        </div>
        <!-- end jv-checkdomain -->
      </div>
      <!-- / container -->
    </div>
    <!-- / domain -->

<script type="text/javascript">
  (function($){
    $(document).ready(function() {

        var check_all = $('#domain_finder_search_form input[name="all"]');
        check_all.change(function(event) {
            if(this.checked)
            {
               $('#domain_finder_search_form #edit-exts input[type="checkbox"]').prop('checked',true);
            }
            else
            {
              $('#domain_finder_search_form #edit-exts input[type="checkbox"]').prop('checked',false);
            }
        });
    });
  }(jQuery));
</script>
