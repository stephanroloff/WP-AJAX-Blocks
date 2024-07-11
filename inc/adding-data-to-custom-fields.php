<?php 

// namespace CreateCustomPostType;
// use CreateCustomPostType\CustomPostType;

include __DIR__ . '/callback.php';


use OtherNamespace\Persons;
use User\User;
use Ajax\GetFromRestApi;
use Ajax\PostToDatabase;
use Ajax\SendDataToFrontend;
use CreateCustomPostType\CustomField_Repeater;


$get_all_persons = (new Persons())->get_all_persons();

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


$all_meta = $CustomPostType->get_all_post_meta_data(11);

// echo '<pre>';
// echo print_r($all_meta2);
// echo '</pre>';


$GetFromRestApi = new GetFromRestApi();
$PostToDatabase = new PostToDatabase('myFunction', 'post_data_to_db');
$SendDataToFrontend = new SendDataToFrontend($all_meta, 'send_data_to_frontend');

$user = new User();
// $user_data = $user->get_user_metadata_by_meta_key('days_of_the_year');




