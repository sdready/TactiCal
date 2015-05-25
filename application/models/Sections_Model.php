<?php

class Sections_model extends CI_Model {



  public function __construct()

  {

          $this->load->database();

  }

  public function getSectionID($section)
  {
  	$this->db->select('ID');
  	$this->db->from('Sections');
  	$this->db->where('Name', $section);

  	return (int)$this->db->get()->result_array()[0]['ID'];
  }

  public function get_sections()
  {
    $query = $this->db->get('Sections');
    return $query->result_array();
  }

  public function getSubSections($parentSectionID)
  {  	
  	$this->db->select('s.*, sr.*');
  	$this->db->from('Sections s');
  	$this->db->join('SectionRelationships sr', 's.ID = sr.ChildSectionID');
  	$this->db->where('sr.SectionID', $parentSectionID);
  	$query = $this->db->get();

  	return $query->result_array();
  }

}