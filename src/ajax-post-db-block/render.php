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
    <p>THIS an Ajax POST to DB Block!</p>
    <p>Attribute: <?php echo $attributes['amountSelected']?></p>
    
    <?php if(get_current_user_id()==0): ?>
        <p>Form available just for logged users</p>
    <?php else: ?>
        <form id="mi-formulario">
            <input type="text" name="mi_valor" id="mi-valor" placeholder="Ingresa un valor">
            <input type="hidden" name="user_id" id="user-id" value="<?php echo get_current_user_id(); ?>">
            <button type="button" id="mi-boton">Submit</button>
        </form>
    <div id="response"></div>
    <?php endif; ?>
</div>
    

