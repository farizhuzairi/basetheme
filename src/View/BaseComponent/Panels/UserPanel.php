<?php

namespace Hascha\BaseTheme\View\BaseComponent\Panels;

use Illuminate\Support\Facades\Auth;
use Hascha\BaseTheme\Traits\Explained;
use Hascha\BaseTheme\Services\ThemeService;
use Hascha\BaseTheme\Builder\Component\BaseComponent;
use Hascha\BaseTheme\Contracts\Component\Componentable;

class UserPanel extends BaseComponent implements Componentable
{
    use Explained;

    public function __construct(
        protected ?string $title = "User Panel Title",
        protected ?string $image = null,
        protected array $labels = [],
    )
    {
        if(empty($image)) $image = asset('images/base-layout/_user_b1.jfif');

        if(Auth::check()) {
            $user = Auth::user();
            $title = $user->name;
            
            parent::__construct(
                title: $title,
                image: $image,
                labels: $labels,
            );
        }
    }

    public function baseComponent(): string
    {
        return "base::basetheme.compoonents.panels.";
    }

    public function construction(ThemeService $service)
    {
        //
    }
}