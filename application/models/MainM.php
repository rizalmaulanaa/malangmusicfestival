<?php

class MainM extends CI_Model {

    public function cek_login($table) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($table == 'user') {
            $where = array(
                'uname_User' => $username,
                'pass_user' => $password
            );
        } else {
            $where = array(
                'uname_ADM' => $username,
                'pass_ADM' => $password
            );
        }
        return $this->db->get_where($table, $where)->num_rows();
    }

    public function daftar() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $saldo = "0";
        $where = array(
            'uname_User' => $username,
            'email_User' => $email,
            'pass_user' => $password,
            'saldo_user' => $saldo
        );
        return ($this->db->insert('user', $where) != 1) ? false : true;
    }

    public function get_saldo() {
        $username = $this->session->userdata('nama');
        $where = array('uname_User' => $username);
        $this->db->select('saldo_user');
        $user = $this->db->get_where('user', $where)->result();
        $saldoo = "";
        foreach ($user as $row) {
            $saldoo = $row->saldo_user;
        }
        return $saldoo;
    }

    public function get_event() {
        return $this->db->query('SELECT * FROM event')->result();
    }

    public function get_news() {
        return $this->db->query('SELECT * FROM berita')->result();
    }

    public function get_listevent($who) {
        $this->load->library('pagination');
        if ($who == 'user') {
            $config['base_url'] = base_url('MainC/listevent');
        } else {
            $config['base_url'] = base_url('MainC/hapusevent');
        }
        $config['total_rows'] = $this->db->get('event')->num_rows();
        $config['per_page'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['posts'] = $this->db->get('event', $config['per_page'], $from)->result();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_listnews($who) {
        $this->load->library('pagination');
        if ($who == 'user') {
            $config['base_url'] = base_url('MainC/listnews');
        } else {
            $config['base_url'] = base_url('MainC/hapusnews');
        }
        $config['total_rows'] = $this->db->get('berita')->num_rows();
        $config['per_page'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['posts'] = $this->db->get('berita', $config['per_page'], $from)->result();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_listverif() {
        $this->load->library('pagination');
        $config['base_url'] = base_url('MainC/verifikasi');
        $this->db->where('verif', 0);
        $config['total_rows'] = $this->db->get('transfer')->num_rows();
        $config['per_page'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $this->db->where('verif', 0);
        $data['posts'] = $this->db->get('transfer', $config['per_page'], $from)->result();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_listvoucher() {
        $this->load->library('pagination');
        $config['base_url'] = base_url('MainC/hapusvoucher');
        $config['total_rows'] = $this->db->get('voucher')->num_rows();
        $config['per_page'] = 4;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['posts'] = $this->db->get('voucher', $config['per_page'], $from)->result();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_search($table) {
        $cari = $this->input->GET('search', TRUE);
        if ($table == 'event') {
            $this->db->like('nama_event', $cari);
        } else if($table == 'berita'){
            $this->db->like('nama_berita', $cari);
        } else if ($table == 'voucher') {
            $this->db->like('isi_voucher', $cari);
        } else {
            $this->db->like('uname_User', $cari);
        }
        return $this->db->get($table)->result();
    }

    public function get_voucher() {
        return $this->db->query('SELECT * FROM voucher')->result();
    }

    public function get_user($user) {
        $where = array('uname_User' => $user);
        return $this->db->get_where('user', $where)->result();
    }

    public function get_transaction($user) {
        $where = array('uname_User' => $user);
        return $this->db->get_where('transaction', $where)->result();
    }

    public function get_transfer(){
        return $this->db->query('SELECT * FROM transfer')->result();
    }

    public function get_parevent($index) {
        $where = array('id_event' => $index);
        return $this->db->get_where('event', $where)->result();
    }

    public function get_parnews($index) {
        $where = array('newsID' => $index);
        return $this->db->get_where('berita', $where)->result();
    }

    public function get_parvoucher($index) {
        $where = array('voucherID' => $index);
        return $this->db->get_where('voucher', $where)->result();
    }

    public function get_partrans($index) {
        $where = array('id_transaction' => $index);
        return $this->db->get_where('transaction', $where)->result();
    }

    public function pembelian() {
        $kurang = $this->kurangtiket();
        if ($kurang) {
            $cek = $this->updateuser();
            $delete = $this->deletevoc();
            if ($cek) {
                $tambah = $this->tambahpembelian();
                if ($tambah) {
                    $invoice = $this->invoice();
                    if ($invoice) {
                        return 1;
                    } else {
                        return 2;
                    }
                } else {
                    return 2;
                }
            } else {
                return 2;
            }
        } else {
             return 2;
        }
    }

    public function kurangtiket() {
        if ($this->get_saldo()==0) {
            return false;
        }else{
            $nama = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $where = array( 'nama_event' => $nama );
            $this->db->select('total_tiket');
            $hasil = $this->db->get_where('event', $where)->result();
            $jml = 0;
            foreach ($hasil as $row) {
                $jml = (int) $row->total_tiket;
            }
            if ($jml <= 0) {
                $this->db->delete('event', $where);
                return false;
            }else{
                $tot = $jml - $jumlah;
                $where1 = array(
                    'total_tiket' => $tot
                );
                $this->db->set($where1);
                $this->db->where('nama_event', $nama);
                return ($this->db->update('event') != 1) ? false : true;
            }
        }
    }

    public function updateuser() {
        $saldo = $this->get_saldo();
        $username = $this->session->userdata('nama');
        $pem = $this->input->post('total');
        if ($saldo > $pem) {
            $tot = $saldo - $pem;
            $where = array( 'saldo_user' => $tot );
            $this->db->set($where);
            $this->db->where('uname_User', $username);
            return ($this->db->update('user') != 1) ? false : true;
        } else {
            return false;
        }
    }

    public function tambahpembelian() {
        $nama = $this->input->post('nama');
        $tiket = $this->input->post('jumlah');
        $pem = $this->input->post('total');
        $username = $this->session->userdata('nama');
        $where = array(
            'nama_event' => $nama,
            'harga_tiket' => $pem,
            'total_tiket' => $tiket,
            'uname_User' => $username
        );
        return ($this->db->insert('transaction', $where) != 1) ? false : true;
    }

    public function deletevoc() {
        $voc = $this->input->post("voc");
        $where = array( 'voucher_value' => $voc );
        return ($this->db->delete('voucher', $where) != 1) ? false : true;
    }

    public function updateu(){
        $username = $this->session->userdata['nama'];
        $pass = $this->input->post('pass');
        $email= $this->input->post('email');
        $where = array(
            'email_User' => $email,
            'pass_user' => $pass
          );
          $this->db->set($where);
          $this->db->where('uname_User', $username);
          return ($this->db->update('user') != 1) ? false : true;
    }

    public function isitran(){
        $username = $this->session->userdata['nama'];
        $total = $this->input->post('jumlah');
        $where = array(
            'uname_User' => $username,
            'jumlah' => $total,
            'verif' => 0
          );
        return ($this->db->insert('transfer', $where) != 1) ? false : true;
    }

    public function invoice() {
        $username = $this->session->userdata('nama');
        $status = "Berhasil";
        $tanggal = date('Y-m-d');
        $where = array(
            'status_pembelian' => $status,
            'tanggal_pembelian' => $tanggal,
            'uname_user' => $username
        );
        return ($this->db->insert('invoice', $where) != 1) ? false : true;
    }

    public function verif($index){
        $where = array( 'verif' => 1 );
        $this->db->set($where);
        $this->db->where('id', $index);
        return ($this->db->update('transfer') != 1) ? false : true;
    }

    public function isisaldo($index){
        $where1 = array('id' => $index);
        $this->db->select('uname_User, jumlah');
        $sal = $this->db->get_where('transfer', $where1)->result();
        $username = "";
        $jumlah = "";
        foreach ($sal as $row) {
            $username = $row->uname_User;
            $jumlah = $row->jumlah;
          }
        $where = array('uname_User' => $username);
        $this->db->select('saldo_user');
        $user = $this->db->get_where('user', $where)->result();
        $saldoo = "";
        foreach ($user as $row) {
          $saldoo = $row->saldo_user;
        }
        $tot = (int)$saldoo + (int)$jumlah;
        $where = array( 'saldo_user' => $tot );
        $this->db->set($where);
        $this->db->where('uname_User', $username);
        return ($this->db->update('user') != 1) ? false : true;
    }

    public function isiberita() {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan');
        $gambar = $this->input->post('gambar');
        $admin = $this->session->userdata['nama'];
        $where = array(
            'nama_berita' => $judul,
            'uname_ADM' => $admin,
            'isi_berita' => $keterangan,
            'gambar_berita' => $gambar
        );
        return ($this->db->insert('berita', $where) != 1) ? false : true;
    }

    public function isievent() {
        $judul = $this->input->post('judul');
        $tiket = $this->input->post('tiket');
        $harga = $this->input->post('harga');
        $admin = $this->session->userdata['nama'];
        $gambar = $this->input->post('gambar');
        $waktu = $this->input->post('tanggal');
        $tempat = $this->input->post('tempat');
        $keterangan = $this->input->post('keterangan');
        $where = array(
            'nama_event' => $judul,
            'total_tiket' => $tiket,
            'harga_tiket' => $harga,
            'uname_ADM' => $admin,
            'gambar_event' => $gambar,
            'waktu_event' => $waktu,
            'tempat_event' => $tempat,
            'isi_event' => $keterangan
        );
        return ($this->db->insert('event', $where) != 1) ? false : true;
    }

    public function isivoucher() {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('isi');
        $nilai = $this->input->post('nilai');
        $admin = $this->session->userdata['nama'];
        $where = array(
            'title_voucher' => $judul,
            'voucher_value' => $nilai,
            'uname_ADM' => $admin,
            'isi_voucher' => $keterangan
        );
        return ($this->db->insert('voucher', $where) != 1) ? false : true;
    }

    public function updatenews($index) {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan');
        $gambar = $this->input->post('gambar');
        $admin = $this->session->userdata['nama'];
        $where = array(
            'nama_berita' => $judul,
            'uname_ADM' => $admin,
            'isi_berita' => $keterangan,
            'gambar_berita' => $gambar
        );
        $this->db->set($where);
        $this->db->where('newsID', $index);
        return ($this->db->update('berita') != 1) ? false : true;
    }

    public function updateevent($index) {
        $judul = $this->input->post('judul');
        $tiket = $this->input->post('tiket');
        $harga = $this->input->post('harga');
        $admin = $this->session->userdata['nama'];
        $gambar = $this->input->post('gambar');
        $waktu = $this->input->post('tanggal');
        $tempat = $this->input->post('tempat');
        $keterangan = $this->input->post('keterangan');
        $where = array(
            'nama_event' => $judul,
            'total_tiket' => $tiket,
            'harga_tiket' => $harga,
            'uname_ADM' => $admin,
            'gambar_event' => $gambar,
            'waktu_event' => $waktu,
            'tempat_event' => $tempat,
            'isi_event' => $keterangan
        );
        $this->db->set($where);
        $this->db->where('id_event', $index);
        return ($this->db->update('event') != 1) ? false : true;
    }

    public function updatevoucher($index) {
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('isi');
        $nilai = $this->input->post('nilai');
        $admin = $this->session->userdata['nama'];
        $where = array(
            'title_voucher' => $judul,
            'voucher_value' => $nilai,
            'uname_ADM' => $admin,
            'isi_voucher' => $keterangan
        );
        $this->db->set($where);
        $this->db->where('voucherID', $index);
        return ($this->db->update('voucher') != 1) ? false : true;
    }

    public function hapus($table, $index) {
        if ($table == 'berita') {
            $where = array( 'newsID' => $index );
        } else if ($table == 'event') {
            $where = array( 'id_event' => $index );
        } else if($table == 'voucher'){
            $where = array( 'voucherID' => $index );
        } else {
          $where = array( 'id' => $index );
        }
        return ($this->db->delete($table, $where) != 1) ? false : true;
    }
}
