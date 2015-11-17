<?php
/**
 * @file Footer include.
 */
?>
<?php
  // Output the post content items.
  if (!empty($this->data['htmlinject']['htmlContentPost'])) :
    foreach ($this->data['htmlinject']['htmlContentPost'] as $content) :
      echo $content;
    endforeach;
  endif;
?>
        <div class="footer">
          <p>
            <a href="#">Help</a>
            <a href="#"> Privacy Policy</a>
          </p>
      </div>
    </div>
    <script src="/<?php echo $js_path; ?>/bootstrap.js"></script>
  </body>
</html>
