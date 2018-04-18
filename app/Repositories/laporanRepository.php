<?php

namespace App\Repositories;

use App\Models\laporan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class laporanRepository
 * @package App\Repositories
 * @version April 18, 2018, 9:05 am UTC
 *
 * @method laporan findWithoutFail($id, $columns = ['*'])
 * @method laporan find($id, $columns = ['*'])
 * @method laporan first($columns = ['*'])
*/
class laporanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'waktu_lapor',
        'perkara_id',
        'waktu_kejadian',
        'tempat_kejadian',
        'korban',
        'alamat_korban',
        'kerugian',
        'pelapor',
        'uraian_kejadian',
        'saksi',
        'pasal',
        'status_laporan',
        'no_surat',
        'lat',
        'long'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return laporan::class;
    }
}
