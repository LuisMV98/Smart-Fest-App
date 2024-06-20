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
$is_page_builder_used = et_pb_is_pagebuilder_used( $post_id );
$container_tag        = 'product' === get_post_type( $post_id ) ? 'div' : 'article'; ?>

    <div id="main-content">

<?php if ( ! $is_page_builder_used ) : ?>

	<div class="container-program">
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
                
                <!--<div class="et_pb_section et_pb_section_0 et_pb_fullwidth_section et_section_regular">
					<div id="carousel_interno" class="et_pb_module et_pb_fullwidth_slider_0 et_pb_slider et_pb_bg_layout_dark carousel_interno_program" style="background-image: url(https://smartcityexpolatam.com/wp-content/uploads/2023/04/portada-speakers.webp);">
						<div class="et_pb_slides">
							<div class="et_pb_slide et_pb_slide_0 et_pb_bg_layout_dark et_pb_media_alignment_center et-pb-active-slide" data-slide-id="et_pb_slide_0">				
				
                <div class="et_pb_container clearfix" style="height: 435px;">
                    <div class="et_pb_slider_container_inner">						
                        <div class="et_pb_slide_description">
                            <h1 class="et_pb_slide_title">Programa</h1>							
                        </div>
                    </div>
                </div>							
				
							</div>			
						</div>				
					</div>									
				</div> -->    

<div class="container pt-1">
	<div class="et_pb_column et_pb_column_4_4 et_pb_column_13  et_pb_css_mix_blend_mode_passthrough et-last-child">				
		<div class="et_pb_module et_pb_text et_pb_text_13  et_pb_text_align_left et_pb_bg_layout_light" style="margin-bottom:15px;">				
			<div class="et_pb_text_inner">
				<!--<a href="javascript:history.back()" class="btn-atras"><i class="bi bi-chevron-left"></i></a>
				<h2 class="subtitle-smart">Programa</h2>-->
			</div>
		</div>
        <div class="et_pb_module et_pb_divider et_pb_divider_2 et_pb_divider_position_ et_pb_space border-programa"><div class="et_pb_divider_internal"></div></div>
	</div>                
</div>
                
<div id="contenido_programa" class="container pt-0">  
                
    	<!-- Nav tabs -->
<ul class="nav nav-tabs" id="tabDias" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="dia-uno-tab" data-bs-toggle="tab" data-bs-target="#dia-uno" type="button" role="tab" aria-controls="dia-uno" aria-selected="true">12 jul</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="dia-dos-tab" data-bs-toggle="tab" data-bs-target="#dia-dos" type="button" role="tab" aria-controls="dia-dos" aria-selected="false">13 jul</button>
  </li>
</ul>
                
<!-- BUSCADOR -->
<!--<div class="box-buscador-programa">
	<input type="text" class="form-control" id="txtBuscar" placeholder="Buscar" />               
</div>-->               

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="dia-uno" role="tabpanel" aria-labelledby="dia-uno-tab" tabindex="0">
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(1);">
				  <div>
          		  	<h4 class="session_item_title">Inauguración</h4>
				  	<p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 10:00 a 11:00</p>
                  	<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  	<!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Merida Big Band by Ranier Pucheux</p> -->
              	  </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(2);">
				  <div>
          		  	<h4 class="session_item_title">La ciudad que queremos habitar</h4>
				  	<p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 11:00 a 11:50</p>
                  	<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
              	  </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(3);">
				  <div>
          		  <h4 class="session_item_title">ACTIVIDAD ENTRETENIMIENTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 12:00 a 12:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Verónica Valerio</p> -->
              </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(4);">
				  <div>
          		  <h4 class="session_item_title">Tecnología al servicio de la sociedad y las ciudades</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 13:00 a 14:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Christian Sanchez - Red Room Music Academy</p>				   -->
              </div>
			  </a>      		  
          </div>
      </div>	  
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(5);">
				   <div>
          		  <h4 class="session_item_title">ACTIVIDAD ENTRETENIMIENTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 16:00 a 16:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;MakinadT Arte en Movimiento</p>				   -->
              </div>
			  </a>      		 
          </div>
      </div>	  
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(6);">
				   <div>
          		  <h4 class="session_item_title">Juventudes contra el cambio climático</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 17:00 a 17:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;MakinadT Arte en Movimiento</p>				   -->
              </div>
			  </a>      		 
          </div>
      </div>	  
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(7);">
				   <div>
          		  <h4 class="session_item_title">CONCIERTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 18:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;MakinadT Arte en Movimiento</p>				   -->
              </div>
			  </a>      		 
          </div>
      </div>
  </div>
  <div class="tab-pane" id="dia-dos" role="tabpanel" aria-labelledby="dia-dos-tab" tabindex="0">
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(8);">
			  <div>
          		  <h4 class="session_item_title">ACTIVIDAD ENTRETENIMIENTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 11:00 a 11:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Miguel Peraza, Escultor</p> -->
              </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(9);">
			  <div>
          		  <h4 class="session_item_title">TALLER: Juventudes comprometidas</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 12:00 a 12:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Gerardo Kleinburg, Director "Hablemos de Ópera"</p> -->
              </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(10);">
			  <div>
          		  <h4 class="session_item_title">DIÁLOGO: Liderazgo joven en acción</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 13:00 a 14:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Verónica Valerio</p> -->
              </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(11);">
			  <div>
          		  <h4 class="session_item_title">ACTIVIDAD ENTRETENIMIENTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 16:00 a 16:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Jose Wolffer - Director General de Música - UNAM</p> -->
              </div>
			  </a>      		  
          </div>
      </div>
	   <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(12);">
			  <div>
          		  <h4 class="session_item_title">DIÁLOGO: Ciudades sostenibles</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 17:00 a 17:50</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Colectiva Contrayerba</p>				   -->
              </div>
			  </a>      		  
          </div>
      </div>
	  <div class="session_item_row">
          <div class="session_item_contenido unico">
			  <a onclick="abrirDetalle(13);">
				  <div>
          		  <h4 class="session_item_title">CONCIERTO</h4>
				  <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 18:00</p>
                  <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
				  <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Erika Torres, directora "En boca de Lobos producciones"</p> -->
              </div>
			  </a>      		  
          </div>
      </div>	  
  </div>
</div>                
                
</div>
                
<div id="contenido_speakers_detalle" class="container pt-0">
    <div class="row box_atras d-none">
         <div class="col-12 mb-4">
              <a onclick="cerrarDetalle();" class="link_atras"><i class="bi bi-chevron-left color-naranja-suave"></i>&nbsp;Atrás</a>
         </div>
    </div>
    <div class="row">
		<div class="sesion1 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>Inauguración</b>
				</h4>
               <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   
				</div>
         	</div>		
		</div>     
		<div class="sesion2 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>La ciudad que queremos habitar</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
		<div class="sesion3 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>ACTIVIDAD ENTRETENIMIENTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>				
		</div> 
		<div class="sesion4 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>Tecnología al servicio de la sociedad y las ciudades</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
		<div class="sesion5 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>ACTIVIDAD ENTRETENIMIENTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
				<div class="sesion6 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>Juventudes contra el cambio climático</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div>
		<div class="sesion7 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>CONCIERTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
		<div class="sesion8 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>ACTIVIDAD ENTRETENIMIENTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
				<div class="sesion9 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>TALLER: Juventudes comprometidas</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>				
		</div> 
				<div class="sesion10 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>DIÁLOGO: Liderazgo joven en acción</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>			
		</div> 
						<div class="sesion11 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>ACTIVIDAD ENTRETENIMIENTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>				
		</div> 
		<div class="sesion12 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>DIÁLOGO: Ciudades sostenibles</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>		
		</div> 
		<div class="sesion13 d-none">
			<div class="col-12">
				<h4 class="mt-3 mb-2">
					<b>CONCIERTO</b>
				</h4>
               <!-- <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
				   <p class="text-justify">
					   A través del arpa, los oyentes viajarán durante una hora por la PENÍNSULA DE YUCATÁN. El viaje comienza explorando uno de los puertos pesqueros de la zona, revelando rutas de navegación internas. La travesía continúa con un viaje onírico a través de las reservas de manglares e islas dedicadas a la Diosa Ixchel. El destino nos lleva a Nueva Orleans, mencionando las rutas que unen estos lugares.
				   </p>
				   <p class="text-justify">
					   Luego, el mar nos guiará de regreso a México, adentrándonos en las rutas de los cenotes, explorando cuevas y rituales. Al salir de estos lugares, se resaltará el encuentro con la luz. El objetivo es provocar sorpresa, descubrimiento y aventura.
				   </p>
				   <p class="text-justify">
					   Este concierto permite a la audiencia imaginar y vislumbrar el México del presente, una tierra colorida y un viaje constante. La presentación musical fomenta la participación activa del público, invitándolos a involucrarse en la experiencia en lugar de ser meros espectadores pasivos. ¡Únanse a esta emocionante travesía musical!
				   </p>				   				  
				</div>
				<div class="speaker_item">
					<div class="speaker_item_boxphoto"><img src="https://app.apokalypsi.mx/wp-content/uploads/2023/10/veronica_valerio.webp" class="img-fluid speaker_item_photo"></div>
					<h4 class="speaker_item_name color-naranja-suave">Verónica<br>Valerio</h4>
					<div class="speaker_item_contenido">
						<p class="speaker_item_company">Arpista, cantante y compositora mexicana</p>
					</div>
				</div> -->
         	</div>		
		</div> 
    </div>     
</div>

<script type="text/javascript">
   $('#txtBuscar').keyup(function(e){
       let contenido = $(this).val();
              
       if(contenido == ""){
       		CargarPrograma();
       }
       else{
       		var code = e.key; 
       		if(code==="Enter"){       	   
           		LanzarBusqueda(contenido);
       		}  
       }            
   });
              
              
    const API = 'https://networking.barter.es/programapi/sessions.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc';
	const APIBusqueda = 'https://networking.barter.es/programapi/sessions.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&text=';
	const APITracks = 'https://networking.barter.es/programapi/tracks.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc';
	const APIDetail = 'https://networking.barter.es/programapi/session.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&idsession=';

	let objetoTracks;
	let colorTrack = "";
	var listUnoSessions = [];
	var listDosSessions = [];
	

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
  		//objetoTracks = data;
  		//CargarPrograma();
  })
  .catch(error => {
    console.error(error);
  });

function CargarResultados(data){
	data.sessions.forEach(function(element){
    	objetoTracks.tracks.forEach(function(elemento){   
        		if(elemento.idtrack == element.idtrack){            	
            		colorTrack = elemento.color;  
            	}        	        	        	
        	});
    
      let contenido_item = `<a onclick="abrirDetalle(${element.idsession});" class="session_item_more"><div>`;
      if(element.title != null && element.title != ""){
        contenido_item = contenido_item + `<h4 class="session_item_title">${element.title}</h4>`;
      }
		if(element.date != null && element.date != ""){
			let fecha = "";
        	let year = "";
        	let mes = "";
        	let dia = "";
			fecha = element.date;	
			year = fecha[0] + fecha[1] + fecha[2] + fecha[3];
            mes = fecha[4] + fecha[5];
            dia = fecha[6] + fecha[7];
			
			switch(mes)
				{
					case '01':
						mes = 'ene';
						break;						
					case '02':
						mes = 'feb';
						break;		
						case '03':
						mes = 'mar';
						break;
						case '04':
						mes = 'abr';
						break;
						case '05':
						mes = 'may';
						break;
						case '06':
						mes = 'jun';
						break;
						case '07':
						mes = 'jul';
						break;
						case '08':
						mes = 'ago';
						break;
					case '09':
						mes = 'sep';
						break;
						case '10':
						mes = 'oct';
						break;
						case '11':
						mes = 'nov';
						break;
						case '12':
						mes = 'dic';
						break;
				}
			
			if(element.start != null && element.start != "" && element.end != null && element.end != ""){
				contenido_item = contenido_item + `<p><i class="bi bi-clock"></i>&nbsp;${dia}&nbsp;de&nbsp;${mes}&nbsp;de&nbsp;${year}&nbsp;${element.start}&nbsp;a&nbsp;${element.end}</p>`;
			}
			else{
				contenido_item = contenido_item + `<p><i class="bi bi-clock"></i>&nbsp;${dia}&nbsp;de&nbsp;${mes}&nbsp;de&nbsp;${year}</p>`;	
			}		
		}
      if(element.room != null && element.room != ""){
        contenido_item = contenido_item + `<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;${element.room}</p>`;
      }      				  
      if(element.track != null && element.track != ""){
        contenido_item = contenido_item + `<p class="session_item_track"><i class="bi bi-columns-gap"></i>&nbsp;${element.track}</p>`;
      }
      else{
      	contenido_item = contenido_item + `<p class="session_item_track"><i class="bi bi-columns-gap"></i>&nbsp;${element.sessiontype}</p>`;
      }
		contenido_item = contenido_item + `<p class="session_item_speakers"><i class="bi bi-person"></i>&nbsp;Manuel Redondo</p>`;
		
      contenido_item = contenido_item + `</div></a>`;
    
    	if(element.date == "20230921"){
        	listUnoSessions.push({inicio: element.start, fin: element.end, idtrack: element.idtrack, contenido: contenido_item});
        }
    	if(element.date == "20230922"){
        	listDosSessions.push({inicio: element.start, fin: element.end, idtrack: element.idtrack, contenido: contenido_item});
        }
    });

    let newListUno = [];
  	let listYaAgregadosUno = [];
  	let newListDos = [];
  	let listYaAgregadosDos = [];
  
  	let contenido = "";
	if(!listUnoSessions.length){
    	$('#dia-uno').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
    }
	else{
    	  	listUnoSessions.forEach(function(item) {       
    	let ya_agregado = listYaAgregadosUno.find(element => element == item.inicio);
    	if(ya_agregado != null){
        }
    	else{
        	objetoTracks.tracks.forEach(function(elemento){   
        		if(elemento.idtrack == item.idtrack){            	
            		colorTrack = elemento.color;  
            	}        	        	        	
        	});        
        
        	let iguales = listUnoSessions.filter(element => element.inicio == item.inicio);
			
			contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico">` + item.contenido + `</div></div>`;
        }    	
		});
  		$('#dia-uno').append(contenido);
    }
  
  	contenido = "";
	if(!listDosSessions.length){
    	$('#dia-dos').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
    }
	else{
    	  	listDosSessions.forEach(function(item) {
    	let ya_agregado = listYaAgregadosDos.find(element => element == item.inicio);
    	if(ya_agregado != null){
        }
    	else{
        	objetoTracks.tracks.forEach(function(elemento){   
        		if(elemento.idtrack == item.idtrack){            	
            		colorTrack = elemento.color;  
            	}        	        	        	
        	});
        
        	let iguales = listDosSessions.filter(element => element.inicio == item.inicio);
			contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico">` + item.contenido + `</div></div>`;
        } 
		});
  		$('#dia-dos').append(contenido);
    }
}

function LanzarBusqueda(texto){
	$('#dia-uno').html('');
	$('#dia-dos').html('');

	listUnoSessions = [];
	listDosSessions = [];

	fetchData(APIBusqueda + texto)
  		.then(data => {
    		CargarResultados(data);
		})
    .catch(error => {
    	console.error(error);
  	});
}

function CargarPrograma(){
	$('#dia-uno').html('');
	$('#dia-dos').html('');

	listUnoSessions = [];
	listDosSessions = [];

fetchData(API)
  .then(data => {
    	CargarResultados(data);
  })
  .catch(error => {
    console.error(error);
  });
}

 function abrirDetalle(idsesion){  
	 $('#contenido_programa').addClass('d-none');
 	 $('#contenido_programa').removeClass('d-block');
 
 	 $('.box_atras').addClass('d-block');
 	 $('.box_atras').removeClass('d-none'); 
	 
	 switch(idsesion)
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
				  case 13:
	 $('.sesion13').addClass('d-block');
 	 $('.sesion13').removeClass('d-none'); 
				 break;
		 }
	 
	 
   //$('.contenido_modal').html('');  
   //$('.contenido_modal_title').html(''); 
   //$('#modalDetalle').modal('show');
 
 	//$('.session_item_descripcion').fadeOut(300);
 
 
/*fetchData(APIDetail + idsession)
  .then(data => {
  
  $('.contenido_modal_title').append(data.title); 
  $('.contenido_modal').append(`<div style='font-size: 16px;text-align: justify;line-height: 24px;font-weight: 400;'>${data.description}</div>`); 

  	if(data.presenters.length > 0){
    	let contenidoPre = "<div style='margin:25px 0;'><h4 style='font-weight: 600;'>Presentador</h4>";
  		data.presenters.forEach(function(element){     
        	if(element.urlphoto == "https://networking.barter.es/gestor/upload/344/fake.jpg"){
            	contenidoPre = contenidoPre + `<img src="https://cumbrechabajel.com/wp-content/uploads/2023/06/avatar.webp" class="img-responsive" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`;
            }
        	else{
            	contenidoPre = contenidoPre + `<img src="${element.urlphoto}" class="img-fluid" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`; 		
        	}        	
  			contenidoPre = contenidoPre + `<h5 style="text-align:center;font-weight:600;">${element.name} ${element.surname}</h5>`; 	
        	if(element.jobposition != null){
            	contenidoPre = contenidoPre + `<h5 style='font-weight:400;text-align:center;'>${element.jobposition}</h5>`; 
            }
        	if(element.company != null){
            	contenidoPre = contenidoPre + `<h5 style='font-weight:400;text-align:center;'>${element.company}</h5>`;
            }        	                	
        });
    	contenidoPre = contenidoPre + `</div>`; 
  		$('.contenido_modal').append(contenidoPre); 
    }  		 
  
  if(data.moderators.length > 0){
  		let contenidoMod = "<div style='margin:25px 0;'><h4 style='font-weight: 600;'>Moderador</h4>";
  		data.moderators.forEach(function(element){            
        	if(element.urlphoto == "https://networking.barter.es/gestor/upload/344/fake.jpg"){
            	contenidoMod = contenidoMod + `<img src="https://cumbrechabajel.com/wp-content/uploads/2023/06/avatar.webp" class="img-responsive" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`;
            }
        	else{
            	contenidoMod = contenidoMod + `<img src="${element.urlphoto}" class="img-fluid" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`; 		
        	}        	
  			contenidoMod = contenidoMod + `<h5 style="text-align:center;font-weight:600;">${element.name} ${element.surname}</h5>`; 	
        	if(element.jobposition != null){
            	contenidoMod = contenidoMod + `<h5 style='font-weight:400;text-align:center;'>${element.jobposition}</h5>`; 
            }
        	if(element.company != null){
            	contenidoMod = contenidoMod + `<h5 style='font-weight:400;text-align:center;'>${element.company}</h5>`;
            }    
        });  
  		contenidoMod = contenidoMod + `</div>`;  
  		$('.contenido_modal').append(contenidoMod);
  }  		  		
  
  if(data.speakers.length > 0){
  		let contenidoSpe = "<div style='margin:25px 0;'><h4 style='font-weight: 600;'>Ponentes</h4>";
  		data.speakers.forEach(function(element){            
        	if(element.urlphoto == "https://networking.barter.es/gestor/upload/344/fake.jpg"){
            	contenidoSpe = contenidoSpe + `<img src="https://cumbrechabajel.com/wp-content/uploads/2023/06/avatar.webp" class="img-responsive" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`;
            }
        	else{
            	contenidoSpe = contenidoSpe + `<img src="${element.urlphoto}" class="img-fluid" style="width: 110px;margin: 20px auto 20px auto;display: block;border-radius: 50%;" />`; 		
        	}        
  			contenidoSpe = contenidoSpe + `<h5 style="text-align:center;font-weight:600;">${element.name} ${element.surname}</h5>`; 	
        	if(element.jobposition != null){
            	contenidoSpe = contenidoSpe + `<h5 style='font-weight:400;text-align:center;'>${element.jobposition}</h5>`; 
            }
        	if(element.company != null){
            	contenidoSpe = contenidoSpe + `<h5 style='font-weight:400;text-align:center;'>${element.company}</h5>`;
            } 
        });
  		contenidoSpe = contenidoSpe + `</div>`;  
  		$('.contenido_modal').append(contenidoSpe); 
  }
  		
  })
  .catch(error => {
    console.error(error);
  });*/
 
 
 	/*if($('.box_' + idsession).hasClass('visible')){
    	$('.box_' + idsession).fadeOut(300); 	  
 		$('.box_' + idsession).removeClass('visible'); 	
    }
 	else{
    	$('.box_' + idsession).fadeIn(300); 	  
 		$('.box_' + idsession).addClass('visible'); 	
    } */   
  }

function cerrarDetalle(){    
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
	$('.sesion13').addClass('d-none');
 	$('.sesion13').removeClass('d-block'); 

    $('#contenido_programa').addClass('d-block');
 	$('#contenido_programa').removeClass('d-none'); 	
}
</script>

<div class="modal" id="modalDetalle" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="padding: 20px 30px;">
        <h5 class="modal-title contenido_modal_title" style="padding: 0;font-size: 16px;font-weight:600;"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body contenido_modal" style="padding: 20px 30px;">
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
