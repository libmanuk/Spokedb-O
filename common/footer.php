</div>

<!-- end content -->

<footer role="contentinfo">

    <div id="footer-content" class="center-div">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
        <div id="custom-footer-text">
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        </div>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        <nav><?php echo public_nav_main()->setMaxDepth(0); ?></nav>
        <p><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></p>

    </div>

<!-- end footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>


<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
if ($(window).outerWidth() >= 1026) {
        $("#primary-nav").show();
        $("#mobile-nav").hide();
    }else{
        $("#primary-nav").hide();
        $("#mobile-nav").show();
    }
});//]]> 

</script>

<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
window.onresize = function(event) {
    if(event.currentTarget.outerWidth >= 1026){
        console.info("showing");
        $("#primary-nav").show();
        $("#mobile-nav").hide();
    }else{
        console.info("hiding");
        $("#primary-nav").hide();
        $("#mobile-nav").show();
    }
}
});//]]> 

</script>


<script type="text/javascript">
    jQuery(document).ready(function(){
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        Spokedbo.dropDown();
    });
</script>

</body>

</html>
