<?php

namespace Hascha\BaseTheme\Contracts;

use Illuminate\Contracts\View\View;

interface Builder
{
    /**
     * Mengambil data Instance View berdasarkan key name.
     * BaseThemeException akan dikembalikan jika key name atau instance tidak tersedia.
     */
    public function getView(string $name): View;

    // Ambil semua data Instance Views.
    public function views(): array;

    // Memeriksa keberadaan Instance Views.
    public function hasView(string $name): bool;
}