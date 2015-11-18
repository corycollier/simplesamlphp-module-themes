<?php
/**
 * Footer template.
 *
 * The main footer template. This is used throughout the application.
 *
 * @author     Cory Collier <corycollier@corycollier.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    git: $Id$
 * @link       https://github.com/corycollier/simplesamlphp-module-themes
 * @see        https://github.com/simplesamlphp/simplesamlphp/
 * @since      File available since Release 1.3.0
 */
?>
<?php
// Define variables.
$url_path  = SimpleSAML_Module::getModuleURL('themes');
$css_path  = $url_path . '/css';
$js_path   = $url_path . '/js';
$img_path  = $url_path . '/img';
?>
<?php
// Output the post content items.
if (!empty($this->data['htmlinject']['htmlContentPost'])) :
  foreach ($this->data['htmlinject']['htmlContentPost'] as $content) :
    echo $content;
  endforeach;
endif;
?>

        </div>
      </div>
    </div>
    <!-- end .content -->

    <!-- start .footer -->
    <div class="footer">
      <div class="container">
        <!-- start the .footer.row -->
        <div class="row">
          <div class="col-md-12">
            <p>
              <a href="#">Help</a>
              <a href="#"> Privacy Policy</a>
            </p>
            <p>
              Theme by <a href="http://corycollier.com/">Cory Collier</a>, and can be found at
              <a href="https://github.com/corycollier/simplesamlphp-module-themes">
              <i class="fa fa-github"></i> https://github.com/corycollier/simplesamlphp-module-themes</a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- end .footer -->


    <script src="<?php echo $js_path; ?>/jquery.js"></script>
    <script src="<?php echo $js_path; ?>/bootstrap.js"></script>
  </body>
</html>
