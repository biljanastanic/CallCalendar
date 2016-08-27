<?php
/*
--
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ps_news_and_events` (
`id_news_and_events` int(11) NOT NULL,
  `id_news_and_events_type` int(11) DEFAULT '0',
  `id_news_and_events_scope` int(11) DEFAULT '0',
  `id_creator` int(11) DEFAULT '0',
  `id_contact` int(11) DEFAULT '0',
  `speaker` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `date_time_start` timestamp NULL DEFAULT NULL,
  `date_time_end` timestamp NULL DEFAULT NULL,
  `date_upd` timestamp NULL DEFAULT NULL,
  `date_add` timestamp NULL DEFAULT NULL,
  `old_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `ps_news_and_events_lang` (
`id_news_and_events` int(11) NOT NULL,
  `id_lang` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

*/
class NewsAndEventsCore extends ObjectModel
{
	public $id;
	
	public $id_news_and_events;

	public $id_news_and_events_type;

 	public $id_news_and_events_scope;
	
	public $id_creator;
	
	public $id_contact;
		
	public $speaker;
	
	public $venue;
	
	public $date_add;
	
	public $date_upd;
	
	public $date_time_start;
	
	public $date_time_end;
	
	public $title;
	
	public $content;
	
	public $inputSpeakers;
	
	public $initiativeBox;
	public $projectBox;

	public $id_file = false;
	public $file_dir="";
	public $file_tmp_dir="";

	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table' => 'news_and_events',
		'primary' => 'id_news_and_events',
		'multilang' => true,
		'fields' => array(
			'id_news_and_events_type' 			=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId','required'=> true),
			'id_creator' 						=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),//automatic
			'id_news_and_events_scope' 			=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId'),//required for news
			'id_contact' 						=> array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId','required'=> true),
			'venue' 							=> array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 255),//required for event
			'speaker' 							=> array('type' => self::TYPE_STRING, 'validate' => 'isString', 'size' => 255),//required for event
			'date_upd' 							=> array('type' => self::TYPE_DATE),//auto
			'date_add' 							=> array('type' => self::TYPE_DATE),//auto
			'date_time_start' 					=> array('type' => self::TYPE_DATE),
			'date_time_end' 					=> array('type' => self::TYPE_DATE),
			//lang
			'title' 							=> array('type' => self::TYPE_STRING,'lang' => true, 'validate' => 'isString','size' => 255,'required'=> true),
			'content' 							=> array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml','required'=> true)
			)
	);
	
	public function __construct($id_category = null, $id_lang = null, $id_shop = null)
	{
		parent::__construct($id_category, $id_lang, $id_shop);
		$this->id_file = ($this->id && (file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$this->id.'.pdf') or file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$this->id.'.zip') or file_exists(_PS_NEWS_AND_EVENTS_DIR_.(int)$this->id.'.rar'))) ? (int)$this->id : false;
		$this->file_dir = _PS_NEWS_AND_EVENTS_DIR_;
		$this->file_tmp_dir = _PS_NEWS_AND_EVENTS_DIR_;

	}
	
	
	public function add($autodate = true, $null_values = true)
	{
		$success = parent::add($autodate, $null_values);
		$this->updateRelationships($this->initiativeBox,$this->inputSpeakers,$this->projectBox);
		return $success;
	}

	public function update($nullValues = false)
	{
		if (Context::getContext()->controller->controller_type == 'admin')
		{
			$this->updateRelationships($this->initiativeBox,$this->inputSpeakers,$this->projectBox);			
		}
		return parent::update(true);
	}
	
	public function delete()
	{
		$this->deleteFile(false,_PS_NEWS_AND_EVENTS_DIR_);
		if (parent::delete())
		{
			$this->cleanRelationships();
			return true;
		}
		return false;
	}
	
	public function cleanRelationships() {
		//first delete associations of this news/event with initiatives
	//	Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'news_and_events_initiative` WHERE `id_news_and_events` = '.(int)$this->id);
		//then projects
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'news_and_events_project` WHERE `id_news_and_events` = '.(int)$this->id);
		//then connected speakers
		Db::getInstance()->execute('DELETE FROM `'._DB_PREFIX_.'news_and_events_speaker` WHERE `id_news_and_events` = '.(int)$this->id);
		}
	
	public function updateRelationships($initiative_list,$speaker_list,$project_list)
	{
		$this->cleanRelationships();
		if ($initiative_list && !empty($initiative_list))
			$this->addInitiatives($initiative_list);
			
		$explodedSpeakers = explode('-', substr($speaker_list, 0, -1));
		foreach ($explodedSpeakers as $item)
			$speakers[] = $item;	
			
		if ($speakers && !empty($speakers))
			$this->addSpeakers($speakers);
			
		if ($project_list && !empty($project_list))
			$this->addProjects($project_list);
	}
	
	public function addInitiatives($initiatives)
	{
		foreach ($initiatives as $initiative)
		{
			$row = array('id_news_and_events' => (int)$this->id, 'id_initiative' => (int)$initiative);
			Db::getInstance()->insert('news_and_events_initiative', $row);
		}
	}
	
	public function addSpeakers($speakers)
	{
		
		foreach ($speakers as $speaker)
		{
			if($speaker && (int)$speaker!=0){
				$row = array('id_news_and_events' => (int)$this->id, 'id_speaker' => (int)$speaker);

				Db::getInstance()->insert('news_and_events_speaker', $row);
			}
		}
	}
	
	public function addProjects($projects)
	{
		foreach ($projects as $project)
		{
			$row = array('id_news_and_events' => (int)$this->id, 'id_project' => (int)$project);
			Db::getInstance()->insert('news_and_events_project', $row);
		}
	}
	public static function getNewsAndEvents($id_shop = null, $id_initiative = null, $id_project = null,$id_scope = null, $id_speaker = null, $id_type = null, $from_date = null, $to_date = null, $id_lang,$only_events=false)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
			$sql='SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')';
		
		if ($id_initiative)
		{
			$sql.='LEFT JOIN `'._DB_PREFIX_.'news_and_events_initiative` AS navi ON (nav.`id_news_and_events` = navi.`id_news_and_events`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (navi.`id_initiative` = i.`id_initiative`)';
		}
		
		if($id_project)
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'news_and_events_project` AS navp ON (nav.`id_news_and_events` = navp.`id_news_and_events`)';

		if($id_speaker)
			$sql .= 'LEFT JOIN `'._DB_PREFIX_.'news_and_events_speaker` AS navsp ON (nav.`id_news_and_events` = navsp.`id_news_and_events`)';

		$sql.='WHERE 1 ';
		if ($id_initiative)
		{
			$sql .= ' AND i.`id_initiative` = ' . (int)$id_initiative;
		}
		if ($only_events)
		{
			$sql .= ' AND navt.name!="News" ';
		}
		if ($id_project)
		{
			$sql .= ' AND navp.`id_project` = ' . (int)$id_project;
		}
		if ($id_speaker)
		{
			$sql .= ' AND navsp.`id_speaker` = ' . (int)$id_speaker;
		}
		if ($id_type)
		{
			$sql .= ' AND nav.`id_news_and_events_type` = ' . (int)$id_type;
		}
		if ($from_date)
		{
			$sql .= ' AND nav.`date_time_start` >= "'. $from_date . '"';
		}
		if ($to_date)
		{
			$sql .= ' AND nav.`date_time_end` <= "'. $to_date . '"';
		}
		if ($id_scope)
		{
			$sql .= ' AND nav.`id_scope` = "'. $id_scope . '"';
		}
		if ($id_shop)
		{
			$sql .= ' AND nav.id_news_and_events IN (
			SELECT DISTINCT n.`id_news_and_events`
			FROM `'._DB_PREFIX_.'news_and_events` n
			LEFT OUTER JOIN `'._DB_PREFIX_.'news_and_events_initiative` AS ni ON (n.`id_news_and_events` = ni.`id_news_and_events`)
			LEFT JOIN `'._DB_PREFIX_.'initiative` AS i ON (ni.`id_initiative` = i.`id_initiative`)
			WHERE i.`id_shop` = '.(int)$id_shop.')';
		}
		$sql .= ' ORDER BY  nav.`date_time_start` DESC, nav.`date_add` DESC';

		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
	
	}
	public static function getNews($id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		WHERE navt.name="News"');
	}
	
	
	public function getEvents($id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		WHERE navt.name!="News"');
	}

	public function getPastEvents($id_lang = null,$id_shop=null,$number=3,$id_project=null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		
		$query='SELECT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_initiative` navi ON (navi.`id_news_and_events`=nav.`id_news_and_events`)
		LEFT JOIN `'._DB_PREFIX_.'initiative` i ON navi.`id_initiative`=i.`id_initiative`
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_project` AS navp ON (nav.`id_news_and_events` = navp.`id_news_and_events`)
		WHERE navt.name!="News" and nav.date_time_start!=0 and nav.date_time_start<curdate()';
		
		if($id_shop)$query.=' and i.`id_shop`='.(int)$id_shop;
		if($id_project)$query.=' and navp.`id_project`='.(int)$id_project;

		$query.=' group by nav.id_news_and_events
		order by nav.date_time_start desc';
		
		if($number && (int)$number>0)$query.=' limit '.(int)$number;
		
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
	}
	public function getNewsAndEventsById($id_news_and_events,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
		SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		WHERE nav.`id_news_and_events`='.(int)$id_news_and_events);
	}


	public static function getNewsAndEventsByType($id_news_and_events_type,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		WHERE nav.`id_news_and_events_type`='.(int)$id_news_and_events_type);
	}
	
	public static function getNewsAndEventsByScope($id_news_and_events_scope,$id_lang = null)
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
		SELECT DISTINCT nav.*,navl.title,navl.content,navt.name as type,navs.name as scope
		FROM `'._DB_PREFIX_.'news_and_events` nav
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_lang` AS navl ON (nav.`id_news_and_events` = navl.`id_news_and_events` AND navl.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_type_lang` AS navt ON (nav.`id_news_and_events_type` = navt.`id_news_and_events_type` AND navt.`id_lang` = '.(int)$id_lang.')
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_scope_lang` AS navs ON (nav.`id_news_and_events_scope` = navs.`id_news_and_events_scope` AND navs.`id_lang` = '.(int)$id_lang.')	
		WHERE nav.`id_news_and_events_scope`='.(int)$id_news_and_events_scope);
	}
	
	public static function getSpeakers($id_news_and_events)
	{
		return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT c.* FROM `'._DB_PREFIX_.'news_and_events_speaker` navs
			LEFT JOIN `'._DB_PREFIX_.'customer` c on navs.`id_speaker`=c.`id_customer`
			WHERE navs.`id_news_and_events`='.(int)$id_news_and_events);
	
	}
	
	public static function getNewsAndEventsRelatedProjectsById($id_news_event,$id_lang=null)
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
		LEFT JOIN `'._DB_PREFIX_.'news_and_events_project`nep ON  nep.`id_project`=p.`id_project`
		WHERE nep.`id_news_and_events`='.(int)$id_news_event.'
		ORDER BY ptl.`name`, p.`id_project` ASC');
	}
		
	public function getNewsAndEventsRelatedProjects()
	{
		return NewsAndEvents::getNewsAndEventsRelatedProjectsById((int)$this->id,null);
	}
	
}
