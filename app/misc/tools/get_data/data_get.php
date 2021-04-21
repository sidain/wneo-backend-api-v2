<?php

    // use \App\Models\_category;
    // include __DIR__.'/../../../test.php';
    // include __DIR__.'/../../../Models/_category.php';

    error_reporting(E_ALL); ini_set('display_errors', 1);

    $job_start = microtime(true);



    if ( false ) {
        $urlscpages = "https://selectconnectdev.com/scapi/wp-json/wp/v2/posts?per_page=80";
        $urlsc_ = "https://selectconnectdev.com/scapi/wp-json/acf/v3/posts?per_page=80&page=";

        $fp = fopen('data/wneo_data.data', 'w');

        $gh =  get_headers( $urlscpages, true);
        $total_pages = $gh['X-WP-TotalPages'];

        fwrite($fp, $total_pages."\n");
        echo "TOTAL PAGES:: $total_pages\n";


        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        for ($i=0; $i < $total_pages; $i++) {
            $start = microtime(true);

            $url = $urlsc_."$i";

            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);

            $time_elapsed_secs = microtime(true) - $start;

            fwrite($fp, $result."\n");
            fwrite($fp, "TIME ELAPSED($i)::".$time_elapsed_secs."\tCHARS WRITTEN::".strlen($result)."\n");

            echo "($i) TIME ELAPSED($i)::".$time_elapsed_secs."\tCHARS WRITTEN::".strlen($result)."\n";
        }

        curl_close($ch);
        fclose($fp);
    }

    $job_time_elapsed_secs = microtime(true) - $job_start;
    echo "\n\nJOB TIME ELAPSED:: $job_time_elapsed_secs\n\n";
?>
