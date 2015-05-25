<?php
class Main extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
                $this->load->model('Sections_Model');
        }

        public function view($page = 'home')
		{
	        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['app_name'] = 'TactiCal';
	        $data['sections'] = $this->Sections_Model->get_sections();
	        $sectionID = $this->Sections_Model->getSectionID('Acute Care');
	        $data['subSections'] = $this->Sections_Model->getSubSections($sectionID);

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
        }
}