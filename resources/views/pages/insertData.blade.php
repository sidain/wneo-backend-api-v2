<?php
    // use App\Models\_category;
?>

@extends('layouts.base')

@section('sidebar-menu')
    @include('partials.sideMenuDev1')
@endsection


@section('content1')
    <div class="row pl-5">
        <?php
            set_time_limit ( 0 );


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






















            if ( false ) {
                //$file = fopen(__DIR__ . '/file.txt', 'r');

                $sc_data_file = "data/wneo_data.data";
                $categories_file = "data/wneo_categories.data";
                $builders1_file = "data/wneo_builders1.data";
                $builders2_file = "data/wneo_builders2.data";
                $products_file = "data/wneo_products.data";
                $images_file = "data/wneo_images.data";
                $descriptions_file = "data/wneo_descriptions.data";

                $fp_sc_data=fopen($sc_data_file, 'r' );

                $fp_categories = fopen($categories_file, 'w');
                $fp_builders1 = fopen($builders1_file, 'w');
                $fp_builders2 = fopen($builders2_file, 'w');
                $fp_products = fopen($products_file, 'w');
                $fp_images = fopen($images_file, 'w');
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
                                $toStore = "<br />\n***INDEX => ($i)\t KEY=> $key\t ID=>".$item['id'].", ";






                                // categories
                                if (true && isset($item['acf']['category'] ) ) {
                                    $toStore = $toStore. "category,";
                                    // echo '"'.$item['acf']['description'].'"';

                                    foreach ($item['acf']['category'] as $key => $cat) {
                                        // echo "> $cat <br />";
                                        fwrite($fp_categories, $cat."\n");
                                    }
                                }






                                // builders 1
                                if (true && isset($item['acf']['builder'] ) ) {
                                    $toStore = $toStore. "builder1,";

                                    // echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;

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
                                if (true && isset($item['acf']['manufacturer'] ) && !isset($item['acf']['builder'] ) ) {
                                    $toStore = $toStore. "builder2,";

                                    // echo $item['acf']['builder']['ID']." ==> ".$item['acf']['builder']['post_title'] ;

                                    fwrite($fp_builders2, $item['id']."<>".$item['acf']['manufacturer']."\n");
                                }




                                // descriptions
                                if (true && isset($item['acf']['description'] ) && strlen($item['acf']['description']) > 0 ) {
                                    $toStore = $toStore. "description,";

                                    fwrite($fp_descriptions, $item['id']."<>".$item['acf']['description']."\n");
                                }






                                // images
                                if ( isset($item['acf']['image'] ) ) {
                                    if (  gettype( $image_url = $item['acf']['image'] )  === 'array' ) {
                                        $toStore = $toStore. "image,";

                                        $image_url = $item['acf']['image']['url'];
                                        $image_url = str_replace('scapi', 'scadm', $image_url);

                                        fwrite($fp_images, $image_url."\n");
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


                                //product
                                if (true && isset($item['acf']['name'] ) ) {
                                    $toStore = $toStore. "product,";

                                    $product = "";

                                    $product = $product."".$item['id']."<>";

                                    if ( isset($item['acf']['part_number'] ) ) {
                                        $product = $product.$item['acf']['part_number']."<>";
                                    }

                                    if ( isset($item['acf']['name'] ) ) {
                                        $product = $product.$item['acf']['name']."<>";
                                    }

                                    if ( isset($item['acf']['builder'] ) ) {
                                        $product = $product. $item['acf']['builder']['ID']."<>".$item['acf']['builder']['post_title']."<>" ;
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






                                echo $toStore."<br />\n";

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
                fclose( $fp_categories );
                fclose( $fp_descriptions );
                fclose( $fp_products );
                fclose( $fp_sc_data );
            }























            // categories
            if ( true  ) {
                // $fp_categories = fopen( "data/wneo_categories.data", 'r' );
                $fp_categories = fopen( "data\wneo_categories.data", 'r' );

                $categories =[];

                while ( ( $line = fgets($fp_categories) ) != false ) {
                    $categories[$line] = true;
                }

                fclose($fp_categories);



                $i = 0;
                ksort( $categories );

                echo "<a name='startofcategorys' href='#endofcategorys'>GOTO End of Categorys</a>";

                foreach ($categories as $key => $value) {
                    echo "".++$i." => $key<br />";

                    $_name = trim($key);

                    App\Models\_category::firstOrCreate( [ 'cat' => $_name ], [
                        'cat_id' => Str::uuid(),
                        'name' => $_name,
                        'cat_name' => $_name,
                        'cat_parent' => ''
                    ] );

                }

                echo "<a name='endofcategorys' href='#startofcategorys'>GOTO Start of Categorys</a>";
            }

            echo "<br />";
            echo "<br />**************<br />";
            echo "<br />";




            // builders
            if ( true  ) {
                $fp_builders1 = fopen( "data\wneo_builders1.data", 'r' );

                $builders1 =[];

                while ( ( $line = fgets($fp_builders1) ) != false ) {
                    $newArray = explode('<>', $line);

                    $builders1[ $newArray[1] ] = $newArray[0];
                }

                fclose($fp_builders1);



                $i = 0;
                ksort( $builders1 );

                echo "<a name='startofbuilders' href='#endofbuilders'>GOTO End of Builders</a>";

                foreach ($builders1 as $key => $value) {
                    echo "".++$i." => $key\t\t $value<br />";

                    $_name=trim( $key );
                    $_id = trim($value);

                    if ( $value > 0 ) {
                        App\Models\_builder::firstOrCreate( [ 'builder' => $_name ], [
                            'id' => $_id,
                            'builder_id' => $_id,
                        ] );
                    }
                }

                echo "<a name='endofbuilders' href='#startofbuilders'>GOTO Start of builders</a>";
            }

            echo "<br />";
            echo "<br />**************<br />";
            echo "<br />";







            // products
            if ( true  ) {
                $fp_products = fopen( "data\wneo_products.data", 'r' );

                // $db_cats = App\Models\_category::all();

                // $db_cats = App\Models\_category::where('id', 1)->first();

                // echo $db_cats->cat."<br />";
                // echo "<pre>";
                // echo print_r($db_cats, true)."<br />";
                // echo "</pre>";


                /*

                $t = $db_cats->select('cat_name', 'Anniversary')->get();

                echo "&&".print_r($t, true)."&&<br />";

                foreach ($db_cats as $key => $value) {
                    echo "<pre>";
                    echo "KEY $key => ".$value->cat_name.""."".print_r('', true)."\n<br />";
                    echo "</pre>";
                }
                */

                /*
                foreach ( App\Models\_category::all()  as $key => $value ) {
                    // echo "$key <br />";

                    echo $value->name."<br />";
                }
                */


                $i=0;

                $products =[];

                while ( ( $line = fgets($fp_products) ) != false ) {
                    $newArray = explode('<>', $line);

                    echo "***".print_r( $newArray, true )."<br /><br />";

                    // echo "<pre></pre>";
                    // echo "<pre></pre>";

                    // $builders1[ $newArray[1] ] = $newArray[0];

                    // echo "ID=> $newArray[0]\t PART_NUM=> $newArray[1]\t $newArray[2]\t $newArray[3]\t $newArray[4]\t $newArray[5]\t $newArray[6]\t  "."\n<br /><br />";

                    // App\Models\_category::firstOrCreate( [ 'cat' => $key ], [
                    //     'cat_id' => Str::uuid(),
                    //     'name' => $key,
                    //     'cat_parent' => ''
                    // ] );



                    // echo '<div class="row">';
                    //     foreach ($newArray as $key => $value) {
                    //         if( $key === 5){
                    //             $cats = unserialize($value);

                    //             echo '<div class="col">';
                    //                 foreach ($cats as $key => $value) {
                    //                     echo "> $value <br />";
                    //                 }
                    //             echo "</div>";

                    //         }else{
                    //             echo '<div class="col">';
                    //                 echo "$value";
                    //             echo "</div>";
                    //         }

                    //     }
                    // echo "</div>";


                    echo "*** ($i)<br />";
                    foreach ($newArray as $key => $value) {
                        if ( $key === 5) {
                            $value = unserialize($value);

                            echo "$key => ".print_r($value, true)."<br />";
                        }
                        else {
                            echo "$key => $value<br />";
                        }

                    }

                    echo "<br />";
                    echo "<br />";
                    echo "<br />";



                    $product_id = $newArray[0];
                    $part_number = $newArray[1];
                    $product_name = $newArray[2];
                    $builder_id = $newArray[3];
                    $builder = $newArray[4];
                    $catagorys = $newArray[5];
                    $image1 = $newArray[6];





                    if ( true ) {
                        $cats = unserialize($catagorys);
                        $cat_ids = [];

                        foreach ($cats as $key => $value) {
                            $cat = App\Models\_category::select('cat_name', 'cat_id')->where('cat_name', $value)->firstOrFail();

                            $cat_ids[] = $cat->cat_id;
                        }
                    }






                    App\Models\_product::updateOrCreate(
                        [ 'product_id' => $product_id ],
                        [
                            'part_number' => $part_number,
                            'builder_id' => $builder_id,

                            'name' => $product_name,
                            'product_name' => $product_name,
                            'image1' => $image1,

                            'categorys' => $cat_ids,
                        ]
                    );















                    $i++;

                    if( $i > 6400 ) break;
                }

                fclose($fp_products);



                // $i = 0;
                // ksort( $builders1 );

                // foreach ($builders1 as $key => $value) {
                //     echo "".++$i." => $key\t\t $value<br />";

                //     if ( $value > 0 ) {
                //         App\Models\_builder::firstOrCreate( [ 'builder' => $key ], [
                //             // 'id' => $value,
                //             'builder_id' => $value,
                //         ] );
                //     }
                // }
            }


















        ?>




    </div>









    <div class="row mt-5">
        <?php
            // phpinfo();
        ?>
    </div>











@endsection
