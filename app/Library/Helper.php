<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Debit;
use App\Models\Store;
use App\Models\Track;
use App\Models\Unsub;
use App\Models\Artist;
use App\Models\Credit;
use App\Models\Country;
use App\Models\Package;
use App\Models\Release;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\ReferralUser;
use App\Models\RoyaltySplit;
use App\Models\UserPlatform;
use App\Models\UserTopStore;
use App\Models\ReleaseStream;
use App\Models\StatementExcel;
use App\Models\StreamByCountry;
use App\Models\RoyaltySplitVideo;
use Illuminate\Support\Facades\DB;

function packagePrice($package)
{
   if ($package == 'artist') {
      return 30.99;
   } elseif ($package == 'labels') {
      return 60.99;
   }
}

function getExpiryDate()
{
   $expiry_at = Carbon::now()->addYear(1);
   $expiry_at = $expiry_at->toDateTimeString();
   return $expiry_at;
}

function artist(){
    $arr = [
        'primary artist' => 'Primary Artist',
        'featured artist' => 'Featured Artist',
        'producer' => 'Producer',
        'remixer' => 'Remixer',
    ];
    return $arr;
}
function artistNew(){
    $arr = [
        'primary' => 'Primary',
        'featured' => 'Featured',
        'producer' => 'Producer',
        'remixer' => 'Remixer',
    ];
    return $arr;
}
function songwriter(){
    $arr = [
        'Composer & writer' => 'Composer & writer',
        'Composer' => 'Composer',
        'Lyricist' => 'Lyricist',
        // 'Producer' => 'Producer',
        'Publisher' => 'Publisher',
    ];
    return $arr;
}
function getDateFormat($date){
    return date('d F Y', strtotime($date));
}
function getTracks($ids){
    $ids = json_decode($ids);
    $implode = implode(',',$ids);
    $tracks = Track::whereIn('id',$ids)->orderByRaw(DB::raw("FIELD(id, $implode)"))->get();
    if(!empty($tracks)){
        return $tracks;
    }
    return false;
}
function getFirstArtist($artist){
    // $artist = json_decode($artist);
    // if(count($artist) > 0){
    //     foreach($artist as $index=>$a){
    //         return $a->name;
    //     }
    // }
    return false;
}
function stores(){
    $arr = ["Spotify", "Apple Music", "Tik Tok", "Amazon Music", "SoundCloud", "YouTube Music", "YouTube Content",  "7Digital", "AMI Entertainment", "Anghami", "AWA ", "Beatsource", "BMAT ", "Boomplay", "BPI Content", "Claro Musica", "ClicknClear", "Deezer ", "Gracenote ", "Hungama ", "iHeartRadio ", "iTunes ", "Jaxsta", "JOOX ", "Juno ", "Jiosaavn", "KKBOX ", "MediaNet", "MelOn", "Millward Brown", "MixCloud", "Mood Media", "Napster ", "NetEase ", "Nuuday", "Pandora ", "Peloton ", "Phononet", "Qobuz", "Resso", "RX Music", "Saavn", "Shazam ", "Slacker ", "Soundmouse", "Soundscan ", "24/7", "SRV4421 ", "SRV5481 ", "Tencent ", "TIDAL ", "TouchTunes", "VerveLife", "Yandex", "United Media", "Simfy Africa", "EmpikMusik", "Sirius XM"];
    return $arr;
}
function getAdminAuth()
{
  return auth()->guard('admin')->user();
}
function getLatestSubscribtion($user_id){
    $check = Transaction::where('user_id', $user_id)->orderby('created_at','desc')->first();
    if(!empty($check)){
        return $check;
    }
    return false;
}
function getLastCredit($id){
    $credit = Credit::where('user_id', $id)->orderBy('created_at','DESC')->first(['amount','date']);
    if(!empty($credit)){
        return $credit;
    }
    return null;
}
function totalCreditBalance($id){
    $credit = Credit::where('user_id', $id)->sum('amount');
    if(!empty($credit)){
        return $credit;
    }
    return 0;
}
function totalDebitBalance($id){
    $debit = Debit::where('user_id', $id)->sum('amount');
    if(!empty($debit)){
        return $debit;
    }
    return 0;
}
function currentStatus($id){
    return number_format((totalCreditBalance($id) - totalDebitBalance($id)),2);
}
function status($status){
    $html = '';
    if($status == 1){
        $html = '<span class="text-success">Approved</span>';
    }
    elseif($status == 2){
        $html = '<span class="text-danger">Rejected</span>';
    }
    elseif($status == 3){
        $html = '<span class="text-warning">TD Request Sent</span>';
    }
    elseif($status == 4){
        $html = '<span class="text-danger">TD Confirmed</span>';
    }
    else{
        $html = '<span class="text-info">Pending</span>';
    }
    return $html;
}
function campaignLogs($id){
    $logs = Unsub::where('user_id',$id)->count();
    return $logs;
}
function packges(){
    $packages = Package::with('details')->orderBy('sort','ASC')->where('status',1)->get();
    return $packages;
}
function bankAccount($data,$method){
    if(!empty($data)){
        return json_decode($data->$method);
    }
    return null;
}
function platformsTotals(){
    $data = [];
    $stores = Store::get();
    foreach($stores as $index=>$store){
        $platform = UserPlatform::with('store')->where('user_id', Auth::user()->id)->whereIn('store_id',[$store->id])->sum('stream');
        if($platform > 0 ){
            $data[$store->name] = $platform;
        }
    }

    $four = 4;
    $actual  = count($data);
    $total = $four - $actual;

    if($total >= 4){
        arsort($data);
        return $data;
    }
    else{
        $arr2 = [];
        foreach(defaultCards() as $index=>$card){
            if(!in_array($card,array_keys($data))){
                $arr2[$card] = 0;
            }
        }
        $final = array_merge($data,$arr2);
        arsort($final);
        return $final;
    }

}
function countriesTotals(){
    $data = [];
    $countries = Country::get();
    foreach($countries as $index=>$country){
        $platform = StreamByCountry::where('user_id', Auth::user()->id)->where('country_id',[$country->id])->sum('stream');
        if($platform > 0 ){
            $data[$country->name] = $platform;
        }
    }
    arsort($data);
    return $data;
}
function revenueTotals(){

    $data = [];
    $stores = Store::get();
    foreach($stores as $index=>$store){
        $platform = UserTopStore::where('store_id',$store->id)->where('user_id',auth()->user()->id)->sum('amount');
        if($platform > 0 ){
            $data[$store->name] = $platform;
        }
    }

    $four = 4;
    $actual  = count($data);
    $total = $four - $actual;

    if($total >= 4){
        arsort($data);
        return $data;
    }
    else{
        $arr2 = [];
        foreach(defaultCards() as $index=>$card){
            if(!in_array($card,array_keys($data))){
                $arr2[$card] = 0;
            }
        }
        $final = array_merge($data,$arr2);
        arsort($final);
        return $final;
    }



}
function releaseStreamsTotals($id){
    $data = [];
    $releases = Release::where('user_id',$id)->where('status',1)->get();
    foreach($releases as $index=>$release){
        $platform = ReleaseStream::where('release_id',$release->id)->where('user_id',auth()->user()->id)->sum('streams');
        if($platform > 0 ){
            $data[$release->id] = $platform;
        }
    }
    arsort($data);
    return $data;
}
function countriesTotalStreams($id){
    $country = StreamByCountry::where('country_id',$id)->where('user_id',auth()->user()->id)->sum('stream');
    return $country;
}
function countriesTotalChange($id){
    $country = StreamByCountry::where('country_id',$id)->where('user_id',auth()->user()->id)->sum('change');
    return $country;
}

function StoresTotalSplit($id){
    $store = UserTopStore::where('store_id',$id)->where('user_id',auth()->user()->id)->sum('split');
    return $store;
}
function StoresTotalAmount($id){
    $store = UserTopStore::where('store_id',$id)->where('user_id',auth()->user()->id)->sum('amount');
    return $store;
}
function userStores($id){
    $user = User::where('id',$id)->first('top_stores');
    if(!empty($user)){
        return json_decode($user->top_stores);
    }
    return [];
}
function userPlatforms($id){
    $user = User::where('id',$id)->first('top_platforms');
    if(!empty($user)){
        return json_decode($user->top_platforms);
    }
    return [];
}
function userCountries($id){
    $user = User::where('id',$id)->first('top_countries');
    if(!empty($user)){
        return json_decode($user->top_countries);
    }
    return [];
}
function topStores($id){
    $user = User::where('id',$id)->first('top_stores');
    if(!empty($user->top_stores)){
        $store = Store::whereIn('name',json_decode($user->top_stores))->get();
        return $store;
    }
    return null;
}
function topPlatforms($id){
    $user = User::where('id',$id)->first('top_platforms');
    if(!empty($user->top_platforms)){
        $store = Store::whereIn('name',json_decode($user->top_platforms))->get();
        return $store;
    }
    return null;
}
function topCountries($id){
    $user = User::where('id',$id)->first('top_countries');
    if(!empty($user->top_countries)){
        $country = Country::whereIn('id',json_decode($user->top_countries))->get();
        return $country;
    }
    return null;
}
function trialExpiry(){
    $now = time(); // or your date as well
    $your_date = strtotime(auth()?->user()?->email_verified_at);
    $datediff = $your_date- $now ;
    $diff=  round($datediff / (60 * 60 * 24));
    if($diff > 0){
        return '<small style="color:white">There are '.$diff.' days left in your trial.</small>';
    }
    else{
        return '<small style="color:#FBDA03">Your trial has been ended.</small>';
    }
}
function subscriptionExpiry(){
    $transactions = getLatestSubscription();
    if(!empty($transactions)){
        $now = time(); // or your date as well
        $your_date = strtotime($transactions->expiry_at);
        $datediff = $your_date- $now ;
        $diff=  round($datediff / (60 * 60 * 24));
        if($diff > 0){
            if($diff < 30){
                return '<small style="color:white">Your subscription will expire in '.$diff.' days.</small>';
            }
        }
        else{
            return '<small style="color:white">Your Subscription has been ended. <a style="color:#FBDA03" href='.url("user/accounts/renew-plan").'>Please Subscribe</a></small>';
        }
    }
}
function getLatestSubscription(){
    $transactions = Transaction::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->first();
    if(!empty($transactions)){
        return $transactions;
    }
    return false;
}
function countryCode($country){
    $country = Country::where('name',$country)->first();
    if(!empty($country)){
        return strtolower($country->code);
    }
    return null;
}
function releaseById($id){
    $data = Release::where('id',$id)->first();
    return $data;
}
function dateRange($value){
    $startDate =  date('Y-m-d', strtotime(date('Y-m-d') .' +1 day'));
    if($value == 'Last 7 Days'){
        $endDate = date('Y-m-d', strtotime($startDate .' -7 day'));
    }
    elseif($value == 'Last 15 Days'){
        $endDate = date('Y-m-d', strtotime($startDate .' -15 day'));
    }
    elseif($value == 'Last 45 Days'){
        $endDate = date('Y-m-d', strtotime($startDate .' -45 day'));
    }
    elseif($value == 'Last 60 Days'){
        $endDate = date('Y-m-d', strtotime($startDate .' -60 day'));
    }
    else{
        $endDate = date('Y-m-d', strtotime($startDate .' -7 day'));
    }
    return ['start_date' => $startDate, 'end_date' => $endDate];
}
function defaultCards(){
    $arr= ['Sound Cloud','Spotify','Apple Music','Youtube Music'];
    return $arr;
}
function statementExcel($statement_id){
    $data = StatementExcel::where('statement_id',$statement_id)->get();
    if(!empty($data)){
        return $data;
    }
    return false;
}
function validateStoreStatus($name){
    $store = Store::where(['name' => $name, 'status'=> 1])->first();
    if(!empty($store)){
        return $store->logo;
    }
    return false;
}
function getUserById($id){
    $user = User::where('id',$id)->first();
    if(!empty($user)){
        return $user->name;
    }
    return null;
}
function numberOfSongs(){
    $arr = [
        '1' => '1(Single)',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
        '7' => '7(Album)',
        '8' => '8',
        '9' => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
        '25' => '25',
        '26' => '26',
        '27' => '27',
        '28' => '28',
        '29' => '29',
        '30' => '30',
        '31' => '31',
        '32' => '32',
        '33' => '33',
        '34' => '34',
        '35' => '35',
        '36' => '36',
        '37' => '37',
        '38' => '38',
        '39' => '39',
        '40' => '40',
        '41' => '41',
        '42' => '42',
        '43' => '43',
        '44' => '44',
        '45' => '45',
        '46' => '46',
        '47' => '47',
        '48' => '48',
        '49' => '49',
        '50' => '50',
        '51' => '51',
        '52' => '52',
        '53' => '53',
        '54' => '54',
        '55' => '55',
        '56' => '56',
        '57' => '57',
        '58' => '58',
        '59' => '59',
        '60' => '60',
        '61' => '61',
        '62' => '62',
        '63' => '63',
        '64' => '64',
        '65' => '65',
        '66' => '66',
        '67' => '67',
        '68' => '68',
        '69' => '69',
        '70' => '70',
        '71' => '71',
        '72' => '72',
        '73' => '73',
        '74' => '74',
        '75' => '75',
        '76' => '76',
        '77' => '77',
        '78' => '78',
        '79' => '79',
        '80' => '80',
        '81' => '81',
        '82' => '82',
        '83' => '83',
        '84' => '84',
        '85' => '85',
        '86' => '86',
        '87' => '87',
        '88' => '88',
        '89' => '89',
        '90' => '90',
        '91' => '91',
        '92' => '92',
        '93' => '93',
        '94' => '94',
        '95' => '95',
        '96' => '96',
        '97' => '97',
        '98' => '98',
        '99' => '99',
        '100' => '100',
    ];
    return $arr;
}
function primaryLanguages(){
    $arr = ['Afrikaans' => 'Afrikaans',
    'Albanian' => 'Albanian',
    'Arabic' => 'Arabic',
    'Armenian' => 'Armenian',
    'Basque' => 'Basque',
    'Bengali' => 'Bengali',
    'Bulgarian' => 'Bulgarian',
    'Catalan' => 'Catalan',
    'Cambodian' => 'Cambodian',
    'Chinese (Mandarin)' => 'Chinese (Mandarin)',
    'Croatian' => 'Croatian',
    'Czech' => 'Czech',
    'Danish' => 'Danish',
    'Dutch' => 'Dutch',
    'English' => 'English',
    'Estonian' => 'Estonian',
    'Fiji' => 'Fiji',
    'Finnish' => 'Finnish',
    'French' => 'French',
    'Georgian' => 'Georgian',
    'German' => 'German',
    'Greek' => 'Greek',
    'Gujarati' => 'Gujarati',
    'Hebrew' => 'Hebrew',
    'Hindi' => 'Hindi',
    'Hungarian' => 'Hungarian',
    'Icelandic' => 'Icelandic',
    'Indonesian' => 'Indonesian',
    'Irish' => 'Irish',
    'Italian' => 'Italian',
    'Japanese' => 'Japanese',
    'Javanese' => 'Javanese',
    'Korean' => 'Korean',
    'Latin' => 'Latin',
    'Latvian' => 'Latvian',
    'Lithuanian' => 'Lithuanian',
    'Macedonian' => 'Macedonian',
    'Malay' => 'Malay',
    'Malayalam' => 'Malayalam',
    'Maltese' => 'Maltese',
    'Maori' => 'Maori',
    'Marathi' => 'Marathi',
    'Mongolian' => 'Mongolian',
    'Nepali' => 'Nepali',
    'Norwegian' => 'Norwegian',
    'Persian' => 'Persian',
    'Polish' => 'Polish',
    'Portuguese' => 'Portuguese',
    'Punjabi' => 'Punjabi',
    'Quechua' => 'Quechua',
    'Romanian' => 'Romanian',
    'Russian' => 'Russian',
    'Samoan' => 'Samoan',
    'Serbian' => 'Serbian',
    'Slovak' => 'Slovak',
    'Slovenian' => 'Slovenian',
    'Spanish' => 'Spanish',
    'Swahili' => 'Swahili',
    'Swedish' => 'Swedish',
    'Tamil' => 'Tamil',
    'Tatar' => 'Tatar',
    'Telugu' => 'Telugu',
    'Thai' => 'Thai',
    'Tibetan' => 'Tibetan',
    'Tonga' => 'Tonga',
    'Turkish' => 'Turkish',
    'Ukrainian' => 'Ukrainian',
    'Urdu' => 'Urdu',
    'Uzbek' => 'Uzbek',
    'Vietnamese' => 'Vietnamese',
    'Welsh' => 'Welsh',
    'Xhosa' => 'Xhosa'];
    return $arr;
}

function genre(){
    $arr = ['Alternative' => 'Alternative',
    'Alternative Rock' => 'Alternative Rock',
    'Big Band' => 'Big Band',
    'Blues' => 'Blues',
    'C-Pop' => 'C-Pop',
    'Children' => 'Children',
    'Classical' => 'Classical',
    'Comedy' => 'Comedy',
    'Country' => 'Country',
    'Dance' => 'Dance',
    'Easy Listening' => 'Easy Listening',
    'Electronic' => 'Electronic',
    'Experimental' => 'Experimental',
    'Fitness &amp; Workout' => 'Fitness &amp; Workout',
    'Folk' => 'Folk',
    'French Pop' => 'French Pop',
    'German Folk' => 'German Folk',
    'Hip-Hop/Rap' => 'Hip-Hop/Rap',
    'Holiday' => 'Holiday',
    'Inspirational' => 'Inspirational',
    'Instrumental' => 'Instrumental',
    'J-Pop' => 'J-Pop',
    'Jazz' => 'Jazz',
    'K-Pop' => 'K-Pop',
    'Karaoke' => 'Karaoke',
    'Latin' => 'Latin',
    'Metal' => 'Metal',
    'New Age' => 'New Age',
    'Opera' => 'Opera',
    'Pop' => 'Pop',
    'Punk' => 'Punk',
    'R&amp;B' => 'R&amp;B',
    'Reggae' => 'Reggae',
    'Rock' => 'Rock',
    'Singer/Songwriter' => 'Singer/Songwriter',
    'Soul' => 'Soul',
    'Soundtrack' => 'Soundtrack',
    'Spoken Word' => 'Spoken Word',
    'Vocal/Nostalgia' => 'Vocal/Nostalgia',
    'World' => 'World'];
    return $arr;
}
function storesIn($data){
    $stores = Store::whereIn('name',$data)->get();
    return $stores;
}
function storesNotIn($data){
    $stores = Store::whereNotIn('name',$data)->get();
    return $stores;
}
function settings(){
    $settings = Setting::first();
    return $settings;
}
function getUserIdByReferralId($referral){
    if(!empty($referral)){
        $strReplace = str_replace('r','',$referral);
        $id = ($strReplace - 10000);
        return $id;
    }
    return null;
}
function validateReferral($referral){
    $id = getUserIdByReferralId($referral);
    if(!empty($id)){
        $user = User::where('id',$id)->first();
        if(!empty($user)){
            return $user;
        }
        return false;
    }
    return false;
}
function getUserNameById($id){
    $user = User::where('id',$id)->first();
    return $user;
}
function validateReferralCredit(){
    $check = ReferralUser::withWhereHas('user',function($query){ $query->where('is_subscribed',1); })->where('user_id',auth()->user()->id)->first();
    if(!empty($check)){
        return $check;
    }
    return null;
}
function getArtistRole($artist_id,$date){
    $html = '';
    $artist =  Artist::join('selected_artists','artists.id','selected_artists.artist_id')->where('selected_artists.artist_id',$artist_id)->where('selected_artists.created_at','>=',$date.' 00:00:00')->where('selected_artists.created_at','<=',$date.' 23:59:59')->first(['artists.*','selected_artists.role']);
    $data['name'] = isset($artist->name) ? $artist->name : null;
    $data['role'] = isset($artist->role) ? $artist->role : null;
    $data['spotify_profile_link'] = isset($artist->spotify_profile_link) ? $artist->spotify_profile_link : null;
    $data['apple_music_profile_link'] = isset($artist->apple_music_profile_link) ? $artist->apple_music_profile_link : null;

    $html = view('user-portal.pages.revamp.royalty-splits.artist',compact('data'));
    if(!empty($artist)){
        return $html;
    }
    return null;
}
function trackSplit($track_id){
    $total = 100;
    $royalties = RoyaltySplit::where('track_id',$track_id)->sum('share');
    return ( $total - $royalties );
}
function videoSplit($video_id){
    $total = 100;
    $royalties = RoyaltySplitVideo::where('video_id',$video_id)->sum('share');
    return ( $total - $royalties );
}
function totalCollaborators($track_id){
    $col = RoyaltySplit::where('track_id',$track_id)->where('status',1)->count();
    return $col;
}
function totalCollaboratorsVideo($video_id){
    $col = RoyaltySplitVideo::where('video_id',$video_id)->where('status',1)->count();
    return $col;
}
function copyrightYear(){
    $date = date('Y');
    $arr = [];
    for($i=2000; $i<=$date; $i++){
        $arr[] = $i;
    }
    return array_reverse($arr);
}
