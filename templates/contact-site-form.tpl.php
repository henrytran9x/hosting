<div class="blk-content">
      <div class="container">
        <div class="row contactInfo">
          <div class="col-sm-4">
            <div class="contactInfoDetail">
              <div><i class="fa fa-building"><span class="hidden">hidden</span></i> <span class="value"><?php echo str_replace(array("\n", "\r"), '',$contact_address) ?></span></div>
              <div><i class="fa fa-phone"><span class="hidden">hidden</span></i><span class="value"><?php echo $contact_phone ?></span></div>
              <div><i class="fa fa-envelope-o"><span class="hidden">hidden</span></i><span id="cloak97748"><a href="mailto:<?php echo $contact_mail ?>"><?php echo $contact_mail ?></a></span></div>
              <div><i class="fa fa-globe"><span class="hidden">hidden</span></i><a href="<?php echo $contact_website ?>"><?php echo $contact_website ?></a></div>
            </div>
          </div>
          <!-- / col -->
          <div class="col-sm-8">
            <div class="moduletable">
              <div class="jv-service">
                <div class="row service-list">
                  <div class="col-xs-4 col-sm-4 col-md-4 style-1">
                    <div class="service-thumb text-center">
                      <div class="service-wrap">
                        <div class="service-icon"><i class="fa fa-phone"></i></div>
                        <h4 class="title"><?php echo t('Phone') ?></h4>
                        <div class="desc"><?php echo t('Reply Time: Instantly') ?> <br><br><?php echo $contact_phone ?></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4 style-1">
                  <div class="service-thumb text-center">
                    <div class="service-wrap">
                      <div class="service-icon"><i class="fa fa-comments-o"></i></div>
                      <h4 class="title"><?php echo t('Chat') ?></h4>
                      <div class="desc"><?php echo t('Reply Time: Instantly') ?></div>
                      <a class="btn btn-primary" href="#"><?php echo t('Start chat') ?></a>
                    </div>
                  </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4 style-1">
                  <div class="service-thumb text-center">
                    <div class="service-wrap">
                      <div class="service-icon"><i class="fa fa-edit"></i></div>
                      <h4 class="title"><?php echo t('Tickets') ?></h4>
                      <div class="desc"><?php echo t('First Reply: 10 Minutes') ?></div>
                      <a class="btn btn-primary" href="#"><?php echo t('Post ticket') ?></a>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / col -->
        </div>
        <!-- / row -->
      </div>
      <!-- / container -->
    </div>
    <div class="blk-map">
      <div class="shadow"></div>
      <!-- / shadow -->
      <div class="container">
              <div class="row">
                  <div class="col-sm-4">
                     <?php print $contact; ?>
                      <!-- / form -->
                  </div>
              </div>
          </div>
          <!-- / container -->
      <div id="map"></div>
      <!-- / map -->
    </div>
<script type="text/javascript">

    var text_map = '<?php echo str_replace(array("\n", "\r"), '', $text_map);?>'
    var locations = [[text_map,<?php echo $map_lat ?>, <?php echo $map_long ?>, 2]];
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        scrollwheel: false,
        navigationControl: true,
        mapTypeControl: false,
        scaleControl: false,
        draggable: true,
        <?php if($style_map) :?>
        styles: <?php  echo $style_map; ?>,
        <?php endif; ?>
        center: new google.maps.LatLng(<?php echo $map_lat; ?>, <?php echo $map_long; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
       <?php if($maker_map) :?>
    var icon_map = {
        url: "<?php echo $maker_map ?>", // url
        scaledSize: new google.maps.Size(50, 50), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
        };
    <?php endif; ?>
    for (i = 0; i < locations.length; i++) {

        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            animation: google.maps.Animation.DROP,
            map: map ,
            icon: icon_map
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                if (marker.getAnimation() != null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
    (function($){
      $(document).ready(function() {
         $('.page-contact #section-main-content .dexp-container .alert').wrap('<div class="container"></div>');
      });
    }(jQuery));
</script>
