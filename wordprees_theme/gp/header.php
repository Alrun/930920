<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/main.css">

		<style>
			.header__container {background-image: url(<?php header_image(); ?>);}
		</style>

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

	</head>

	<body class="page" data-spy="scroll" data-target=".navbar">

		<header class="header" id="ss-header">
			<nav class="navbar navbar-inverse">
				<div class="container">
					<div class="row">
						<div class="container-fluid">
							<div class="navbar-header">
								<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
								<button class="navbar-brand" type="button" data-toggle="modal" data-target="#aboutModal"><?php $term = get_term_by( 'slug', 'about', 'taxonomy_gp_header' ); echo $term->name; ?></button>
							</div>
							<div class="collapse navbar-collapse" id="navbar-collapse">

								<?php
									wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'container'      => false,
										'items_wrap'     => '<ul class="nav navbar-nav navbar-right">
																					<li class="menu-item hidden-xs">
																						<a href="#ss-header">
																							<i class="icon icon-home"></i>
																						</a>
																					</li>%3$s</ul>'
									) );
								?>

							</div>
						</div>
					</div>
				</div>
			</nav>

			<div class="header__container">
				<div class="header__wrap">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-md-4">
								<div class="pennant"></div>
								<div class="header__content">
									<div class="title">

										<?php $args = array(
											'post_type' => 'gp_header',
											'tax_query' => array(
												array(
													'taxonomy' => 'taxonomy_gp_header',
													'field'    => 'slug',
													'terms'    => 'title',
													),
												),
											);
											$the_query = new WP_Query( $args ); ?>

										<?php if ( $the_query->have_posts() ) : ?>
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

										<h1 class="title__text text-uppercase"><?php the_content(); ?></h1>

										<?php endwhile; endif; wp_reset_postdata(); ?>

									</div>
									<div class="phone">
										<div class="row">
											<div class="col-sm-6">
												<div class="phone__item"><?php $term = get_term_by( 'slug', 'phone_one', 'taxonomy_gp_header' ); echo $term->description; ?></div>
											</div>
											<div class="col-sm-6">
												<div class="phone__item phone__item_right"><?php $term = get_term_by( 'slug', 'phone_two', 'taxonomy_gp_header' ); echo $term->description; ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>