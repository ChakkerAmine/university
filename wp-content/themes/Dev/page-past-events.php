<?php 
get_header();?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg") ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            All Past Events
        </h1>
        <div class="page-banner__intro">
          <p>hadi lpage dyal page-past-events.php </p>
        </div>
      </div>
    </div>


    <div class="container container--narrow page-section">
      <?php 
        
        $today = date('Ymd');
        $pastEvents = new WP_Query(array(
          // hadi ela 9bel pagination : 
          // 'paged' => 2, HAD 2 dyal ina blassa wsslna f pagination hnaya la 7tinaha Static ra kayjik dima l result tania 
          // SOlution khass njiboha dynamic mn url 
          'paged' => get_query_var('paged',1),
          'posts_per_page' => 1,
          'post_type'=>'event',
          'meta_key' => 'event_date',
                // (1)
                'orderby'=>'meta_value_num',
                'order'=>'ASC',
                // hadi bach ndiro wahed filter ela les event li dazo o mab9inach baghyiin naffichiwhom
                'meta_query' => array(
                    array(
                        'key'=>'event_date',
                        'compare'=>'<',
                        'value' => $today,
                        'type'=> 'numeric'

                    )
                )

        ));

        while($pastEvents->have_posts()){
          $pastEvents->the_post();?> 
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
                    <p> <?php echo wp_trim_words(get_the_content(),20) ?> <a href="<?php echo the_permalink(); ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>
          <?php 
        }
        // for pagination : 
          // hna darori khass ndiro dak array li fih total bach i3ref CH7al ila madrnahach maghadich tkhdem 
        echo paginate_links(array(
          'total' => $pastEvents->max_num_pages
        ));

      ?>
    </div>
<?php 
get_footer();
?>