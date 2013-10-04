<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	//Template
	var $tpl_data = array();

	var $user_data = array();
	var $server_data = array();

	public function __construct()
    {
        parent::__construct();

		$this->load->database();
        $this->load->model('users');
        $check = $this->users->check_user();
        
        if($check){
			//Base Template
			$this->tpl_data['title'] = 'Настройки :: АдминПанель';
			$this->tpl_data['heading'] = 'Настройки';
			$this->tpl_data['content'] = '';
			$this->tpl_data['menu'] = $this->parser->parse('menu.html', $this->tpl_data, TRUE);
			$this->tpl_data['profile'] = $this->parser->parse('profile.html', $this->users->tpl_userdata(), TRUE);
        
        }else{
            header("Location: /auth");
			exit;
        }
    }
    
    
    // ----------------------------------------------------------------

    /**
     * Редактирование пользователя
     * 
    */
    public function index($user_id = FALSE)
    {
		$this->load->driver('query');
		$this->query->set_engine('minecraft');
		
		print_r($this->query->get_players('178.33.115.194', 27033));

		$this->parser->parse('main.html', $this->tpl_data);
	}
    
}