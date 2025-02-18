<?php

namespace Hascha\BaseTheme\Builder\Layout\Support;

use Illuminate\View\Component;
use Hascha\BaseTheme\Contracts\Layouting;
use Hascha\BaseTheme\Traits\View\Renderable;
use Hascha\BaseTheme\Traits\Factory\UseLayout;

class FrameStyle extends Component
{
    use UseLayout, Renderable;

    public function __construct(

        public $primary = '#bb4609',
        public $secondary = '#f6bc9d',

        public $cTheme = '#083344', // cyan-950
        public $cThemeSecondary = '#cffafe', // cyan-100

        public $cLight = '#cbd5e1', // slate-300
        public $cLightDark = '#94a3b8', // slate-400
        public $cLightThick = '#94a3b8', // slate-400
        public $cLightThin = '#e2e8f0', // slate-200

        public $cDark = '#1e293b', // slate-800
        public $cDarkLight = '#334155', // slate-700
        public $cDarkThick = '#0f172a', // slate-950
        public $cDarkThin = '#334155', // slate-700

        public $cBorder = '#d1d5db', // gray-300
        public $cBorderDeep = '#475569', // slate-600
        public $cBorderThick = '#9ca3af', // gray-400
        public $cBorderThin = '#e5e7eb', // gray-200

        public $cText = '#1e293b', // slate-800
        public $cTextDark = '#1e293b', // slate-800
        public $cTextLight = '#94a3b8', // slate-400
        public $cTextSecondary = '#334155', // slate-700
        public $cTextThick = '#0f172a', // slate-900
        public $cTextThin = '#475569', // slate-600
        public $cTextWhite = '#e2e8f0', // slate-200

        public $info = '#0e7490', // cyan-700
        public $success = '#065f46', // emerald-800
        public $danger = '#991b1b', // red-800
        public $warning = '#f59e0b', // amber-500
        public $error = '#991b1b', // red-800

        // public $cLight = '#', //

    )
    {
        $this->withName($this->__getClassName());
    }

    /**
     * Override component directory
     * @return string
     */
    protected function baseComponent()
    {
        return 'base::basetheme.layout.support.';
    }
}