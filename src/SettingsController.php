<?php
/**
 * SettingsController.php
 *
 * PHP version 7
 *
 * @category    Emoticon
 * @package     Xpressengine\Plugins\Emoticon
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Plugins\Emoticon;

use XePresenter;
use App\Http\Controllers\Controller;
use Xpressengine\Http\Request;
use Xpressengine\Permission\PermissionSupport;

/**
 * Class SettingsController
 *
 * @category    Emoticon
 * @package     Xpressengine\Plugins\Emoticon
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
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
