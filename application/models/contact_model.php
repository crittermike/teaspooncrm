<?php

class Contact_model extends Model {

  function Contact_model() {
    parent::Model();
  }

  function list_all() {
    $query = $this->db->get('contacts');
    return $query->result();
  }

  function get_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('contacts');
    return $query->result();
  }

  function add($name, $email, $phone, $address, $notes) {
    $this->db->set('name', $name);
    $this->db->set('email', $email);
    $this->db->set('phone', $phone);
    $this->db->set('address', $address);
    $this->db->set('notes', $notes);
    $this->db->insert('contacts');
  }

  function edit($id, $name, $email, $phone, $address, $notes) {
    $this->db->set('name', $name);
    $this->db->set('email', $email);
    $this->db->set('phone', $phone);
    $this->db->set('address', $address);
    $this->db->set('notes', $notes);
    $this->db->where('id', $id);
    $this->db->update('contacts');
  }

  function delete($id) {
    $this->db->delete('contacts', array('id' => $id));
  }
}
