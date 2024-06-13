<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            
        faq::create([
                'question' => "Apa itu Program Aneuk Muda Aceh Unggul dan Hebat (Amanah)?",
                'answer' => "Program Aneuk Muda Aceh Unggul dan Hebat (Amanah) adalah pemberdayaan generasi muda Aceh yang di inisiasi oleh Badan Intelijen Negara (BIN) atas Perintah Presiden Joko Widodo untuk meningkatkan kapasitas, keterampilan, dan potensi generasi muda di Aceh agar menjadi lebih unggul dan hebat.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Apa tujuan dari Program Amanah?",
                'answer' => "Tujuan utama Program Amanah adalah untuk mengembangkan dan meningkatkan kemampuan generasi muda Aceh dalam berbagai bidang, meningkatkan keterampilan, dan memberikan kesempatan untuk berkontribusi secara positif bagi masyarakat dan pembangunan daerah.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Siapa yang bisa mengikuti Program Amanah?",
                'answer' => "Program ini terbuka untuk semua generasi muda Aceh yang memiliki keinginan untuk belajar dan mengembangkan diri, khususnya yang berusia antara 16 hingga 30 tahun.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Bagaimana cara mendaftar ke Program Amanah?",
                'answer' => "Pendaftaran bisa dilakukan melalui situs resmi Program Amanah dengan mengisi formulir pendaftaran online berisi informasi pribadi, latar belakang pendidikan, dan motivasi untuk bergabung dengan program ini.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Apa saja manfaat yang akan diperoleh peserta Program Amanah?",
                'answer' => "Peserta mendapatkan pelatihan dan pendampingan dalam berbagai bidang seperti kewirausahaan, teknologi informasi, kepemimpinan, dan keterampilan lainnya. Selain itu, peserta juga akan mendapatkan akses ke jaringan profesional, beasiswa, dan kesempatan magang.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Apakah Program Amanah berbayar?",
                'answer' => "Program ini gratis untuk semua peserta yang terpilih. Semua biaya pelatihan dan pendampingan ditanggung oleh program.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Berapa lama durasi Program Amanah?",
                'answer' => "Durasi program bervariasi tergantung pada jenis pelatihan dan kegiatan yang diikuti. Beberapa kegiatan mungkin berlangsung selama beberapa minggu, sementara yang lain bisa berlangsung hingga beberapa bulan.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Di mana lokasi pelatihan dan kegiatan Program Amanah?",
                'answer' => "Pelatihan dan kegiatan Program Amanah akan diselenggarakan di berbagai lokasi di Aceh. Informasi lebih lanjut mengenai lokasi spesifik akan diberikan kepada peserta yang terpilih.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Bagaimana cara mengetahui jika saya diterima dalam Program Amanah?",
                'answer' => "Anda akan dihubungi melalui email atau nomor telepon yang diberikan saat pendaftaran. Informasi mengenai penerimaan juga akan diumumkan di situs resmi Program Amanah.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Apakah ada peluang kerja setelah menyelesaikan Program Amanah?",
                'answer' => "Meskipun Program Amanah tidak menjamin penempatan kerja, peserta akan mendapatkan keterampilan dan jaringan yang dapat meningkatkan peluang dalam mendapatkan pekerjaan atau memulai usaha sendiri.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            
        faq::create([
                'question' => "Bagaimana cara menghubungi tim Program Amanah jika saya memiliki pertanyaan lebih lanjut?",
                'answer' => "Anda dapat menghubungi tim Program Amanah melalui email: amanahaceh24@gmail.com atau melalui nomor telepon yang tersedia di situs resmi kami.",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
