<?php 

// ila knti baghi dir wahed check ela lpage wesh hiya hadik par ex endek wahed navigation Bar o bghiti mnin dkhol lchi lien dyal chi page it7wl lcolor dyalo lchi color akhor : khassk tchecki awal haja wesh hadik hiya lpage si oui it will change the color 


// if(is_page('about-us')){
//     echo "class=bla bla bla";
// }




function hadi_gha_function(){
    // this is if we want to load style.css file
    // wp_enqueue_style("ghasmiyadyalcss",get_stylesheet_uri());


    wp_enqueue_script("main_script",get_theme_file_uri('/build/index.js'),array("jquery"),'1.0',true);
    wp_enqueue_style("main_font_family","//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i");
    wp_enqueue_style("font_awsome","//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style("main_css_file",get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style("second_css_file",get_theme_file_uri('/build/index.css'));
}

add_action("wp_enqueue_scripts","hadi_gha_function");



add_action( 'after_setup_theme', 'wpdocs_i_am_a_function' );
     
    function wpdocs_i_am_a_function() {
        // for adding a menu support : 
        register_nav_menu("Headermenulocation","Header Menu Location");
        register_nav_menu("footerlocationone","First Footer");
        register_nav_menu("footerlocationtwo","Second Footer");
        add_theme_support( 'title-tag' );
 
    }




add_action('pre_get_posts',"university_adjust_queries");

    function university_adjust_queries($query){
        // hadi z3ma f dik dyal event adir had blan dyal Post wahed page ghir huwa lmochkil ano hadi atwli katbe9 ela ga3 les Posts
        // $query->set('posts_per_page' , '1');     
        // dakchi elach khass ndiro wahed lcondition dyal if statement ila kan page hiya dyal event 3ad dir had blan 
        
        // Solution : 
        // is_admin() hiya wahed lfunction katkhlik t3ref wesh nta f dashboard ola la o hna had l3Yba dyal query bghina ndiroha ghi f event archive page so we need to filter dak recherche dyalna 

        // o khassna 3awtani ndiro wahed check ela dik lpage dyal archive dyal event bhad lfunction dyal is_post_type_archive('hna katkteb smiya dyal archive li bghiti dir')


        // is_main_query() hadi ghi bach ntfadaw dik lcustom query 

        if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){

            // time variable : 
            $today = date('Ymd');

            $query->set('posts_per_page' , '-1'); 
              
            $query->set('meta_key','event_date'); 

            $query->set('orderby','meta_value_num');
            $query->set('order','ASC');

            // db khass ndiro condition :
            $query->set('meta_query',array(
                array(
                    'key'=>'event_date',
                    'compare'=>'>=',
                    'value' => $today,
                    'type'=> 'numeric'

                )
                ));
        }





        if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){

            // time variable : 
            $today = date('Ymd');

            $query->set('posts_per_page' , '-1'); 
              

            $query->set('orderby','title'); 

            $query->set('order','ASC');

            
        }
        
    }

?>