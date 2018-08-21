<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Libraries\Microservices\Register;
use Libraries\Microservices\Install;
use Libraries\Microservices\Menu;
use Libraries\Microservices\Menu\ParallelDataFormat;

use Illuminate\Support\Facades\File;
use Libraries\FunpodiumAPIClient\APIClient;
use Chumper\Zipper\Zipper;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        // $full_path_dest = resource_path('views/modules/blog2/').'csvfile2.zip';
        // echo system("file -i -b ".$full_path_dest);

        // $full_path_dest = resource_path('views/modules/blog').'';
        // if (!File::exists(dirname($full_path_dest))) {
        //     File::makeDirectory(dirname($full_path_dest), null, true);
        // }

        // $full_path_source = resource_path('views/modules/blog2').'';
        // File::move($full_path_dest, $full_path_source);

        // ==============

        // $data = [
        //     [
        //         'name' => 'Microservices-A',
        //         'endpoint' => 'https://github.com/w19900227/unitest-php',
        //         'version' => '1.0',
        //     ],
        //     [
        //         'name' => 'Microservices-B',
        //         'endpoint' => 'https://github.com/w19900227/unitest-php',
        //         'version' => '2.0',
        //     ],
        // ];

        // $ms = new Register();
        // // // $data = $ms->convertArrayToJson($data);
        // // $d = $ms->isJson($data);
        // // // $d = $ms->isJson($json);
        // // dd($d);
        // $ms->init($data);
        // ==============

        // $uri = 'https://github.com/laravel/laravel/archive/master.zip';
        // $client = new APIClient();
        // $response = $client->request('GET', $uri);

        // $install = new Install();

        // $source = storage_path('app/test.zip');
        // $purpose = storage_path('app/aa');

        // $install->download($source, $response->getBody());
        // $install->unzip($source, $purpose);
        // ==============
        $class_data = [
            'Microservices-A' => [
                'member' => [
                    'create' => 'Role-A',
                    'update' => 'Role-B',
                    'delete' => 'Role-C',
                ],
                'deposit' => [
                    'create' => 'Role-A',
                    'update' => 'Role-B',
                    'delete' => 'Role-C',
                ],
            ],
            'Microservices-B' => [
                'task' => [
                    'create' => 'Role-A',
                    'update' => 'Role-B',
                ],
            ],
        ];

        $parallel_data = [
            [
                'name' => 'Microservices-A',
                'menu' => 'member',
                'sub_menu' => 'create',
                'permission' => 'Role-A',
            ],
            [
                'name' => 'Microservices-A',
                'menu' => 'member',
                'sub_menu' => 'update',
                'permission' => 'Role-B',
            ],
            [
                'name' => 'Microservices-A',
                'menu' => 'member',
                'sub_menu' => 'delete',
                'permission' => 'Role-C',

            ],
            [
                'name' => 'Microservices-A',
                'menu' => 'deposit',
                'sub_menu' => 'create',
                'permission' => 'Role-A',
            ],
            [
                'name' => 'Microservices-A',
                'menu' => 'deposit',
                'sub_menu' => 'update',
                'permission' => 'Role-B',
            ],
            [
                'name' => 'Microservices-A',
                'menu' => 'deposit',
                'sub_menu' => 'delete',
                'permission' => 'Role-C',

            ],
            [
                'name' => 'Microservices-B',
                'menu' => 'task',
                'sub_menu' => 'create',
                'permission' => 'Role-A',

            ],
            [
                'name' => 'Microservices-B',
                'menu' => 'task',
                'sub_menu' => 'update',
                'permission' => 'Role-B',
            ],
        ];



        $class = new \Libraries\Microservices\Menu\ClassDataFormat($class_data);
        $menu = new \Libraries\Microservices\Menu\Menu($class);
        $result = $menu->processMenus();
        $menus = $menu->getVerifyUserRoleMenus('Role-A');
        // dd($menus);
        $parallel = new \Libraries\Microservices\Menu\ParallelDataFormat($parallel_data);
        $menu = new \Libraries\Microservices\Menu\Menu($parallel);
        $result = $menu->processMenus($parallel);
        $menus = $menu->getVerifyUserRoleMenus('Role-A');
        dd($menus);

        dd($result);
        // return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
