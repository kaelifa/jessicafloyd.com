



                </div>	
                <!-- Content Section ends here -->	


                                                              
			</div>	
			<!-- Wrapper three ends here -->	
                                               


                
                <!-- Footer Section starts here -->
                <div id="footer_section_cont">
                    
                    <div class="slider_container">                 
                
                
                        <div id="footer_section">
                            
                            
                                                    <div id="bottomfooterwidgetcontainer">
                                                        <div class="bottomfooterwidgety">

                                                                <div class="footerp"><?php _e('&copy; All rights reserved.', 'Hazen') ?></div>
                                                                <div class="footercredit"><?php _e('Designed by ', 'Hazen') ?><a href="http://www.themealley.com/"><?php _e('ThemeAlley.Com', 'Hazen') ?></a></div>

                                                        </div>
            

                                                    </div>	                
                            
                            
                            
                            
                   
                         </div>	
                         <!-- Footer Section ends here -->	
                    </div>        
                
                </div>                              
            
		</div>	
		<!-- Wrapper two ends here -->  
        
        
        
                 
	</div>	
	<!-- Wrapper four ends here -->	            				
	</div>	
	<!-- Wrapper one ends here -->	


<?php 
	if ( of_get_option('twitter_id') ){
	echo Hazen_twitter_script('1985',of_get_option('twitter_id'),2); //Javascript output function 
	}
?>
<?php wp_footer(); ?>
</body>
</html>