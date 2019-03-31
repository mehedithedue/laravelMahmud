<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Artisan;
use DB;
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

        $limit = $limit / 4;
        $offset = ($offset == 0 ) ? $offset : ($offset / 4);

//        $portfolioImages = ImageModel::leftJoin('categories', 'images.category_id', '=', 'categories.id')
//            ->whereNotIn('category_id', [0])
////            ->orderBy('order', 'Desc')
//            ->inRandomOrder()
//            ->offset($offset)
//            ->limit($limit)
//            ->get([
//                'images.id',
//                'images.file_path',
//                'images.thumb_file_path',
//                'images.type',
//                'categories.name',
//                'categories.category as category',
//            ]);
//

        $rawPortfolioImages = DB::select('SELECT images.id, images.file_path, images.thumb_file_path, images.type, categories.name, categories.category AS category FROM (SELECT * FROM (SELECT * FROM images WHERE category_id = 1 ORDER BY \'order\' DESC LIMIT '.$limit.' OFFSET '.$offset.') AS catOne UNION SELECT * FROM (SELECT * FROM images WHERE category_id = 2 ORDER BY \'order\' DESC LIMIT '.$limit.' OFFSET '.$offset.') AS catTwo UNION SELECT * FROM (SELECT * FROM images WHERE category_id = 3 ORDER BY \'order\' DESC LIMIT '.$limit.' OFFSET '.$offset.') AS catThree UNION SELECT * FROM (SELECT * FROM images WHERE category_id = 4 ORDER BY \'order\' DESC LIMIT '.$limit.' OFFSET '.$offset.') AS catFour) AS images LEFT JOIN categories ON images.category_id = categories.id');

        $portfolioImages = collect($rawPortfolioImages)->shuffle();

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
