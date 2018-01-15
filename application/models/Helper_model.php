<?php
class Helper_model extends CI_Model {
	
	public function get_settings($name,$output=NULL){
	/*
	Fetching data from config table of database	
	*/
	
		$query			=	$this->db->get_where('config', array('name' => $name),1);
		$res				=	$query->result();
		foreach($res as $details){
			if($output==1){
				echo $details->value;
			}else{
				return $details->value;
			}
			}
	
	}
	public function login_check(){
	
	/*
	Prevent pages from getting access if protected by login
	*/
	
		$email			=	$this->session->userdata('email');
		$admin_id		=	$this->session->userdata('admin_id');
		$logged_in	=	$this->session->userdata('logged_in');
		if(($email!="") && ($admin_id!="") && ($logged_in!="")){
				// We programmer rocks :DESC
				// lets stay silent
				// No action here, enjoy pizza :D
		}else{
			$this->session->set_flashdata(array('msg'=>'Please Login to continue','type'=>'warning'));
			redirect(base_url('admin/login'));
		}
	}
	
	
	public function upload_file($path,$name){
	$this->load->helper('string');
	
	/*
	Upload file helper function	
	*/
	
		if(!isset($path)){
		/*
		Need to set path like /directory/image/	
		*/
		log_message('error','Image upload path not defined');
		return FALSE;
		}
		if(!isset($name)){
			/*
			name of input type file is missing
			*/
			
			log_message('error','File name not defined');
			return false;
		
			
		}
		
		
		$target_dir = $path;
		$time=time();
		$target_file = $target_dir.md5($time.random_string('alnum',8))."_".str_replace(" ","-",substr(basename($_FILES[$name]["name"]),-5));
	
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
			if($_FILES[$name]) {
					// $check = getimagesize($_FILES[$name]["tmp_name"]);
					$check = TRUE;
				
						if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
							return $target_file;
							
						}else {
							log_message('error','Directory does not exist, please create directory or defined valid path in first argument');
							return FALSE;
						}
					
				}else{
				log_message('error','File not found, please check if form has attribute enctype=multipart/form-data');
				return FALSE;
			}
		
	}
	
	public function alert_message(){
	/*
	place this function where you want to show alert messages	
	*/
		if($this->session->userdata('msg')){
			?>
			<div id="fading_div" class="alert alert-<?php echo $this->session->userdata('type')?>">
				<i class="fa fa-info-circle fa-lg"></i> <?php echo $this->session->userdata('msg');?>
			</div>
			<?php
		}
	}
	
	
	public function display_alert($msg,$type=NULL,$icon=NULL){
		if(!$msg){
				return FALSE;
				exit();
		}
		if($type==NULL){
			$type='info';
		}
		
		if($icon==NULL){
				$icon='info-circle';
		}
		?>
		<div class="alert alert-<?php echo $type;?> clicktohide" align="center">
			<p><i class="fa fa-<?php echo $icon;?> fa-lg"></i> <?php echo $msg;?></p>
		</div>
		<?php
	}
	
	
	public function redirect_msg($msg,$type='info',$url){
	if(!$msg OR !$url){
	return false;	
	}
	
	$this->session->set_flashdata(array('msg'=>$msg,'type'=>$type));
	redirect(base_url($url));
	exit();
	}
	
	public function google_recaptcha($path,$mode){
		$secrate_key=$this->settings_model->get_settings('google_recaptcha_secrete_key');
			$captcha=$_POST['g-recaptcha-response'];
			if(!$captcha){
				$this->session->set_flashdata(array('msg'=>'Please go through captcha','type'=>'danger'));
				redirect(base_url($path));
				exit();
			}
		if($mode=='local'){
			return TRUE;
			exit();
			}
		 $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secrate_key."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
			
	   if($response['success'] == FALSE){
		  $this->session->set_flashdata(array('msg'=>'We are not able to verify you as human, try again if you are!','type'=>'warning'));
			redirect(base_url($path));
			exit();
		}else{
			return TRUE;
			
		}
				
	}
		
	public function send_formatted_mail($data){
		$this->load->library('email');
		$this->email->clear();
		
		if(empty($data['name'])
			OR empty($data['subject'])
			OR empty($data['to'])
			OR empty($data['message']) ){
			log_message('error','Empty paraters for email');
			return FALSE;
		}
		
		
			
		$config['useragent']			=	"Codeigniter";
		$config['mailpath']			=	"/usr/sbin/sendmail"; // or "/usr/sbin/sendmail"
		$config['protocol']			=	"SMTP";
		$config['smtp_host']			=	"localhost";
		$config['smtp_port']			=	25;
		
		
		$config['mailtype']			=	"html";
		$config['charset']				=	'utf-8';
		$config['newline']				=	"\r\n";
		$config['crlf'] 					= 	"\r\n";
		$config['wordwrap']			=	TRUE;
		
		ini_set('sendmail_from', $data['from']);
		
		$this->email->reply_to($data['from'], $data['name']);
		$this->email->initialize($config);
		$this->email->to($data['to']);
		$this->email->from($data['from'], $data['name']);
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		$mail = $this->email->send();
	
			if($mail){
				log_message('error','Message sent to :'.$data['to']);
				return TRUE;
				}else{
				log_message('error','message not sent to :'.$data['to']);
				return FALSE;
				
				}

	}
	
	public function image_resize($upload_path,$width=NULL,$height=NULL,$ratio=TRUE){
			// Just need path to grab image and resize followed by overwriting
			$this->load->library('image_lib');
			ini_set('memory_limit', '-1');	// this will prevent memory overload by PHP, 
			
			$config['source_image']		=	$upload_path;
			$config['new_image']		=	$upload_path;
			
			if($width!=NULL){
			$config['width']=$width;
			}
			
			if($height!=NULL){
				$config['height']=$height;
				// height is set, is applied, else default size will be taken
			}
			
			   $config['maintain_ratio'] = $ratio;

			
			$this->image_lib->initialize($config); 
				$confirm=$this->image_lib->resize();
				if($confirm){
					return TRUE;
				}else{
					return FALSE;
				}
				
				
				/*
				Reference
				http://stackoverflow.com/questions/11193346/image-resizing-codeigniter
				*/
	}
			
			
	public function update_sitedata($var,$val){
			log_message('error', 'Variable loaded'.$var);
			log_message('error', 'value loaded'.$val);
				$data = array(
						'value' => $val
				);
		
				$query=$this->db->where('var', $var);
				$query=$this->db->update('config', $data);
				
				if($query){
				log_message('error', 'query success');
					return TRUE;
					}else{
					log_message('error', 'query failed');
					return FALSE;
					}
		   }
	
	
	
	
	public function del($table,$col,$val){
	/*
	These are database CRUD helper,
	in case of error, please refer error log or use native codeigniter function
	*/
	
		if(($table==NULL) OR ($col==NULL) OR ($val==NULL)){
			log_message('error','Missing table, col, or value');
			return FALSE;
		}
		
		$query		=	$this->db->where($col, $val);
		$query		=	$this->db->delete($table);
		if($query){
			return TRUE;
		}else{
			log_message('error','Unable to delete from '.$table." given attribute ".$col." with value ".$val);
			return FALSE;
			
		}
	}
	
	public function update($table,$data,$col,$val){
		if(($data==NULL) OR ($col==NULL) OR ($val==NULL) OR ($table==NULL)){
			log_message('error','Missing table, col, or value');
			return FALSE;
			exit();
		}
		
		$query	=	$this->db->where($col, $val);
		$query	=	$this->db->update($table, $data);
		if($query){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	
	public function get_by_id($table,$col,$value,$limit=null,$order=NULL){
			
		if(!empty($order)){
			
			foreach ($order as $key => $value){
				$query=$this->db->order_by($key, $value);	
			}
		}	
		$query =	$this->db->get_where($table, array($col => $value),$limit);
		
		if($query->num_rows()>0){
				return $query->result();
			}else{
				return FALSE;
			}
	}
	
	public function get_multi_where($table,$where,$limit=null,$count=FALSE,$order=NULL,$group=NULL){
		
		if(!empty($group)){
			$this->db->group_by($group);
		}
		
		
		if(!empty($order)){
			
			foreach ($order as $key => $value){
			$query=$this->db->order_by($key, $value);	
			}
		
		}
		
		
		$query =	$this->db->get_where($table, $where,$limit);
		
		if($query->num_rows()>0){
				if($count){
					return $query->num_rows();
				}else{
					return $query->result();
				}
				
			}else{
				return FALSE;
			}
	}
	
	public function get_allby_id($table,$key,$value){
		$query = $this->db->get_where($table, array($key => $value));
		if($query->num_rows()>0){
				return $query->result();
		}else{
				return FALSE;
		}
					
	}
	
	public function get_row_array($table,$where,$order=NULL,$limit=1){
		
			$query =	$this->db->get_where($table, $where,$limit);
			if($query->num_rows()>0){
				$row = $query->row();
				if(isset($row)){
				return $row;	
				}
			}else{
				return FALSE;
			}
			
	}
	
	
	public function get_row($table,$col,$value,$col_get=NULL){
			if(!$table OR !$col OR !$value){
			return FALSE;	
			}
			
			
			$query =	$this->db->get_where($table, array($col => $value),1);
			
			if($query->num_rows()>0){
					$data=$query->row_array();
					if($col_get){
						return $data[$col_get];
						}else{
						return $data;
						}
					
				}else{
					return FALSE;
				}
	}
	
	public function get_table($table,$order=NULL,$group=NULL,$limit=NULL){
	/*
			$this->helper_model->get_table('user',array('id'=>'asc'));
			will produce
			SELECT  * FROM `USER` ORDER BY `ID` ASC;
	*/
		if(!empty($order)){
			
			foreach ($order as $key => $value){
			$query=$this->db->order_by($key, $value);	
			}
		
		}
		
		if(!empty($group)){
			$this->db->group_by($group);
		}
		
		if(!empty($limit)){
			$this->db->limit($limit);
		}
		
		$query = $this->db->get($table);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return FALSE;
		}	
	}
	
	public function count_data($table,$condition=NULL,$value=NULL){
		if($condition!=NULL && $value!=NULL){
				$query = $this->db->get_where($table, array($condition => $value));
				if($query){
						echo $query->num_rows();
				}else{
						return FALSE;
				}	
		}else{
			$query = $this->db->get($table);
			if($query){
				echo $query->num_rows();
				}
		}
	
			
	}
	
	public function count_multiple($table,$condition=NULL){
	if($condition!=NULL){
				$query = $this->db->get_where($table,$condition);
				if($query){
						return $query->num_rows();
				}else{
						return FALSE;
				}	
		}else{
			$query = $this->db->get($table);
			if($query){
				return $query->num_rows();
				}
		}	
	
	}
	
	public function change_password($table,$data){
				/*
				Please do not use this function, under testing it is	
				*/
				
				// Valid for current user password only
				
				
				
				$id=$this->session->userdata('uid');
				$newdata = array(
					'password' => sha1($pdata['newpass'])
				);
				$query	=	$this->db->where('id', $id);
				$query	=	$this->db->update($table, $newdata);
				
				if($query){
						return TRUE;
				}else{
					log_message('error','Database query failed while updating password '.mysql_error());
					return FALSE;
				}
	}
	
	
	public function c_select($selected='United States',$name='country',$class='form-control'){
	
	/*
	Usage guide
	---------------------
	in form, put
	<?php $this->Helper_model->c_select();?>
	Optional Parameters are:
		1. Country Array/Object
		2. Name of select element
		3. Default selected country name
		4. Class name
	
	Default selected country : United States;
	Default name					: country
	Default class					: form-control
	
	
	*/
	
	
		if(isset($cdata)){
			$results=array('country'=>$selected);
		}else{
			$results=array('country'=>$selected);
		}
		//$results['country']=="";
		?>
		
		<select class="form-control input-sm" id="country" name="<?php echo $name;?>" required tabindex="4" class=<?php echo $class;?>>
		<option value="" <?php if($results['country']==""){ ?>selected="selected"<?php } ?> disabled>Select Country</option> 
		<option value="Afghanistan" <?php if($results['country']=="Afghanistan"){ ?>selected="selected"<?php } ?>>Afghanistan</option>
		<option value="Albania" <?php if($results['country']=="Albania"){ ?>selected="selected"<?php } ?>>Albania</option>
		<option value="Algeria" <?php if($results['country']=="Algeria"){ ?>selected="selected"<?php } ?>>Algeria</option>
		<option value="American Samoa" <?php if($results['country']=="American Samoa"){ ?>selected="selected"<?php } ?>>American Samoa</option> 
		<option value="Andorra" <?php if($results['country']=="Andorra"){ ?>selected="selected"<?php } ?>>Andorra</option>
		<option value="Angola" <?php if($results['country']=="Angola"){ ?>selected="selected"<?php } ?>>Angola</option> 
		<option value="Anguilla" <?php if($results['country']=="Anguilla"){ ?>selected="selected"<?php } ?>>Anguilla</option>
		<option value="Antarctica" <?php if($results['country']=="Antarctica"){ ?>selected="selected"<?php } ?>>Antarctica</option>
		<option value="Antigua and Barbuda" <?php if($results['country']=="Antigua and Barbuda"){ ?>selected="selected"<?php } ?>>Antigua and Barbuda</option>
		 <option value="Argentina" <?php if($results['country']=="Argentina"){ ?>selected="selected"<?php } ?>>Argentina</option>
		<option value="Armenia" <?php if($results['country']=="Armenia"){ ?>selected="selected"<?php } ?>>Armenia</option> 
		<option value="Aruba" <?php if($results['country']=="Aruba"){ ?>selected="selected"<?php } ?>>Aruba</option>
		<option value="Australia" <?php if($results['country']=="Australia"){ ?>selected="selected"<?php } ?>>Australia</option>
		<option value="Austria" <?php if($results['country']=="Austria"){ ?>selected="selected"<?php } ?>>Austria</option>
		<option value="Azerbaijan" <?php if($results['country']=="Azerbaijan"){ ?>selected="selected"<?php } ?>>Azerbaijan</option>
		<option value="Bahamas" <?php if($results['country']=="Bahamas"){ ?>selected="selected"<?php } ?>>Bahamas</option> 
		<option value="Bahrain" <?php if($results['country']=="Bahrain"){ ?>selected="selected"<?php } ?>>Bahrain</option>
		<option value="Bangladesh" <?php if($results['country']=="Bangladesh"){ ?>selected="selected"<?php } ?>>Bangladesh</option>
		<option value="Barbados" <?php if($results['country']=="Barbados"){ ?>selected="selected"<?php } ?>>Barbados</option> 
		<option value="Belarus" <?php if($results['country']=="Belarus"){ ?>selected="selected"<?php } ?>>Belarus</option>
		<option value="Belgium" <?php if($results['country']=="Belgium"){ ?>selected="selected"<?php } ?>>Belgium</option> 
		<option value="Belize" <?php if($results['country']=="Belize"){ ?>selected="selected"<?php } ?>>Belize</option>
		<option value="Benin" <?php if($results['country']=="Benin"){ ?>selected="selected"<?php } ?>>Benin</option>
		<option value="Bermuda" <?php if($results['country']=="Bermuda"){ ?>selected="selected"<?php } ?>>Bermuda</option>
		<option value="Bhutan" <?php if($results['country']=="Bhutan"){ ?>selected="selected"<?php } ?>>Bhutan</option>
		<option value="Bolivia" <?php if($results['country']=="Bolivia"){ ?>selected="selected"<?php } ?>>Bolivia</option>
		<option value="Bosnia and Herzegovina" <?php if($results['country']=="Bosnia and Herzegovina"){ ?>selected="selected"<?php } ?>>Bosnia and Herzegovina</option> 
		<option value="Botswana" <?php if($results['country']=="Botswana"){ ?>selected="selected"<?php } ?>>Botswana</option> 
		<option value="Bouvet Island" <?php if($results['country']=="Bouvet Island"){ ?>selected="selected"<?php } ?>>Bouvet Island</option>
		 <option value="Brazil" <?php if($results['country']=="Brazil"){ ?>selected="selected"<?php } ?>>Brazil</option> 
		<option value="British Indian Ocean Territory" <?php if($results['country']=="British Indian Ocean Territory"){ ?>selected="selected"<?php } ?>>British Indian Ocean Territory</option>
		<option value="Brunei Darussalam" <?php if($results['country']=="Brunei Darussalam"){ ?>selected="selected"<?php } ?>>Brunei Darussalam</option> 
		<option value="Bulgaria" <?php if($results['country']=="Bulgaria"){ ?>selected="selected"<?php } ?>>Bulgaria</option> 
		<option value="Burkina Faso" <?php if($results['country']=="Burkina Faso"){ ?>selected="selected"<?php } ?>>Burkina Faso</option> 
		<option value="Burundi" <?php if($results['country']=="Burundi"){ ?>selected="selected"<?php } ?>>Burundi</option> 
		<option value="Cambodia" <?php if($results['country']=="Cambodia"){ ?>selected="selected"<?php } ?>>Cambodia</option> 
		<option value="Cameroon" <?php if($results['country']=="Cameroon"){ ?>selected="selected"<?php } ?>>Cameroon</option> 
		<option value="Canada" <?php if($results['country']=="Canada"){ ?>selected="selected"<?php } ?>>Canada</option>
		<option value="Cape Verde" <?php if($results['country']=="Cape Verde"){ ?>selected="selected"<?php } ?>>Cape Verde</option>
		<option value="Cayman Islands" <?php if($results['country']=="Cayman Islands"){ ?>selected="selected"<?php } ?>>Cayman Islands</option> 
		<option value="Central African Republic" <?php if($results['country']=="Central African Republic"){ ?>selected="selected"<?php } ?>>Central African Republic</option> 
		<option value="Chad" <?php if($results['country']=="Chad"){ ?>selected="selected"<?php } ?>>Chad</option>
		<option value="Chile" <?php if($results['country']=="Chile"){ ?>selected="selected"<?php } ?>>Chile</option>
		<option value="China" <?php if($results['country']=="China"){ ?>selected="selected"<?php } ?>>China</option>
		<option value="Christmas Island" <?php if($results['country']=="Christmas Island"){ ?>selected="selected"<?php } ?>>Christmas Island</option>
		<option value="Cocos (Keeling) Islands" <?php if($results['country']=="Cocos (Keeling) Islands"){ ?>selected="selected"<?php } ?>>Cocos (Keeling) Islands</option>
		<option value="Colombia" <?php if($results['country']=="Colombia"){ ?>selected="selected"<?php } ?>>Colombia</option>
		 <option value="Comoros" <?php if($results['country']=="Comoros"){ ?>selected="selected"<?php } ?>>Comoros</option> 
		<option value="Congo" <?php if($results['country']=="Congo"){ ?>selected="selected"<?php } ?>>Congo</option> 
		<option value="Congo, The Democratic Republic of The" <?php if($results['country']=="Congo, The Democratic Republic of The"){ ?>selected="selected"<?php } ?>>Congo, The Democratic Republic of The</option>
		<option value="Cook Islands" <?php if($results['country']=="Cook Islands"){ ?>selected="selected"<?php } ?>>Cook Islands</option>
		<option value="Costa Rica" <?php if($results['country']=="osta Rica"){ ?>selected="selected"<?php } ?>>Costa Rica</option> <option value="Cote D'ivoire">Cote D'ivoire</option>
		 <option value="Croatia" <?php if($results['country']=="Croatia"){ ?>selected="selected"<?php } ?>>Croatia</option>
		<option value="Cuba" <?php if($results['country']=="Cuba"){ ?>selected="selected"<?php } ?>>Cuba</option> 
		<option value="Cyprus" <?php if($results['country']=="Cyprus"){ ?>selected="selected"<?php } ?>>Cyprus</option>
		 <option value="Czech Republic" <?php if($results['country']=="Czech Republic"){ ?>selected="selected"<?php } ?>>Czech Republic</option>
		<option value="Denmark" <?php if($results['country']=="Denmark"){ ?>selected="selected"<?php } ?>>Denmark</option> 
		<option value="Djibouti" <?php if($results['country']=="Djibouti"){ ?>selected="selected"<?php } ?>>Djibouti</option>
		<option value="Dominica" <?php if($results['country']=="Dominica"){ ?>selected="selected"<?php } ?>>Dominica</option>
		 <option value="Dominican Republic" <?php if($results['country']=="Dominican Republic"){ ?>selected="selected"<?php } ?>>Dominican Republic</option> 
		<option value="Ecuador" <?php if($results['country']=="Ecuador"){ ?>selected="selected"<?php } ?>>Ecuador</option>
		 <option value="Egypt" <?php if($results['country']=="Egypt"){ ?>selected="selected"<?php } ?>>Egypt</option> 
		<option value="El Salvador" <?php if($results['country']=="El Salvador"){ ?>selected="selected"<?php } ?>>El Salvador</option> 
		<option value="Equatorial Guinea" <?php if($results['country']=="Equatorial Guinea"){ ?>selected="selected"<?php } ?>>Equatorial Guinea</option>
		<option value="Eritrea" <?php if($results['country']=="Eritrea"){ ?>selected="selected"<?php } ?>>Eritrea</option>
		 <option value="Estonia" <?php if($results['country']=="Estonia"){ ?>selected="selected"<?php } ?>>Estonia</option>
		<option value="Ethiopia" <?php if($results['country']=="Ethiopia"){ ?>selected="selected"<?php } ?>>Ethiopia</option> 
		<option value="Falkland Islands (Malvinas)" <?php if($results['country']=="Falkland Islands (Malvinas)"){ ?>selected="selected"<?php } ?>>Falkland Islands (Malvinas)</option>
		<option value="Faroe Islands" <?php if($results['country']=="Faroe Islands"){ ?>selected="selected"<?php } ?>>Faroe Islands</option>
		<option value="Fiji" <?php if($results['country']=="Fiji"){ ?>selected="selected"<?php } ?>>Fiji</option> 
		<option value="Finland" <?php if($results['country']=="Finland"){ ?>selected="selected"<?php } ?>>Finland</option>
		 <option value="France" <?php if($results['country']=="France"){ ?>selected="selected"<?php } ?>>France</option>
		  <option value="French Guiana" <?php if($results['country']=="French Guiana"){ ?>selected="selected"<?php } ?>>French Guiana</option>
		<option value="French Polynesia" <?php if($results['country']=="French Polynesia"){ ?>selected="selected"<?php } ?>>French Polynesia</option>
		<option value="French Southern Territories" <?php if($results['country']=="French Southern Territories"){ ?>selected="selected"<?php } ?>>French Southern Territories</option> 
		<option value="Gabon" <?php if($results['country']=="Gabon"){ ?>selected="selected"<?php } ?>>Gabon</option> 
		<option value="Gambia" <?php if($results['country']=="Gambia"){ ?>selected="selected"<?php } ?>>Gambia</option> 
		<option value="Georgia" <?php if($results['country']=="Georgia"){ ?>selected="selected"<?php } ?>>Georgia</option> 
		<option value="Germany" <?php if($results['country']=="Germany"){ ?>selected="selected"<?php } ?>>Germany</option>
		<option value="Ghana" <?php if($results['country']=="Ghana"){ ?>selected="selected"<?php } ?>>Ghana</option>
		<option value="Gibraltar" <?php if($results['country']=="Gibraltar"){ ?>selected="selected"<?php } ?>>Gibraltar</option> 
		<option value="Greece" <?php if($results['country']=="Greece"){ ?>selected="selected"<?php } ?>>Greece</option> 
		<option value="Greenland" <?php if($results['country']=="Greenland"){ ?>selected="selected"<?php } ?>>Greenland</option>
		<option value="Grenada" <?php if($results['country']=="Grenada"){ ?>selected="selected"<?php } ?>>Grenada</option> 
		<option value="Guadeloupe" <?php if($results['country']=="Guadeloupe"){ ?>selected="selected"<?php } ?>>Guadeloupe</option> 
		<option value="Guam" <?php if($results['country']=="Guam"){ ?>selected="selected"<?php } ?>>Guam</option>
		<option value="Guatemala" <?php if($results['country']=="Guatemala"){ ?>selected="selected"<?php } ?>>Guatemala</option>
		<option value="Guinea" <?php if($results['country']=="Guinea"){ ?>selected="selected"<?php } ?>>Guinea</option> 
		<option value="Guinea-bissau" <?php if($results['country']=="Guinea-bissau"){ ?>selected="selected"<?php } ?>>Guinea-bissau</option> 
		<option value="Guyana" <?php if($results['country']=="Guyana"){ ?>selected="selected"<?php } ?>>Guyana</option> 
		<option value="Haiti" <?php if($results['country']=="Haiti"){ ?>selected="selected"<?php } ?>>Haiti</option> 
		<option value="Heard Island and Mcdonald Islands" <?php if($results['country']=="Heard Island and Mcdonald Islands"){ ?>selected="selected"<?php } ?>>Heard Island and Mcdonald Islands</option> 
		<option value="Holy See (Vatican City State)" <?php if($results['country']=="Holy See (Vatican City State)"){ ?>selected="selected"<?php } ?>>Holy See (Vatican City State)</option> 
		<option value="Honduras" <?php if($results['country']=="Honduras"){ ?>selected="selected"<?php } ?>>Honduras</option> <option value="Hong Kong">Hong Kong</option> 
		<option value="Hungary" <?php if($results['country']=="Hungary"){ ?>selected="selected"<?php } ?>>Hungary</option> 
		<option value="Iceland" <?php if($results['country']=="Iceland"){ ?>selected="selected"<?php } ?>>Iceland</option> 
		<option value="India" <?php if($results['country']=="India"){ ?>selected="selected"<?php } ?>>India</option> 
		<option value="Indonesia" <?php if($results['country']=="Indonesia"){ ?>selected="selected"<?php } ?>>Indonesia</option>
		<option value="Iran, Islamic Republic of" <?php if($results['country']=="Iran, Islamic Republic of"){ ?>selected="selected"<?php } ?>>Iran, Islamic Republic of</option> 
		<option value="Iraq" <?php if($results['country']=="Iraq"){ ?>selected="selected"<?php } ?>>Iraq</option> 
		<option value="Ireland" <?php if($results['country']=="Ireland"){ ?>selected="selected"<?php } ?>>Ireland</option>
		<option value="Israel" <?php if($results['country']=="Israel"){ ?>selected="selected"<?php } ?>>Israel</option> 
		<option value="Italy" <?php if($results['country']=="Italy"){ ?>selected="selected"<?php } ?>>Italy</option> 
		<option value="Jamaica" <?php if($results['country']=="Jamaica"){ ?>selected="selected"<?php } ?>>Jamaica</option>
		<option value="Japan" <?php if($results['country']=="Japan"){ ?>selected="selected"<?php } ?>>Japan</option>																				 <option value="Jordan" <?php if($results['country']=="Jordan"){ ?>selected="selected"<?php } ?>>Jordan</option>
		<option value="Kazakhstan" <?php if($results['country']=="Kazakhstan"){ ?>selected="selected"<?php } ?>>Kazakhstan</option>
		<option value="Kenya" <?php if($results['country']=="Kenya"){ ?>selected="selected"<?php } ?>>Kenya</option>
		<option value="Kiribati" <?php if($results['country']=="Kiribati"){ ?>selected="selected"<?php } ?>>Kiribati</option> 
		<option value="Korea, Democratic People's Republic of" <?php if($results['country']=="Korea, Democratic People's Republic of"){ ?>selected="selected"<?php } ?>>Korea, Democratic People's Republic of</option>
		<option value="Korea, Republic of" <?php if($results['country']=="Korea, Republic of"){ ?>selected="selected"<?php } ?>>Korea, Republic of</option> <option value="Kuwait">Kuwait</option> 
		<option value="Kyrgyzstan" <?php if($results['country']=="Kyrgyzstan"){ ?>selected="selected"<?php } ?>>Kyrgyzstan</option>
		<option value="Lao People's Democratic Republic" <?php if($results['country']=="Lao People's Democratic Republic"){ ?>selected="selected"<?php } ?>>Lao People's Democratic Republic</option> 
		<option value="Latvia" <?php if($results['country']=="Latvia"){ ?>selected="selected"<?php } ?>>Latvia</option>
		<option value="Lebanon" <?php if($results['country']=="Lebanon"){ ?>selected="selected"<?php } ?>>Lebanon</option> 
		<option value="Lesotho" <?php if($results['country']=="Lesotho"){ ?>selected="selected"<?php } ?>>Lesotho</option> 
		<option value="Liberia" <?php if($results['country']=="Liberia"){ ?>selected="selected"<?php } ?>>Liberia</option>																					  <option value="Libyan Arab Jamahiriya" <?php if($results['country']=="Libyan Arab Jamahiriya"){ ?>selected="selected"<?php } ?>>Libyan Arab Jamahiriya</option> 
		<option value="Liechtenstein" <?php if($results['country']=="Liechtenstein"){ ?>selected="selected"<?php } ?>>Liechtenstein</option>
		<option value="Lithuania" <?php if($results['country']=="Lithuania"){ ?>selected="selected"<?php } ?>>Lithuania</option> 
		<option value="Luxembourg" <?php if($results['country']=="Luxembourg"){ ?>selected="selected"<?php } ?>>Luxembourg</option> <option value="Macao">Macao</option>
		<option value="Macedonia, The Former Yugoslav Republic of" <?php if($results['country']=="Macedonia, The Former Yugoslav Republic of"){ ?>selected="selected"<?php } ?>>Macedonia, The Former Yugoslav Republic of</option> 
		<option value="Madagascar" <?php if($results['country']=="Madagascar"){ ?>selected="selected"<?php } ?>>Madagascar</option> 
		<option value="Malawi" <?php if($results['country']=="Malawi"){ ?>selected="selected"<?php } ?>>Malawi</option>
		<option value="Malaysia" <?php if($results['country']=="Malaysia"){ ?>selected="selected"<?php } ?>>Malaysia</option> 
		<option value="Maldives" <?php if($results['country']=="Maldives"){ ?>selected="selected"<?php } ?>>Maldives</option>
		<option value="Mali" <?php if($results['country']=="Mali"){ ?>selected="selected"<?php } ?>>Mali</option>
		 <option value="Malta" <?php if($results['country']=="Malta"){ ?>selected="selected"<?php } ?>>Malta</option>
		  <option value="Marshall Islands" <?php if($results['country']=="Marshall Islands"){ ?>selected="selected"<?php } ?>>Marshall Islands</option>
		<option value="Martinique" <?php if($results['country']=="Martinique"){ ?>selected="selected"<?php } ?>>Martinique</option>
		 <option value="Mauritania" <?php if($results['country']=="Mauritania"){ ?>selected="selected"<?php } ?>>Mauritania</option> 
		<option value="Mauritius" <?php if($results['country']=="Mauritius"){ ?>selected="selected"<?php } ?>>Mauritius</option> <option value="Mayotte">Mayotte</option>
		<option value="Mexico" <?php if($results['country']=="Mexico"){ ?>selected="selected"<?php } ?>>Mexico</option>
		<option value="Micronesia, Federated States of" <?php if($results['country']=="Micronesia, Federated States of"){ ?>selected="selected"<?php } ?>>Micronesia, Federated States of</option>
		<option value="Moldova, Republic of" <?php if($results['country']=="Moldova, Republic of"){ ?>selected="selected"<?php } ?>>Moldova, Republic of</option>
		<option value="Monaco" <?php if($results['country']=="Monaco"){ ?>selected="selected"<?php } ?>>Monaco</option>
		<option value="Mongolia" <?php if($results['country']=="Mongolia"){ ?>selected="selected"<?php } ?>>Mongolia</option> 
		<option value="Montserrat" <?php if($results['country']=="Montserrat"){ ?>selected="selected"<?php } ?>>Montserrat</option>
		<option value="Morocco" <?php if($results['country']=="Morocco"){ ?>selected="selected"<?php } ?>>Morocco</option>
		<option value="Mozambique" <?php if($results['country']=="Mozambique"){ ?>selected="selected"<?php } ?>>Mozambique</option> 
		<option value="Myanmar" <?php if($results['country']=="Myanmar"){ ?>selected="selected"<?php } ?>>Myanmar</option> 
		<option value="Namibia" <?php if($results['country']=="Namibia"){ ?>selected="selected"<?php } ?>>Namibia</option>
		<option value="Nauru" <?php if($results['country']=="Nauru"){ ?>selected="selected"<?php } ?>>Nauru</option>
		<option value="Nepal" <?php if($results['country']=="Nepal"){ ?>selected="selected"<?php } ?>>Nepal</option>
		<option value="Netherlands" <?php if($results['country']=="Netherlands"){ ?>selected="selected"<?php } ?>>Netherlands</option>
		<option value="Netherlands Antilles" <?php if($results['country']=="Netherlands Antilles"){ ?>selected="selected"<?php } ?>>Netherlands Antilles</option> 
		<option value="New Caledonia" <?php if($results['country']=="New Caledonia"){ ?>selected="selected"<?php } ?>>New Caledonia</option>
		<option value="New Zealand" <?php if($results['country']=="New Zealand"){ ?>selected="selected"<?php } ?>>New Zealand</option> 
		<option value="Nicaragua" <?php if($results['country']=="Nicaragua"){ ?>selected="selected"<?php } ?>>Nicaragua</option> 
		<option value="Niger" <?php if($results['country']=="Niger"){ ?>selected="selected"<?php } ?>>Niger</option> 
		<option value="Nigeria" <?php if($results['country']=="Nigeria"){ ?>selected="selected"<?php } ?>>Nigeria</option>
		<option value="Niue" <?php if($results['country']=="Niue"){ ?>selected="selected"<?php } ?>>Niue</option> 
		<option value="Norfolk Island" <?php if($results['country']=="Norfolk Island"){ ?>selected="selected"<?php } ?>>Norfolk Island</option>
		<option value="Northern Mariana Islands" <?php if($results['country']=="Northern Mariana Islands"){ ?>selected="selected"<?php } ?>>Northern Mariana Islands</option>
		<option value="Norway" <?php if($results['country']=="Norway"){ ?>selected="selected"<?php } ?>>Norway</option>
		<option value="Oman" <?php if($results['country']=="Oman"){ ?>selected="selected"<?php } ?>>Oman</option>
		<option value="Pakistan" <?php if($results['country']=="Pakistan"){ ?>selected="selected"<?php } ?>>Pakistan</option> 
		<option value="Palau" <?php if($results['country']=="Palau"){ ?>selected="selected"<?php } ?>>Palau</option>
		<option value="Palestinian Territory, Occupied" <?php if($results['country']=="Palestinian Territory, Occupied"){ ?>selected="selected"<?php } ?>>Palestinian Territory, Occupied</option> 
		<option value="Panama" <?php if($results['country']=="Panama"){ ?>selected="selected"<?php } ?>>Panama</option> 
		<option value="Papua New Guinea" <?php if($results['country']=="Papua New Guinea"){ ?>selected="selected"<?php } ?>>Papua New Guinea</option>
		<option value="Paraguay" <?php if($results['country']=="Paraguay"){ ?>selected="selected"<?php } ?>>Paraguay</option> <option value="Peru">Peru</option>
		<option value="Philippines" <?php if($results['country']=="Philippines"){ ?>selected="selected"<?php } ?>>Philippines</option>
		<option value="Pitcairn" <?php if($results['country']=="Pitcairn"){ ?>selected="selected"<?php } ?>>Pitcairn</option> 
		<option value="Poland" <?php if($results['country']=="Poland"){ ?>selected="selected"<?php } ?>>Poland</option>
		<option value="Portugal" <?php if($results['country']=="Portugal"){ ?>selected="selected"<?php } ?>>Portugal</option>
		<option value="Puerto Rico" <?php if($results['country']=="Puerto Rico"){ ?>selected="selected"<?php } ?>>Puerto Rico</option> 
		<option value="Qatar" <?php if($results['country']=="Qatar"){ ?>selected="selected"<?php } ?>>Qatar</option>
		<option value="Reunion" <?php if($results['country']=="Reunion"){ ?>selected="selected"<?php } ?>>Reunion</option>
		<option value="Romania" <?php if($results['country']=="Romania"){ ?>selected="selected"<?php } ?>>Romania</option>
		<option value="Russian Federation" <?php if($results['country']=="Russian Federation"){ ?>selected="selected"<?php } ?>>Russian Federation</option> 
		<option value="Rwanda" <?php if($results['country']=="Rwanda"){ ?>selected="selected"<?php } ?>>Rwanda</option>
		<option value="Saint Helena" <?php if($results['country']=="Saint Helena"){ ?>selected="selected"<?php } ?>>Saint Helena</option>
		<option value="Saint Kitts and Nevis" <?php if($results['country']=="Saint Kitts and Nevis"){ ?>selected="selected"<?php } ?>>Saint Kitts and Nevis</option> 
		<option value="Saint Lucia" <?php if($results['country']=="Saint Lucia"){ ?>selected="selected"<?php } ?>>Saint Lucia</option> 
		<option value="Saint Pierre and Miquelon" <?php if($results['country']=="Saint Pierre and Miquelon"){ ?>selected="selected"<?php } ?>>Saint Pierre and Miquelon</option>
		<option value="Saint Vincent and The Grenadines" <?php if($results['country']=="aint Vincent and The Grenadines"){ ?>selected="selected"<?php } ?>>Saint Vincent and The Grenadines</option> 
		<option value="Samoa" <?php if($results['country']=="Samoa"){ ?>selected="selected"<?php } ?>>Samoa</option> 
		<option value="San Marino" <?php if($results['country']=="San Marino"){ ?>selected="selected"<?php } ?>>San Marino</option> 
		<option value="Sao Tome and Principe" <?php if($results['country']=="Sao Tome and Principe"){ ?>selected="selected"<?php } ?>>Sao Tome and Principe</option>
		<option value="Saudi Arabia" <?php if($results['country']=="Saudi Arabia"){ ?>selected="selected"<?php } ?>>Saudi Arabia</option>
		<option value="Senegal" <?php if($results['country']=="Senegal"){ ?>selected="selected"<?php } ?>>Senegal</option> 
		<option value="Serbia and Montenegro" <?php if($results['country']=="Serbia and Montenegro"){ ?>selected="selected"<?php } ?>>Serbia and Montenegro</option>
		<option value="Seychelles" <?php if($results['country']=="Seychelles"){ ?>selected="selected"<?php } ?>>Seychelles</option> 
		<option value="Sierra Leone" <?php if($results['country']=="Sierra Leone"){ ?>selected="selected"<?php } ?>>Sierra Leone</option>
		<option value="Singapore" <?php if($results['country']=="Singapore"){ ?>selected="selected"<?php } ?>>Singapore</option>
		<option value="Slovakia" <?php if($results['country']=="Slovakia"){ ?>selected="selected"<?php } ?>>Slovakia</option>
		<option value="Slovenia" <?php if($results['country']=="Slovenia"){ ?>selected="selected"<?php } ?>>Slovenia</option>
		<option value="Solomon Islands" <?php if($results['country']=="Solomon Islands"){ ?>selected="selected"<?php } ?>>Solomon Islands</option> 
		<option value="Somalia" <?php if($results['country']=="Somalia"){ ?>selected="selected"<?php } ?>>Somalia</option>
		<option value="South Africa" <?php if($results['country']=="South Africa"){ ?>selected="selected"<?php } ?>>South Africa</option> 
		<option value="South Georgia and The South Sandwich Islands" <?php if($results['country']=="South Georgia and The South Sandwich Islands"){ ?>selected="selected"<?php } ?>>South Georgia and The South Sandwich Islands</option>
		<option value="Spain" <?php if($results['country']=="Spain"){ ?>selected="selected"<?php } ?>>Spain</option> 
		<option value="Sri Lanka" <?php if($results['country']=="Sri Lanka"){ ?>selected="selected"<?php } ?>>Sri Lanka</option> 
		<option value="Sudan" <?php if($results['country']=="Sudan"){ ?>selected="selected"<?php } ?>>Sudan</option>
		<option value="Suriname" <?php if($results['country']=="Suriname"){ ?>selected="selected"<?php } ?>>Suriname</option>
		<option value="Svalbard and Jan Mayen" <?php if($results['country']=="Svalbard and Jan Mayen"){ ?>selected="selected"<?php } ?>>Svalbard and Jan Mayen</option>
		<option value="Swaziland" <?php if($results['country']=="Swaziland"){ ?>selected="selected"<?php } ?>>Swaziland</option> 
		<option value="Sweden" <?php if($results['country']=="Sweden"){ ?>selected="selected"<?php } ?>>Sweden</option> 
		<option value="Switzerland" <?php if($results['country']=="Switzerland"){ ?>selected="selected"<?php } ?>>Switzerland</option> 
		<option value="Syrian Arab Republic" <?php if($results['country']=="Syrian Arab Republic"){ ?>selected="selected"<?php } ?>>Syrian Arab Republic</option>
		<option value="Taiwan, Province of China" <?php if($results['country']=="Taiwan, Province of China"){ ?>selected="selected"<?php } ?>>Taiwan, Province of China</option>
		<option value="Tajikistan" <?php if($results['country']=="Tajikistan"){ ?>selected="selected"<?php } ?>>Tajikistan</option> 
		<option value="Tanzania, United Republic of" <?php if($results['country']=="Tanzania, United Republic of"){ ?>selected="selected"<?php } ?>>Tanzania, United Republic of</option> 
		<option value="Thailand" <?php if($results['country']=="Thailand"){ ?>selected="selected"<?php } ?>>Thailand</option> 
		<option value="Timor-leste" <?php if($results['country']=="Timor-leste"){ ?>selected="selected"<?php } ?>>Timor-leste</option>
		<option value="Togo" <?php if($results['country']=="Togo"){ ?>selected="selected"<?php } ?>>Togo</option> 
		<option value="Tokelau" <?php if($results['country']=="Tokelau"){ ?>selected="selected"<?php } ?>>Tokelau</option>
		<option value="Tonga" <?php if($results['country']=="Tonga"){ ?>selected="selected"<?php } ?>>Tonga</option>
		<option value="Trinidad and Tobago" <?php if($results['country']=="Trinidad and Tobago"){ ?>selected="selected"<?php } ?>>Trinidad and Tobago</option> 
		<option value="Tunisia" <?php if($results['country']=="Tunisia"){ ?>selected="selected"<?php } ?>>Tunisia</option>
		<option value="Turkey" <?php if($results['country']=="Turkey"){ ?>selected="selected"<?php } ?>>Turkey</option> 
		<option value="Turkmenistan" <?php if($results['country']=="Turkmenistan"){ ?>selected="selected"<?php } ?>>Turkmenistan</option>
		<option value="Turks and Caicos Islands" <?php if($results['country']=="Turks and Caicos Islands"){ ?>selected="selected"<?php } ?>>Turks and Caicos Islands</option> 
		<option value="Tuvalu" <?php if($results['country']=="Tuvalu"){ ?>selected="selected"<?php } ?>>Tuvalu</option>
		<option value="Uganda" <?php if($results['country']=="Uganda"){ ?>selected="selected"<?php } ?>>Uganda</option> 
		<option value="Ukraine" <?php if($results['country']=="Ukraine"){ ?>selected="selected"<?php } ?>>Ukraine</option> 
		<option value="United Arab Emirates" <?php if($results['country']=="United Arab Emirates"){ ?>selected="selected"<?php } ?>>United Arab Emirates</option>
		<option value="United Kingdom" <?php if($results['country']=="United Kingdom"){ ?>selected="selected"<?php } ?>>United Kingdom</option> 
		<option value="United States" <?php if($results['country']=="United States"){ ?>selected="selected"<?php } ?>>United States</option> 
		<option value="United States Minor Outlying Islands" <?php if($results['country']=="United States Minor Outlying Islands"){ ?>selected="selected"<?php } ?>>United States Minor Outlying Islands</option>
		<option value="Uruguay" <?php if($results['country']=="Uruguay"){ ?>selected="selected"<?php } ?>>Uruguay</option>
		<option value="Uzbekistan" <?php if($results['country']=="Uzbekistan"){ ?>selected="selected"<?php } ?>>Uzbekistan</option>
		<option value="Vanuatu" <?php if($results['country']=="Vanuatu"){ ?>selected="selected"<?php } ?>>Vanuatu</option>
		<option value="Venezuela" <?php if($results['country']=="Venezuela"){ ?>selected="selected"<?php } ?>>Venezuela</option>
		<option value="Viet Nam" <?php if($results['country']=="Viet Nam"){ ?>selected="selected"<?php } ?>>Viet Nam</option>
		<option value="Virgin Islands, British" <?php if($results['country']=="Virgin Islands, British"){ ?>selected="selected"<?php } ?>>Virgin Islands, British</option>
		<option value="Virgin Islands, U.S." <?php if($results['country']=="Virgin Islands, U.S."){ ?>selected="selected"<?php } ?>>Virgin Islands, U.S.</option>
		<option value="Wallis and Futuna" <?php if($results['country']=="Wallis and Futuna"){ ?>selected="selected"<?php } ?>>Wallis and Futuna</option>
		<option value="Western Sahara" <?php if($results['country']=="Western Sahara"){ ?>selected="selected"<?php } ?>>Western Sahara</option>
		<option value="Yemen" <?php if($results['country']=="Yemen"){ ?>selected="selected"<?php } ?>>Yemen</option>
		<option value="Zambia" <?php if($results['country']=="Zambia"){ ?>selected="selected"<?php } ?>>Zambia</option>
		<option value="Zimbabwe" <?php if($results['country']=="Zimbabwe"){ ?>selected="selected"<?php } ?>>Zimbabwe</option> 
										</select>
								<?php
		
		}
	
}