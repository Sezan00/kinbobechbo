<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function store(Request $request, $productId){
        $request->validate([
            'question'=> 'required|string|max:255',
        ]);

        $product = Product::findOrFail($productId);
        Question::create([
            'product_id'=> $product->id,
            'asker_id' =>  Auth::id(),
            'question' => $request->question,
        ]);
        return back()->with('success', 'Your Question submited');
    }

    public function storeAnswer(Request $request, $questionId){
        $question = Question::findOrfail($questionId);
        $productOwerId = $question->product->user_id;

        if(Auth::id() != $productOwerId){
            return back()->with('error', 'you can not answer this question');
        }
        $request->validate([
            'answer' => 'required|string|max:255',
        ]);

        Answer::create([    
            'question_id' => $question->id,
            'replier_id' => Auth::id(),
            'answer' => $request->answer,
        ]);
        return back()->with('success', 'Your Answer submited');
    }
}
