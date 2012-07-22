            <div class="push"></div>
        </div> <!-- end #container -->
        <footer role="contentinfo">
            <div id="bottom-line"></div>

            <div id="inner-footer" class="wrap clearfix">

                <a href="http://nodejs.org/" id="sun"></a>

                <?php get_sidebar('footer'); // footerbar ?>

                <div id="copyright">
                    <div id="by">Copyright <?php echo date('Y'); ?> by ButuzGOL</div>
                    <div id="reserved">All Rights Reserved.</div>
                    <section id="social-mini" class="clearfix">
                        <a id="github-mini" href="https://github.com/ButuzGOL"></a>
                        <a id="instagram-mini" href="http://www.pinstagram.co/butuzgol"></a>
                        <a id="linkedin-mini" href="http://www.linkedin.com/in/ButuzGOL"></a>
                        <a id="facebook-mini" href="http://www.facebook.com/profile.php?id=1451332451"></a>
                        <a id="twitter-mini" href="https://twitter.com/ButuzGOL"></a>
                    </section>
                    <a id="to_up" href></a>
                </div>

                <div id="ballons_vertical"></div>
                <div id="ballons_horizontal"></div>
            </div> <!-- end #inner-footer -->

            <div id="waves"></div>
        </footer> <!-- end footer -->
		
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.easing.1.3.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/raphael-min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.bxSlider.min.js"></script>
        <!-- scripts are now optimized via Modernizr.load -->	
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if lt IE 9 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
        
		<?php wp_footer(); // js scripts are inserted using this function ?>
        
	</body>

</html>
