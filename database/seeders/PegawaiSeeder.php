<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::create([
            'nama' => 'Asim Saputra',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Ec.Dev.',
            'nip_lama' => '340015744',
            'nip_baru' => '197609271999011001',
            'golongan_id' => 3,
            'jabatan_id' => 1,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Dadan Sudarmadi',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Si.',
            'nip_lama' => '340015198',
            'nip_baru' => '197310141995121001',
            'golongan_id' => 4,
            'jabatan_id' => 2,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Titien Kristiningsih',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, S.E., M.Si.',
            'nip_lama' => '340016520',
            'nip_baru' => '198005252002122003',
            'golongan_id' => 5,
            'jabatan_id' => 7,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Sirly Catharina Worotikan',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E., M.Si.',
            'nip_lama' => '340014361',
            'nip_baru' => '196808281994012001',
            'golongan_id' => 4,
            'jabatan_id' => 7,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Norma Olga Frida Regar',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si., M.Si.',
            'nip_lama' => '340011443',
            'nip_baru' => '196611291986032001',
            'golongan_id' => 4,
            'jabatan_id' => 7,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Sumbodo Aji Cahyono',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si., M.A.',
            'nip_lama' => '340015750',
            'nip_baru' => '197703081999011001',
            'golongan_id' => 4,
            'jabatan_id' => 10,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ririn Hidayati',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si., MPP, MSE',
            'nip_lama' => '340015704',
            'nip_baru' => '197311031998032005',
            'golongan_id' => 5,
            'jabatan_id' => 7,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Anton Tri Wijayanto',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Si.',
            'nip_lama' => '340016492',
            'nip_baru' => '198001022002121003',
            'golongan_id' => 5,
            'jabatan_id' => 7,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Randy Pratama Lumenta',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340055890',
            'nip_baru' => '198911102012111001',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Bregitta Sisilia Lasut',
            'gelar_depan' => '',
            'gelar_belakang' => ', SS',
            'nip_lama' => '340020453',
            'nip_baru' => '198209182008012012',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ridwan Setiawan',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058942',
            'nip_baru' => '199604202019011002',
            'golongan_id' => 9,
            'jabatan_id' => 12,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Christian Leonardo Pratama Tamboto',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340059455',
            'nip_baru' => '199708072019121001',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Danty Welmin Yoshida Fatima',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340060039',
            'nip_baru' => '199711032021042001',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Sarjani Harini Martiningsih',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si.',
            'nip_lama' => '340055405',
            'nip_baru' => '198803062011012015',
            'golongan_id' => 7,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Priska Harto Lolowang',
            'gelar_depan' => '',
            'gelar_belakang' => ', SH',
            'nip_lama' => '340055400',
            'nip_baru' => '198211262011011007',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Uyun Racmawati',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Psi.',
            'nip_lama' => '340055407',
            'nip_baru' => '198502132011012017',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Irene Ruth Longkutoy',
            'gelar_depan' => '',
            'gelar_belakang' => ', SH',
            'nip_lama' => '340018559',
            'nip_baru' => '197403242006042019',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Steven Kalvin Montolalu',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E.',
            'nip_lama' => '340017199',
            'nip_baru' => '197904062003121004',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Wisnu Triaji',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E.',
            'nip_lama' => '340051380',
            'nip_baru' => '198702142009021002',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Mia Wahyumiranti',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340017599',
            'nip_baru' => '198304112005022001',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Yanti Jane Ivonne Kaeng',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340020227',
            'nip_baru' => '198201202008012012',
            'golongan_id' => 10,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nuraini Walangadi',
            'gelar_depan' => 'Ir.',
            'gelar_belakang' => '',
            'nip_lama' => '340013445',
            'nip_baru' => '196511231992122001',
            'golongan_id' => 6,
            'jabatan_id' => 23,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Stela Engeline Doris Lomboan',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340013321',
            'nip_baru' => '197209091992092001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Radjid Dwi Iskandar',
            'gelar_depan' => '',
            'gelar_belakang' => ', A.Md.',
            'nip_lama' => '340055401',
            'nip_baru' => '198504112011011009',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Joice Juliana',
            'gelar_depan' => '',
            'gelar_belakang' => ', A.Md.',
            'nip_lama' => '340055395',
            'nip_baru' => '198307062011012015',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Lazia Outenty Bimbangnaung',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340019751',
            'nip_baru' => '198110312007012001',
            'golongan_id' => 10,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Simon Andreas August Remiasa',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340016038',
            'nip_baru' => '197710111999121001',
            'golongan_id' => 6,
            'jabatan_id' => 26,
            'satker_id' => '7100',
            'atasan_id' =>'2',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Karni Hamdani',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si.',
            'nip_lama' => '340059275',
            'nip_baru' => '199401312019032001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Zulfa Nur Fajri Ramadhani',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340059045',
            'nip_baru' => '199701292019012001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Olfiane Silfia Palealu',
            'gelar_depan' => '',
            'gelar_belakang' => ', SE',
            'nip_lama' => '340017202',
            'nip_baru' => '197310042003122002',
            'golongan_id' => 6,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Florentz Magdalena',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Sc.',
            'nip_lama' => '340056837',
            'nip_baru' => '199108212014102001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Salonica Oktaviani',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340058482',
            'nip_baru' => '199410302018022001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Dina Atika Rahmawati',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340058222',
            'nip_baru' => '199601152018022001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nurul Hidayah',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058899',
            'nip_baru' => '199704212019012001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Junitha Joice Sahureka',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340050134',
            'nip_baru' => '198606112009022007',
            'golongan_id' => 6,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nova Nurviana',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340056385',
            'nip_baru' => '198911222013112001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Abdul Aziz Makhrus',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058546',
            'nip_baru' => '199607082019011003',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Eko Siswahto',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.SE',
            'nip_lama' => '340020214',
            'nip_baru' => '198504202008011003',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Mariane Esther Rantung',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057879',
            'nip_baru' => '199408062017012001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Limada Iqbal',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340058320',
            'nip_baru' => '199506222018021002',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Starry Nouva Solang',
            'gelar_depan' => 'Ir.',
            'gelar_belakang' => ', M.Si.',
            'nip_lama' => '340014230',
            'nip_baru' => '196709181994012001',
            'golongan_id' => 5,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'I Nyoman Pande Suputra',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340058285',
            'nip_baru' => '199504272018021002',
            'golongan_id' => 8,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Dwi Raharjo',
            'gelar_depan' => '',
            'gelar_belakang' => ', A.Md., S.Tr.Stat.',
            'nip_lama' => '340051098',
            'nip_baru' => '198611242009021001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Viktor Prima Sirait',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.S.E',
            'nip_lama' => '340017859',
            'nip_baru' => '198103282006021001',
            'golongan_id' => 5,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nabella Intan Karasta',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058872',
            'nip_baru' => '199609222019012003',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Yola Christhy Larinse',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057244',
            'nip_baru' => '199211072014122001',
            'golongan_id' => 7,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Rosniar Eliana',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Stat.',
            'nip_lama' => '340050235',
            'nip_baru' => '198601202009022008',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Abdullah Kango',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si., M.M.',
            'nip_lama' => '340015517',
            'nip_baru' => '197407271997121001',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Erna Kusumawati',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340055779',
            'nip_baru' => '198910192012112001',
            'golongan_id' => 7,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Elrini Diane Wuisan',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E.',
            'nip_lama' => '340053852',
            'nip_baru' => '198210022010032001',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Firra Rastraaktiva Awaliyah',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si.',
            'nip_lama' => '340053987',
            'nip_baru' => '198512142010032002',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Windha Wijaya',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340056909',
            'nip_baru' => '199008012014102001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Dading',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si.',
            'nip_lama' => '340059273',
            'nip_baru' => '199112202019031001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nurfadhila Fahmi Utami',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Stat.',
            'nip_lama' => '340059278',
            'nip_baru' => '199510092019032002',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Agnes Marlise Oroh',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340020229',
            'nip_baru' => '198208222008012014',
            'golongan_id' => 10,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ratna Sulistyowati',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, SAB, M.Si.',
            'nip_lama' => '340020097',
            'nip_baru' => '198505262008012001',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Mohamad Samsodin',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Si.',
            'nip_lama' => '340017894',
            'nip_baru' => '198305082006021001',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Inke Margareth Tambeo',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST, M.Ec.Dev.',
            'nip_lama' => '340019222',
            'nip_baru' => '198403232007012003',
            'golongan_id' => 5,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ayu Puspita Wulandana Burhanuddin',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340056797',
            'nip_baru' => '199010082014102001',
            'golongan_id' => 7,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Prima Puspita Indra Murti',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057537',
            'nip_baru' => '199204212016022001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Untari Rahmawati',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340059014',
            'nip_baru' => '199603312019012001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Daniel Tri Hemawan',
            'gelar_depan' => '',
            'gelar_belakang' => ', SE',
            'nip_lama' => '340018198',
            'nip_baru' => '197610102006041003',
            'golongan_id' => 7,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Tiara Dameani',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340053325',
            'nip_baru' => '198802082009122002',
            'golongan_id' => 6,
            'jabatan_id' => 11,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Hahotan Sagala',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340050106',
            'nip_baru' => '198603202009021004',
            'golongan_id' => 6,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Indira Anastasia Lolowang',
            'gelar_depan' => '',
            'gelar_belakang' => ', SE',
            'nip_lama' => '340017200',
            'nip_baru' => '198301252003122001',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Muhammad Rifqi Mubarak',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340060228',
            'nip_baru' => '199901052021041001',
            'golongan_id' => 9,
            'jabatan_id' => 12,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ponimin',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340060268',
            'nip_baru' => '199810132021041001',
            'golongan_id' => 9,
            'jabatan_id' => 12,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Zaenuri Putro Utomo',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Si.',
            'nip_lama' => '340054409',
            'nip_baru' => '198101262011011005',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Satria June Adwendi',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057589',
            'nip_baru' => '199307102016021001',
            'golongan_id' => 8,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'TB'
        ]);
        Pegawai::create([
            'nama' => 'Yulius Wendi Triandaru',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340058281',
            'nip_baru' => '199407252018021001',
            'golongan_id' => 9,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Vonny Joice Lalujan',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E.',
            'nip_lama' => '340013058',
            'nip_baru' => '196911011992022001',
            'golongan_id' => 6,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Muhammad Iqbal',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Stat.',
            'nip_lama' => '340059276',
            'nip_baru' => '199510132019031001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Frisda Arisanti Tarigan',
            'gelar_depan' => '',
            'gelar_belakang' => '',
            'nip_lama' => '340018463',
            'nip_baru' => '198603082006042001',
            'golongan_id' => 10,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Risky',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057559',
            'nip_baru' => '199405192016021001',
            'golongan_id' => 8,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Ratriani Retno Wardani',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340060872',
            'nip_baru' => '199903202022012004',
            'golongan_id' => 9,
            'jabatan_id' => 12,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Putri Sekarsinung',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340059711',
            'nip_baru' => '199701052019122001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Nurul Hayati Unonongo',
            'gelar_depan' => '',
            'gelar_belakang' => ', SST',
            'nip_lama' => '340057881',
            'nip_baru' => '199311112017012002',
            'golongan_id' => 8,
            'jabatan_id' => 22,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Herman Tinungki',
            'gelar_depan' => '',
            'gelar_belakang' => ', SE',
            'nip_lama' => '340011442',
            'nip_baru' => '196703311986031002',
            'golongan_id' => 6,
            'jabatan_id' => 8,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Friska Patricia Raintung',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.E.',
            'nip_lama' => '340061312',
            'nip_baru' => '198912292022032007',
            'golongan_id' => 9,
            'jabatan_id' => 28,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Mustika Aridya Arum',
            'gelar_depan' => '',
            'gelar_belakang' => ', A.Md.Kb.N',
            'nip_lama' => '340061105',
            'nip_baru' => '200104112022012001',
            'golongan_id' => 11,
            'jabatan_id' => 29,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Agustinus Dirga Istanto Mantow',
            'gelar_depan' => '',
            'gelar_belakang' => ', SE, M.Ak.',
            'nip_lama' => '340061105',
            'nip_baru' => '200104112022012001',
            'golongan_id' => 7,
            'jabatan_id' => 5,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Rozan Fikri',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340060306',
            'nip_baru' => '199801122021041001',
            'golongan_id' => 9,
            'jabatan_id' => 12,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Eldorado Alfu Ilmi',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058702',
            'nip_baru' => '199611272019011002',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Destiana Fitri',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340058672',
            'nip_baru' => '199609292019012001',
            'golongan_id' => 9,
            'jabatan_id' => 9,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
        Pegawai::create([
            'nama' => 'Intan Angelia Senduk',
            'gelar_depan' => '',
            'gelar_belakang' => ', S.Tr.Stat.',
            'nip_lama' => '340057429',
            'nip_baru' => '199203262016022001',
            'golongan_id' => 9,
            'jabatan_id' => 11,
            'satker_id' => '7100',
            'atasan_id' =>'1',
            'status' => 'Aktif'
        ]);
    }
}
