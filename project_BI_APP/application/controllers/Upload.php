<?php
/**
 * Created by PhpStorm.
 * User: Mats
 * Date: 8/05/2019
 * Time: 11:19
 */

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Extras/Nieuwsbericht_model', 'nieuwsbericht_model');
        $this->load->helper('notation');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $config['upload_path']          = './Ampps/www/zwembad/team14/project_BI_APP/application/images/nieuwsberichten/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'nieuwsberichten_beheren/upload_form',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $partials = array('hoofding' => 'main_header',
                'inhoud' => 'nieuwsberichten_beheren/upload_success',
                'footer' => 'main_footer');

            $this->template->load('main_master', $partials, $data);
        }
    }
}