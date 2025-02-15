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
            'primary': '#bb4609',
            'secondary': '#f6bc9d',
            'c-theme': '#083344', // cyan-950
            'c-theme-secondary': '#cffafe', // cyan-100
            'c-theme-text': '#e2e8f0', // slate-200
            'c-theme-secondary-text': '#083344', // cyan-950
            'c-light': '#cbd5e1', // slate-300
            'c-light-dark': '#94a3b8', // slate-400
            'c-light-thick': '#94a3b8', // slate-400
            'c-light-thin': '#e2e8f0', // slate-200
            'c-dark': '#1e293b', // slate-800
            'c-dark-light': '#334155', // slate-700
            'c-dark-thin': '#334155', // slate-700
            'c-dark-thick': '#0f172a', // slate-950
            'c-border': '#d1d5db', // gray-300
            'c-border-thin': '#e5e7eb', // gray-200
            'c-border-thick': '#9ca3af', // gray-400
            'c-border-deep': '#475569', // slate-600
            'c-text': '#1e293b', // slate-800
            'c-text-secondary': '#334155', // slate-700
            'c-text-thick': '#0f172a', // slate-900
            'c-text-thin': '#475569', // slate-600
            'c-text-light': '#94a3b8', // slate-400
            'c-text-white': '#e2e8f0', // slate-200
            'info': '#0e7490', // cyan-700
            'success': '#065f46', // emerald-800
            'danger': '#991b1b', // red-800
            'warning': '#f59e0b', // amber-500
            'error': '#991b1b', // red-800
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