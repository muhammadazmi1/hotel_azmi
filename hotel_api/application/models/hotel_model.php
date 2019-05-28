<?php 
class Hotel_model extends CI_Model{
    public function getHotel($id = null) {
        if($id != ''){
            return $this->db->get_where('Hotel', array('id' => $id))->result();
        }else{
            return $this->db->get('Hotel')->result();
        }
    }

    public function tambahDataHotel($data){
        $this->db->insert('Hotel', $data);
        return $this->db->affected_rows();
    }

    public function hapusDataHotel($id){
        $this->db->where("id = $id");
        return $this->db->delete('Hotel');;
    }

    public function ubahDataHotel($data){
        $this->db->where("id = '$data[id]'");
        return $this->db->update('hotel', $data);
    }
    
}