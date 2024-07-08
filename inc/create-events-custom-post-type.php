<?php 

namespace CreateCustomPostType;

//Creating a Custom Post Type
$CustomPostType = new CustomPostType('events', 'Events', 'Event');

$sub_fields_repeater_inside = array(
    // (new CustomField_DatePicker('repeater_date_picker', 'Date Picker'))->get_custom_field_array(),
    (new CustomField_TrueFalse('repeater_true_false1', 'True False 1'))->get_custom_field_array(),
    (new CustomField_Text('event_name_initial', 'Event Name 1'))->get_custom_field_array(), 
);

//Creating all custom fields for Repeater (if exists) 
$sub_fields_repeater1 = array(
    // (new CustomField_DatePicker('repeater_date_picker', 'Date Picker'))->get_custom_field_array(),
    (new CustomField_TrueFalse('repeater_true_false1', 'True False 1'))->get_custom_field_array(),
    (new CustomField_Text('event_name_initial', 'Event Name 1'))->get_custom_field_array(), 
    (new CustomField_Repeater($sub_fields_repeater_inside, 'repeater_fields_inside', 'Repeater Inside'))->get_custom_field_array(),
);

$sub_fields_repeater2 = array(
    // (new CustomField_DatePicker('repeater_date_picker', 'Date Picker'))->get_custom_field_array(),
    (new CustomField_TrueFalse('repeater_true_false2', 'True False 2'))->get_custom_field_array(),
    (new CustomField_Text('event_name2', 'Event Name 2'))->get_custom_field_array(), 
);

// $select_options = array(
//     'option1' => 'Option A',
//     'option2' => 'Option B',
//     'option3' => 'Option C',
// );


//Creating all custom fields for the Custom Post Type (CPT) 
$CustomField_Text = new CustomField_Text('text_event_name1', 'Event Name');
$CustomField_Repeater1 = new CustomField_Repeater($sub_fields_repeater1, 'repeater_fields1', 'Nombres!');
$CustomField_Repeater2 = new CustomField_Repeater($sub_fields_repeater2, 'repeater_fields2', 'Apellidos!');
$CustomField_DatePicker = new CustomField_DatePicker('date_picker', 'Date Picker');
// $CustomField_Image = new CustomField_Image('event_image', 'Event Image');
// $CustomField_Gallery = new CustomField_Gallery('event_gallery', 'Event Gallery');
// $CustomField_Select = new CustomField_Select('event_select', 'Event Select', $select_options);
// $CustomField_Map = new CustomField_Map('event_map', 'Event Map');

$all_custom_fields = array(
    $CustomField_Text->get_custom_field_array(),
    $CustomField_DatePicker->get_custom_field_array(),
    $CustomField_Repeater1->get_custom_field_array(),
    $CustomField_Repeater2->get_custom_field_array(),
    // $CustomField_Image->get_custom_field_array(),
    // $CustomField_Gallery->get_custom_field_array(),
    // $CustomField_Select->get_custom_field_array(),
    // $CustomField_Map->get_custom_field_array(),
);

//Adding all custom fields to the Custom Post Type (CPT)
$CustomFieldForCPT = new AddCustomFieldsToCPT($all_custom_fields, 'events');











