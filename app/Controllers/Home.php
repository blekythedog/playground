<?php



namespace App\Controllers;

use App\Models\M_model;
use Dompdf\Dompdf;


class Home extends BaseController
{
    public function index()
    {
        if(session()->get('level') > 0)
        {
            echo view ('header');
            echo view ('menu');
            echo view ('dashboard');
            echo view ('footer');
        } else{
            return redirect()->to('home/login');
        }
    }

    public function login()
    {
        echo view ('login');
    }

    public function aksi_login()
    {
        $model = new M_model();
        $a = $this->request->getPost('username');
        $b = $this->request->getPost('password');

        $isi = array(
            'username' => $a,
            'password' => md5($b)
        );
        $cek = $model->getWhere2('user', $isi);
        if ($cek > 0) {
            session()->set('id_user', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('level', $cek['level']);
            return redirect()->to('home/dashboard');
        } else {
            return redirect()->to('home/login');
        }
    }

    public function dashboard()
    {
        echo view ('header');
        echo view ('menu');
        echo view ('dashboard');
        echo view ('footer');
    }

    public function user()
    {
        echo view ('header');
        echo view ('menu');
        echo view ('user');
        echo view ('footer');
    }

    public function t_daftar()
    {
        $model = new M_model();
        $data['dtpngjng'] = $model->use('Select id_pengunjung, pengunjung from pengunjung');
        $data['dtwahana'] = $model->use('Select id, namawahana from wahana');
        echo view ('header');
        echo view ('menu');
        echo view ('t_daftar',$data);
        echo view ('footer');
    }

    public function t_pengunjung()
    {
        $model = new M_model();
        echo view ('header');
        echo view ('menu');
        echo view ('t_pengunjung');
        echo view ('footer');
    }


    public function daftar()
    {
        $model = new M_model();
        $data['dt'] = $model->tampil('pengunjung');
        echo view ('header');
        echo view ('menu');
        echo view ('pengunjung',$data);
        echo view ('footer');
    }

    
    public function pengunjung()
    {
        $model = new M_model();
        $data['dt'] = $model->use('Select * from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung;');

        echo view ('header');
        echo view ('menu');
        echo view ('daftar',$data);
        echo view ('footer');
    }


    public function p_daftar()
    {
        $model = new M_model();
        $a = $this->request->getPost('pengunjung');
        $b = $this->request->getPost('nama_ortu');
        $c = $this->request->getPost('alamat_ortu');
        $d = $this->request->getPost('no_hp');

        $data = array(
            'pengunjung' => $a,
            'nama_ortu' => $b,
            'no_hp' => $d,
            'alamat_ortu' => $c
        );
        $model->simpan('pengunjung', $data);
        return redirect()->to('home/daftar');

    }

    public function p_pengunjung()
    {
        $model = new M_model();
        $pen = $this->request->getPost('selPeng');
        $whn = $this->request->getPost('selWahana');
        $jam = $this->request->getPost('selJam');

        $data = array(
            'id_pengunjung' => $pen,
            'id_wahana' => $whn,
            'jam' => $jam,
            'status' => 1,
            'inputBy' => session('id_user'),
            'inputDate' => date('Y-m-d H:i:s', time())
        );
        $id = $model->simpan('daftar', $data);
        return redirect()->to('home/addtrans/'.$id);

    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home/login');
    }

    public function addtrans($id){
        $model = new M_model;
        $data['dt'] = $model->use("Select *,d.id as idd from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung having idd = '{$id}';");
        echo view('header');
        echo view('menu');
        echo view('addtrans',$data);
        echo view('footer');
    }

    public function main(){
        $model = new M_model;
        $data['dt'] = $model->use('Select * from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung where status = 2');

        echo view('header');
        echo view('menu');
        echo view('mainlist',$data);
        echo view('footer');
    }

    public function FinishTrans($id){
        $model = new M_model;
        $dt = array('status' => 3);
        $whr = array('id'=>$id);
        $model->edit('daftar',$dt, $whr);
        return redirect()->to('/Home/main');
    }

    public function printData($id){
        $model = new M_model;
        $dft = $model->use('Select * from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung;');
        $byr =  $model->use("Select * from bayar where id_transaksi = '{$id}'");
        $data['dt'] = array(
            'id' => $dft[0]->id,
            'NamaPengunjung' => $dft[0]->pengunjung,
            'NamaWahana' => $dft[0]->namawahana,
            'Jam' => $dft[0]->jam,
            'Amount' => $dft[0]->jam * 10000,
            'Bayar' => $byr[0]->bayar,
            'Kembalian' => ($dft[0]->jam * 10000) - $byr[0]->bayar,
            'InputDate' => $dft[0]->inputDate,
        );

        echo view("struk",$data);
    }

    public function pb_trans(){
        $model = new M_model;
        $id = $_POST['id'];
        $bayar = $_POST['bayar'];
        $dtb = array(
            'bayar' => $bayar,
            'id_transaksi' => $id,
        );
        $model->input('bayar',$dtb);

        $dth = array(
            'status' => 2
        );
        $whrh = array(
            'id' => $id
        );
        $model->edit('daftar',$dth, $whrh);
        echo json_encode('success');
    }

    public function laporanHarian(){
        $model = new M_model;
        $xdate = date('Y-m-d', time());
        $data['dt'] = $model->use("Select *,d.id idd from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung where Date(inputDate) = '{$xdate}' and status in(2,3) ;");
        // echo  $model->use("Select * from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung where Date(inputDate) = '{$xdate}' ;",true);
        echo view('header');
        echo view('menu');
        echo view('laporanharian',$data);
        echo view('footer');        
    }
    
    public function FilterlaporanHarian(){
        $model = new M_model;
        $date = $this->request->getPost('dt');
        $xdate = date('Y-m-d', strtotime($date));
        $data['dt'] = $model->use("Select *,d.id idd from daftar d left join wahana w on d.id_wahana = w.id_wahana_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung where Date(inputDate) = '{$xdate}' ;");
        // echo  $model->use("Select * from daftar d left join wahana w on d.id_wahana = w.id_wahana left join pengunjung p on d.id_pengunjung = p.id_pengunjung where Date(inputDate) = '{$xdate}' ;",true);
        echo view('header');
        echo view('menu');
        echo view('laporanharian',$data);
        echo view('footer');        
    }

    public function delete_pengunjung($id)
    {
        $model = new M_model();
        $where = array('id_pengunjung' => $id);
        $where2 = array('id_pengunjung' => $id);
        $model->hapus('pengunjung', $where);
        $model->hapus('daftar', $where2);
        return redirect()->to('home/daftar');
    }

    public function delete_main($id)
    {
        $model = new M_model();
        $where = array('id_pengunjung' => $id);
        $model->hapus('pengunjung', $where);
        return redirect()->to('home/pengunjung');
    }

    public function print_pdf()
    {
        // if(session()->get('level')== 2 ||session()->get('level')==4 ) {

        $model = new M_model();
        $data['dt'] = $model->filter_harian('pengunjung');
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\koperasi-simpan-pinjam\public\images\ksp.png');

        // $kui['user'] = base64_encode($img);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml(view('header'));
        $dompdf->loadHtml(view('view_pdf', $data));
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment' => 0));

    }
}
