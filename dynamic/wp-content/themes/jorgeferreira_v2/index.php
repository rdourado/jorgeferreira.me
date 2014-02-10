<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?>>
	<head>
		<meta charset="UTF-8">
		<meta content="IE=edge" http-equiv="X-UA-Compatible">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<title><?php wp_title() ?></title>
		<link href="<?php bloginfo( 'template_url' ) ?>/css/styles.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
		<?php wp_head() ?>
	</head>
	<body>
		<div class="collapse" id="about">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-5 col-sm-push-3 col-md-4 col-md-push-3 col-lg-4 col-lg-push-2">
						<p class="about"><?php the_field( 'about', 'options' ) ?></p>
					</div>
					<div class="col-xs-8 col-xs-push-4 col-sm-4 col-sm-push-3 col-md-4 col-md-push-4 col-lg-3 col-lg-push-5">
						<p class="contact">
							<?php the_field( 'phone', 'options' ) ?>
							<br>
							<a href="mailto:<?php the_field( 'email', 'options' ) ?>"><?php the_field( 'email', 'options' ) ?></a>
							<br>
							<a href="<?php the_field( 'linkedin', 'options' ) ?>" target="_blank">Linkedin</a>
							<br>
							<a href="<?php the_field( 'behance', 'options' ) ?>" target="_blank">Behance</a>
						</p>
					</div>
					<div class="col-xs-4 col-xs-pull-8 col-sm-3 col-sm-pull-9 col-md-3 col-md-pull-8 col-lg-2 col-lg-pull-7"><?php 
					$attachment_id = get_field( 'avatar', 'options' );
					$size = "jf_avatar";
					echo wp_get_attachment_image( $attachment_id, $size, false, array( 'class' => 'img-responsive' ) );
					?></div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button class="navbar-toggle" data-target="#menu" data-toggle="collapse" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ) ?></a>
					</div>
					<?php 
					$menu = wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'menu',
						'menu_class'      => 'nav navbar-nav navbar-right',
						'echo'            => false,
						'fallback_cb'     => false,
						'depth'           => 2
					) );
					$menu = str_replace( 'sub-menu', 'dropdown-menu', $menu );
					$menu = str_replace( '<a href="#">', '<a data-target="#about" data-toggle="collapse" href="#">', $menu );
					$menu = preg_replace( '/\<a href\=\"\/\"\>(.*?)\<\/a\>/', '<a class="dropdown-toggle" data-toggle="dropdown" href="#">$1<b class="caret"></b></a>', $menu );
					echo $menu;
					?>
				</nav>
			</div>
			<hr>
<?php 		if ( is_single() ) 
			while( have_posts() ) : the_post(); ?>
			<article class="h-entry row">
				<header class="job-header col-xs-12 col-sm-6 col-sm-push-6 col-md-5 col-md-push-7 col-lg-5 col-lg-push-7">
					<h1 class="p-name"><?php the_title() ?></h1>
					<p class="p-category"><?php the_category( ' / ' ) ?></p>
				</header>
				<div class="p-summary col-xs-12 col-sm-6 col-sm-pull-6 col-md-7 col-md-pull-5 col-lg-6 col-lg-pull-5">
					<?php the_content() ?>
				</div>
				<div class="e-content col-xs-12">
					<p><?php 				
					$args = array( 
						'post_type' => 'attachment', 
						'numberposts' => -1, 
						'post_status' => null, 
						'post_parent' => $post->ID,
						'exclude' => get_post_thumbnail_id()
					);
					$attachments = get_posts( $args );
					$attr = array( 'class' => 'img-responsive' );
					if ( $attachments) 
						foreach ( $attachments as $attachment ) 
							echo wp_get_attachment_image( $attachment->ID, 'jf_job', false, $attr );
					wp_reset_query();
					?></p>
				</div>
			</article>
			<hr>
<?php 		endwhile; ?>
			<div class="row">
<?php 			if ( is_single() ) : ?>
				<div class="col-xs-12">
					<h2 class="heading">Trabalhos</h2>
				</div>
<?php 			endif; ?>
				<div class="col-xs-12">
					<ul class="jobs">
<?php 					query_posts( (is_single() ? "" : "{$query_string}&") . 'posts_per_page=-1' );
						while( have_posts() ) : the_post(); ?>
						<li class="job">
							<a data-content="<?php echo strip_tags( str_replace( '<br>', ' / ', wp_list_categories( 'style=none&echo=0' ) ) ); ?>" data-toggle="popover" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ) ?></a>
						</li>
<?php 					endwhile; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php wp_footer() ?>
	</body>
</html>