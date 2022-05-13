<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Review;
use DateTime;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        #dd($request);
        $reviewModel = new Review();
        $new = $reviewModel->storeReview($request);
        if ($new) {
            $logModel = new Log();
            $logModel->reviewLog(session("user")->id, $request->productId, $request->ip());
            $review = Review::where("id", $new)->first();
            $review->date = DateTime::createFromFormat('Y-m-d H:i:s', $review->created_at);
            $review->name = $review->user->name;
            $review->surname = $review->user->surname;

            return Json::encode($review);
        }
    }
}
