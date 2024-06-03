<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function index()
	{
        $data['pegawai']=$this->m_pegawai->tampil_data()->result();
        
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_pegawai',$data);	
		$this->load->view('template/footer');
	}
    public function tambah()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pegawai');	
		$this->load->view('template/footer');
	}
    public function tambah_aksi(){
        $nip =$this->input->post('nip');
        $nama =$this->input->post('nama');
        $tgl_lahir =$this->input->post('tgl_lahir');
        $alamat =$this->input->post('alamat');
        $no_telp =$this->input->post('no_telp');
        $foto = $_FILES['foto'];
        if($foto=''){}else{
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nip'=>$nip,
            'nama'=>$nama,
            'tgl_lahir'=>$tgl_lahir,
            'alamat'=>$alamat,
            'no_telp'=>$no_telp,
            'foto'=>$foto
        );
        $this->m_pegawai->input_data($data,'tb_pegawai');
        $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hnoden="true">&times;</span></button>
        Data Berhasil Ditambahkan.
      </div>');
        redirect('pegawai/index');
    }
    public function hapus($no){
        $where = array ('no' => $no);
        $this->m_pegawai->hapus_data($where,'tb_pegawai');
        $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hnoden="true">&times;</span></button>
        Data Berhasil Dihapus.
      </div>');
        redirect('pegawai/index');
    }
    public function detail($no){
        $this->load->model('m_pegawai');
        $detail = $this->m_pegawai->detail_data($no);
        $data['detail']=$detail;
        
        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('v_detail',$data);	
		$this->load->view('template/footer');
    }
    public function edit($no){
        $where = array ('no' => $no);
        $data['pegawai']=$this->m_pegawai->edit_data($where,'tb_pegawai')->result();

        $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('edit',$data);	
		$this->load->view('template/footer');
    }
    public function update(){
        $no =$this->input->post('no');
        $nip =$this->input->post('nip');
        $nama =$this->input->post('nama');
        $tgl_lahir =$this->input->post('tgl_lahir');
        $alamat =$this->input->post('alamat');
        $no_telp =$this->input->post('no_telp');
        $foto = $_FILES['foto'];
        if($foto=''){}else{
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('foto')){
                echo "Upload Gagal"; die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }

        $data = array(
            'nip'=>$nip,
            'nama'=>$nama,
            'tgl_lahir'=>$tgl_lahir,
            'alamat'=>$alamat,
            'no_telp'=>$no_telp,
            'foto'=>$foto
        );
        $where = array (
            'no' => $no
        );
        $this->m_pegawai->update_data($where, $data,'tb_pegawai');
        $this->session->set_flashdata('message','<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hnoden="true">&times;</span></button>
        Data Berhasil Diubah.
      </div>');
        redirect('pegawai/index');
    }
    public function print(){
		$data['pegawai']=$this->m_pegawai->tampil_data("tb_pegawai")->result();
		$this->load->view('print_pegawai',$data);
	}

    public function pdf1(){
        $this->load->library('pdf'); //Memanggil library
        error_reporting(0); // agar error versi pdf tidak muncul
        $pdf = new FPDF('P', 'mm', 'letter');
        $pdf -> AddPage();
        $pdf -> SetFont('Arial', 'B', 16);
        $pdf -> Cell(0,7,'DAFTAR PEGAWAI',0,1,'C');
        $pdf -> Cell(10,7,'',0,1);
        $pdf -> SetFont('Arial', 'B', 10);
        $pdf -> Cell(10,10,'No',1,0,'C');
        $pdf -> Cell(30,10,'NIP',1,0,'C');
        $pdf -> Cell(50,10,'Nama Pegawai',1,0,'C');
        $pdf -> Cell(30,10,'Tanggal Lahir',1,0,'C');
        $pdf -> Cell(50,10,'alamat',1,1,'C');
        $pdf -> SetFont('Arial','',10);

        $pegawai = $this->db->get('tb_pegawai')->result();
        $no=0;
        foreach($pegawai as $data){
            $no++;
            $pdf -> Cell(10,10,$no,1,0, 'C');
            $pdf -> Cell(30,10,$data->nip,1,0);
            $pdf -> Cell(50,10,$data->nama,1,0,);
            $pdf -> Cell(30,10,$data->tgl_lahir,1,0);
            $pdf -> Cell(50,10,$data->alamat,1,1);
        }
        $pdf -> Output();
    }

	public function exportexcel(){
		$data = $this->m_pegawai->getData();

		include_once APPPATH . '/third_party/xlsxwriter.class.php';
		ini_set('display_erorr', 0);
		ini_set('log_erorr', 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$filename = "report-".date('d-m-y-H-i-s').".xlsx";
		header('Content-disposition: attachmenet; filename="'.XLSXWriter:: sanitize_filename($filename). '"');
		header('Content-Type: application/vnd.openxmlformats-officedocument._spreadsheetml.sheet');
		header('Content-Tranfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		$styles = array ('widths'=>[3,20,30,40], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold','fill'=>'#eee','halign'=>'center','border'=>'left,right,top,bottom' );
		$styles2 = array( ['font'=>'Arial','font-size'=>10, 'font-style' =>'bold','fill' =>'#eee',
		 'halign' => 'left', 'border'=> 'left,right,top,bottom','fill' =>'#ffc'],['fill' =>'#fcf'],[
		 'fill' =>'#ccf'],['fill' =>'#cff'],['fill' =>'#cff'],);

		 $header = array(
			'No' =>'integer',
			'NIP' =>'integer',
			'Nama Pegawai'=>'string',
			'Tanggal Lahir'=>'string',
			'Alamat'=>'string',
            'No Telepon'=>'integer',
		 );

		 $writer = new XLSXwriter();
		 $writer->setAuthor('Sustono');

		 $writer->writeSheetHeader('Sheet1', $header, $styles);
		 $no = 1;
		 foreach($data as $row){
			$writer->writeSheetRow('Sheet1', [$no, $row['nip'],$row['nama'],$row['tgl_lahir'],$row['alamat'],$row['no_telp']], $styles2);
			$no++;
		 }
		 $writer->writeToStdOut();
	}
}