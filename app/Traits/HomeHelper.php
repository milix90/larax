<?php


namespace App\Traits;


trait HomeHelper
{
    public function activationError()
    {
        if (auth()->user()->activate === 1) {
            return redirect(route('home'));
        }

        return view('errors.activation');
    }
}
