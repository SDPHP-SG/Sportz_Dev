<?php

/**
 * Layout anabled View class for CI.
 * Allows to use a single layout for all pages, use temporary layouts for some pages,
 * assemble pages via adding templates with add_partial(), disable/enable layouts etc.
 * 
 */
class View {

    private $partials = '';
    // Layout that will be used the last to render page for every page
    private $layout = 'layout';
    // Use layouts to render pag?
    private $layout_enabled = TRUE;
    private $layout_vars;
    private $local_layout;

    public function __construct() {
        
    }

    /**
     * Sets template file for global layout
     * @param string $template
     */
    public function set_layout($template) {
        $this->layout = $template;
    }

    /**
     * Sets template file for local layout
     * @param string $template
     */
    public function set_local_layout($template) {
        $this->local_layout = $template;
    }

    /**
     * Sets global variables used for layout rendering. These variables will be 
     * merged with vars passed to render() method
     * @param type $data
     */
    public function set_layout_vars($data) {
        $this->layout_vars = $data;
    }

    /**
     * Enables/disables layout rendering
     * @param bool $state
     */
    public function enable_layout($state) {
        $this->layout_enabled = $state;
    }

    /**
     * Renders given template and adds result to page 
     * @param type $template
     * @param array $data
     */
    public function add_partial($template, $data) {
        $this->partials.= $this->fetch_partial($template, $data);
    }

    /**
     * Removes any content from $this->partials valriable
     */
    public function clean_partials() {
        $this->partials = '';
    }

    /**
     * Calls CI->load->view method for given template
     * @param type $template
     * @param array $data
     * @return string 
     */
    private function _fetch_template($template = NULL, $data = NULL) {
        if (empty($template)) {
            return;
        }
        $CI = get_instance();
        return $CI->load->view($template, $data, TRUE);
    }

    /**
     * Fetch template and return it.
     * If template is NULL try to return partials
     * @param String $template
     */
    public function fetch($template = NULL, $data = NULL) {

        $data['content'] = $this->partials . ((!empty($template)) ? $this->_fetch_template($template, $data) : '');

        if (!$this->layout_enabled) {
            return $data['content'];
        }

        if ($this->local_layout) {
            $data['content'] = $this->_fetch_template($this->local_layout, $data);
        }
        
        return $this->_fetch_template($this->layout, array_merge($data, $this->layout_vars));
    }

    /**
     * Helper function to get HTML page based on template
     * @param string $template
     * @param array $data
     * @return string
     */
    public function fetch_partial($template, $data = NULL) {
        return $this->_fetch_template($template, $data);
    }

    /**
     * Helper function that outputs to browser HTML page based on template
     * @param string $template
     * @param array $data
     */
    public function render_partial($template, $data = NULL) {
        echo $this->fetch_partial($template, $data);
    }

    /**
     * Renders template to $content.
     *
     * @param String $template
     */
    public function render($template = NULL, $data = NULL) {
        echo $this->fetch($template, $data);
    }

}