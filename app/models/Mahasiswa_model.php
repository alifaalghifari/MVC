<?php

class Mahasiswa_model
{
    private $table = 'data_mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswa($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . " WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahData($data)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES ('',:nama,:NIM,:kelas)");
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $this->db->query($query);

        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    nama = :nama,
                    NIM = :NIM,
                    kelas = :kelas 
                    WHERE id= :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIM', $data['NIM']);
        $this->db->bind('kelas', $data['kelas']);
        $this->db->bind('id', $data['id']);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa($keyword)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama LIKE :keyword');
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
