<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
    class VideoPlayer {

        static function play_video($url,$poster=""){
            $source = VideoPlayer::get_video_source($url);
            switch ($source) {
                case 'youtube':
                    return VideoPlayer::display_youtube_player($url);
                    break;

                case 'vimeo':
                    return VideoPlayer::display_vimeo_player($url);
                    break;
                
                default:
                    return VideoPlayer::display_html_player($url,$poster);
                   
            }
        }

        static function get_video_source($url=""){
            $host = parse_url($url)['host'];
            if(stripos($host,"youtu.be") || stripos($host,"youtube")){
                return "youtube";
            }
            elseif(stripos($host,"vimeo")){
                return "vimeo";
            }
            else{
                return "html";
            }

        }



       static function display_youtube_player($url){
           return "<div class='plyr__video-embed' id='player'>
                <iframe class='movie_player' src='".$url."?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1' allowfullscreen allowtransparency allow='autoplay'></iframe>
            </div>";
        }

        static function display_vimeo_player($url){
           return "<div class='plyr__video-embed' id='player'>
                <iframe class='movie_player' src='".$url."?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media' allowfullscreen allowtransparency allow='autoplay'></iframe>
            </div>";
        }

        static function display_html_player($url,$poster){
            $_url = explode("/",parse_url($url)['path'],0)[0];
            $new_url = base_url($_url);
            return "<video class='w-100' poster='$poster' id='player' playsinline controls crossorigin muted style='min-height:100%;max-height:80vh' src='$new_url'>
			</video>";
        }


 

                            
                                
    }
