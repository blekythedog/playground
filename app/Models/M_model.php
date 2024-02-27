<?php

namespace App\Models;

use CodeIgniter\Model;

class M_model extends Model
{

    // ===========================Fix===========================
    public function use($str, $asQuery = false){
        if($asQuery){
            return $str;
        }
        return $this->db->query($str)->getResult();
    }

    public function tampil($table)
    {
        return $this->db->table($table)->get()->getresult();
    }
    public function tampilGroup($table, $group, $order)
    {
        return $this->db->table($table)->groupBy($group)->orderBy($order)->get()->getresult();
    }

    public function tampilrow($table)
    {
        return $this->db->table($table)->get()->getRowArray();
    }

    public function getRow($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function input($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }
    
    public function simpan($table, $data)
    {
        $this->db->table($table)->insert($data);
        return $this->db->insertID();
    }

    public function hapus($table, $where)
    {
        return $this->db->table($table)->delete($where);
    }

    public function truncate($table)
    {
        return $this->db->table($table)->truncate();
    }

    public function tambah($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }

    public function getWhere($table, $where)
    {
        return $this->db->table($table)->Where($where)->get()->getRow();
    }

    public function getWhereRow($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function getWhereResult($table, $where)
    {
        return $this->db->table($table)->Where($where)->get()->getResultArray();
    }
    public function getWhereLikeResult($table, $where)
    {
        return $this->db->table($table)->Like($where)->get()->getResultArray();
    }

    public function getWhere_J($table, $table2, $on, $where)
    {
        return $this->db->table($table)->join($table2, $on, 'left')->Where($where)->get()->getRowArray();
    }

    public function edit($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }

    public function tampil_join($table, $table2, $on)
    {
        return $this->db->table($table)->join($table2, $on, 'left')->get()->getResultArray();
    }

    public function tampil_i($table)
    {
        return $this->db->table($table)->get()->getRowArray();
    }

    public function join2($table, $table2, $on)
    {
        return $this->db->table($table)
            ->join($table2, $on, 'left')
            ->get()
            ->getresult();
    }

    public function join3($table, $table2, $table3, $on, $on2)
    {
        return $this->db->table($table)
            ->join($table2, $on, 'left')
            ->join($table3, $on2, 'left')
            ->get()
            ->getresult();
    }

    public function join4($table, $table2, $table3, $table4, $on, $on2, $on3)
    {
        return $this->db->table($table)
            ->join($table2, $on, 'left')
            ->join($table3, $on2, 'left')
            ->join($table4, $on3, 'left')
            ->get()
            ->getresult();
    }


    public function getWhere2($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function Omlet()
    {
        return $this->db->query("SELECT makanan FROM makanan WHERE name=Omlet ")->getResult();
    }
    public function superLike2($table1, $column, $where)
    {
        return $this->db->table($table1)->groupStart()->like($column, $where)->groupEnd()->get()->getResult();
    }

    public function tampilAbsen($table1, $table2, $on, $column)
    {
        return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
    }

    public function absen_nama($table1, $table2, $on, $column, $where)
    {
        return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->getWhere($where)->getResult();
    }

    public function tampilPegawaian($table1, $table2, $table3, $on, $on2, $column)
    {
        return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->orderBy($column, 'DESC')->get()->getResult();
    }

    public function tampiltambahPegawaian($table1, $table2, $on, $column)
    {
        return $this->db->table($table1)->join($table2, $on)->orderBy($column, 'DESC')->get()->getResult();
    }

    public function ultraRows($table1, $table2, $table3, $on, $on2, $where)
    {
        return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
    }

    public function getarray($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRowArray();
    }

    public function edit_gaji($table1, $table2, $on, $where)
    {
        return $this->db->table($table1)->join($table2, $on)->getWhere($where)->getRow();
    }

    public function tampilJabatan($table, $column)
    {
        return $this->db->table($table)->orderBy($column, 'DESC')->get()->getResult();
    }

    public function filter_siswa($table, $awal, $akhir)
    {
        $builder = $this->db->table($table);

        // Join dengan tabel lain
        $builder->join('user', $table . '.user = user.id_user');
        $builder->join('point', $table . '.point = point.id_point');
        $builder->join('kelas', $table . '.kelas = kelas.id_kelas');

        // Buat kondisi filter berdasarkan tanggal
        $builder->where($table . '.tanggal >=', $awal);
        $builder->where($table . '.tanggal <=', $akhir);

        // Execute the query and return the results
        $query = $builder->get();

        return $query->getResult();
    }

    public function filter_harian($table)
    {
        $builder = $this->db->table($table);

        $builder->join('daftar', $table . '.id_daftar = daftar.id');
        $builder->join('wahana', $table . '.id_wahana = wahana.id_wahana');
        // $builder->join('pengunjung', $table . '.pengunjung = pengunjung.id_pengunjung');

        // Execute the query and return the results
        $query = $builder->get();

        return $query->getResult();
    }




}