<?php

    // use \App\Models\_category;
    // include __DIR__.'/../../../test.php';
    // include __DIR__.'/../../../Models/_category.php';

    error_reporting(E_ALL); ini_set('display_errors', 1);

    $job_start = microtime(true);



    //$file = fopen(__DIR__ . '/file.txt', 'r');

    //intial data files
    $sc_data_file = "data/wneo_data.data";
    $categories_file = "data/wneo_categories.data";
    $builders1_file = "data/wneo_builders1.data";
    $builders2_file = "data/wneo_builders2.data";
    $builders3_file = "data/wneo_builders3.data";
    $products_file = "data/wneo_products.data";
    $images1_file = "data/wneo_images1.data";
    $images2_file = "data/wneo_images2.data";
    $descriptions_file = "data/wneo_descriptions.data";



    if ( 1 ) {
        $fp_sc_data=fopen($sc_data_file, 'r' );

        $fp_categories = fopen($categories_file, 'w');
        $fp_builders1 = fopen($builders1_file, 'w');
        $fp_builders2 = fopen($builders2_file, 'w');
        $fp_builders3 = fopen($builders3_file, 'w');
        $fp_products = fopen($products_file, 'w');
        $fp_images1 = fopen($images1_file, 'w');
        $fp_images2 = fopen($images2_file, 'w');
        $fp_descriptions = fopen($descriptions_file, 'w');
        // fwrite($fp, $result."\n");

        /**
         * 1. first line has page count
         *
         * 2. next line json data, 0-79 index
         *
         * 3. next line has fetch data
         *
         * repeat  2 and 3
         *
         */

        //if file open worked
        if( $fp_sc_data ){
            $i=1;

            //first line has page count
            $line = fgets($fp_sc_data);
            $pages = (int)$line;
            echo "PAGES::: ".$line."\n";

            // loop through fetch data here, line by line
            while ( ( $line = fgets($fp_sc_data) ) != false ) {

                //loop through json data here
                // if ( ( $line = fgets($fp_sc_data) ) != false ) {
                if ( true ) {
                    $json = json_decode($line, true);

                    foreach ($json as $key => $item) {
                        $toStore = "***INDEX => ($i)\t KEY=> $key\t ID=>".$item['id'].", ";





                        // categories
                        if ( isset($item['acf']['category'] ) ) {
                            $toStore = $toStore. "category,";
                            // echo '"'.$item['acf']['description'].'"';

                            foreach ($item['acf']['category'] as $key => $cat) {
                                // echo "> $cat <br />";
                                fwrite($fp_categories, $cat."\n");
                            }
                        }






                        // builders 1
                        if (
                            isset($item['acf']['builder'] )  &&
                            isset($item['acf']['builder']['ID'] ) &&
                            isset($item['acf']['builder']['post_title'] )
                        ) {

                            $toStore = $toStore. "builder1,";

                            // $builderString = '';

                            // echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;

                            //* error on empty, ex 108989

                            // if ( isset($item['acf']['builder']['ID'] ) ) {
                            //     $product = $product. $item['acf']['builder']['ID']."<>";
                            // }
                            // else{
                            //     $product = $product.""."<>";

                            // }

                            // if ( isset($item['acf']['builder']['post_title'] ) ) {
                            //     $product = $product. $item['acf']['builder']['post_title']."<>" ;
                            // }
                            // else{
                            //     $product = $product.""."<>";
                            // }

                            fwrite($fp_builders1, $item['acf']['builder']['ID']."<>".$item['acf']['builder']['post_title']."\n");
                        }








                        // builders 2
                        /*
                        ***Array
                        (
                            [id] => 257305
                            [acf] => Array
                                (
                                    [manufacturer] => Yoder's Home Upholstery
                                    [logo] => https://selectconnectdev.com/scapi/wp-content/uploads/yoders-home-upholstery-logo.jpg
                                    [address] => Array
                                        (
                                            [street_address] => 2000 US-62
                                            [city] => Wilmot
                                            [state] => Ohio
                                            [zip_code] => 44689
                                            [phone_number] => 3303590857
                                            [country] => United States
                                        )

                                )

                        )
                        */


                        // builders 2
                        if ( isset($item['acf']['manufacturer'] ) && !isset($item['acf']['builder'] ) ) {
                            $toStore = $toStore. "builder2,";

                            // echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;

                            fwrite($fp_builders2, $item['id']."<>".$item['acf']['manufacturer']."\n");
                        }




                        // builders 3
                        if ( isset($item['acf']['manufacturer'] )  ) {
                            $toStore = $toStore. "builder3,";

                            $b_b_id = isset($item['acf']['builder']['ID'] ) ? $item['acf']['builder']['ID'] :  0;



                            // echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;

                            fwrite($fp_builders3, "$b_b_id<>".$item['acf']['manufacturer']."\n");
                        }











                        // descriptions
                        if ( isset($item['acf']['description'] ) && strlen($item['acf']['description']) > 0 ) {
                            $toStore = $toStore. "description,";

                            fwrite($fp_descriptions, $item['id']."<>".$item['acf']['description']."\n");
                        }






                        // images1
                        if ( isset($item['acf']['image'] ) ) {
                            if (  gettype( $image_url = $item['acf']['image'] )  === 'array' ) {
                                $toStore = $toStore. "image1,";

                                $image_url = $item['acf']['image']['url'];
                                $image_url = str_replace('scapi', 'scadm', $image_url);

                                fwrite($fp_images1, $image_url."\n");
                            } else{

                                //error_log( "\n<br />IMAGE TYPE VALUE ".gettype( $item['acf']['image'] )."<br />\n" );
                                //error_log( "\n<br />".print_r( $item['acf']['image'], true )."<br />\n" );


                                // echo "<br />";
                                // echo "<br />";
                                // echo "\n<br />nIMAGE TYPE VALUE ".gettype( $item['acf']['image'] )."<br />\n";
                                // echo "\n<br />".print_r( $item['acf']['image'], true )."<br />\n";
                                // echo "<br />";
                                // echo "<br />";
                            }
                        }
                        else {
                            $image_url = '';
                        }



                        // images2
                        if (
                            isset($item['acf']['image'] )

                        ) {
                            if (  gettype( $image_url = $item['acf']['image'] )  === 'array' ) {
                                $toStore = $toStore. "image2,";

                                $image_b_id = isset($item['acf']['builder']['ID'] ) ? $item['acf']['builder']['ID'] :  0;

                                $image_url = $item['acf']['image']['url'];
                                $image_url = str_replace('scapi', 'scadm', $image_url);

                                fwrite($fp_images2, $image_b_id."<>".trim($image_url)."\n");
                            } else{
                                // fwrite($fp_images2, "NAN<>".trim($item['acf']['image'])."\n");
                            }
                        }




                        //product
                        if ( isset($item['acf']['name'] ) ) {
                            $toStore = $toStore. "product,";

                            $product = "";

                            $product = $product."".$item['id']."<>";

                            if ( isset($item['acf']['part_number'] ) ) {
                                $product = $product.$item['acf']['part_number']."<>";
                            }
                            else{
                                $product = $product.""."<>";
                            }



                            if ( isset($item['acf']['name'] ) ) {
                                $product = $product.$item['acf']['name']."<>";
                            }
                            else{
                                $product = $product.""."<>";
                            }



                            if ( isset($item['acf']['builder'] ) ) {
                                //* error on empty

                                if ( isset($item['acf']['builder']['ID'] ) ) {
                                    $product = $product. $item['acf']['builder']['ID']."<>";
                                }
                                else{
                                    $product = $product.""."<>";

                                }

                                if ( isset($item['acf']['builder']['post_title'] ) ) {
                                    $product = $product. $item['acf']['builder']['post_title']."<>" ;
                                }
                                else{
                                    $product = $product.""."<>";
                                }


                                //$product = $product. $item['acf']['builder']['ID']."<>".$item['acf']['builder']['post_title']."<>" ;
                            }else{
                                $product = $product.""."<><>";
                            }


                            /*
                            if ( isset($item['acf']['manufacturer'] ) ) {
                                $product = $product. $item['acf']['id']."<>".$item['acf']['manufacturer']['post_title']."<>" ;
                            }
                            */



                            if ( isset($item['acf']['category'] ) ) {
                                $cats = serialize( $item['acf']['category'] );

                                $product = $product.$cats."<>";

                                // echo '"'.$item['acf']['description'].'"';

                                /*
                                foreach ($item['acf']['category'] as $key => $cat) {
                                    echo "> $cat <br />";
                                }
                                */
                            }
                            else{
                                $product = $product.""."<>";
                            }


                            /*
                            if ( isset($item['acf']['description'] ) ) {
                                $product = $product.$item['acf']['description']."<>";
                            }
                            */






                            if ( isset($item['acf']['image'] ) ) {
                                if (  gettype( $image_url = $item['acf']['image'] )  === 'array' ) {
                                    $image_url = $item['acf']['image']['url'];
                                    $image_url = str_replace('scapi', 'scadm', $image_url);
                                }
                                else{
                                    $image_url = '';
                                }

                                $product = $product.$image_url."";
                            }
                            else {
                                $image_url = '';

                                $product = $product.$image_url."";
                            }



                            fwrite($fp_products, $product."\n");
                        }






                        echo $toStore."\n";

                        $i++;
                    }

                }

                $line = fgets($fp_sc_data);
                $pages= $pages-1;

                echo "**************************************************\n";
                echo "$line";
                echo "PAGE=>".$pages."\n";
                echo "**************************************************\n";
            }

        }

        fclose( $fp_builders1 );
        fclose( $fp_builders2 );
        fclose( $fp_builders3 );
        fclose( $fp_categories );
        fclose( $fp_descriptions );
        fclose( $fp_products );
        fclose( $fp_sc_data );
    }


    //extra sorting
    if ( true ) {
        $_categories1_file = "data/_categories.data";

        $_builders1_file = "data/_builders1.data";
        $_builders2_file = "data/_builders2.data";
        $_builders3_file = "data/_builders3.data";

        $_builders1_alt_file = "data/_builders1_alt.data";
        $_builders2_alt_file = "data/_builders2_alt.data";
        $_builders3_alt_file = "data/_builders3_alt.data";













        //categories
        if ( true ) {
            $fp_categories = fopen($categories_file, 'r');
            $fp__categories = fopen($_categories1_file, 'w');


            $categories =[];

            while ( ( $line = fgets($fp_categories) ) != false ) {
                $categories[$line] = true;
            }

            fclose($fp_categories);



            foreach ($categories as $cat => $value) {
                fwrite($fp__categories, $cat."");
            }

            fclose($fp__categories);
        }











        //builders1
        if ( true ) {
            $fp_builders1 = fopen($builders1_file, 'r');
            $fp__builders1 = fopen($_builders1_file, 'w');


            $builders1 =[];

            while ( ( $line = fgets($fp_builders1) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                $builders1[$b_id] = $b_name;
            }

            fclose($fp_builders1);



            ksort($builders1);

            foreach ($builders1 as $key => $value) {
                fwrite($fp__builders1, "$key<>$value\n");
            }

            fclose($fp__builders1);
        }

        //builders2
        if ( true ) {
            $fp_builders2 = fopen($builders2_file, 'r');
            $fp__builders2 = fopen($_builders2_file, 'w');


            $builders2 =[];

            while ( ( $line = fgets($fp_builders2) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                $builders2[$b_id] = $b_name;
            }

            fclose($fp_builders2);



            ksort($builders2);

            foreach ($builders2 as $key => $value) {
                fwrite($fp__builders2, "$key<>$value\n");
            }

            fclose($fp__builders2);
        }

        //builders3
        if ( false ) {
            $fp_builders3 = fopen($builders3_file, 'r');
            $fp__builders3 = fopen($_builders3_file, 'w');


            $builders3 =[];

            while ( ( $line = fgets($fp_builders3) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                $builders3[$b_id] = $b_name;
            }

            fclose($fp_builders3);



            ksort($builders3);

            foreach ($builders3 as $key => $value) {
                fwrite($fp__builders3, "$key<>$value\n");
            }

            fclose($fp__builders3);
        }









        //builders1
        if ( true ) {
            $fp_builders1 = fopen($builders1_file, 'r');
            $fp__builders1 = fopen($_builders1_alt_file, 'w');


            $builders1 =[];

            while ( ( $line = fgets($fp_builders1) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                // $builders1[$b_id] = $b_name;
                $builders1[$b_name] = $b_id;
            }

            fclose($fp_builders1);



            ksort($builders1);

            foreach ($builders1 as $key => $value) {
                fwrite($fp__builders1, "$value<>$key\n");
            }

            fclose($fp__builders1);
        }

        //builders2
        if ( true ) {
            $fp_builders2 = fopen($builders2_file, 'r');
            $fp__builders2 = fopen($_builders2_alt_file, 'w');


            $builders2 =[];

            while ( ( $line = fgets($fp_builders2) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                $builders2[$b_name] = $b_id;
            }

            fclose($fp_builders2);



            ksort($builders2);

            foreach ($builders2 as $key => $value) {
                fwrite($fp__builders2, "$value<>$key\n");
            }

            fclose($fp__builders2);
        }

        //builders3
        if ( false ) {
            $fp_builders3 = fopen($builders3_file, 'r');
            $fp__builders3 = fopen($_builders3_alt_file, 'w');


            $builders3 =[];

            while ( ( $line = fgets($fp_builders3) ) != false ) {
                $b = explode("<>", $line);

                $b_id = trim($b[0]);
                $b_name = trim($b[1]);


                $builders3[$b_name] = $b_id;
            }

            fclose($fp_builders3);



            ksort($builders3);

            foreach ($builders3 as $key => $value) {
                fwrite($fp__builders3, "$value<>$key\n");
            }

            fclose($fp__builders3);
        }


    }



    $job_time_elapsed_secs = microtime(true) - $job_start;
    echo "\n\nJOB TIME ELAPSED:: $job_time_elapsed_secs\n\n";
?>
