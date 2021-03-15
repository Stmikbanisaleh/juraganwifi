<?php

class Model_data_voip extends CI_model
{

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewOrderingCustom()
    {
        return $this->db->query("select a.*, CONCAT('Rp. ',FORMAT(a.limit_pemakaian,2)) Nominal  ,b.nama as nama_vendor,c.nama as nama_media_koneksi,
		d.nama as nama_jenis_perangkat,e.nama as nama_merek,f.nama as nama_kepemilikan from data_pelanggan_voip a 
		join vendor_detail b on a.vendor = b.id
		join media_koneksi c on a.media_koneksi = c.id
		join jenis_perangkat d on a.jenis_perangkat = d.id
		join merek_perangkat e on a.merek_perangkat = e.id
		join jenis_kepemilikan_perangkat f on a.status_kepemilikan_perangkat = f.id
		");
    }

	public function viewWhere($table, $data)
    {
        $this->db->where($data);
        return $this->db->get($table);
	}
	
	public function checkDuplicate($data, $table)
    {
        $this->db->where('nomor',$data['nomor']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function view_where($table, $data)
    {
        $this->db->where($data);
        $this->db->where('isdeleted !=', 1);
        return $this->db->get($table);
	}
	
    public function insert($data, $table)
    {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    function delete($where, $table)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    function truncate($table)
    {
        $this->db->truncate($table);
    }
}
