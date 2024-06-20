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
$is_page_builder_used = et_pb_is_pagebuilder_used( $post_id );
$container_tag        = 'product' === get_post_type( $post_id ) ? 'div' : 'article'; ?>

    <div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container-speaker">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<<?php echo $container_tag; ?> id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! $is_page_builder_used ) : ?>

				<?php
					$thumb = '';

					$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

					$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
					$classtext = 'et_featured_image';
					$titletext = get_the_title();
					$alttext = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
					$thumbnail = get_thumbnail( $width, $height, $classtext, $alttext, $titletext, false, 'Blogimage' );
					$thumb = $thumbnail["thumb"];

					if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
						print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
				?>

				<?php endif; ?>

					<div class="entry-content">			
                
                <!-- <div class="et_pb_section et_pb_section_0 et_pb_fullwidth_section et_section_regular">
					<div id="carousel_interno" class="et_pb_module et_pb_fullwidth_slider_0 et_pb_slider et_pb_bg_layout_dark carousel_interno_speakers" style="background-image: url(https://smartcityexpolatam.com/wp-content/uploads/2023/04/portada-speakers.webp);">
						<div class="et_pb_slides">
							<div class="et_pb_slide et_pb_slide_0 et_pb_bg_layout_dark et_pb_media_alignment_center et-pb-active-slide" data-slide-id="et_pb_slide_0">				
				
                <div class="et_pb_container clearfix" style="height: 435px;">
                    <div class="et_pb_slider_container_inner">						
                        <div class="et_pb_slide_description">
                            <h1 class="et_pb_slide_title">Speakers</h1>							
                        </div>
                    </div>
                </div>							
				
							</div>			
						</div>				
					</div>									
				</div> -->  
                
<div class="container pt-0">
	<div class="et_pb_column et_pb_column_4_4 et_pb_column_13  et_pb_css_mix_blend_mode_passthrough et-last-child">				
		<div class="et_pb_module et_pb_text et_pb_text_13  et_pb_text_align_left et_pb_bg_layout_light" style="margin-bottom:15px;">				
			<!--<div class="et_pb_text_inner"><h2 class="subtitle-smart color-azul-chabajel">Ponentes</h2></div>-->
		</div>
        <div class="et_pb_module et_pb_divider et_pb_divider_2 et_pb_divider_position_ et_pb_space border-programa"><div class="et_pb_divider_internal"></div></div>
	</div>                
</div>                
                
<div id="contenido_speakers" class="container pt-0"> 
                
<!-- BUSCADOR -->
<!--<div class="box-buscador-speakers">
	<input type="text" class="form-control" id="txtBuscar" placeholder="Buscar" />               
</div>--> 
                
    <div id="container">
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/gerardo_kleinburg.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(1);">Gerardo<br>Kleinburg</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Director "Hablemos de Ópera"</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/jose_wolffer.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(2);">José<br>Wolffer</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Director General de Música - UNAM</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/manuel_rocha.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(3);">Manuel<br>Rocha Iturbide</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Compositor / Profesor Investigador - UAM Unidad Lerma</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/ana_lara.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(4);">Ana<br>Lara</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Compositora</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/big_band.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(5);">Mérida<br>Big Band</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">By Ranier Pucheux</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/erika_torres.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(6);">Erika<br>Torres</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Directora "En boca de Lobos producciones"</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/monica_sanchez.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(7);">Mónica<br>Sánchez Escuer</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">ARCCO, Arte, Creatividad y Conocimiento A.C.</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/christian_sanchez.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(8);">Christian<br>Sánchez</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Red Room Music Academy</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(9);">Verónica<br>Valerio</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/gemma_arguello.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(10);">Gemma<br>Argüello Manresa</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Profesora en la UNAM y curadora independiente</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/makinadt.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(11);">MákinadT</h4>
			<div class="speaker_item_contenido">
				<p class="speaker_item_company">Arte en Movimiento</p>
			</div>
		</div>
		<div class="speaker_item">
			<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/colectivo_contrayerba.webp" class="img-fluid speaker_item_photo"></div>
			<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(12);">Colectiva Contrayerba</h4>			
		</div>
	</div>
    <div class="pagination"></div>
</div>
                
<div id="contenido_speakers_detalle" class="container pt-0">
    <div class="row box_atras d-none">
         <div class="col-12 mb-4">
              <a onclick="cerrarDetalle();" class="link_atras"><i class="bi bi-chevron-left color-naranja-suave"></i>&nbsp;Atrás</a>
         </div>
    </div>
    <div class="row">
		<div class="col-12">
			<div class="sesion1 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/gerardo_kleinburg.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Gerardo Kleinburg</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Director "Hablemos de Ópera"</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						  <div class="session_item_contenido unico">
							  <div>
								  <h5 class="session_item_title mt-2 fw-semibold">Ponencia: La ópera y la inteligencia artificial </h5>
								  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 10:00 a 11:00</p>
								  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
								  
							  </div>      		  
						  </div>
					  </div>
         		</div>
			</div>
						<div class="sesion2 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/jose_wolffer.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">José Wolffer</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Director General de Música - UNAM</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						  <div class="session_item_contenido unico">
			  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Conferencia "La música en los videojuegos – Desde los comienzos hasta la actualidad"</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 13:00 a 14:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              </div>     		  
          </div>
					  </div>
         		</div>
			</div>
			<div class="sesion3 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/manuel_rocha.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Manuel Rocha Iturbide</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Compositor / Profesor Investigador - UAM Unidad Lerma</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						  <div class="session_item_contenido unico">
      		  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Taller "La escucha del paisaje sonoro"</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 13:00 a 15:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Escenario en T</p>
              </div>
          </div>
					  </div>
         		</div>
			</div>
						<div class="sesion4 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/ana_lara.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Ana Lara</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Compositora</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						  <div class="session_item_contenido unico">
      		  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Ponencia: La música y el espacio</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 16:00 a 17:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Escenario en T</p>
              </div>
          </div>
					  </div>
         		</div>
			</div>
						<div class="sesion5 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/big_band.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Mérida Big Band</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">By Ranier Pucheux</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						  <div class="session_item_contenido unico">
				  <div>
          		  	<h5 class="session_item_title mt-2 fw-semibold">Jazz in town</h5>
				  	<p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 10:15 a 11:40</p>
                  	<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              	  </div>     		  
          </div>
					  </div>
         		</div>
			</div>
						<div class="sesion6 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/erika_torres.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Erika Torres</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Directora "En boca de Lobos producciones"</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
				  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">"Cybil" - Espectáculo de danza contemporánea</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 17:00 a 17:30</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              </div>      		  
          </div>
					  </div>
         		</div>
			</div>
									<div class="sesion7 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/monica_sanchez.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Mónica Sánchez Escuer</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">ARCCO, Arte, Creatividad y Conocimiento A.C.</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
      		  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Ponencia: Ciencia y poesía: el gozo del hallazgo</h5>
                  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 12:15 a 13:15</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Escenario en T</p>
              </div>
          </div>
					  </div>
         		</div>
			</div>
									<div class="sesion8 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/christian_sanchez.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Christian Sánchez</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Red Room Music Academy</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
				  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Ponencia "La Música, Soñar Despierto" </h5>
				  <p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 16:00 a 17:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>				  
              </div>    		  
          </div>
					  </div>
         		</div>
			</div>
												<div class="sesion9 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Verónica Valerio</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Arpista, cantante y compositora mexicana</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
				  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Concierto "Peninsular"</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 13:00 a 14:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              </div>     		  
          </div>
					  </div>
					<div class="session_item_row">
						<div class="session_item_contenido unico">
			  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Ponencia: Rutas y Travesías</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 11:30 a 12:30</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              </div>     		  
          </div>
					</div>
         		</div>
			</div>
												<div class="sesion10 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/gemma_arguello.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Gemma Argüello Manresa</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Profesora en la UNAM y curadora independiente</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
      		  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">Taller - "Arte, tecnología y sociedad"</h5>
                  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 13:30 a 14:30</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Escenario en T</p>			  
              </div>
          </div>
					  </div>
         		</div>
			</div>
															<div class="sesion11 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/makinadt.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">MákinadT</h3>
					 <div class="speaker_detail_contenido">
						<p class="speaker_detail_jobposition text-center">Arte en Movimiento</p>
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
				   <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">WireFrame - Espectáculo arquitectónico</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;26 de oct de 2023 17:15 a 18:15</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>				  
              </div>      		 
          </div>
					  </div>
         		</div>
			</div>
															<div class="sesion12 row d-none">
				<div class="col-12">
             		<div class="speaker_detail_foto">
						<img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/colectivo_contrayerba.webp" class="img-fluid speaker_item_photo">
					</div>
         		</div>
				 <div class="col-12">             
					 <h3 class="speaker_detail_nombre">Colectiva Contrayerba</h3>
					 <div class="speaker_detail_contenido">
						
					 </div>
				 </div>
				<div class="col-12 speaker_detail_sessions">
					<h4 class="mt-0 pt-5 pb-0 fw-semibold" style="border-top: 1px solid #444;">
						Participa en
					</h4>
					<div class="session_item_row">
						 <div class="session_item_contenido unico">
			  <div>
          		  <h5 class="session_item_title mt-2 fw-semibold">"Contrayerba: monólogos de mujeres mayas"</h5>
				  <p><i class="bi bi-clock"></i>&nbsp;27 de oct de 2023 14:30 a 15:30</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>				  
              </div>     		  
          </div>
					  </div>
         		</div>
			</div>
		</div>
    </div>     
</div>

<script type="text/javascript">
   $('#txtBuscar').keyup(function(e){
       let contenido = $(this).val();
              
       if(contenido == ""){
       		//CargarSpeakers();
       }
       else{
       		var code = e.key; 
       		if(code==="Enter"){       	   
           		LanzarBusqueda(contenido);
       		}  
       }            
   });
              
    const API = 'https://networking.barter.es/programapi/speakers.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&items=150';
	const APIBusqueda = 'https://networking.barter.es/programapi/speakers.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&items=150&text=';
	const APIDetail = 'https://networking.barter.es/programapi/speaker.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&idspeaker=';
	const APITracks = 'https://networking.barter.es/programapi/tracks.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc';

	let colorTrack = "";
	let objetoTracks;
	var objetoSpeakers = [];
	

const fetchData=(url_api)=> {
    return new Promise((resolve, reject) => {    
    
    const xhttp = new XMLHttpRequest();
  xhttp.open('GET', url_api, true);
  xhttp.onreadystatechange = (() =>{
    if (xhttp.readyState === 4) {
            (xhttp.status === 200)
            ? resolve(JSON.parse(xhttp.responseText))
            : reject(new  Error('Error ' + url_api))
                     
    }
  })
    xhttp.send();
});
}

fetchData(APITracks)
  .then(data => {  		
  		objetoTracks = data;
  		//CargarSpeakers();
  
  		/*data.tracks.forEach(function(elemento){          
        	if(elemento.idtrack == TrackId){            	
            	colorTrack = elemento.color;            	
            }        	        	        	
        });*/
  })
  .catch(error => {
    console.error(error);
  });

function LanzarBusqueda(texto){
	objetoSpeakers = [];

	fetchData(APIBusqueda + texto)
  		.then(data => {        	
    		//CargarResultados(data);
		})
    .catch(error => {
    	console.error(error);
  	});
}

function CargarSpeakers(){
objetoSpeakers = [];

	fetchData(API)
  .then(data => {
    //CargarResultados(data);
  })
  .catch(error => {
    console.error(error);
  });
}

function CargarResultados(data){
    data.speakers.forEach(function(element){    
      let contenido_item = `<div class="speaker_item">`;
      if(element.urlphoto != "https://networking.barter.es/gestor/upload/344/fake.jpg"){
        contenido_item = contenido_item + `<img src="${element.urlphoto}" class="img-fluid speaker_item_photo" />`;
      }
      else{
      	contenido_item = contenido_item + `<img src="https://cumbrechabajel.com/wp-content/uploads/2023/06/avatar.webp" class="img-fluid speaker_item_photo" />`;
      }
      if(element.name != null && element.name != "" && element.surname != null && element.surname != ""){
        contenido_item = contenido_item + `<h4 class="speaker_item_name color-naranja-suave" onclick="abrirDetalle(${element.idspeaker});">${element.name}<br/>${element.surname}</h4>`;
      }
    contenido_item = contenido_item + `<div class="speaker_item_contenido">`;
      if(element.jobposition != null && element.jobposition != ""){
        contenido_item = contenido_item + `<p class="speaker_item_job"><b>${element.jobposition}</b></p>`;
      }
      if(element.company != null && element.company != ""){
        contenido_item = contenido_item + `<p class="speaker_item_company">${element.company}</p>`;
      }     
    contenido_item = contenido_item + `</div>`; 
      
      contenido_item = contenido_item + `</div>`;
    
      objetoSpeakers.push(contenido_item);
      $('#contenido_speakers').append(contenido_item);
    });

	//CargarPaginacion();
}

  function abrirModal(){    
    $('#modalDetalle').modal('show');
  }

 function abrirDetalle(idspeaker){    
 	//limpiarDetalle();
 
    $('#contenido_speakers').addClass('d-none');
 	$('#contenido_speakers').removeClass('d-block');
 
 	$('.box_atras').addClass('d-block');
 	$('.box_atras').removeClass('d-none'); 
	 
	 switch(idspeaker)
		 {
			 case 1:
				 $('.sesion1').addClass('d-block');
 	$('.sesion1').removeClass('d-none'); 
				 break;
				 case 2:
				 $('.sesion2').addClass('d-block');
 	$('.sesion2').removeClass('d-none');
				 break;
				 case 3:
				  $('.sesion3').addClass('d-block');
 	$('.sesion3').removeClass('d-none'); 
				 break;
				 case 4:
				 $('.sesion4').addClass('d-block');
 	$('.sesion4').removeClass('d-none'); 
				 break;
				 case 5:
				  $('.sesion5').addClass('d-block');
 	$('.sesion5').removeClass('d-none'); 
				 break;
				 case 6:
				  $('.sesion6').addClass('d-block');
 	$('.sesion6').removeClass('d-none'); 
				 break;
				 case 7:
				  $('.sesion7').addClass('d-block');
 	$('.sesion7').removeClass('d-none'); 
				 break;
				 case 8:
				  $('.sesion8').addClass('d-block');
 	$('.sesion8').removeClass('d-none'); 
				 break;
				 case 9:
				  $('.sesion9').addClass('d-block');
 	$('.sesion9').removeClass('d-none'); 
				 break;
				 case 10:
				  $('.sesion10').addClass('d-block');
 	$('.sesion10').removeClass('d-none'); 
				 break;
				 case 11:
				  $('.sesion11').addClass('d-block');
 	$('.sesion11').removeClass('d-none'); 
				 break;
				 case 12:
				  $('.sesion12').addClass('d-block');
 	$('.sesion12').removeClass('d-none'); 
				 break;
		 }				 	
 
 	/*fetchData(APIDetail + idspeaker)
  .then(data => {
  		if(data.urlphoto == "https://networking.barter.es/gestor/upload/344/fake.jpg" || data.photo == "https://networking.barter.es/gestor/upload/344/fake.jpg"){
        	$('.speaker_detail_foto').append(`<img src="https://cumbrechabajel.com/wp-content/uploads/2023/06/avatar.webp" class="img-responsive" />`);
        }
  		else{
        	$('.speaker_detail_foto').append(`<img src="${data.urlphoto}" class="img-responsive" />`);
        }  		
  		$('.speaker_detail_nombre').append(`<span class="color-naranja-suave">${data.name}<br/>${data.surname}</span>`);
  		if(data.jobposition != null){
        	$('.speaker_detail_jobposition').append(`<span><b>${data.jobposition}</b></span>`);
        }  		
  		$('.speaker_detail_company').append(`<span>${data.company}</span>`);
  		$('.speaker_detail_city').append(`<span>${data.city}, ${data.country}</span>`);  		
  
  		let contenidoSocial = "";
  		if(data.linkedin != "" || data.twitter != ""){
        	contenidoSocial = contenidoSocial + `<ul class="speaker_item_sociales">`;
        	if(data.linkedin != ""){
          		contenidoSocial = contenidoSocial + `<li class="et-social-icon et-social-linkedin"><a href="${data.linkedin}" class="icon" target="_blank"><span>Linkedin</span></a></li>`;
        	}
        	if(data.twitter != ""){
            	let urlTwitter = data.twitter;
            	urlTwitter = "https://twitter.com/" + urlTwitter.replace('@', '');
          		contenidoSocial = contenidoSocial + `<li class="et-social-icon et-social-twitter"><a href="${urlTwitter}" class="icon" target="_blank"><span>Twitter</span></a></li>`;
        	}
        	contenidoSocial = contenidoSocial + `</ul>`;
        }
  		$('.speaker_detail_sociales').append(contenidoSocial);
  
  		let contenidoSessions = "<h4 class='color-naranja-suave'>Sesiones</h4>";
  		data.sessions.forEach(function(element){  
        	let TrackId = element.idtrack;
                	
        	let fecha = "";
        	let year = "";
        	let mes = "";
        	let dia = "";
        	if(element.date != null){
            	fecha = element.date;	
            	year = fecha[0] + fecha[1] + fecha[2] + fecha[3];
            	mes = fecha[4] + fecha[5];
            	dia = fecha[6] + fecha[7];
            }
        
        objetoTracks.tracks.forEach(function(elemento){          
        	if(elemento.idtrack == TrackId){            	
            	colorTrack = elemento.color;            	
            }        	        	        	
        });
        
        //console.log(colorTrack);
        	
        let trackName = "";
        if(element.track != null){
        	trackName = element.track;
        }
        
        	contenidoSessions = contenidoSessions + `<hr/><div class="speaker_detail_item_session"><h4>${element.title}</h4><div class="text-justify">${element.description}</div><p class="mt-3 mb-3"><span>${dia}/${mes}/${year}</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>${element.start} - ${element.end}</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>${element.room}</span></p><p class="speaker_detail_texto_tematica"> ${trackName}</p></div>`;
        });
  		$('.speaker_detail_sessions').append(contenidoSessions);
  
  		if(data.bio != null){        
        	$('.speaker_detail_bio_title').append('Biografía');
        	$('.speaker_detail_bio').append(`<span>${data.bio}</span>`);
        }  		
  })
  .catch(error => {
    console.error(error);
  });*/
 
  }

function cerrarDetalle(){    
	$('#contenido_speakers').addClass('d-block');
 	$('#contenido_speakers').removeClass('d-none');

    $('.box_atras').addClass('d-none');
 	$('.box_atras').removeClass('d-block'); 
	
	$('.sesion1').addClass('d-none');
 	$('.sesion1').removeClass('d-block'); 
	$('.sesion2').addClass('d-none');
 	$('.sesion2').removeClass('d-block'); 
	$('.sesion3').addClass('d-none');
 	$('.sesion3').removeClass('d-block'); 
	$('.sesion4').addClass('d-none');
 	$('.sesion4').removeClass('d-block'); 
	$('.sesion5').addClass('d-none');
 	$('.sesion5').removeClass('d-block'); 
	$('.sesion6').addClass('d-none');
 	$('.sesion6').removeClass('d-block'); 
	$('.sesion7').addClass('d-none');
 	$('.sesion7').removeClass('d-block'); 
	$('.sesion8').addClass('d-none');
 	$('.sesion8').removeClass('d-block');
	$('.sesion9').addClass('d-none');
 	$('.sesion9').removeClass('d-block'); 
	$('.sesion10').addClass('d-none');
 	$('.sesion10').removeClass('d-block'); 
	$('.sesion11').addClass('d-none');
 	$('.sesion11').removeClass('d-block'); 
	$('.sesion12').addClass('d-none');
 	$('.sesion12').removeClass('d-block'); 
  }

function limpiarDetalle(){
	$('.speaker_detail_foto').html('');
$('.speaker_detail_nombre').html('');
$('.speaker_detail_jobposition').html('');
$('.speaker_detail_company').html('');
$('.speaker_detail_city').html('');
$('.speaker_detail_sociales').html('');
$('.speaker_detail_bio').html('');
$('.speaker_detail_sessions').html('');
$('.speaker_detail_bio_title').html('');
}

    function CargarPaginacion() {    
    	$("#container").html('');
    
        let container = $('.pagination');
        container.pagination({
            dataSource: objetoSpeakers,
            pageSize: 8,
        	showPageNumbers: false,
    		showNavigator: true,
        	prevText: '<i class="bi bi-chevron-compact-left"></i>&nbsp;<span>Anterior</span>',
        	nextText: '<span>Siguiente</span>&nbsp;<i class="bi bi-chevron-compact-right"></i>',
            callback: function (data, pagination) {            
                var dataHtml = '<ul class="lista_speakers">';

            	$.each(data, function (index, item) {
                	//console.log('tro');
                	//console.log(item);
                    dataHtml += '<li>' + item + '</li>';
                });                       

                dataHtml += '</ul>';

            	if(!objetoSpeakers.length){
                	$('#container').append('<h4 class="text-center mt-5 mb-5">No se encontraron resultados</h4>');
                }
            	else{
                	$("#container").html(dataHtml);
                }                            
            }
        });
    }
</script>

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

						if ( ! $is_page_builder_used )
							wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
					?>
					</div>

				<?php
					if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
				?>

				</<?php echo et_core_intentionally_unescaped( $container_tag, 'fixed_string' ); ?>>

			<?php endwhile; ?>

<?php if ( ! $is_page_builder_used ) : ?>

			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>

<?php endif; ?>

</div>

<?php

get_footer();
