<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->truncate();
        $arr = ["Spotify", "Apple Music", "Tik Tok", "Amazon Music", "SoundCloud", "YouTube Music", "YouTube Content", "ACR Cloud", "7Digital", "AMI Entertainment", "Anghami", "AWA ", "Beatsource", "BMAT ", "Boomplay", "BPI Content", "Claro Musica", "ClicknClear", "Deezer ", "Gracenote ", "Hungama ", "iHeartRadio ", "iTunes ", "Jaxsta", "JOOX ", "Juno ", "Jiosaavn", "KKBOX ", "MediaNet", "MelOn", "Millward Brown", "MixCloud", "Mood Media", "Napster ", "NetEase ", "Nuuday", "Pandora ", "Peloton ", "Phononet", "Qobuz", "Resso", "RX Music", "Saavn", "Shazam ", "Slacker ", "Soundmouse", "Soundscan ", "24/7", "SRV4421 ", "SRV5481 ", "Tencent ", "TIDAL ", "TouchTunes", "VerveLife", "Yandex", "United Media", "Simfy Africa", "EmpikMusik", "Sirius XM"];
        // $explode = explode(',')
        foreach ($arr as $index => $value) {
            $create = Store::create([
                'name' => $value,
            ]);
        }
    }
}
