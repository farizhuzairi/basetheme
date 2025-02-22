# BASE THEME
>Building data complexity dynamically, like creating a flow of poetry with beautiful meaning.

Membangun kompleksitas data secara dinamis, seperti menciptakan aliran puisi dengan makna yang indah.

`php artisan basetheme:model HomePage`

Kendalikan aliran logika bisnis untuk lebih banyak halaman dalam satu kelas model _App\Themes\HomePage::class_.

---
> ##### _Saat ini Basetheme berada dalam versi pengembangan sebagai versi alpha._
> *Support for __Hascha Digital Media__ applications*.

## Menyiapkan Rilis Pertama
Menyederhanakan, mengumpulkan, hingga memperluas objek melalui satu titik sumber daya terbuka yang diamankan.

```php
public function index(): View|string
{
    return HomePage::make()->view();
}
```

→ Sentralisasi data dalam satu kelas Model Tema (Theme Model) yang dapat didistribusikan ke banyak halaman secara fleksibel.

`protected string $theme = "theme::page";`

→ Memudahkan implementasi logika bisnis menggunakan konsep kelas pengendali yang diklasifikasi dan terstruktur.

```php
public function index(Request $request): View|string
{
    baseTheme()->setPageTitle($request->routeAs()->pageTitle());
    
    Content::main(Gallerion::class, function($component) {
        return $component->subject('My Home Page', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.');
    });
    
    return HomePage::make()->view();
}
```

→ Menggunakan kelas komponen untuk user interface dan tampilan halaman yang dapat dikostumisasi.

```php
public function about(Request $request): View|string
{
    Content::main(Container::class, function($content) {
        return $content->content(...);
    });
    
    return HomePage::make()->view();
}
```

Kita bisa melihat bagaimana Home Page memiliki halaman default _\/index_ dan _\/about_ dengan kelas model tema (_Theme Model_) yang sama, `App\Themes\HomePage::class`.
