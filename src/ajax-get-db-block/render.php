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

$wrapper_attributes = get_block_wrapper_attributes();

?>
<div <?php echo $wrapper_attributes?>>
    <p>THIS an Ajax GET from DB Block!</p>
    <p>Attribute: <?php echo $attributes['amountSelected']?></p>
    
    <?php if(get_current_user_id()==0): ?>
        <p>Results available just for logged users</p>
    <?php else: ?>
        <p>Results:</p>
        <button class="update-data">Update Data!</button>
        <input type="hidden" name="user_id" id="user-id" value="<?php echo get_current_user_id(); ?>">
        <div id="ajax-get-from-db">Loading...</div>
    <?php endif; ?>
</div>
    

