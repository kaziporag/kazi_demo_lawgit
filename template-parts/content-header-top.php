<?php
$lawgit_socials = array(
	'social_facebook' => array(
		'icon' => 'fa fa-facebook',
		'url'  => Law_Git::$options['social_facebook'],
		),
	'social_twitter' => array(
		'icon' => 'fa fa-twitter',
		'url'  => Law_Git::$options['social_twitter'],
		),
	'social_linkedin' => array(
		'icon' => 'fa fa-linkedin',
		'url'  => Law_Git::$options['social_linkedin'],
		),
	'social_youtube' => array(
		'icon' => 'fa fa-youtube',
		'url'  => Law_Git::$options['social_youtube'],
		),
	'social_pinterest' => array(
		'icon' => 'fa fa-pinterest',
		'url'  => Law_Git::$options['social_pinterest'],
		),
	'social_instagram' => array(
		'icon' => 'fa fa-instagram',
		'url'  => Law_Git::$options['social_instagram'],
		),
	);
$lawgit_socials = array_filter( $lawgit_socials, array( 'LawGit_Helper' , 'filter_social' ) );
?>
<!--Header Top-->
<div class="header-top">
	<div class="default-container">
		<div class="clearfix">
			<!--Top Left-->
			<div class="top-left">
				<ul class="header-info-list">
				<?php if ( !empty( Law_Git::$options['top_email'] ) ): ?>
					<li><i class="icon fa fa-envelope"></i><a href="mailto:<?php echo esc_attr( Law_Git::$options['top_email'] );?>"><?php echo esc_html( Law_Git::$options['top_email'] );?></a></li>
				<?php endif; ?>
				<?php if ( !empty( Law_Git::$options['top_address'] ) ): ?>
					<li><i class="icon fa fa-map-marker"></i><?php echo esc_html( Law_Git::$options['top_address'] );?></li>
				<?php endif; ?>
				<?php if ( !empty( Law_Git::$options['top_phone'] ) ): ?>
					<li><i class="icon fa fa-headphones"></i> <a href="tel:<?php echo esc_attr( Law_Git::$options['top_phone'] );?>"><?php echo esc_html( Law_Git::$options['top_phone'] );?></a></li>
				<?php endif; ?>
				</ul>
			</div>
			<!--Top Right-->
			<?php if ( !empty( $lawgit_socials ) ): ?>
			<div class="top-right">
				<!--Social Box-->
				<ul class="social-box">
					<?php foreach ( $lawgit_socials as $lawgit_social ): ?>
						<li><a href="<?php echo esc_url( $lawgit_social['url'] );?>" title=""><i class="<?php echo esc_attr( $lawgit_social['icon'] );?>"></i></a></li>
            		<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>