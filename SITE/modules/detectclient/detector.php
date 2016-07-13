<?php

class Detector {

    private $data;
    
    public function get($param) {
        return $this->data[$param];
    }
    
    public function detect() {

        include("SxGeo/SxGeo.php");
        include("browser_detect.php");
        include("mobile_detect.php");

// Detect IP
        $this->data['ip'] = '';
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $this->data['ip'] = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }             
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $this->data['ip'] = $_SERVER["HTTP_CLIENT_IP"];
        }        
        if (isset($_SERVER["REMOTE_ADDR"])) {
            $this->data['ip'] = $_SERVER["REMOTE_ADDR"];
        }
        if (isset($_SERVER["HTTP_X_REAL_IP"])) {
            $this->data['ip'] = $_SERVER["HTTP_X_REAL_IP"];
        }

// Detect referer
		if (!isset($_SERVER["HTTP_REFERER"]) || $_SERVER["HTTP_REFERER"]=='')
			{
			$this->data['referer'] = '';
			}
		else
			{
			$this->data['referer'] = $_SERVER["HTTP_REFERER"];
			}

// Detect UserAgent
		if (!isset($_SERVER["HTTP_USER_AGENT"]) || $_SERVER["HTTP_USER_AGENT"]=='')
			{
			$this->data['agent'] = '';
			}
		else
			{
			$this->data['agent'] = $_SERVER["HTTP_USER_AGENT"];
			}

// Detect browser & browser version
        $browser = new browser_detect($this->data['agent']);
        $this->data['browser_name'] = $browser->getBrowser();
        $this->data['browser_ver'] = $browser->getVersion();

// Detect OS
        $this->data['platform'] = $browser->getPlatform();

// Detect type advice
        $mobile = new Mobile_Detect;
        if ($mobile->isMobile() or $mobile->isTablet()) {
            $this->data['mobile'] = '1';
        } else {
            $this->data['mobile'] = '0';
        }

// Detect country
        $SxGeo = new SxGeo();        
        $region_full = $SxGeo->getCityFull($this->data['ip']);
        $this->data['country_code'] = $SxGeo->getCountry($this->data['ip']);
        $this->data['country'] =$region_full['country']['name_ru'];

// Detect region
        $this->data['region'] = $region_full['region']['name_ru'];

// Detect town
        $this->data['city'] = $region_full['city']['name_ru'];

    }

}

$detector= new Detector();
$detector->detect();
