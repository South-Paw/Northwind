<?php
/**
 * A model to handle sessions and user logins and logouts.
 * Note: Sessions are started in the Site model as that model is assumed to be
 * included in every page (therefore always having an open session as needed).
 */
class Session extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	/**
	 * Login with a given username and password.
	 * @return True if successfully logged in, false if not.
	 */
	public function login($username, $password) {
		$query = $this->db->get_where('Employees', array('FirstName' => $username, 'LastName' => $password));

		if ($query->num_rows() == 1) {
			$_SESSION['account']['username'] = $username;
			$_SESSION['account']['avatar'] = 'public/img/'. $username .'.png';
		}

		return $this->loggedIn();
	}

	/**
	 * Checks whether a session variable account -> username exists.
	 * @return True if it does, false if not.
	 */
	public function loggedIn() {
        return (isset($_SESSION['account']['username']) ? True : False);
    }

	/**
	 * If a user is logged in, log them out & destroy the session.
	 * @return True if successfully logged out, false if not logged in.
	 */
	public function logout() {
		if (!$this->loggedIn()) {
			return False;
		}

        unset($_SESSION['account']);

        if (!isset($_SESSION[0])) {
			session_destroy();
		}

        return True;
	}
}
