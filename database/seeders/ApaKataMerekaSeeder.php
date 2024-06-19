<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApaKataMereka;

class ApaKataMerekaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApaKataMereka::create([
            'name' => "Ghazi Maulana",
            'instance' => "Peserta Creative Nilam Training",
            'answer' => "Saya mendapatkan ilmu dan langsung praktek, pelatihan sangat efektif. Ke depan saya berharap bisa menciptakan produk untuk bisnis. Output dari pelatihan Amanah ini sangat berguna untuk membuat bisnis.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Suraiya Kamaruzzaman",
            'instance' => "Mitra Amanah – Koordinator Community Development Pusat Riset Atsiri",
            'answer' => "Saat seleksi awal, kami sudah melihat potensi luar biasa pada beberapa peserta. Namun, sebelumnya mereka hanya bekerja secara otodidak, tanpa jaringan atau tim kerja yang kuat, sehingga proses pengembangan ide mereka berjalan lambat. Ini terobosan yang cukup baik dari AMANAH untuk mendorong anak muda tidak hanya nongkrong di warung kopi tapi memanfaatkan waktu di warung kopi menjadi lebih efektif dan bermanfaat untuk pengembangan kehidupan ke depan.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Afra Syahra Nabilah Azhar",
            'instance' => "Peserta Pelatihan X Fashion - Explore Your Passion in Fashion",
            'answer' => "Kegiatan di Amanah tuh seru banget, banyak ilmu yang dikasih para mentor dan narasumber dan part yang menarik hari ini itu mengenai pembahasan strategi fashion untuk pasar global dan memahami DNA diri kita sendiri.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Khairul Fajri",
            'instance' => "Mitra Amanah – Ketua Indonesian Fashion Chamber (IFC)",
            'answer' => "Kalau merasa dirinya anak muda Aceh yang berbakat, gabung ke AMANAH dulu, akan ada banyak program bagus, khususnya di bidang fashion. Disana banyak ilmu menarik. Kalau sudah di fasilitasi, ambil kesempatan ini untuk terus belajar.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Cut Novitasari",
            'instance' => "Peserta Pelatihan Bordir",
            'answer' => "Senang sekali atas ilmu baru yang saya dapatkan dan bersyukur atas kesempatan bertemu dengan teman baru serta mempelajari teknik bordir dari berbagai daerah.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Intan",
            'instance' => "Peserta Pelatihan Bordir",
            'answer' => "Seru, kita tadinya hanya tahu pada satu jenis bordir, yaitu bordir kerawang gayo. Namun, dengan pelatihan ini, kita bisa memperluas wawasan. Disini kita diajarkan juga dari daerah lain.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        ApaKataMereka::create([
            'name' => "Yuyun",
            'instance' => "Mitra Amanah - Pembimbing Pelatihan Bordir",
            'answer' => "Pelatihan ini akan terus menjadi jembatan bagi anak muda Aceh untuk mengembangkan potensi mereka dalam berbagai bidang, termasuk seni bordir yang kreatif dan inovatif. Terlebih memberikan peluang usaha baru untuk anak muda Aceh.",
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // ApaKataMereka::create([
        //     'name' => "",
        //     'instance' => "",
        //     'answer' => "",
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);
    }
}
