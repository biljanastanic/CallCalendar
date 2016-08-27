<?php
/*
CREATE TABLE IF NOT EXISTS `ps_project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `id_project_status` int(11) DEFAULT NULL,
  `id_project_type` int(11) DEFAULT NULL,
  `registry_number` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `url` varchar(128) COLLATE utf8_swedish_ci DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  PRIMARY KEY (`id_project`),
  KEY `FK_project_id_project_status` (`id_project_status`),
  KEY `FK_project_id_project_type` (`id_project_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `ps_project_lang` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NULL,
  `acronym` varchar(32) COLLATE utf8_swedish_ci NULL,
  `keywords` text COLLATE utf8_swedish_ci,
  `partners` text COLLATE utf8_swedish_ci,
  `overview` text COLLATE utf8_swedish_ci,
  `results` text COLLATE utf8_swedish_ci,
  `future_work` text COLLATE utf8_swedish_ci,
  PRIMARY KEY (`id_project`,`id_lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

*/
class ProjectCore extends ObjectModel
{
	public $id;
	
	public $id_project;

	public $id_project_status;

	public $id_project_type;

 	public $name;

 	public $totalBudget;
	
 	public $mdhPartBudget;
	
	public $acronym;

	public $keywords;
	
	public $overview;
	
	public $results;
	
	public $future_work;

	public $url;
	
	public $registry_number;

	/** @var string Object creation date */
	public $date_start;

	/** @var string Object last modification date */
	public $date_end;

		/** @var string Friendly URL */
	public $link_rewrite;
	
	public $initiativeBox;
	public $fundingAgencyBox;
	public $partnerBox;
	
	public $inputLeaders;
	public $inputMembers;
	public $inputAssociated;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'project',
		'primary' => 'id_project',
		'multilang' => true,
		'fields' => array(
			'url' => 				array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isUrl', 'size' => 255),
			'registry_number' => 	array('type' => self::TYPE_STRING, 'lang' => false, 'validate' => 'isString', 'size' => 255),
			'date_start' => 			array('type' => self::TYPE_DATE),
			'date_end' => 			array('type' => self::TYPE_DATE),
			'id_project_type' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),
			'id_project_status' => array('type' => self::TYPE_INT,  'required' => true,'validate' => 'isUnsignedId'),

			'totalBudget' => array('type' => self::TYPE_INT,'validate' => 'isInt'),		
			'mdhPartBudget' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
			// Lang fields
			'name' => 				array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 255),
			'acronym' => 			array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isString', 'size' => 32),
			'keywords' => 			array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml'),
			'overview' =>			array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml'),
			'results' =>			array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml'),
			'future_work' =>		array('type' => self::TYPE_HTML, 'lang' => true,'validate' => 'isCleanHtml')
		),
	);

	public static function getProjects($id_lang = 0, $id_shop = null, $id_initiative = null, $id_member = null, $id_status = null, $id_funding_agency = null,$id_partner=null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, ptl.`name` AS type, psl.`name` AS status
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON p.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`';		

		if ($id_initiative)
		{
			$sql.='LEFT JOIN `'._DB_PREFIX_.'project_initiative` AS pi ON (p.`id_project` = pi.`id_project`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (pi.`id_initiative` = i.`id_initiative`)';
		}
		
		if($id_member)
		{
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON (p.`id_project` = cp.`id_project`)';
		}
		
		if($id_funding_agency)
		{
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'project_funding_agency` AS pfa ON (p.`id_project` = pfa.`id_project`)';
		}
		if($id_partner)
		{
			$sql .='LEFT JOIN `'._DB_PREFIX_.'project_partner` pp ON pp.`id_project` = p.`id_project`';
		}
		
		$sql.='WHERE 1 ';
		if ($id_initiative)
		{
			$sql .= ' AND i.`id_initiative` = ' . (int)$id_initiative;
		}
		if ($id_status)
		{
			$sql .= ' AND p.`id_project_status` = ' . (int)$id_status;
		}
		if ($id_member)
		{
			$sql .= ' AND cp.`id_customer` = "'. $id_member . '"';
		}
		if ($id_funding_agency)
		{
			$sql .= ' AND pfa.`id_funding_agency` = "'. $id_funding_agency . '"';
		}
		if($id_partner)
		{
			$sql.=' AND pp.`id_partner`='.(int)$id_partner;
		}
		if ($id_shop)
		{
			$sql .= ' AND p.id_project IN (
			SELECT DISTINCT p.`id_project`
			FROM `'._DB_PREFIX_.'project` p
			LEFT OUTER JOIN `'._DB_PREFIX_.'project_initiative` AS pi ON (p.`id_project` = pi.`id_project`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (pi.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		$sql .= ' ORDER BY pl.`name` ASC';//psl.`name` ASC, 
		//echo $sql . '<br>'; 
		$projects = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		foreach ($projects as $k => $project)
			$projects[$k]['members'] = Project::getProjectRelatedMembersById($project['id_project']); 
		
		return $projects;
	}
	
	public static function getNumberOfProjects($id_lang = 0, $id_shop = null, $active = true)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = 'SELECT DISTINCT p.*
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`';		
		
		if ($active)
		{	
			$sql.=' WHERE psl.name = ';
			$sql.=' "active"';
		}
		
		if ($id_shop)
		{
			$sql .= ' AND p.id_project IN (
			SELECT DISTINCT p.`id_project`
			FROM `'._DB_PREFIX_.'project` p
			LEFT OUTER JOIN `'._DB_PREFIX_.'project_initiative` AS pi ON (p.`id_project` = pi.`id_project`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (pi.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		//echo $sql . '<br>'; 
		$projects = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		
		return count($projects);
	}
	
	public static function getProjectById($id_project = null, $id_lang = 0)
	{
		if(!$id_project) $id_project=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$sql = '
		SELECT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, ptl.`name` AS type, psl.`name` AS status
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON p.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`
		WHERE p.`id_project` = '.$id_project;

		$project = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);

		$project['members'] = Project::getProjectRelatedMembersById($id_project); 
		
		$project['partners'] = Project::getProjectRelatedPartners($id_project); 

		return $project;
	}
	
	public static function getProjectShop($id_project = null)
	{
		if(!$id_project) $id_project=$this->id;		
		$sql = 'SELECT i.id_shop
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_initiative` AS pi ON (p.`id_project` = pi.`id_project`)
		LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (pi.`id_initiative` = i.`id_initiative`)
		WHERE i.`id_shop` > 0 and p.`id_project` = '.$id_project;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);	
	}
	
	public static function getProjectRelatedMembersById($id_project)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, rl.`name` AS role, cp.`id_project`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON c.`id_customer` = cp.`id_customer`
			LEFT JOIN `'._DB_PREFIX_.'role_lang` AS rl ON cp.`id_role` = rl.`id_role`
			WHERE cp.`id_project` = '.(int)$id_project.'
			ORDER BY c.`firstname`, c.`lastname`');
	}
	
	public static function getProject($id_project=null, $id_lang = 0)
	{
		if(!$id_project) $id_project=$this->id;
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, ptl.`name` AS type, psl.`name` AS status
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON p.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`			
		WHERE p.`id_project` = '.$id_project.'
		ORDER BY ptl.`name`, p.`id_project` ASC');
	}
	public static function getProjectsExcludingSelfStatic($id_lang = 0, $id_project)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, ptl.`name` AS type, psl.`name` AS status
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON p.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`			
		WHERE p.`id_project` <> '.$id_project.'
		ORDER BY ptl.`name`, p.`id_project` ASC');
	}
	

	public static function getProjectRelatedInitiativesById($id_project,$id_lang=null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT i.*, il.`name`, il.`acronym`, il.`focus`, il.`description`, itl.`name` AS initiative_type
			FROM '._DB_PREFIX_.'project_initiative pi
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON pi.`id_initiative` = i.`id_initiative`
			LEFT JOIN `'._DB_PREFIX_.'initiative_lang` AS il ON (pi.`id_initiative` = il.`id_initiative` AND il.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'initiative_type_lang` AS itl ON (i.`id_initiative_type` = itl.`id_initiative_type` AND itl.`id_lang` = '.(int)$id_lang.')
			WHERE pi.`id_project` = '.(int)$id_project);
	}
		
	public function getProjectRelatedInitiatives()
	{
		return Project::getProjectRelatedInitiativesById((int)$this->id,null);
	}

	public function getProjectRelatedFundingAgencies()
	{
		return FundingAgency::getProjectFundingAgencies((int)$this->id,null);
	}
	
	public function getProjectRelatedPartners($id_project = null, $id_lang = null)
	{
			if(!$id_project)
				$id_project=(int)$this->id;
			if (!$id_lang)
				$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
	
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT pp.`id_partner`, pl.`name`, pl.`acronym`, pl.`city`,  cl.`name` AS country, ptl.`name` AS type, p.url
			FROM `'._DB_PREFIX_.'project_partner` as pp
			LEFT JOIN `'._DB_PREFIX_.'partner` p on pp.`id_partner` = p.`id_partner`
			LEFT JOIN `'._DB_PREFIX_.'partner_lang` AS pl ON (pp.`id_partner` = pl.`id_partner` AND pl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'partner_type_lang` AS ptl ON (p.`id_partner_type` = ptl.`id_partner_type` AND  ptl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'country_lang` AS cl ON (p.`id_country` = cl.`id_country` AND  cl.`id_lang` = '.(int)$id_lang.')
			WHERE pp.`id_project` = '.(int)$id_project.'
			ORDER BY ptl.`name` ASC, pl.`name` ASC');
	}
	
	public static function getPartnerRelatedProjects($partner_id,$id_lang = 0)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, ptl.`name` AS type, psl.`name` AS status
		FROM `'._DB_PREFIX_.'project` p
		LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (p.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_type` pt ON p.`id_project_type` = pt.`id_project_type`
		LEFT JOIN `'._DB_PREFIX_.'project_type_lang` ptl ON (ptl.`id_project_type` = pt.`id_project_type` AND ptl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`
		LEFT JOIN `'._DB_PREFIX_.'project_partner` pp ON (pp.`id_project` = p.`id_project` AND pp.`id_partner`='.(int)$partner_id.')
		ORDER BY ptl.`name`, p.`id_project` ASC');
	}
	
	public static function getInitiativeRelatedProjectsById($id_initiative, $id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			
			return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT p.*, pl.`name`, pl.`acronym`, pl.`keywords`, pl.`overview`, pl.`results`, pl.`future_work`, psl.`name` AS status
			FROM '._DB_PREFIX_.'project_initiative pi
			LEFT JOIN `'._DB_PREFIX_.'project` AS p ON pi.`id_project` = p.`id_project`
			LEFT JOIN `'._DB_PREFIX_.'project_lang` AS pl ON (pi.`id_project` = pl.`id_project` AND pl.`id_lang` = '.(int)$id_lang.')
			LEFT JOIN `'._DB_PREFIX_.'project_status` ps ON p.`id_project_status` = ps.`id_project_status`
			LEFT JOIN `'._DB_PREFIX_.'project_status_lang` psl ON psl.`id_project_status` = ps.`id_project_status`
			WHERE pi.`id_initiative` = '.(int)$id_initiative.'
			ORDER BY psl.`name` ASC, pl.`name` ASC');
	}
		
	public function getInitiativeRelatedProjects($id_initiative)
	{
		return Project::getInitiativeRelatedProjectsById($id_initiative, $id_lang = null);
	}
	
	public static function getRelatedInitiativesByType($id_lang = null, $id_shop = null, $id_project, $type)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$sql = '
		SELECT DISTINCT i.*, il.`name`
		FROM `'._DB_PREFIX_.'initiative` i
		LEFT JOIN `'._DB_PREFIX_.'project_initiative` AS pi ON (i.`id_initiative` = pi.`id_initiative`)
		LEFT JOIN `'._DB_PREFIX_.'initiative_lang` AS il ON (i.`id_initiative` = il.`id_initiative` AND il.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'initiative_type` it ON i.`id_initiative_type` = it.`id_initiative_type`
		LEFT JOIN `'._DB_PREFIX_.'initiative_type_lang` itl ON (itl.`id_initiative_type` = it.`id_initiative_type` AND itl.`id_lang` = '.(int)$id_lang.')		
		WHERE i.`active` = 1 
		AND itl.`name` = "'.$type.'"'; 
		
		if ($id_shop)
		{
			$sql .= ' AND i.id_initiative IN (
			SELECT DISTINCT ir.`id_initiative_2`
			FROM `'._DB_PREFIX_.'initiative_relationship` ir
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ir.`id_initiative_1` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		$sql .= ' AND pi.`id_project` = '.$id_project.' 
		ORDER BY il.`name` ASC';
		
		$result = Db::getInstance()->executeS($sql);
		return $result;
	}	

	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		$this->updateProjectRelationships($this->initiativeBox,$this->fundingAgencyBox,$this->partnerBox);
		$this->updateStaff($this->inputLeaders, $this->inputMembers, $this->inputAssociated);
		
		return $success;
	}

	public function update($nullValues = false)
	{
		if (Context::getContext()->controller->controller_type == 'admin')
		{
			$this->updateProjectRelationships($this->initiativeBox,$this->fundingAgencyBox,$this->partnerBox);
			$this->updateStaff($this->inputLeaders, $this->inputMembers, $this->inputAssociated);
		}
		return parent::update(true);
	}
	public function delete()
	{
		if (parent::delete())
		{
			$this->cleanProjectRelationships();
			Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_project` WHERE `id_project` = '.(int)$this->id);

			return true;
		}
		return false;
	}

	
	public function cleanProjectInitiatives()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_initiative` WHERE `id_project` = '.(int)$this->id);
	}
	
	public function cleanProjectFundingAgencies()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_funding_agency` WHERE `id_project` = '.(int)$this->id);
	}
	
	public function cleanProjectPartners()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_partner` WHERE `id_project` = '.(int)$this->id);
	}
	
	public function cleanProjectRelationships()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_initiative` WHERE `id_project` = '.(int)$this->id);
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_funding_agency` WHERE `id_project` = '.(int)$this->id);
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'project_partner` WHERE `id_project` = '.(int)$this->id);


	}
	public function updateProjectInitiatives($list)
	{
		$this->cleanProjectInitiatives();
		if ($list && !empty($list))
			$this->addProjectInitiatives($list);
	}
	public function updateProjectFundingAgencies($list)
	{
		$this->cleanProjectFundingAgencies();
		if ($list && !empty($list))
			$this->addProjectFundingAgencies($list);
	}
	public function updateProjectPartners($list)
	{
		$this->cleanProjectPartners();
		if ($list && !empty($list))
			$this->addProjectPartners($list);
	}
	public function updateProjectRelationships($initiative_list,$funding_agency_list,$partner_list)
	{
		$this->cleanProjectRelationships();
		if ($initiative_list && !empty($initiative_list))
			$this->addProjectInitiatives($initiative_list);
			
		if ($funding_agency_list && !empty($funding_agency_list))
			$this->addProjectFundingAgencies($funding_agency_list);
			
		if ($partner_list && !empty($partner_list))
			$this->addProjectPartners($partner_list);
	}
	
	public function addProjectInitiatives($initiatives)
	{
		foreach ($initiatives as $initiative)
		{
			$row = array('id_project' => (int)$this->id, 'id_initiative' => (int)$initiative);
			Db::getInstance()->insert('project_initiative', $row);
		}
	}
	
	public function addProjectFundingAgencies($funding_agencies)
	{
		foreach ($funding_agencies as $funding_agency)
		{
			$row = array('id_project' => (int)$this->id, 'id_funding_agency' => (int)$funding_agency);
			Db::getInstance()->insert('project_funding_agency', $row);
		}
	}
	
	public function addProjectPartners($partners)
	{
		foreach ($partners as $partner)
		{
			$row = array('id_project' => (int)$this->id, 'id_partner' => (int)$partner);
			Db::getInstance()->insert('project_partner', $row);
		}
	}

	public static function getLeadersStatic($id_project)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cp.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON c.`id_customer` = cp.`id_customer`
			WHERE cp.`id_role` = 1 AND cp.`id_project` = '.(int)$id_project);
	}
	
	public function getLeaders()
	{
		return Project::getLeadersStatic((int)$this->id);
	}

	public static function getMembersStatic($id_project)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cp.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON c.`id_customer` = cp.`id_customer`
			WHERE cp.`id_role` = 2 AND cp.`id_project` = '.(int)$id_project);
	}
	
	public function getMembers()
	{
		return Project::getMembersStatic((int)$this->id);
	}

	public static function getAssociatedStatic($id_project)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.*, cp.`id_role`
			FROM '._DB_PREFIX_.'customer c
			LEFT JOIN `'._DB_PREFIX_.'customer_project` AS cp ON c.`id_customer` = cp.`id_customer`
			WHERE cp.`id_role` = 3 AND cp.`id_project` = '.(int)$id_project);
	}
	
	public function getAssociated()
	{
		return Project::getAssociatedStatic((int)$this->id);
	}	
	
	/**
	 * Update associated
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

	public function cleanStaff()
	{
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'customer_project` WHERE `id_project` = '.(int)$this->id);
	}

	public function addStaff($leaders, $members, $associated)
	{
		if ($leaders && !empty($leaders)){
		foreach ($leaders as $leader)
		{
			if((int)$leader>0){
				$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$leader, 'id_role' => 1);
				Db::getInstance()->insert('customer_project', $row);
				}
		}
		}
		if ($members && !empty($members)){
		foreach ($members as $member)
		{
		if((int)$member>0){
			$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$member, 'id_role' => 2);
			Db::getInstance()->insert('customer_project', $row);
			}
		}
		}
		if ($associated && !empty($associated)){
		foreach ($associated as $person)
		{
		if((int)$person>0){
			$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$person, 'id_role' => 3);
			Db::getInstance()->insert('customer_project', $row);
			}
		}
		}
	}

	//Modified vesion of function addStaff because it doesnt work properly when 
	//trying to make project from application and add staff contected to application to project staff
	public function addStaffModified($leaders, $members, $associated)
	{
		if ($leaders && !empty($leaders)){
		foreach ($leaders as $leader)
		{
			if((int)$leader>0){
				$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$leader['id_customer'], 'id_role' => 1);
				Db::getInstance()->insert('customer_project', $row);
				}
		}
		}
		if ($members && !empty($members)){
		foreach ($members as $member)
		{
		if((int)$member>0){
			$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$member['id_customer'], 'id_role' => 2);
			Db::getInstance()->insert('customer_project', $row);
			}
		}
		}
		if ($associated && !empty($associated)){
		foreach ($associated as $person)
		{
		if((int)$person>0){
			$row = array('id_project' => (int)$this->id, 'id_customer' => (int)$person['id_customer'], 'id_role' => 3);
			Db::getInstance()->insert('customer_project', $row);
			}
		}
		}
	}

	//Modified vesion of function addPartners because it doesnt work properly when 
	//trying to make project from application and add staff contected to application to project staff
	public function addProjectPartnersModified($partners)
	{
		foreach ($partners as $partner)
		{
			$row = array('id_project' => (int)$this->id, 'id_partner' => (int)$partner['id_partner']);
			Db::getInstance()->insert('project_partner', $row);
		}
	}
	
	
}
