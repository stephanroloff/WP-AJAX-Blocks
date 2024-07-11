<?php
/**
 * Example Dynamic Block
 *
 * @package Meraki\Blocks\Dynamic
 *
 * @var array    $attributes         Block attributes.
 * @var string   $content            Block content.
 * @var WP_Block $block              Block instance.
 * @var array    $context            Block context.
 */

$extraFilePath = dirname(dirname(plugin_dir_path(__FILE__))) . '/components/box.php';
$wrapper_attributes = get_block_wrapper_attributes();

?>
<div <?php echo $wrapper_attributes?>>
    <p>THIS an Ajax GET from REST Block Block!</p>

    <p>Attribute: <?php echo $attributes['amountSelected']?></p>
    <button id="load-api">GET data from REST API</button>
    <?php 
    require_once($extraFilePath);
     ?>
</div>
    
