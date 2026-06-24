<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $artikels = [
            [
                'judul' => 'Berita: Warunk Cek Donna Hadir Lebih Dekat di Kota Anda',
                'kategori' => 'Berita',
                'image' => 'images/hero.jpeg',
                'ringkasan' => 'Kabar baik! Warunk Cek Donna membuka peluang lebih besar untuk menikmati menu favorit dengan harga bersahabat.',
                'konten' => "Warunk Cek Donna kini hadir lebih dekat untuk Anda. Kami percaya bahwa makanan enak harus bisa dinikmati oleh semua kalangan.

Di setiap sajian, kami menjaga kualitas bahan dan proses pengolahan agar rasa tetap konsisten.

Kunjungi Gerai Warunk Cek Donna dan rasakan sendiri menu andalan kami—hangat, gurih, dan bikin nagih.",
            ],
            [
                'judul' => 'Berita: Mengapa Menu Nusantara Tetap Jadi Favorit Utama?',
                'kategori' => 'Berita',
                'image' => 'images/makanan.jpeg',
                'ringkasan' => 'Cita rasa Nusantara punya daya tarik tersendiri—mulai dari bumbu yang kaya hingga tekstur yang memanjakan lidah.',
                'konten' => "Menu Nusantara selalu punya tempat di hati. Bumbu yang diracik dengan tepat membuat setiap gigitan terasa penuh.

Selain lezat, menu Nusantara juga identik dengan kehangatan—cocok untuk makan bersama keluarga.

Di Warunk Cek Donna, kami menyajikan pilihan menu yang mudah dipesan dan selalu siap menghangatkan suasana.",
            ],
            [
                'judul' => 'Berita: Tips Memilih Makanan Beku yang Tetap Lezat',
                'kategori' => 'Tips',
                'image' => 'images/frozen_food.jpeg',
                'ringkasan' => 'Makanan beku bisa tetap nikmat jika disimpan dengan benar dan diolah sesuai arahan.',
                'konten' => "Makanan beku praktis, tapi tetap perlu cara penyimpanan dan pengolahan yang tepat.

1) Simpan pada suhu sesuai standar freezer.
2) Hindari proses pencairan berulang.
3) Masak hingga matang merata agar tekstur dan rasa optimal.

Dengan tips ini, hidangan beku Anda tetap lezat seperti baru dimasak.",
            ],
            [
                'judul' => 'Berita: Cara Mengatur Porsi Agar Tetap Puas',
                'kategori' => 'Tips',
                'image' => 'images/placeholder.svg',
                'ringkasan' => 'Porsi seimbang membuat Anda tetap puas tanpa khawatir berlebihan.',
                'konten' => "Bagi banyak orang, makan yang memuaskan bukan hanya soal kenyang, tapi juga soal komposisi porsi.

Pilih menu utama, tambahkan pendamping, lalu seimbangkan dengan minuman.

Rekomendasi: coba padukan menu makanan dengan minuman segar untuk pengalaman makan yang lebih maksimal.",
            ],
            [
                'judul' => 'Promo: Diskon Spesial Pembelian Paket Hemat',
                'kategori' => 'Promo',
                'image' => 'images/makanan.jpeg',
                'ringkasan' => 'Waktunya hemat! Dapatkan diskon untuk paket menu favorit Anda.',
                'konten' => "Sedang cari cara makan enak tapi tetap hemat? Paket hemat Warunk Cek Donna adalah jawabannya.

Paket kami disusun dari menu favorit agar Anda tidak perlu bingung memilih.

Promo berlaku untuk periode terbatas—pastikan Anda cek menu dan ambil sebelum habis!",
            ],
            [
                'judul' => 'Promo: Beli Minuman Segar Lebih Murah di Jam Istimewa',
                'kategori' => 'Promo',
                'image' => 'images/minuman.jpeg',
                'ringkasan' => 'Segarkan hari Anda! Nikmati harga spesial minuman pada jam tertentu.',
                'konten' => "Siang terasa lebih ringan dengan minuman segar.

Kami hadirkan promo jam istimewa untuk minuman pilihan. Rasanya tetap enak, harganya lebih ramah.

Datang dan nikmati saat promo berlangsung—buat waktu istirahat Anda terasa lebih nikmat.",
            ],
            [
                'judul' => 'Tips: Rahasia Bumbu Tetap Pas Saat Masak di Rumah',
                'kategori' => 'Tips',
                'image' => 'images/placeholder.svg',
                'ringkasan' => 'Bumbu yang pas menentukan hasil akhir. Gunakan panduan sederhana berikut.',
                'konten' => "Rahasia masakan yang enak ada pada keseimbangan rasa.

Mulailah dari takaran bumbu, cicipi bertahap, lalu sesuaikan. Jangan menambahkan bumbu sekaligus di akhir.

Dengan cara ini, rasa lebih terkontrol dan hasil masakan lebih konsisten.",
            ],
            [
                'judul' => 'Berita: Testimoni Pelanggan—“Rasanya Konsisten!”',
                'kategori' => 'Berita',
                'image' => 'images/hero.jpeg',
                'ringkasan' => 'Pelanggan semakin yakin karena setiap pesanan memiliki rasa yang stabil dan memuaskan.',
                'konten' => "Kepuasan pelanggan selalu menjadi fokus utama.

Banyak pelanggan menyampaikan bahwa rasa Warunk Cek Donna konsisten dari waktu ke waktu. Hal ini tidak lepas dari komitmen kami menjaga kualitas bahan.

Terima kasih sudah mendukung Warunk Cek Donna. Kami akan terus berinovasi demi pengalaman makan yang lebih baik.",
            ],
            [
                'judul' => 'Promo: Gratis Topping Pilihan untuk Pembelian Minimum',
                'kategori' => 'Promo',
                'image' => 'images/makanan.jpeg',
                'ringkasan' => 'Naik level! Tambahkan topping pilihan secara gratis saat memenuhi syarat pembelian.',
                'konten' => "Tingkatkan rasa makanan Anda dengan topping pilihan.

Saat melakukan pembelian dengan nominal minimum tertentu, Anda berkesempatan mendapatkan topping gratis.

Pastikan cek syarat dan ketentuan promo yang berlaku. Yuk buruan—stok bisa cepat habis!",
            ],
            [
                'judul' => 'Berita: Tren Makanan Segar dan Praktis Makin Ngetren',
                'kategori' => 'Berita',
                'image' => 'images/hero.jpeg',
                'ringkasan' => 'Kebutuhan makanan yang cepat, praktis, dan tetap lezat semakin dicari banyak orang.',
                'konten' => "Masyarakat kini semakin sibuk, sehingga pilihan makanan yang praktis menjadi prioritas.

Namun, praktis bukan berarti harus mengorbankan rasa. Warunk Cek Donna menghadirkan menu yang tetap nikmat dan mudah dinikmati kapan saja.

Pilih menu sesuai selera Anda dan nikmati kenyamanan makan tanpa ribet.",
            ],
            [
                'judul' => 'Tips: Cara Penyajian Frozen Food Biar Tidak Kurang Tekstur',
                'kategori' => 'Tips',
                'image' => 'images/frozen_food.jpeg',
                'ringkasan' => 'Tekstur yang pas bikin pengalaman makan jadi lebih nikmat. Ini panduan singkatnya.',
                'konten' => "Frozen food dapat tetap memiliki tekstur terbaik jika penyajiannya tepat.

Gunakan metode pemanasan yang sesuai (goreng/panggang/masak) sampai matang. Hindari pemanasan terlalu lama agar tidak kering.

Dengan pengaturan waktu yang benar, hasilnya lebih renyah dan rasa tetap terjaga.",
            ],
            [
                'judul' => 'Promo: Diskon Spesial untuk Pemesanan Takeaway',
                'kategori' => 'Promo',
                'image' => 'images/minuman.jpeg',
                'ringkasan' => 'Ambil sendiri jadi lebih hemat! Nikmati diskon khusus untuk pesanan takeaway.',
                'konten' => "Takeaway kini makin menguntungkan.

Promo diskon spesial untuk pemesanan takeaway memberikan harga lebih ramah sekaligus tetap menjaga kualitas rasa.

Pesan sekarang dan siap-siap menikmati menu favorit Anda di rumah.",
            ],
        ];

        foreach ($artikels as $data) {
            Artikel::updateOrCreate(
                ['judul' => $data['judul']],
                $data
            );
        }
    }
}

