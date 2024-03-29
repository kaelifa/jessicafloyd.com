

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">

                        
                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section_magthree">
                        
                        
                                    <!--Right column starts here-->					
                                    <div id="magfour_right">

                                        <?php get_sidebar('magthree'); ?>
                                    
                                    </div>	
                                    <!--Right column ends here-->                        
                
									<div id="magfour_left">	
										<?php if (have_posts()) : ?>
											<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>
												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post') ?> id="post-<?php the_ID(); ?>">
													<div class="ta_meta_container">
                                                        <div class="actual_post_title">
                                                            <h2><?php the_title(); ?></h2>
                                                        </div>
                                                        <?php if ( function_exists('the_ratings') && (!of_get_option('show_ratings_standard') || of_get_option('show_ratings_standard') == 'true')) : ?>
                                                        <div class="actual_post_ratings">
                                                            <?php the_ratings(); ?>
                                                        </div>   
                                                        <?php endif; ?>                                                    
                                                        <div class="actual_post_author">
                                                            <div class="actual_post_posted"><?php _e('Posted by :','Hazen'); ?><span><?php the_author() ?></span> <?php _e('On :','Hazen'); ?> <span><?php the_time(get_option( 'date_format' )) ?></span></div>
                                                            <div class="actual_post_comments"><?php comments_number( '0', '1', '%' ); ?></div>
                                                        </div>
                                                        <?php if(!of_get_option('show_ctags_standard') || of_get_option('show_ctags_standard') == 'true') : ?>                                                                        
                                                        <div class="metadata">
                                                            <p>
                                                                <span class="label"><?php _e('Category:', 'Hazen') ?></span>
                                                                <span class="text"><?php the_category(', ') ?></span>
                                                            </p>
                                                            <?php the_tags('<p><span class="label">'.__('Tags:','Hazen').'</span><span class="text">', ', ', '</span></p>'); ?>
                                                            
                                                        </div><!-- /metadata -->
                                                        <?php endif; ?>
                                                        
                                                    </div>	
                                                    
                                                    <!-- Post entry starts here -->												
													<div class="post_entry">
														
														<div class="entry">
															<?php the_content(__('<span>Continue Reading >></span>', 'Hazen')); ?>
															<div class="clear"></div>
															<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'Hazen' ) . '</span>', 'after' => '</div>' ) ); ?>																				
														
                                                        	<?php 
																
																if (is_attachment()){ 
																	echo '<p>';
																	previous_image_link( false, '&#171; '.__('Previous Image' , 'Destro').'' ); 
																	echo '</p>';
																}  
															?> 
                                                          	<?php 
																
																if (is_attachment()){ 
																	echo '<p>';
																	next_image_link( false, ''.__('Next Image' , 'Destro').' &#187;' );
																	echo '</p>'; 
																}
															?>
                                                        
                                                        
                                                        </div>
														

																												
													</div>
                                                    <!-- post entry ends here -->
                                                   
	                                                <?php if(!of_get_option('show_author_bio') || of_get_option('show_author_bio')=='true') : ?>
													<!-- Bio starts here -->
                                                    <div class="post_author_bio">
                                                        <div class="post_author_bio_bio">
                                                        
                                                        	<div class="post_author_bio_bio_pic">
                                                            	<?php echo get_avatar( get_the_author_meta('ID'), 88 ); ?>
                                                            </div>
                                                            
                                                        	<div class="post_author_bio_bio_desc">
                                                            	<p class="post_author_pic"><?php the_author() ?></p>
                                                                <p><?php the_author_meta('description'); ?></p>
                                                            </div>                                                            
                                                        
                                                        
                                                        </div>
                                                        <div class="post_author_bio_social">
                                                        
                                                        	
                                                            	<?php 
																	$authorswebsitelink =  Hazen_get_custom_field('authors_website', get_the_ID(), true);
																	
																	if( !empty($authorswebsitelink) ) {
																		$authorswebsite =  $authorswebsitelink;
																			}else {
																				$authorswebsite =  get_the_author_meta('user_url');
																			}
																?>
                                                                <?php if(!empty($authorswebsite)) : ?>
                                                                <div class="authors_website">
                                                                
                                                                	<p><a href="<?php echo $authorswebsite; ?>"><?php _e("Visit Author's Website",'Hazen'); ?></a></p>
                                                            	</div>
                                                                <?php endif; ?>
                                                            
                                                        	
                                                            	<?php 
																	$authorstwitterlink =  Hazen_get_custom_field('authors_twitter', get_the_ID(), true);
																	
																	if( !empty($authorstwitterlink) ) {
																		$authorstwitter =  $authorstwitterlink;
																			}else {
																				$authorstwitter =  of_get_option('twitter_id');
																			}
																?> 
                                                                <?php if(!empty($authorstwitter)) : ?>
                                                                <div class="authors_twitter">                                                           
                                                            		<p><a href="https://www.twitter.com/<?php echo $authorstwitter; ?>"><?php _e("Follow On Twitter",'Hazen'); ?></a></p>
                                                            	</div>  
                                                            	<?php endif; ?>
                                                                
                                                                
                                                        	
                                                            	<?php 
																	$authorsfacebooklink =  Hazen_get_custom_field('authors_facebook', get_the_ID(), true);
																	
																	if( !empty($authorsfacebooklink) ) {
																		$authorsfacebook =  $authorsfacebooklink;
																			}else {
																				$authorsfacebook =  of_get_option('facebook_id');
																			}
																?>   
                                                                
                                                                <?php if(!empty($authorsfacebook)) : ?>
                                                                <div class="authors_facebook">                                                           
                                                            		<p><a href="<?php echo $authorsfacebook; ?>"><?php _e("Like On Facebook",'Hazen'); ?></a></p>
                                                            	</div>
																<?php endif; ?>                                                                                                                      
                                                        
                                                        </div>                                                        
                                                    </div>
                                                    <!-- Bio ends here -->       
                                                    <?php endif; ?>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <?php if(!of_get_option('show_np_box') || of_get_option('show_np_box')=='true') : ?>
                                                    <!-- Next/prev post starts here -->  
                                                    <div class="single_np">
                                                    
                                                    	<div class="single_np_prev">
                                                        	<p class="single_np_prev_np"><?php _e('Previous Post','Hazen'); ?></p>
                                                            <p><?php previous_post_link('%link'); ?></p>
                                                        </div>
                                                        
                                                    	<div class="single_np_next">
                                                        	<p class="single_np_next_np"><?php _e('Next Post','Hazen'); ?></p>
                                                            <p><?php next_post_link('%link'); ?></p>
                                                        </div>                                                        
                                                    
                                                    </div>                                                    
                                                    <!-- Next/prev post ends here --> 
                                                    <?php endif; ?>
                                                    

                                                    
												</div>
												<!-- Actual Post ends here -->		
												<?php comments_template(); ?>
												<?php endwhile; ?>
												<?php endif; ?>
                
                					
                                    </div>
                                    
                        </div>	
                        <!-- Main Content Section ends here -->

                        <!-- Sidebar Section starts here -->
                        <?php get_sidebar(); ?> 	
                        <!-- Sidebar Section ends here -->






                    </div>	
                    <!-- Inner Content Section ends here -->
                    

							
								
									

							
								
									
