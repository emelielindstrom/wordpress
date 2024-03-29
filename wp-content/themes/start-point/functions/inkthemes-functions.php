<?php
//Load languages file
$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
load_theme_textdomain('startpoint', get_template_directory() . '/languages');

function startpoint_setup() {
    /* ----------------------------------------------------------- */
    /* Theme Support
      /*------------------------------------------------------------ */
    add_theme_support('post-thumbnails');
    add_image_size('post_thumbnail', 600, 250, true);
    add_image_size('post_thumbnail_1', 70, 70, true);
    //custom background support
    add_theme_support('custom-background');
    /* ----------------------------------------------------------------------------------- */
    /* Auto Feed Links Support
      /*----------------------------------------------------------------------------------- */
    add_theme_support('automatic-feed-links');

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();
    // activate support for thumbnails
    // added in 2.9
    register_nav_menus(array(
        'home-menu' => HOME_MENU,
        'frontpage-menu' => FRONT_MENU,
        'footer-menu' => FOOTER_MENU
            )
    );    
}

add_action('after_setup_theme', 'startpoint_setup');

// Add CLASS attributes to the first <ul> occurence in wp_page_menu

function startpoint_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'startpoint_add_menuclass');

//main nav
function startpoint_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'menu_class' => 'sf-menu', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'startpoint_nav_fallback'));
    else
        startpoint_nav_fallback();
}

function startpoint_nav_fallback() {
    ?>

    <ul class="sf-menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

//Frontpage nav
function startpoint_frontpage_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'menu_class' => 'sf-menu', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'startpoint_frontpage_nav_fallback'));
    else
        startpoint_frontpage_nav_fallback();
}

function startpoint_frontpage_nav_fallback() {
    ?>
    <ul class="sf-menu">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

//mobile nav
function startpoint_mobile_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'home-menu', 'menu_class' => '', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'startpoint_mobile_nav_fallback'));
    else
        startpoint_mobile_nav_fallback();
}

function startpoint_mobilefront_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'frontpage-menu', 'menu_class' => '', 'menu_id' => '', 'container' => '', 'fallback_cb' => 'startpoint_mobile_nav_fallback'));
    else
        startpoint_mobile_nav_fallback();
}

function startpoint_mobile_nav_fallback() {
    ?>
    <ul>
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

//Footer nav
function startpoint_footer_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-menu-ul', 'menu_id' => 'nav', 'container' => '', 'fallback_cb' => 'startpoint_footer_nav_fallback'));
    else
        startpoint_footer_nav_fallback();
}

function startpoint_footer_nav_fallback() {
    ?>
    <ul id="nav" class="footer-menu-ul">
        <?php
        wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
        ?>
    </ul>

    <?php
}

function startpoint_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . esc_url(home_url('/')) . '">' . HOME . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . esc_url(home_url('/')) . '">' . HOME . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'startpoint_nav_menu_items');
/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */

function startpoint_breadcrumbs() {
    $delimiter = '&#187;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = esc_url(home_url('/'));
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '&#187;' . $slug['slug'] . '&#187;">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo PAGE . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
}

//* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
  /*----------------------------------------------------------------------------------- */

/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function startpoint_get_thumbnail($iw, $ih) {
    $id = "";
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    if ($thumb) {
        $image = startpoint_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
            print "<a href='$permalink' class='rbh-post-thumbnail'><img class='postimg post-thumb' src='$image[url]' width='$image[width]' height='$image[height]' /></a>";
        }
    }
}

//custom post image crop
function startpoint_get_thumbnail2($iw, $ih) {
    $id = "";
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    if ($thumb) {
        $image = startpoint_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
            print "<a href='$image[url]' class='rbh-post-thumbnail'><img class='postimg post-thumb' src='$image[url]' width='$image[width]' height='$image[height]' /></a>";
        }
    }
}

//crop img link
function startpoint_catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if (empty($first_img)) {
        $first_img = '';
    }
    return $first_img;
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function startpoint_get_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $id = "";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if ($img_source) {
        $img_path = startpoint_image_resize($img_source, $w, $h);
        if (!empty($img_path['url'])) {
            print "<a href='$permalink' class='rbh-post-thumbnail'><img src='$img_path[url]' class='post-thumb postimg' alt='Post Image'/></a>";
        }
    }
}

//custompost image crop
function startpoint_get_image2($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $id = "";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if ($img_source) {
        $img_path = startpoint_image_resize($img_source, $w, $h);
        if (!empty($img_path['url'])) {
            print "<a href='$img_path[url]' data-lightbox='image-2' class='rbh-post-thumbnail'><img src='$img_path[url]' class='post-thumb postimg' alt='Post Image'/></a>";
        }
    }
}

//custom image link
function startpoint_get_image_link($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $id = "";
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    if ($img_source) {
        $img_path = startpoint_image_resize($img_source, $w, $h);
        if (!empty($img_path['url'])) {
            print "<a class='wook-hover-button' href='$img_path[url]' data-lightbox='image-1'>Large View</a>";
        }
    }
}

//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function startpoint_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . '&nbsp' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function startpoint_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

/** Register sidebars by running startpoint_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'startpoint_widgets_init');

/**
 * Pagination
 *
 */
function startpoint_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

/////////Theme Options
/* ----------------------------------------------------------------------------------- */
/* Add Favicon
  /*----------------------------------------------------------------------------------- */
function startpoint_childtheme_favicon() {
    if (startpoint_get_option('startpoint_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . startpoint_get_option('startpoint_favicon') . '"/>' . "\n";
    } 
}

add_action('wp_head', 'startpoint_childtheme_favicon');

/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */

function startpoint_of_head_css() {
    $output = '';
    $custom_css = startpoint_get_option('startpoint_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'startpoint_of_head_css');

// activate support for thumbnails
function startpoint_get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

//Trm excerpt
function startpoint_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function startpoint_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

//Trm post title
function startpoint_the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('startpoint_the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}
?>