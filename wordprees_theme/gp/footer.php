		<footer>
			<div class="contacts">
				<div class="contacts__bg"></div>
				<div class="contacts__container">
					<div class="contacts__content text-left">
						<div class="h2 page__title text-center"><?php $term = get_term_by( 'slug', 'contacts', 'taxonomy_gp_contacts' ); echo $term->name; ?></div>

						<?php $args = array(
							'post_type' => 'gp_contacts',
							'tax_query' => array(
								array(
									'taxonomy' => 'taxonomy_gp_contacts',
									'field'    => 'slug',
									'terms'    => 'contacts'
								),
							),
						);
						$the_query = new WP_Query( $args ); ?>

						<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="contacts__item"><span class="contacts__img">
							<i class="icon <?php echo get_post_meta($post->ID, 'id_0', true); ?>"></i></span><span class="contacts__text"><?php the_content(); ?></span></div>

						<?php endwhile; wp_reset_postdata(); endif; ?>

					</div>
				</div>
			</div>
			<div class="wrap-footer">
				<div class="footer-cont">
					<div class="container">
						<div class="row">
							<div class="footer-social col-sm-4">
								<div class="social">

									<?php $args = array(
										'post_type' => 'gp_contacts',
										'tax_query' => array(
											array(
												'taxonomy' => 'taxonomy_gp_contacts',
												'field'    => 'slug',
												'terms'    => 'social',
											),
										),
									);
									$the_query = new WP_Query( $args ); ?>

									<?php if ( $the_query->have_posts() ) : ?>
									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<div class="social__item">
										<a href="<?php the_content(); ?>" title="<?php the_title(); ?>" target="_blank">
											<i class="icon <?php echo get_post_meta($post->ID, 'id_0', true); ?>"></i>
										</a>
									</div>

									<?php endwhile; wp_reset_postdata(); endif; ?>

									<div class="share">
										<div class="share__btn">Поделиться<span class="share__icon">
												<i class="icon-social-share"></i></span></div>
										<div class="share__drop">
											<div class="share42init" data-path="<?php echo esc_url( get_template_directory_uri() ); ?>/img/"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="footer-metrika col-sm-4"><a href="https://metrika.yandex.ru/stat/?id=35426540&amp;amp;from=informer" target="_blank" rel="nofollow"><img src="//informer.yandex.ru/informer/35426540/3_0_FFC520FF_FFA500FF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:35426540,lang:'ru'});return false}catch(e){}"></a>
								<noscript>
									<div><img src="https://mc.yandex.ru/watch/35426540" style="position:absolute; left:-9999px;" alt=""></div>
								</noscript>
							</div>
							<div class="footer-copyright col-sm-4">
								<div class="copyright">
									<div class="h6 mb_0">Auto Group &copy; 2015–<?php echo date('Y'); ?></div>
									<div class="h6 text_light">All Rights Reserved.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js" async></script>

		<!-- RedConnect -->
		<script id="rhlpscrtg" charset="utf-8" async="async" src="https://web.redhelper.ru/service/main.js?c=www930920ru"></script>
		<div style="display: none"><a class="rc-copyright" href="http://redconnect.ru">Сервис обратного звонка RedConnect</a></div>
		<!--/RedConnect -->

		<?php wp_footer(); ?>

	</body>
</html>