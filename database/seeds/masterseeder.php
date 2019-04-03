<?php

use Illuminate\Database\Seeder;
use App\Master;

class masterseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $master = new Master;
        $master->detail = 'Standar Biaya Institut';
        $master->parent = '0';
        $master->save();

        $master = new Master;
        $master->detail = 'Satuan biaya uang makan, lembur, dan konsumsi rapat';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya perjalanan dinas';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya honorarium';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya honorarium tenaga tidak tetap';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya pengembangan kompetensi';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya honorarium penelitian/ perekayasaan';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya insentif publikasi';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya penulisan buku';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya penghargaan, program kewirausahaan, dan kepesertaan kegiatan bagi mahasiswa';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya layanan kerjasama profesional';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya penghargaan pelaksanaan SPMI';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya seragam dinas/kegiatan';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya perjalanan dinas (daerah)';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Standar biaya keperluan operasional';
        $master->parent = '1';
        $master->save();

        $master = new Master;
        $master->detail = 'Satuan biaya uang makan pegawai tetap';
        $master->parent = '2';
        $master->save();

        $master = new Master;
        $master->detail = 'Satuan biaya lembur';
        $master->parent = '2';
        $master->save();

        $master = new Master;
        $master->detail = 'Satuan biaya konsumsi penyelenggaraan rapat atau pertemuan lain';
        $master->parent = '2';
        $master->save();

        $master = new Master;
        $master->detail = 'Rapat Koordinasi/ Workshop/Seminar/FGD/ Kegiatan Sejenis';
        $master->parent = '18';
        $master->save();

        $master = new Master;
        $master->detail = 'Rapat/Kegiatan  Mengundang Pejabat Tingkat   Menteri/Eselon I/ Setara';
        $master->parent = '18';
        $master->save();
    }
}
