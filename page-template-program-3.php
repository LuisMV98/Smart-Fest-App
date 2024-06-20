<?php
/*
Template Name: Program Page
*/

get_header();

?>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.6.0/pagination.min.css" rel="stylesheet" />-->

<?php

$post_id              = get_the_ID();
$is_page_builder_used = et_pb_is_pagebuilder_used($post_id);
$container_tag        = 'product' === get_post_type($post_id) ? 'div' : 'article'; ?>

<div id="main-content">

	<?php if (!$is_page_builder_used) : ?>

		<div class="container-program">
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
							<div id="contenido_programa" class="container">

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" id="tabDias" role="tablist">
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="dia-uno-tab" data-bs-toggle="tab" data-bs-target="#dia-uno" type="button" role="tab" aria-controls="dia-uno" aria-selected="true"><span class="d-none d-sm-inline-block">12 de julio</span><span class="d-inline-block d-sm-none">12 jul</span></button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="dia-dos-tab" data-bs-toggle="tab" data-bs-target="#dia-dos" type="button" role="tab" aria-controls="dia-dos" aria-selected="false"><span class="d-none d-sm-inline-block">13 de julio</span><span class="d-inline-block d-sm-none">13 jul</span></button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="dia-tres-tab" data-bs-toggle="tab" data-bs-target="#dia-tres" type="button" role="tab" aria-controls="dia-tres" aria-selected="false"><span class="d-none d-sm-inline-block">14 de julio</span><span class="d-inline-block d-sm-none">14 jul</span></button>
									</li>
								</ul>

								<!-- BUSCADOR -->
								<!-- <div class="box-buscador-programa">
									<input type="text" class="form-control" id="txtBuscar" placeholder="Buscar" />
								</div> -->

								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="dia-uno" role="tabpanel" aria-labelledby="dia-uno-tab" tabindex="0"></div>
									<div class="tab-pane" id="dia-dos" role="tabpanel" aria-labelledby="dia-dos-tab" tabindex="0"></div>
									<div class="tab-pane" id="dia-tres" role="tabpanel" aria-labelledby="dia-tres-tab" tabindex="0"></div>
								</div>

							</div>

							<div id="contenido_programa_detalle" class="container pt-0 d-none"><br>
								<div class="row box_atras">
									<div class="col-12 mb-4">
										<a onclick="cerrarDetalle();" class="link_atras"><i class="bi bi-chevron-left color-naranja-suave"></i>&nbsp;Atrás</a>
									</div>
								</div>
								<div class="row">
									<div class="sesion2">
										<div class="col-12">
											<h4 class="mt-3 mb-2 program_detail_title">
											</h4>
											<div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4 program_detail_description">
											</div>
											<div class="col-12 speaker_detail_sessions">
											</div>
										</div>
									</div>
								</div>

								<script type="text/javascript">
									$('#txtBuscar').keyup(function(e) {
										let contenido = $(this).val();

										if (contenido == "") {
											CargarPrograma();
										} else {
											var code = e.key;
											if (code === "Enter") {
												LanzarBusqueda(contenido);
											}
										}
									});


									const API = 'https://networking.barter.es/programapi/sessions.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513';
									const APIBusqueda = 'https://networking.barter.es/programapi/sessions.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513&text=';
									const APITracks = 'https://networking.barter.es/programapi/tracks.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513';
									const APIDetail = 'https://networking.barter.es/programapi/session.php?idevent=380&token=60881f80c200253e05bf5e7a53a61513&idsession=';

									let objetoTracks;
									let colorTrack = "";
									var listUnoSessions = [];
									var listDosSessions = [];
									var listTresSessions = [];


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
											CargarPrograma();
										})
										.catch(error => {
											console.error(error);
										});

									function CargarResultados(data) {
										data.sessions.forEach(function(element) {
											objetoTracks.tracks.forEach(function(elemento) {
												if (elemento.idtrack == element.idtrack) {
													colorTrack = elemento.color;
												}
											});

											let contenido_speakers = "";
											fetchData(APIDetail + element.idsession)
												.then(detail => {
													contenido_speakers = contenido_speakers + `<p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;${detail.title}</p>`;
													console.log("*", contenido_speakers);
													console.log(detail.title);
												})
												.catch(error => {
													console.error(error);
												});

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

											let contenido_item = `<a onclick="abrirDetalle(${element.idsession});"><div>`;
											if (element.title != null && element.title != "") {
												contenido_item = contenido_item + `<h5 class="session_item_title"><span style="text-transform: uppercase; display:none;">${element.sessiontype}</span><br>${element.title}</h5>`;
											}
											if (element.start != null && element.start != "" && element.end != null && element.end != "") {
												contenido_item = contenido_item + `<p><i class="bi bi-clock"></i>&nbsp;${dia}/${mes}/${year}&nbsp;&nbsp;|&nbsp;&nbsp;${element.start} - ${element.end}</p>`;
											}
											if (element.room != null && element.room != "") {
												contenido_item = contenido_item + `<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;${element.room}</p>`;
												//contenido_item = contenido_item + `<p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp; / </p>`;
											}
											// fetchData(APIDetail + element.idsession)
											// 	.then(detail => {
											// 		contenido_item = contenido_item + `<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;${detail.title}</p>`;
											// 	})
											// 	.catch(error => {
											// 		console.error(error);
											// 	});
											console.log(contenido_speakers);
											contenido_item = contenido_item + contenido_speakers + `</div></a>`;

											if (element.date == "20240712") {
												listUnoSessions.push({
													inicio: element.start,
													fin: element.end,
													idtrack: element.idtrack,
													contenido: contenido_item
												});
											}
											if (element.date == "20240713") {
												listDosSessions.push({
													inicio: element.start,
													fin: element.end,
													idtrack: element.idtrack,
													contenido: contenido_item
												});
											}
											if (element.date == "20240714") {
												listTresSessions.push({
													inicio: element.start,
													fin: element.end,
													idtrack: element.idtrack,
													contenido: contenido_item
												});
											}
										});

										let newListUno = [];
										let listYaAgregadosUno = [];
										let newListDos = [];
										let listYaAgregadosDos = [];
										let newListTres = [];
										let listYaAgregadosTres = [];

										let contenido = "";
										if (!listUnoSessions.length) {
											$('#dia-uno').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
										} else {
											listUnoSessions.forEach(function(item) {
												let ya_agregado = listYaAgregadosUno.find(element => element == item.inicio);
												if (ya_agregado != null) {} else {
													objetoTracks.tracks.forEach(function(elemento) {
														if (elemento.idtrack == item.idtrack) {
															colorTrack = elemento.color;
														}
													});


													let iguales = listUnoSessions.filter(element => element.inicio == item.inicio);
													if (iguales.length > 1) {
														listYaAgregadosUno.push(item.inicio);

														if (iguales.length == 2) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_dos">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_dos">` + iguales[1].contenido + `</div></div>`;
														}
														if (iguales.length == 3) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_tres">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_tres">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_tres">` + iguales[2].contenido + `</div></div>`;
														}
														if (iguales.length == 4) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_cuatro">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_cuatro">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_cuatro">` + iguales[2].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido cuatro_de_cuatro">` + iguales[3].contenido + `</div></div>`;

														}
														if (iguales.length == 5) {}
													} else {
														contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico" style="background-color:${colorTrack};">` + item.contenido + `</div></div>`;
													}
												}
											});
											$('#dia-uno').append(contenido);
										}

										contenido = "";
										if (!listDosSessions.length) {
											$('#dia-dos').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
										} else {
											listDosSessions.forEach(function(item) {
												let ya_agregado = listYaAgregadosDos.find(element => element == item.inicio);
												if (ya_agregado != null) {} else {
													objetoTracks.tracks.forEach(function(elemento) {
														if (elemento.idtrack == item.idtrack) {
															colorTrack = elemento.color;
														}
													});

													let iguales = listDosSessions.filter(element => element.inicio == item.inicio);
													if (iguales.length > 1) {
														listYaAgregadosDos.push(item.inicio);

														if (iguales.length == 2) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_dos">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_dos">` + iguales[1].contenido + `</div></div>`;
														}
														if (iguales.length == 3) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_tres">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_tres">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_tres">` + iguales[2].contenido + `</div></div>`;
														}
														if (iguales.length == 4) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_cuatro">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_cuatro">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_cuatro">` + iguales[2].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido cuatro_de_cuatro">` + iguales[3].contenido + `</div></div>`;
														}
														if (iguales.length == 5) {}
													} else {
														contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico" style="background-color:${colorTrack};">` + item.contenido + `</div></div>`;
													}
												}
											});
											$('#dia-dos').append(contenido);
										}

										contenido = "";
										if (!listTresSessions.length) {
											$('#dia-tres').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
										} else {
											listTresSessions.forEach(function(item) {
												let ya_agregado = listYaAgregadosTres.find(element => element == item.inicio);
												if (ya_agregado != null) {} else {
													objetoTracks.tracks.forEach(function(elemento) {
														if (elemento.idtrack == item.idtrack) {
															colorTrack = elemento.color;
														}
													});


													let iguales = listTresSessions.filter(element => element.inicio == item.inicio);
													if (iguales.length > 1) {
														listYaAgregadosTres.push(item.inicio);

														if (iguales.length == 2) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_dos">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_dos">` + iguales[1].contenido + `</div></div>`;
														}
														if (iguales.length == 3) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_tres">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_tres">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_tres">` + iguales[2].contenido + `</div></div>`;
														}
														if (iguales.length == 4) {
															contenido = contenido + `<div class="session_item_row"><div class="session_item_hora"><span class="inicio"><span class="icono_lista">■</span> ` + iguales[0].inicio + `</span></div><div class="session_item_contenido uno_de_cuatro">` + iguales[0].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido dos_de_cuatro">` + iguales[1].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido tres_de_cuatro">` + iguales[2].contenido + `</div>`;
															contenido = contenido + `<div class="session_item_contenido cuatro_de_cuatro">` + iguales[3].contenido + `</div></div>`;

														}
														if (iguales.length == 5) {}
													} else {
														contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico" style="background-color:${colorTrack};">` + item.contenido + `</div></div>`;
													}
												}
											});
											$('#dia-tres').append(contenido);
										}
									}

									function LanzarBusqueda(texto) {
										$('#dia-uno').html('');
										$('#dia-dos').html('');
										$('#dia-tres').html('');

										listUnoSessions = [];
										listDosSessions = [];
										listTresSessions = [];

										fetchData(APIBusqueda + texto)
											.then(data => {
												CargarResultados(data);
											})
											.catch(error => {
												console.error(error);
											});
									}

									function CargarPrograma() {
										$('#dia-uno').html('');
										$('#dia-dos').html('');
										$('#dia-tres').html('');

										listUnoSessions = [];
										listDosSessions = [];
										listTresSessions = [];

										fetchData(API)
											.then(data => {
												CargarResultados(data);
											})
											.catch(error => {
												console.error(error);
											});
									}

									function abrirDetalle(idspeaker) {
										limpiarDetalle();

										jQuery('#contenido_programa').addClass('d-none');
										jQuery('#contenido_programa').removeClass('d-block');

										jQuery('#contenido_programa_detalle').addClass('d-block');
										jQuery('#contenido_programa_detalle').removeClass('d-none');

										fetchData(APIDetail + idspeaker)
											.then(data => {
												//console.log(data);
												if (data.sessiontype != null && data.title != null) {
													jQuery('.program_detail_title').append(`<b><span style="text-transform: uppercase;">${data.sessiontype}</span><br>${data.title}</b>`);
												}
												if (data.description != null) {
													jQuery('.program_detail_description').append(`<p class="text-justify">${data.description}</p>`);
												}

												let contenidoSpeakers = "";
												data.speakers.forEach(function(element) {
													contenidoSpeakers = contenidoSpeakers + `<div class="speaker_item">
																							<div class="speaker_item_boxphoto"><img src="${element.urlphoto}" class="img-fluid speaker_item_photo"></div>
																							<h4 class="speaker_item_name color-naranja-suave">${element.name}<br>${element.surname}</h4>
																							<div class="speaker_item_contenido">
																								<p class="speaker_item_company">${element.jobposition}</p>
																							</div>
																						</div>`;
												});
												jQuery('.speaker_detail_sessions').append(contenidoSpeakers);

											})
											.catch(error => {
												console.error(error);
											});

									}

									function cerrarDetalle() {
										$('#contenido_programa_detalle').addClass('d-none');
										$('#contenido_programa_detalle').removeClass('d-block');

										$('#contenido_programa').addClass('d-block');
										$('#contenido_programa').removeClass('d-none');
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
										jQuery('.program_detail_title').html('');
										jQuery('.program_detail_description').html('');
									}
								</script>

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
