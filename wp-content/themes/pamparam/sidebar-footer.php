                <div id="footerbar" class="clearfix" role="complementary">
				
					<?php if ( is_active_sidebar( 'footer_bar' ) ) : ?>

						<?php dynamic_sidebar( 'footer_bar' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="help">
						
							<p>Please activate some Widgets.</p>
						
						</div>

					<?php endif; ?>

				</div>
