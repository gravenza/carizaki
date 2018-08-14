<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');
	Class Fb extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('facebook');
		}
		public function index(){
			/**
			 * check if user is logged in with facebook.
			 * if logged in.. user/profile veiw is opend up.
			 * if not..it will get login form view.
			 */
			if($this->facebook->logged_in()){
			// user is logged in.
			
				$this->load->view('user/profile');

			}else{
				// not logged in.
				$data = $this->facebook->loginUrl();
				$this->load->view('login/index', $data);
			}
		}
		public function user_login(){
			
			if($this->facebook->setSession()){
				$user = $this->facebook->getProfile();
				echo $user['name'];
				echo "<img src='".$this->facebook->getDp()."'>";
				if(!empty($user['email'])){
					$result = $this->Admin_model->sum_data_param('email',$user['email'],'tbl_members');
                            if($result>0)
                            {
                              $data_user = $this->Admin_model->select_data('tbl_members','email',$user['email']);
                               $this->session->set_userdata('id',$data_user->id_members);
                                $this->session->set_userdata('nama',$data_user->nama);
                                $this->session->set_userdata('email',$data_user->email);
                                $this->session->set_userdata('propinsi',$data_user->provinsi);
                            }
                            else
                            {
                               
                                $data = array(
                                    'id_members' => '',
                                    'nama' => $user['name'],
                                    'email' => $user['email']
                                    );
                                $insert = $this->Admin_model->insert('tbl_members',$data);
                                $this->session->set_userdata('id',$insert);
                                $this->session->set_userdata('nama',$user['name']);
                                $this->session->set_userdata('email',$user['email']);
                                if($insert)
                                {
                                   //$data['url'] ='#';
                                    redirect('/site/applicator');
                                }
                               
                            }
                        }
                        else{
                        	 $data = array(
                                    'id_members' => '',
                                    'nama' => $user['name'],
                                    'email' => ''
                                    );
                                $insert = $this->Admin_model->insert('tbl_members',$data);
                                $this->session->set_userdata('id',$insert);
                                $this->session->set_userdata('nama',$user['name']);
                                $this->session->set_userdata('email','');
                                if($insert)
                                {
                                   //$data['url'] ='#';
                                    redirect('/site/applicator');
                                }
                        }
			}else{
				$this->ins->load->view('user/failed');
			}

		}
		public function logout(){
			$this->facebook->logout();
		}

	}