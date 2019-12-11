<?php

defined('BASEPATH') or exit('No direct script access allowed');
                        
    class Movie_model extends CI_Model
    {
        public function get_featured_movie($limit = 1)
        {
            return $this->db->select("*")->order_by('movie_id desc')->limit($limit)->get_where("movie", ['featured'=>1])->row();
        }

        public function get_poster_url($type = '', $id = '')
        {
            if (file_exists("assets/global/$type"."_poster/$id.jpg")) {
                $image_url = base_url("assets/global/$type"."_poster/$id.jpg");
            } else {
                $image_url = base_url('assets/global/placeholder.jpg');
            }

            return $image_url;
        }

        public function get_thumb_url($type = '', $id = '')
        {
            if (file_exists('assets/global/'.$type.'_thumb/' . $id . '.jpg')) {
                $image_url = base_url() . 'assets/global/'.$type.'_thumb/' . $id . '.jpg';
            } else {
                $image_url = base_url() . 'assets/global/placeholder.jpg';
            }

            return $image_url;
        }

        public function get_movies($genre_id="", $limit = null, $offset = 0)
        {
            if ($genre_id == "") {
                return $this->db->order_by('movie_id', 'desc')->get("movie")->result_array();
            }
            $this->db->order_by('movie_id', 'desc');
            $query = $this->db->get_where('movie', ['genre_id'=> $genre_id], $limit, $offset);
            return $query->result();
        }

        public function get_movie($movie_id)
        {
            return $this->db->get_where('movie', ['movie_id'=> $movie_id])->row();
        }

        public function delete_movie($movie_id)
        {
            $poster = "./assets/global/movie_poster/$movie_id.jpg";
            $thumb = "./assets/global/movie_poster/$movie_id.jpg";
            file_exists($poster)? unlink($poster):"";
            file_exists($thumb)? unlink($thumb):"";
            if ($this->db->delete('movie', array('movie_id' => $movie_id))) {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Movie Deleted')</script>");
            } else {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','Could not delete movie at the moment')</script>");
            }
        }

        public function update_movie($movie_id)
        {
            $data['title']				=	$this->input->post('title');
            $data['description_short']	=	$this->input->post('description_short');
            $data['description_long']	=	$this->input->post('description_long');
            $data['year']				=	$this->input->post('year');
            $data['rating']				=	$this->input->post('rating');
            $data['genre_id']			=	$this->input->post('genre_id');
            $data['featured']			=	$this->input->post('featured');
            $data['url']				=	$this->input->post('url');
            $data['trailer_url']  		=	$this->input->post('trailer_url');
            $data['director']			=	$this->input->post('director');

            $actors						=	$this->input->post('actors');
            $actor_entries				=	array();
            $number_of_entries			=	sizeof($actors);
            for ($i = 0; $i < $number_of_entries ; $i++) {
                array_push($actor_entries, $actors[$i]);
            }
            $data['actors']				=	json_encode($actor_entries);
            if ($this->custom_file_uploader->run("poster", "./assets/global/movie_poster", "poster", "$movie_id.jpg", true, "./assets/global/movie_thumb")) {
                $this->db->update('movie', $data, array('movie_id'=>$movie_id));
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Movie Updated')</script>");
            }
        }

        public function create_movie()
        {
            $data['title']				=	ucwords($this->input->post('title'));
            $data['description_short']	=	$this->input->post('description_short');
            $data['description_long']	=	$this->input->post('description_long');
            $data['year']				=	$this->input->post('year');
            $data['rating']				=	$this->input->post('rating');
            $data['genre_id']			=	$this->input->post('genre_id');
            $data['featured']			=	$this->input->post('featured');
            $data['url']				=	$this->input->post('url');
            $data['trailer_url']  		=	$this->input->post('trailer_url');
            $data['director']			=	$this->input->post('director');

            $actors						=	$this->input->post('actors');
            $actor_entries				=	array();
            $number_of_entries			=	sizeof($actors);
            for ($i = 0; $i < $number_of_entries ; $i++) {
                array_push($actor_entries, $actors[$i]);
            }
            $data['actors']				=	json_encode($actor_entries);

            if ($this->db->insert('movie', $data)) {
                $movie_id = $this->db->insert_id();
                $this->custom_file_uploader->run("poster", "./assets/global/movie_poster", "poster", "$movie_id.jpg", true, "./assets/global/movie_thumb");
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Movie Added')</script>");
                return $movie_id;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem adding movie')</script>");
            return false;
        }

        function create_series(){
            $data['title']				=	ucwords($this->input->post('title'));
            $data['trailer_url']	=	$this->input->post('trailer_url');
            $data['description_short']	=	$this->input->post('description_short');
            $data['description_long']	=	$this->input->post('description_long');
            $data['year']				=	$this->input->post('year');
            $data['rating']				=	$this->input->post('rating');
            $data['genre_id']			=	$this->input->post('genre_id');
            $data['director']			=	$this->input->post('director');
            $actors						=	$this->input->post('actors');
            $actor_entries				=	array();
            $number_of_entries			=	sizeof($actors);
            for ($i = 0; $i < $number_of_entries ; $i++)
            {
                array_push($actor_entries, $actors[$i]);
            }
            $data['actors']				=	json_encode($actor_entries);
            if ($this->db->insert('series', $data)) {
                $series_id = $this->db->insert_id();
                $this->custom_file_uploader->run("poster", "./assets/global/series_poster", "poster", "$series_id.jpg", true, "./assets/global/series_thumb");
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Series Created')</script>");
                return $series_id;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem creating series')</script>");
            return false;
            
        }
        
        function update_series($series_id = '')
        {
            $data['title']				=	$this->input->post('title');
            $data['trailer_url']				=	$this->input->post('trailer_url');
            $data['description_short']	=	$this->input->post('description_short');
            $data['description_long']	=	$this->input->post('description_long');
            $data['year']				=	$this->input->post('year');
            $data['rating']				=	$this->input->post('rating');
            $data['genre_id']			=	$this->input->post('genre_id');
            $data['director']			=	$this->input->post('director');
            $actors						=	$this->input->post('actors');
            $actor_entries				=	array();
            $number_of_entries			=	sizeof($actors);
            for ($i = 0; $i < $number_of_entries ; $i++) {
                array_push($actor_entries, $actors[$i]);
            }
            $data['actors']				=	json_encode($actor_entries);

            if ($this->custom_file_uploader->run("poster", "./assets/global/series_poster", "poster", "$series_id.jpg", true, "./assets/global/series_thumb")) {
                $this->db->update('series', $data, array('series_id'=>$series_id));
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Series Updated')</script>");
            }
        }
        function get_seasons_of_series($series_id = '')
        {
            $this->db->order_by('season_id', 'desc');
            $this->db->where('series_id', $series_id);
            $query = $this->db->get('season');
            return $query->result_array();
        }

        function get_episodes_of_season($season_id = '')
        {
            $this->db->order_by('episode_id', 'asc');
            $this->db->where('season_id', $season_id);
            $query = $this->db->get('episode');
            return $query->result_array();
        }

        function create_episode($season_id){
            $data['title']			=	$this->input->post('title');
            $data['url']			=	$this->input->post('url');
            $data['season_id']		=	$season_id;

            if ($this->db->insert('episode', $data)) {
                $episode_id = $this->db->insert_id();
                $this->custom_file_uploader->run("thumb", "./assets/global/episode_thumb", "thumbnail", "$episode_id.jpg");
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Episode Created')</script>");
                return $episode_id;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem creating episode')</script>");
            return false;
            
        }

        function update_episode($episode_id,$season_id,$series_id){
            $data['title']			=	$this->input->post('title');
            $data['url']			=	$this->input->post('url');
            $data['season_id']		=	$season_id;

            if ($this->custom_file_uploader->run("thumb", "./assets/global/episode_thumb", "thumbnail", "$episode_id.jpg")) {
                $this->db->update('episode', $data, array('episode_id'=>$episode_id));
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Episode Updated')</script>");
                return true;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem updating episode')</script>");
            return false;
            
        }

        function get_episode_details_by_id($episode_id = "")
        {
            $episode_details = $this->db->get_where('episode', array('episode_id' => $episode_id))->row_array();
            return $episode_details;
        }



        public function get_genre($genre_id="", $field = "")
        {
            if ($field == "" && $genre_id == "") {
                return $this->db->order_by('genre_id', 'desc')->get('genre')->result();
            }
            return $this->db->get_where('genre', ['genre_id'=>$genre_id])->row()->$field;
        }
        

        public function get_director($director_id = "", $field = "")
        {
            if ($field == "" && $director_id == "") {
                return $this->db->order_by('director_id', 'desc')->get('director')->result();
            }
            return $this->db->get_where('director', ['director_id'=>$director_id])->row()->$field;
        }

        public function create_director()
        {
            if ($this->db->insert('director', ['name'=>ucwords($this->input->post('name'))])) {
                $director_id = $this->db->insert_id();
                $this->custom_file_uploader->run("director_thumb", "./assets/global/director", "thumbnail", "$director_id.jpg");
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Director Added')</script>");
                return $director_id;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem adding director')</script>");
            return false;
        }
        
        public function update_director($director_id = '')
        {
            if ($this->custom_file_uploader->run("director_thumb", "./assets/global/director", "thumbnail", "$director_id.jpg")) {
                $this->db->update('director', ['name'=>ucwords($this->input->post('name'))], ['director_id'=>$director_id]);
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Director Updated')</script>");
            }
        }

        public function delete_director($director_id)
        {
            $thumb = "./assets/global/director/$director_id.jpg";
            file_exists($thumb)? unlink($thumb):"";
            if ($this->db->delete('director', array('director_id' => $director_id))) {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Director Deleted')</script>");
            } else {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','Could not delete director at the moment')</script>");
            }
        }

        public function get_actor($actor_id = "", $field = "")
        {
            if ($field == "" && $actor_id == "") {
                return $this->db->order_by('actor_id', 'desc')->get('actor')->result();
            }
            return $this->db->get_where('actor', ['actor_id'=>$actor_id])->row()->$field;
        }

        function create_actor()
        {
            if ($this->db->insert('actor', ['name'=>ucwords($this->input->post('name'))])) {
                $actor_id = $this->db->insert_id();
                $this->custom_file_uploader->run("actor_thumb", "./assets/global/actor", "thumbnail", "$actor_id.jpg");
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Actor Added')</script>");
                return $actor_id;
            }
            $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','There was a problem adding actor')</script>");
            return false;   
        }

        function update_actor($actor_id)
        {
            if ($this->custom_file_uploader->run("actor_thumb", "./assets/global/actor", "thumbnail", "$actor_id.jpg")) {
                $this->db->update('actor', ['name'=>ucwords($this->input->post('name'))], ['actor_id'=>$actor_id]);
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Actor Updated')</script>");
            }

        }
        public function delete_actor($actor_id)
        {
            $thumb = "./assets/global/actor/$actor_id.jpg";
            file_exists($thumb)? unlink($thumb):"";
            if ($this->db->delete('actor', array('actor_id' => $actor_id))) {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','success','','Actor Deleted')</script>");
            } else {
                $this->session->set_flashdata('notification', "<script>UIManager.showAlert('toastr','error','','Could not delete actor at the moment')</script>");
            }
        }

        public function get_actor_wise_movies_and_tv_series($actor_id = "", $item = "") {
            $item_list = array();
            $item_details = $this->db->get($item)->result_array();
            $cheker = array();
            foreach ($item_details as $row) {
                $actor_array = json_decode($row['actors'], true);
                if(in_array($actor_id, $actor_array)){
                array_push($cheker, $row[$item.'_id']);
                }
            }

            if (count($cheker) > 0) {
                $this->db->where_in($item.'_id', $cheker);
                $item_list = $this->db->get($item)->result_array();
            }
            return $item_list;
        }
	



        public function get_series($genre_id = "", $limit = null, $offset = 0){
            if($genre_id == ""){
                return $this->db->get('series')->result_array();
            }
            $this->db->order_by('series_id', 'desc');
            $query = $this->db->get_where('series', ['genre_id'=> $genre_id], $limit, $offset);
            return $query->result();
        }

        public function get_search_result($search_key = '', $limit = 0, $offset = 0)
        {
            $result = [];
            $movie = $this->db->like('title', $search_key)->get("movie")->result_array();
            $series = $this->db->like('title', $search_key)->get("series")->result_array();
            foreach ($movie as $key) {
                $key['type'] = "movie";
                array_push($result, $key);
            }
            foreach ($series as $key) {
                $key['type'] = "series";
                array_push($result, $key);
            }
            return array_slice($result, $offset, $limit);
        }


        public function get_mylist($type = '')
        {
            // Getting the active user and user account id
            $active_user 	=	$this->session->userdata('active_user');

            // Choosing the list between movie and series
            if ($type == 'movie') {
                $list_field	=	$active_user.'_movielist';
            } elseif ($type == 'series') {
                $list_field	=	$active_user.'_serieslist';
            }

            // Getting the list
            $my_list	=	$this->user_model->get_current_user_detail($list_field);
            if ($my_list == '' || $my_list == null) {
                $my_list = '[]';
            }
            $my_list_array	=	json_decode($my_list);

            return $my_list_array;
        }

        public function check_in_mylist($type ='', $id = '')
        {
            // Getting the active user and user account id
            $active_user 	=	$this->session->userdata('active_user');

            // Choosing the list between movie and series
            if ($type == 'movie') {
                $list_field	=	$active_user.'_movielist';
            } else {
                $list_field	=	$active_user.'_serieslist';
            }
            // Getting the list
            $my_list	=	$this->user_model->get_current_user_detail($list_field);
            if ($my_list == '' || $my_list == null) {
                $my_list = '[]';
            }
            $my_list_array	=	json_decode($my_list);

            // Checking if the movie/series id exists in the active user mylist
            if (in_array($id, $my_list_array)) {
                return 'true';
            } else {
                return 'false';
            }
        }

        public function update_my_list($type='', $task='', $id='')
        {
            // Getting the active user and user account id
            $active_user 	=	$this->session->userdata('active_user');

            // Choosing the list between movie and series
            if ($type == 'movie') {
                $list_field	=	$active_user.'_movielist';
            } elseif ($type == 'series') {
                $list_field	=	$active_user.'_serieslist';
            }


            // Getting the old list
            $old_list	=	$this->user_model->get_current_user_detail($list_field);
            if ($old_list == null || $old_list == "") {
                $old_list = '[]';
            }
            $old_list_array	=	json_decode($old_list);

            // Adding the new element to old list
            if ($task == 'add') {
                if (!in_array($id, $old_list_array)) {
                    array_push($old_list_array, $id);
                }
                $new_list	=	json_encode($old_list_array);
            }

            //Delete the submitted element from old list
            elseif ($task == 'delete') {
                if (in_array($id, $old_list_array)) {
                    $key	=	array_search($id, $old_list_array);
                    unset($old_list_array[$key]);
                }
                $new_list_array	=	array_values($old_list_array);
                $new_list	=	json_encode($new_list_array);
            }

            // Push back the new list to old place and update db table
            $this->db->update('user', [$list_field => $new_list], ['user_id' => $this->session->userdata('user_id')]);
        }

        public function get_actor_image_url($id = '')
        {
            if (file_exists("assets/global/actor/$id.jpg")) {
                $image_url = base_url("assets/global/actor/$id.jpg");
            } else {
                $image_url = base_url('assets/global/no_image.jpg');
            }
            return $image_url;
        }

        public function get_director_image_url($id = '')
        {
            if (file_exists("assets/global/director/$id.jpg")) {
                $image_url = base_url("assets/global/director/$id.jpg");
            } else {
                $image_url = base_url('assets/global/no_image.jpg');
            }
            return $image_url;
        }
    }
                        
/* End of file Movie_model.php */

