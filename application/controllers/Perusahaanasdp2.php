<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perusahaanasdp2 extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("M_perusahaanasdp2");
        $this->load->helper(array('form', 'url'));

    }

    public function index(){
      if(!($this->session->userdata('user_id'))){
          $this->load->view("login");
      }else{
        $data['user_id']=$this->session->userdata('group_id');
          $data['perusahaanasdp2']=$this->M_perusahaanasdp2->tampil_data_perusahaanasdp2();
          $this->load->view("attribute/header");
          $this->load->view("attribute/menus",$data);
          $this->load->view("perusahaanasdp2",$data);
          $this->load->view("attribute/footer");
      }
    }
public function input() {
       $this->load->library('upload');
       $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
       $config['upload_path'] = './assets/perusahaanasdp2/'; //path folder
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
       // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv"; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = '1024000'; //maksimum besar file 2M
       // $config['max_width']  = '9999'; //lebar maksimum 1288 px
       // $config['max_height']  = '9999'; //tinggi maksimu 768 px
       $config['file_name'] = $nmfile; //nama yang terupload nantinya

       $this->upload->initialize($config);

       if($_FILES['perusahaanasdp2_file']['name'])
        {
            if ($this->upload->do_upload('perusahaanasdp2_file'))
            {
                $gbr = $this->upload->data();
                $data = array(
               
        'perusahaanasdp2_file' =>$gbr['file_name'],
                  'perusahaanasdp2_name' =>$this->input->post('perusahaanasdp2_name'),
          'perusahaanasdp2_input' =>$this->input->post('perusahaanasdp2_input'),
          'perusahaanasdp2_verifikasi' =>$this->input->post('perusahaanasdp2_verifikasi'),
          'perusahaanasdp2_satuan' =>$this->input->post('perusahaanasdp2_satuan'),
          'perusahaanasdp2_sumber' =>$this->input->post('perusahaanasdp2_sumber'),
                    );
                $this->M_perusahaanasdp2->input($data);
            }
        }

        else
        {
        $data['perusahaanasdp2_name'] = $this->input->post('perusahaanasdp2_name');
        $data['perusahaanasdp2_input'] = $this->input->post('perusahaanasdp2_input');
        $data['perusahaanasdp2_verifikasi'] = $this->input->post('perusahaanasdp2_verifikasi');
        $data['perusahaanasdp2_satuan'] = $this->input->post('perusahaanasdp2_satuan');
        $data['perusahaanasdp2_sumber'] = $this->input->post('perusahaanasdp2_sumber');
        $data['perusahaanasdp2_file'] = $this->input->post('perusahaanasdp2_file');

        //call function
        $this->M_perusahaanasdp2->input($data);
        //redirect to page

      }
          redirect('perusahaanasdp2'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function edit() {
      
        //get data
        $this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/perusahaanasdp2/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|docx|doc|xls|xlsx'; //type yang dapat diakses bisa anda sesuaikan
        // $config['allowed_types'] = "application/pdf|pdf|application/octet-stream|csv";
        $config['max_size'] = '1024000'; //maksimum besar file 2M
        // $config['max_width']  = '1288'; //lebar maksimum 1288 px
        // $config['max_height']  = '768'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);

        if($_FILES['perusahaanasdp2_file']['name'])
         {
          unlink('./assets/perusahaanasdp2/'.$this->input->post('perusahaanasdp2_file'));
             if ($this->upload->do_upload('perusahaanasdp2_file'))
             {
                 $gbr = $this->upload->data();
                 $data = array(
        'perusahaanasdp2_id' =>$this->input->post('perusahaanasdp2_id'),
        'perusahaanasdp2_file' =>$gbr['file_name'],
                 'perusahaanasdp2_name' =>$this->input->post('perusahaanasdp2_name'),
                 'perusahaanasdp2_input' =>$this->input->post('perusahaanasdp2_input'),
                 'perusahaanasdp2_verifikasi' =>$this->input->post('perusahaanasdp2_verifikasi'),
                 'perusahaanasdp2_satuan' =>$this->input->post('perusahaanasdp2_satuan'),
                 'perusahaanasdp2_sumber' =>$this->input->post('perusahaanasdp2_sumber'),
                     );
                 $this->M_perusahaanasdp2->edit($data);
             }
         }

         else
         {
           $data['perusahaanasdp2_id'] = $this->input->post('perusahaanasdp2_id');
           $data['perusahaanasdp2_name'] = $this->input->post('perusahaanasdp2_name');
           $data['perusahaanasdp2_input'] = $this->input->post('perusahaanasdp2_input');
           $data['perusahaanasdp2_verifikasi'] = $this->input->post('perusahaanasdp2_verifikasi');
           $data['perusahaanasdp2_satuan'] = $this->input->post('perusahaanasdp2_satuan');
           $data['perusahaanasdp2_sumber'] = $this->input->post('perusahaanasdp2_sumber');
           $data['perusahaanasdp2_file'] = $this->input->post('perusahaanasdp2_file');
         //call function
         $this->M_perusahaanasdp2->edit($data);
         //redirect to page

        }
           redirect('perusahaanasdp2'); //jika berhasil maka akan ditampilkan view vupload
    }

    public function delete() {

            unlink('./assets/perusahaanasdp2/'.$this->input->post('perusahaanasdp2_file'));
            $this->M_perusahaanasdp2->delete($this->input->post('perusahaanasdp2_id'));
        redirect('perusahaanasdp2');

    }
}
?>
