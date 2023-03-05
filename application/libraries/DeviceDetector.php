<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeviceDetector
{
    private $user_agent;
    private $is_mobile = false;
    private $is_tablet = false;
    private $is_desktop = false;

    public function __construct()
    {
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Array yang berisi nama-nama browser yang dianggap sebagai mobile browser
        $mobile_browsers = array(
            'Mobile', 'Opera Mini', 'IEMobile', 'Android', 'webOS', 'iPhone', 'iPad',
            'BlackBerry', 'Windows Phone', 'Symbian', 'SymbianOS', 'Series60', 'Windows CE',
            'UP.Browser', 'PalmOS', 'PalmSource', 'Blazer', 'AvantGo', 'Xiino', 'Maemo',
            'Mozilla/5.0 (Linux', 'MeeGo', 'NetFront', 'GoBrowser', 'Puffin', 'TeaShark', 'BOLT',
            'Chrome Mobile', 'Firefox Mobile', 'Skyfire', 'Dolphin', 'UC Browser', 'QQ Browser',
            'Opera Mobile', 'Mobile Safari', 'UCWEB', 'Baidu Browser', 'Yandex Browser',
            'MiuiBrowser', 'OppoBrowser', 'VivoBrowser', 'RealmeBrowser'
        );


        // Array yang berisi nama-nama browser yang dianggap sebagai tablet browser
        $tablet_browsers = array(
            'Tablet', 'Nexus 7', 'Nexus 10', 'KFAPWI', 'GT-P', 'SC-', 'iPad',
            'Kindle', 'Playbook', 'Xoom', 'SM-T', 'A2109', 'Nook', 'SCH-I800',
            'Transformer', 'Slate', 'SAMSUNG-SGH-I467', 'HP Slate', 'LG-V495',
            'SM-T710', 'SM-T720', 'SM-T800', 'SM-T810', 'SM-T820', 'SM-T830',
            'SM-T835', 'SM-T860', 'SM-T865', 'SM-T875', 'SM-T970', 'SM-T975',
            'SM-P200', 'SM-P205', 'SM-P580', 'SM-P585', 'SM-P600', 'SM-P605',
            'SM-P610', 'SM-P615', 'SM-P900', 'SM-P905', 'SM-P907', 'SM-P950',
            'SM-P955', 'SM-P957', 'SM-P580', 'SM-P585', 'SM-P610', 'SM-P615',
            'SM-T230', 'SM-T237', 'SM-T310', 'SM-T311', 'SM-T315', 'SM-T320',
            'SM-T325', 'SM-T520', 'SM-T525', 'SM-T530', 'SM-T535', 'SM-T550',
            'SM-T555', 'SM-T580', 'SM-T585', 'SM-T590', 'SM-T595', 'SM-T700',
            'SM-T705', 'SM-T710', 'SM-T715', 'SM-T800', 'SM-T805', 'SM-T810',
            'SM-T815', 'SM-T820', 'SM-T825', 'SM-T830', 'SM-T835', 'SM-T860',
            'SM-T865', 'SM-T875', 'SM-T970', 'SM-T975', 'SM-T280', 'SM-T285',
            'SM-T113', 'SM-T116', 'SM-T560', 'SM-T561', 'SM-T580', 'SM-T585',
            'SM-T590', 'SM-T595', 'SM-T830', 'SM-T835', 'SM-T860', 'SM-T865',
            'SM-T970', 'SM-T975', 'SM-T500', 'SM-T505', 'SM-T507', 'SM-T510',
            'SM-T515', 'SM-T525', 'SM-T530', 'SM-T535', 'SM-T550', 'SM-T555',
            'SM-T720', 'SM-T725', 'SM-T860', 'SM-T865', 'SM-T870', 'SM-T875',
            'SM-T880', 'SM-T885', 'SM-P200', 'SM-P205', 'SM-P3100', 'SM-P3110',
            'SM-P350', 'SM-P355', 'SM-P357', 'SM-P450', 'SM-P455', 'SM-P460',
            'SM-P461', 'SM-P610', 'SM-P615', 'SM-P620', 'SM-P625', 'SM-P627',
            'SM-P900', 'SM-P901', 'SM-P905', 'SM-P907', 'SM-P910', 'SM-P917'
        );

        // Looping untuk mengecek apakah user agent dari perangkat mobile atau tablet
        foreach ($mobile_browsers as $mobile_browser) {
            if (stripos($this->user_agent, $mobile_browser) !== false) {
                $this->is_mobile = true;
                break;
            }
        }

        foreach ($tablet_browsers as $tablet_browser) {
            if (stripos($this->user_agent, $tablet_browser) !== false) {
                $this->is_tablet = true;
                break;
            }
        }

        // Jika bukan mobile atau tablet, maka dianggap desktop
        if (!$this->is_mobile && !$this->is_tablet) {
            $this->is_desktop = true;
        }
    }

    public function is_mobile()
    {
        return $this->is_mobile;
    }

    public function is_tablet()
    {
        return $this->is_tablet;
    }

    public function is_desktop()
    {
        return $this->is_desktop;
    }

    public function get_device_type()
    {
        if ($this->is_mobile) {
            return 'mobile';
        } elseif ($this->is_tablet) {
            return 'tablet';
        } else {
            return 'desktop';
        }
    }
}
