<?php

function getjson($namefile = ""){
    // Read the JSON file 
    $json = file_get_contents($namefile);
    
    // Decode the JSON file
    $json_data = json_decode($json,true);
    
    // Display data
    return $json_data;
}

function clearhtml($value='')
{
    $value = str_replace("<p>", "", $value);
    $value = str_replace("</p>", "", $value);
    $value = str_replace("<div>", "", $value);
    $value = str_replace("</div>", "", $value);
    $value = str_replace("<i>", "", $value);
    $value = str_replace("<b>", "", $value);
    $value = str_replace("</b>", "", $value);
    $value = str_replace("<ol>", "", $value);
    $value = str_replace("</ol>", "", $value);
    $value = str_replace("<table>", "", $value);
    $value = str_replace("</table>", "", $value);
    $value = str_replace("<span>", "", $value);
    $value = str_replace("</span>", "", $value);
    $value = str_replace("<li>", "", $value);
    $value = str_replace("</li>", "", $value);
    $value = str_replace("<br>", "", $value);
    $value = str_replace("&nbsp;", "", $value);

    return $value;
}

function format_tanggal($date = null)
{
  $date = explode("-", $date);
  return $date[2].'-'.$date['1'].'-'.$date[0];
}

function post($data)
{
    if(is_array($_POST[$data])){
        return json_encode($_POST[$data], true);
    }else{
        if(isset($_POST[$data])){
            return $_POST[$data];
        }else{
            return "";
        }
    }
}

function slug($data)
{
    $el = $data;
    $el = str_replace(" ", "-", $el);
    $el = str_replace("\"", "", $el);
    $el = str_replace(",", "", $el);
    $el = str_replace("'", "", $el);
    $el = str_replace("@", "", $el);
    $el = str_replace("!", "", $el);
    $el = str_replace("#", "", $el);
    $el = str_replace("\$", "", $el);
    $el = str_replace("%", "", $el);
    $el = str_replace("^", "", $el);
    $el = str_replace("&", "", $el);
    $el = str_replace("&", "", $el);
    $el = str_replace("*", "", $el);
    $el = str_replace("(", "", $el);
    $el = str_replace(")", "", $el);
    $el = str_replace("+", "", $el);
    $el = str_replace("=", "", $el);
    $el = str_replace("{", "", $el);
    $el = str_replace("}", "", $el);
    $el = str_replace("[", "", $el);
    $el = str_replace("]", "", $el);
    $el = str_replace(":", "", $el);
    $el = str_replace(";", "", $el);
    $el = str_replace("'", "", $el);
    $el = str_replace("<", "", $el);
    $el = str_replace(">", "", $el);
    $el = str_replace("?", "", $el);
    $el = str_replace("/", "", $el);
    $el = str_replace("\\", "", $el);
    $el = str_replace("|", "", $el);
    $el = str_replace("_", "-", $el);
    $el = str_replace("--", "-", $el);
    $el = str_replace("---", "-", $el);
    $el = str_replace("----", "-", $el);
    $el = str_replace("-----", "-", $el);
    $el = $el.'-'.date('y-m-d-h-i-s');
    return $el;
}


function getfile($data, $path, $name)
{
    $data = $_FILES[$data];

    if (!file_exists($path)) {
        mkdir($path);
    }


    // cek if file exist
    if(file_exists($path.'/'.$name.$data['name'])){

        unlink($path.'/'.$name.$data['name']);
        move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);

    }else{
        move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);
    }

    return $data['name'];
}


function checkobjk($data = "", $name ="")
{
    if(isset($data->$name)){
        return $data->$name;
    }
    else{
        return "";
    }
}


function get_file($name = "", $path = "")
{
    if (isset($_FILES[$name])) {
        $dataArr = [];
        move_uploaded_file($_FILES[$name]['tmp_name'], $path.$_FILES[$name]['name']);
        $makeData = [
            "path" => $path,
            "name" => $_FILES[$name]['name']
        ];
        return htmlentities(json_encode($makeData));
    }
}

function file_link_decode($data)
{
    $create = html_entity_decode($data);
    $create = json_decode($create);
    $createlink = base_url().$create->path.$create->name;
    return $createlink;
}


function link_button($data)
{

    $icon = "";

    $pattern = "/Tambah/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-plus\"></i>";
    }

    $pattern = "/Kembali/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-arrow-left\"></i>";
    }

    $pattern = "/Buat/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-plus\"></i>";
    }

    $pattern = "/Excel/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-file-excel\"></i>";
    }

    $pattern = "/Bayar/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-money-bill-wave\"></i>";
    }

    $pattern = "/pdf/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-file-pdf\"></i>";
    }

    $pattern = "/faktur/i";

    if(preg_match($pattern, $data['text']) > 0){
        $icon = "<i class=\"fas fa-file-pdf\"></i>";
    }

    $html = "<a";
    if (isset($data['id'])) {
      $html .= " id = '".$data['id']."'";
    }
    $html .= " href = '".site_url($data['link'])."'";
    $html .= " class = '".$data['class']."'";
    $html .= " >";
    $html .= $icon." ".$data['text'];
    $html .= "</a>";
    echo $html;
}

function nav_link($data)
{

    $icon = "";

    if(isset($data['icon'])){
        $icon = $data['icon'];
    }

    $title = "";

    if(isset($data['title'])){
        $title = $data['title'];
    }

    $link = "";

    if(isset($data['link'])){
        $link = $data['link'];
    }

    $navigate = "";

    if(isset($data['navigate'])){
        $navigate = $data['navigate'];
    }

    if(!isset($data['cekmultiuser'])){
        $html = '

            <li class="nav-item">
              <a href="'.site_url().''.$link.'" navigate-act nav-name="'.$navigate.'" class="nav-link">
                <i class="nav-icon fas '.$icon.'"></i>
                <p>
                  '.$title.'
                </p>
              </a>
            </li>

        ';
        return $html;
    }else{


        if(in_array($data['cekmultiuser']['user'], $data['cekmultiuser']['cek'])) {
            $html = '

                <li class="nav-item">
                  <a href="'.site_url().''.$link.'" navigate-act nav-name="'.$navigate.'" class="nav-link">
                    <i class="nav-icon fas '.$icon.'"></i>
                    <p>
                      '.$title.'
                    </p>
                  </a>
                </li>
            ';
            return $html;
        }

    }


}

function setNavActive($data = "")
{
    $html = "

    <script>
        let setActiveNav = document.querySelectorAll('[navigate-act]');
        setActiveNav.forEach(NavActive => {
        if(NavActive.getAttribute('nav-name') === '".$data."'){
            NavActive.classList.add('active');
            console.log(NavActive.classList);
        }
        });
    </script>

    ";

    return $html;
}

function potongtext($isi, $num = 255){
    return mb_substr(htmlspecialchars_decode($isi),0,$num,'HTML-ENTITIES');
}

function back()
{
    return "
        <button class=\"btn btn-default\" onclick=\"window.history.back()\">kembali</button>
        <br>
        <br>
    ";
}

function strigToBinary($string = null)
{
    $characters = str_split($string);

    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }

    return implode(' ', $binary);
}

function binaryToArray($binary = null){
    $ff = json_decode(binaryToString($binary), true);

    if (is_array($ff)) {
        return $ff;
    }else{
        return array();
    }
}

function rupiah($angka = 0){

  if ($angka == NULL) {
    $angka = 0;
  }

	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;

}

function penyebut($nilai = null) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
}

function terbilang($nilai = null) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}

function namabulan($dat=1)
{
  $nama = [
    "01"=> "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Juni",
    "07" => "Juli",
    "08" => "Agustus",
    "09" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember"
  ];
  return $nama[$dat];
}

function binaryToString($binary = null)
{
    $binaries = explode(' ', $binary);

    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }

    return $string;
}

function ffread($dir = ""){
    $filename = $dir;
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;

}

function cekdir($dir='')
{
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
}

function setting($a = null)
{
    return Perusahaans::cek($a);
}

function ffwrite($dir = "", $text = ""){
    $file = fopen($dir,"w");
    fwrite($file, $text);
    fclose($file);
}

function fontlist(){
    $font = [
        "fas fa-500px","fas fa-address-book","fas fa-address-book-o","fas fa-address-card","fas fa-address-card-o","fas fa-adjust","fas fa-adn","fas fa-align-center","fas fa-align-justify","fas fa-align-left","fas fa-align-right","fas fa-amazon","fas fa-ambulance","fas fa-american-sign-language-interpreting","fas fa-anchor","fas fa-android","fas fa-angellist","fas fa-angle-double-down","fas fa-angle-double-left","fas fa-angle-double-right","fas fa-angle-double-up","fas fa-angle-down","fas fa-angle-left","fas fa-angle-right","fas fa-angle-up","fas fa-apple","fas fa-archive","fas fa-area-chart","fas fa-arrow-circle-down","fas fa-arrow-circle-left","fas fa-arrow-circle-o-down","fas fa-arrow-circle-o-left","fas fa-arrow-circle-o-right","fas fa-arrow-circle-o-up","fas fa-arrow-circle-right","fas fa-arrow-circle-up","fas fa-arrow-down","fas fa-arrow-left","fas fa-arrow-right","fas fa-arrow-up","fas fa-arrows","fas fa-arrows-alt","fas fa-arrows-h","fas fa-arrows-v","fas fa-asl-interpreting","fas fa-assistive-listening-systems","fas fa-asterisk","fas fa-at","fas fa-audio-description","fas fa-automobile","fas fa-backward","fas fa-balance-scale","fas fa-ban","fas fa-bandcamp","fas fa-bank","fas fa-bar-chart","fas fa-bar-chart-o","fas fa-barcode","fas fa-bars","fas fa-bath","fas fa-bathtub","fas fa-battery","fas fa-battery-0","fas fa-battery-1","fas fa-battery-2","fas fa-battery-3","fas fa-battery-4","fas fa-battery-empty","fas fa-battery-full","fas fa-battery-half","fas fa-battery-quarter","fas fa-battery-three-quarters","fas fa-bed","fas fa-beer","fas fa-behance","fas fa-behance-square","fas fa-bell","fas fa-bell-o","fas fa-bell-slash","fas fa-bell-slash-o","fas fa-bicycle","fas fa-binoculars","fas fa-birthday-cake","fas fa-bitbucket","fas fa-bitbucket-square","fas fa-bitcoin","fas fa-black-tie","fas fa-blind","fas fa-bluetooth","fas fa-bluetooth-b","fas fa-bold","fas fa-bolt","fas fa-bomb","fas fa-book","fas fa-bookmark","fas fa-bookmark-o","fas fa-braille","fas fa-briefcase","fas fa-btc","fas fa-bug","fas fa-building","fas fa-building-o","fas fa-bullhorn","fas fa-bullseye","fas fa-bus","fas fa-buysellads","fas fa-cab","fas fa-calculator","fas fa-calendar","fas fa-calendar-check-o","fas fa-calendar-minus-o","fas fa-calendar-o","fas fa-calendar-plus-o","fas fa-calendar-times-o","fas fa-camera","fas fa-camera-retro","fas fa-car","fas fa-caret-down","fas fa-caret-left","fas fa-caret-right","fas fa-caret-square-o-down","fas fa-caret-square-o-left","fas fa-caret-square-o-right","fas fa-caret-square-o-up","fas fa-caret-up","fas fa-cart-arrow-down","fas fa-cart-plus","fas fa-cc","fas fa-cc-amex","fas fa-cc-diners-club","fas fa-cc-discover","fas fa-cc-jcb","fas fa-cc-mastercard","fas fa-cc-paypal","fas fa-cc-stripe","fas fa-cc-visa","fas fa-certificate","fas fa-chain","fas fa-chain-broken","fas fa-check","fas fa-check-circle","fas fa-check-circle-o","fas fa-check-square","fas fa-check-square-o","fas fa-chevron-circle-down","fas fa-chevron-circle-left","fas fa-chevron-circle-right","fas fa-chevron-circle-up","fas fa-chevron-down","fas fa-chevron-left","fas fa-chevron-right","fas fa-chevron-up","fas fa-child","fas fa-chrome","fas fa-circle","fas fa-circle-o","fas fa-circle-o-notch","fas fa-circle-thin","fas fa-clipboard","fas fa-clock-o","fas fa-clone","fas fa-close","fas fa-cloud","fas fa-cloud-download","fas fa-cloud-upload","fas fa-cny","fas fa-code","fas fa-code-fork","fas fa-codepen","fas fa-codiepie","fas fa-coffee","fas fa-cog","fas fa-cogs","fas fa-columns","fas fa-comment","fas fa-comment-o","fas fa-commenting","fas fa-commenting-o","fas fa-comments","fas fa-comments-o","fas fa-compass","fas fa-compress","fas fa-connectdevelop","fas fa-contao","fas fa-copy","fas fa-copyright","fas fa-creative-commons","fas fa-credit-card","fas fa-credit-card-alt","fas fa-crop","fas fa-crosshairs","fas fa-css3","fas fa-cube","fas fa-cubes","fas fa-cut","fas fa-cutlery","fas fa-dashboard","fas fa-dashcube","fas fa-database","fas fa-deaf","fas fa-deafness","fas fa-dedent","fas fa-delicious","fas fa-desktop","fas fa-deviantart","fas fa-diamond","fas fa-digg","fas fa-dollar","fas fa-dot-circle-o","fas fa-download","fas fa-dribbble","fas fa-drivers-license","fas fa-drivers-license-o","fas fa-dropbox","fas fa-drupal","fas fa-edge","fas fa-edit","fas fa-eercast","fas fa-eject","fas fa-ellipsis-h","fas fa-ellipsis-v","fas fa-empire","fas fa-envelope","fas fa-envelope-o","fas fa-envelope-open","fas fa-envelope-open-o","fas fa-envelope-square","fas fa-envira","fas fa-eraser","fas fa-etsy","fas fa-eur","fas fa-euro","fas fa-exchange","fas fa-exclamation","fas fa-exclamation-circle","fas fa-exclamation-triangle","fas fa-expand","fas fa-expeditedssl","fas fa-external-link","fas fa-external-link-square","fas fa-eye","fas fa-eye-slash","fas fa-eyedropper","fas fa-","","fas fa-","cebook","fas fa-","cebook-f","fas fa-","cebook-official","fas fa-","cebook-square","fas fa-","st-backward","fas fa-","st-forward","fas fa-","x","fas fa-feed","fas fa-female","fas fa-fighter-jet","fas fa-file","fas fa-file-archive-o","fas fa-file-audio-o","fas fa-file-code-o","fas fa-file-excel-o","fas fa-file-image-o","fas fa-file-movie-o","fas fa-file-o","fas fa-file-pdf-o","fas fa-file-photo-o","fas fa-file-picture-o","fas fa-file-powerpoint-o","fas fa-file-sound-o","fas fa-file-text","fas fa-file-text-o","fas fa-file-video-o","fas fa-file-word-o","fas fa-file-zip-o","fas fa-files-o","fas fa-film","fas fa-filter","fas fa-fire","fas fa-fire-extinguisher","fas fa-firefox","fas fa-first-order","fas fa-flag","fas fa-flag-checkered","fas fa-flag-o","fas fa-flash","fas fa-flask","fas fa-flickr","fas fa-floppy-o","fas fa-folder","fas fa-folder-o","fas fa-folder-open","fas fa-folder-open-o","fas fa-font","fas fa-font-awesome","fas fa-fonticons","fas fa-fort-awesome","fas fa-forumbee","fas fa-forward","fas fa-foursquare","fas fa-free-code-camp","fas fa-frown-o","fas fa-futbol-o","fas fa-gamepad","fas fa-gavel","fas fa-gbp","fas fa-ge","fas fa-gear","fas fa-gears","fas fa-genderless","fas fa-get-pocket","fas fa-gg","fas fa-gg-circle","fas fa-gift","fas fa-git","fas fa-git-square","fas fa-github","fas fa-github-alt","fas fa-github-square","fas fa-gitlab","fas fa-gittip","fas fa-glass","fas fa-glide","fas fa-glide-g","fas fa-globe","fas fa-google","fas fa-google-plus","fas fa-google-plus-circle","fas fa-google-plus-official","fas fa-google-plus-square","fas fa-google-wallet","fas fa-graduation-cap","fas fa-gratipay","fas fa-grav","fas fa-group","fas fa-h-square","fas fa-hacker-news","fas fa-hand-grab-o","fas fa-hand-lizard-o","fas fa-hand-o-down","fas fa-hand-o-left","fas fa-hand-o-right","fas fa-hand-o-up","fas fa-hand-paper-o","fas fa-hand-peace-o","fas fa-hand-pointer-o","fas fa-hand-rock-o","fas fa-hand-scissors-o","fas fa-hand-spock-o","fas fa-hand-stop-o","fas fa-handshake-o","fas fa-hard-of-hearing","fas fa-hashtag","fas fa-hdd-o","fas fa-header","fas fa-headphones","fas fa-heart","fas fa-heart-o","fas fa-heartbeat","fas fa-history","fas fa-home","fas fa-hospital-o","fas fa-hotel","fas fa-hourglass","fas fa-hourglass-1","fas fa-hourglass-2","fas fa-hourglass-3","fas fa-hourglass-end","fas fa-hourglass-half","fas fa-hourglass-o","fas fa-hourglass-start","fas fa-houzz","fas fa-html5","fas fa-i-cursor","fas fa-id-badge","fas fa-id-card","fas fa-id-card-o","fas fa-ils","fas fa-image","fas fa-imdb","fas fa-inbox","fas fa-indent","fas fa-industry","fas fa-info","fas fa-info-circle","fas fa-inr","fas fa-instagram","fas fa-institution","fas fa-internet-explorer","fas fa-intersex","fas fa-ioxhost","fas fa-italic","fas fa-joomla","fas fa-jpy","fas fa-jsfiddle","fas fa-key","fas fa-keyboard-o","fas fa-krw","fas fa-language","fas fa-laptop","fas fa-lastfm","fas fa-lastfm-square","fas fa-leaf","fas fa-leanpub","fas fa-legal","fas fa-lemon-o","fas fa-level-down","fas fa-level-up","fas fa-life-bouy","fas fa-life-buoy","fas fa-life-ring","fas fa-life-saver","fas fa-lightbulb-o","fas fa-line-chart","fas fa-link","fas fa-linkedin","fas fa-linkedin-square","fas fa-linode","fas fa-linux","fas fa-list","fas fa-list-alt","fas fa-list-ol","fas fa-list-ul","fas fa-location-arrow","fas fa-lock","fas fa-long-arrow-down","fas fa-long-arrow-left","fas fa-long-arrow-right","fas fa-long-arrow-up","fas fa-low-vision","fas fa-magic","fas fa-magnet","fas fa-mail-forward","fas fa-mail-reply","fas fa-mail-reply-all","fas fa-male","fas fa-map","fas fa-map-marker","fas fa-map-o","fas fa-map-pin","fas fa-map-signs","fas fa-mars","fas fa-mars-double","fas fa-mars-stroke","fas fa-mars-stroke-h","fas fa-mars-stroke-v","fas fa-maxcdn","fas fa-meanpath","fas fa-medium","fas fa-medkit","fas fa-meetup","fas fa-meh-o","fas fa-mercury","fas fa-microchip","fas fa-microphone","fas fa-microphone-slash","fas fa-minus","fas fa-minus-circle","fas fa-minus-square","fas fa-minus-square-o","fas fa-mixcloud","fas fa-mobile","fas fa-mobile-phone","fas fa-modx","fas fa-money","fas fa-moon-o","fas fa-mortar-board","fas fa-motorcycle","fas fa-mouse-pointer","fas fa-music","fas fa-navicon","fas fa-neuter","fas fa-newspaper-o","fas fa-object-group","fas fa-object-ungroup","fas fa-odnoklassniki","fas fa-odnoklassniki-square","fas fa-opencart","fas fa-openid","fas fa-opera","fas fa-optin-monster","fas fa-outdent","fas fa-pagelines","fas fa-paint-brush","fas fa-paper-plane","fas fa-paper-plane-o","fas fa-paperclip","fas fa-paragraph","fas fa-paste","fas fa-pause","fas fa-pause-circle","fas fa-pause-circle-o","fas fa-paw","fas fa-paypal","fas fa-pencil","fas fa-pencil-square","fas fa-pencil-square-o","fas fa-percent","fas fa-phone","fas fa-phone-square","fas fa-photo","fas fa-picture-o","fas fa-pie-chart","fas fa-pied-piper","fas fa-pied-piper-alt","fas fa-pied-piper-pp","fas fa-pinterest","fas fa-pinterest-p","fas fa-pinterest-square","fas fa-plane","fas fa-play","fas fa-play-circle","fas fa-play-circle-o","fas fa-plug","fas fa-plus","fas fa-plus-circle","fas fa-plus-square","fas fa-plus-square-o","fas fa-podcast","fas fa-power-off","fas fa-print","fas fa-product-hunt","fas fa-puzzle-piece","fas fa-qq","fas fa-qrcode","fas fa-question","fas fa-question-circle","fas fa-question-circle-o","fas fa-quora","fas fa-quote-left","fas fa-quote-right","fas fa-ra","fas fa-random","fas fa-ravelry","fas fa-rebel","fas fa-recycle","fas fa-reddit","fas fa-reddit-alien","fas fa-reddit-square","fas fa-refresh","fas fa-registered","fas fa-remove","fas fa-renren","fas fa-reorder","fas fa-repeat","fas fa-reply","fas fa-reply-all","fas fa-resistance","fas fa-retweet","fas fa-rmb","fas fa-road","fas fa-rocket","fas fa-rotate-left","fas fa-rotate-right","fas fa-rouble","fas fa-rss","fas fa-rss-square","fas fa-rub","fas fa-ruble","fas fa-rupee","fas fa-s15","fas fa-sa","ri","fas fa-save","fas fa-scissors","fas fa-scribd","fas fa-search","fas fa-search-minus","fas fa-search-plus","fas fa-sellsy","fas fa-send","fas fa-send-o","fas fa-server","fas fa-share","fas fa-share-alt","fas fa-share-alt-square","fas fa-share-square","fas fa-share-square-o","fas fa-shekel","fas fa-sheqel","fas fa-shield","fas fa-ship","fas fa-shirtsinbulk","fas fa-shopping-bag","fas fa-shopping-basket","fas fa-shopping-cart","fas fa-shower","fas fa-sign-in","fas fa-sign-language","fas fa-sign-out","fas fa-signal","fas fa-signing","fas fa-simplybuilt","fas fa-sitemap","fas fa-skyatlas","fas fa-skype","fas fa-slack","fas fa-sliders","fas fa-slideshare","fas fa-smile-o","fas fa-snapchat","fas fa-snapchat-ghost","fas fa-snapchat-square","fas fa-snowflake-o","fas fa-soccer-ball-o","fas fa-sort","fas fa-sort-alpha-asc","fas fa-sort-alpha-desc","fas fa-sort-amount-asc","fas fa-sort-amount-desc","fas fa-sort-asc","fas fa-sort-desc","fas fa-sort-down","fas fa-sort-numeric-asc","fas fa-sort-numeric-desc","fas fa-sort-up","fas fa-soundcloud","fas fa-space-shuttle","fas fa-spinner","fas fa-spoon","fas fa-spotify","fas fa-square","fas fa-square-o","fas fa-stack-exchange","fas fa-stack-overflow","fas fa-star","fas fa-star-half","fas fa-star-half-empty","fas fa-star-half-full","fas fa-star-half-o","fas fa-star-o","fas fa-steam","fas fa-steam-square","fas fa-step-backward","fas fa-step-forward","fas fa-stethoscope","fas fa-sticky-note","fas fa-sticky-note-o","fas fa-stop","fas fa-stop-circle","fas fa-stop-circle-o","fas fa-street-view","fas fa-strikethrough","fas fa-stumbleupon","fas fa-stumbleupon-circle","fas fa-subscript","fas fa-subway","fas fa-suitcase","fas fa-sun-o","fas fa-superpowers","fas fa-superscript","fas fa-support","fas fa-table","fas fa-tablet","fas fa-tachometer","fas fa-tag","fas fa-tags","fas fa-tasks","fas fa-taxi","fas fa-telegram","fas fa-television","fas fa-tencent-weibo","fas fa-terminal","fas fa-text-height","fas fa-text-width","fas fa-th","fas fa-th-large","fas fa-th-list","fas fa-themeisle","fas fa-thermometer","fas fa-thermometer-0","fas fa-thermometer-1","fas fa-thermometer-2","fas fa-thermometer-3","fas fa-thermometer-4","fas fa-thermometer-empty","fas fa-thermometer-full","fas fa-thermometer-half","fas fa-thermometer-quarter","fas fa-thermometer-three-quarters","fas fa-thumb-tack","fas fa-thumbs-down","fas fa-thumbs-o-down","fas fa-thumbs-o-up","fas fa-thumbs-up","fas fa-ticket","fas fa-times","fas fa-times-circle","fas fa-times-circle-o","fas fa-times-rectangle","fas fa-times-rectangle-o","fas fa-tint","fas fa-toggle-down","fas fa-toggle-left","fas fa-toggle-off","fas fa-toggle-on","fas fa-toggle-right","fas fa-toggle-up","fas fa-trademark","fas fa-train","fas fa-transgender","fas fa-transgender-alt","fas fa-trash","fas fa-trash-o","fas fa-tree","fas fa-trello","fas fa-tripadvisor","fas fa-trophy","fas fa-truck","fas fa-try","fas fa-tty","fas fa-tumblr","fas fa-tumblr-square","fas fa-turkish-lira","fas fa-tv","fas fa-twitch","fas fa-twitter","fas fa-twitter-square","fas fa-umbrella","fas fa-underline","fas fa-undo","fas fa-universal-access","fas fa-university","fas fa-unlink","fas fa-unlock","fas fa-unlock-alt","fas fa-unsorted","fas fa-upload","fas fa-usb","fas fa-usd","fas fa-user","fas fa-user-circle","fas fa-user-circle-o","fas fa-user-md","fas fa-user-o","fas fa-user-plus","fas fa-user-secret","fas fa-user-times","fas fa-users","fas fa-vcard","fas fa-vcard-o","fas fa-venus","fas fa-venus-double","fas fa-venus-mars","fas fa-viacoin","fas fa-viadeo","fas fa-viadeo-square","fas fa-video-camera","fas fa-vimeo","fas fa-vimeo-square","fas fa-vine","fas fa-vk","fas fa-volume-control-phone","fas fa-volume-down","fas fa-volume-off","fas fa-volume-up","fas fa-warning","fas fa-wechat","fas fa-weibo","fas fa-weixin","fas fa-whatsapp","fas fa-wheelchair","fas fa-wheelchair-alt","fas fa-wifi","fas fa-wikipedia-w","fas fa-window-close","fas fa-window-close-o","fas fa-window-maximize","fas fa-window-minimize","fas fa-window-restore","fas fa-windows","fas fa-won","fas fa-wordpress","fas fa-wpbeginner","fas fa-wpexplorer","fas fa-wpforms","fas fa-wrench","fas fa-xing","fas fa-xing-square","fas fa-y-combinator","fas fa-y-combinator-square","fas fa-yahoo","fas fa-yc","fas fa-yc-square","fas fa-yelp","fas fa-yen","fas fa-yoast","fas fa-youtube","fas fa-youtube-play","fas fa-youtube-square"
    ];
    return $font;
}
