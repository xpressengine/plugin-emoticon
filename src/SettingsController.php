<?php
namespace Xpressengine\Plugins\Emoticon;

use XePresenter;
use App\Http\Controllers\Controller;
use Xpressengine\Http\Request;
use Xpressengine\Permission\PermissionSupport;

class SettingsController extends Controller
{
    use PermissionSupport;

    public function getSetting($instanceId)
    {
        $permArgs = $this->getPermArguments(Emoticon::getKey($instanceId), 'use');

        return XePresenter::make('emoticon::views.setting', [
            'instanceId' => $instanceId,
            'permArgs' => $permArgs
        ]);
    }

    public function postSetting(Request $request, $instanceId)
    {
        $this->permissionRegister($request, Emoticon::getKey($instanceId), 'use');

        return redirect()->route('emoticon::setting', $instanceId);
    }
}
