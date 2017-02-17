<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Social;

class SocialController extends Controller
{
    /**
     * Fetch all socials
     * 
     * @return Social
     */
    public function adminGetSocials() {
        return Social::all();
    }

    /**
     * Fetch a particular social
     * 
     * @param integer $id
     * @return Article
     */
    public function adminGetSocial($id) {
        return Social::find($id);
    }

    public function adminUpdateSocial($id, Request $request) {
        $social = Social::find($id);

        $social->title = $request->title;
        $social->path = $request->path;

        $social->save();

        return $social;
    }
}
