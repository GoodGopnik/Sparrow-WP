<?php 
   /* Template Name: Посты
   */
?>

<?php 

get_header('page-Blog'); 

?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Blog<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

                     <?php		


                           $aurCurrentPage = get_query_var('paged');
                           global $post;
                           
                           $query = new WP_Query( [
                              'posts_per_page' => 2,
                              'post_type'      => 'post_Blog',
                              'paged'          => $aurCurrentPage,
                              
                           ] );

                           if ( $query->have_posts() ) {
                              while ( $query->have_posts() ) {
                                 $query->the_post();
                                 
                                 ?>
                                 <article class="post">

                                    <div class="entry-header cf">

                                       <h1>
                                       <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h1>

                                       <p class="post-meta">

                                          <time class="date"><?php the_time('d.m.Y'); ?></time>
                                          /
                                          <span class="categories">
                                          <?php the_tags( '', ' / '); ?>
                                          </span>

                                       </p>

                                    </div>

                                    <div class="post-thumb">
                                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                                    </div>

                                    <div class="post-content">

                                       <p class="lead"><?php the_excerpt();?></p>

                                    </div>
                                    
                                    </article> <!-- post end -->
                                    
                                 <?php 
                              }
                           } else {
                               
                           }
                           // previous_posts_link();
                           // next_posts_link('Следущая страница', $query->max_num_pages);
                           ?>
                           <nav class="col full pagination">
                           <?php
                           
                           echo paginate_links(array(
                              'total'        => $query->max_num_pages,
                              'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                              'prev_text'    => __('« Взад'),
                              'next_text'    => __('Вперед »'),
                              
                           ));
                           
                           wp_reset_postdata(); // Сбрасываем $post
                           ?>
                           </nav> 
                           
            <!-- Pagination -->
            <!-- <nav class="col full pagination">
  			      <ul>
                  <li><span class="page-numbers prev inactive">Prev</span></li>
  				      <li><span class="page-numbers current">1</span></li>
  				      <li><a href="#" class="page-numbers">2</a></li>
                  <li><a href="#" class="page-numbers">3</a></li>
                  <li><a href="#" class="page-numbers">4</a></li>
                  <li><a href="#" class="page-numbers">5</a></li>
                  <li><a href="#" class="page-numbers">6</a></li>
                  <li><a href="#" class="page-numbers">7</a></li>
                  <li><a href="#" class="page-numbers">8</a></li>
                  <li><a href="#" class="page-numbers">9</a></li>
  				      <li><a href="#" class="page-numbers next">Next</a></li>
  			      </ul>
  		      </nav> -->

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

            <?php echo get_sidebar(); ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweets Section End-->

   <!-- footer
   ================================================== -->
   <?php get_footer(); ?>