<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $reviews = Ulasan::with('kuliner')->latest()->get();
        return view('Feedback', compact('reviews'));
    }
}
