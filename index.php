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
				</div>
			</div>
		</div>
	</div>
</header>

<section class="grid-noGutter-equalHeight_sm-1">
	<div class="col">
		<div class="panel featured--simple">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in">Simple</h2>
				<p data-aos="fade-in">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="panel featured--speed">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in">Speed</h2>
				<p data-aos="fade-in">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="panel featured--secure">
			<div class="panel-inner">
				<h2 class="panel-title" data-aos="fade-in">Secure</h2>
				<p data-aos="fade-in">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed quam vitae mauris varius ultricies hendrerit id purus. Praesent luctus cursus augue at pretium. Nam metus.</p>
				<p data-aos="fade-up"><a href="#" class="button">Read more</a></p>
			</div>
		</div>
	</div>
</section>

<h1>H1 - テスト見出し</h1>
<h2>H2 - テスト見出し</h2>
<h3>H3 - テスト見出し</h3>
<h4>H4 - テスト見出し</h4>
<h5>H5 - テスト見出し</h5>
<h6>H6 - テスト見出し</h6>

<p>何は今日もうその諷刺国に対して事のためをしたまし。まあ今日に料簡者はもういわゆる存在たんくらいから関してくれうには意見なるなけれたて、まだには考えなけれたないう。自分よりありあっ方も時々当時をせっかくないたませ。</p>
<p>しばしば槙君を運動離れ離れ始終詐欺に解りまい申その釣これかぼんやりにというご内約なですないでしょて、その今は何か当人縁を亡びるから、嘉納さんのものに断りの私でちょうどお発見と出来ていつやり方を今お話しがなっようにまあ同束縛の欠けなかっございば、かくいったい教育で受けですていありのを行きですない。またまたご画がかれつもりは少し同等と具しますから、その午をもできますばとして慨へするのでくるだです。そのため態度のためその主義はそれ中にいうなかと張さんが云うですた、春の事実でしょというご発展でますでて、徳義の上に人を十一月ほどの害に時間なるからいるて、そうの今日へ思うからそんな中がやはりやりありたと過ぎたものですて、ないうでていっそご師範勧めな事だですたら。たとえば主義か変か接近でしまして、当時ごろ上面から生れているでしょ時とご運動の半分が云ったませ。</p>
<p>今をはどうも悟っがありたございべきですで、かつてはたしてするて増減は少し好いましのあり。</p>
<p>またご料理が云ってはかねるなら事ますて、人情へも、とうとう誰か至るが着るれありですあっれるですありと出るが、国は出来てみないた。まあもうはいくら逼といういたて、私をは生涯いっぱいまでこちらのご説明もないすれいうたい。あなたもひとまず立証の方にお拡張はなればみろんないなでて、一五の金力にとてもやるませという実在たて、あるいはその火事の個人でもっがっけれども、ここかがそこの自身を経験を立ち竦んておきなのたたと矛盾合っと意味換えるいないない。manにまた大森さんにもっとも少々落ちでものたなかっう。</p>
<p>張さんはもともと理科と亡びるで行きあるものたたあり。</p>

<script src="<?php echo get_template_directory_uri(); ?>/src/baseliner-latest.min.js"></script>
<script>
	window.onload = function() {
		baseliner = new Baseliner({ gridHeight: 16, gridColor: "red" });
		baseliner.toggle();
	}
</script>
<?php get_footer(); ?>
