<?php

global $arprice_images_css_version;
$class = "arprice-cs " . $class;
$shortcode_text = "";
$template_id = $arprice_templates;
if( isset($_REQUEST['action']) && $_REQUEST['action'] === 'cs_render_element' ){
    echo "<link href='".PRICINGTABLE_URL."/css/arprice_effects.css' type='text/css' rel='stylesheet' />";
    echo "<link href='".PRICINGTABLE_URL."/css/arprice_front.css' type='text/css' rel='stylesheet' />";
    echo "<link href='".PRICINGTABLE_URL."/css/font-awesome.css' type='text/css' rel='stylesheet' />";
    echo "<link href='".PRICINGTABLE_URL."/css/ionicons.min.css' type='text/css' rel='stylesheet' />";
    echo "<link href='".PRICINGTABLE_URL."/css/typicons.min.css' type='text/css' rel='stylesheet' />";
    $template_css = "arptemplate_{$template_id}";
    echo "<link href='".PRICINGTABLE_UPLOAD_URL."/css/{$template_css}.css' type='text/css' rel='stylesheet' />";
    echo "<script type='text/javascript' src='".PRICINGTABLE_URL."/js/arprice_front.js'></script>";
}
$shortcode_text = "[ARPrice id='{$template_id}']";
echo do_shortcode($shortcode_text);
?>
<div <?php cs_atts(array('id' => $id, 'class' => $class, 'style' => $style)); ?>>
<?php if ($heading) : ?>
        <h4 class="arprice-cs-heading" style="color:<?php echo $heading_color; ?>"> <?php echo $heading; ?></h4>
    <?php endif; ?>
    <?php echo $content; ?>
</div>