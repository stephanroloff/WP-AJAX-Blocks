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

use OtherNamespace\Sponsors;
use OtherNamespace\Persons;
use OtherNamespace\UrlRequest;
use OtherNamespace\Agenda;
use OtherNamespace\Offline;
use OtherNamespace\Categories;
use OtherNamespace\PointOfInterest;

$wrapper_attributes = get_block_wrapper_attributes();

$base_url = (new UrlRequest())->base_url;

$allOfflineData = (new Offline())->getFetchData();

$get_all_categories = (new Categories())->get_all_categories();
$get_category_by_id = (new Categories())->get_category_by_id(1);

$get_all_sponsors = (new Sponsors())->get_all_sponsors();
$get_sponsor_by_id = (new Sponsors())->get_sponsor_by_id('2');

$get_all_pois = (new PointOfInterest())->get_all_pois();
$get_poi_by_id = (new PointOfInterest())->get_poi_by_id(1);

$get_all_persons = (new Persons())->get_all_persons();
$get_person_by_id = (new Persons())->get_person_by_id('5f44c94ccaf23');

$get_all_events = (new Agenda())->get_all_events();
$get_event_by_id = (new Agenda())->get_event_by_id('1');
$get_single_event_by_id = (new Agenda())->get_single_event_by_id('AAA123');

echo '<pre>';
echo 'HI';
// var_dump($allOfflineData);
// var_dump($get_poi_by_id);
echo '</pre>';

?>
<div <?php echo $wrapper_attributes?>>

    <?php if($get_person_by_id): ?>
        <h2>AGENDA SINGLE POINT</h2>
        <p>TITEL: "<?= $get_single_event_by_id['name']; ?>"</p>
        <p>DATUM: <?= $get_single_event_by_id['blocks'][0]['date']; ?></p>
        <p>START: <?= $get_single_event_by_id['blocks'][0]['starttime']; ?> Uhr</p>
        <p>END: <?= $get_single_event_by_id['blocks'][0]['endtime']; ?> Uhr</p>
        <p>PERSON ID: <?= $get_single_event_by_id['blocks'][0]['speakers'][0]; ?></p>
        <p>CATEGORIES ID: <?= $get_single_event_by_id['blocks'][0]['categories'][0]; ?>, <?= $get_single_event_by_id['blocks'][0]['categories'][1]; ?></p>
        <p>GROUPS ID: <?= $get_single_event_by_id['blocks'][0]['groups'][0]; ?></p>
        <p>LOCATIONS ID: <?= $get_single_event_by_id['blocks'][0]['locations'][0]; ?></p>
    <?php endif; ?>

    <?php if($get_person_by_id): ?>
        <h2>AGENDA</h2>
        <p><?= $get_event_by_id['event_name']; ?></p>
    <?php endif; ?>

    <?php if($get_person_by_id): ?>
        <h2>Category</h2>
        <p><?= $get_category_by_id; ?></p>
    <?php endif; ?>

    <?php if($get_poi_by_id): ?>
        <h2>Point of Interest (POI)</h2>
        <p><?= $get_poi_by_id; ?></p>
    <?php endif; ?>

    <?php if($get_person_by_id): ?>
        <p><?= $get_person_by_id['person_firstname']; ?></p>
        <img src="<?= $base_url . $get_person_by_id['person_photo'] ?>" alt="loqsea" width="50px">
    <?php endif; ?>

    <?php if($get_sponsor_by_id): ?>
        <p><?= $get_sponsor_by_id['sponsor_title']; ?></p>
        <img src="<?= $get_sponsor_by_id['sponsor_pic'] ?>" alt="loqsea" width="50px">
    <?php endif; ?>
        
    <p>THIS A DYNAMIC BLOCK!!</p>
    <p>Attribute: <?php echo $attributes['amountSelected']?></p>

    <?php 
    if($get_all_sponsors):
        foreach ($get_all_sponsors as $sponsor) {
    ?>
        <p><?= $sponsor['sponsor_title']?></p>
        <img src="<?= $sponsor['sponsor_pic']?>" alt="<?= $sponsor['sponsor_title']?>" width="50px">
        <div><a href="<?= $sponsor['sponsor_link']?>">See Website</a></div>
    <?php
        }
    endif;
    ?>
</div>
    

