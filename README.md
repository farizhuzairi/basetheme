# BASE THEME
Menyusun data secara dinamis ke dalam setiap halaman website menggunakan Tema Dasar yang dapat dikostumisasi dan diperluas.

_Sebagai catatan, saat ini Base Theme Package berada dalam versi pengembangan yang dirilis v1.0.0 sebagai versi alpha._

### Perkenalan
BaseTheme dibangun untuk mendukung pengembangan aplikasi berbasis website agar lebih efektif dan efisien. Fokus pada pekerjaan utama membangun aplikasi yang kuat dan sesegera mungkin mengimplementasikan bisnis tanpa mengubah kata "Hello World!"

Dibangun menggunakan konsep dasar Kelas Komponen (Blade Component). Menjaga kesederhanaan dengan memperluas objek yang didorong oleh Livewire. Ini lebih sederhana untuk memulai dengan cepat dan praktis!

##### Mempersiapkan halaman dengan dukungan Routing Package.
Routing Package sangat disarankan untuk mengoptimalisasi kinerja penyusunan data Base Theme ke dalam setiap antarmuka halaman.

Setiap halaman atau tampilan selalu mereferensikan Kelas Model Tema (Theme Model Class) sebagai model utama untuk menghasilkan struktur halaman secara utuh. Tidak perlu mengulangi pembuatan Model karena ini sangat berguna untuk banyak halaman yang tidak terbatas.

Setiap Theme Model dapat digunakan untuk satu atau beberapa halaman terkait dengan kesamaan tema dasar yang sesuai atau disesuaikan melalui BaseTheme Facade. Sangat sederhana, namun menghasilkan objek dinamis untuk setiap halaman dalam pengelolaan Controller Class atau DTO (Data Transfer Object).

#### Model Tema Halaman
Seperti yang sudah disebutkan, setiap tema dapat digunakan sebanyak mungkin sesuai yang diperlukan tanpa perlu membuat model tema berulang. Setiap tema hanya akan dirender ke dalam satu layout yang siap digunakan.

Theme Model memiliki boot() method untuk menambahkan default data atau objek yang akan dirender bersama untuk setiap tampilan dasar yang didefinisikan.

#### Struktur Elemen HTML
Theme Model dibangun berdasarkan html5 semantic yang pada akhirnya hanya akan menghasilkan kumpulan elemen utama (struktur elemen utama berada di dalam layout) terdiri dari:
+ Header Element
+ Body Element
+ Footer Element

Berdasarkan tema tertentu yang digunakan, seperti Home Page, Authentication Page, Dashboard Panel Page, atau tema halaman lainnya, memungkinkan adanya penambahan elemen yang secara otomatis ditambahkan ke dalam struktur halaman sebagai sub-elemen:
+ Sidebar Element
+ Main Content Element

_____________________________________________________________
## PERSIAPAN

#### Instalasi
Menambahkan dependency di dalam file composer.json: _“haschamedia/basetheme”: “^1.0”_, atau, gunakan perintah CLI: _composer require haschamedia/basetheme_.

#### Konfigurasi Awal
+ Publikasikan asset: php artisan basetheme:publish-assets (wajib).
+ Atur web manifest (icon): php artisan basetheme:webmanifest (opsional).
+ Hapus publikasi asset: php artisan basetheme:clean-assets (opsional).

### Membangun Halaman Dengan Model Tema (Theme Model)
Artisan: _php artisan basetheme:model {className}_, ubah _className_ menjadi nama kelas relevan, misalnya **HomePage** sehingga menghasilkan file dalam direktori **app/Themes** dapat menampung segala yang dibutuhkan halaman.
Panggil kelas model untuk menampilkan halaman penuh sebagai return value di dalam controller method.
``use App\Themes\HomePage;``
``return HomePage::make()->view();``

_Gunakan Theme Model Class untuk satu atau beberapa halaman. Ini akan lebih menguntungkan karena hanya akan menyimpan lebih sedikit file utama untuk merender halaman antarmuka._

_____________________________________________________________
## THEME
Pilihan tema yang dapat digunakan.
+ Home Page (theme::page)
+ Dashboard Panel (theme::panel)
+ Authentication Page (theme::auth)

Menentukan tema di dalam kelas model tema (Theme Model Class):
```php
protected string $theme = "theme::page";