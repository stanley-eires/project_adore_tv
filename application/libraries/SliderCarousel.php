<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class SliderCarousel{

        static function create_thumbnail($thumbnail_img,$thumbnail_title,$thumbnail_link,$play_icon="assets/img/Play.png",$size=''){
            return "<figure class='effect-sadie freelancer ".$size."'>
                        <img src='$thumbnail_img' alt='movie thumbnails adoretv' style='height:200px' class='img-fluid w-100 d-block shadow-sm'/> 
                        <figcaption class='w-100'>
                            <p>
                                <a href='$thumbnail_link' class='nav-link text-center'><img src='".base_url($play_icon)."' style='width:60px;'/>
                                    <span class='font-weight-bolder text-orange h6'>$thumbnail_title</span>
                                </a>
                            </p>
                        </figcaption>
                    </figure>";
        }

        static function _showCarouselSlide($row_title,$genre_id,$type='movie',$num_slide=6){
            $CI =&  get_instance();
            $CI->load->database();
            if($type == 'movie'){
                $data	= $CI->movie_model->get_movies($genre_id , $num_slide);
            }elseif($type == 'series'){
                $data	= $CI->movie_model->get_series($genre_id , $num_slide);
            }
            echo "<section class='row'>
			        <div class='col-12 d-flex justify-content-between align-items-center mb-0'>
                        <h3 class='fa-2x font-weight-lighter text-white'>$row_title</h3>
                        <a href=".base_url('browse/'.$type.'/'.$genre_id)." class='nav-link'>Browse Category</a>
                    </div>
                    <div class='col-12'>
                        <div class='default-slick-carousel'>";
                        if($type == "movie"){
                            foreach ($data as $row) {
                                $title	=	$row->title;
                                $link	=	base_url().'browse/playmovie/'.$row->movie_id;
                                $thumb	=	$CI->movie_model->get_thumb_url('movie', $row->movie_id);
                                echo SliderCarousel::create_thumbnail($thumb, $title, $link);
                            }
                        }elseif($type == "series"){
                            foreach ($data as $row){
                                $title	=	$row->title;
                                $link	=	base_url().'browse/playseries/'.$row->series_id;
                                $thumb	=	$CI->movie_model->get_thumb_url('series' , $row->series_id);
                                echo SliderCarousel::create_thumbnail($thumb,$title,$link);
                            }
                        }
                             
                    echo "</div>

                    </div>
                </section>";
        }

 

                            
                                
    }
