<?php
// receive a request -> delegate -> return a response

namespace App\controllers;

class PagesController
{
    public function Home()
    {
        return view('index');
    }

    public function about()
    {
        $company='laracast';
        return view('about',['company'=>$company]);
    }

    public function contact()
    {
        return view('contact');    }

}