<?php
	class Config
	{	
		/**
		 * The config parsed from the ini file.
		 * @var array
		 */
		private $config;
		
		/**
		* The constructor for the Config Class.
		* @var string
		* @var boolean
		*/
		function __construct($config, $useSections=false)
		{
			switch(strtolower($config))
			{
				case 'mysqli':
					$this->config = parse_ini_file('mysqli.ini', $useSections);
					break;
					
				case 'api':
					$this->config = parse_ini_file('api.ini', $useSections);
					break;
					
				default:
					$this->config = parse_ini_file($config, $useSections);
					if($this->config == false)
					{
						die('Unsupported config option/file!');
					}
					break;
			}
		}
		
		/**
		* Determines if the key is in the config
		* @var string
		*/
		public function has($key)
		{
			return isset($this->config[$key]);
		}
		
		/**
		* Returns the value assigned to the key from the config
		* @var string
		*/
		public function get($key)
		{
			if($this->has($key) == true)
			{
				return $this->config[$key];
			}
			
			return null;
		}
		
		/**
		* Determines if the section is in the config
		* @var string
		*/
		public function hasSection($section)
		{
			return isset($this->config[$section]);
		}
		
		/**
		* Returns the value(s) assigned to the section from the config
		* @var string
		*/
		public function getSection($section)
		{
			if($this->hasSection($section) == true)
			{
				return $this->config[$section];
			}
			
			return null;
		}
		
		/**
		* Determines if the key is in the section in the config
		* @var string
		*/
		public function hasFrom($section, $key)
		{
			if($this->hasSection($section) == true)
			{
				return isset($this->config[$section][$key]);
			}
			
			return false;
		}
		
		/**
		* Returns the value assigned to the key in the section from the config
		* @var string
		*/
		public function getFrom($section, $key)
		{
			if($this->hasSection($section) == true)
			{
				return $this->config[$section][$key];
			}
			
			return null;
		}
	}
?>
