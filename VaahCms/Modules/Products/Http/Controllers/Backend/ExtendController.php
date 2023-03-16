<?php  namespace VaahCms\Modules\Products\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ExtendController extends Controller
{

    //----------------------------------------------------------
    public function __construct()
    {
    }
    //----------------------------------------------------------
    public static function topLeftMenu()
    {
        $links = [];

        $response['status'] = 'success';
        $response['data'] = $links;

        return $response;

    }
    //----------------------------------------------------------
    public static function topRightUserMenu()
    {
        $links = [];

        $response['status'] = 'success';
        $response['data'] = $links;

        return $response;
    }
    //----------------------------------------------------------
    public static function sidebarMenu()
    {
        $links = [];

        $links[0] = [
            'link' => route('vh.backend.products'),
            'icon' => 'cubes',
            'label'=> 'Products'
        ];

        $response['status'] = 'success';
        $response['data'] = $links;

        return $response;
    }
    //----------------------------------------------------------

}
