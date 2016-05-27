<?php
/**
 * WordPress main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link       http://codex.wordpress.org/Template_Hierarchy
 * @package    WordPress
 * @subpackage VisuAlive
 * @author     KUCKLU <kuck1u@visualive.jp>
 *             Copyright (C) 2015  KUCKLU and VisuAlive.
 *             This program is free software: you can redistribute it and/or modify
 *             it under the terms of the GNU General Public License as published by
 *             the Free Software Foundation, either version 3 of the License, or
 *             (at your option) any later version.
 *             This program is distributed in the hope that it will be useful,
 *             but WITHOUT ANY WARRANTY; without even the implied warranty of
 *             MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *             GNU General Public License for more details.
 *             You should have received a copy of the GNU General Public License
 *             along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<header class="canopy">
	<div class="canopy_inner">
		<div class="canopy_nav">
			ナビゲーション
		</div>
		<div class="canopy_content">
			<h1 class="canopy_title">VisuAlive is WordPress Theme</h1>
			<h2 class="canopy_excerpt">This theme is currently being developed.<br>Stay tuned!</h2>
		</div>
	</div>
</header>

<div class="grid-noGutter-equalHeight_sm-1">
	<div class="col">
		<section class="panel featured-simple">
			<div class="panel_inner">
				<h2 class="panel_title">Simple</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
			</div>
		</section>
	</div>
	<div class="col">
		<section class="panel featured-secure">
			<div class="panel_inner">
				<h2 class="panel_title">Secure</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
			</div>
		</section>
	</div>
	<div class="col">
		<section class="panel featured-speed">
			<div class="panel_inner">
				<h2 class="panel_title">Speed</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
			</div>
		</section>
	</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php get_footer(); ?>
