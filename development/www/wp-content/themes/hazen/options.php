<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'Hazen';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "1","two" => "2","three" => "3","four" => "4","five" => "5");
	$homelayout_array = array("one" => "Mag Pro","two" => "Mag lite","three" => "Mag","four" => "Standard Blog");
	$magpro_slider_start = array("false" => "No","true" => "Yes");
	$magpro_mini_slider_show = array("false" => "No","true" => "Yes");	
	$homecat_array = array("hori" => "Horizontal Layout","verti" => "Vertical Layout");
	
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Logo Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Upload Logo", 'Hazen' ),
									"desc" => __("Upload your logo here. max width 450px, It will replace the blog title and description.", 'Hazen' ),
									"id" => "header_logo",
									"type" => "proupgrade");	
									
				$options[] = array( "name" => __("Upload FavIcon", 'Hazen' ),
									"desc" => __("Upload your favicon here.", 'Hazen' ),
									"id" => "favicon",
									"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		

		$options[] = array( "name" => __("Adsense Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Google Adsense ID", 'Hazen' ),
										"desc" => __("Enter your full adsense id. Ex : pub-1234567890", 'Hazen' ),
										"id" => "google_adsense_id",
										"std" => "",
										"type" => "proupgrade");		
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Single Page Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Author Bio", 'Hazen' ),
										"desc" => __("Select yes if you want to show Author Bio Box on single post page.", 'Hazen' ),
										"id" => "show_author_bio",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show RSS Box", 'Hazen' ),
										"desc" => __("Select yes if you want to show RSS box on single post page.", 'Hazen' ),
										"id" => "show_rss_box",
										"std" => "true",
										"type" => "proupgrade");		
										
					$options[] = array( "name" => __("Show Social Box", 'Hazen' ),
										"desc" => __("Select yes if you want to show social box on single post page.", 'Hazen' ),
										"id" => "show_social_box",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'Hazen' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'Hazen' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Related Posts Box", 'Hazen' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'Hazen' ),
										"id" => "show_related_box",
										"std" => "true",
										"type" => "proupgrade");																																								
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'Hazen' ),
										"desc" => __("Enter your twitter id", 'Hazen' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'Hazen' ),
										"desc" => __("Enter your reddit url", 'Hazen' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Delicious", 'Hazen' ),
										"desc" => __("Enter your delicious url", 'Hazen' ),
										"id" => "delicious_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Technorati", 'Hazen' ),
										"desc" => __("Enter your technorati url", 'Hazen' ),
										"id" => "technorati_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'Hazen' ),
										"desc" => __("Enter your facebook url", 'Hazen' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'Hazen' ),
										"desc" => __("Enter your stumbleupon url", 'Hazen' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Youtube", 'Hazen' ),
										"desc" => __("Enter your youtube url", 'Hazen' ),
										"id" => "youtube_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'Hazen' ),
										"desc" => __("Enter your flickr url", 'Hazen' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'Hazen' ),
										"desc" => __("Enter your linkedin url", 'Hazen' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'Hazen' ),
										"desc" => __("Enter your google url", 'Hazen' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");
	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Slider Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select Category", 'Hazen' ),
										"desc" => __("Posts from this category will be shown in the slider.", 'Hazen' ),
										"id" => "magpro_slidercat",
										"std" => "true",
										"type" => "select",
										"options" => $options_categories);
					
					$options[] = array( "name" => __("Show slider on homepage", 'Hazen' ),
										"desc" => __("Select yes if you want to show slider on homepage.", 'Hazen' ),
										"id" => "show_magpro_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show slider on Single post page", 'Hazen' ),
										"desc" => __("Select yes if you want to show slider on Single post page.", 'Hazen' ),
										"id" => "show_magpro_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Pages", 'Hazen' ),
										"desc" => __("Select yes if you want to show slider on Pages.", 'Hazen' ),
										"id" => "show_magpro_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Category Pages", 'Hazen' ),
										"desc" => __("Select yes if you want to show slider on Category Pages.", 'Hazen' ),
										"id" => "show_magpro_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
					
					$options[] = array( "name" => __("Auto Start?", 'Hazen' ),
										"desc" => __("Select yes if you want the slider to start scrolling automaticaly on page load. Only applies to Accordian and Botique sliders.", 'Hazen' ),
										"id" => "magpro_slider_auto",
										"std" => "false",
										"type" => "select",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("How many slides?", 'Hazen' ),
										"desc" => __("Enter a number. Ex: 5 or 7", 'Hazen' ),
										"id" => "magpro_slidernumposts",
										"std" => "5",
										"class" => "mini",
										"type" => "text");										

					$options[] = array( "name" => __("Pause Duration", 'Hazen' ),
										"desc" => __("Time between slide changes. 1000 is 1 Second", 'Hazen' ),
										"id" => "magpro_slider_time",
										"std" => "7000",
										"type" => "proupgrade");


					$options[] = array( "name" => __("Select a Slider", 'Hazen' ),
										"desc" => __("Type of slider to use", 'Hazen' ),
										"id" => "magpro_slider",
										"std" => "anything",
										"type" => "images",
										"options" => array(
											'nivo' => $imagepath . 'nivo.png',
											'camera' => $imagepath . 'camera.png',
											'piecemaker' => $imagepath . 'piecemaker.png',
											'accordian' => $imagepath . 'accordian.png',	
											'boutique' => $imagepath . 'boutique.png',	
											'boutiquetwo' => $imagepath . 'boutique2.png',	
											'videoboutique' => $imagepath . 'boutiquevid.png',	
											'ken' => $imagepath . 'ken.png',
											'ruby' => $imagepath . 'ruby.png',																	
											'wilto' => $imagepath . 'wilto.png',
											'wiltovideo' => $imagepath . 'wiltovid.png')
										);				

										
		$options[] = array( "type" => "groupcontainerclose");							
						
	$options[] = array( "type" => "innertabclose");	
	
								

	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "homepage_layout",
										"std" => "magpro",
										"type" => "images",
										"options" => array(
											'magpro' => $imagepath . 'magpro.png',
											'magvideo' => $imagepath . 'magvid.png',											
											'maglite' => $imagepath . 'maglite.png',
											'mag' => $imagepath . 'mag.png',
											'magthree' => $imagepath . 'magthree.png',
											'magfour' => $imagepath . 'magfour.png',
											'magfive' => $imagepath . 'magfive.png',
											'magsix' => $imagepath . 'magsix.png',
											'standard' => $imagepath . 'standard.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country6",
						"type" => "innertabopen");

		$options[] = array( "name" => __("MagPro Settings", 'Hazen' ),
							"type" => "tabheading");

	
		
		$options[] = array( "name" => __("Recent Posts", 'Hazen' ),
							"type" => "groupcontaineropen");	


					$options[] = array( "name" => __("How Many Recent Posts?", 'Hazen' ),
										"desc" => __("Enter a number like 7 or 10", 'Hazen' ),
										"id" => "magpro_recent_posts_num",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");			
		
		$options[] = array( "name" => __("Video Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Videos", 'Hazen' ),
										"desc" => __("Select yes if you want to show videos.", 'Hazen' ),
										"id" => "magpro_show_videos",
										"std" => "false",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select a Category", 'Hazen' ),
										"desc" => __("For posts in this category, You need to create a custom field called video and enter the url to video in its value field", 'Hazen' ),
										"id" => "magpro_show_videos_cat",
										"type" => "proupgrade");


					$options[] = array( "name" => __("How many Videos", 'Hazen' ),
										"desc" => __("How many Videos would you like to show.", 'Hazen' ),
										"id" => "magpro_show_videos_num",
										"std" => "3",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated/Most Popular", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Top Rated/Most popular box ?", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "magpro_show_mostbox",
										"std" => "false",
										"type" => "proupgrade");


					$options[] = array( "name" => __("How many Posts", 'Hazen' ),
										"desc" => __("How many posts would you like to show.", 'Hazen' ),
										"id" => "magpro_show_mostboxnum",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Gallery", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Gallery?", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "magpro_show_gallery",
										"std" => "false",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Which Gallery?", 'Hazen' ),
										"desc" => __("Enter the gallery ID", 'Hazen' ),
										"id" => "magpro_galid",
										"type" => "proupgrade");


					$options[] = array( "name" => __("How many Images?", 'Hazen' ),
										"desc" => __("Enter the number of images you would like to show", 'Hazen' ),
										"id" => "magpro_galnum",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Category Boxes", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Category Boxes", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "magpro_show_catbox",
										"std" => "false",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Which Layout", 'Hazen' ),
										"desc" => __("Select horizontal or vertical", 'Hazen' ),
										"id" => "magpro_show_catbox_which",
										"type" => "proupgrade");


					$options[] = array( "name" => __("Which Categories?", 'Hazen' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "magpro_catbox_id",
										"std" => "",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("How many posts per box?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "magpro_catbox_num",
										"std" => "7",
										"type" => "proupgrade");										
										
		$options[] = array( "type" => "groupcontainerclose");						
		
									
						
	$options[] = array( "type" => "innertabclose");		


	$options[] = array( "name" => "country12",
						"type" => "innertabopen");
		
		$options[] = array( "name" => __("Video Mag Settings", 'Hazen' ),
							"type" => "tabheading");
		
						
	
		
		$options[] = array( "name" => __("Recent Tab Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Recent Videos Tab?", 'Hazen' ),
										"desc" => __("Select yes if you want to show Recent Videos tab in the homepage", 'Hazen' ),
										"id" => "video_mag_recent",
										"std" => "true",
										"type" => "proupgrade");	

					$options[] = array( "name" => __("How many posts?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_recent_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "video_mag_recent_layout",
										"std" => "vidrecentone",
										"type" => "images",
										"type" => "proupgrade");																								
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Top Rated Videos Tab?", 'Hazen' ),
										"desc" => __("Select yes if you want to show Top Rated Videos tab in the homepage", 'Hazen' ),
										"id" => "video_mag_toprated",
										"std" => "true",
										"type" => "select",
										"type" => "proupgrade");	

					$options[] = array( "name" => __("How many posts?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_toprated_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "video_mag_toprated_layout",
										"std" => "vidtopratedone",
										"type" => "images",
										"type" => "proupgrade");																								
										
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Most Popular Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Top Rated Videos Tab?", 'Hazen' ),
										"desc" => __("Select yes if you want to show Top Rated Videos tab in the homepage", 'Hazen' ),
										"id" => "video_mag_most",
										"std" => "true",
										"type" => "proupgrade");	

					$options[] = array( "name" => __("How many posts?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_most_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "video_mag_most_layout",
										"std" => "vidmostone",
										"type" => "proupgrade");																							
										
		$options[] = array( "type" => "groupcontainerclose");			
		
		$options[] = array( "name" => __("Favourite Tab Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Favourite Videos Tab?", 'Hazen' ),
										"desc" => __("Select yes if you want to show Favourite Videos tab in the homepage", 'Hazen' ),
										"id" => "video_mag_fav",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Select Category", 'Hazen' ),
										"desc" => __("Posts from this category will be shown in the Favourites tab.", 'Hazen' ),
										"id" => "video_mag_fav_cat",
										"std" => "true",
										"type" => "proupgrade");

					$options[] = array( "name" => __("How many posts?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_fav_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "video_mag_fav_layout",
										"std" => "vidfavone",
										"type" => "proupgrade");																					
										
		$options[] = array( "type" => "groupcontainerclose");		
									
		$options[] = array( "name" => __("Category Boxes", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Category Boxes", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "video_mag_show_catbox",
										"std" => "false",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Which Categories?", 'Hazen' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_catbox_id",
										"std" => "",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("How many posts per box?", 'Hazen' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'Hazen' ),
										"id" => "video_mag_catbox_num",
										"std" => "2",
										"type" => "proupgrade");										
										
		$options[] = array( "type" => "groupcontainerclose");		

						
	$options[] = array( "type" => "innertabclose");	

	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Mag Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_mag",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_mag",
										"std" => "true",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country8",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagLite Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_maglite",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_maglite",
										"std" => "true",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country13",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagThree Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_magthree",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_magthree",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country14",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagFour Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_magfour",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_magfour",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country15",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagFive Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_maglite",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_maglite",
										"std" => "true",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country16",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagSix Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_maglite",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'Hazen' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'Hazen' ),
										"id" => "show_postthumbnail_maglite",
										"std" => "true",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Blog Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'Hazen' ),
										"desc" => __("Select yes if you want to show ratings", 'Hazen' ),
										"id" => "show_ratings_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show Categories/Tags?", 'Hazen' ),
										"desc" => __("Select yes if you want to show categories and tags in posts", 'Hazen' ),
										"id" => "show_ctags_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Sidebar Settings", 'Hazen' ),
							"type" => "tabheading");
			
		
		$options[] = array( "name" => __("Sidebar Ad Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show 300x250 ads in sidebar?", 'Hazen' ),
										"desc" => __("Select yes if you want to show 300x250 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'Hazen' ),
										"id" => "show_sidebar_ads",
										"std" => "false",
										"type" => "proupgrade");		
										
					$options[] = array( "name" => __("Show 125x125 ads in sidebar?", 'Hazen' ),
										"desc" => __("Select yes if you want to show 125x125 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'Hazen' ),
										"id" => "show_sidebar_ads_onetwofive",
										"std" => "false",
										"type" => "proupgrade");											
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Feedburner Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show feedburner?", 'Hazen' ),
										"desc" => __("Select yes if you want to show feedburner in sidebar.", 'Hazen' ),
										"id" => "show_feedburner",
										"std" => "true",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Feedburner Id", 'Hazen' ),
										"desc" => __("Enter your feedburner id", 'Hazen' ),
										"id" => "feedburner_id",
										"std" => "",
										"type" => "proupgrade");																												
																				
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Social Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

										
					$options[] = array( "name" => __("Show Twitter Updates?", 'Hazen' ),
										"desc" => __("Select yes if you want to show feedburner in sidebar.", 'Hazen' ),
										"id" => "show_twitter_updates",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																												
																				
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Video Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Videos in sidebar?", 'Hazen' ),
										"desc" => __("Select yes if you want to show videos in sidebar.", 'Hazen' ),
										"id" => "sidebar_show_videos",
										"std" => "false",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select a Category", 'Hazen' ),
										"desc" => __("For posts in this category, You need to create a custom field called video and enter the url to video in its value field", 'Hazen' ),
										"id" => "sidebar_show_videos_cat",
										"type" => "proupgrade");


					$options[] = array( "name" => __("How many Videos", 'Hazen' ),
										"desc" => __("How many Videos would you like to show.", 'Hazen' ),
										"id" => "sidebar_show_videos_num",
										"std" => "3",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated/Most Popular", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Top Rated/Most popular box in sidebar?", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "sidebar_show_mostbox",
										"std" => "true",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'Hazen' ),
										"desc" => __("Images for layout.", 'Hazen' ),
										"id" => "tabboxsidebarlayout",
										"std" => "tabbigthumb",
										"type" => "proupgrade");	

					$options[] = array( "name" => __("How many posts", 'Hazen' ),
										"desc" => __("How many posts would you like to show.", 'Hazen' ),
										"id" => "sidebar_show_mostboxnum",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Polls", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Polls?", 'Hazen' ),
										"desc" => __("Select yes or no", 'Hazen' ),
										"id" => "sidebar_show_poll",
										"std" => "false",
										"type" => "proupgrade");


					$options[] = array( "name" => __("Which Poll?", 'Hazen' ),
										"desc" => __("Enter the poll ID", 'Hazen' ),
										"id" => "sidebar_show_poll_id",
										"std" => "",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");												
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("AD Settings", 'Hazen' ),
							"type" => "tabheading");		
		
		$options[] = array( "name" => __("Header Ad Settings", 'Hazen' ),
							"type" => "groupcontaineropen");	

					
					$options[] = array( "name" => __("Show Adsense?", 'Hazen' ),
										"desc" => __("If yes, adsense will be show else enter html adcode below", 'Hazen' ),
										"id" => "show_header_adsense",
										"std" => "true",
										"type" => "proupgrade");		
										
					$options[] = array( "name" => __("Header Ad code", 'Hazen' ),
										"desc" => __("Enter the html ad code", 'Hazen' ),
										"id" => "header_ad_code",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'Hazen' ),
							"type" => "tabheading");		
		
		$options[] = array( "name" => __("Footer Widgets", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show footer widgets on homepage?", 'Hazen' ),
										"desc" => __("Select yes if you want to show footer widgets on homepage.", 'Hazen' ),
										"id" => "show_footer_widgets_home",
										"std" => "true",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Show footer widgets on single post pages?", 'Hazen' ),
										"desc" => __("Select yes if you want to show footer widgets on single post pages.", 'Hazen' ),
										"id" => "show_footer_widgets_single",
										"std" => "true",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("Show footer widgets on pages?", 'Hazen' ),
										"desc" => __("Select yes if you want to show footer widgets on pages.", 'Hazen' ),
										"id" => "show_footer_widgets_page",
										"std" => "true",
										"type" => "proupgrade");		
										
					$options[] = array( "name" => __("Show footer widgets on category pages?", 'Hazen' ),
										"desc" => __("Select yes if you want to show footer widgets on category pages.", 'Hazen' ),
										"id" => "show_footer_widgets_archive",
										"std" => "true",
										"type" => "proupgrade");																													
																				
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Logo", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show footer logo?", 'Hazen' ),
										"desc" => __("Select yes if you want to show logo in footer.", 'Hazen' ),
										"id" => "show_footer_logo",
										"std" => "true",
										"type" => "proupgrade");

				$options[] = array( "name" => __("Upload Logo", 'Hazen' ),
									"desc" => __("Upload your logo here. Max width 250px", 'Hazen' ),
									"id" => "footer_logo",
									"type" => "proupgrade");						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Search Box", 'Hazen' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show search box in footer?", 'Hazen' ),
										"desc" => __("Select yes if you want to show search box in footer.", 'Hazen' ),
										"id" => "show_footer_search",
										"std" => "true",
										"type" => "proupgrade");						

										
		$options[] = array( "type" => "groupcontainerclose");												
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}