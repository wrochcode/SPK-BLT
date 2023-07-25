<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $navbar= [
            'Home'=>'/',
            // 'About'=>'/about',
            // 'Contact'=>'/contact',
            // 'Profile'=>'/profile',
            'Tasks'=>'/tasks',
            'Criterias'=>'/criterias',
            'Subcriterias'=>'/subcriterias',
            'Alternatifalls'=>'/alternatifalls',
            'Results'=>'/results',
            
            
        ];
        
        //Cara lama
        // return view('components.navbar', [
        //     'navigations' => $navigations
        // ] ); 

        //Cara cepat
        //Jika namanya sama , cth : navigations => $navigations bisa dipersingkat menjadi seperti dibawah ini 
        return view('layouts.navbar', compact('navbar')); 


    }
}
