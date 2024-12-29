# BASE THEME
Menyusun data secara dinamis ke dalam setiap halaman website menggunakan Tema Dasar yang dapat dikostumisasi dan diperluas.

> _Sebagai catatan, saat ini Base Theme Package berada dalam versi pengembangan yang dirilis v1.0.0 sebagai versi alpha._

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

<!--
Berdasarkan tema tertentu yang digunakan, seperti Home Page, Authentication Page, Dashboard Panel Page, atau tema halaman lainnya, memungkinkan adanya penambahan elemen yang secara otomatis ditambahkan ke dalam struktur halaman sebagai sub-elemen:
+ Sidebar Element
+ Main Content Element

#### Mengirim Data Menggunakan Fungsi
Data Compiler Service hanyalah kelas facade biasa yang menyediakan fungsionalitas sebagai penghubung untuk meneruskan data yang akan ditampilkan di halaman aplikasi.

Tersedia kelas facade yang secara spesifik menangani setiap sub-elemen yang berada dalam elemen utama layout.
+ Content Facade (Layanan Penyusun Data Utama)
+ Sidebar Facade (Layanan Penyusun Data Bilah Halaman)

**Dukungan fungsionalitas untuk menyuntikkan data ke dalam setiap elemen html.**
Memanggil fungsi melalui Facade dan menyuntikkan kelas komponen fitur untuk dirender pada tampilan html.

+ ``Content::header()``
+ ``Content::topHeader()``
+ ``Content::subHeader()``
+ ``Content::main()``
+ ``Content::extra()``
+ ``Content::footer()``
+ ``Content::copyright()``

Referensi khusus untuk halaman yang menggunakan bilah samping (sidebar).
+ ``Sidebar::main()``
+ ``Sidebar::tab()``
+ ``Sidebar::headPanel()``

#### Komponen Fitur (Feature Components)
Ini adalah bagian utama untuk menghubungkan data ke dalam setiap komponen html secara dynamic dan reuseable. Dibangun berdasarkan kelas komponen blade yang diperluas dan menghasilkan data dengan cara yang sangat sederhana!

Kelas Komponen Fitur menyediakan berbagai fungsionalitas yang dapat mengimplementasikan logika bisnis secara dinamis dan dapat dikendalikan secara penuh.

##### Kelas Komponen Fitur
Kelas Komponen Fitur merupakan turunan dari kelas komponen blade itu sendiri yang hanya berisi properti dan fungsi untuk menampilkan data berdasarkan logika yang disesuaikan.

Seperti penggunaan Sidebar Menu sebagai komponen fitur untuk menampilkan daftar menu bilah samping dengan cara yang sangat mudah dan sederhana:

```php
use Hascha\BaseTheme\Facade\Features\Sidebar;
use Hascha\BaseTheme\Components\Features\SideMenu;

Sidebar::main(SideMenu::class, function ($component) {
    return $component
    ->addMenu('Home', route('home'));
    ->addMenu('About', route('about'));
    ->addMenu('Products', function($dropdown) {
        $dropdown
        ->subMenu('Home Sweet', route('product.home-sweet'))
        ->subMenu('Tools', route('product.tools'));
    });
});
```

Terdapat banyak sekali Komponen Fitur yang siap digunakan. Dan Anda selalu dapat menambahkan Komponen Fitur Kustom sesuai kebutuhan aplikasi Anda!
-->

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


