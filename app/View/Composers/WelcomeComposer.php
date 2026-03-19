<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WelcomeComposer
{
    public function compose(View $view): void
    {
        // Exclude the "All Brands" catch-all (id = 1)
        $brands = DB::table('brands')
            ->where('id', '!=', 1)
            ->orderBy('name')
            ->get(['id', 'name']);

        // Pad to the next multiple of 5 so slides are always full sets
        $count    = $brands->count();
        $padded   = $count % 5 === 0 ? $count : $count + (5 - $count % 5);
        $blanks   = $padded - $count;

        $view->with('scrollerBrands', $brands)
             ->with('scrollerBlanks', $blanks)
             ->with('scrollerSlides', (int) ($padded / 5));
    }
}
