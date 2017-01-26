<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div id="primary">



    <?php if ($homepageText = get_theme_option('Homepage Text Gen')): ?>
    <p><?php echo $homepageText; ?></p>
    <?php endif; ?>

<?php if ($homepageText = get_theme_option('Homepage Text')): ?>
<?php $resources = $homepageText;
list($parts0, $parts1, $parts2, $parts3, $parts4, $parts5, $parts6, $parts7) = explode(',', $homepageText);
$htmlchnk1 = '<div id="container"><div id="row"><div id="left"><p><a href="';
$htmlchnk2 = '"><img width="100%" src="';
$htmlchnk3 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk4 = '"><img width="100%" src="';
$htmlchnk5 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk6 = '"><img width="100%" src="';
$htmlchnk7 = '"/></a></div><div id="right"><p><a href="';
$htmlchnk8 = '"><img width="100%" src="';
$htmlchnk9 = '"/></a></div></div></div>';
$row = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts3 . $htmlchnk4 . $parts2 . $htmlchnk5 . $parts5 . $htmlchnk6 . $parts4 . $htmlchnk7 . $parts7 . $htmlchnk8 . $parts6 . $htmlchnk9;
echo $row;
?>
<?php endif; ?>

<?php if ($homepageText2 = get_theme_option('Homepage Text2')): ?>
<?php $resources = $homepageText2;
list($parts0, $parts1, $parts2, $parts3, $parts4, $parts5, $parts6, $parts7) = explode(',', $homepageText2);
$htmlchnk1 = '<div id="container"><div id="row"><div id="left"><p><a href="';
$htmlchnk2 = '"><img width="100%" src="';
$htmlchnk3 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk4 = '"><img width="100%" src="';
$htmlchnk5 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk6 = '"><img width="100%" src="';
$htmlchnk7 = '"/></a></div><div id="right"><p><a href="';
$htmlchnk8 = '"><img width="100%" src="';
$htmlchnk9 = '"/></a></div></div></div>';
$row = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts3 . $htmlchnk4 . $parts2 . $htmlchnk5 . $parts5 . $htmlchnk6 . $parts4 . $htmlchnk7 . $parts7 . $htmlchnk8 . $parts6 . $htmlchnk9;
echo $row;
?>
<?php endif; ?>

<?php if ($homepageText3 = get_theme_option('Homepage Text3')): ?>
<?php $resources = $homepageText3;
list($parts0, $parts1, $parts2, $parts3, $parts4, $parts5, $parts6, $parts7) = explode(',', $homepageText3);
$htmlchnk1 = '<div id="container"><div id="row"><div id="left"><p><a href="';
$htmlchnk2 = '"><img width="100%" src="';
$htmlchnk3 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk4 = '"><img width="100%" src="';
$htmlchnk5 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk6 = '"><img width="100%" src="';
$htmlchnk7 = '"/></a></div><div id="right"><p><a href="';
$htmlchnk8 = '"><img width="100%" src="';
$htmlchnk9 = '"/></a></div></div></div>';
$row = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts3 . $htmlchnk4 . $parts2 . $htmlchnk5 . $parts5 . $htmlchnk6 . $parts4 . $htmlchnk7 . $parts7 . $htmlchnk8 . $parts6 . $htmlchnk9;
echo $row;
?>
<?php endif; ?>

<?php if ($homepageText4 = get_theme_option('Homepage Text4')): ?>
<?php $resources = $homepageText4;
list($parts0, $parts1, $parts2, $parts3, $parts4, $parts5, $parts6, $parts7) = explode(',', $homepageText4);
$htmlchnk1 = '<div id="container"><div id="row"><div id="left"><p><a href="';
$htmlchnk2 = '"><img width="100%" src="';
$htmlchnk3 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk4 = '"><img width="100%" src="';
$htmlchnk5 = '"/></a></div><div id="middle"><p><a href="';
$htmlchnk6 = '"><img width="100%" src="';
$htmlchnk7 = '"/></a></div><div id="right"><p><a href="';
$htmlchnk8 = '"><img width="100%" src="';
$htmlchnk9 = '"/></a></div></div></div>';
$row = $htmlchnk1 . $parts1 . $htmlchnk2 . $parts0 . $htmlchnk3 . $parts3 . $htmlchnk4 . $parts2 . $htmlchnk5 . $parts5 . $htmlchnk6 . $parts4 . $htmlchnk7 . $parts7 . $htmlchnk8 . $parts6 . $htmlchnk9;
echo $row;
?>
<?php endif; ?>


    <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <h4>Item Spotlight:</h4>
    <div id="featured-item" class="featured">
        <h2><?php echo __('Featured Item'); ?></h2>
        <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
    <?php endif; ?>
    <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <h4>Collection Spotlight:</h4>
    <div id="featured-collection" class="featured">
        <h2><?php echo __('Featured Collection'); ?></h2>
        <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
    <?php endif; ?>
    <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
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
    <h4>Latest Additions:</h4>
    <div id="recent-items">
        <h2><?php echo __('Recently Added Items'); ?></h2>
        <?php echo recent_items($recentItems); ?>
        <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
    </div><!--end recent-items -->
    <?php endif; ?>

</div><!-- end primary -->


<?php echo foot(); ?>
