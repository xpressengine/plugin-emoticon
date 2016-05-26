<?php
namespace Xpressengine\Plugins\Emoticon;

use App\Facades\XeFrontend;
use Illuminate\Contracts\Auth\Access\Gate;
use Xpressengine\Editor\AbstractTool;
use Xpressengine\Permission\Instance;

class Emoticon extends AbstractTool
{
    protected $gate;

    public function __construct(Gate $gate, $instanceId)
    {
        parent::__construct($instanceId);

        $this->gate = $gate;
    }

    public function initAssets()
    {
        XeFrontend::js(asset($this->getAssetsPath() . '/emoticon.js'))->load();
    }

    public function getIcon()
    {
        return asset($this->getAssetsPath() . '/icon.gif');
    }

    public function enable()
    {
        return $this->gate->allows('use', new Instance(static::getKey($this->instanceId)));
    }

    public static function getInstanceSettingURI($instanceId)
    {
        return route('settings.plugin.emoticon.setting', $instanceId);
    }

    public static function getKey($instanceId)
    {
        return static::getId() .  '.' . $instanceId;
    }

    public function compile($content)
    {
        return $content;
    }

    private function getAssetsPath()
    {
        return str_replace(base_path(), '', realpath(__DIR__ . '/../assets'));
    }
}
