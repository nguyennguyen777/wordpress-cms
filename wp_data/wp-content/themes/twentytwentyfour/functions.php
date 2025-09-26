<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Enqueue custom footer styles
 */
if ( ! function_exists( 'twentytwentyfour_footer_styles' ) ) :
	/**
	 * Enqueue custom footer styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_footer_styles() {
		wp_add_inline_style( 'wp-block-library', '
			/* Custom Footer Styles */
			.custom-footer {
				background-color: var(--wp--preset--color--base-2);
				border-top: 1px solid var(--wp--preset--color--contrast-3);
			}
			
			.footer-contact-info {
				margin-top: 1rem;
			}
			
			.footer-contact-info .contact-item {
				display: flex;
				align-items: center;
				margin-bottom: 0.5rem;
				font-size: 0.9rem;
			}
			
			.footer-contact-info .contact-item i {
				margin-right: 0.5rem;
				color: var(--wp--preset--color--contrast-2);
				width: 16px;
			}
			
			.footer-contact-info .contact-item a {
				color: var(--wp--preset--color--contrast-2);
				text-decoration: none;
				transition: color 0.3s ease;
			}
			
			.footer-contact-info .contact-item a:hover {
				color: var(--wp--preset--color--contrast);
			}
			
			.footer-social-links {
				display: flex;
				flex-wrap: wrap;
				gap: 1rem;
			}
			
			.footer-social-links .social-link {
				display: inline-flex;
				align-items: center;
				justify-content: center;
				width: 40px;
				height: 40px;
				background-color: var(--wp--preset--color--contrast-3);
				color: var(--wp--preset--color--contrast-2);
				border-radius: 50%;
				text-decoration: none;
				transition: all 0.3s ease;
			}
			
			.footer-social-links .social-link:hover {
				background-color: var(--wp--preset--color--contrast);
				color: var(--wp--preset--color--base);
				transform: translateY(-2px);
			}
			
			.footer-social-links .social-link i {
				font-size: 1.1rem;
			}
			
			.footer-recent-posts ul {
				list-style: none;
				padding: 0;
				margin: 0;
			}
			
			.footer-recent-posts li {
				margin-bottom: 0.75rem;
				padding-bottom: 0.75rem;
				border-bottom: 1px solid var(--wp--preset--color--contrast-3);
			}
			
			.footer-recent-posts li:last-child {
				border-bottom: none;
				margin-bottom: 0;
				padding-bottom: 0;
			}
			
			.footer-recent-posts a {
				color: var(--wp--preset--color--contrast-2);
				text-decoration: none;
				font-weight: 500;
				transition: color 0.3s ease;
			}
			
			.footer-recent-posts a:hover {
				color: var(--wp--preset--color--contrast);
			}
			
			.footer-recent-posts .post-date {
				display: block;
				font-size: 0.8rem;
				color: var(--wp--preset--color--contrast-3);
				margin-top: 0.25rem;
			}
			
			.footer-bottom {
				border-top: 1px solid var(--wp--preset--color--contrast-3);
				text-align: center;
			}
			
			/* Responsive Design */
			@media (max-width: 768px) {
				.wp-block-columns.alignwide {
					flex-direction: column;
				}
				
				.wp-block-column {
					flex-basis: 100% !important;
					margin-bottom: 2rem;
				}
				
				.footer-social-links {
					justify-content: center;
				}
			}
		' );
	}
endif;

add_action( 'wp_enqueue_scripts', 'twentytwentyfour_footer_styles' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

/**
 * Customizer settings for footer
 */
if ( ! function_exists( 'twentytwentyfour_customize_footer' ) ) :
	/**
	 * Add footer customizer settings
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @return void
	 */
	function twentytwentyfour_customize_footer( $wp_customize ) {
		
		// Add Footer Section
		$wp_customize->add_section( 'footer_settings', array(
			'title'    => __( 'Footer Settings', 'twentytwentyfour' ),
			'priority' => 160,
			'capability' => 'edit_theme_options',
		) );
		
		// Contact Email
		$wp_customize->add_setting( 'footer_contact_email', array(
			'default'           => get_option( 'admin_email' ),
			'sanitize_callback' => 'sanitize_email',
		) );
		
		$wp_customize->add_control( 'footer_contact_email', array(
			'label'   => __( 'Contact Email', 'twentytwentyfour' ),
			'section' => 'footer_settings',
			'type'    => 'email',
		) );
		
		// Contact Phone
		$wp_customize->add_setting( 'footer_contact_phone', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( 'footer_contact_phone', array(
			'label'   => __( 'Contact Phone', 'twentytwentyfour' ),
			'section' => 'footer_settings',
			'type'    => 'text',
		) );
		
		// Contact Address
		$wp_customize->add_setting( 'footer_contact_address', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		
		$wp_customize->add_control( 'footer_contact_address', array(
			'label'   => __( 'Contact Address', 'twentytwentyfour' ),
			'section' => 'footer_settings',
			'type'    => 'textarea',
		) );
		
		// Social Media URLs
		$social_platforms = array(
			'facebook'  => __( 'Facebook URL', 'twentytwentyfour' ),
			'twitter'   => __( 'Twitter URL', 'twentytwentyfour' ),
			'instagram' => __( 'Instagram URL', 'twentytwentyfour' ),
			'linkedin'  => __( 'LinkedIn URL', 'twentytwentyfour' ),
			'youtube'   => __( 'YouTube URL', 'twentytwentyfour' ),
		);
		
		foreach ( $social_platforms as $platform => $label ) {
			$wp_customize->add_setting( 'footer_' . $platform . '_url', array(
				'default'           => '#',
				'sanitize_callback' => 'esc_url_raw',
			) );
			
			$wp_customize->add_control( 'footer_' . $platform . '_url', array(
				'label'   => $label,
				'section' => 'footer_settings',
				'type'    => 'url',
			) );
		}
		
		// Footer Text
		$wp_customize->add_setting( 'footer_text', array(
			'default'           => sprintf( 
				esc_html__( 'Designed with %1$s', 'twentytwentyfour' ),
				'<a href="' . esc_url( __( 'https://wordpress.org', 'twentytwentyfour' ) ) . '" rel="nofollow">WordPress</a>'
			),
			'sanitize_callback' => 'wp_kses_post',
		) );
		
		$wp_customize->add_control( 'footer_text', array(
			'label'   => __( 'Footer Text', 'twentytwentyfour' ),
			'section' => 'footer_settings',
			'type'    => 'textarea',
		) );
	}
endif;

add_action( 'customize_register', 'twentytwentyfour_customize_footer' );

/**
 * Custom footer functions
 */

if ( ! function_exists( 'twentytwentyfour_get_footer_data' ) ) :
	/**
	 * Get footer data from database
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return array
	 */
	function twentytwentyfour_get_footer_data() {
		// Get site information
		$site_name = get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description' );
		$site_url = home_url();
		
		// Get contact information from theme options
		$contact_email = get_theme_mod( 'footer_contact_email', get_option( 'admin_email' ) );
		$contact_phone = get_theme_mod( 'footer_contact_phone', '' );
		$contact_address = get_theme_mod( 'footer_contact_address', '' );
		
		// Get social media links
		$social_links = array(
			'facebook' => get_theme_mod( 'footer_facebook_url', '#' ),
			'twitter' => get_theme_mod( 'footer_twitter_url', '#' ),
			'instagram' => get_theme_mod( 'footer_instagram_url', '#' ),
			'linkedin' => get_theme_mod( 'footer_linkedin_url', '#' ),
			'youtube' => get_theme_mod( 'footer_youtube_url', '#' ),
		);
		
		// Get recent posts for footer
		$recent_posts = get_posts( array(
			'numberposts' => 3,
			'post_status' => 'publish',
			'orderby' => 'date',
			'order' => 'DESC'
		) );
		
		// Get footer text
		$footer_text = get_theme_mod( 'footer_text', sprintf( 
			esc_html__( 'Designed with %1$s', 'twentytwentyfour' ),
			'<a href="' . esc_url( __( 'https://wordpress.org', 'twentytwentyfour' ) ) . '" rel="nofollow">WordPress</a>'
		) );
		
		return array(
			'site_name' => $site_name,
			'site_description' => $site_description,
			'site_url' => $site_url,
			'contact_email' => $contact_email,
			'contact_phone' => $contact_phone,
			'contact_address' => $contact_address,
			'social_links' => $social_links,
			'recent_posts' => $recent_posts,
			'footer_text' => $footer_text,
		);
	}
endif;

if ( ! function_exists( 'twentytwentyfour_footer_social_links' ) ) :
	/**
	 * Display social media links
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_footer_social_links() {
		$footer_data = twentytwentyfour_get_footer_data();
		$social_links = $footer_data['social_links'];
		
		$social_icons = array(
			'facebook' => 'fab fa-facebook-f',
			'twitter' => 'fab fa-twitter',
			'instagram' => 'fab fa-instagram',
			'linkedin' => 'fab fa-linkedin-in',
			'youtube' => 'fab fa-youtube',
		);
		
		foreach ( $social_links as $platform => $url ) {
			if ( ! empty( $url ) && $url !== '#' ) {
				$icon_class = isset( $social_icons[ $platform ] ) ? $social_icons[ $platform ] : 'fas fa-link';
				echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer" class="social-link social-' . esc_attr( $platform ) . '">';
				echo '<i class="' . esc_attr( $icon_class ) . '"></i>';
				echo '<span class="screen-reader-text">' . esc_html( ucfirst( $platform ) ) . '</span>';
				echo '</a>';
			}
		}
	}
endif;

if ( ! function_exists( 'twentytwentyfour_footer_recent_posts' ) ) :
	/**
	 * Display recent posts in footer
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_footer_recent_posts() {
		$footer_data = twentytwentyfour_get_footer_data();
		$recent_posts = $footer_data['recent_posts'];
		
		if ( ! empty( $recent_posts ) ) {
			echo '<ul class="footer-recent-posts">';
			foreach ( $recent_posts as $post ) {
				echo '<li>';
				echo '<a href="' . esc_url( get_permalink( $post->ID ) ) . '">';
				echo esc_html( $post->post_title );
				echo '</a>';
				echo '<span class="post-date">' . get_the_date( 'M j, Y', $post->ID ) . '</span>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}
endif;
