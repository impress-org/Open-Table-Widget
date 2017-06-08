=== Open Table Widget ===
Contributors: wordimpress, dlocc, webdevmattcrom
Donate link: http://wordimpress.com/
Tags: open table, open table widget, open table form, open table reservations, reservations, restaurant, open table shortcode
Requires at least: 4.2
Tested up to: 4.8
Stable tag: 1.8.1

Open Table Widget makes it a breeze for you to add powerful Open Table reservation forms to your website via an easy to use and intuitive widget.

== Description ==

*Open Table Widget* is a powerful WordPress widget that allows you to create powerful restaurant reservation forms for your website. Easily configure reservation forms that will look and function amazingly. Help increase the number of reservations and ultimately revenue by utilizing the power of Open Table.

Using the widget is easy! This plugin is includes helpful tooltips, videos and in depth documentation to get you quickly up and running. Open Table Widget is for WordPress users of all skill levels. Don't know CSS? No problem! There's no code required. We've baked in several amazing looking prebuilt form layouts ("themes") to make integrating reservation forms into any theme that much easier.

This plugin is actively developed and maintained and we welcome all suggestions, feedback and comments. If you enjoy this plugin be sure to rate it 5 stars and as "Working" to help get the word out.

= Country Support =

Open Table Widget currently only supports U.S.-based restaurants. If you want to use Open Table widget in U.K., Germany, Japan, or Mexico, you can purchase Open Table Widget Premium. See details below.

= Open Table Widget Premium =

Open Table Widget Pro is a significant upgrade to Open Table Widget that adds many features to the plugin. Upgrade today and save 10% using coupon code `otwupgrade` at checkout. Here is a preview of features included in the Pro version:

[youtube http://www.youtube.com/watch?v=kWAVSxuNCl0]

[View the Online Demo](http://opentablewidget.wordimpress.com/ "View the Online Demo of Open Table Widget Pro")

= PRO ONLY Features =

1. Display your widget anywhere on your site with our shortcode
2. Supports international restaurants including U.K., Canada, Germany, Japan, and Mexico.
3. More widget themes out of the box.
4. Customize Pre and Post Widget Content for additional SEO and user related content

= Disclaimer =

Be sure to test the reservation form. While we've done our best to code it for use in different website environments, we provide this code "as-is" and make no warranties, representations, covenants or guarantees with regard to the reservation tools, and will not be liable for any direct, indirect, incidental or consequential damages or for loss of profit, revenue, data, business or use arising out of your use of the reservation tools.

The developer of this plugin is in no way affiliated with Open Table the company or its affiliates. The code contained herein is developed for free use and distribution in an effort to give back to the WordPress community.

== Installation ==

1. Upload the `open-table-widget` folder and it's contents to the `/wp-content/plugins/` directory or install via the WP plugins panel in your WordPress admin dashboard
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it! You should now be able to use the widget.

Note: If you have WordPress 2.7 or above (and I hope you are) you can simply go to 'Plugins' &gt; 'Add New' in the WordPress admin and search for "Open Table Widget" and install it from there.

== Frequently Asked Questions ==

= Why should I use this plugin? =

If you want to include reservation integration into Open Table restaurant from a WordPress powered site, this plugin makes it easy and flexible. Compared to Open Table's own Reservation widget it's night and day.

= Why does the widget look funny in my theme? =

Most likely your theme has conflicting CSS that is interfering with the themes included with the plugin. If you're handy with CSS this can be an easy fix. If you are new to CSS then try out the Bare Bones theme to see if that looks nicer. Otherwise, you may have to hit up your coding friends to help you out.

= Are style issue supported? =

Not for the free plugin. If you are experiencing a style issue and need help, either upgrade to the Premium version and we will do our darndest to get it set up nicely for your theme.
Not for the free plugin. If you are experiencing a style issue and need help, either upgrade to the Premium version and we will do our darndest to get it set up nicely for your theme.

= Are there prebuilt styles included in the plugin? =

Yes, there are three basic themes included in the free version of the plugin. The premium version has many more options and themes.

== Screenshots ==

1. The "Minimal Light" widget theme view on the frontend of WordPress

2. The "Minimal Dark" widget theme view on the frontend of WordPress

3. A view of the widget in the WP Admin widgets view version 1.1 (it may look different depending on your version).

4. New Selectize select fields are browser edge aware, making the select options always in view regardless of where they are on the screen.

== Changelog ==

= 1.8.1: June 8, 2016 =
* Tweak: Don't let widget themes be translatable
* Update for compatibility for WP 4.8.x

= 1.8: July 11, 2016 =
* Tweak: Code cleanup and improvements (https://github.com/WordImpress/Open-Table-Widget/issues/1 and https://github.com/WordImpress/Open-Table-Widget/issues/3)
* Fix: Completely separate logic so Selectric and Widget styles can be disabled in the settings without affecting the other (https://github.com/WordImpress/Open-Table-Widget/issues/14)
* Fix: Properly check for wp_error and wp_remote_get (https://github.com/WordImpress/Open-Table-Widget/issues/2)
* Enhancement: Disable keyboard on mobile devices (https://github.com/WordImpress/Open-Table-Widget/issues/5)
* Enhancement: Update to latest version of datepicker.js (https://github.com/WordImpress/Open-Table-Widget/issues/6)
* Enhancement: Set datepicker to today by default (https://github.com/WordImpress/Open-Table-Widget/issues/12)
* Enhancement: Make today and selected date highlight less subtle (https://github.com/WordImpress/Open-Table-Widget/issues/13)


= 1.7 =
* Made all external API calls and links either HTTPS or protocol agnostic to support full HTTPS sites.
* Removed all Bootstrap styles and JS
* Added [Selectric.js](http://lcdsantos.github.io/jQuery-Selectric/index.html) as default select functionality.
* Extended available times to 8am - 11:30pm

= 1.6.1 =
* Added otw_load_textdomain() to load localized translations when available

= 1.6 =
* New: Updated Open Table branding to their new logo
* Update: Prefixed the "dropdown" class usage to help out theme authors
* Update: Prefixed the "bootstrap-success" class usage to help out theme authors
* Update: Prefixed the "btn-"* class usage to help out theme authors
* Update: Prefixed the "selectpicker" class usage to help out theme authors
* Update: Prefixed the "datepicker-"* class usage and revised js script to help out theme authors
* Update: Swapped OTW_DEBUG for SCRIPT_DEBUG for non-minified scripts

= 1.5.1 =
* Improved: Replaced datepicker since bootstrap datepicker has no functioning noconflict mode

= 1.5 =
* New: German translation added
* Improved: z-index for datepicker now calculates better
* Improved: Highlights benefits of Pro version more directly

= 1.4 =
* New: Debug constant added for easier script and css debugging by developers
* Improved: datepicker JS minified
* Improved: Updated how the widget title is output to be better compatible with more sidebar register arguments
* Improved: OTW constants now use relative directories so the plugin works even if the main plugin directory is named something besides the default open-table-widget (for instance: open-table-widget-2) etc.
* Updates: jQuery Bootstrap Dropdown & jQuery Bootstrap Select scripts to the latest versions & tested
* Fix: Widget admin JS toggle now works with "accessibility mode" enabled
* Fix: Improved reservation date handling so it outputs more reliably

= 1.3 =
* New: Two new themes - Shadow Light and Dark
* New: Widget usage descriptions added to widget form
* New: Grunt implemented for plugin packaging
* New: Added promo video to options page
* New: Linked to video tutorial for finding Open Table restaurant ID
* Tested plugin with WordPress 3.8 for compatibility
* Updated: jQuery Datepicker plugin to latest version
* Updated: Improved the autocomplete search functionality of the Restaurant ID lookup
* Updated: Options screen moved logo left of tabs
* Fixed: Updated code to take care of several PHP notices
* Fixed: Minor issue with widget toggles in admin section

= 1.2 =
* Updated: Readme file for additional informaiton
* New: Separated out bootstrap dropdown JS for better support of Bootstrap ready themes

= 1.1.1 =
* Updated: Separated Twitter Bootstrap Dropdown from select for better control and Bootstrap compatibility
* NEW: Toggle on/off Twitter Bootstrap dropdowns

= 1.1 =
* NEW: Form themes added with two basic styles: Minimal Light and Minimal Dark
* NEW: Added form labels to the frontend output with new fields in the widget to toggle labels on or off
* NEW: Added the ability to customize form label text within "Content Options" - useful for non-English languages
* NEW: Twitter Bootstrap select menu implemented for better dropdowns (selects)
* NEW: Powered by Open Table at bottom of widget output
* Fixed: Issue with autocomplete selection effecting multiple instances of the widget in the WP admin
* Removed: Timepicker JS, just wasn't making the cut
* Update: Readme plugin description

= 1.0.1 =
* Fixed: JavaScript issue with main frontend JS script

= 1.0 =
* Initial plugin release