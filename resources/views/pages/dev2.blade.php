@extends('layouts.base')

@section('content1')

    <div>
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
        <br />
        {{-- http://localhost:8010/api/v1/products?page[number]=1&page[size]=80 --}}
        <a target="_blank" href="http://localhost:8010/api/v1/products?page[number]=1&page[size]=80">http://localhost:8010/api/v1/products?page[number]=1&page[size]=80</a>
        <br />
        <br />
        <br />

    </div>

    <div class="row">
        <div class="col">
            <h1>LIVE API</h1>

            <div class="text-break">
                <?php
                    // $url1 = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=0";
                    // $url1 = "https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80";
                    // $url1 = "127.0.0.1:9000";
                    $url1 = "http://localhost:9000/api/v1/builders/";
                    //content-type: application/vnd.api+json


                    // 1. initialize
                    $ch1 = curl_init();

                    // // 2. set the options, including the url
                    // curl_setopt($ch1, CURLOPT_URL, "http://www.nettuts.com");

                    curl_setopt($ch1, CURLOPT_URL, $url1);
                    curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
                    // curl_setopt($ch1, CURLOPT_HEADER, 1);
                    // curl_setopt($ch1, CURLOPT_POST, 1);
                    // curl_setopt($ch1, CURLOPT_GET, 1);

                    // // 3. execute and fetch the resulting HTML output
                    $output = curl_exec($ch1);

                    echo "OUTPUT:: <br />";

                    // echo "<pre>";
                    // echo $output;
                    print_r($output);
                    // echo "</pre>";
                    // var_dump($output);

                    if( $output === false){
                        echo "<br />ERROR OUTPUT:: <br />";
                        echo "cURL Error: " . curl_error($ch1);

                    }

                    // // 4. free up the curl handle
                    curl_close($ch1);





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
                    $url2 = "http://localhost:8010/api/v1/builders/1";
                    // $url2 = "https://selectconnectdev.com/app/api/v1/builders/";

                    $ch2 = curl_init();

                    curl_setopt($ch2, CURLOPT_URL, $url2);
                    curl_setopt($ch2, CURLOPT_FAILONERROR, true);
                    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);

                    $result = curl_exec($ch2);

                    echo $result;


                    if( $result  === false){
                        echo "<br />ERROR OUTPUT:: <br />";
                        echo "cURL Error: " . curl_error($ch2);
                    }

                    curl_close($ch2);


































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



    <div class="row">
        <?php
            // phpinfo();
        ?>
    </div>











@endsection
