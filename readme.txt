=== SV 100 ===
Contributors: matthias-reuter, matthiasbathke, dennisheiden
Requires PHP: 8.0
Requires at least: 6.1
Tested up to: 6.5.5
Stable tag: 2.1.01
License: GPL-3.0-or-later
License URI: https://www.gnu.org/licenses/gpl-3.0-standalone.html

Our SV 100 theme is a modular multipurpose theme allowing maximum PageSpeed scores and superb SEO performance.

== Description ==
Our years of experience in developing custom themes for our customers results in our first public theme release: SV 100.

The main purpose was to create a theme that will always be lightweight, even with a rich featureset.

Our high quality coding standards help to deliver a high performance theme powered by our stable custom framework underneath.

Our theme brings:
* Pagespeed 100 out of the box
* full compatibility with wp-rocket enhance your pagespeed even more
* Gutenberg Support
* 100% child-theme-support with advanced standards to replace or extend every theme module or asset
* premium support available in English and German on enterprise level.
* modular framework to allow full to configure which modules are loaded
* advanced Scripts loading to allow you to configure loading of each CSS or JS
* clean code standards themewide (PHP, HTML, CSS, JS)
* lean and SEO friendly HTML Output
* no dependencies to frameworks like Bootstrap

<a href="https://straightvisions.com/en/projects/sv100/">More Info</a>
<a href="https://straightvisions.com/en/technology/pagespeed-wordpress-themes-comparison/">Pagespeed - WordPress Themes Comparison</a>

== Changelog ==

= 2.1.01 =
* Update Core

= 2.1.00 =
* Several Improvements

= 2.0.00 =
* Major Release
* Support for Site Editor
* Removed support for Classic PHP Templates

= 1.9.00 =
Core v9.000 Upgrade Notice / Breaking Change: Make Metabox Settings hidden on Post Edit Screens

Manually Update SV100 Metabox Settings to new metakeys via SQL Query:

UPDATE wp_postmeta SET meta_key = REPLACE(meta_key, 'sv100_sv_metabox_settings_', '_sv100_sv_metabox_settings_');

Change Table prefix when custom prefix is used.

= 1.8.45 =
* Module Footer - Feat - Add - Override Sidebar via Metabox in Post
* Module Footer Copyright - Feat - Add - Override Sidebar via Metabox in Post
* Module Header Menu - Override Primary Menu Visibility via Metabox in Post
* Module - Header - Override Sidebar via Metabox in Post
* Module - Header Menu - Override Header Menu Top Level Color per Post
* Module - Header Menu - Override Header Menu Top Level Background Color per Post

= 1.8.44 =
* Module Block Paragraph - Fix: align middle for inline images
* Module Common - Move Spacing from Module Content to Module Common
* Module Content - Refactor Sidebars to Grid instead of Flex
* Module Content - Move Spacing from Module Content to Module Common
* Module Content - Remove Settings: Margin, Padding, Border
* Module Footer - Add Support for Common Spacing CSS
* Module Footer Copyright - Add Support for Common Spacing CSS
* Module Header - Remove Settings: Margin, Padding, Border, Box Shadow
* Module Header - Add Support for Common Spacing CSS
* Module Header Bar - Add Support for Common Spacing CSS
* Module Header Content - Remove Settings: Margin, Padding, Border
* Module Header Content - Add Support for Common Spacing CSS

= 1.8.43 =
* sv footer - config - remove - box-shadow, spacing, border -> Styling these parameters is now block-territory or as fallback child-theme or custom css territory
* sv footer copyright - config - remove - spacing, border -> Styling these parameters is now block-territory or as fallback child-theme or custom css territory
* sv header bar - config - remove - spacing, border, font-styling -> Styling these parameters is now block-territory or as fallback child-theme or custom css territory
Sidebars reduced from 2 to 1, use Block Columns in future

= 1.8.42 =
* FEAT - REMOVE - COPYRIGHT FOOTER MULTIPLE SIDEBARS SUPPORT

= 1.8.41 =
* FEAT - REMOVE - FOOTER CSS OUTPUT FOR SIDEBAR COLUMNS
* FEAT - REMOVE - FOOTER MULTIPLE SIDEBARS SUPPORT

= 1.8.40 =
* FEAT - REMOVE - FOOTER CSS OUTPUT FOR COMMON LINKS

= 1.8.30 =
* FEAT - ADD - Section Visibility for Block Group Sections
* STYLE - ADD - GROUP: Sticky
* STYLE - ADD - HEADING: No Margin
* SETTINGS - ADD - IMAGE: Caption
* SETTINGS - ADD - COPYRIGHT FOOTER: Links Styling

= 1.8.20 =
7. Public Release

= 1.5.14 =
6. Public Release

= 1.5.13 =
5. Public Release

= 1.5.11 =
4. Public Release

= 1.5.10 =
3. Public Release

= 1.5.00 =
2. Public Release

= 1.4.26 =
Initial Public Release