<?php
use Igniter\Traits\DelegateToCI;


/**
 * Permalink Class
 *
 * @package        Igniter\Libraries\Permalink.php
 * @link           http://docs.tastyigniter.com
 */
class Permalink
{
    use DelegateToCI;

	var $permalinks = [];
	var $slugs = [];

	public function __construct()
	{
//		$this->CI =& get_instance();
//		$this->CI->load->model('Permalink_model');
//
//		$this->getPermalinks();
//
//		if ($this->CI->config->item('permalink') == '1') {
//			$this->slugs = $this->getSlugs();
//			$this->_setRequestQuery();
//		}
	}

	public function getPermalinks()
	{
		if (empty($this->permalinks)) {
			$this->permalinks = $this->CI->Permalink_model->getPermalinks();
		}

		return $this->permalinks;
	}

	public function getPermalink($query)
	{
		$result = ['permalink_id' => 0, 'slug' => '', 'controller' => '', 'url' => '', 'query' => $query];

		if (!empty($query) AND !empty($this->permalinks)) {
			foreach ($this->permalinks as $permalink) {
				if ($query === $permalink['query']) {
					$result = $permalink;
				}
			}
		}

		return $result;
	}

	public function getSlugs()
	{
		$result = [];

		if (!empty($this->permalinks)) {
			foreach ($this->permalinks as $permalink) {
				if (isset($permalink['slug']) AND isset($permalink['query'])) {
					$result[$permalink['controller']][$permalink['slug']] = $permalink['query'];
				}
			}
		}

		return $result;
	}

	public function getQuerySlug($query = '', $controller = 'pages')
	{
		$controller = strtolower($controller);
		if (!isset($this->slugs[$controller])) return null;

		$slugs = $this->slugs;
		$controller_slugs = $slugs[$controller];

		unset($slugs[$controller]);
		array_unshift($slugs, $controller_slugs);

		return $this->parseQueryString($slugs, $query, $controller);
	}

	public function savePermalink($controller, $permalink = [], $query = '')
	{
		return $this->CI->Permalink_model->savePermalink($controller, $permalink, $query);
	}

	public function deletePermalink($controller, $query = '')
	{
		return $this->CI->Permalink_model->deletePermalink($controller, $query);
	}

	protected function _setRequestQuery()
	{
		if ($this->CI->config->item('permalink') === '1') {

			$controller = strtolower($this->CI->uri->rsegment(1) ? $this->CI->uri->rsegment(1) : 'pages');

			$previous_segment = null;
			foreach ($this->CI->uri->segment_array() as $segment) {
				$previous_segment = !isset($previous_segment) ? $controller : $previous_segment;
				if (isset($this->slugs[$previous_segment][$segment])) {

					list($get_key, $get_value) = explode('=', $this->slugs[$previous_segment][$segment]);
					if (!empty($get_key) AND !empty($get_value)) {
						$_GET[$get_key] = $get_value;
					}
				}

				$previous_segment = $segment;
			}
		}
	}

	protected function parseQueryString($slugs, $query, $controller)
	{
		$querySlug = $query_arr = [];

		parse_str($query, $query_arr);
		foreach ($slugs as $context => $_slugs) {
			$context = is_numeric($context) ? $controller : $context;
			$_slugs = array_flip($_slugs);

			foreach ($query_arr as $key => $val) {
				$keys = array_keys($_slugs);

				if (preg_grep("/^" . $key . "/", $keys)) {

					$slug = $context;
					if (isset($_slugs[$key . '=' . $val])) {
						$context = (in_array($context, ['pages', 'local'])) ? '' : $context . '/';
						$slug = $context . $_slugs[$key . '=' . $val];
						unset($query_arr[$key]);
					}

					$querySlug[] = $slug;
					continue;
				}
			}
		}

		$querySlug = !empty($querySlug) ? implode('/', $querySlug) : '';

		return !empty($query_arr) ? $querySlug . '?' . http_build_query($query_arr) : $querySlug;
	}
}

// END Permalink class

/* End of file Permalink.php */
/* Location: ./system/libraries/Permalink.php */