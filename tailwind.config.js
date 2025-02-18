const theme = {
    extend: {
        fontSize: {
            'xs': '0.75rem',
            'sm': '0.85rem',
            'base': '1rem',
            'lg': '1.1rem',
            'xl': '1.25rem',
            '2xl': '1.563rem',
            '3xl': '1.953rem',
            '4xl': '2.441rem',
            '5xl': '3.052rem',
        },
        screens: {
            'xs': '300px',
            'sm': '576px',
            'md': '768px',
            'lg': '992px',
            'xl': '1220px',
            '2xl': '1536px',
        },
        fontFamily: {
            sans: ['Open Sans', 'sans-serif'],
            'poppins': ['Poppins', 'sans-serif'],
            'rubik': ['Rubik', 'sans-serif'],
            'lato': ['Lato', 'sans-serif'],
            'bubbles': ['Fuzzy Bubbles', 'sans-serif'],
            'titillium': ['Titillium Web', 'sans-serif'],
        },
        borderWidth: {
            DEFAULT: '1px',
            '0': '0',
            '2': '2px',
            '3': '3px',
            '4': '4px',
            '6': '6px',
            '8': '8px',
            '12': '12px',
            '18': '18px',
            '20': '20px'
        },
        zIndex: {
            '60': '60',
            '70': '70',
            '80': '80',
            '90': '90',
            '100': '100',
        },
        colors: {
            'primary': 'var(--color-primary)',
            'secondary': 'var(--color-secondary)',
            'c-theme': 'var(--color-c-theme)',
            'c-theme-secondary': 'var(--color-c-theme-secondary)',
            'c-light': 'var(--color-c-light)',
            'c-light-dark': 'var(--color-c-light-dark)',
            'c-light-thick': 'var(--color-c-light-thick)',
            'c-light-thin': 'var(--color-c-light-thin)',
            'c-dark': 'var(--color-c-dark)',
            'c-dark-light': 'var(--color-c-dark-light)',
            'c-dark-thick': 'var(--color-c-dark-thick)',
            'c-dark-thin': 'var(--color-c-dark-thin)',
            'c-border': 'var(--color-c-border)',
            'c-border-deep': 'var(--color-c-border-deep)',
            'c-border-thick': 'var(--color-c-border-thick)',
            'c-border-thin': 'var(--color-c-border-thin)',
            'c-text': 'var(--color-c-text)',
            'c-text-dark': 'var(--color-c-text-dark)',
            'c-text-light': 'var(--color-c-text-light)',
            'c-text-secondary': 'var(--color-c-text-secondary)',
            'c-text-thick': 'var(--color-c-text-thick)',
            'c-text-thin': 'var(--color-c-text-thin)',
            'c-text-white': 'var(--color-c-text-white)',
            'info': 'var(--color-info)',
            'success': 'var(--color-success)',
            'danger': 'var(--color-danger)',
            'warning': 'var(--color-warning)',
            'error': 'var(--color-error)',
            'hascha': {
                50: '#ebeaf6',
                100: '#d7d6ed',
                200: '#c4c1e4',
                300: '#b0addc',
                400: '#8984ca',
                500: '#756fc2',
                600: '#625ab9',
                700: '#4e46b0',
                800: '#3b32a8',
                900: '#292375',
                950: '#1d1954'
            },
            'media': {
                50: '#e6f4eb',
                100: '#9bd3af',
                200: '#69bd88',
                300: '#36a760',
                400: '#059239',
                500: '#059239',
                600: '#04742d',
                700: '#036627',
                800: '#02491c',
                900: '#023a16',
                950: '#012b11'
            },
            'ems': {
                50: '#f8ccb6',
                100: '#f6bc9d',
                200: '#f29a6d',
                300: '#f08a54',
                400: '#ee793c',
                500: '#ec6824',
                600: '#b05103',
                700: '#ea580c',
                800: '#d24f0a',
                900: '#bb4609',
                950: '#a33d08'
            },
        },
    },
};

function generateSafelist() {
    const safelist = [];

    function processColors(colors, prefix = '') {
        Object.keys(colors).forEach(color => {
            if (typeof colors[color] === 'object') {
                processColors(colors[color], `${prefix}${color}-`);
            } else {
                safelist.push(`bg-${prefix}${color}`);
                safelist.push(`text-${prefix}${color}`);
                safelist.push(`border-${prefix}${color}`);

                safelist.push(`from-${prefix}${color}`);
                safelist.push(`via-${prefix}${color}`);
                safelist.push(`to-${prefix}${color}`);
            }
        });
    }

    processColors(theme.extend.colors);

    Object.keys(theme.extend.colors).forEach(color => {
        safelist.push(`bg-${color}`);
        safelist.push(`text-${color}`);
        safelist.push(`border-${color}`);
    });

    Object.keys(theme.extend.spacing || {}).forEach(spacing => {
        safelist.push(`p-${spacing}`);
        safelist.push(`m-${spacing}`);
    });

    Object.keys(theme.extend.borderWidth).forEach(width => {
        safelist.push(`border-${width}`);
    });

    Object.keys(theme.extend.fontFamily).forEach(font => {
        safelist.push(`font-${font}`);
    });

    Object.keys(theme.extend.fontSize).forEach(size => {
        safelist.push(`text-${size}`);
    });

    Object.keys(theme.extend.zIndex).forEach(index => {
        safelist.push(`z-${index}`);
    });

    return safelist;
}

const additionalSafelist = [
    'font-primary',
    'font-theme',
    'font-title',
    'font-sub-title',
    'font-sub-menu',
    'font-menu',
    'font-list',

    // base theme ...
    'body',
    'primitive'
];

import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
        './resources/js/**/*.js',
    ],
    safelist: generateSafelist().concat(additionalSafelist),
    darkMode: 'class',
    theme: theme,
    plugins: [
        forms,
        typography,
    ],
};