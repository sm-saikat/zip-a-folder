<?php
    /**
     * The main template file
     *
     */
    
    get_header();
    ?>
    

<section class="blog-area story-area left-text center-sm-text">
        <div class="container">
                <div class="row">
                        <div class="col-md-7 col-lg-8">

                        <?php 
                        if ( have_posts() ) : 
                                while ( have_posts() ) : the_post();
                        ?>
                                <div class="blog mb-50 mb-sm-30 pr-5">
                                        <div class="pos-relative mb-30 pt-15">
                                                <img class="thumbnail" src="<?php echo(get_the_post_thumbnail_url()); ?>" alt="">
                                        </div>
                                        <h4 class="title" ><b><?php the_title(); ?></b></h4>
                                        <h6 class="mt-10 bg-lite-blue dplay-inl-block">
                                                <a class="author plr-20 mtb-10" href="#"><b>By <?php the_author(); ?></b></a>
                                                <a class="plr-20 mtb-10 brder-lr-lite-black-2" href="#"><b>in Technology</b></a>
                                                <a class="plr-20 mtb-10" href="#"><b>3 Comments</b></a>
                                        </h6>
                                        <p class="post-time"><small class="text-muted">Last updated <?php the_time(); ?></small></p>


                                        <p class="content mt-30"><?php the_content(); ?></p>
                                </div><!--mb-30-->

                        <?php   endwhile;
                        else :
                                _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
                        endif; 
                        ?>
    
                                <div class="pagination font-14 mb-30">
                                    <div class="nav-previous alignleft"><?php previous_post_link(); ?></div>
                                    <div class="nav-next alignright"><?php next_post_link();  ?></div>
                                </div>
                        </div><!--col-md-8-->
    
                        <div class="sidebar-blog col-md-5 col-lg-4">

                                <?php dynamic_sidebar( 'blog' ); ?>
                                
                        </div><!--col-md-4-->
                </div><!-- row -->
        </div><!-- container -->
</section>


<?php
    get_footer();

