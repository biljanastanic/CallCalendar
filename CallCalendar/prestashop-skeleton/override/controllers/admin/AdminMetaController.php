<?php

class AdminMetaController extends AdminMetaControllerCore
{
	public function addAllRouteFields()
	{
		$this->addFieldRoute('publication_rule', $this->l('Route to publication'));
		$this->addFieldRoute('person_rule', $this->l('Route to person'));
		$this->addFieldRoute('project_rule', $this->l('Route to project'));
        $this->addFieldRoute('call_rule', $this->l('Route to call'));
		$this->addFieldRoute('course_rule', $this->l('Route to course'));
		$this->addFieldRoute('research_group_rule', $this->l('Route to research group'));
		$this->addFieldRoute('cms_rule', $this->l('Route to CMS page'));
		$this->addFieldRoute('research_area_rule', $this->l('Route to research area'));
		$this->addFieldRoute('division_rule', $this->l('Route to division'));
		$this->addFieldRoute('news_events_rule', $this->l('Route to news and events'));
	}

}

