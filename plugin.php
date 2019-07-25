<?php
/**
 * Plugin.php
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

use XeFrontend;
use XePresenter;
use Route;
use Xpressengine\Http\Request;
use Xpressengine\Permission\Grant;
use Xpressengine\Plugin\AbstractPlugin;
use Xpressengine\User\Rating;

/**
 * Class Plugin
 *
 * @category    Emoticon
 * @package     Xpressengine\Plugins\Emoticon
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2019 Copyright XEHub Corp. <https://www.xehub.io>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        https://xpressengine.io
 */
class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        // implement code

        $this->route();

        intercept(
            'XeEditor@setTools',
            'emoticon.default.perm',
            function ($method, $instanceId, array $tools) {
                if (
                    in_array(Emoticon::getId(), $tools)
                    && !app('xe.permission')->get($key = Emoticon::getKey($instanceId))
                ) {
                    $this->registerDefaultPermission($key);
                }

                return $method($instanceId, $tools);
            }
        );
    }

    protected function route()
    {
        // implement code

        Route::fixed(
            'emoticon',
            function () {
                Route::get(
                    'popup',
                    [
                        'as' => 'emoticon::popup',
                        'uses' => function (Request $request) {

                            $title = 'editor emoticon';

                            // set browser title
                            XeFrontend::title($title);

                            XeFrontend::css($this->asset('assets/style.css'))->load();
                            XeFrontend::js($this->asset('assets/emoticon.js'))->load();

                            // output
                            return XePresenter::make('emoticon::views.popup', ['plugin' => $this]);

                        }
                    ]
                );
            }
        );

        Route::settings('emoticon', function () {
            Route::group(['prefix' => 'setting/{instanceId}', 'as' => 'emoticon::setting'], function () {
                Route::get('/', 'SettingsController@getSetting');
                Route::post('/', 'SettingsController@postSetting');
            });
        }, ['namespace' => __NAMESPACE__]);

    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        $this->registerDefaultPermission(Emoticon::getId());
    }

    public function checkInstalled()
    {
        return !!app('xe.permission')->get(Emoticon::getId());
    }

    private function registerDefaultPermission($key)
    {
        $grant = new Grant();
        $grant->set('use', [
            Grant::RATING_TYPE => Rating::USER,
            Grant::GROUP_TYPE => [],
            Grant::USER_TYPE => [],
            Grant::EXCEPT_TYPE => [],
            Grant::VGROUP_TYPE => [],
        ]);
        app('xe.permission')->register($key, $grant);
    }
}
