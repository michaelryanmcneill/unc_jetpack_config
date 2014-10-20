<?php
/*
Plugin Name: UNC Jetpack Config
Plugin URI: http://github.com/michaelryanmcneill/unc_jetpack_config
Description: Disables Jetpack Modules that are disallowed on the network and auto-activates default modules. 
Version: 1.0
Author: Michael McNeill (webdotunc)
Author URI: http://michaelryanmcneill.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Modules that should be definitely disabled.
 */

	/**
	 * Jetpack SSO/WordPress.com Connect (Web.unc.edu doesn't allow non-onyen authentication.)
	 */
	function unc_kill_sso ( $modules ) {
    	unset( $modules['sso'] );
    	return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_sso' );
	function unc_kill_wpcc ( $modules ) {
	    unset( $modules['wpcc'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_wpcc' );

	/**
	 * Custom CSS (Functionality already enabled through UNC Custom CSS.)
	 */
	function unc_kill_custom_css ( $modules ) {
    	unset( $modules['custom-css'] );
    	return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_custom_css' );

	/**
	 * VaultPress (Individual sites should not use VaultPress, the network already has it enabled.)
	 */
	function unc_kill_vaultpress ( $modules ) {
	    unset( $modules['vaultpress'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_vaultpress' );
	
	/**
	 * Widget Visibility (Conflicts with Widget Logic plugin.)
	 */
	function web_kill_widget_visibility ( $modules ) {
	    unset( $modules['widget-visibility'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'web_kill_widget_visibility' );

	/**
	 * JSON API (Conflicts with JSON REST API plugin and in general don't want to offer this functionality to standard users.)
	 */
	function unc_kill_json_api ( $modules ) {
    	unset( $modules['json-api'] );
    	return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_json_api' );

	/**
	 * Monitor (No need for this functionality, users can't really do anything when web/sites goes down.)
	 */
	function unc_kill_monitor ( $modules ) {
    	unset( $modules['monitor'] );
    	return $modules;
	}   
	add_filter( 'jetpack_get_available_modules', 'unc_kill_monitor' );

	/**
	 * Contact Form (Functionality already enabled through Gravity Forms.)
	 */
	function unc_kill_contact_form ( $modules ) {
	    unset( $modules['contact-form'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_contact_form' );

	/**
	 * Custom Content Types (Functionality already enabled through WP Types.)
	 */
	function unc_kill_custom_content_types ( $modules ) {
	    unset( $modules['custom-content-types'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_custom_content_types' );

/**
 * Modules that I think might need to be disabled.
 */
	/**
	 * Beautiful Math (Functionality already enabled through WP LaTeX.)
	 */
	function unc_kill_latex ( $modules ) {
	    unset( $modules['latex'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_latex' );

/**
 * Modules that I have questions about.
 */
	/**
	 * Site Verification (Might conflict with WordPress SEO.)
	 * Re: jetpack/class.jetpack.php; line 122
	 */
	function unc_kill_verification_tools ( $modules ) {
    	unset( $modules['verification-tools'] );
    	return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_verification_tools' );

	/**
	 * Omnisearch (Sends data to Automattic's servers.)
	 */
	function unc_kill_omnisearch ( $modules ) {
	    unset( $modules['omnisearch'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_omnisearch' );

	/**
	 * Related Posts (Sends data to Automattic's servers.)
	 * I'm okay with this sending data, because using one that pings the DB is useless and a memory hog.
	 */
	function unc_kill_related_posts ( $modules ) {
	    unset( $modules['related-posts'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_related_posts' );

	/**
	 * Random Redirect (Do we even want to enable this functionality?)
	 */
	function unc_kill_random_redirect ( $modules ) {
	    unset( $modules['random-redirect'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_random_redirect' );

	/**
	 * Post by Email (Do we even want to enable this functionality?)
	 */
	function unc_kill_post_by_email ( $modules ) {
	    unset( $modules['post-by-email'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_post_by_email' );

	/**
	 * VideoPress (Do we even want to enable this functionality since users must subscribe to the VideoPress service?)
	 */
	function unc_kill_videopress ( $modules ) {
	    unset( $modules['videopress'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_videopress' );

	/**
	 * Mobile Theme (Do we want to offer users this functionality when we're pushing a responsive theme?)
	 */
	function unc_kill_minileven ( $modules ) {
	    unset( $modules['minileven'] );
	    return $modules;
	}
	add_filter( 'jetpack_get_available_modules', 'unc_kill_minileven' );

/**
 * Modules that I think are good to leave available, but not default activate.
 */
	/**
	 * Notifications (Recieve notification of site activity via the admin toolbar and your Mobile devices.)
	 */
	// function unc_kill_notes ( $modules ) {
	//     unset( $modules['notes'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_notes' );
	// function unc_kill_mobile_push ( $modules ) {
	//     unset( $modules['mobile-push'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_mobile_push');

	/**
	 * Jetpack Comments (Let readers comment with WordPress.com, Twitter, Facebook, or Google+ accounts.)
	 */
	// function unc_kill_comments ( $modules ) {
	//     unset( $modules['comments'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_comments' );

	/**
	 * Carousel (Transform standard image galleries into full-screen slideshows.)
	 */
	// function unc_kill_carousel ( $modules ) {
	//     unset( $modules['carousel'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_carousel' );

	/**
	 * Likes (Give visitors an easy way to show thir appreciation for your content.)
	 */
	// function unc_kill_likes ( $modules ) {
	//     unset( $modules['likes'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_likes' );

	/**
	 * Gravatar Hovercards (Enable pop-up business cards over commenters' Gravatars.)
	 */
	// function unc_kill_gravatar_hovercards ( $modules ) {
	//     unset( $modules['gravatar-hovercards'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_gravatar_hovercards' );

	/**
	 * Enhanced Distribution (Share your public posts and comments to search engines and other services.)
	 */
	// function unc_kill_enhanced_distribution ( $modules ) {
	//     unset( $modules['enhanced-distribution'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_enhanced_distribution' );

	/**
	 * Infinite Scroll (Add support for infinite scroll to your theme.)
	 */
	// function unc_kill_infinite_scroll ( $modules ) {
	//     unset( $modules['infinite-scroll'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_infinite_scroll' );

	/**
	 * Subscriptions (Allow user to subscribe to your posts and comments and recieve notifications via email.)
	 * This could possibly be a replacement for MailPoet (how we initally intended MailPoet to be used by users.)
	 */
	// function unc_kill_subscriptions ( $modules ) {
	//     unset( $modules['subscriptions'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_subscriptions' );

	/**
	 * Tiled Galleries (Display your image galleries in a variety of sleek, graphic arrangements.)
	 */
	// function unc_kill_tiled_gallery ( $modules ) {
	//     unset( $modules['tiled-gallery'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_tiled_gallery' );

	/**
	 * Sharing (Allow visitors to share your content on Facebook, Twitter, and more with a click.)
	 */
	// function unc_kill_sharedaddy ( $modules ) {
	//     unset( $modules['sharedaddy'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_sharedaddy' );

	/**
	 * Spelling and Grammar (Check your spelling, style, and grammar with the After the Deadline proofreading service.)
	 */
	// function unc_kill_after_the_deadline ( $modules ) {
	//     unset( $modules['after-the-deadline'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_after_the_deadline' );

	/**
	 * Publicize (Share new posts on social media networks automatically.)
	 */
	// function unc_kill_publicize ( $modules ) {
	//     unset( $modules['publicize'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_publicize' );

	/**
	 * Google+ Profile (Give users the ability to share posts to Google+, and add your site link to your Google+ profile.)
	 */
	// function unc_kill_gplus_authorship ( $modules ) {
	//     unset( $modules['gplus-authorship'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_gplus_authorship' );

	/**
	 * WP.me Shortlinks (Enable WP.me-powered shortlinks for all posts and pages.)
	 */
	// function unc_kill_shortlinks ( $modules ) {
	//     unset( $modules['shortlinks'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_shortlinks' );

	/**
	 * Markdown (Write posts or pages in plain-text Markdown syntax.)
	 */
	// function unc_kill_markdown ( $modules ) {
	//     unset( $modules['markdown'] );
	//     return $modules;
	// }
	// add_filter( 'jetpack_get_available_modules', 'unc_kill_markdown' );

/**
 * Modules that I think should be default activated.
 */
	/**
	 * Extra Sidebar Widgets (Add images, Twitter streams, your site's RSS links, and more to your sidebar.)
	 * I don't think it can hurt to give users more widgets by default. 
	 *
	 * Shortcode Embeds (Embed content from YouTube, Vimeo, Slideshare, and more, no coding necessary.)
	 * This would make it easy for us to remove Viper's Video Quicktags, without having to do searching and replacing.
	 *
	 * WordPress.com Stats (Monitor your stats with clear, concise reports, and no additional load on your server.)
	 * This would give users a quick view at their site stats without needing to set up GA.
	 *
	 * Photon (Accelerate your site by loading images from the WordPress.com CDN.)
	 * I lied, this is my absolute favorite feature of using Jetpack. This would improve speed of all sites, take load of NFS (and our infrastructure in general) and would allow us to provide a simple CDN for images. How cool would that be?
	 */
	function unc_auto_activate_modules() {
    	return array( 'widgets', 'shortcodes', 'stats', 'photon' );
	}
	add_filter( 'jetpack_get_default_modules', 'unc_auto_activate_modules' );