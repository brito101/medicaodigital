<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Meta;

class LaunchPageController extends Controller
{
    public function index()
    {
        Meta::set('title', 'Medição Digital - A medição em suas mãos');
        Meta::set('description', 'Sistema de medição e individualização de água');
        Meta::set('robots', 'index,follow');
        Meta::set('image', asset('img/share.png'));
        Meta::set('canonical', env('APP_URL'));

        return view('site.launch_page.index');
    }
}
