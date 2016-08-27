<?php
		
class Customer extends CustomerCore
{
	public $room;
	public $nickname;
	public $inputMultiplePositions;
	public $nameMultiplePositions;
	public $username;
	public $address_postal;
	public $address_visiting;
	public $address_home;
	public $phone;
	public $phone_alt;
	public $url;
	public $url_private;
	public $url_linkedin;
	public $url_scholar;
	public $research;
	public $biography;
	public $teaching;
	public $duties;
	public $misc;
	public $orcid;
	public $mdh_id;
	public $external;
	public $away;
	public $organisation;
	public $inputMainSupervision;
	public $inputAssistantSupervision;
	public $initiativeRoleSelect;
	public $subscription;
	public $keywords;
				
	public static $definition = array(
		'table' => 'customer',
		'primary' => 'id_customer',
		'multilang' => true,
		'fields' => array(
			//'secure_key' => 				array('type' => self::TYPE_STRING, 'validate' => 'isMd5', 'copy_post' => false),
			'secure_key' => 				array('type' => self::TYPE_STRING),
			'lastname' => 					array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => true, 'size' => 32),
			'firstname' => 					array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => true, 'size' => 32),
			'email' => 						array('type' => self::TYPE_STRING, 'validate' => 'isEmail','required' => true,'size' => 128),
			//'passwd' => 					array('type' => self::TYPE_STRING, 'validate' => 'isPasswd', 'required' => true, 'size' => 32),
			'passwd' => 					array('type' => self::TYPE_STRING, 'required' => false, 'size' => 32),
			'last_passwd_gen' =>			array('type' => self::TYPE_STRING, 'copy_post' => false),
			'id_gender' => 					array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'birthday' => 					array('type' => self::TYPE_DATE, 'validate' => 'isBirthDate'),
			'newsletter' => 				array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'newsletter_date_add' =>		array('type' => self::TYPE_DATE,'copy_post' => false),
			'ip_registration_newsletter' =>	array('type' => self::TYPE_STRING, 'copy_post' => false),
			'optin' => 						array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'website' =>					array('type' => self::TYPE_STRING, 'validate' => 'isUrl'),
			'organisation' =>				array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
			'siret' =>						array('type' => self::TYPE_STRING, 'validate' => 'isSiret'),
			'ape' =>						array('type' => self::TYPE_STRING, 'validate' => 'isApe'),
			'orcid'=> 						array('type' => self::TYPE_STRING,  'size' =>128,'validate' => 'isOrcid'),
			'mdh_id'=> 						array('type' => self::TYPE_STRING,  'size' =>128, 'validate' => 'isMDHid'),
			'outstanding_allow_amount' =>	array('type' => self::TYPE_INT, 'validate' => 'isFloat', 'copy_post' => false),
			'show_public_prices' =>			array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
			'id_risk' =>					array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
			'max_payment_days' =>			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'copy_post' => false),
			'active' => 					array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
			'deleted' => 					array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
			'note' => 						array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'size' => 65000, 'copy_post' => false),
			'is_guest' =>					array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'copy_post' => false),
			'id_shop' => 					array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
			'id_shop_group' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'copy_post' => false),
			'id_default_group' => 			array('type' => self::TYPE_INT, 'copy_post' => false),
			'date_add' => 					array('type' => self::TYPE_DATE, 'copy_post' => false),
			'date_upd' => 					array('type' => self::TYPE_DATE, 'copy_post' => false),
			//'id_position' => 				array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),
			'room' => 						array('type' => self::TYPE_STRING, 'required' => false, 'size' => 32),
			'nickname' => 					array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => false, 'size' => 32),
			'username' => 					array('type' => self::TYPE_STRING, 'validate' => 'isGenericName', 'required' => false, 'size' => 32),
			'address_postal' => 			array('type' => self::TYPE_STRING, 'required' => false, 'size' => 255),
			'address_visiting' => 			array('type' => self::TYPE_STRING, 'required' => false, 'size' => 255),
			'address_home' => 				array('type' => self::TYPE_STRING, 'required' => false, 'size' => 255),
			'room' => 						array('type' => self::TYPE_STRING, 'required' => false, 'size' => 32),
			'phone' => 						array('type' => self::TYPE_STRING, 'required' => false, 'size' => 32),
			'phone_alt' => 					array('type' => self::TYPE_STRING, 'required' => false, 'size' => 32),
			'url' => 						array('type' => self::TYPE_STRING, 'validate' => 'isUrl','required' => false, 'size' => 255),
			'url_private' => 				array('type' => self::TYPE_STRING, 'validate' => 'isUrl','required' => false, 'size' => 255),
			'url_linkedin' => 				array('type' => self::TYPE_STRING, 'validate' => 'isUrl','required' => false, 'size' => 255),
			'url_scholar' => 				array('type' => self::TYPE_STRING, 'validate' => 'isUrl','required' => false, 'size' => 255),
			'research' => 					array('type' => self::TYPE_HTML, 'lang' => true,  'validate' => 'isCleanHtml'),
			'biography' => 					array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml'),
			'teaching' => 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => false,  'size' => 3999999999999),
			'duties' => 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => false,  'size' => 3999999999999),
			'misc' =>	 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => false, 'size' => 3999999999999),
			'external' => 					array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'away' =>	 					array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'subscription' =>	 			array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'keywords' => 					array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml', 'required' => false, 'size' => 3999999999999),
			
		),
	);				

	/** @var string id_image is the customer ID when an image exists and 'default' otherwise */
	public $id_image = 'default';
	
	protected static $_defaultGroupId = array();
	protected static $_customerHasAddress = array();
	protected static $_customer_groups = array();
	
	protected static $_related_initiatives = array();


	public function __construct($id_category = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_category, $id_lang, $id_shop);
		$this->id_image = ($this->id && file_exists(_PS_STAFF_IMG_DIR_.(int)$this->id.'.jpg')) ? (int)$this->id : false;
		$this->image_dir = _PS_STAFF_IMG_DIR_;
	}
	
	
	public function add($autodate = true, $null_values = true)
	{ 	
		$success = parent::add($autodate, $null_values);
		$this->updateCustomerInitiatives($this->initiativeRoleSelect);
		$this->updateSupervision($this->inputMainSupervision, $this->inputAssistantSupervision);
		$this->updateCustomerPosition($this->inputMultiplePositions); 
		return $success;
	}

	public function update($nullValues = false)
	{
	
		if (Context::getContext()->controller->controller_type == 'admin')
		{
			$this->updateCustomerInitiatives($this->initiativeRoleSelect);
			$this->updateSupervision($this->inputMainSupervision, $this->inputAssistantSupervision);
			$this->updateCustomerPosition($this->inputMultiplePositions); 

		}		
		
		return parent::update(true);
	}

	public function delete()
	{
		$this->deleteImage();
		if (parent::delete())
		{
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_initiative` WHERE `id_customer` = '.(int)$this->id);
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'supervision` WHERE `id_supervisor` = '.(int)$this->id.' OR `id_student` = '.(int)$this->id);
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_position` WHERE `id_customer` = '.(int)$this->id);

			return true;
		}
		return false;
	}
	
	/**
	 * Return customers list
	 *
	 * @return array Customers
	 */
	public static function getCustomers($id_shop = null, $id_initiative = null, $id_project = null, $id_lang = 0, $id_role = null, $only_active = 0)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT c.`id_customer`, `email`,`url_private`, `firstname`, `lastname`, `phone`, `room`, GROUP_CONCAT(pl.`name` order by pl.name separator ",") as title, cl.`keywords`, c.`subscription`
			FROM `'._DB_PREFIX_.'customer` c
			LEFT JOIN `'._DB_PREFIX_.'customer_position` AS pcp ON (pcp.id_customer=c.id_customer and (pcp.date_end is null or pcp.date_end=0 or pcp.date_end>curdate()))
			LEFT JOIN `'._DB_PREFIX_.'customer_lang` AS cl ON (c.`id_customer` = cl.`id_customer` AND cl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (pcp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')';
		if ($id_initiative)
		{
			$sql.='LEFT JOIN `'._DB_PREFIX_.'customer_initiative` AS ci ON (c.`id_customer` = ci.`id_customer`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ci.`id_initiative` = i.`id_initiative`)';
		}
		
		if($id_project)
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON (c.`id_customer` = cp.`id_customer`)';
		
		$sql.='WHERE c.deleted!=1 ';
		if ($id_initiative)
		{
			$sql .= ' AND i.`id_initiative` = '.(int)$id_initiative;
		}
		if ($only_active)
		{
			$sql .= ' AND c.`active` = 1';
		}
		if ($id_role && $id_initiative)
		{
			$sql .= ' AND ci.`id_role` = '.(int)$id_role;
		}
		if ($id_role && $id_project)
		{
			$sql .= ' AND cp.`id_role` = '.(int)$id_role;
		}
		if ($id_project)
		{
			$sql .= ' AND cp.`id_project` = '.(int)$id_project;
		}
		if ($id_shop)
		{
			$sql .= ' AND c.id_customer IN (
			SELECT DISTINCT c.`id_customer`
			FROM `'._DB_PREFIX_.'customer` c
			LEFT OUTER JOIN `'._DB_PREFIX_.'customer_initiative` AS ci ON (c.`id_customer` = ci.`id_customer`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ci.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		$sql .= ' GROUP BY c.id_customer';
        if($id_project)
            $sql.=' ORDER BY Field(pl.name,"Professor","Associate Professor","Adjunct Professor","Visiting Professor","Post Doc","Doctoral Student") ASC,c.`firstname`,c.`lastname` DESC';
        else     
            $sql.=' ORDER BY c.`firstname`, c.`lastname` ASC';
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	}

	public static function getNumberOfCustomers($id_shop = null, $id_lang = 0, $position = null, $only_active = 1)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT c.*
			FROM `'._DB_PREFIX_.'customer` c
			LEFT JOIN `'._DB_PREFIX_.'customer_position` AS pcp ON pcp.id_customer=c.id_customer
			LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (pcp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')';
		
		$sql.='WHERE c.deleted!=1 ';
		if ($only_active)
		{
			$sql .= ' AND c.`active` = 1';
		}
		if ($position)
		{
			$sql .= ' AND pl.`name` = "'. $position .'"';
		}
		if ($id_shop)
		{
			$sql .= ' AND c.id_customer IN (
			SELECT DISTINCT c.`id_customer`
			FROM `'._DB_PREFIX_.'customer` c
			LEFT OUTER JOIN `'._DB_PREFIX_.'customer_initiative` AS ci ON (c.`id_customer` = ci.`id_customer`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ci.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		//echo $sql;
		$customers =  Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		return count ($customers);
	}

	public static function getCustomerById($id_customer, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT  c.*, cl.*, GROUP_CONCAT(pl.`name` order by pl.name separator ", ") as title
		FROM `'._DB_PREFIX_.'customer` c
		LEFT JOIN `'._DB_PREFIX_.'customer_lang` AS cl ON (c.`id_customer` = cl.`id_customer` AND cl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'customer_position` AS pcp ON (pcp.`id_customer` = c.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (pcp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')
		WHERE c.deleted!=1 and c.id_customer = '.$id_customer.' and (pcp.date_end is null or pcp.date_end=0 or pcp.date_end>curdate())
        GROUP BY c.id_customer');
			
		return $row;		
	}	

	public static function getCustomerShop($id_customer)
	{

		$sql = 'SELECT i.`id_shop`
			FROM `'._DB_PREFIX_.'customer` c
			LEFT JOIN `'._DB_PREFIX_.'customer_initiative` AS ci ON (c.`id_customer` = ci.`id_customer`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ci.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` > 0 and c.id_customer='.(int)$id_customer;
		
	
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);	
	}	
	
    public function getCustomerDevelopedCourses($id_customer){

        $id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT c.*, cl.`name`, ctl.`name` AS type
		FROM `'._DB_PREFIX_.'course` c
		LEFT JOIN `'._DB_PREFIX_.'course_lang` AS cl ON (c.`id_course` = cl.`id_course` AND cl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'course_type` ct ON c.`id_course_type` = ct.`id_course_type`
		LEFT JOIN `'._DB_PREFIX_.'course_type_lang` ctl ON (ct.`id_course_type` = ctl.`id_course_type` AND  ctl.`id_lang` = '.(int)$id_lang.')
        LEFT JOIN `'._DB_PREFIX_.'course_developers` cd ON cd.id_course=c.id_course
        where cd.id_course_developer= '.$id_customer.' 
		ORDER BY cl.`name`, c.`id_course` ASC');
    }
    public function getCustomerInstructedCourses($id_customer){

        $id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT c.*, cl.`name`, ctl.`name` AS type, ci.course_code,ci.start_date,ci.end_date,ci.url
		FROM `'._DB_PREFIX_.'course` c
		LEFT JOIN `'._DB_PREFIX_.'course_lang` AS cl ON (c.`id_course` = cl.`id_course` AND cl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'course_type` ct ON c.`id_course_type` = ct.`id_course_type`
		LEFT JOIN `'._DB_PREFIX_.'course_type_lang` ctl ON (ct.`id_course_type` = ctl.`id_course_type` AND  ctl.`id_lang` = '.(int)$id_lang.')
        LEFT JOIN `'._DB_PREFIX_.'course_instance` ci ON (ci.`id_course` = c.`id_course`)
        LEFT JOIN `'._DB_PREFIX_.'course_instance_instructors` cii ON cii.id_course=c.id_course
        where cii.id_course_instructor= '.$id_customer.' 
		ORDER BY cl.`name`, c.`id_course` ASC');
    }
	public static function getShopLeader($id_shop, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$leader = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT  c.*
		FROM `'._DB_PREFIX_.'customer` c
		LEFT JOIN `'._DB_PREFIX_.'customer_initiative` AS ci ON (c.`id_customer` = ci.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ci.`id_initiative` = i.`id_initiative`)
		LEFT JOIN `'._DB_PREFIX_.'role_lang` AS rl ON (ci.`id_role` = rl.`id_role` AND rl.`id_lang` = '.(int)$id_lang.')
		WHERE rl.name = "leader" AND i.id_shop = '.(int)$id_shop);

		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT  c.*, cl.*, GROUP_CONCAT(pl.`name` order by pl.name separator ", ") as title
		FROM `'._DB_PREFIX_.'customer` c
		LEFT JOIN `'._DB_PREFIX_.'customer_lang` AS cl ON (c.`id_customer` = cl.`id_customer` AND cl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'customer_position` AS pcp ON (pcp.`id_customer` = c.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (pcp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')
		WHERE c.id_customer = '.$leader['id_customer'].' GROUP BY c.id_customer');
		
		return $row;		
	}	
	public static function getCustomerByPositionName($id_lang = null, $position_name)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT  c.*, cl.*, GROUP_CONCAT(pl.`name` order by pl.name separator ",") as title
		FROM `'._DB_PREFIX_.'customer` c
		LEFT JOIN `'._DB_PREFIX_.'customer_lang` AS cl ON (c.`id_customer` = cl.`id_customer` AND cl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'customer_position` AS pcp ON (pcp.`id_customer` = c.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (pcp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')
		WHERE c.deleted!=1 and pl.name = "'.$position_name.'"
        GROUP BY c.id_customer');
			
		return $row;		
	}	

	
	public function cleanCustomerPositions()
		{
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_position` WHERE `id_customer` = '.(int)$this->id);
		}
	public function updateCustomerPosition($list){
		$this->cleanCustomerPositions();
		$exploded = explode('-', $list);
		foreach ($exploded as $key=>$item)
		{
		$ext=(int)Tools::getValue("externalStatus".$item."_".$key);
		$startDate=Tools::getValue("startDatePosition".$item."_".$key);
		$endDate=Tools::getValue("endDatePosition".$item."_".$key);
		$org=Tools::getValue("organisationPosition".$item."_".$key);

		if((int)$item>0)
			{$row = array('id_customer' => (int)$this->id, 'id_position' => (int)$item);
			if($ext!=null)$row['external']=$ext;
			if($startDate!=null)$row['date_start']=date($startDate);
			if($endDate!=null) $row['date_end']=date($endDate);
			if($org!=null) $row['organization']=$org;
	
				Db::getInstance()->insert('customer_position', $row);
				
				}
		}	
		}
		
	/**
	 * Update initiatives associated to the object
	 */
	public function updateCustomerInitiatives($list)
	{
		foreach ($list as $item)
		{
			$exploded = explode('_', $item);
			$initiatives['id_initiative'][] = $exploded[0];
			$initiatives['id_role'][] = $exploded[1];
		}				
		
		$this->cleanCustomerInitiatives();
		if ($initiatives && !empty($initiatives))
			$this->addCustomerInitiatives($initiatives);
	}

	public function cleanCustomerInitiatives()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_initiative` WHERE `id_customer` = '.(int)$this->id);
	}

	public function addCustomerInitiatives($initiatives)
	{
		for ($i = 0; $i < count($initiatives['id_initiative']); $i++) 
		{
			if ($initiatives['id_role'][$i])
			{
				$row = array('id_customer' => (int)$this->id, 'id_initiative' => (int)$initiatives['id_initiative'][$i], 'id_role' => (int)$initiatives['id_role'][$i]);
				Db::getInstance()->insert('customer_initiative', $row);
			}			
		}
	}
	
	/**
	 * Update supervised students
	 */
	public function updateSupervision($inputMainSupervision, $inputAssistantSupervision)
	{
		if ($inputMainSupervision && !empty($inputMainSupervision))
		{
			$exploded = explode('-', substr($inputMainSupervision, 0, -1));
			foreach ($exploded as $item)
				$mainSupervision[] = $item;
		}

		if ($inputAssistantSupervision && !empty($inputAssistantSupervision))
		{
			$exploded = explode('-', substr($inputAssistantSupervision, 0, -1));
			foreach ($exploded as $item)
				$assistantSupervision[] = $item;
		}
		
		$this->cleanSupervision();
			
			$this->addSupervision($mainSupervision, $assistantSupervision);
	}

	public function cleanSupervision()
	{
	//if($this->isStudent())
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'supervision` WHERE `id_student` = '.(int)$this->id);
	//	else
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'supervision` WHERE `id_supervisor` = '.(int)$this->id);
	}

	public function addSupervision($mainSupervision, $assistantSupervision)
	{
	
	if($this->isStudent())
		{
		if ($mainSupervision && !empty($mainSupervision))
				{
					foreach ($mainSupervision as $supervisor)
					{
						$row = array('id_supervisor' => (int)$supervisor, 'id_student' => (int)$this->id, 'id_supervision_type' => 1);
						Db::getInstance()->insert('supervision', $row);
					}
				}
			if ($assistantSupervision && !empty($assistantSupervision))
				{
					foreach ($assistantSupervision as $supervisor)
					{
						$row = array('id_supervisor' => (int)$supervisor, 'id_student' => (int)$this->id, 'id_supervision_type' => 2);
						Db::getInstance()->insert('supervision', $row);
					}
				}
		}
		else{
			if ($mainSupervision && !empty($mainSupervision))
				{
					foreach ($mainSupervision as $student)
					{
						$row = array('id_supervisor' => (int)$this->id, 'id_student' => (int)$student, 'id_supervision_type' => 1);
						Db::getInstance()->insert('supervision', $row);
					}
				}
			if ($assistantSupervision && !empty($assistantSupervision))
				{
					foreach ($assistantSupervision as $student)
					{
						$row = array('id_supervisor' => (int)$this->id, 'id_student' => (int)$student, 'id_supervision_type' => 2);
						Db::getInstance()->insert('supervision', $row);
					}
				}
		}
	}
	
	public static function getInitiativesStatic($id_customer)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT i.*, il.`name`, il.`acronym`, il.`focus`, il.`description`, itl.`name` AS initiative_type, rl.`name` AS role, ci.`id_role` AS id_role
			FROM '._DB_PREFIX_.'customer_initiative ci
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON ci.`id_initiative` = i.`id_initiative`
			LEFT JOIN `'._DB_PREFIX_.'initiative_lang` AS il ON (ci.`id_initiative` = il.`id_initiative` AND il.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'role_lang` AS rl ON (ci.`id_role` = rl.`id_role` AND rl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'initiative_type_lang` AS itl ON (i.`id_initiative_type` = itl.`id_initiative_type` AND itl.`id_lang` = '.(int)$id_lang.')
			WHERE ci.`id_customer` = '.(int)$id_customer);
	}
		
	public function getInitiatives()
	{
		return Customer::getInitiativesStatic((int)$this->id);
	}
		
	public static function getRoleIdStatic($id_customer, $id_initiative)
	{
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT `id_role` AS id_role
			FROM '._DB_PREFIX_.'customer_initiative 
			WHERE `id_customer` = '.(int)$id_customer.'
			AND `id_initiative` = '.(int)$id_initiative);
			
		return $row['id_role'];
	}
	
	public function getRoleId($id_initiative)
	{
		return Customer::getRoleIdStatic((int)$this->id, $id_initiative);
	}
	
	public static function getSupervisedStudentsStatic($id_customer, $type, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
		if ($type == 'main')
			$supervision_type = 1;
		else 
			$supervision_type = 2;
			
		$sql = '
			SELECT DISTINCT c.*, stl.`name`, s.`former`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'supervision` AS s ON c.`id_customer` = s.`id_student`
			LEFT JOIN `'._DB_PREFIX_.'supervision_type_lang` AS stl ON (s.`id_supervision_type` = stl.`id_supervision_type` AND stl.`id_lang` = '.(int)$id_lang.')
			WHERE s.`id_supervisor` = '.(int)$id_customer.' 
			AND s.`id_supervision_type` = '.$supervision_type.'
			ORDER BY c.`firstname`, c.`lastname` ASC';
			
		$people = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		foreach ($people as $k => $person)
			$people[$k]['positions'] = Customer::getPositionsById($person['id_customer']); 
		
		return $people;	
	}
	
	public function getSupervisedStudents($type)
	{
		return Customer::getSupervisedStudentsStatic((int)$this->id, $type);
	}	
	
	public function isStudent($myPositions=null)
	{
	if($this->nameMultiplePosition!=null and $myPositions==null)
		return (strpos($this->nameMultiplePosition,'Doctoral student')!=false or strpos($this->nameMultiplePosition,'Industrial Doctoral Student')!=false);
		
	else{
	if($myPositions==null){
	$myPositions=Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT cp.id_customer,pl.name
			FROM '._DB_PREFIX_.'customer_position cp
			LEFT JOIN '._DB_PREFIX_.'position_lang pl on pl.id_position=cp.id_position
			WHERE cp.`id_customer` = '.(int)$this->id);	
	}
	
	foreach ($myPositions as $position)
			{
			if($position['name']=='Doctoral student' or $position['name']=='Industrial Doctoral Student')
			return true;
			}
	return false;
	//return (strpos($my_positions['position'],'Doctoral student')!=false or strpos($my_positions['position'],'Industrial Doctoral Student')!=false);
		}
	}	
	
	public static function getSupervisorsStatic($id_customer, $type, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
		if ($type == 'main')
			$supervision_type = 1;
		else 
			$supervision_type = 2;
			
		$sql = '
			SELECT DISTINCT c.*, stl.`name`, s.`former`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'supervision` AS s ON c.`id_customer` = s.`id_supervisor`
			LEFT JOIN `'._DB_PREFIX_.'supervision_type_lang` AS stl ON (s.`id_supervision_type` = stl.`id_supervision_type` AND stl.`id_lang` = '.(int)$id_lang.')
			WHERE s.`id_student` = '.(int)$id_customer.' 
			AND s.`id_supervision_type` = '.$supervision_type.'
			ORDER BY c.`firstname`, c.`lastname` ASC';
			
		$people = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		foreach ($people as $k => $person)
			$people[$k]['positions'] = Customer::getPositionsById($person['id_customer']); 
		
		return $people;	
	}
	
	public function getSupervisors($type)
	{
		return Customer::getSupervisorsStatic((int)$this->id, $type);
	}	
	
	public static function getPositionsById($id_customer, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT pl.name
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_position` AS cp ON cp.id_customer = c.id_customer
			LEFT JOIN `'._DB_PREFIX_.'position_lang` AS pl ON (cp.`id_position` = pl.`id_position` AND pl.`id_lang` = '.(int)$id_lang.')
			WHERE c.`id_customer` = '.(int)$id_customer.' 
			ORDER BY `name` ASC';
			
		$positions = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		return $positions;
	}
	
	public static function getSupervisionTypeIdStatic($id_supervisor, $id_student)
	{
		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT id_supervision_type
			FROM '._DB_PREFIX_.'supervision 
			WHERE `id_supervisor` = '.(int)$id_supervisor.'
			AND `id_student` = '.(int)$id_student);
			
		return $row['id_supervision_type'];
	}
	
	public function getSupervisionTypeId($id_customer)
	{
		return Customer::getSupervisionTypeIdStatic((int)$this->id, $id_customer);
	}
	
	public static function getMyPositionStatic($myId)
	{
	
		//$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow(
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pl.id_position,pl.name,cp.date_start,cp.date_end,cp.external,cp.organization
			FROM '._DB_PREFIX_.'customer_position cp
			LEFT JOIN '._DB_PREFIX_.'position_lang pl on pl.id_position=cp.id_position
			WHERE cp.`id_customer` = '.$myId);
	//return $row;
			//$this->id_position=$row['id_position'];
		
	}
	public function getMyPosition(){
	return Customer::getMyPositionStatic((int)$this->id);
	}
	
	public static function getMyCurrentPositionStatic($myId)
	{
	
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT pl.id_position,pl.name,cp.date_start,cp.date_end,cp.external,cp.organization
			FROM '._DB_PREFIX_.'customer_position cp
			LEFT JOIN '._DB_PREFIX_.'position_lang pl on pl.id_position=cp.id_position
			WHERE cp.`id_customer` = '.$myId.' and (cp.date_end is null or cp.date_end=0 or cp.date_end > curdate())');
	}
	public function getMyCurrentPosition(){
	return Customer::getMyCurrentPositionStatic((int)$this->id);
	}
	
	
	public static function getMasterTheses($id_customer)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$row = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
			SELECT  c.* 
			FROM `'._DB_PREFIX_.'customer` c
			WHERE c.id_customer = '.$id_customer);
		
		// clean this mess as soon as we get rid of the exjobb table
		$dbh =  mysql_connect('localhost','nobody','');
		mysql_select_db('idt', $dbh);

		$sql = 'SELECT id, title, status
			FROM `exjobb` 
			WHERE handIdt1 = ' . $row['old_id'] . '
			OR handIdt2 = ' . $row['old_id'] . '
			OR exam = ' . $row['old_id'] . '
			ORDER BY status ASC, title ASC';
		
		$result = mysql_query($sql, $dbh);
		if($result)
		while ($row = mysql_fetch_array($result)) {
		    if ($row['status'] != 'dolt')
		    	$theses[] = $row;
		}
		
		if ($theses and count($theses))
		{
			foreach ($theses as $k => $thesis)
			{
				if ($thesis['status'] == 'valt')
					$theses[$k]['status'] = 'selected'; 			
				elseif ($thesis['status'] == 'onhold')
					$theses[$k]['status'] = 'on-hold'; 			
				elseif (substr($thesis['status'], 0, 1) == 'p')
					$theses[$k]['status'] = 'in progress'; 			
				elseif ($thesis['status'] == 'ledigt')
					$theses[$k]['status'] = 'available'; 			
				elseif (substr($thesis['status'], 0, 1) == 'f')
					$theses[$k]['status'] = 'finished'; 	
			
				$theses[$k]['title'] = utf8_encode ($theses[$k]['title']);			
			}	
		}

		mysql_close($dbh);

		return $theses;	
	}
}

