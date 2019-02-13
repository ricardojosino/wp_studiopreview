<?php

     if ( is_admin() ) :
        
          
          function empreendimentos_query_admin($query)
          {

               if (is_post_type_archive('spw-empreendimentos') and $query->is_main_query()) :

                    $query->set('post_type', 'spw-empreendimentos');
                    $query->set('order', 'DESC');
                    $query->set('orderby', 'date');
                    $query->set('posts_per_page', '-1');


               endif;

          }

          add_action('pre_get_posts', 'empreendimentos_query_admin');

          
          
     endif;