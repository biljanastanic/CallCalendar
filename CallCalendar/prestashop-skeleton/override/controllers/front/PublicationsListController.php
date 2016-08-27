<?php
session_start();

class PublicationsListControllerCore extends FrontController
{
	public $php_self = 'publications-list';

	public function canonicalRedirection($canonicalURL = '')
	{
	}
	
	public function initContent()
	{ 
		parent::initContent();

		$exploded = explode('_', substr(Tools::getValue('scope'), 0));
		if ($exploded[1] == 'area')
		{
			$id_initiative = $exploded[2];
			$id_area = $exploded[2];
			$id_division = null;
			$id_group = null;
			$id_project = null;
		}
		else if ($exploded[1] == 'division')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = $exploded[2];
			$id_group = null;
			$id_project = null;
		}
		else if ($exploded[1] == 'group')
		{
			$id_initiative = $exploded[2];
			$id_area = null;
			$id_division = null;
			$id_group = $exploded[2];
			$id_project = null;
		}
		else if ($exploded[1] == 'project')
		{
			$id_initiative = null;
			$id_area = null;
			$id_division = null;
			$id_group = null;
			$id_project = $exploded[2];
		}
		
		$id_type = Tools::getValue('type');
		$id_author = Tools::getValue('author');

		$date = Tools::getValue('date');
		$to_date = null;
		$from_date = null;
		if ($date == 'last_6m')
		{
			$from_date = date("Y-m-d", mktime(0, 0, 0, date("m") - 6, date("d"), date("Y")));
			$to_date = date("Y-m-d");
		}
		else if ($date == 'last_12m')
		{
			$from_date = date("Y-m-d", mktime(0, 0, 0, date("m") - 12, date("d"), date("Y")));
			$to_date = date("Y-m-d");
		}
		else if ($date == 'future')
		{
			$from_date = date("Y-m-d");
			$to_date = date("Y-m-d", mktime(0, 0, 0, 12, 31, 2100));
		}
		else if ($date > 1980)
		{
			$from_date = date("Y-m-d", mktime(0, 0, 0, 12, 31, $date - 1));
			$to_date = date("Y-m-d", mktime(0, 0, 0, 12, 31, $date));
		}

		$bibtex = Tools::getValue('bibtex');

		$page = Tools::getValue('p');
		if ($page == '')
			$page = 1;


		$ppp = Tools::getValue('ppp');
		if ($ppp == '')
			$publications_per_page = 50;
		else	
			$publications_per_page = $ppp;
				
		$publications = array();
		$all_publications = array();
		$number_of_publications = 0;
		$publication_types = PublicationType::getPublicationTypes($this->context->language->id,1);
		if ($id_type == '') // all types
		{	
			if ($ppp == 'all') {
				if ($bibtex)
					$all_publications = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, null, $from_date, $to_date, $this->context->language->id, $page, 100000, true);
				else				
					$all_publications = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, null, $from_date, $to_date, $this->context->language->id, $page, 100000, false);
			}
			else {
				if ($bibtex)
					$all_publications = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, null, $from_date, $to_date, $this->context->language->id, $page, $publications_per_page, true);
				else				
					$all_publications = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, null, $from_date, $to_date, $this->context->language->id, $page, $publications_per_page, false);
			}

			foreach ($all_publications as $k => $publication)
			{
				$publications[$publication['id_publication_type']][] = $publication;
			}	
			
			$numbers = Publication::getNumbers(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id);	
			foreach ($numbers as $k => $number)
			{
				$number_of_publications_per_type[$number['id_publication_type']] = $number['count'];				
				$number_of_publications += $number['count'];
			}	
			if ($publications_per_page == 'all')
				$total_number_of_pages = 1;	
			else
				$total_number_of_pages = ceil ($number_of_publications / $publications_per_page);
		}
		else // type selected
		{
			if ($ppp == 'all') {
				if ($bibtex)
					$publications[$id_type] = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id, $page, 100000, true);
				else
					$publications[$id_type] = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id, $page, 100000, false);
			}
			else {
				if ($bibtex)
					$publications[$id_type] = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id, $page, $publications_per_page, true);
				else
					$publications[$id_type] = Publication::getPublicationsPagin(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id, $page, $publications_per_page, false);
			}


			$number = Publication::getNumbers(Context::getContext()->shop->id, $id_initiative, $id_project, $id_author, $id_type, $from_date, $to_date, $this->context->language->id);	
			$number_of_publications = $number[0]['count'];
			$number_of_publications_per_type[$id_type] = $number_of_publications;	
			$total_number_of_pages = ceil ($number_of_publications / $publications_per_page);
		}
			 
			 
	
		$profile = Initiative::getInitiativeById(Initiative::getInitiativeByShop(Context::getContext()->shop->id));
		$this->context->smarty->assign(array(
			'id_initiative' => $id_initiative,
			'id_area' => $id_area,
			'id_group' => $id_group,
			'id_division' => $id_division,
			'id_project' => $id_project,
			'id_author' => $id_author,
			'id_type' => $id_type,
			'date' => $date,
			'publications' => $publications,
			'number_of_publications' => $number_of_publications,
			'number_of_publications_per_type' => $number_of_publications_per_type,
			'page' => $page,
			'publications_per_page' => $publications_per_page,
			'total_number_of_pages' => (int) $total_number_of_pages,
			'bibtex' => $bibtex,
			'people' => Customer::getCustomers(Context::getContext()->shop->id),
			'publication_types' => $publication_types,
			'profile_name' => $profile['name'],
			'title' => 'Publications',
			'initiatives' => Initiative::getInitiatives(),
			'areas' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research area', true),
			'divisions' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Division', true),
			'groups' => Initiative::getInitiatives($this->context->language->id, null, Context::getContext()->shop->id, 'Research group', true),
			'projects' => Project::getProjects(),
			'latest_publications' => Publication::getLatestPublications(Context::getContext()->shop->id,6),
			'base_url' => __PS_BASE_URI__,
		));

		$this->setTemplate(_PS_THEME_DIR_.'publications-list.tpl');
	}
}

