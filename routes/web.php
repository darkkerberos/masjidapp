<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
/*frontend*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/artikel', 'ArtikelController@index')->name('home_artikel');
Route::get('/artikel/{kategori}', 'ArtikelController@kategori')->name('home_artikel_kategori');
Route::get('/artikel/{kategori}/{slug_url}', 'ArtikelController@detail')->name('home_artikel_kategori_detail');
Route::get('/jadwal', 'JadwalController@index')->name('jadwal');
Route::get('/jadwal-sholat', 'JadwalController@index')->name('jadwal');
Route::get('/kontak', 'KontakController@index')->name('kontak');
Route::get('/geo', 'GeoController@index')->name('geoloc');

/*backend*/
Route::get('/admin/', 'AdminHomeController@index')->name('adminhome');
Route::get('/admin/home', 'AdminHomeController@index')->name('adminhome');
//Pengurus
Route::get('/admin/pengurus', 'backend\PengurusController@index')->name('pengurus');
Route::get('/admin/datapengurus', 'backend\PengurusController@tabelDataPengurus')->name('datapengurus');
Route::post('/admin/view_edit_pengurus', 'backend\PengurusController@viewEdit')->name('view_edit_pengurus');
Route::post('/admin/edit_pengurus', 'backend\PengurusController@editPengurus')->name('editpengurus');
Route::post('/admin/hapus_pengurus', 'backend\PengurusController@hapusPengurus')->name('hapuspengurus');
Route::post('/admin/tambah_pengurus', 'backend\PengurusController@tambahPengurus')->name('tambahpengurus');
//Menu Home
Route::get('/admin/menu/home', 'backend\MenuController@home')->name('menu_home');
Route::post('/admin/menu/home/update', 'backend\MenuController@homeUpdate')->name('menu_home_update');
//Menu Sejarah
Route::get('/admin/menu/sejarah', 'backend\MenuController@sejarah')->name('menu_sejarah');
Route::post('/admin/menu/sejarah/update', 'backend\MenuController@sejarahUpdate')->name('menu_sejarah_update');
//Kontak
Route::get('/admin/kontak', 'backend\KontakController@index')->name('admin_kontak');
Route::post('/admin/kontak/update', 'backend\KontakController@update')->name('admin_kontak_update');
//User
Route::get('/admin/user', 'backend\UserController@index')->name('user');
Route::get('/admin/user/data', 'backend\UserController@data')->name('userdata');
Route::post('/admin/user/update', 'backend\UserController@update')->name('userupdate');
Route::post('/admin/user/update_password', 'backend\UserController@updatePassword')->name('userupdatepassword');
Route::post('/admin/user/add', 'backend\UserController@add')->name('useradd');
Route::post('/admin/user/delete', 'backend\USerController@delete')->name('userdelete');
Route::post('/admin/user/view', 'backend\UserController@view')->name('userview');
//Role
Route::get('/admin/role', 'backend\RoleController@index')->name('role');
Route::get('/admin/role/data', 'backend\RoleController@data')->name('roledata');
Route::post('/admin/role/update', 'backend\RoleController@update')->name('roleupdate');
Route::post('/admin/role/add', 'backend\RoleController@add')->name('roleadd');
Route::post('/admin/role/delete', 'backend\RoleController@delete')->name('roledelete');
Route::post('/admin/role/view', 'backend\RoleController@view')->name('roleview');

//File
Route::get('/admin/file', 'backend\FilesController@index')->name('file');
Route::post('/admin/file/uploadFiles', 'backend\FilesController@uploadFiles')->name('uploadfiles');
Route::post('/admin/file/deletefiles', 'backend\FilesController@deleteFiles')->name('deletefiles');

//Artikel
Route::get('/admin/artikel', 'backend\ArtikelController@index')->name('artikel');
Route::get('/admin/artikel/dataartikel', 'backend\ArtikelController@tabelDataArtikel')->name('dataartikel');
Route::post('/admin/artikel/view_artikel', 'backend\ArtikelController@viewArtikel')->name('viewartikel');
Route::post('/admin/artikel/edit_artikel', 'backend\ArtikelController@editArtikel')->name('editartikel');
Route::post('/admin/artikel/hapus_artikel', 'backend\ArtikelController@hapusArtikel')->name('hapusartikel');
Route::post('/admin/artikel/tambah_artikel', 'backend\ArtikelController@tambahArtikel')->name('tambahartikel');

//Kategori Artikel
Route::get('/admin/kategori', 'backend\KategoriController@index')->name('kategori');
Route::get('/admin/kategori/datakategori', 'backend\KategoriController@data')->name('datakategori');
Route::post('/admin/kategori/view_kategori', 'backend\KategoriController@view')->name('viewkategori');
Route::post('/admin/kategori/edit_kategori', 'backend\KategoriController@update')->name('editkategori');
Route::post('/admin/kategori/hapus_kategori', 'backend\KategoriController@delete')->name('hapuskategori');
Route::post('/admin/kategori/tambah_kategori', 'backend\KategoriController@add')->name('tambahkategori');

//ProfileUser
Route::get('/admin/profile', 'backend\ProfilController@index')->name('profile');
Route::post('/admin/profile/updateprofile', 'backend\ProfilController@updateProfile')->name('updateprofile');
Route::post('/admin/profile/changepassword', 'backend\ProfilController@changePassword')->name('changepassword');