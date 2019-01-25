<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Artisan;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index()
    {
        return view('layout.master');
    }


    public function getPortfolioItem(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;

        $portfolioImages = ImageModel::leftJoin('categories', 'images.category_id', '=', 'categories.id')
            ->whereNotIn('category_id', [0])
            ->orderBy('order', 'Desc')
            ->offset($offset)
            ->limit($limit)
            ->get([
                'images.id',
                'images.file_path',
                'images.thumb_file_path',
                'images.type',
                'categories.name',
                'categories.category as category',
            ]);
        $public_html = strval(view('mahmud.portfolio_elements', compact('portfolioImages')));

        return response()->json([
            'html' => $public_html,
        ]);
    }

    public function clearCache(){
        Artisan::call('cache:clear');
        echo '<h3>Cache facade value cleared. . . .</h3>';
        Artisan::call('optimize');
        echo '<h3>Re optimized class loader</h3>';
        Artisan::call('route:cache');
            echo '<h3>Routes cached</h3>';
        Artisan::call('route:clear');
        echo '<h3>Route cache cleared</h3>';
        Artisan::call('view:clear');
        echo '<h3>View cache cleared</h3>';
        Artisan::call('config:cache');
        echo '<h3>Clear Config cleared</h3>';
        Artisan::call('config:clear');
        echo '<h3>Clear Config file</h3>';
    }
}
