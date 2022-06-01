<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebSiteRequest;
use App\Models\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    public function addWebSite(WebSiteRequest $request)
    {
        WebSite::create([
            'title' => $request->title,
            'description' => $request->description,
            'company_name' => $request->company_name,

        ]);
        return "WebSite added successfully";
    }
}
