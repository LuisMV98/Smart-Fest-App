<?php
/*
Template Name: Speakers Page
*/

get_header();

?>

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.css" rel="stylesheet" />

<?php

$post_id              = get_the_ID();
$is_page_builder_used = et_pb_is_pagebuilder_used($post_id);
$container_tag        = 'product' === get_post_type($post_id) ? 'div' : 'article'; ?>

<div id="main-content">

	<?php if (!$is_page_builder_used) : ?>

		<div class="container-speaker">
			<div id="content-area" class="clearfix">
				<div id="left-area">

				<?php endif; ?>

				<?php while (have_posts()) : the_post(); ?>

					<<?php echo $container_tag; ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php if (!$is_page_builder_used) : ?>

							<?php
							$thumb = '';

							$width = (int) apply_filters('et_pb_index_blog_image_width', 1080);

							$height = (int) apply_filters('et_pb_index_blog_image_height', 675);
							$classtext = 'et_featured_image';
							$titletext = get_the_title();
							$alttext = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
							$thumbnail = get_thumbnail($width, $height, $classtext, $alttext, $titletext, false, 'Blogimage');
							$thumb = $thumbnail["thumb"];

							if ('on' === et_get_option('divi_page_thumbnails', 'false') && '' !== $thumb)
								print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height);
							?>

						<?php endif; ?>

						<div class="entry-content">

							<!-- <div class="container mt-5 mb-5 pt-3">
								<div class="et_pb_column et_pb_column_4_4 et_pb_column_13  et_pb_css_mix_blend_mode_passthrough et-last-child">
									<div class="et_pb_module et_pb_text et_pb_text_13  et_pb_text_align_left et_pb_bg_layout_light">
										<h2 class="subtitle-smart color-morado">Speakers</h2>
									</div>
								</div>
							</div> -->

							<div id="contenido_speakers" class="container contenido_speakers_1">

								<!-- BUSCADOR -->
								<!-- <div class="box-buscador-speakers">
									<input type="text" class="form-control" id="txtBuscar" placeholder="Buscar" />
								</div> -->

								<div id="container">
									<script type="text/javascript">
										jQuery('#txtBuscar').keyup(function(e) {
											let contenido = jQuery(this).val();

											if (contenido == "") {
												CargarSpeakers();
											} else {
												var code = e.key;
												if (code === "Enter") {
													LanzarBusqueda(contenido);
												}
											}
										});

										const API = 'https://networking.barter.es/programapi/speakers.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513&items=150';
										const APIBusqueda = 'https://networking.barter.es/programapi/speakers.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513&items=150&text=';
										const APIDetail = 'https://networking.barter.es/programapi/speaker.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513&idspeaker=';
										const APITracks = 'https://networking.barter.es/programapi/tracks.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513';

										let colorTrack = "";
										let objetoTracks;
										var objetoSpeakers = [];


										const fetchData = (url_api) => {
											return new Promise((resolve, reject) => {

												const xhttp = new XMLHttpRequest();
												xhttp.open('GET', url_api, true);
												xhttp.onreadystatechange = (() => {
													if (xhttp.readyState === 4) {
														(xhttp.status === 200) ?
														resolve(JSON.parse(xhttp.responseText)): reject(new Error('Error ' + url_api))

													}
												})
												xhttp.send();
											});
										}

										fetchData(APITracks)
											.then(data => {
												objetoTracks = data;
												CargarSpeakers();
											})
											.catch(error => {
												console.error(error);
											});

										function LanzarBusqueda(texto) {
											objetoSpeakers = [];

											fetchData(APIBusqueda + texto)
												.then(data => {
													CargarResultados(data);
												})
												.catch(error => {
													console.error(error);
												});
										}

										function CargarSpeakers() {
											objetoSpeakers = [];

											fetchData(API)
												.then(data => {
													CargarResultados(data);
												})
												.catch(error => {
													console.error(error);
												});
										}

										function CargarResultados(data) {
											data.speakers.forEach(function(element) {
												let contenido_item = `<div class="speaker_item">`;
												if (element.urlphoto != "https://networking.barter.es/gestor/upload/360/fake.jpg") {
													contenido_item = contenido_item + `<div class="speaker_item_boxphoto"><img src="${element.urlphoto}" class="img-fluid speaker_item_photo" /></div>`;
												} else {
													contenido_item = contenido_item + `<div class="speaker_item_boxphoto"><img src="https://cincodemayosummit.com/wp-content/uploads/2023/10/avatar.webp" class="img-fluid speaker_item_photo" /></div>`;
												}
												if (element.name != null && element.name != "" && element.surname != null && element.surname != "") {
													contenido_item = contenido_item + `<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(${element.idspeaker});">${element.name}<br/>${element.surname}</h4>`;
												}
												contenido_item = contenido_item + `<div class="speaker_item_contenido">`;
												if (element.jobposition != null && element.jobposition != "") {
													contenido_item = contenido_item + `<p class="speaker_item_company">${element.jobposition}</p>`;
												}
												contenido_item = contenido_item + `</div>`;
												contenido_item = contenido_item + `</div>`;

												objetoSpeakers.push(contenido_item);
												jQuery('#contenido_speakers').append(contenido_item);
											});

											//CargarPaginacion();
										}

										function abrirModal() {
											jQuery('#modalDetalle').modal('show');
										}

										function abrirDetalle(idspeaker) {
											limpiarDetalle();

											jQuery('#contenido_speakers').addClass('d-none');
											jQuery('#contenido_speakers').removeClass('d-block');

											jQuery('#contenido_speakers_detalle').addClass('d-block');
											jQuery('#contenido_speakers_detalle').removeClass('d-none');

											fetchData(APIDetail + idspeaker)
												.then(data => {
													if (data.urlphoto == "https://networking.barter.es/gestor/upload/360/fake.jpg" || data.photo == "https://networking.barter.es/gestor/upload/344/fake.jpg") {
														jQuery('.speaker_detail_foto').append(`<img src="https://cincodemayosummit.com/wp-content/uploads/2023/10/avatar.webp" class="img-responsive" />`);
													} else {
														jQuery('.speaker_detail_foto').append(`<img src="${data.urlphoto}" class="img-responsive" />`);
													}
													jQuery('.speaker_detail_nombre').append(`<span class="color-naranja-suave">${data.name}<br/>${data.surname}</span>`);
													if (data.jobposition != null) {
														jQuery('.speaker_detail_jobposition').append(`<span>${data.jobposition}</span>`);
													}
													jQuery('.speaker_detail_company').append(`<span>${data.company}</span>`);
													jQuery('.speaker_detail_city').append(`<span>${data.city}, ${data.country}</span>`);

													let contenidoSocial = "";
													if (data.linkedin != "" || data.twitter != "") {
														contenidoSocial = contenidoSocial + `<ul class="speaker_item_sociales">`;
														if (data.linkedin != "") {
															contenidoSocial = contenidoSocial + `<li class="et-social-icon et-social-linkedin"><a href="${data.linkedin}" class="icon" target="_blank"><span>Linkedin</span></a></li>`;
														}
														if (data.twitter != "") {
															let urlTwitter = data.twitter;
															urlTwitter = "https://twitter.com/" + urlTwitter.replace('@', '');
															contenidoSocial = contenidoSocial + `<li class="et-social-icon et-social-twitter"><a href="${urlTwitter}" class="icon" target="_blank"><span>Twitter</span></a></li>`;
														}
														contenidoSocial = contenidoSocial + `</ul>`;
													}
													jQuery('.speaker_detail_sociales').append(contenidoSocial);

													let contenidoSessions = "<h4 class='color-naranja-suave mt-0 pt-5 pb-0 fw-semibold' style='border-top: 1px solid #444;'>Participa en</h4>";
													data.sessions.forEach(function(element) {
														let TrackId = element.idtrack;

														let fecha = "";
														let year = "";
														let mes = "";
														let dia = "";
														if (element.date != null) {
															fecha = element.date;
															year = fecha[0] + fecha[1] + fecha[2] + fecha[3];
															mes = fecha[4] + fecha[5];
															dia = fecha[6] + fecha[7];
														}

														objetoTracks.tracks.forEach(function(elemento) {
															if (elemento.idtrack == TrackId) {
																colorTrack = elemento.color;
															}
														});

														//console.log(colorTrack);

														let trackName = "";
														if (element.track != null) {
															trackName = element.track;
														}

														contenidoSessions = contenidoSessions + `<div class="session_item_row"><div class="session_item_contenido unico"><div><h5 class="session_item_title"><span style="text-transform: uppercase;">${element.sessiontype}</span><br>${element.title}</h5><p><i class="bi bi-clock"></i>&nbsp;${dia}/${mes}/${year}&nbsp;&nbsp;|&nbsp;&nbsp;${element.start} - ${element.end}</p><p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;${element.room}</p></div></div></div>`;
													});
													jQuery('.speaker_detail_sessions').append(contenidoSessions);

													if (data.bio != null) {
														jQuery('.speaker_detail_bio_title').append('Biografía');
														jQuery('.speaker_detail_bio').append(`<span>${data.bio}</span>`);
													}
												})
												.catch(error => {
													console.error(error);
												});

										}

										function cerrarDetalle() {
											jQuery('#contenido_speakers_detalle').addClass('d-none');
											jQuery('#contenido_speakers_detalle').removeClass('d-block');

											jQuery('#contenido_speakers').addClass('d-block');
											jQuery('#contenido_speakers').removeClass('d-none');
										}

										function limpiarDetalle() {
											jQuery('.speaker_detail_foto').html('');
											jQuery('.speaker_detail_nombre').html('');
											jQuery('.speaker_detail_jobposition').html('');
											jQuery('.speaker_detail_company').html('');
											jQuery('.speaker_detail_city').html('');
											jQuery('.speaker_detail_sociales').html('');
											jQuery('.speaker_detail_bio').html('');
											jQuery('.speaker_detail_sessions').html('');
											jQuery('.speaker_detail_bio_title').html('');
										}

										function CargarPaginacion() {
											jQuery("#container").html('');

											let container = jQuery('.pagination');
											container.pagination({
												dataSource: objetoSpeakers,
												pageSize: 8,
												showPageNumbers: false,
												showNavigator: true,
												prevText: '<i class="bi bi-chevron-compact-left"></i>&nbsp;<span>Anterior</span>',
												nextText: '<span>Siguiente</span>&nbsp;<i class="bi bi-chevron-compact-right"></i>',
												callback: function(data, pagination) {
													var dataHtml = '';

													jQuery.each(data, function(index, item) {
														console.log('tro');
														console.log(item);
														dataHtml += item;
													});

													if (!objetoSpeakers.length) {
														jQuery('#container').append('<h4 class="text-center mt-5 mb-5">No se encontraron resultados</h4>');
													} else {
														jQuery("#container").html(dataHtml);
													}
												}
											});
										}
									</script>
								</div>
								<div class="pagination"></div>
							</div>

							<div id="contenido_speakers_detalle" class="container pt-0 d-none">
								<br>
								<div class="row box_atras">
									<div class="col-12 mb-4">
										<a onclick="cerrarDetalle();" class="link_atras"><i class="bi bi-chevron-left color-naranja-suave"></i>&nbsp;Atrás</a>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="row">
											<div class="col-12">
												<div class="speaker_detail_foto"></div>
											</div>
											<div class="col-12">
												<h3 class="speaker_detail_nombre"></h3>
												<div class="speaker_detail_contenido">
													<p class="speaker_detail_jobposition text-center"></p>
												</div>
											</div>
											<div class="col-12 speaker_detail_sessions">
											</div>
										</div>
									</div>
								</div>
							</div>



							<div class="modal" id="modalDetalle" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Modal title</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<p>Modal body text goes here.</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

							<?php
							the_content();

							if (!$is_page_builder_used)
								wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'Divi'), 'after' => '</div>'));
							?>
						</div>

						<?php
						if (!$is_page_builder_used && comments_open() && 'on' === et_get_option('divi_show_pagescomments', 'false')) comments_template('', true);
						?>

					</<?php echo et_core_intentionally_unescaped($container_tag, 'fixed_string'); ?>>

				<?php endwhile; ?>

				<?php if (!$is_page_builder_used) : ?>

				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>

	<?php endif; ?>

</div>

<?php

get_footer();
