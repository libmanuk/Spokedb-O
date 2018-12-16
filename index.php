<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div id="primary">
    
<div class='index1Content'>
    
    <?php if ($homepageText = get_theme_option('Homepage Text Gen')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Interview'); ?>

        
        </h2><br/>
        <?php //echo random_featured_items(1); ?>
        
        <?php
        $int_link_featured = random_featured_items(1);
        $int_link_featured = str_replace("%3A/",":/",$int_link_featured);
        echo $int_link_featured;
        ?>
        
    </div>
    
    <!--end featured-item-->
    <?php endif; ?>
    
    
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->

    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Project'); ?></h2><br/>
        <?php //echo random_featured_collection(); ?>
        
        <?php
        $coll_link_featured = random_featured_collection(1);
        $coll_link_featured = str_replace("%3A/",":/",$coll_link_featured);
        echo $coll_link_featured;
        ?>
        
    </div>
    
    <!-- end Featured Collection -->
    <?php endif; ?>
    
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
    
    <!-- end Featured Exhibit -->
    <?php endif; ?>

    <?php
    $recentItems = get_theme_option('Homepage Recent Items');
    if ($recentItems === null || $recentItems === ''):
        $recentItems = 3;
    else:
        $recentItems = (int) $recentItems;
    endif;
    if ($recentItems):
    ?>
    <!-- recent-items -->
    
    <h4>Latest Additions:</h4>
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items($recentItems); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div>
    
    <!--end recent-items -->
    <?php endif; ?>

</div>
    <div class='index2Content'>
    
    <div id="main_title"><div id="main_title_div"><h1>Browse by Topic</h1></div><hr id="main_title_hr"></div>

<div id="container" style="width: unset !important;">
<div id="row">
<?php if ($homepageText16 = get_theme_option('Homepage Text16')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText16);
$htmlchnk1 = '<div id="left"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell01 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell01;
?>
<?php endif; ?>
<?php if ($homepageText01 = get_theme_option('Homepage Text01')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText01);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell02 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell02;
?>
<?php endif; ?>
<?php if ($homepageText02 = get_theme_option('Homepage Text02')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText02);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell03 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell03;
?>
<?php endif; ?>
<?php if ($homepageText03 = get_theme_option('Homepage Text03')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText03);
$htmlchnk1 = '<div id="right"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell04 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell04;
?>

<?php endif; ?>
</div></div>

<div id="container" style="width: unset !important;">
<div id="row">
<?php if ($homepageText04 = get_theme_option('Homepage Text04')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText04);
$htmlchnk1 = '<div id="left"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell01 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell01;
?>
<?php endif; ?>
<?php if ($homepageText05 = get_theme_option('Homepage Text05')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText05);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell02 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell02;
?>
<?php endif; ?>
<?php if ($homepageText06 = get_theme_option('Homepage Text06')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText06);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell03 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell03;
?>
<?php endif; ?>
<?php if ($homepageText07 = get_theme_option('Homepage Text07')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText07);
$htmlchnk1 = '<div id="right"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell04 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell04;
?>
<?php endif; ?>
</div></div>


<div id="container" style="width: unset !important;">
<div id="row">
<?php if ($homepageText08 = get_theme_option('Homepage Text08')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText08);
$htmlchnk1 = '<div id="left"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell01 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell01;
?>
<?php endif; ?>
<?php if ($homepageText09 = get_theme_option('Homepage Text09')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText09);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell02 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell02;
?>
<?php endif; ?>
<?php if ($homepageText10 = get_theme_option('Homepage Text10')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText10);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell03 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell03;
?>
<?php endif; ?>
<?php if ($homepageText11 = get_theme_option('Homepage Text11')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText11);
$htmlchnk1 = '<div id="right"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt="';
$htmlchnk4 = '"/></a></div>';
$cell04 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts2 . $htmlchnk4;
echo $cell04;
?>
<?php endif; ?>
</div></div>



<div id="container" style="width: unset !important;">
<div id="row">
<?php if ($homepageText12 = get_theme_option('Homepage Text12')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText12);
$htmlchnk1 = '<div id="left"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt=""/></a></div>';
$cell01 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3;
echo $cell01;
?>
<?php endif; ?>
<?php if ($homepageText13 = get_theme_option('Homepage Text13')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText13);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt=""/></a></div>';
$cell02 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3;
echo $cell02;
?>
<?php endif; ?>
<?php if ($homepageText14 = get_theme_option('Homepage Text14')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText14);
$htmlchnk1 = '<div id="middle"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt=""/></a></div>';
$cell03 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3;
echo $cell03;
?>
<?php endif; ?>
<?php if ($homepageText15 = get_theme_option('Homepage Text15')): ?>
<?php 
list($parts0, $parts1, $parts2) = explode('|', $homepageText15);
$htmlchnk1 = '<div id="right"><p><a href="';
$htmlchnk2 = '"><img class="indeximage" src="';
$htmlchnk3 = '" alt=""/></a></div>';
$cell04 = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3;
echo $cell04;
?>
<?php endif; ?>
</div>
</div>
</div>
</div>

<!-- end primary -->

<?php echo foot(); ?>
