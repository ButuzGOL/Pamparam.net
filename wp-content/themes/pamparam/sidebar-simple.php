				<div id="sidebar1" class="sidebar left col220 clearfix" role="complementary">
				
                    <?php get_search_form(); ?>
                    
					<?php if ( is_active_sidebar( 'simple_sidebar' ) ) : ?>

						<?php dynamic_sidebar( 'simple_sidebar' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="help">
						
							<p>Please activate some Widgets.</p>
						
						</div>

					<?php endif; ?>

				</div>