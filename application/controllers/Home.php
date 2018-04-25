<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data['featured'] = $this->Kontrakan->getFeatured();
	    if($this->User->ceksession() == true){
	        $data['session'] = true;
            $data['iduser']=$this->session->userdata('idpengguna');
	        $data['nama'] = $this->session->userdata('namalengkap');
            $this->load->view('home',$data);
        }else{
            $this->load->view('home',$data);
        }
	}

	public function regis()
	{
		$this->load->view('register');
	}

	public function detail(){
		$data['nama']=$this->session->userdata('nama');
		$id_rmh=$this->uri->segment(2);
		$details=$this->Kontrakan->getRumah($id_rmh);
		$data['details']=$details;
		 if($this->User->ceksession() == true){
			 $data['session'] = true;
			 $data['nama'] = $this->session->userdata('nama');
			 $this->load->view('detailrumah',$data);
		 }else{
			 $this->load->view('detailrumah',$data);
		 }

	}
	public function Agents(){
        if($this->User->ceksession() == true) {
            $data['session'] = true;
            $data['iduser'] = $this->session->userdata('idpengguna');
            $data['nama'] = $this->session->userdata('namalengkap');
            $this->load->view('agents',$data);
        }else{
            $this->load->view('agents');
        }
    }
	public function About(){
        if($this->User->ceksession() == true) {
            $data['session'] = true;
            $data['iduser'] = $this->session->userdata('idpengguna');
            $data['nama'] = $this->session->userdata('namalengkap');
            $this->load->view('about',$data);
        }else{
            $this->load->view('about');
        }
    }
	public function Contact(){
        if($this->User->ceksession() == true) {
            $data['session'] = true;
            $data['iduser'] = $this->session->userdata('idpengguna');
            $data['nama'] = $this->session->userdata('namalengkap');
            $this->load->view('contact',$data);
        }else{
            $this->load->view('contact');
        }
    }
}
