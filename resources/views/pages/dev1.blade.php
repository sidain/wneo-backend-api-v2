<?php
    // use App\Models\_category;
?>

@extends('layouts.base')

@section('sidebar-menu')
    @include('partials.sideMenuDev1')
@endsection


@section('content1')

    <div class="mt-5 mb-5">
        <hr />

        <a href="https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=0">https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=0</a>
        <br />
        <a href="https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80">https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80</a>
        <br />
        <br />

        $header_response, 'X-WP-TotalPages'
        <br />
        <br />
        <br />

        <a target="_blank" href="http://localhost:8010/api/v1/builders/">http://localhost:8010/api/v1/builders/</a>
        <br />
        <a target="_blank" href="http://localhost:8010/api/v1/builders/1/products">http://localhost:8010/api/v1/builders/1/products</a>
        <br />
        <br />
        <a target="_blank" href="http://localhost:8010/api/v1/products/">http://localhost:8010/api/v1/products/</a>
        <br />
        <a target="_blank" href="http://localhost:8010/api/v1/categorys/">http://localhost:9000/api/v1/categorys/</a>
        <br />
        <br />
        <a target="_blank" href="http://localhost:8010/api/v1/products?page[number]=1&page[size]=80">http://localhost:8010/api/v1/products?page[number]=1&page[size]=80</a>
        <br />
        <br />
    </div>


    <hr />
    <div class="row">
        <div class="col">
            <h1>LIVE API</h1>

            <div class="text-break">
                <?php
                    // $url1 = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=0";
                    // $url1 = "https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80";
                    // $url1 = "127.0.0.1:9000";
                    // $url1 = "http://localhost:8010/api/v1/builders/";
                    //content-type: application/vnd.api+json

                    // 1. initialize
                    // $ch1 = curl_init();

                    // // 2. set the options, including the url
                    // curl_setopt($ch1, CURLOPT_URL, "http://www.nettuts.com");

                    // curl_setopt($ch1, CURLOPT_URL, $url1);
                    // curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
                    // curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
                    // curl_setopt($ch1, CURLOPT_HEADER, 1);
                    // curl_setopt($ch1, CURLOPT_POST, 1);
                    // curl_setopt($ch1, CURLOPT_GET, 1);

                    // // 3. execute and fetch the resulting HTML output
                    // $output = curl_exec($ch1);

                    // echo "OUTPUT:: <br />";
                    // echo "<pre>";
                    // echo $output;
                    // print_r($output);
                    // echo "</pre>";
                    // var_dump($output);

                    // if( $output === false){
                    //     echo "<br />ERROR OUTPUT:: <br />";
                    //     echo "cURL Error: " . curl_error($ch1);

                    // }

                    // // 4. free up the curl handle
                    // curl_close($ch1);

                    // $curl_live = curl_init();
                    // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    // curl_setopt($curl, CURLOPT_PUT, 1);
                    // $url = sprintf("%s?%s", $url, http_build_query($data));
                    // Optional Authentication:
                    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
                    // curl_setopt($curl, CURLOPT_URL, $url);
                    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    // $result = curl_exec($curl);
                    // curl_close($curl);
                    // return $result;
                ?>


            </div>

        </div>




        <div class="col">
            <h1>DEV API</h1>

            <div class="text-break">
                <?php
                    // $url2 = "http://localhost:8010/api/v1/builders/1";
                    // $url2 = "https://selectconnectdev.com/app/api/v1/builders/";
                    // $ch2 = curl_init();
                    // curl_setopt($ch2, CURLOPT_URL, $url2);
                    // curl_setopt($ch2, CURLOPT_FAILONERROR, true);
                    // curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
                    // curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    // curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
                    // curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
                    // $result = curl_exec($ch2);
                    // echo $result;
                    // if( $result  === false){
                    //     echo "<br />ERROR OUTPUT:: <br />";
                    //     echo "cURL Error: " . curl_error($ch2);
                    // }
                    // curl_close($ch2);

                    // $url = "http://localhost:8010/api/v1/builders/1";
                    // //content-type: application/vnd.api+json

                    // // 1. initialize
                    // $ch = curl_init();

                    // // // 2. set the options, including the url
                    // // curl_setopt($ch, CURLOPT_URL, "http://www.nettuts.com");

                    // curl_setopt($ch, CURLOPT_URL, $url);
                    // // curl_setopt($ch, CURLOPT_HEADER, 1);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    // // curl_setopt($ch, CURLOPT_POST, 1);
                    // // curl_setopt($ch, CURLOPT_GET, 1);
                    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

                    // // // 3. execute and fetch the resulting HTML output
                    // $output = curl_exec($ch);
                    // echo "OUTPUT:: <br />";
                    // echo $output;
                    // print_r($output);
                    // var_dump($output);
                    // if( $output === false){
                    //     echo "<br />ERROR OUTPUT:: <br />";
                    //     echo "cURL Error: " . curl_error($ch);
                    // }

                    // // // 4. free up the curl handle
                    // curl_close($ch);




                    // $curl_dev = curl_init();
                    // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    // curl_setopt($curl, CURLOPT_PUT, 1);
                    // $url = sprintf("%s?%s", $url, http_build_query($data));
                    // Optional Authentication:
                    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
                    // curl_setopt($curl, CURLOPT_URL, $url);
                    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    // $result = curl_exec($curl);
                    // curl_close($curl);
                    // return $result;


                ?>



            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="text-center">
            <hr />
            <h1>DEV JSON API 1</h1>

            <div class="text-break text-left pl-5">
                <?php
                    /*
                    # An HTTP GET request example
                    $url = 'http://localhost:8080/stocks';
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $data = curl_exec($ch);
                    curl_close($ch);
                    echo $data;
                    */

                    // $url = "http://localhost:8010/api/v1/builders/1";
                    // //content-type: application/vnd.api+json


                    // // 1. initialize
                    // $ch = curl_init();

                    // // // 2. set the options, including the url
                    // // curl_setopt($ch, CURLOPT_URL, "http://www.nettuts.com");

                    // curl_setopt($ch, CURLOPT_URL, $url);
                    // // curl_setopt($ch, CURLOPT_HEADER, 1);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    // // curl_setopt($ch, CURLOPT_POST, 1);
                    // // curl_setopt($ch, CURLOPT_GET, 1);
                    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

                    // // // 3. execute and fetch the resulting HTML output
                    // $output = curl_exec($ch);

                    // echo "OUTPUT:: <br />";
                    // echo $output;
                    // print_r($output);
                    // var_dump($output);

                    // if( $output === false){
                    //     echo "<br />ERROR OUTPUT:: <br />";
                    //     echo "cURL Error: " . curl_error($ch);

                    // }

                    // // // 4. free up the curl handle
                    // curl_close($ch);


                    // $curl_dev = curl_init();
                    // curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    // curl_setopt($curl, CURLOPT_PUT, 1);
                    // $url = sprintf("%s?%s", $url, http_build_query($data));
                    // Optional Authentication:
                    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");
                    // curl_setopt($curl, CURLOPT_URL, $url);
                    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    // $result = curl_exec($curl);
                    // curl_close($curl);
                    // return $result;




                    function callAPI($method, $url, $data) {
                        $curl = curl_init();

                        switch ($method) {
                            case "POST":
                                curl_setopt($curl, CURLOPT_POST, 1);
                                if ($data)
                                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                                break;
                            case "PUT":
                                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                                if ($data)
                                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                                break;
                            default:
                                if ($data)
                                    $url = sprintf("%s?%s", $url, http_build_query($data));
                        }

                        // OPTIONS:
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                            'APIKEY: 111111111111111111111',
                            'Content-Type: application/json',
                        ));
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

                        // EXECUTE:
                        $result = curl_exec($curl);

                        if (!$result) {
                            die("Connection Failure");
                        }

                        curl_close($curl);

                        return $result;
                    }




                    $urlsc = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=0";
                    $urlsc_ = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=";
                    $urlscpages = "https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80";
                    // $url1 = "http://localhost:8010/api/v1/builders/1";
                    // $url2 = "https://selectconnectdev.com/app/api/v1/builders/";





                    if ( false ) {
                        $b_c_url = "https://selectconnectdev.com/scapi/wneo.json";
                        $b_c_fp = fopen("wneo_builder_categorys.json", "w");

                        $b_c_ch  = curl_init();
                        curl_setopt($b_c_ch, CURLOPT_FILE, $b_c_fp);
                        curl_setopt($b_c_ch, CURLOPT_URL, $b_c_url);
                        curl_setopt($b_c_ch, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($b_c_ch, CURLOPT_SSL_VERIFYPEER, false);
                        // curl_setopt($b_c_ch, CURLOPT_RETURNTRANSFER, true);

                        $b_c_result = curl_exec($b_c_ch);

                        curl_close($b_c_ch);
                        fclose($b_c_fp);
                    }


                    if ( false ) {
                        $urlsc_ = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=";

                        $fp = fopen('weno_data.data', 'w');

                        $ch  = curl_init();
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        for ($i=0; $i < 10; $i++) {
                            $url = $urlsc_."$i";

                            curl_setopt($ch, CURLOPT_URL, $url);
                            $result = curl_exec($ch);

                            fwrite($fp, $result."\n");
                        }

                        curl_close($ch);
                        fclose($fp);

                        /*
                        $fp = fopen('testFile', 'w');

                        for ($i=0; $i < 3 ; $i++) {

                            fwrite($fp, $i."\n");

                        }

                        fclose($fp);
                        */
                    }


                    if ( false ) {
                        $fp = fopen('testFile', 'r');

                        $result = fgets($fp);
                        echo $result;

                        /*
                        while ( ! feof($fp) ) {
                            $result = fgets($fp);
                            echo $result;
                            echo "<br />";
                            echo "<br />";
                        }
                        */

                        fclose($fp);

                        exit();
                    }


                    if ( false ) {
                        // **** PROCESS BUILDER-CATEGORY FILE

                        $b_c_file = file_get_contents("wneo_builder_categorys.json");
                        $b_c_json = json_decode($b_c_file, true);


                        if ( true ) {
                            // **** INSERT CATEGORYS

                            // DB::insert('insert into _categories (cat) values (?)', ['Test']);

                            // set_time_limit(600);
                            // ini_set('max_execution_time', 300); //300 seconds = 5 minutes

                            $toCatInsert = [];
                            foreach ($b_c_json as $key => $v) {
                                foreach ($v as $key => $vv) {
                                    $toCatInsert[$vv] = true;
                                }
                            }

                            foreach ($toCatInsert as $key => $value) {
                                \App\Models\_category::firstOrCreate( [ 'cat' => $key ], [ 'cat_id' => Str::uuid() ] );
                            }


                            // $wait = 3;
                            // $time = microtime(true);
                            // $expire = $time + $wait;

                            // $pid = pcntl_fork();

                            // if ($pid == -1) {
                            //     die('could not fork');
                            // } else if ($pid) {
                            //     // we are the parent

                            //     foreach ($b_c_json as $key => $v) {
                            //         foreach ($v as $key => $vv) {
                            //             _category::firstOrCreate( [ 'cat' => $vv ] );
                            //         }
                            //     }

                            //     return FALSE;
                            //     pcntl_wait($status); //Protect against Zombie children
                            // } else {
                            //     // we are the child

                            //     while(microtime(true) < $expire)
                            //     {
                            //        sleep(0.5);
                            //     }
                            //     return FALSE;
                            // }


                        }
















                        // echo "<pre>";

                        // dd($b_c_json);
                        // echo "[".array_key_first($b_c_json)."]";
                        // echo "<br />";


                        // *** categorys
                        // $b_c_json['']
                        // echo print_r(  $b_c_json[ array_key_first($b_c_json) ]  );
                        // echo print_r(  $b_c_json[ '' ]  );

                        // *** a builder
                        // echo print_r(  $b_c_json[ '77 Woodcraft' ]  );

                        // **** builders
                        // array_keys($b_c_json)



                        // echo "<pre>";

                        // echo "</pre>";

                            // echo "<br />";

                        // json array keys, 'starts' with '' blank string
                        // foreach (array_keys($b_c_json)  as $key => $value) {
                        //     echo "$key <==> $value <br />";
                        // }

                        // echo "<br />";

                        // echo "<div class='row'>";
                        // echo '<a name="bc_begin" href="#bc_end">To Bottom of bc</a><br />';

                        // foreach ($b_c_json as $key => $value) {
                            // echo "<div class='row'>";
                                // echo print_r($value, true);
                                // echo print_r($key, true);
                                // echo "$key <br />";
                            // echo "</div>";
                        // }

                        // echo '<a name="bc_end" href="#bc_begin">To Top of bc</a><br />';
                        // echo "</div>";
                    }




                    if ( false ) {

                        $fp = fopen("wneo_api_data.json", "w");

                        // $gh =  get_headers( $urlscpages, true);
                        // $total_pages = $gh['X-WP-TotalPages'];
                        $total_pages = 767;

                        if( is_numeric($total_pages) && $total_pages > 0 )
                        {
                            echo "per pages 80, total pages => $total_pages<br />";

                            echo '<a name="url_pages_begin" href="#url_pages_end">To Bottom of pages</a><br />';


                            for ($i=0; $i < $total_pages; $i++) {

                                $url = $urlsc_."$i";

                                echo "$url<br />";

                                $scprime = curl_init();

                                curl_setopt($scprime, CURLOPT_URL, $url);
                                curl_setopt($scprime, CURLOPT_SSL_VERIFYHOST, false);
                                curl_setopt($scprime, CURLOPT_SSL_VERIFYPEER, false);
                                curl_setopt($scprime, CURLOPT_RETURNTRANSFER, true);

                                // $result = curl_exec($scprime);
                                // $responseCode = curl_getinfo( $scprime, CURLINFO_HTTP_CODE );

                                // if( $result  === false){
                                //     echo "<br />ERROR OUTPUT:: <br />";
                                //     echo "cURL Error: " . curl_error($scprime);
                                // }


                            }

                            echo '<a name="url_pages_end" href="#url_pages_begin">End of pages</a>';

                            // curl_close($scprime);
                            // fclose($fp);
                        }

                    }


                    if( false ){
                        //***** GET API V0 DATA...


                        // $gh =  get_headers( $urlscpages, true);
                        // $total_pages = $gh['X-WP-TotalPages'];
                        // $total_pages = 767;


                        $urlsc1 = $urlsc;

                        $fp = fopen("wneo_api_data.json", "w");

                        $scprime = curl_init();

                        curl_setopt($scprime, CURLOPT_URL, $urlsc1);
                        curl_setopt($scprime, CURLOPT_FILE, $fp);
                        curl_setopt($scprime, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($scprime, CURLOPT_SSL_VERIFYPEER, false);

                        // curl_setopt($scprime, CURLOPT_HEADER, true);
                        // curl_setopt($scprime, CURLOPT_NOBODY, true);
                        // curl_setopt($scprime, CURLOPT_RETURNTRANSFER, true);
                        // curl_setopt($scprime, CURLOPT_FAILONERROR, true);
                        // curl_setopt($scprime, CURLOPT_FOLLOWLOCATION, true);
                        // curl_setopt($scprime, CURLOPT_RETURNTRANSFER, false);

                        /*
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            'Header-Key: Header-Value',
                            'Header-Key-2: Header-Value-2'
                        ));
                        */

                        $result = curl_exec($scprime);

                        $responseCode = curl_getinfo(
                            $scprime,
                            CURLINFO_HTTP_CODE
                        );

                        /*
                        $downloadLength =
                            curl_getinfo($scprime,
                            CURLINFO_CONTENT_LENGTH_DOWNLOAD
                        );
                        */

                        // $info = curl_getinfo( $scprime );
                        // $header = substr($result, 0, $info['header_size']);
                        // $body = substr($result, -$info['download_content_length']);
                        // $status = strtok($header, "\\r\");


                        if( $result  === false){
                            echo "<br />ERROR OUTPUT:: <br />";
                            echo "cURL Error: " . curl_error($scprime);
                        }

                        if(curl_errno($scprime))
                        {
                            print curl_error($scprime);
                        }
                        else{

                            if($responseCode == "200")
                                echo "successful request <br />";

                            // echo " # download length : " . $downloadLength;

                            // curl_close($scprime);

                        }

                        fclose($fp);
                        curl_close($scprime);
                    }






                    if (false) {
                        /*
                        new InsertProduct(
                            $product_id,
                            $builder_id,
                            $product_name,
                            $part_number,
                            $builder,
                            $cat,
                            $description,
                            $image_url
                        );
                        */


                        // $fp = fopen("wneo_api_json.txt", "r");
                        // $file = file_get_contents("wneo_api_data.txt");
                        $file = file_get_contents("wneo_api_data.json");

                        $response = json_decode($file, true);


                        if ( $response !== null ) {

                        }
                        else {
                            $response = [];
                        }


                    }
                    else {
                        $response = [];
                    }

                ?>

                @foreach ($response as $item)
                    <div class="row mb-5 border-top">
                        <div class="col-auto">
                            {{ $item['id'] }}
                        </div>

                        <div class="col-auto">
                            <?php
                                if ( isset($item['acf']['part_number'] ) ) {
                                    echo $item['acf']['part_number'] ;
                                }
                            ?>
                        </div>

                        <div class="col">
                            <?php
                                if ( isset($item['acf']['name'] ) ) {
                                    echo $item['acf']['name'] ;
                                }
                            ?>
                        </div>

                        <div class="col">
                            <?php
                                if ( isset($item['acf']['builder'] ) ) {
                                    echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;
                                }
                            ?>
                        </div>

                        <div class="col-auto">
                            <?php
                                if ( isset($item['acf']['description'] ) ) {
                                    echo '"'.$item['acf']['description'].'"';
                                }
                            ?>
                        </div>

                        <div class="col">
                            <?php
                                if ( isset($item['acf']['category'] ) ) {
                                    // echo '"'.$item['acf']['description'].'"';

                                    foreach ($item['acf']['category'] as $key => $cat) {
                                        echo "> $cat <br />";
                                    }
                                }
                            ?>
                        </div>

                        <div class="col">
                            <?php
                                if ( isset($item['acf']['image'] ) ) {
                                    $image_url = $item['acf']['image']['url'];
                                    $image_url = str_replace('scapi', 'scadm', $image_url);
                                }
                                else {
                                    $image_url = '';
                                }
                            ?>

                            <img style="width: 300px;" src="{{ $image_url }}" alt="">
                            <br />

                            {{ $image_url }}

                        </div>
                    </div>
                @endforeach










            </div>
        </div>
    </div>








    <div class="row">
        <?php
            phpinfo();
        ?>
    </div>

    <div class="row">


    </div>









@endsection
