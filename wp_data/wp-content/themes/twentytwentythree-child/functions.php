<?php
/*
Plugin Name: Custom Footer Columns
Description: A plugin to add custom footer columns using a shortcode.
Version: 1.0
Author: Your Name
*/

// Shortcode function to display footer columns
function my_footer_columns_shortcode() {
    ob_start();
    ?>
    <div class="custom-footer">
        <div class="footer-columns">
            <div class="footer-col">
                <h3>Danh mục bài viết</h3>
                <ul>
                    <li>&raquo; Home</li>
                    <li>&raquo; About</li>
                    <li>&raquo; FAQ</li>
                    <li>&raquo; Get Started</li>
                    <li>&raquo; Videos</li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Bài viết mới nhất</h3>
                <ul>
                    <li>&raquo; Home</li>
                    <li>&raquo; About</li>
                    <li>&raquo; FAQ</li>
                    <li>&raquo; Get Started</li>
                    <li>&raquo; Videos</li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>Bình luận mới nhất</h3>
                <ul>
                    <li>&raquo; Home</li>
                    <li>&raquo; About</li>
                    <li>&raquo; FAQ</li>
                    <li>&raquo; Get Started</li>
                    <li>&raquo; Imprint</li>
                </ul>
            </div>
        </div>
        <div class="footer-social">
            <a href="#" aria-label="Facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#" aria-label="Twitter">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="#" aria-label="Instagram">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="#" aria-label="Google Plus">
                <i class="fa-brands fa-google-plus-g"></i>
            </a>
            <a href="#" aria-label="Email">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>

        <div class="footer-text">
            <p>
                <a href="#">National Transaction Corporation</a> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]
            </p>
            <p><strong>&copy; All right Reversed. Sunlimetech</strong></p>
        </div>
    <?php
    return ob_get_clean();
}
add_shortcode('my_footer_columns', 'my_footer_columns_shortcode');

// Enqueue Dashicons for social icons
function my_enqueue_dashicons() {
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'my_enqueue_dashicons');

// Enqueue Font Awesome for social icons
function my_enqueue_fontawesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'my_enqueue_fontawesome');

// Add custom styles for the footer
function my_custom_footer_styles() {
    ?>
    <style>
        .custom-footer {
            background: #007b5e;
            color: #fff;
            padding: 40px 0 20px 0;
        }
        .footer-columns {
            display: flex;
            justify-content: flex-start;
            gap: 60px;
            max-width: 1400px;
            margin: 0 auto 40px auto;
            margin-left: 80px;
        }
        .footer-col {
            min-width: 320px;
            text-align: left;
        }
        .footer-col h3 {
            border-left: 4px solid #fff;
            padding-left: 10px;
            font-size: 1em; /* giảm từ 2.2em */
            font-weight: bold;
            margin-bottom: 20px;
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
        }
        .footer-col li {
            font-size: 1.1em;
            margin-bottom: 12px;
            transition: padding-left 0.2s, font-weight 0.2s;
            cursor: pointer;
        }
        .footer-col li:hover {
            padding-left: 16px;
            font-weight: bold;
        }
        .footer-social {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .footer-social a {
            color: #fff;
            font-size: 1.8em; /* giảm từ 2.5em */
            margin: 0 12px;
            text-decoration: none;
            vertical-align: middle;
        }
        .footer-text {
            text-align: center;
            font-size: 1em; /* giảm từ 1.4em */
            margin-top: 20px;
            color: #fff;
        }
        .footer-text a {
            color: #fff;
            text-decoration: underline;
        }
        @media (max-width: 900px) {
            .footer-columns {
                flex-direction: column;
                align-items: center;
                gap: 30px;
                margin-left: 0;
            }
            .footer-col {
                min-width: 220px;
            }
        }
    </style>
    <?php
}
add_action('wp_head', 'my_custom_footer_styles');