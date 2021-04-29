<?php

class Model_datamidi extends CI_model
{
	

    public function viewOrderingCustom($table, $order, $ordering)
    {
        return $this->db->query("select a.* ,b.nama as nama_media_koneksi,c.nama as nama_jenis_perangkat,
		d.nama as nama_merek_perangkat,
		e.nama as nama_vendor,
		f.nama as nama_inet,
		g.nama as namadcmidi from datamidi a 
		left join media_koneksi b on a.media_koneksi = b.id 
		left join jenis_perangkat c on a.jenis_perangkat = c.id 
		left join merek_perangkat d on a.merek_perangkat = d.id
		left join vendor_detail e on a.vendor = e.id
		left join inet f on a.inet = f.id
		left join dc_midi g on a.dcmidi = g.id
		");
    }

	public function viewOrdering($table, $order, $ordering)
    {
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function checkDuplicate($data, $table)
    {
        $this->db->where('kode',$data['kode']);
        return $this->db->get($table)->num_rows();
    }

    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

    public function viewWhere($table, $data)
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
