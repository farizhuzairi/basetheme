@props([

    'primary',
    'secondary',

    'cTheme',
    'cThemeSecondary',

    'cLight',
    'cLightDark',
    'cLightThick',
    'cLightThin',

    'cDark',
    'cDarkLight',
    'cDarkThick',
    'cDarkThin',

    'cBorder',
    'cBorderDeep',
    'cBorderThick',
    'cBorderThin',

    'cText',
    'cTextDark',
    'cTextLight',
    'cTextSecondary',
    'cTextThick',
    'cTextThin',
    'cTextWhite',

    'info',
    'success',
    'danger',
    'warning',
    'error',

])
<style>
:root {

    --color-primary: {{ $primary }};
    --color-secondary: {{ $secondary }};

    --color-c-theme: {{ $cTheme }};
    --color-c-theme-secondary: {{ $cThemeSecondary }};

    --color-c-light: {{ $cLight }};
    --color-c-light-dark: {{ $cLightDark }};
    --color-c-light-thick: {{ $cLightThick }};
    --color-c-light-thin: {{ $cLightThin }};

    --color-c-dark: {{ $cDark }};
    --color-c-dark-light: {{ $cDarkLight }};
    --color-c-dark-thick: {{ $cDarkThick }};
    --color-c-dark-thin: {{ $cDarkThin }};

    --color-c-border: {{ $cBorder }};
    --color-c-border-deep: {{ $cBorderDeep }};
    --color-c-border-thick: {{ $cBorderThick }};
    --color-c-border-thin: {{ $cBorderThin }};

    --color-c-text: {{ $cText }};
    --color-c-text-dark: {{ $cTextDark }};
    --color-c-text-light: {{ $cTextLight }};
    --color-c-text-secondary: {{ $cTextSecondary }};
    --color-c-text-thick: {{ $cTextThick }};
    --color-c-text-thin: {{ $cTextThin }};
    --color-c-text-white: {{ $cTextWhite }};

    --color-info: {{ $info }};
    --color-success: {{ $success }};
    --color-danger: {{ $danger }};
    --color-warning: {{ $warning }};
    --color-error: {{ $error }};

}
</style>