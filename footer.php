<footer class="foot" role="contentinfo">
  <div class="layout"> 
    <div class="bottom_line">
      <small><a class="copyright" href="<?php print SITE_URL; ?>" title="<?php print SITE_TITLE; ?>">©<?php if (date('Y') === '2014') { echo '2014'; } else { echo '2014&ndash;' . date('y'); };?> <?php print SITE_TITLE; ?></a></small>
    </div>
  </div>  
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php print TEMP_PATH; ?>/js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?php print TEMP_PATH; ?>/js/script.min.js<?php echo '?v=' . TEMP_VER; ?>"></script>
<?php wp_footer(); ?>
</body>
</html>