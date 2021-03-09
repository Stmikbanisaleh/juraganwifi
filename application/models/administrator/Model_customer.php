<?php

class Model_customer extends CI_model
{

    public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewOrderingCustom()
    {
        return $this->db->query("select a.* , b.name as nama_jenis_layanan, 
		c.nama as nama_media_koneksi, d.nama as nama_kepemilikan_tempat , e.nama as nama_kepemilikan_perangkat,
		f.nama as nama_jenis_tempat, g.nama as nama_jenis_perangkat, h.nama as nama_merek_perangkat
		from customer a
		join package_item b on a.jenis_layanan = b.id
		join media_koneksi c on a.media_koneksi = c.id
		join jenis_kepemilikan d on a.kepemilikan_tempat  = d.id
		join jenis_kepemilikan_perangkat e on a.kepemilikan_perangkat = e.id
		join jenis_tempat f on a.jenis_tempat = f.id
		join jenis_perangkat g on a.jenis_perangkat = g.id
		join merek_perangkat h on a.merek_perangkat = h.id
		order by a.id desc");
    }


	public function checkDuplicate($data, $table)
    {
        $this->db->where('email',$data['email']);
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
