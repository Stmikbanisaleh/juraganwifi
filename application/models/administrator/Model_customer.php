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
		f.nama as nama_jenis_tempat, g.nama as nama_jenis_perangkat, h.nama as nama_merek_perangkat, i.kode as kode_odc, j.kode as kode_odp,i.id as id_odc,k.nama as type_ip
		from customer a
		left join package_item b on a.jenis_layanan = b.id
		left join media_koneksi c on a.media_koneksi = c.id
		left join jenis_kepemilikan d on a.kepemilikan_tempat  = d.id
		left join jenis_kepemilikan_perangkat e on a.kepemilikan_perangkat = e.id
		left join jenis_tempat f on a.jenis_tempat = f.id
		left join jenis_perangkat g on a.jenis_perangkat = g.id
		left join merek_perangkat h on a.merek_perangkat = h.id
		left join odc i on a.kodc = i.id
		left join odp j on a.kodp = j.id
		left join type_ipaddress k on a.typeipaddress = k.id
		left join jenis_ipaddress l on a.jenis_ipaddress = l.id
		order by a.id asc");
    }

	public function viewWhereCustomODCV2($a)
    {
        return $this->db->query("select * from odc where wilayah = $a
		");
    }

	public function viewWhereCustomODPV2($a)
    {
        return $this->db->query("select * from odp where wilayah = $a
		");
    }

	public function checkDuplicate($data, $table)
    {
        $this->db->where('no_services',$data['no_services']);
        return $this->db->get($table)->num_rows();
    }


    public function viewWhereOrdering($table, $data, $order, $ordering)
    {
        $this->db->where($data);
        $this->db->order_by($order, $ordering);
        return $this->db->get($table);
    }

	public function viewWhereCustomODC($wilayah)
    {
        return $this->db->query("select * from odc where wilayah = $wilayah");
    }

	public function getkodewilayah($wilayah)
    {
        return $this->db->query("select * from wilayah where id = $wilayah");
    }

	public function viewWhereCustomODP($wilayah)
    {
        return $this->db->query("select * from odp where wilayah = $wilayah");
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
