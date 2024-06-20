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
                                            <!-- <a href="javascript:history.back()" class="btn-atras"><i class="bi bi-chevron-left"></i></a>
                                            <h2 class="subtitle-smart">Programa</h2> -->
                                        </div>
                                    </div>
                                    <div class="et_pb_module et_pb_divider et_pb_divider_2 et_pb_divider_position_ et_pb_space border-programa">
                                        <div class="et_pb_divider_internal"></div>
                                    </div>
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
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="dia-tres-tab" data-bs-toggle="tab" data-bs-target="#dia-tres" type="button" role="tab" aria-controls="dia-tres" aria-selected="false">14 jul</button>
                                    </li>
                                </ul>

                                <!-- BUSCADOR -->
                                <!-- <div class="box-buscador-programa">
                                    <input type="text" class="form-control" id="txtBuscar" placeholder="Buscar" />
                                </div> -->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="dia-uno" role="tabpanel" aria-labelledby="dia-uno-tab" tabindex="0">
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(1);">
                                                    <div>
                                                        <h4 class="session_item_title">INAUGURACIÓN</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 10:00 a 11:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(2);">
                                                    <div>
                                                        <h4 class="session_item_title">TALLER<br>La ciudad que queremos habitar</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 11:00 a 11:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Dayro De La Fuente / María Fernanda Vázquez Campos</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(3);">
                                                    <div>
                                                        <h4 class="session_item_title">Cata de Miel de abeja melipona- Miel Nativa</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 13:10 a 14:20</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp; </p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(4);">
                                                    <div>
                                                        <h4 class="session_item_title">DIÁLOGO<br>Tecnología al servicio de la sociedad y las ciudades</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 13:00 a 14:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Sofía Castillo</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div> -->
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(5);">
                                                    <div>
                                                        <h4 class="session_item_title">CONFERENCIA<br>Fotógrafo de Naturaleza – Mike Díaz</h4>
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
                                                        <h4 class="session_item_title">PONENCIA<br>Juventudes contra el cambio climático</h4>
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
                                                        <h4 class="session_item_title">Afrodelica – Jazz, House, Afrobeat</h4>
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
                                                        <h4 class="session_item_title">DIÁLOGO<br>Tecnología al servicio de la sociedad y las ciudades</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;12 de jul de 2024 11:00 a 12:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Alejandro Durán Eraña / Ana Karen Ramirez / Alondra Jazmín Fraustro Cardiel</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(11);">
                                                    <div>
                                                        <h4 class="session_item_title">Cuentacuentos – Juanita Urrejola</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 12:10 a 13:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Jose Wolffer - Director General de Música - UNAM</p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(10);">
                                                    <div>
                                                        <h4 class="session_item_title">DIÁLOGO<br>Liderazgo joven en acción</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 13:10 a 14:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Julieta Martínez Oyarzún / Emmy Puerto Arteaga / Alma Itzel García Herrera</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(9);">
                                                    <div>
                                                        <h4 class="session_item_title">TALLER<br>Juventudes comprometidas</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 16:00 a 16:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Gustavo Alvizo Puente / Juan Pablo Chávez</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(12);">
                                                    <div>
                                                        <h4 class="session_item_title">DIÁLOGO<br>Ciudades sostenibles</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 17:00 a 17:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;JacsSone Alerte / Ana Magdalena Rodríguez Gómez / Hugo Isaak Zepeda / Ernesto Valdés Arreguín</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <a onclick="abrirDetalle(13);">
                                                    <div>
                                                        <h4 class="session_item_title">La Comino – Danza Flamenca</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;13 de jul de 2024 18:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Erika Torres, directora "En boca de Lobos producciones"</p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="dia-tres" role="tabpanel" aria-labelledby="dia-tres-tab" tabindex="0">
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <!-- <a onclick="abrirDetalle(14);"> -->
                                                <a>
                                                    <div>
                                                        <h4 class="session_item_title">Ensamble músical – Muul Paax</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;14 de jul de 2024 12:00 a 12:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Merida Big Band by Ranier Pucheux</p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <!-- <a onclick="abrirDetalle(15);"> -->
                                                <a>
                                                    <div>
                                                        <h4 class="session_item_title">Los Juglares- Trova Yucateca</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;14 de jul de 2024 16:00 a 16:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Merida Big Band by Ranier Pucheux</p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <!-- <a onclick="abrirDetalle(16);"> -->
                                                <a>
                                                    <div>
                                                        <h4 class="session_item_title">Niños de Yucatán - Gotas de Miel</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;14 de jul de 2024 17:00 a 17:50</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Merida Big Band by Ranier Pucheux</p> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="session_item_row">
                                            <div class="session_item_contenido unico">
                                                <!-- <a onclick="abrirDetalle(17);"> -->
                                                <a>
                                                    <div>
                                                        <h4 class="session_item_title">Get Back – Tributo a los Beatles</h4>
                                                        <p><i class="bi bi-clock"></i>&nbsp;14 de jul de 2024 18:00</p>
                                                        <p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;Grand Forum</p>
                                                        <!-- <p class="session_item_speakers"><i class="bi bi-mic"></i>&nbsp;Merida Big Band by Ranier Pucheux</p> -->
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
                                                <b>INAUGURACIÓN</b>
                                            </h4>
                                            <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                                <p class="text-justify">
                                                    La importancia de las juventudes en la transformación de las ciudades
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sesion2 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>TALLER<br>La ciudad que queremos habitar</b>
                                            </h4>
                                            <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                                <p class="text-justify">
                                                    En este taller colaborativo, trabajaremos en equipos utilizando una metodología participativa. Nuestro objetivo será debatir y esbozar las características ideales de las ciudades que deseamos habitar en el futuro. A través de dinámicas de grupo, cada participante tendrá la oportunidad de aportar sus ideas y visiones sobre aspectos clave como el urbanismo, la sostenibilidad, la inclusión y la calidad de vida. Juntos, diseñaremos un modelo de ciudad que refleje nuestros deseos y necesidades compartidas. Además, contarán con material didáctico y actividades que harán del taller una experiencia enriquecedora y dinámica.
                                                </p>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/fake.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Dayro<br>De La Fuente</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">TECHO MX</p>
                                                </div>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Fernandez_Mari.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">María Fernanda<br>Vázquez</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Director Investigación Social</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sesion3 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>Cata de Miel de abeja melipona- Miel Nativa</b>
                                            </h4>
                                        </div>
                                    </div>
                                    <!-- <div class="sesion4 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>DIÁLOGO<br>Tecnología al servicio de la sociedad y las ciudades</b>
                                            </h4>
                                            <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                                <p class="text-justify">
                                                    Apps, tecnología e innovación para promover cambios positivos en nuestra sociedad y nuestras ciudades se encuentran en este diálogo inspirador, para abrir la mente de los participantes a nuevas ideas para viejos problemas.
                                                </p>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/fake.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Sofía<br>Castillo</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company"> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="sesion5 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>Fotógrafo de Naturaleza – Mike Díaz</b>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="sesion6 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>Juventudes contra el cambio climático</b>
                                            </h4>
                                            <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                                <p class="text-justify">
                                                    Este espacio de aprendizaje está diseñado para capacitar a juventudes y al público en general sobre la promoción de ciudades sostenibles en la Península de Yucatán. Nuestro objetivo es fortalecer las capacidades de incidencia en temas relacionados con la justicia socio ambiental, proporcionando herramientas y conocimientos esenciales. A través de este taller los participantes aprenderán a desarrollar y apoyar iniciativas que promuevan un desarrollo urbano responsable y equitativo. Únete a nosotros para construir un futuro más sostenible, donde la justicia social y el cuidado del medio ambiente sean prioridades fundamentales en nuestras ciudades.
                                                </p>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Ali_Arabel.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Arabel<br>Alí Mendoza</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Cofundadora // Coordinadora de Observatorio Mexicano de Política para Cambio Climático</p>
                                                </div>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Romero_Santiago.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Santiago<br>Romero García</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Ingeniero Ambiental</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sesion7 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>Afrodelica – Jazz, House, Afrobeat</b>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="sesion8 d-none">
                                        <div class="col-12">
                                            <h4 class="mt-3 mb-2">
                                                <b>DIÁLOGO<br>Tecnología al servicio de la sociedad y las ciudades</b>
                                            </h4>
                                            <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                                <p class="text-justify">
                                                    Apps, tecnología e innovación se unen en este diálogo para promover cambios positivos en nuestra sociedad y en nuestras ciudades. En este espacio, los participantes tendrán la oportunidad de explorar cómo las herramientas digitales pueden ofrecer soluciones creativas a problemas antiguos. Con un enfoque en la colaboración y la imaginación, se abrirá la mente de los asistentes a nuevas ideas que pueden transformar la vida urbana. Desde aplicaciones móviles hasta plataformas innovadoras, descubriremos juntos cómo la tecnología puede ser un motor de progreso y bienestar para todos.
                                                </p>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Duran_Alejandro.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Alejandro<br>Durán Eraña</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Host</p>
                                                </div>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Karen_Ana.png" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Ana Karen<br>Ramirez</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Founder</p>
                                                </div>
                                            </div>
                                            <div class="speaker_item">
                                                <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Faustro_Alondra.jpg" class="img-fluid speaker_item_photo"></div>
                                                <h4 class="speaker_item_name color-naranja-suave">Alondra Jazmín<br>Fraustro Cardiel</h4>
                                                <div class="speaker_item_contenido">
                                                    <p class="speaker_item_company">Directora general y Fundadora</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sesion9 d-none">
                                    <div class="col-12">
                                        <h4 class="mt-3 mb-2">
                                            <b>TALLER<br>Juventudes comprometidas</b>
                                        </h4>
                                        <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                            <p class="text-justify">
                                                Para construir las ciudades del futuro, es crucial que las juventudes se involucren activamente desde la ciudadanía y su participación. ¿Qué tipo de liderazgo necesitamos y cuáles son nuestros compromisos como jóvenes? A través de este taller, identificamos cómo debemos involucrarnos en la toma de decisiones y en la construcción de espacios urbanos sostenibles y justos. Este proceso permitirá crear un decálogo de las juventudes, estableciendo principios claros y acciones concretas para asegurar que sus voces sean escuchadas y que su rol en el desarrollo urbano sea fundamental.
                                            </p>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/fake.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Gustavo<br>Alvizo Puente</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">TECHO-MX</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/fake.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Juan Pablo<br>Chávez</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">TECHO-MX</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sesion10 d-none">
                                    <div class="col-12">
                                        <h4 class="mt-3 mb-2">
                                            <b>DIÁLOGO<br>Liderazgo joven en acción</b>
                                        </h4>
                                        <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                            <p class="text-justify">
                                                En este diálogo, se congregan jóvenes comprometidas que han incursionado en espacios políticos, tanto locales como internacionales, influyendo en la toma de decisiones y promoviendo la agenda juvenil en debates cruciales. El objetivo es inspirar a la juventud presente para que impulsen su activismo y generen cambios tangibles. A través del intercambio de experiencias y perspectivas, se fortalece el liderazgo juvenil y se fomenta la participación ciudadana. Este espacio representa una oportunidad para empoderar a los jóvenes, consolidar su voz en la esfera política y contribuir activamente a la construcción de un futuro inclusivo y justo.
                                            </p>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Martinez_Julieta.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Julieta<br>Martínez Oyarzún</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Fundadora</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Puerto_Emmy.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Emmy<br>Puerto Arteaga</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Activista</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Garcia_AlmaItzel.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Alma Itzel<br>García Herrera</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Co-fundadora y vocera en Oaxaca</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sesion11 d-none">
                                    <div class="col-12">
                                        <h4 class="mt-3 mb-2">
                                            <b>Cuentacuentos – Juanita Urrejola</b>
                                        </h4>
                                    </div>
                                </div>
                                <div class="sesion12 d-none">
                                    <div class="col-12">
                                        <h4 class="mt-3 mb-2">
                                            <b>DIÁLOGO<br>Ciudades sostenibles</b>
                                        </h4>
                                        <div style='font-size: 16px;line-height: 26px;' class="text-justify mb-4">
                                            <p class="text-justify">
                                                En este diálogo, jóvenes y expertos comprometidos con sus comunidades promueven la sostenibilidad en sus territorios. A través de proyectos y movimientos, abordan temas como vivienda, movilidad urbana y medioambiente. Su participación activa impulsa cambios tangibles y soluciones innovadoras. Buscan inspirar a otros a unirse a esta causa, fortaleciendo así el tejido social y generando un impacto duradero. Este espacio es fundamental para construir un futuro más equitativo y respetuoso. Juntos, demuestran el poder transformador de la acción comunitaria y el compromiso con el bienestar colectivo.
                                            </p>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Alerte_JacsSone.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">JacsSone<br>Alerte</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Founder & CEO</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Rodriguez_AnaMagdalena.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Ana Magdalena<br>Rodríguez Gómez</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Coordinadora general</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Isaak_Hugo.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Hugo<br>Isaak Zepeda</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Secretaría de Relaciones Exteriores del Gobierno de México</p>
                                            </div>
                                        </div>
                                        <div class="speaker_item">
                                            <div class="speaker_item_boxphoto"><img src="https://networking.barter.es/gestor/upload/380/Valdes_Ernesto.jpg" class="img-fluid speaker_item_photo"></div>
                                            <h4 class="speaker_item_name color-naranja-suave">Ernesto<br>Valdés Arreguín</h4>
                                            <div class="speaker_item_contenido">
                                                <p class="speaker_item_company">Smart Cities Consultant y Psicolgía de la Ciudad</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sesion13 d-none">
                                    <div class="col-12">
                                        <h4 class="mt-3 mb-2">
                                            <b>La Comino – Danza Flamenca</b>
                                        </h4>
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


                            const API = 'https://networking.barter.es/programapi/sessions.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc';
                            const APIBusqueda = 'https://networking.barter.es/programapi/sessions.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&text=';
                            const APITracks = 'https://networking.barter.es/programapi/tracks.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc';
                            const APIDetail = 'https://networking.barter.es/programapi/session.php?idevent=344&token=4b2d694b918b25d4a8baae9d07017abc&idsession=';

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
                                    //objetoTracks = data;
                                    //CargarPrograma();
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

                                    let contenido_item = `<a onclick="abrirDetalle(${element.idsession});" class="session_item_more"><div>`;
                                    if (element.title != null && element.title != "") {
                                        contenido_item = contenido_item + `<h4 class="session_item_title">${element.title}</h4>`;
                                    }
                                    if (element.date != null && element.date != "") {
                                        let fecha = "";
                                        let year = "";
                                        let mes = "";
                                        let dia = "";
                                        fecha = element.date;
                                        year = fecha[0] + fecha[1] + fecha[2] + fecha[3];
                                        mes = fecha[4] + fecha[5];
                                        dia = fecha[6] + fecha[7];

                                        switch (mes) {
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

                                        if (element.start != null && element.start != "" && element.end != null && element.end != "") {
                                            contenido_item = contenido_item + `<p><i class="bi bi-clock"></i>&nbsp;${dia}&nbsp;de&nbsp;${mes}&nbsp;de&nbsp;${year}&nbsp;${element.start}&nbsp;a&nbsp;${element.end}</p>`;
                                        } else {
                                            contenido_item = contenido_item + `<p><i class="bi bi-clock"></i>&nbsp;${dia}&nbsp;de&nbsp;${mes}&nbsp;de&nbsp;${year}</p>`;
                                        }
                                    }
                                    if (element.room != null && element.room != "") {
                                        contenido_item = contenido_item + `<p class="session_item_room"><i class="bi bi-geo-alt"></i>&nbsp;${element.room}</p>`;
                                    }
                                    if (element.track != null && element.track != "") {
                                        contenido_item = contenido_item + `<p class="session_item_track"><i class="bi bi-columns-gap"></i>&nbsp;${element.track}</p>`;
                                    } else {
                                        contenido_item = contenido_item + `<p class="session_item_track"><i class="bi bi-columns-gap"></i>&nbsp;${element.sessiontype}</p>`;
                                    }
                                    contenido_item = contenido_item + `<p class="session_item_speakers"><i class="bi bi-person"></i>&nbsp;Manuel Redondo</p>`;

                                    contenido_item = contenido_item + `</div></a>`;

                                    if (element.date == "20230921") {
                                        listUnoSessions.push({
                                            inicio: element.start,
                                            fin: element.end,
                                            idtrack: element.idtrack,
                                            contenido: contenido_item
                                        });
                                    }
                                    if (element.date == "20230922") {
                                        listDosSessions.push({
                                            inicio: element.start,
                                            fin: element.end,
                                            idtrack: element.idtrack,
                                            contenido: contenido_item
                                        });
                                    }
                                    if (element.date == "20230923") {
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

                                            contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico">` + item.contenido + `</div></div>`;
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
                                            contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico">` + item.contenido + `</div></div>`;
                                        }
                                    });
                                    $('#dia-dos').append(contenido);
                                }

                                contenido = "";
                                if (!listTresSessions.length) {
                                    $('#dia-tres').append('<h4 class="mt-5 mb-5">No se encontraron resultados</h4>');
                                } else {
                                    listTresSessions.forEach(function(item) {
                                        let ya_agregado = listYaAgregadosDos.find(element => element == item.inicio);
                                        if (ya_agregado != null) {} else {
                                            objetoTracks.tracks.forEach(function(elemento) {
                                                if (elemento.idtrack == item.idtrack) {
                                                    colorTrack = elemento.color;
                                                }
                                            });

                                            let iguales = listTresSessions.filter(element => element.inicio == item.inicio);
                                            contenido = contenido + `<div class="session_item_row"><div class="session_item_contenido unico">` + item.contenido + `</div></div>`;
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

                            function abrirDetalle(idsesion) {
                                $('#contenido_programa').addClass('d-none');
                                $('#contenido_programa').removeClass('d-block');

                                $('.box_atras').addClass('d-block');
                                $('.box_atras').removeClass('d-none');

                                switch (idsesion) {
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

                            function cerrarDetalle() {
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
