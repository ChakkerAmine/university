<?php 

function university_post_type(){
    // Events Post type:

    register_post_type('event',array(
        //hadi la bghina mankhdmoch b dak classic editor 
        'show_in_rest' => true,
        //hta dik editor li kayna f support ra endha wahed lrole ela dak classic editor ila makantch ayb9a kaytl3 lik classic editor
        'supports' => array('title','editor','excerpt'),
        'public'=>true,
        'has_archive'        => true,
        'labels'=>array(
            'name'=>'Events',
            'add_new_item' => 'Zid wahed LEvent jdid',
            'edit_item'=>'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-admin-site-alt2'
    ));


    // --------------------------------------------------


    // Programs Post type: 
    register_post_type('program',array(
        //hadi la bghina mankhdmoch b dak classic editor 
        'show_in_rest' => true,
        //hta dik editor li kayna f support ra endha wahed lrole ela dak classic editor ila makantch ayb9a kaytl3 lik classic editor
        'supports' => array('title','editor'),
        'public'=>true,
        'has_archive'        => true,
        'labels'=>array(
            'name'=>'programs',
            'add_new_item' => 'Zid wahed Program jdid',
            'edit_item'=>'Edit Program',
            'all_items' => 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon' => 'dashicons-awards'
    ));
}
add_action('init','university_post_type');


?>