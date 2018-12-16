</div>

<!-- end content -->

<?php
    $totalrecs = total_records('Item');
    $totalcolls = total_records('Collection');
?>

<footer role="contentinfo">
    <div id="footer-content" class="row" style="color:#fff;">
        <div id="custom-footer-text" class="column left_div" >
            <p>
                <img src="/themes/Spokedb-O/images/spoke-logo2.png"/><br/><br/>Oral History Collection Management System<br/><br/><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?>
            </p>
        </div>
        <div id="custom-footer-text2"  class="column center_div" style="text-align:center;">
            <p>SPOKEdb currently provides access to <br/><br/><?php echo $totalrecs ?> interview records, and<br/><br/><?php echo $totalcolls ?> projects.<br/><br/><br/><br/><a href="/contact">Contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/terms">Terms</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/help">Help</a>
            </p>
        </div>
        <div id="custom-footer-text3"  class="column right_div" style="float:right;">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        </div>
    </div>
    
<!-- end standard footer-content -->

    <div id="mobile-footer-content" class="row" style="color:#fff;">
        <div id="custom-footer-text" style="text-align:center;">
            <p>
                <img src="/themes/Spokedb-O/images/spoke-logo2.png"/><br/><br/>Oral History Collection Management System<br/><br/><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?>
            </p>
        </div>
        <div id="custom-footer-text2" style="text-align:center;">
            <p>SPOKEdb currently provides access to <br/><br/><?php echo $totalrecs ?> interview records, and<br/><br/><?php echo $totalcolls ?> projects.<br/><br/><br/><br/><a href="/contact">Contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/terms">Terms</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/help">Help</a></p>
        </div>
        <div id="custom-footer-text3" style="text-align:center;">
        <?php if($footerText = get_theme_option('Footer Text')): ?>
            <p><?php echo get_theme_option('Footer Text'); ?></p>
        <?php endif; ?>
        <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
        <p><?php echo $copyright; ?></p>
        <?php endif; ?>
        </div>
    </div>

<!-- end mobile footer-content -->

     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>

</footer>
<?php if ((get_theme_option('Display Featured Collection')) || (get_theme_option('Display Featured Item') == 1) || ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit'))): ?>

<script>var divs=Array.from(document.querySelectorAll("div[class^=index]"));function featuredDiv(){divs[0].style.display="block";divs[1].style.display="none"}</script>

<script>$(document).ready(function(){if(window.location.href.indexOf("#featured")!=-1){$(".index2Content").hide();$(".index1Content").show()}});</script>

<script type="text/javascript">$(document).ready(function(){addLink()});function addLink(){var html="<li class='nav-item'><a href='/#featured' onclick='featuredDiv()'>Featured</li>";$('#primary-nav .navigation').addClass('imageclass').append(html)}</script>

<script type="text/javascript">$(document).ready(function(){addLink2()});function addLink2(){var html="<li class='nav-item'><a href='/#featured' onclick='featuredDiv()'>Featured</li>";$('#mobile-nav .navigation').addClass('imageclass').append(html)}</script>

<?php endif; ?>

<script type='text/javascript'>$(window).load(function(){window.onresize=function(event){if(event.currentTarget.outerWidth>=800){console.info("showing");$("#primary-nav").show();$("#mobile-nav").hide()}else{console.info("hiding");$("#primary-nav").hide();$("#mobile-nav").show()}}})</script>

<script type='text/javascript'>jQuery(document).ready(function(){Omeka.showAdvancedForm();Omeka.skipNav();Omeka.megaMenu();Spokedbo.dropDown()})</script>

<script type='text/javascript'>window.onscroll=function(){scrollFunction()};function scrollFunction(){if(document.body.scrollTop>20||document.documentElement.scrollTop>20){document.getElementById("myBtn").style.display="block"}else{document.getElementById("myBtn").style.display="none"}}
function topFunction(){document.body.scrollTop=0;document.documentElement.scrollTop=0}</script>

<script type='text/javascript'>$(function(){var reloaded=!1;$('#accessInterview').on('click',function(){if(!reloaded){document.getElementById('iframeid').src+='';reloaded=!0}
return!0})})</script>

<script type='text/javascript'>var clipboard=new Clipboard('.btn');clipboard.on('success',function(e){console.log(e)});clipboard.on('error',function(e){console.log(e)})</script>

<script type='text/javascript'>$(window).load(function(){$(document).ready(function(){$(".tabs-menu a").click(function(event){event.preventDefault();$(this).parent().addClass("current");$(this).parent().siblings().removeClass("current");var tab=$(this).attr("href");$(".tab-content").not(tab).css("display","none");$(tab).fadeIn()})})})</script>

</body>

</html>
