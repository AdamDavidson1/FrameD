<?php 
/*
 ______   ______     ______     __    __     ______     _____    
/\  ___\ /\  == \   /\  __ \   /\ "-./  \   /\  ___\   /\  __-.  
\ \  __\ \ \  __<   \ \  __ \  \ \ \-./\ \  \ \  __\   \ \ \/\ \ 
 \ \_\    \ \_\ \_\  \ \_\ \_\  \ \_\ \ \_\  \ \_____\  \ \____- 
  \/_/     \/_/ /_/   \/_/\/_/   \/_/  \/_/   \/_____/   \/____/ 
                                                                 

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



/**
 * CpanelPlugin
 * 
 * Cpanel Plugin for FrameD
 * 
 * @author Adam Davidson <dark@gatevo.com>
 * @version 1.0
 * @package FrameD
 */


/**
 * Cpanel Plugin Class
 * 
 * @package FrameD
 * @subpackage core
 */


class CpanelPlugin extends Plugin{
	
/**
 * Config Package
 *
 * @access private
 */
	private $package;

/**
 * Config Port
 *
 * @access private
 */
	private $port;

/**
 * Config SSL
 *
 * @access private
 */
	private $ssl;

/**
 * Config Domain
 *
 * @access private
 */
	private $domain;

/**
 * Config User
 *
 * @access private
 */
	private $user;

/**
 * Config Password
 *
 * @access private
 */
	private $pass;


	function __construct(){
		parent::__construct();
	}
/**
 * Get Data
 * 
 * @access private
 * @return object
 */
	private function getData($function){
		$this->getConfig();

		$url = $this->ssl ? 'https://' : 'http://';
		$url = $this->domain.':'.$this->port.'/json-api/'.$function

		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);	
		# Allow self-signed certs
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
		if($this->hash){
			$header[0] = "Authorization: WHM ".$this->user.":" . preg_replace("'(\r|\n)'","",$this->hash);
		} else {
			$header[0] = "Authorization: Basic " . base64_encode($this->user.":".$this->pass) . "\n\r";
		}
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// grab URL and pass it to the browser
		$ret = json_decode(curl_exec($ch));

		// close cURL resource, and free up system resources
		curl_close($ch);
	}

/**
 * Get Config
 * 
 * @access private
 * @return void
 */
	private function getConfig(){
		$this->port   = $this->config->application[$this->package]['connect']['port'];
		$this->ssl    = $this->config->application[$this->package]['connect']['ssl'] == 'Yes' ? true : false;
		$this->domain = $this->config->application[$this->package]['connect']['domain'];
		$this->user   = $this->config->application[$this->package]['connect']['user'];
		$this->pass   = $this->config->application[$this->package]['connect']['pass'];
	}

/**
 * Set Package
 * 
 * Set Package to grab from Config
 *
 * @access public
 * @param  string $package
 * @return void
 */
	public function setPackage($package){
		$this->package = $package;
	}
}
