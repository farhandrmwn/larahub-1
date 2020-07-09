# Larahub

Generate isi database
Perintah awal :

```
php artisan tinker
```

Setelah itu ketik perintah

```
factory("App\User", 5)->create()
```

```
factory("App\Pertanyaan", 5)->create()
```

```
factory("App\Jawaban", 5)->create()
```

Untuk fake database tabel komentar gunakan sql manual (Workbench / Heidi SQL / SQL Yog)

```
INSERT INTO `komentar` (`id`, `pertanyaan_id`, `jawaban_id`, `user_id`, `isi`, `created_at`) VALUES (1, NULL, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi malesuada dictum interdum. Maecenas blandit nisl magna, at commodo lacus auctor ut.', '0000-00-00 00:00:00');
INSERT INTO `komentar` (`id`, `pertanyaan_id`, `jawaban_id`, `user_id`, `isi`, `created_at`) VALUES (2, 5, NULL, 2, 'vitae vel eros. Maecenas ultricies risus nec ante pulvinar interdum. Nullam sollicitudin ornare eros ac ultrices', '0000-00-00 00:00:00');
INSERT INTO `komentar` (`id`, `pertanyaan_id`, `jawaban_id`, `user_id`, `isi`, `created_at`) VALUES (3, 5, NULL, 2, 'Ut rhoncus neque nunc, in feugiat mi auctor sit amet. Nunc urna neque, porta non venenatis vel, semper et mauris', '0000-00-00 00:00:00');
INSERT INTO `komentar` (`id`, `pertanyaan_id`, `jawaban_id`, `user_id`, `isi`, `created_at`) VALUES (4, NULL, 2, 5, 'Pellentesque ac bibendum sapien. Maecenas justo sapien, tincidunt sed est ac', '0000-00-00 00:00:00');
INSERT INTO `komentar` (`id`, `pertanyaan_id`, `jawaban_id`, `user_id`, `isi`, `created_at`) VALUES (5, 1, NULL, 3, 'Nulla facilisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '0000-00-00 00:00:00');
```

````
Pemasangan auth scafolding
sudah ter update pada composer.json "laravel/ui": "^2.1"
sudah tersedia root dan controller auth
````
## CRUD

### Menambah pertanyaan

dalam input / textarea atribut name yang dibutuhkan adalah

```
name="judul" // untuk mengisi judul
name="isi" // untuk mengisi isi pertanyaan
name="tag" // untuk mengisi tag dipisahkan dengan koma
```