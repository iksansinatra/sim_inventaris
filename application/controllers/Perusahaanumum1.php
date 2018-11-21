<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perusahaanumum1 extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("M_perusahaanumum1");
        $this->load->helper(array('form', 'url'));

    }

    public function index(){
      if(!($this->session->userdata('user_id'))){
          $this->load->view("login");
      }else{
        $data['user_id']=$this->session->userdata('group_id');
          $data['perusahaanumum1']=$this->M_perusahaanumum1->tampil_data_perusahaanumum1();
          $this->load->view("attribute/header");
          $this->load->view("attribute/menus",$data);
          $this->load->view("perusahaanumum1",$data);
          $this->load->view("attribute/footer");
      }
    }
public function input() {
       $this->load->library('upload');
       $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
       $config['upload_path'] = './assets/perusahaanumum1/'; //path folder
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
       // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv"; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = '1024000'; //maksimum besar file 2M
       // $config['max_width']  = '9999'; //lebar maksimum 1288 px
       // $config['max_height']  = '9999'; //tinggi maksimu 768 px
       $config['file_name'] = $nmfile; //nama yang terupload nantinya

       $this->upload->initialize($config);

       if($_FILES['perusahaanumum1_file']['name'])
        {
            if ($this->upload->do_upload('perusahaanumum1_file'))
            {
                $gbr = $this->upload->data();
                $data = array(
               
        'perusahaanumum1_file' =>$gbr['file_name'],
                  'perusahaanumum1_name' =>$this->input->post('perusahaanumum1_name'),
          'perusahaanumum1_input' =>$this->input->post('perusahaanumum1_input'),
          'perusahaanumum1_verifikasi' =>$this->input->post('perusahaanumum1_verifikasi'),
          'perusahaanumum1_satuan' =>$this->input->post('perusahaanumum1_satuan'),
          'perusahaanumum1_sumber' =>$this->input->post('perusahaanumum1_sumber'),
                    );
                $this->M_perusahaanumum1->input($data);
            }
        }

        else
        {
        $data['perusahaanumum1_name'] = $this->input->post('perusahaanumum1_name');
        $data['perusahaanumum1_input'] = $this->input->post('perusahaanumum1_input');
        $data['perusahaanumum1_verifikasi'] = $this->input->post('perusahaanumum1_verifikasi');
        $data['perusahaanumum1_satuan'] = $this->input->post('perusahaanumum1_satuan');
        $data['perusahaanumum1_sumber'] = $this->input->post('perusahaanumum1_sumber');
        $data['perusahaanumum1_file'] = $this->input->post('perusahaanumum1_file');

        //call function
        $this->M_perusahaanumum1->input($data);
        //redirect to page

      }
          redirect('perusahaanumum1'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function edit() {
      
        //get data
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/perusahaanumum1/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
        // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv";
        $config['max_size'] = '1024000'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if($_FILES['perusahaanumum1_file']['name'])
         {
          unlink('./assets/perusahaanumum1/'.$this->input->post('perusahaanumum1_file'));
             if ($this->upload->do_upload('perusahaanumum1_file'))
             {
                 $gbr = $this->upload->data();
                 $data = array(
        'perusahaanumum1_id' =>$this->input->post('perusahaanumum1_id'),
        'perusahaanumum1_file' =>$gbr['file_name'],
                 'perusahaanumum1_name' =>$this->input->post('perusahaanumum1_name'),
                 'perusahaanumum1_input' =>$this->input->post('perusahaanumum1_input'),
                 'perusahaanumum1_verifikasi' =>$this->input->post('perusahaanumum1_verifikasi'),
                 'perusahaanumum1_satuan' =>$this->input->post('perusahaanumum1_satuan'),
                 'perusahaanumum1_sumber' =>$this->input->post('perusahaanumum1_sumber'),
                     );
                 $this->M_perusahaanumum1->edit($data);
             }
         }

         else
         {
           $data['perusahaanumum1_id'] = $this->input->post('perusahaanumum1_id');
           $data['perusahaanumum1_name'] = $this->input->post('perusahaanumum1_name');
           $data['perusahaanumum1_input'] = $this->input->post('perusahaanumum1_input');
           $data['perusahaanumum1_verifikasi'] = $this->input->post('perusahaanumum1_verifikasi');
           $data['perusahaanumum1_satuan'] = $this->input->post('perusahaanumum1_satuan');
           $data['perusahaanumum1_sumber'] = $this->input->post('perusahaanumum1_sumber');
           $data['perusahaanumum1_file'] = $this->input->post('perusahaanumum1_file');
         //call function
         $this->M_perusahaanumum1->edit($data);
         //redirect to page

        }
           redirect('perusahaanumum1'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function delete() {

            unlink('./assets/perusahaanumum1/'.$this->input->post('perusahaanumum1_file'));
            $this->M_perusahaanumum1->delete($this->input->post('perusahaanumum1_id'));
        redirect('perusahaanumum1');

    }
}
?>
