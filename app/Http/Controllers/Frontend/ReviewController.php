<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserProductReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\ProductReviewGallery;
use App\Traits\imageUploadTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    use imageUploadTraits;
    public function index(UserProductReviewDataTable $dataTable){
        return $dataTable->render('frontend.dashboard.review.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'rating' => ['required'],
            'review' => ['required' , 'max:200'],
            'images.*' => ['image']
        ]);

        $checkReviewExist = ProductReview::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();
        if($checkReviewExist){
            toastr('Bạn đã thêm đánh giá cho sản phẩm này!', 'error','error');
            return redirect()->back();
        }


        $imagePaths = $this->uploadMultiImage($request, 'images','uploads');

        $productReview = new ProductReview();
        $productReview->product_id = $request->product_id;
        $productReview->user_id = Auth::user()->id;
        $productReview->rating = $request->rating;
        $productReview->review = $request->review;
        $productReview->status = 0;
        $productReview->save();

        if(!empty($imagePaths)){
            $reviewGallery = new ProductReviewGallery();

            foreach($imagePaths as $path){
                $reviewGallery->product_review_id = $productReview->id;
                $reviewGallery->image = $path;
                $reviewGallery->save();
            }
        }
        toastr('Review added successfully!', 'success', 'success');

        return redirect()->back();
    }
}
