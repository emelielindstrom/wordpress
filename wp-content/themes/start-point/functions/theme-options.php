<?php

add_action('init', 'startpoint_of_options');
if (!function_exists('startpoint_of_options')) {

    function startpoint_of_options() {
        // VARIABLES
        $themename = 'StartPoint Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $startpoint_of_options;
        $startpoint_of_options = startpoint_get_option('startpoint_of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        $showhide_sections = array("Show" => "Show", "Hide" => "Hide");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("red" => "red", "black" => "black", "coffee" => "coffee", "green" => "green", "teal-green" => "teal-green", "blue" => "blue", "yellow" => "yellow", "dark-green" => "dark-green", "pink" => "pink");
        $lan_stylesheets = array("Default" => "Default");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        $captcha_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");

        $options[] = array("name" => "Custom Logo",
            "desc" => "Upload a logo for your Website. The recommended size for logo is 260px width x 50px height.",
            "id" => "startpoint_logo",
            "type" => "upload");

        //Background Image
        $options[] = array("name" => "Header Background Image",
            "desc" => "Choose a suitable header background for other pages of website. For eg. page, post, etc. Optimal width is 1600px and height is 150px.",
            "id" => "startpoint_headbg",
            "type" => "upload");

        $options[] = array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);
//****=============================================================================****//
        //Top Featured Image
        $options[] = array("name" => "Top Featured Image",
            "type" => "heading");


        $options[] = array("name" => "Top Featured Image",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Image",
            "desc" => "The optimal size of the image is 1600 px wide x 650 px height, but it can be varied as per your requirement.",
            "id" => "startpoint_slideimage1",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Video",
            "desc" => "Paste the embed code of vimeo or youtube video. Leave blank if you want a slider image.",
            "id" => "startpoint_slidevideo1",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Heading",
            "desc" => "Mention the heading for the First slider.",
            "id" => "startpoint_sliderheading1",
            "std" => "",
            "type" => "textarea");


        $options[] = array("name" => "Description",
            "desc" => "Here mention a short description for the First slider heading.",
            "id" => "startpoint_sliderdes1",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Button Text",
            "desc" => "Mention the button text for first slider.",
            "id" => "startpoint_Slider_butotntext1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Button Link",
            "desc" => "Mention button URL for first slider.",
            "id" => "startpoint_Slider_buttonlink1",
            "std" => "",
            "type" => "text");

        //****=============================================================================****//
        //HomePage Three column feature		
        $options[] = array("name" => "3 Column Feature Area",
            "type" => "heading");


        // 3 Column Feature block 1

        $options[] = array("name" => "First Column",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "First Icon",
            "desc" => "Enter the CSS class of the icons you want to use on your 3 column feature. You can find a list of icon classes <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>  
			To increase icon sizes relative to their container, use the fa-lg (33% increase), fa-2x, fa-3x, fa-4x, or fa-5x classes.",
            "id" => "startpoint_threecolumn_fet_font1",
            "std" => "fa fa-thumbs-up fa-5x",
            "type" => "text");

        $options[] = array("name" => "Title 1",
            "desc" => "Here you can mention a suitable title that will display the title in 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_title1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 1",
            "desc" => "Mention the URL for Title 1",
            "id" => "startpoint_services_title_link1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 1",
            "desc" => "Here you can mention a short description for 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_desc1",
            "std" => "",
            "type" => "textarea");


        // 3 Column Feature block 2

        $options[] = array("name" => "Second Block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Second Icon",
            "desc" => "Enter the CSS class of the icons you want to use on your 3 column feature. You can find a list of icon classes <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>  
			To increase icon sizes relative to their container, use the fa-lg (33% increase), fa-2x, fa-3x, fa-4x, or fa-5x classes.",
            "id" => "startpoint_threecolumn_fet_font2",
            "std" => "fa fa-smile-o fa-5x",
            "type" => "text");

        $options[] = array("name" => "Title 2",
            "desc" => "Here you can mention a suitable title that will display the title in 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_title2",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 2",
            "desc" => "Mention the URL for Title2",
            "id" => "startpoint_services_title_link2",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 2",
            "desc" => "Here you can mention a short description for 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_desc2",
            "std" => "",
            "type" => "textarea");


        // 3 Column Feature block 3

        $options[] = array("name" => "Third block",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Third Icon",
            "desc" => "Enter the CSS class of the icons you want to use on your 3 column feature. You can find a list of icon classes <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>  
			To increase icon sizes relative to their container, use the fa-lg (33% increase), fa-2x, fa-3x, fa-4x, or fa-5x classes.",
            "id" => "startpoint_threecolumn_fet_font3",
            "std" => "fa fa-eye fa-5x",
            "type" => "text");

        $options[] = array("name" => "Title 3",
            "desc" => "Here you can mention a suitable title that will display the title in 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_title3",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Link for Title 3",
            "desc" => "Mention the URL for Title 3",
            "id" => "startpoint_services_title_link3",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description 3",
            "desc" => "Here you can mention a short description for 3 column feature area.",
            "id" => "startpoint_threecolumn_fet_desc3",
            "std" => "",
            "type" => "textarea");


        //****=============================================================================****//
        //Homepage Recent blog section
        $options[] = array("name" => "Home Page Blog",
            "type" => "heading");

        $options[] = array("name" => "Title",
            "desc" => "Here you can mention a suitable title that will display the title in 3 column feature area.",
            "id" => "startpoint_home_blog_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description",
            "desc" => "Mention the description for blog section on home page.",
            "id" => "startpoint_home_blog_desc",
            "std" => "",
            "type" => "textarea");
        //****=============================================================================****//
        //Homepage Testimonial
        $options[] = array("name" => "Testimonials",
            "type" => "heading");

        $options[] = array("name" => "Title",
            "desc" => "Mention the title of Testimonial Section Here.",
            "id" => "startpoint_home_testimonial_heading",
            "std" => "",
            "type" => "text");

        //testimonial 1
        $options[] = array("name" => "Testimonial",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Author Image",
            "desc" => "Upload an image for the author. Optimal size is 148X148px.",
            "id" => "startpoint_testimonial_image1",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Testimonial text",
            "desc" => "Mention the testimonial here.",
            "id" => "startpoint_testimonial_text1",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Author Name",
            "desc" => "Mention the testimonial author name.",
            "id" => "startpoint_testimonial_name1",
            "std" => "",
            "type" => "text");

//****=============================================================================****//
        //Homepage Recent blog section
        $options[] = array("name" => "Contact Section",
            "type" => "heading");

        $options[] = array("name" => "Contact Section Title",
            "desc" => "Mention the title for contact section here.",
            "id" => "startpoint_home_contact_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Description",
            "desc" => "Mention the description for contact section on home page.",
            "id" => "startpoint_home_contact_desc",
            "std" => "",
            "type" => "textarea");

//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");

        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
            "id" => "startpoint_customcss",
            "std" => "",
            "type" => "textarea");

//****============================================================****//					

        startpoint_update_option('of_template', $options);
        startpoint_update_option('of_themename', $themename);
        startpoint_update_option('of_shortname', $shortname);
    }

}
?>
