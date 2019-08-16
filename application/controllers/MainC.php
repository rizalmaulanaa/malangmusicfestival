  <?php

class MainC extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MainM');
    }

    public function index() {
        $data['gagal'] = false;
        $data['masuk'] = false;
        $this->load->view('signinuser', $data);
    }

    public function verif($table) {
        $username = $this->input->post('username');
        $cek = $this->MainM->cek_login($table);
        if ($cek > 0) {
            if ($table == 'admin') {
                $data_session = array(
                    'nama' => $username,
                    'status' => "loginadmin"
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('homeadmin'));
            } else {
                $data_session = array(
                    'nama' => $username,
                    'status' => "loginuser"
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('homeuser'));
            }
        } else {
            if ($table == 'admin') {
                redirect(base_url('MainC/gagal/admin'));
            } else {
                redirect(base_url('MainC/gagal/user'));
            }
        }
    }

    public function gagal($table) {
        $data['gagal'] = true;
        $data['masuk'] = false;
        if ($table == "user") {
            $this->load->view('signinuser', $data);
        } else {
            $this->load->view('signinadmin', $data);
        }
    }

    public function tambahuser() {
        $cek = $this->MainM->daftar();
        if ($cek) {
            $data['masuk'] = true;
            $data['gagal'] = false;
            $this->load->view('signinuser', $data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function homeuser() {
        $data['saldo'] = $this->MainM->get_saldo();
        $posts = $this->MainM->get_event();
        $data['posts'] = $posts;
        $posts1 = $this->MainM->get_news();
        $data['posts1'] = $posts1;
        $posts2 = $this->MainM->get_voucher();
        $data['posts2'] = $posts2;
        $this->load->view('Homeuser', $data);
    }

    public function listevent() {
        $data = $this->MainM->get_listevent('user');
        $data['saldo'] = $this->MainM->get_saldo();
        $data['tes'] = true;
        $this->load->view('listevent', $data);
    }
    public function listnews() {
        $data = $this->MainM->get_listnews('user');
        $data['saldo'] = $this->MainM->get_saldo();
        $data['tes'] = true;
        $this->load->view('listnews', $data);
    }

    public function detaile($index) {
        $posts = $this->MainM->get_parevent($index);
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $posts;
        $this->load->view('detail_event', $data);
    }

    public function detailn($index) {
        $posts = $this->MainM->get_parnews($index);
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $posts;
        $this->load->view('detail_news', $data);
    }

    public function profile(){
        $user = $this->session->userdata('nama');
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $this->MainM->get_user($user);
        $data['posts1'] = $this->MainM->get_transaction($user);
        $this->load->view('profileuser',$data);
    }

    public function updateuser(){
        $cek = $this->MainM->updateu();
        if ($cek) {
            redirect(base_url('profile'));
        }
    }

    public function update(){
        $user = $this->session->userdata('nama');
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $this->MainM->get_user($user);
        $this->load->view('updateuser',$data);
    }

    public function topup(){
        $data['saldo'] = $this->MainM->get_saldo();
        $this->load->view('topup',$data);
    }

    public function isitransfer(){
        $cek = $this->MainM->isitran();
        if ($cek) {
            redirect(base_url('profile'));
        }
    }

    public function invoice($index){
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $this->MainM->get_partrans($index);
        $this->load->view('invoice', $data);
    }

    public function search($table) {
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $this->MainM->get_search($table);
        $data['tes'] = false;
        if ($table=='event') {
            $this->load->view('listevent', $data);
        }else{
            $this->load->view('listnews', $data);
        }
    }

    public function searchadmin($table){
        $data['posts'] = $this->MainM->get_search($table);
        $data['tes'] = false;
        $data['hapus'] = false;
        if ($table=='event') {
            $this->load->view('hapusevent', $data);
        }else if($table=='berita'){
            $this->load->view('hapusnews', $data);
        }else if($table=='voucher'){
            $this->load->view('hapusvoucher', $data);
        }else{
            $data['saldo'] = $this->MainM->get_saldo();
            $this->load->view('verif',$data);
        }
    }

    public function tran($index) {
        $posts = $this->MainM->get_parevent($index);
        $data['saldo'] = $this->MainM->get_saldo();
        $data['posts'] = $posts;
        $posts2 = $this->MainM->get_voucher();
        $data['posts2'] = $posts2;
        $this->load->view('Transaction', $data);
    }

    public function sukses() {
        $cek = $this->MainM->pembelian();
        $data['cek'] = $cek;
        $data['saldo'] = $this->MainM->get_saldo();
        $this->load->view('Transactionafter', $data);
    }

    public function signup() {
        $data['gagal'] = false;
        $this->load->view('signup', $data);
    }

    public function signinadmin() {
        $data['gagal'] = false;
        $this->load->view('signinadmin', $data);
    }

    public function homeadmin() {
        $data['gagal']=false;
        $this->load->view('Homeadmin',$data);
    }

    public function verifikasi(){
        $data = $this->MainM->get_listverif();
        $data['saldo'] = $this->MainM->get_saldo();
        $data['tes'] = true;
        $this->load->view('verif', $data);
    }

    public function terverif($index){
        $cek = $this->MainM->verif($index);
        if ($cek) {
          $this->MainM->isisaldo($index);
          $data = $this->MainM->get_listverif();
          $data['saldo'] = $this->MainM->get_saldo();
          $data['tes'] = true;
          $this->load->view('verif', $data);
        }
    }

    public function tambahnews() {
        $this->load->view('tambahnews');
    }

    public function tambahevent() {
        $this->load->view('tambahevent');
    }

    public function tambahvoucher() {
        $this->load->view('tambahvoucher');
    }

    public function tambahe() {
        $cek = $this->MainM->isievent();
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function tambahberita() {
        $cek = $this->MainM->isiberita();
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function tambahv() {
        $cek = $this->MainM->isivoucher();
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        } else {
            redirect('', 'refresh');
        }
    }

    public function hapusnews() {
        $data = $this->MainM->get_listnews('admin');
        $data['tes'] = true;
        $data['hapus'] = false;
        $this->load->view('hapusnews', $data);
    }

    public function hapusevent() {
        $data = $this->MainM->get_listevent('admin');
        $data['tes'] = true;
        $data['hapus'] = false;
        $this->load->view('hapusevent', $data);
    }

    public function hapusvoucher() {
        $data = $this->MainM->get_listvoucher();
        $data['hapus'] = false;
        $data['tes'] = true;
        $this->load->view('hapusvoucher', $data);
    }

    public function hapussemua($table ,$index) {
        $cek = $this->MainM->hapus($table,$index);
        if ($cek) {
            if ($table=='berita') {
                $data = $this->MainM->get_listnews('admin');
                $data['tes'] = true;
                $data['hapus'] = true;
                $this->load->view('hapusnews',$data);
            }else if($table=='event'){
                $data = $this->MainM->get_listevent('admin');
                $data['tes'] = true;
                $data['hapus'] = true;
                $this->load->view('hapusevent',$data);
            }else if($table=='voucher'){
                $data['posts'] = $this->MainM->get_voucher();
                $data['hapus'] = true;
                $this->load->view('hapusvoucher',$data);
            }else{
                $data['posts'] = $this->MainM->get_transfer();
                $this->load->view('verif', $data);
            }
        } else {
            redirect(base_url('homeadmin'));
        }
    }

    public function updateevent($index){
        $data['posts'] = $this->MainM->get_parevent($index);
        $this->load->view('updateevent',$data);
    }

    public function updatenews($index){
        $data['posts'] = $this->MainM->get_parnews($index);
        $this->load->view('updatenews',$data);
    }

    public function updatevoucher($index){
        $data['posts'] = $this->MainM->get_parvoucher($index);
        $this->load->view('updatevoucher',$data);
    }

    public function updatee($index){
        $cek = $this->MainM->updateevent($index);
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        }
    }

    public function updaten($index){
        $cek = $this->MainM->updatenews($index);
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        }
    }

    public function updatev($index){
        $cek = $this->MainM->updatevoucher($index);
        if ($cek) {
            $data['gagal']=true;
            $this->load->view('homeadmin',$data);
        }
    }

    public function logout($table) {
        $this->session->sess_destroy();
        if ($table == 'admin') {
            redirect(base_url('signinadmin'));
        } else {
            redirect(base_url());
        }
    }
}
