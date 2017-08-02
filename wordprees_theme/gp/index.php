<?php get_header(); ?>

		<main>
			<section class="slider">
				<div class="container">
					<div class="row">
						<div class="carousel slide" id="carousel-promo" data-ride="carousel" data-interval="8000">
							<ol class="carousel-indicators"></ol>
							<div class="carousel-inner" role="listbox">

								<?php $args = array(
									'post_type' => 'gp_slider_promo',
									'tax_query' => array(
										array(
											'taxonomy' => 'taxonomy_gp_slider_promo',
											'field'    => 'slug',
											'terms'    => 'slide_full',
										),
									),
								);
								$the_query = new WP_Query( $args ); ?>

								<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="item">
									<div class="col-sm-6 col-sm-offset-3">
										<div class="slide__back text-center">
											<div class="slide__img-wrap img-fade"><?php the_post_thumbnail() ?></div>
										</div>
									</div>
									<div class="col-sm-3 static">
										<div class="slide__front">
											<div class="slide__content">
												<div class="slide__right">
													<div class="container">
														<div class="row">
															<h2 class="h1 slide-full__title"><?php the_title(); ?></h2>
														</div>
														<div class="row">
															<div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2">
																<div class="slide-full__countdown" <?php echo get_post_meta($post->ID, 'id_4', true); ?>>
																	<div class="coutdown__title">До конца акции осталось</div>
																	<div class="timeTo timeTo-white" id="countdown"></div>
																</div>
															</div>
															<div class="col-sm-5 col-md-4 slide-full__price-wrap">
																<div class="slide-full__price text-nowrap"><?php echo get_post_meta($post->ID, 'id_1', true); ?> <span class="rub rub_red">a</span>/час</div>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2">
																<div class="slide-full__text">
																	<p class="h2 text-info text-nowrap mt_0"><?php the_content(); ?></p>
																</div>
															</div>
															<div class="col-sm-5 col-md-4">
																<div class="slide-full__btn-wrap"><button class="btn btn-warning btn-lg" type="button" data-toggle="modal" data-target="#detaileModal">Подробнее</button></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<?php endwhile; wp_reset_postdata(); endif; ?>

								<?php $args = array(
									'post_type' => 'gp_slider_promo',
									'tax_query' => array(
										array(
											'taxonomy' => 'taxonomy_gp_slider_promo',
											'field'    => 'slug',
											'terms'    => 'slide_half',
										),
									),
								);
								$the_query = new WP_Query( $args ); ?>

								<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="item">
									<div class="col-sm-6">
										<div class="slide__left">
											<div class="slide__img-wrap"><?php the_post_thumbnail() ?></div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="slide__right">
											<div class="slide__content">
												<h3 class="slide__title"><?php the_title(); ?></h3>
												<div class="slide__desc">
													<?php the_content(); ?>
												</div>
												<table>
													<tbody>
														<tr>
															<td class="table_va-t">
																<div class="slide__price">Стоимость услуг:</div>
															</td>
															<td>
																<div>
																	<div><?php echo get_post_meta($post->ID, 'id_0', true); ?> <span class="text-danger"><?php echo get_post_meta($post->ID, 'id_1', true); ?></span> <span class="rub">a</span>/час<span class="text-success">*</span></div>
																	<div <?php echo get_post_meta($post->ID, 'id_4', true); ?>><?php echo get_post_meta($post->ID, 'id_5', true); ?> <span class="text-danger"><?php echo get_post_meta($post->ID, 'id_2', true); ?></span><span class="rub">a</span>/км</div>
																	<div class="small text-success"><?php echo get_post_meta($post->ID, 'id_3', true); ?></div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<?php endwhile; wp_reset_postdata(); endif; ?>

							</div><a class="left carousel-control" href="#carousel-promo" role="button" data-slide="prev"><span class="icon-arrow_left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-promo" role="button" data-slide="next"><span class="icon-arrow_right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
						</div>
					</div>
				</div>
			</section>
			<div class="anchor" id="ss-services"></div>
			<section class="services">
				<div class="container">
					<div class="row text-center">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="bg-map"></div>
						</div>
						<div class="h2 page__title page__title_white"><?php $term = get_term_by( 'slug', 'services', 'taxonomy_gp_services' ); echo $term->name; ?></div>
						<div class="container">
							<div class="row">

								<?php $args = array(
									'post_type' => 'gp_services',
									'tax_query' => array(
										array(
											'taxonomy' => 'taxonomy_gp_services',
											'field'    => 'slug',
											'terms'    => 'services',
										),
									),
								);
								$the_query = new WP_Query( $args ); ?>

								<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="services__item col-md-4 col-sm-4">
									<div class="pop">
										<div class="pop__data" data-toggle="popover" data-trigger="hover" data-delay="300" data-placement="top" title="<?php echo get_post_meta($post->ID, 'id_1', true); ?>" data-content="<?php the_content(); ?>">
											<div class="pop__icon icon <?php echo get_post_meta($post->ID, 'id_0', true); ?>"></div>
											<h4 class="pop__title"><?php the_title(); ?></h4>
										</div>
									</div>
								</div>

								<?php endwhile; wp_reset_postdata(); endif; ?>

							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="anchor" id="ss-prices"></div>
			<section class="prices">
				<div class="container">
					<div class="row">
						<h6 class="h2 page__title text-center"><?php $term = get_term_by( 'slug', 'prices', 'taxonomy_gp_table' ); echo $term->name; ?></h6>
						<div class="container">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>

										<th class="table__service"><?php $term = get_term_by( 'slug', 'prices_head_work', 'taxonomy_gp_table' ); echo $term->name; ?></th>

										<th class="table__price"><?php $term = get_term_by( 'slug', 'prices_head_cost', 'taxonomy_gp_table' ); echo $term->name; ?></th>

										<th class="table__time">
											<div class="hidden-xs"><?php $term = get_term_by( 'slug', 'prices_head_time', 'taxonomy_gp_table' ); echo $term->name; ?></div>
											<div class="visible-xs-block"><?php $term = get_term_by( 'slug', 'prices_head_time', 'taxonomy_gp_table' ); echo $term->description; ?></div>
										</th>

									</tr>
								</thead>
								<tbody>

									<?php $args = array(
										'post_type' => 'gp_table',
										'tax_query' => array(
											array(
												'taxonomy' => 'taxonomy_gp_table',
												'field'    => 'slug',
												'terms'    => 'prices',
											),
										),
									);
									$the_query = new WP_Query( $args ); ?>

									<?php if ( $the_query->have_posts() ) : ?>
									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<tr>
										<td class="text-left"><?php the_title(); ?></td>
										<td class="text-right"><?php echo get_post_meta($post->ID, 'id_0', true); ?><span class="rub">a</span><?php echo get_post_meta($post->ID, 'id_1', true); ?><span class="text-success"><?php echo get_post_meta($post->ID, 'id_2', true); ?></span></td>
										<td class="text-center"><?php echo get_post_meta($post->ID, 'id_3', true); ?></td>
									</tr>

									<?php endwhile; wp_reset_postdata(); endif; ?>

								</tbody>
							</table>

							<?php $args = array(
								'post_type' => 'gp_table',
								'tax_query' => array(
									array(
										'taxonomy' => 'taxonomy_gp_table',
										'field'    => 'slug',
										'terms'    => 'prices_foot',
									),
								),
							);
							$the_query = new WP_Query( $args ); ?>

							<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<div class="h6 text-sm-right"><span class="text-success"><?php echo get_post_meta($post->ID, 'id_0', true); ?></span><?php echo get_post_meta($post->ID, 'id_1', true); ?></div>

							<?php endwhile; wp_reset_postdata(); endif; ?>

						</div>
					</div>
				</div>
			</section>
			<div class="anchor" id="ss-advantages"></div>
			<section class="advantages">
				<div class="container">
					<div class="row">
						<h6 class="h2 page__title text-center"><?php $term = get_term_by( 'slug', 'advantages', 'taxonomy_gp_advantages' ); echo $term->name; ?></h6>
						<div class="col-md-12">
							<div class="row">

								<?php $args = array(
									'post_type' => 'gp_advantages',
									'tax_query' => array(
										array(
											'taxonomy' => 'taxonomy_gp_advantages',
											'field'    => 'slug',
											'terms'    => 'advantages',
										),
									),
								);
								$the_query = new WP_Query( $args ); ?>

								<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="col-md-6">
									<div class="advantages__icon">
										<i class="icon <?php echo get_post_meta($post->ID, 'id_0', true); ?>"></i>
									</div>
									<div class="advantages__desc">
										<div class="advantages__title h4"><?php the_title(); ?></div>
										<p class="advantages__text"><?php the_content(); ?></p>
									</div>
								</div>

								<?php endwhile; wp_reset_postdata(); endif; ?>

							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="anchor" id="ss-reviews"></div>
			<section class="reviews">
				<div class="container">
					<div class="row">
						<h6 class="h2 page__title text-center"><?php $term = get_term_by( 'slug', 'reviews', 'taxonomy_gp_reviews' ); echo $term->name; ?></h6>
						<div class="carousel slide" id="carousel-reviews" data-ride="carousel" data-interval="false">

							<ol class="carousel-indicators"></ol>

							<div class="carousel-inner" role="listbox">

								<?php $args = array(
									'post_type' => 'gp_reviews',
									'tax_query' => array(
										array(
											'taxonomy' => 'taxonomy_gp_reviews',
											'field'    => 'slug',
											'terms'    => 'reviews',
										),
									),
								);
								$the_query = new WP_Query( $args ); ?>

								<?php if ( $the_query->have_posts() ) : ?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="item">
									<div class="col-sm-3 col-sm-offset-1">
										<div class="slide__left">
											<div class="slide__img-wrap review__img"><?php the_post_thumbnail() ?></div>
										</div>
									</div>
									<div class="col-sm-7">
										<div class="slide__right">
											<div class="slide__content">
												<div class="slide__title reviews__name h4"><?php the_title(); ?></div>
												<div class="reviews__job h5"><?php echo get_post_meta($post->ID, 'id_0', true); ?></div>
												<p class="reviews__text"><?php the_content(); ?></p>
											</div>
										</div>
									</div>
								</div>

								<?php endwhile; wp_reset_postdata(); endif; ?>

								<div class="item">
									<div class="col-sm-3 col-sm-offset-1">
										<div class="slide__left">
											<div class="slide__img-wrap review__img"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/review-add.jpg" alt=""></div>
										</div>
									</div>
									<div class="col-sm-7">
										<div class="slide__right">
											<div class="slide__content">
												<div class="slide__title reviews__name h3">Оставьте отзыв о нашей работе</div>
												<div class="review__btn-wrap">
												<button class="reviews__btn btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#reviewModal">Добавить отзыв</button>
												</div>
												<div class="h3 reviews-add hidden">
													<div class="reviews-add__alert h3">Спасибо за ваш отзыв!</div>
													<div class="reviews-add__text h4">Ваши данные успешно отправлены.</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div><a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev"><span class="icon-arrow_left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next"><span class="icon-arrow_right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
						</div>
					</div>
				</div>
			</section>
			<div class="anchor" id="ss-contacts"></div>
		</main>
		<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

						<?php $args = array(
							'post_type' => 'gp_header',
							'tax_query' => array(
								array(
									'taxonomy' => 'taxonomy_gp_header',
									'field'    => 'slug',
									'terms'    => 'about',
								),
							),
						);
						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<h4 class="modal-title" id="gridSystemModalLabel"><?php the_title(); ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">

							<div class="col-md-12"><?php the_content(); ?></div>

						<?php endwhile; wp_reset_postdata(); endif; ?>

						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-info" type="button" data-dismiss="modal">Закрыть</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="detaileModal" tabindex="-1" role="dialog" aria-labelledby="SystemModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

						<?php $args = array(
							'post_type' => 'gp_slider_promo',
							'tax_query' => array(
								array(
									'taxonomy' => 'taxonomy_gp_slider_promo',
									'field'    => 'slug',
									'terms'    => 'slide_full_modal',
								),
							),
						);
						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<h4 class="modal-title" id="SystemModalLabel"><?php the_title(); ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12"><?php the_content(); ?></div>

						<?php endwhile; wp_reset_postdata(); endif; ?>
							
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-info" type="button" data-dismiss="modal">Закрыть</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal">×</button>
						<h3 class="modal-title" id="reviewModalLabel">Оставить отзыв</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="form-group has-feedback">
								<label class="control-label col-xs-3" for="InputName">Ф.И.О.<span class="text-warning">*</span></label>
								<div class="col-xs-9 col-sm-8">
									<div class="input-group"><span class="input-group-addon"><i class="icon icon-person"></i></span>
										<input class="form-control" id="InputName" type="text" required="required" name="InputName" placeholder="Фамилия И.О.">
									</div><span class="form-control-feedback"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-3" for="InputCompany">Компания</label>
								<div class="col-xs-9 col-sm-8">
									<input class="form-control" id="InputCompany" type="text" name="InputCompany" placeholder="Название вашей компании">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-3" for="InputJob">Должность</label>
								<div class="col-xs-9 col-sm-8">
									<input class="form-control" id="InputJob" type="text" name="InputJob" placeholder="Занимая должность">
								</div>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label col-xs-3" for="InputPhone">Телефон<span class="text-warning">*</span></label>
								<div class="col-xs-9 col-sm-8">
									<div class="input-group"><span class="input-group-addon">+7</span>
										<input class="form-control" id="InputPhone" type="text" required="required" pattern="^[-+0-9()s]+$" name="InputPhone" placeholder="Ваш номер телефона">
									</div><span class="form-control-feedback"></span>
								</div>
							</div>
							<div class="form-group has-feedback">
								<label class="control-label col-xs-3" for="InputEmail">E-mail<span class="text-warning">*</span></label>
								<div class="col-xs-9 col-sm-8">
									<div class="input-group"><span class="input-group-addon"><i class="icon icon-mail"></i></span>
										<input class="form-control" id="InputEmail" type="email" required="required" name="InputEmail" placeholder="Ваш e-mail">
									</div><span class="form-control-feedback icon"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-3" for="InputReview">Ваш отзыв<span class="text-warning">*</span></label>
								<div class="col-xs-9 col-sm-8">
									<textarea class="form-control" id="InputReview" rows="3" required="required" name="InputText" placeholder="Введите текст"></textarea>
								</div>
							</div>
						</form>
						<div class="text-right">
							<p class="text-warning">* - обязательные поля</p>
						</div>
					</div>
					<div class="modal-footer">
						<div class="btn-center">
							<button class="btn btn-default" type="button" data-dismiss="modal">Отмена</button>
							<button class="btn btn-primary" id="send" type="button">Отправить</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php get_footer();	?>