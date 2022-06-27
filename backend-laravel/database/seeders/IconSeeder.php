<?php

namespace Database\Seeders;

use App\Models\ServiceHeader;
use App\Models\ServiceHeaderIcon;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $serviceAll = ServiceHeader::all();
        foreach ($serviceAll as $key) {
            $icon = null;
            switch ($key->id) {
                case '1':
                    $icon = request()->getSchemeAndHttpHost() . '/icon/camera.png';
                    break;
                case '2':
                    $icon = request()->getSchemeAndHttpHost() . '/icon/contract.png';
                    break;
                case '3':
                    $icon = request()->getSchemeAndHttpHost() . '/icon/document.png';
                    break;

                default:
                    $icon;
                    break;
            }
            ServiceHeaderIcon::create([
                'icon_link' => $icon,
                'service_header_id' => $key->id,
            ]);
        }
    }
}
