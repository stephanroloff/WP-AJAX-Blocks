<?php 

// namespace CreateCustomPostType;
// use CreateCustomPostType\CustomPostType;

use OtherNamespace\Persons;


$get_all_persons = (new Persons())->get_all_persons();

// echo '<br>';
// echo '<pre>';
// echo print_r($get_all_persons['data']);
// echo '</pre>';
// echo '<br>';

$new_data = array();

foreach ($get_all_persons['data'] as $person) {
    $new_data[] = array(
        'event_name_initial' => "{$person['person_firstname']}",
        // 'repeater_true_false' => 1,
    );
}

$new_data2 = array();

foreach ($get_all_persons['data'] as $person) {
    $new_data2[] = array(
        'event_name2' => "{$person['person_lastname']}",
        // 'repeater_true_false' => 1,
    );
}


// $CustomField_Repeater->delete_custom_field(19);
$CustomField_Repeater1->update_custom_field($new_data, 11);
$CustomField_Repeater2->update_custom_field($new_data2, 11);


$get_repeater_data1 = $CustomField_Repeater1->get_repeater_data(11);
$get_repeater_data2 = $CustomField_Repeater2->get_repeater_data(11);


// echo '<br>';
// echo '<pre>';
// echo print_r($get_repeater_data1);
// echo '</pre>';
// echo '<br>';




