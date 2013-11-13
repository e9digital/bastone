<?php $settings = wptouch_get_settings(); ?>
<div id="touchboard-left">
	<?php if ( wptouch_should_show_license_nag() ) { ?>
		<div class="alert">
	  		<p><?php echo sprintf( __( 'This copy of %s is currently unlicensed!', 'wptouch-pro' ), 'WPtouch Pro' ); ?></p>
	  		<?php if ( wptouch_should_show_activation_nag() ) { ?>
	  			<a href="<?php echo admin_url( 'admin.php?page=wptouch-admin-license' ); ?>" class="btn btn-warning"><?php _e( 'Get started with activation &raquo;', 'wptouch-pro' ); ?></a>
	  		<?php } ?>
		</div>
	<?php } ?>

	<div id="touchboard-carousel" class="slide">
		<!-- Carousel items -->
		<div class="carousel-inner">
			<div class="active item">
				<img src="<?php echo WPTOUCH_ADMIN_URL; ?>/images/slider/loading.jpg" alt="<?php _e( 'Loading remote images', 'wptouch-pro' ); ?>">
			</div>
		</div>
		<ul class="dots"></ul>
		<!-- Carousel nav -->
		<a class="carousel-control left" href="#touchboard-carousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#touchboard-carousel" data-slide="next">&rsaquo;</a>
	</div><!-- touchboard-carousel -->

	<ul id="help-boxes">
		<li class="support" data-url="//www.bravenewcode.com/support/">
			<p><?php _e( 'Support Dashboard', 'wptouch-pro' ); ?></p>
			<span><?php _e( 'Access downloads, file tickets and get direct support for WPtouch Pro from BraveNewCode', 'wptouch-pro' ); ?> &raquo;</span>
		</li>
		<li class="docs" data-url="//www.bravenewcode.com/support/knowledgebase/">
			<p><?php _e( 'Knowledgebase', 'wptouch-pro' ); ?></p>
			<span><?php _e( 'Read helpful tutorials and product articles to get the most out of WPtouch Pro', 'wptouch-pro' ); ?> &raquo;</span>		
		</li>
		<li class="updates" data-toggle="modal" data-target="#modal-updates">
			<p><?php _e( 'Product Updates', 'wptouch-pro' ); ?></p>
			<span><?php _e( 'Check out what\'s new in the WPtouch Pro update change log', 'wptouch-pro' ); ?> &raquo;</span>				
		</li>
		<li class="accounts" data-url="//www.bravenewcode.com/support/profile/">
			<p><?php _e( 'Manage Profile', 'wptouch-pro' ); ?></p>
			<span><?php _e( 'Keep your account information with us up to date and manage your support preferences', 'wptouch-pro' ); ?> &raquo;</span>				
		</li>
	</ul>	
	<br class="clearer" />
	
	<div class="modal hide" id="modal-updates" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-header">
			<p><?php echo sprintf( __( '%s Change Log', 'wptouch-pro' ), 'WPtouch Pro' ); ?></p>
		</div>
		<div class="modal-body" id="change-log">
		</div>
		<div class="modal-footer">
			<button class="button" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
	</div>
</div><!-- touchboard-left -->

<div id="touchboard-news">
	<h3><span><?php _e( 'WPtouch News', 'wptouch-pro' ); ?></span></h3>
	<div id="shader">&nbsp;</div>

	<span id="ajax-news"><!-- ajaxed news here --></span>
</div><!-- touchboard-news -->
