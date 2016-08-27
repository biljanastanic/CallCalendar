<?php
/*
CREATE TABLE `ps_application` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_application_status` int(11) DEFAULT NULL,
  `id_project_type` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `money_requested` int(11) NOT NULL DEFAULT '0',
  `mdhPartBudget` int(11) NOT NULL DEFAULT '0',
  `id_call` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_application`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;


CREATE TABLE `ps_application_lang` (
  `id_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `acronym` varchar(32) DEFAULT NULL,
  `keywords` text,
  `overview` text,
  PRIMARY KEY (`id_application`,`id_lang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
*/
class ApplicationCore extends ObjectModel
{
	public $id;
	
	public $id_application;

	public $id_call;

	public $id_application_status;

	public $id_project_type;

 	public $name;

 	public $money_requested;
	
 	public $mdhPartBudget;
	
	public $acronym;

	public $keywords;
	
	public $overview;

	public $url;

	/** @var string Object creation date */
	public $date_start;

	/** @var string Object last modification date */
	public $date_end;

	public $partnerBox;
	
	public $inputLeaders;
	public $inputMembers;
	public $inputAssociated;
	
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'application',
		'primary' => 'id_application',
		'multilang' => true,
		'fields' => array(
			'url' => 				array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isUrl', 'size' => 255),
			'id_call' => 	array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'date_start' => 			array('type' => self::TYPE_DATE),
			'date_end' => 			array('type' => self::TYPE_DATE),
			'id_project_type' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_application_status' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),

			'money_requested' => array('type' => self::TYPE_INT,'validate' => 'isInt'),		
			'mdhPartBudget' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 255),
			'acronym' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 32),
			'keywords' => 			array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml'),
			'overview' =>			array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml')
			
		),
	);

	/**
	* Get all applications
	*
	* @return array of Applications 
	*/
	public static function getApplications($id_lang = 0, $id_member = null, $id_status = null, $id_partner=null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT a.*, al.`name`, al.`acronym`, al.`keywords`, al.`overview`, ptl.`name` AS type, apsl.`name` AS status, cl.`title` AS call_title
		FROM `'._DB_PREFIX_.'application` a
		LEFT JOIN `'._DB_PREFIX_.'application_lang` AS al ON (a.`id_application` = al.`id_application` AND al.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON a.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'application_status` aps ON a.`id_application_status` = aps.`id_application_status`
		LEFT JOIN `'._DB_PREFIX_.'application_status_lang` apsl ON apsl.`id_application_status` = aps.`id_application_status`
		LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (cl.`id_call` = c.`id_call` AND cl.`id_lang` = '.(int)$id_lang.')';		
		
		if($id_member)
		{
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'customer_application` AS ca ON (a.`id_application` = ca.`id_application`)';
		}
		
		if($id_partner)
		{
			$sql .='LEFT JOIN `'._DB_PREFIX_.'application_partner` ap ON ap.`id_application` = a.`id_application`';
		}
		
		$sql.='WHERE 1 ';
		
		if ($id_status)
		{
			$sql .= ' AND a.`id_application_status` = ' . (int)$id_status;
		}
		if ($id_member)
		{
			$sql .= ' AND ca.`id_customer` = "'. $id_member . '"';
		}
		
		if($id_partner)
		{
			$sql.=' AND ap.`id_partner`='.(int)$id_partner;
		}
		
		$sql .= ' ORDER BY ptl.`name` ASC';

		$applications = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		foreach ($applications as $k => $application)
			$applications[$k]['members'] = Application::getApplicationRelatedMembersById($application['id_application']); 
		
		return $applications;
	}
	
	
	/**
	* Get Application by Id
	*
	* @return Application 
	*/
	public static function getApplicationById($id_application = null, $id_lang = 0)
	{
		if(!$id_application) $id_application=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = '
		SELECT a.*, al.`name`, al.`acronym`, al.`keywords`, al.`overview`, ptl.`name` AS type, apsl.`name` AS status, cl.`title` AS call_name
		FROM `'._DB_PREFIX_.'application` a
		LEFT JOIN `'._DB_PREFIX_.'application_lang` AS al ON (a.`id_application` = al.`id_application` AND al.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON a.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'application_status` aps ON a.`id_application_status` = aps.`id_application_status`
		LEFT JOIN `'._DB_PREFIX_.'application_status_lang` apsl ON apsl.`id_application_status` = aps.`id_application_status`
		LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		LEFT JOIN `'._DB_PREFIX_.'call_lang` cl ON (cl.`id_call` = c.`id_call` AND cl.`id_lang` = '.(int)$id_lang.')
		WHERE a.`id_application` = '.$id_application;

		$application = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

		$application['members'] = Application::getApplicationRelatedMembersById($id_application); 
		
		$application['partners'] = Application::getApplicationRelatedPartners($id_application); 

		return $application;
	}
	
	
	/**
	* Static function for getting all application's members
	*
	* @return application's members 
	*/
	public static function getApplicationRelatedMembersById($id_application)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, rl.`name` AS role, ca.`id_application`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_application` AS ca ON c.`id_customer` = ca.`id_customer`
			LEFT JOIN `'._DB_PREFIX_.'role_lang` AS rl ON ca.`id_role` = rl.`id_role`
			WHERE ca.`id_application` = '.(int)$id_application.'
			ORDER BY c.`firstname`, c.`lastname`');
	}
	
	
	/**
	* Static function for getting all application's partners
	*
	* @return application's partners 
	*/
	public function getApplicationRelatedPartners($id_application = null, $id_lang = null)
	{
			if(!$id_application)
				$id_application=(int)$this->id;
			if (!$id_lang)
				$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
	
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT ap.`id_partner`, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, p.url
			FROM `'._DB_PREFIX_.'application_partner` AS ap
			LEFT JOIN `'._DB_PREFIX_.'partner` p on ap.`id_partner` = p.`id_partner`
			LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (ap.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` AS ptl ON (p.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'country_lang` AS cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
			WHERE ap.`id_application` = '.(int)$id_application.'
			ORDER BY ptl.`name` ASC, pl.`name` ASC');
	}
	

	

	//update application's partners, members, leaders and associated before adding new application
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		$this->updateApplicationRelationships($this->partnerBox);
		$this->updateStaff($this->inputLeaders, $this->inputMembers, $this->inputAssociated);
		
		return $success;
	}

	//update application's partners, members, leaders and associated before updating application
	public function update($nullValues = false)
	{
		if (Context::getContext()->controller->controller_type == 'admin')
		{
			$this->updateApplicationRelationships($this->partnerBox);
			$this->updateStaff($this->inputLeaders, $this->inputMembers, $this->inputAssociated);
		}
		return parent::update(true);
	}

	//delete application's partners, members, leaders and associated before deleting application
	public function delete()
	{
		if (parent::delete())
		{
			$this->cleanApplicationRelationships();
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_application` WHERE `id_application` = '.(int)$this->id);

			return true;
		}
		return false;
	}

	/**
	 * 
	 * Delete application's partners
	 * 
	 */
	public function cleanApplicationPartners()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'application_partner` WHERE `id_application` = '.(int)$this->id);
	}
	

	/**
	 * 
	 * Delete application's relationships, in this case only partners
	 * 
	 */
	public function cleanApplicationRelationships()
	{
		
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'application_partner` WHERE `id_application` = '.(int)$this->id);


	}
	
	/**
	 * 
	 * Delete application's partners and then add new ones
	 * 
	 * @param list new partners
	 * 
	 */
	public function updateApplicationPartners($list)
	{
		$this->cleanApplicationPartners();
		if ($list && !empty($list))
			$this->addApplicationPartners($list);
	}

	/**
	 * 
	 * Delete application's relationships and then add new ones (only partners)
	 * 
	 * @param list new partners
	 * 
	 */
	public function updateApplicationRelationships($partner_list)
	{
		$this->cleanApplicationRelationships();
		
		if ($partner_list && !empty($partner_list))
			$this->addApplicationPartners($partner_list);
	}
	
	
	/**
	 * 
	 * Add aplication partners
	 * 
	 * @param list new partners
	 * 
	 */
	public function addApplicationPartners($partners)
	{
		foreach ($partners as $partner)
		{
			$row = array('id_application' => (int)$this->id, 'id_partner' => (int)$partner);
			Db::getInstance()->insert('application_partner', $row);
		}
	}

	/**
	* Static function for getting all application's leaders
	*
	* @return application's leaders 
	*/
	public static function getLeadersStatic($id_application)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, ca.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_application` AS ca ON c.`id_customer` = ca.`id_customer`
			WHERE ca.`id_role` = 1 AND ca.`id_application` = '.(int)$id_application);
	}
	
	/**
	* Get all application's leaders
	*
	* @return application's leaders 
	*/
	public function getLeaders()
	{
		return Application::getLeadersStatic((int)$this->id);
	}

	/**
	* Static function for getting all application's members
	*
	* @return application's members 
	*/
	public static function getMembersStatic($id_application)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, ca.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_application` AS ca ON c.`id_customer` = ca.`id_customer`
			WHERE ca.`id_role` = 2 AND ca.`id_application` = '.(int)$id_application);
	}
	
	/**
	* Get all application's members
	*
	* @return application's members 
	*/
	public function getMembers()
	{
		return Application::getMembersStatic((int)$this->id);
	}

	/**
	* Static function for getting all application's associated
	*
	* @return application's associated 
	*/
	public static function getAssociatedStatic($id_application)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, ca.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_application` AS ca ON c.`id_customer` = ca.`id_customer`
			WHERE ca.`id_role` = 3 AND ca.`id_application` = '.(int)$id_application);
	}
	
	/**
	* Get all application's associated
	*
	* @return application's associated 
	*/
	public function getAssociated()
	{
		return Application::getAssociatedStatic((int)$this->id);
	}	
	
	/**
	 * Update application staff (leaders, members, associated)
	 */
	public function updateStaff($inputLeaders, $inputMembers, $inputAssociated)
	{
		$leaders[] =null;$members[] = null;$associated[] =null;
		if($inputLeaders){
		$exploded = explode('-', substr($inputLeaders, 0, -1));
		foreach ($exploded as $item)
			$leaders[] = $item;
		}
		if($inputMembers){
		$exploded = explode('-', substr($inputMembers, 0, -1));
		foreach ($exploded as $item)
			$members[] = $item;
		}
		if($inputAssociated){
		$exploded = explode('-', substr($inputAssociated, 0, -1));
		foreach ($exploded as $item)
			$associated[] = $item;			
		}		
		$this->cleanStaff();
		$this->addStaff($leaders, $members, $associated);
	}

	/**
	 * Clean application staff (leaders, members, associated)
	 */
	public function cleanStaff()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_application` WHERE `id_application` = '.(int)$this->id);
	}

	/**
	 * Add application staff (leaders, members, associated)
	 */
	public function addStaff($leaders, $members, $associated)
	{
		if ($leaders && !empty($leaders)){
		foreach ($leaders as $leader)
		{
			if((int)$leader>0){
				$row = array('id_application' => (int)$this->id, 'id_customer' => (int)$leader, 'id_role' => 1);
				Db::getInstance()->insert('customer_application', $row);
				}
		}
		}
		if ($members && !empty($members)){
		foreach ($members as $member)
		{
		if((int)$member>0){
			$row = array('id_application' => (int)$this->id, 'id_customer' => (int)$member, 'id_role' => 2);
			Db::getInstance()->insert('customer_application', $row);
			}
		}
		}
		if ($associated && !empty($associated)){
		foreach ($associated as $person)
		{
		if((int)$person>0){
			$row = array('id_application' => (int)$this->id, 'id_customer' => (int)$person, 'id_role' => 3);
			Db::getInstance()->insert('customer_application', $row);
			}
		}
		}
	}

	/**
	 * 
	 * Get id of funding agency connected to this application
	 * 
	 */
	public static function getFundingAgencyIdStatic($id_application) 
	{
		$sql = '
		SELECT c.`id_funding_agency`
		FROM `'._DB_PREFIX_.'application` a 
		LEFT JOIN `'._DB_PREFIX_.'call` c ON a.`id_call` = c.`id_call`
		WHERE a.`id_application` = '.$id_application.';'

		;

		return DB::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);//FIXME work only with applications with single funding agency which is ok for now

	}

	/**
	 * 
	 * Static function to get id of partners connected to application
	 * 
	 * @param id_application Id of application
	 * 
	 */
	public static function getPartnersIdStatic($id_application) 
	{
		$sql = '
		SELECT ap.`id_partner`
		FROM `'._DB_PREFIX_.'application` a 
		LEFT JOIN `'._DB_PREFIX_.'application_partner` ap ON a.`id_application` = ap.`id_application`
		WHERE a.`id_application` = '.$id_application.';'

		;

		return DB::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

	}

	/**
	 * 
	 * Static function to change status of application to granted
	 * 
	 * @param id_application 
	 * 
	 */
	public static function updateApplicationStatusToGrantedStatic($id_application) 
	{
		Db::getInstance()->update('application', array(
				'id_application_status' => 1
			), 'id_application = '.(int)$id_application);// id application status 1 has value 'Granted'
	}


	/**
	 * 
	 * Create project from application
	 * 
	 * @param id_application
	 * 
	 */
	public static function createProject($id_application) 
	{

		$application = Application::getApplicationById($id_application);
		
		$project = new Project;
		
		$project->id_project_status = 2;//project status id 2 has value 'active'

		$project->id_project_type = $application['id_project_type'];

	 	$project->name = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['name']);//TODO check if we must change ps_lang_default to context lang or smth like that ($this->context->language->id); same for all below

	 	$project->totalBudget = ((int)$application['money_requested'] + (int)$application['mdhPartBudget']);
		
	 	$project->mdhPartBudget = $application['mdhPartBudget'];
		
		$project->acronym = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['acronym']);

		$project->keywords = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['keywords']);
		
		$project->overview = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['overview']);

		$project->url = $application['url'];
		

		/** @var string Object creation date */
		$project->date_start = $application['date_start'];

		/** @var string Object last modification date */
		$project->date_end = $application['date_end'];

		
		if(!$project->save()) {
			$project->add();	
		}

		$project->addStaffModified(Application::getLeadersStatic($id_application), Application::getMembersStatic($id_application), Application::getAssociatedStatic($id_application));
		
		$project->addProjectFundingAgencies(Application::getFundingAgencyIdStatic($id_application));

		$project->addProjectPartnersModified(Application::getPartnersIdStatic($id_application));


		Application::updateApplicationStatusToGrantedStatic($id_application);

		//create news
		$news = new NewsAndEvents;

		$news->title = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['name']); //TODO probably change to some better title

		$news->id_news_and_events_type = 1; // id for news in news_and_events_type table

		$news->id_news_and_events_scope = 1; //od for public in news_and_events_scope table

		$news->content = array((int)Configuration::get('PS_LANG_DEFAULT') => $application['overview']);;

		$news->id_contact = 0; //TODO set to 0 because it is required field but we dont know actual contact person; maybe think of something better



		if(!$news->save()) {
			$news->add();	
		}

		$news->addProjects(array('id_project' => $project->id ));


	}
	
	
}
