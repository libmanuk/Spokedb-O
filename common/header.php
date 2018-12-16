<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=450">
    <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/vnd.microsoft.icon" />
    
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>

    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>

    <!-- Stylesheets -->

    <?php
    queue_css_file(array('iconfonts', 'skeleton','style','lity.min'));

    echo head_css();
    ?>
    
    <!-- cached version of fontawesome -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
    <!-- JavaScripts -->

    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('vendor/jquery-accessibleMegaMenu.min'); ?>
    <?php queue_js_file('vendor/spokedbo.min'); ?>
    <?php queue_js_file('globals'); ?>
    <?php queue_js_file('vendor/jquery-2.2.4.min'); ?>
    <?php queue_js_file('vendor/lity.min'); ?>
    <?php queue_js_file('vendor/clipboard.min'); ?>

    <?php echo head_js(); ?>

</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

<a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
<button onclick="topFunction()" id="myBtn" title="Go to top">top</button></button>

<?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

<header role="banner">
    <?php // fire_plugin_hook('public_header', array('view'=>$this)); ?>
    <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
    <div id="search_container">
        <div id="search-container" role="search" style="margin-bottom:15px;">

                                                          <form id="search-form" name="search-form" action="/search" method="get">    <input type="text" name="query" id="query" value="" title="Search">            <input type="hidden" name="query_type" value="exact_match" id="query_type">                <input type="hidden" name="record_types[]" value="Item" id="record_types">                <input type="hidden" name="record_types[]" value="Collection" id="record_types">            
    <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button></form>  
                
</div>
            <br/>
      <div class="quick_links">
              <p style="margin:1em 0;"><!--<a href="/items/search">Advanced Search</a>--><a href="/help">Help</a>&nbsp;&nbsp;<a href="http://libraries.uky.edu/nunncenter">Nunn Center</a>&nbsp;&nbsp;<a href="/terms">Term of Use</a></p>
        </div>
        
        <?php
echo get_specific_plugin_hook_output('SimpleCart', 'public_header', array('view' => $this, 'item' => $item));
?>
       
</div>

</header>

    <div id="primary-nav" role="navigation">
        <?php
              echo public_nav_main();
              
        ?>

    </div>
    
         <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             <?php
                  echo public_nav_main();
             ?>
         </div>

        <?php echo theme_header_image(); ?>

    <div id="content" role="main" tabindex="-1">
        
<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
