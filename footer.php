     <!-- footer
   ================================================== -->
   <footer>

      <div class="row">

         <div class="twelve columns">


         <?php wp_nav_menu( array (
                  'theme_location'  => 'bot-menu',
                  'menu'            => '', 
                  'container'       => null, 
                  'container_class' => '', 
                  'container_id'    => '',
                  'menu_class'      => 'footer-nav', 
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'           => 0,
                  'walker'          => '',
               ) ); ?>

            <ul class="footer-social">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
               <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>

            <ul class="copyright">
               <li>Copyright &copy; 2014 Sparrow</li> 
               <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
   <!-- <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script> -->
   <!-- <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script> -->

   <!-- <script src="js/jquery.flexslider.js"></script> -->
   <!-- <script src="js/doubletaptogo.js"></script> -->
   <!-- <script src="js/init.js"></script> -->

     <?php wp_footer(); ?>

   </body>

</html>