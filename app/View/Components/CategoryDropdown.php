<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Category::all();
        
        return view('components.category-dropdown', [
            'categories' => $categories,
            'currentCategory' => $categories->firstWhere('slug', request('category'))
        ]);
    }
}
