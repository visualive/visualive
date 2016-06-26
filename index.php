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
	<div class="canopy-inner">
		<div class="canopy-nav">

		</div>
		<div class="canopy-content">
			<div class="canopy-title">
				<div data-aos="fade-down" data-aos-offset="0" data-aos-delay="400"><h1>VisuAlive is WordPress Theme</h1></div>
			</div>
			<div class="canopy-excerpt">
				<div data-aos="fade-up" data-aos-offset="0" data-aos-delay="800">
					<h2>This theme is currently being developed.<br>Stay tuned!</h2>
					<div class="fb-like" data-href="https://www.facebook.com/visualivejp/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
				</div>
			</div>
		</div>
	</div>
</header>

<section class="grid-noGutter-equalHeight_sm-1">
	<div class="col">
		<div class="panel featured--simple">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in" data-aos-delay="100">Simple</h2>
				<p data-aos="fade-in" data-aos-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up" data-aos-delay="100"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="panel featured--speed">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in" data-aos-delay="100">Speed</h2>
				<p data-aos="fade-in" data-aos-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up" data-aos-delay="100"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="panel featured--secure">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in" data-aos-delay="100">Secure</h2>
				<p data-aos="fade-in" data-aos-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up" data-aos-delay="100"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
</section>

<div>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
</div>

<div>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
</div>

<?php get_footer(); ?>
