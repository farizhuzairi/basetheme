# BASE THEME
Menyusun data secara dinamis ke dalam setiap halaman website menggunakan Tema Dasar yang dapat dikostumisasi dan diperluas.

> _Saat ini Base Theme Package berada dalam versi pengembangan yang dirilis v1.0.0 sebagai versi alpha._

_____________________________________________________________
## Introduction
BaseTheme dibangun untuk mendukung pengembangan aplikasi berbasis website berbasis Laravel dengan lebih efektif dan efisien. Fokus pada pekerjaan utama membangun aplikasi yang kuat dan sesegera mungkin mengimplementasikan bisnis tanpa mengubah kata "Hello World!"

```php
public function index()
{
    // Mengatur judul halaman secara manual
    baseTheme()->setPageTitle('My Page');
    
    // menghasilkan layout yang dirender sebagai antarmuka
    return App\Themes\HomePage::make()->view();
}
```

Dibangun menggunakan konsep dasar Kelas Komponen (Blade Component). Menjaga kesederhanaan dengan memperluas objek yang didorong oleh prinsip DTO Livewire. Ini lebih sederhana untuk memulai dengan cepat dan praktis!

> #### Menyiapkan Halaman Dengan Dukungan Routing Package
> Routing Package sangat disarankan untuk mengoptimalisasi kinerja penyusunan data Base Theme ke dalam setiap antarmuka halaman.

> Setiap halaman atau tampilan selalu mereferensikan Kelas Model Tema (Theme Model Class) sebagai model utama untuk menghasilkan struktur halaman secara utuh. Tidak perlu mengulangi pembuatan Model karena ini sangat berguna untuk banyak halaman yang tidak terbatas.

> Setiap Theme Model dapat digunakan untuk satu atau beberapa halaman terkait dengan kesamaan tema dasar yang sesuai atau disesuaikan melalui BaseTheme Facade. Sangat sederhana, namun menghasilkan objek dinamis untuk setiap halaman dalam pengelolaan Controller Class atau DTO (Data Transfer Object).

#### Simple Theme Model
Kelas Model Tema dapat digunakan sebanyak mungkin sesuai yang diperlukan tanpa perlu membuat model tema berulang. Dengan pemanggilan facade class, setiap tema hanya akan dirender ke dalam satu layout yang siap digunakan dalam satu siklus permintaan.

``App\Themes\HomePage::class;``
Ini adalah contoh Model Tema yang mewarisi kelas Theme Model untuk halaman aplikasi. Gunakan nama kelas yang relevan dan unik.

Selain pemanggilan layout sederhana, terdapat boot() method untuk menyesuaikan properti, menambahkan data atau atribut komponen, hingg memanggil berbagai fungsionalitas yang akan dirender bersama layout untuk setiap tampilan dasar yang didefinisikan pada satu siklus permintaan http.


_____________________________________________________________
## INSTALLATION
Memulai dengan menambahkan dependency di dalam file composer.json: _“haschamedia/basetheme”: “^1.0”_, atau gunakan composer: ``composer require haschamedia/basetheme``

## CONFIGURATION AND ASSETS
### Configurations
#### Konfigurasi Awal
+ Publikasikan asset: ``php artisan basetheme:publish-assets`` (wajib).
+ Atur web manifest (icon): ``php artisan basetheme:webmanifest`` (opsional).
+ Hapus publikasi asset: ``php artisan basetheme:clean-assets`` (opsional).

#### Mengubah Warna Tema Default Secara Global
Melalui Layanan Penyedia: ``baseTheme()->theme('soft');``
+ soft
+ basethick

### Assets
#### Mengubah Nama Brand, Logo, dan Icon
Perubahan ini dapat dilakukan baik secara global melalui Layanan Penyedia, atau secara langsung pada halaman yang diperlukan.
+ Atur nama brand, logo dan icon: ``themeConfig()->setBrands(name: string, logo: string, icon: ?string);``

_____________________________________________________________
## THEME MODEL (Theme Model Class)
Theme Model merupakan kerangka kerja yang digunakan untuk mendistribusikan data template ke dalam Theme Factory. Ketika Anda memiliki sebuah model tema yang telah dibuat, misalnya _HomePage::class_, ini akan menampung setiap data yang diperlukan untuk menampilkan view.

Di dalam Controller, Anda cukup memanggilnya dengan cara yang sangat sederhana.

```php
use Illuminate\Contracts\View\View;
use App\Themes\HomePage;

public function index(): View|string
{
    return HomePage::make()->view();
}
```

#### Membangun Halaman Dengan Model Tema (Theme Model)
Artisan: ``php artisan basetheme:model {className}``
Ubah _className_ menjadi nama kelas relevan dan unik, misalnya **HomePage** sehingga menghasilkan file dalam direktori **app/Themes** dapat menampung segala yang dibutuhkan halaman.
Panggil kelas model untuk menampilkan halaman penuh sebagai return value di dalam controller method.

> Melalui perintah artisan: `php artisan basetheme:model MyPage`

_Gunakan Theme Model Class untuk satu atau beberapa halaman. Ini akan lebih menguntungkan karena hanya akan menyimpan lebih sedikit file utama untuk merender halaman antarmuka._

### Page Theme
Tersedia beberapa pilihan tema halaman default siap digunakan.
+ Home Page (theme::page)
+ Dashboard Panel (theme::panel)
+ Authentication Page (theme::auth)

Menentukan tema di dalam kelas model tema (Theme Model Class):
``protected string $theme = "theme::page";``

_____________________________________________________________
## ELEMENTS (Html Structures)
Secara default, semua element yang diperlukan akan dirender secara otomatis berdasarkan tema halaman yang digunakan. Namun, Anda dapat secara manual mendefinisikan sendiri struktur element dari suatu halaman (page) yang akan dirender melalui kelas Controller (halaman spesifik) atau Layanan Penyedia (jika bersifat Global).
``BaseTheme::element(\HaschaMedia\BaseTheme\Components\Elements\Header::class, ['theme' => 'page']);``
Atau, jika Anda perlu merender banyak element sekaligus melalui kelas model tema maka gunakan withElements() method seperti berikut:
```php
protected function withElements()
{
    return [
        [
            'element' => \HaschaMedia\BaseTheme\Components\Elements\Header::class,
            'attributes' => [
                'theme' => $this->theme
            ]
        ],
        [
            'element' => \HaschaMedia\BaseTheme\Components\Elements\Body::class,
            'attributes' => []
        ],
        [
            'element' => \HaschaMedia\BaseTheme\Components\Elements\Footer::class,
            'attributes' => []
        ],
    ];
}
```

### Grouped structure (Struktur yang Dikelompokkan)
Theme Model dibangun berdasarkan html5 semantic yang pada akhirnya hanya akan menghasilkan kumpulan elemen utama (struktur elemen html yang tersusun di dalam layout). Secara default, html element terdiri dari:

+ **Header Element** ``'element' => \Hascha\BaseTheme\Components\Elements\Header::class``
+ **Body Element** ``'element' => \Hascha\BaseTheme\Components\Elements\Body::class``
+ **Footer Element** ``'element' => \Hascha\BaseTheme\Components\Elements\Footer::class``

_____________________________________________________________
## COMPONENT SERVICE (Component Service Facade)
Mendistribusikan data melalui kelas facade komponen secara dinamis.

### Content Facade
Mendistribusikan sebagian besar data ke dalam komponen tampilan adalah melalui method yang telah disediakan oleh Content Facade. Kelas ini menyiapkan objek data pada setiap elemen utama yang dirender oleh komponen blade.
``Hascha\BaseTheme\Facade\Features\Content::class``

#### Content Methods
+ Header Content `header()`
+ Top Header Specified Content `topHeader()`
+ Sub Header Specidied Content `subHeader()`
+ Main Content `main()`
+ Extra Content `extra()`
+ Foot Content `footer()`
+ Copyright Content `copyright()`

Contoh penggunaan:
```php
use Hascha\BaseTheme\Facade\Features\Content;
use Hascha\BaseTheme\Components\Features\Catalog\Gallerion;

Content::main(Gallerion::class, function($component) {
    return $component->subject('Extra Hebatnya!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eum, in error dolore recusandae ut quis debitis fugit perferendis! Quis, expedita molestiae.');
});
```

### Sidebar Facade
Selain objek data utama yang didistribusikan oleh Content Facade, terdapat kelas Sidebar yang membangun data bilah samping secara dinamis.
``Hascha\BaseTheme\Facade\Features\Sidebar::class``

#### Sidebar Methods
+ Main Content `main()`
+ Tab Content `tab()`
+ Head Panel Content `headPanel()`

Contoh penggunaan:
```php
use Hascha\BaseTheme\Facade\Features\Sidebar;
use Hascha\BaseTheme\Components\Features\Sidebar\SideMenu;

Sidebar::tab(['panel_' => SideMenu::class], function ($component) {
    $component->subject('Navigation')
    ->addMenu([1 => 'Home'], Router::INDEX->url())
    ->addMenu([2 => 'Login'], '#')
    ->addMenu([3 => 'Register'], '#')
    ->addMenu([4 => 'Marketing Studio'], '#exampleKey', function($dropdown) {
        $dropdown->subMenu('Master Product', '#')
        ->subMenu('Place Platform', '#')
        ->subMenu('Professional Platform', '#');
    })
    ->addMenu([5 => 'User Insights'], '#', function($dropdown) {
        $dropdown->subMenu('Guide', '#')
        ->subMenu('Documentations', '#')
        ->subMenu('Features', '#')
        ->subMenu('Service and Support', '#');
    })
    ->addMenu([6 => 'Blog'], '#');
    return $component;
});
```

### Specified Content Methods

#### Top Navigation
Ketika misalnya menambahkan _topNav()_ method `Content::topNav()` maka mengaktifkan fitur komponen Top Navigation.

Fitur Komponen yang dapat digunakan dalam Top Navigation melalui fungsi header:
+ Headline
+ Tagables
+ TopButtons

Contoh penggunaan:
```php
Content::topNav()
->header(Headline::class, function($component) {
    return $component
    ->typeOfHeader()
    ->setDefault();
});
```

#### Sub Navigation
Ketika misalnya menambahkan _subNav()_ method `Content::subNav()` maka mengaktifkan fitur komponen Sub Navigation.

Fitur Komponen yang dapat digunakan dalam Sub Navigation melalui fungsi header:
+ SubMenu
+ Item

Contoh penggunaan:
```php
Content::subNav()
->header(Item::class, function($component) {
    return $component->typeOfInfo()
    ->item('Spesial Promo Akhir Tahun!');
});
```

_____________________________________________________________
## FEATURE COMPONENTS (Features)
Kelas Komponen Fitur ini dapat digunakan secara langsung melalui panggilan balik pada fungsi layanan komponen.

1. Headline ``Hascha\BaseTheme\Components\Features\Headline\Headline::class``
2. Tagables ``Hascha\BaseTheme\Components\Features\Tagables::class``
3. Top Buttons ``Hascha\BaseTheme\Components\Features\TopButtons::class``
4. Sub Menu ``Hascha\BaseTheme\Components\Features\Navigation\SubMenu::class``
5. Item ``Hascha\BaseTheme\Components\Features\Items\Item::class``
6. Navigation Menu ``Hascha\BaseTheme\Components\Features\Navigation\NavMenu::class``
7. Card ``Hascha\BaseTheme\Components\Features\Card::class``
8. Description ``Hascha\BaseTheme\Components\Features\Description::class``
9. Flex Button ``Hascha\BaseTheme\Components\Features\FlexButton::class``
10. Head Panel ``Hascha\BaseTheme\Components\Features\HeadPanel::class``
11. Image ``Hascha\BaseTheme\Components\Features\Image::class``
12. Gallerion ``Hascha\BaseTheme\Components\Features\Catalog\Gallerion::class``
13. Charts ``Hascha\BaseTheme\Components\Features\Charts\Charts::class``
14. Container ``Hascha\BaseTheme\Components\Features\Container\Container::class``
15. Promotion Bag ``Hascha\BaseTheme\Components\Features\Events\PromotionBag::class``
16. Base Formulir (Form) ``Hascha\BaseTheme\Components\Features\Forms\BaseForm::class``
17. Stacked ``Hascha\BaseTheme\Components\Features\Items\Stacked::class``
18. Board ``Hascha\BaseTheme\Components\Features\List\Board::class``
19. Gridable ``Hascha\BaseTheme\Components\Features\Lis\Gridable::class``
20. Menu Bar ``Hascha\BaseTheme\Components\Features\Sidebar\MenuBar::class``
21. Sidebar Menu ``Hascha\BaseTheme\Components\Features\Sidebar\SideMenu::class``
