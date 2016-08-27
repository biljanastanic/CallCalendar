<?php

class Dispatcher extends DispatcherCore
{
	public $default_routes = array(
		'person_rule' => array(
			'controller' =>	'person',
			'rule' =>		'staff/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'publication_rule' => array(
			'controller' =>	'publication',
			'rule' =>		'publications/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
        
		'project_rule' => array(
			'controller' =>	'project',
			'rule' =>		'projects/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
        
        
        'call_rule' => array(
			'controller' =>	'call',
			'rule' =>		'calls/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
        
        
        
    
        
		'course_rule' => array(
			'controller' =>	'course',
			'rule' =>		'courses/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'research_group_rule' => array(
			'controller' =>	'research-group',
			'rule' =>		'research-groups/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'cms_rule' => array(
			'controller' =>	'cms',
			'rule' =>		'{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id_cms'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'research_area_rule' => array(
			'controller' =>	'research-area',
			'rule' =>		'research-areas/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'division_rule' => array(
			'controller' =>	'division',
			'rule' =>		'divisions/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
		'news_events_rule' => array(
			'controller' =>	'news-events',
			'rule' =>		'news-events/{id}-{rewrite}',
			'keywords' => array(
				'id' =>				array('regexp' => '[0-9]+', 'param' => 'id'),
				'rewrite' =>		array('regexp' => '[_a-zA-Z0-9-\pL]*'),
			),
		),
	);
}

