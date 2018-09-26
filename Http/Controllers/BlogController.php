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
    public function deposit()
    {
        $data = [
            'data' => [
                [
                    'name' => 'name-1',
                    'content' => 'content-1',
                ],
                [
                    'name' => 'name-2',
                    'content' => 'content-2',
                ],
                [
                    'name' => 'name-3',
                    'content' => 'content-3',
                ],
            ]
        ];
        
        return view('blog::despoit', $data);
    }
    
    public function member()
    {
        $data = [
            'data' => [
                [
                    'name' => 'name-1',
                    'content' => 'content-1',
                ],
                [
                    'name' => 'name-2',
                    'content' => 'content-2',
                ],
                [
                    'name' => 'name-3',
                    'content' => 'content-3',
                ],
            ]
        ];
        
        return view('blog::member', $data);
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
