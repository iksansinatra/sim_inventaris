<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jembatan1 extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("M_jembatan1");
        $this->load->helper(array('form', 'url'));

    }

    public function index(){
      if(!($this->session->userdata('user_id'))){
          $this->load->view("login");
      }else{
        $data['user_id']=$this->session->userdata('group_id');
          $data['jembatan1']=$this->M_jembatan1->tampil_data_jembatan1();
          $this->load->view("attribute/header");
          $this->load->view("attribute/menus",$data);
          $this->load->view("jembatan1",$data);
          $this->load->view("attribute/footer");
      }
    }
public function input() {
       $this->load->library('upload');
       $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
       $config['upload_path'] = './assets/jembatan1/'; //path folder
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
       // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv"; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = '1024000'; //maksimum besar file 2M
       // $config['max_width']  = '9999'; //lebar maksimum 1288 px
       // $config['max_height']  = '9999'; //tinggi maksimu 768 px
       $config['file_name'] = $nmfile; //nama yang terupload nantinya

       $this->upload->initialize($config);

       if($_FILES['jembatan1_file']['name'])
        {
            if ($this->upload->do_upload('jembatan1_file'))
            {
                $gbr = $this->upload->data();
                $data = array(
               
        'jembatan1_file' =>$gbr['file_name'],
                  'jembatan1_name' =>$this->input->post('jembatan1_name'),
          'jembatan1_input' =>$this->input->post('jembatan1_input'),
          'jembatan1_verifikasi' =>$this->input->post('jembatan1_verifikasi'),
          'jembatan1_satuan' =>$this->input->post('jembatan1_satuan'),
          'jembatan1_sumber' =>$this->input->post('jembatan1_sumber'),
                    );
                $this->M_jembatan1->input($data);
            }
        }

        else
        {
        $data['jembatan1_name'] = $this->input->post('jembatan1_name');
        $data['jembatan1_input'] = $this->input->post('jembatan1_input');
        $data['jembatan1_verifikasi'] = $this->input->post('jembatan1_verifikasi');
        $data['jembatan1_satuan'] = $this->input->post('jembatan1_satuan');
        $data['jembatan1_sumber'] = $this->input->post('jembatan1_sumber');
        $data['jembatan1_file'] = $this->input->post('jembatan1_file');

        //call function
        $this->M_jembatan1->input($data);
        //redirect to page

      }
          redirect('jembatan1'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function edit() {
      
        //get data
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/jembatan1/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
        // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv";
        $config['max_size'] = '1024000'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if($_FILES['jembatan1_file']['name'])
         {
          unlink('./assets/jembatan1/'.$this->input->post('jembatan1_file'));
             if ($this->upload->do_upload('jembatan1_file'))
             {
                 $gbr = $this->upload->data();
                 $data = array(
        'jembatan1_id' =>$this->input->post('jembatan1_id'),
        'jembatan1_file' =>$gbr['file_name'],
                 'jembatan1_name' =>$this->input->post('jembatan1_name'),
                 'jembatan1_input' =>$this->input->post('jembatan1_input'),
                 'jembatan1_verifikasi' =>$this->input->post('jembatan1_verifikasi'),
                 'jembatan1_satuan' =>$this->input->post('jembatan1_satuan'),
                 'jembatan1_sumber' =>$this->input->post('jembatan1_sumber'),
                     );
                 $this->M_jembatan1->edit($data);
             }
         }

         else
         {
           $data['jembatan1_id'] = $this->input->post('jembatan1_id');
           $data['jembatan1_name'] = $this->input->post('jembatan1_name');
           $data['jembatan1_input'] = $this->input->post('jembatan1_input');
           $data['jembatan1_verifikasi'] = $this->input->post('jembatan1_verifikasi');
           $data['jembatan1_satuan'] = $this->input->post('jembatan1_satuan');
           $data['jembatan1_sumber'] = $this->input->post('jembatan1_sumber');
           $data['jembatan1_file'] = $this->input->post('jembatan1_file');
         //call function
         $this->M_jembatan1->edit($data);
         //redirect to page

        }
           redirect('jembatan1'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function delete() {

            unlink('./assets/jembatan1/'.$this->input->post('jembatan1_file'));
            $this->M_jembatan1->delete($this->input->post('jembatan1_id'));
        redirect('jembatan1');

    }
}
?>
