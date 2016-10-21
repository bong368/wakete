@extends('layouts.canvas')

@section('title') Música - WAKETE @endsection

@section('content')
	<section id="content">
		<div class="content-wrap">
			<div class="container">
				<div class="col-xs-12">
					<div class="heading-block">
						<h2>Música </h2>
						<span>Disfruta de nuestra música donde y cuando quieras</span>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="container clearfix">
						<div class="col-xs-12">
							<div id="player" class="col-xs-12"></div>
						</div>
					</div>
					<div class="container clearfix">
			
						<!-- Portfolio Filter
						============================================= -->
						<ul class="portfolio-filter clearfix" data-container="#portfolio">

							<li class="activeFilter"><a href="#" data-filter="*">Mostrar todos</a></li>
							<?php foreach ($categories as $key => $category): ?>
								<li><a href="#" data-filter=".<?php echo $key ?>"><?php echo $category ?></a></li>
							<?php endforeach ?>

						</ul>

						<div class="clear"></div>

						<!-- Portfolio Items
						============================================= -->
						<div id="portfolio" class="portfolio grid-container clearfix">
							<?php foreach ($songs as $key => $song): ?>
								<?php if (isset($song['track_genres'])): ?>
									<?php 
										$cats = '';
										$tags = array(); 
										foreach ($song['track_genres'] as $key => $cat){
											$cats .= " ".strtolower(str_replace(' ', '_', $cat['genre_title'])); 
											$tags[] = $cat;
										} 
									?>
									<article class="portfolio-item pf-graphics pf-media <?php echo $cats ?>">
										<div class="portfolio-image">
											<a href="#" class="play-single-song center-icon tracking-btn" data-name="<?php echo str_replace(' ', '-', $song['track_title']) ?>" data-action="music" data-id="<?php echo base64_encode($song['_id']) ?>">
												<img src="<?php echo $song['track_image_file'] ?>" alt="<?php echo $song['track_title'] ?>">
											</a>
											<div class="portfolio-overlay">
												<a href="#" class="play-single-song center-icon tracking-btn" data-name="<?php echo str_replace(' ', '-', $song['track_title']) ?>" data-action="music" data-id="<?php echo base64_encode($song['_id']) ?>" ><i class="icon-line-play i-xlarge"></i></a>
											</div>
										</div>
										<div class="portfolio-desc">
											<h3>
												<a href="#" class="play-single-song tracking-btn" data-name="<?php echo str_replace(' ', '-', $song['track_title']) ?>" data-action="music" data-id="<?php echo base64_encode($song['_id']) ?>">
													<?php echo $song['track_title'] ?>	
												</a>
											</h3>
											
										</div>
									</article>
								<?php endif ?>
							<?php endforeach ?>
						</div>

					</div>
				</div>
			</div>
		</div>
		@include('frontend.popup-login')
	</section>
@endsection
	
@section('scripts')
	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('canvas/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('canvas/js/plugins.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ asset('canvas/js/functions.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.play-single-song').click(function(event) {
				event.preventDefault();
				var name_song = $(this).attr('data-name');

				var url = "<?php echo url('/catalog/music/'); ?>/" + name_song;

				$.get( url, { name_track: name_song} ).done(function( data ) {
    				$('#player').empty().append(data);
    				$('#player object').trigger('click');
  				});
			});	
		});
	</script>
@endsection