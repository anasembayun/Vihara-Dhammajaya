<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\DataPesanBaik;

class DataPesanBaikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_pesan_baik = [
            [
                'pesan_baik' => 'Pikiran adalah pelopor dari segala sesuatu, pikiran adalah pemimpin, pikiran adalah pembentuk. Bila seseorang berbicara atau berbuat dengan pikiran jahat, maka penderitaan akan mengikutinya, bagaikan roda pedati mengikuti langkah kaki lembu yang menariknya.'
            ],
            [
                'pesan_baik' => 'Pikiran adalah pelopor dari segala sesuatu, pikiran adalah pemimpin, pikiran adalah pembentuk. Bila seseorang berbicara atau berbuat dengan pikiran murni, maka kebahagiaan akan mengikutinya, bagaikan bayang-bayang yang tak akan meninggalkan bendanya.'
            ],
            [
                'pesan_baik' => '"Ia menghina saya, ia memukul saya, ia mengalahkan saya, ia merampas milik saya." Selama seseorang masih menyimpan pikiran seperti itu, maka kebencian tak akan pernah berakhir.'
            ],
            [
                'pesan_baik' => '"Ia menghina saya, ia memukul saya, ia mengalahkan saya, ia merampas milik saya." Jika seseorang sudah tidak menyimpan pikiran-pikiran seperti itu, maka kebencian akan berakhir.'
            ],
            [
                'pesan_baik' => 'Kebencian tak akan pernah berakhir, apabila dibalas dengan kebencian. Tetapi, kebencian akan pernah berakhir, Bila dibalas dengan tidak membenci. Inilah satu hukum abadi.'
            ],
            [
                'pesan_baik' => 'Sebagian besar orang tidak mengetahui bahwa, dalam pertengkaran mereka akan binasa, tetapi mereka yang dapat menyadari kebenaran ini, akan segera mengakhiri semua pertengkaran.'
            ],
            [
                'pesan_baik' => 'Seseorang yang hidupnya hanya ditujukan pada hal-hal yang menyenangkan, yang inderanya tidak terkendali, yang makannya tidak mengenal batas, malas serta tidak bersemangat, maka Mara akan menguasai dirinya. bagaikan angin yang menumbangkan pohon yang lapuk.'
            ],
            [
                'pesan_baik' => 'Seseorang yang hidupnya tidak ditujukan pada hal-hal yang menyenangkan, yang inderanya terkendali, yang sederhana dalam makanan, penuh keyakinan serta bersemangat, maka Mara tidak dapat menguasai dirinya. bagaikan angin yang tidak dapata menumbangkan gunung karang.'
            ],
            [
                'pesan_baik' => 'Barang siapa yang belum bebas, dari kekotoran-kekotoran batin. yang tidak memiliki pengendalian diri, serta tidak mengerti kebenaran. sesungguhnya tidak patut, ia mengenakan jubah kuning'
            ],
            [
                'pesan_baik' => 'Tetapi, ia yang telah dapat, membuang kekotoran-kekotoran batin. teguh dalam kesusilaan. memiliki pengendalian diri. serta mengerti kebenaran. maka sesungguhnya ia patut, mengenakan jubah kuning'
            ],
            [
                'pesan_baik' => 'Mereka yang menganggap, ketidak-benaran sebagai kebenaran. dan kebenaran sebagai ketidak-benaran. maka mereka yang mempunyai pikiran keliru seperti itu, tak akan pernah dapat menyelami kebenaran.'
            ],
            [
                'pesan_baik' => 'Mereka yang mengetahui kebenaran sebagai kebenaran. dan ketidak-benaran sebagai ketidak-benaran. maka mereka yang mempunyai pikiran benar seperti itu, akan dapat menyelami kebenaran.'
            ],
            [
                'pesan_baik' => 'Bagaikan hujan, yang dapat menembus rumah beratap tiris. demikian pula nafsu, akan dapat menembus pikiran yang tidak dikembangkan dengan baik.'
            ],
            [
                'pesan_baik' => 'Bagaikan hujan, yang tidak dapat menembus rumah beratap baik. demikian pula nafsu, tidak dapat menembus pikiran yang telah dikembangkan dengan baik.'
            ],
            [
                'pesan_baik' => 'Di dunia ini ia bersedih hati. di dunia sana ia bersedih hati. pelaku kejahatan akan bersedih hati di kedua dunia itu. ia bersedih hati dan meratap, karena melihat perbuatannya sendiri yang tidak bersih'
            ],
            [
                'pesan_baik' => 'Di dunia ini ia bergembira. di dunia sana ia bergembira. pelaku kebajikan bergembira di kedua dunia itu. ia bergembira dan bersuka cita karena, melihat perbuatannya sendiri yang bersih.'
            ],
            [
                'pesan_baik' => 'Di dunia ini ia menderita. di dunia sana ia menderita. pelaku kejahatan menderita di kedua dunia itu. ia meratap ketika berpikir, "Aku telah berbuat jahat,", dan ia akan lebih menderita lagi, ketika berada di alam sengsara.'
            ],
            [
                'pesan_baik' => 'Di dunia ini ia bahagia. di dunia sana ia berbahagia. pelaku kebajikan berbahagia di kedua dunia itu. ia akan berbahagia ketika berpikir, "Aku telah berbuat bajik,", dan ia akan lebih berbahagia lagi, ketika berada di alam bahagia.'
            ],
            [
                'pesan_baik' => 'Biarpun banyak membaca kitab suci, tetapi tidak berbuat sesuai ajaran, maka orang lengah itu, sama seperti gembala sapi yang menghitung sapi milik orang lain. Ia tidak akan memperoleh manfaat kehidupan suci.'
            ],
            [
                'pesan_baik' => 'Biarpun sedikit membaca kitab suci, tetapi berbuat sesuai ajaran, menyingkirkan nafsu indra, kebencian dan ketidaktahuan, memiliki pengetahuan benar dan batin yang bebas dari nafsu, tidak melekat pada apapun baik di sini maupun di sana, maka ia akan memperoleh manfaat kehidupan suci.'
            ]
        ];

        foreach ($data_pesan_baik as $item) {
            DataPesanBaik::create($item);
        }
    }
}
