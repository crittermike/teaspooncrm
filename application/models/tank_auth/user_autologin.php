<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User_Autologin
 *
 * This model represents user autologin data. It can be used
 * for user verification when user claims his autologin passport.
 *
 * @package	Tank_auth
 * @author	Tank
 */
class User_Autologin extends Model
{
	const TABLE			= 'user_autologin';
	const TABLE_USERS	= 'users';

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get user data for auto-logged in user.
	 * Return NULL if given key or user ID is invalid.
	 *
	 * @param	int
	 * @param	string
	 * @return	object
	 */
	function get($user_id, $key)
	{
		$this->db->select(self::TABLE_USERS.'.id');
		$this->db->select(self::TABLE_USERS.'.username');
		$this->db->from(self::TABLE_USERS);
		$this->db->join(self::TABLE, self::TABLE.'.user_id = '.self::TABLE_USERS.'.id');
		$this->db->where(self::TABLE.'.user_id', $user_id);
		$this->db->where(self::TABLE.'.key_id', $key);
		$query = $this->db->get();
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Save data for user's autologin
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set($user_id, $key)
	{
		return $this->db->insert(self::TABLE, array(
			'user_id' 		=> $user_id,
			'key_id'	 	=> $key,
			'user_agent' 	=> substr($this->input->user_agent(), 0, 149),
			'last_ip' 		=> $this->input->ip_address(),
		));
	}

	/**
	 * Delete user's autologin data
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function delete($user_id, $key)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('key_id', $key);
		$this->db->delete(self::TABLE);
	}

	/**
	 * Delete all autologin data for given user
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function clear($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete(self::TABLE);
	}

	/**
	 * Purge autologin data for given user and login conditions
	 *
	 * @param	int
	 * @return	void
	 */
	function purge($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('user_agent', substr($this->input->user_agent(), 0, 149));
		$this->db->where('last_ip', $this->input->ip_address());
		$this->db->delete(self::TABLE);
	}
}

/* End of file user_autologin.php */
/* Location: ./application/models/auth/user_autologin.php */