<?php 
get_header();

while(have_posts()){
    the_post();?>
    
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg") ?>)"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>Single Program Php.</p>
        </div>
        </div>
    </div>


    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link( 'program' ); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs</a> 
            
            
            <span class="metabox__main">

                <?php the_author_posts_link(); ?>
                on 
                <?php the_time('F j, Y'); ?>
                : 
                <?php echo get_the_category_list(' , '); ?>
            </span>
            </p>
        </div>  
        
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <!-- db khass naffichiw l Events li aydiro had lProgram o hadchi andiro b dik custom Query -->
        <?php 

            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type'=>'event',
                // hna z3ma f meta key dir dak field dyal eventdate bach ndiro elih lorder f (1)
                'meta_key' => 'event_date',
                // (1)
                'orderby'=>'meta_value_num',
                'order'=>'ASC',
                // hadi bach ndiro wahed filter ela les event li dazo o mab9inach baghyiin naffichiwhom
                'meta_query' => array(
                    array(
                        'key'=>'event_date',
                        'compare'=>'>=',
                        'value' => $today,
                        'type'=> 'numeric'

                    ),
                    array(
                        'ket' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' .get_the_ID().'"' , #hadi ela 9bel la kan endna array dyal data 12 123 1294 khass ndiro "12" "123" ... 
                    )
                )
            ));
            // hadi wahed lcondition 9bel mandiro l affichage dyal Events 
            if($homepageEvents->have_posts()){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Related Events for '.get_the_title().'</h2>';

                while($homepageEvents->have_posts()){
                    $homepageEvents->the_post();?>
                        <div class="event-summary">
                            <a class="event-summary__date t-center" href="#">
                            <span class="event-summary__month">
                                <?php 
                                    $eventdate = new DateTime(get_field('event_date'));
                                    echo $eventdate->format('M');
                                ?>
                            </span>
                            <span class="event-summary__day">
                                <?php 
                                    $eventdate = new DateTime(get_field('event_date'));
                                    echo $eventdate->format('d');
                                ?>
                            </span>
                            </a>
                            <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p> 
                                <?php 
                                    if ( ! has_excerpt() ) {
                                        echo wp_trim_words(get_the_content(),20) ;
                                    } else { 
                                        //the_excerpt();
                                        echo get_the_excerpt();
                                    }                            
                                ?>
                                <a href="<?php echo the_permalink(); ?>" class="nu gray">Learn more</a></p>
                            </div>
                        </div>
                    <?php
                }
            }
            ?>

         
    </div>


    
<?php
}

get_footer();
?>