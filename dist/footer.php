    </section> <!-- end #content -->
    <?php get_template_part(footer . 'content-bottom'); ?>
    <footer id="footer" class="site-footer" role="contentinfo">
      <?php get_template_part(footer . 'top'); ?>
      <?php get_template_part(footer . 'bottom'); ?>
    </footer>
  </div><!-- end #wrapper -->
  <?php echo schemaInfo(); ?>
  <?php wp_footer(); ?>
</body>
</html>