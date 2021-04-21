<?php

    error_reporting(E_ALL); ini_set('display_errors', 1);
    $job_start = microtime(true);


    //setup PDO

    $db_host = "mysql";      //dev
    $db_name = "wneov2laravel";
    $user = "wneo_laravel";
    $pw = "wneo_laravel3321";

    // $db_charset = 'utf8mb4';
    // $db_host = "127.0.0.1";     //live

    $db_charset = 'utf8';

    // $db_host = getenv('DB_HOST', '127.0.0.1');
    // $db_name = getenv('DB_DATABASE', 'wneov2laravel');
    // $user = getenv('DB_USERNAME', 'wneo_laravel');
    // $pw = getenv('DB_PASSWORD', 'wneo_laravel3321');



    // $dsn = "mysql:dbname=$db_name;host=$db_host";
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";

    var_dump($db_host);
    var_dump($dsn);

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    try {
        // $pdo = new PDO( $dsn, $user, $pw, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'') );
        $pdo = new PDO($dsn, $user, $pw, $options);

    } catch (\PDOException  $e) {
        echo 'Connection failed: ' . $e->getMessage()."\n";
        die();
    }


    $setup= [
        'cats' => false,
        'builders' => false,
        'products' => true,
        'p-cats' => true,
        'p-images' => true,
        'p-insert' => true,
        'images' => true,
    ];

    /*
    $setup= [
        'cats' => true,
        'builders' => true,
        'products' => true,
        'p-cats' => true,
        'p-images' => true,
        'p-insert' => true,
        'images' => true,
    ];
    */






    // die();




    // categories
    if ( $setup['cats']  ) {
        echo "*** CATEGORIES \n";

        // $fp_categories = fopen( "data/wneo_categories.data", 'r' );
        $fp_categories = fopen( "data/wneo_categories.data", 'r' );

        $categories =[];

        while ( ( $line = fgets($fp_categories) ) != false ) {
            $categories[$line] = true;
        }

        fclose($fp_categories);

        $pdo->query("truncate _categories");



        $i = 0;
        ksort( $categories );

        foreach ($categories as $key => $value) {
            $i = $i +1;
            $_name = trim($key);
            $_id = bin2hex(random_bytes(16));

            echo "$i =>\t $_id =>\t $_name\n";

            $sql = "insert into _categories( cat_id, cat_name, name, cat_parent, cat, created_at, updated_at ) values(?,?,?,?,?, now(), now() ) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_id,
                $_name,
                $_name,
                '',
                $_name,
            ]);
        }
    }


    // builders
    if ( $setup['builders']  ) {
        echo "*** BUILDERS \n";

        $fp_builders1 = fopen( "data/wneo_builders1.data", 'r' );

        $builders1 =[];

        while ( ( $line = fgets($fp_builders1) ) != false ) {
            $newArray = explode('<>', $line);

            $builders1[ $newArray[1] ] = $newArray[0];
        }

        fclose($fp_builders1);


        $pdo->query("truncate _builders");

        //2020-12-16 04:58:40

        $i = 0;
        ksort( $builders1 );

        foreach ($builders1 as $key => $value) {
            $i = $i +1;
            $_name=trim( $key );
            $_id = trim($value);

            echo  "$i =>\t $_id =>\t $_name\n";

            $sql = "insert into _builders( id, builder_id, builder, created_at,updated_at) values(?,?,?, now(), now()) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_id,
                $_id,
                $_name,
            ]);
        }
    }


























    // products
    if ( $setup['products'] ) {
        echo "*** PRODUCTS \n";
        $fp_products = fopen( "data/wneo_products.data", 'r' );
        $fp_images1 = fopen( "data/wneo_dl_images.data", 'w' );
        $fp_product_log = fopen( "data/wneo_products_log.data", 'w' );

        $i=0;

        $products =[];


        $id=1;
        // $sql = "select * from _products where id= ? ";
        $sql = "select * from _products where id= :id ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([ 'id'=> $id ]);
        $row= $stmt->fetch();

        echo "***RESULTS\t => \n".print_r($row, true)."\n";


        // $arr = [1,2,3];
        // $in  = str_repeat('?,', count($arr) - 1) . '?';
        // $sql = "SELECT * FROM table WHERE column IN ($in)";
        // $stm = $db->prepare($sql);
        // $stm->execute($arr);
        // $data = $stm->fetchAll();

        error_log("\n\n\n");



        $pdo->query("truncate _products");
        $pdo->query("truncate _images");



        while ( ( $line = fgets($fp_products) ) != false ) {
            $newArray = explode('<>', $line);

            echo "\n\n\n*** exploded Line($i)\t".""."\n";


            //product explode
            foreach ($newArray as $key => $value) {
                if ( $key === 5) {
                    $value = unserialize($value);

                    echo "$key => ".print_r($value, true)."\n";
                }
                else {
                    echo "$key => '$value'\n";
                }
            }

            echo "\n\n\n";



            $product_id =       trim($newArray[0]);
            $part_number =      trim($newArray[1]);
            $product_name =     trim($newArray[2]);

            // $builder_id =       trim($newArray[3]);
            $builder_id =       trim($newArray[3]);
            $builder_id =       is_numeric($builder_id) ? $builder_id : 0;

            $builder =          trim($newArray[4]);
            $catagorys =        trim($newArray[5]);
            $image1 =           trim($newArray[6]);
            $image1_id =         '';





            // category translate to id
            if ( $setup['p-cats'] ) {
                echo "*** PRODUCT => CATEGORIES \n";

                $cats = unserialize($catagorys);

                $in  = str_repeat('?,', count($cats) - 1) . '?';
                $sql ="select cat_id from _categories where cat_name in ($in)";
                $stmt1 = $pdo->prepare($sql);
                $stmt1->execute($cats);
                $p_c_results = $stmt1->fetchAll(PDO::FETCH_NUM);

                $sql ="select categorys_json from _builders where builder_id like ? ";
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute( array($builder_id) );
                $b_c_results1 = $stmt2->fetchColumn();
                $b_c_results2 = json_decode($b_c_results1);
                // $b_c_results = $stmt2->fetchAll(PDO::FETCH_NUM);

                print_r("RESULTS BUILDER CATS 1\n".$b_c_results1."\n\n");
                print_r("RESULTS BUILDER CATS 2\n".$b_c_results2."\n\n");

                $cat_ids = [];

                foreach ($p_c_results as $key => $cat_id) {
                    $cat_ids[] = $cat_id[0];

                    // echo "$key => $cat_id[0] \n";

                    // die();
                }

                // $cat_ids = "[\"".implode("\",\"", $cat_ids )."\"]";

                // print_r("PROCESSED CAT IDS\n".$cat_ids."\n\n");
                print_r($cat_ids)."\n\n";
                print_r(json_encode($cat_ids))."\n\n";

                // BUILDER
                // {"404fc904140a5e3846c54ea2f353ddd4":1,"378db48ebe58b6321b447230d4ebb254":1,"550c5a2441688fc2b182721397c6dce9":1}

                // PRODUCT
                // ["9aa2bf047e389d93d8ec7b6a6f5dbcbf","99ff55d802038a54d068b40bbfb7f500","7f47228f7feb68b806a74a4b8f8a171d","80526366090a551af2ca3285a267e761","54ce695b971e07bea443644d4e4a41e2"]

                die();
            }


            // image1, get image, make new image
            if ( $setup['p-images'] ) {
                echo "*** PRODUCT => IMAGES \n";

                $fileParts = explode("/", $image1 );
                $image_name_parts = explode(".", $fileParts[6] );

                $image_id = bin2hex(random_bytes(16));
                $image1_id = $image_id;
                $image_name = trim($image_name_parts[0]);
                $image_source = trim($image1);
                $image_builder_id = trim($builder_id);
                $image_extension = trim( $image_name_parts[1] );

                // echo "*** FILEPARTS \t => \n".print_r($fileParts, true)."\n";
                // echo "*** IMAGE_NAME_PARTS \t => \n".print_r($image_name_parts, true)."\n";




                $dir_array = explode("/", __DIR__);

                $dir1 = implode("/", array(
                    $dir_array[1],
                    $dir_array[2],
                    $dir_array[3],
                    // $dir_array[4],  //live
                    // $dir_array[5],  //live
                    // $dir_array[6],  //live
                    "storage",
                    "app",
                    "public",
                    "products",
                ) );

                $dir1 = "/$dir1/$image_builder_id";

                $dir2 = implode("/", array(
                    "storage",
                    "products",
                    $image_builder_id,
                    $image_name
                ) );

                // $dir1 = "/$dir1/$image_builder_id";

                echo "*** __DIR__ => ".__DIR__."\n";
                echo "*** DIR1 => ".$dir1."\n";
                // echo "*** DIR EXISTS => '".is_dir($dir1)."'\n";

                if ( !is_dir($dir1) ) {
                    mkdir($dir1, 0777, true);
                }

                //write to image download file
                fwrite($fp_images1, "$image_name.$image_extension<>$image_source<>$dir1<>$image_builder_id\n");


                $sql = "insert into _images(image_id, image_name, image_source, image_path, image_url, image_builder_id, image_extension, created_at, updated_at ) values(?,?,?,?,?,?,?,now(),now() )";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $image_id,
                    "$image_name.$image_extension",
                    $image_source,
                    $dir1,  // image_path
                    "$dir2.$image_extension",  // image_url
                    $image_builder_id,
                    $image_extension,
                    // created_at
                    // updated_at
                ]);

            }





            if ( $setup['p-insert'] ) {
                echo "*** PRODUCT => DB_INSERT \n";

                $sql="insert into _products(product_id, part_number, builder_id, name, product_name, image1_id, categorys_json, created_at, updated_at) values (?,?,?,?,?,?,?, now(), now() )";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    $product_id,
                    $part_number,
                    $builder_id,
                    $product_name,
                    $product_name,
                    $image1_id,
                    $cat_ids,
                ]);

                fwrite($fp_product_log, "$i<>$product_id<>$product_name<>$builder\n");
            }




            $i++;

            // if( $i > 0 ) break;
        }



        fclose($fp_products);
        fclose($fp_images1);
        fclose($fp_product_log);
    }


    //images, download them
    if ( $setup['images'] ) {
        echo "*** IMAGES \n";

        function generate_thumbnail($file, $path, $new_file): bool
        {
            $image = wp_get_image_editor($file);

            if (!is_wp_error($image)) {
                $image->resize(300, 300, true);
                $image->set_quality(60);

                if (!file_exists($path)) {
                    wp_mkdir_p($path);
                }

                $image->save($path . $new_file);

                return true;
            }

            foreach ($image->get_error_messages() as $key => $value) {
                Debug::admin_log($key . ' ' . $value);
            }

            return false;
        }



        function retryFetchImage($path, $source, $try = 1)
        {
            sleep(1);

            error_log('Failed to fetch image on attempt number ' . $try."\n");

            $imageFetch = file_get_contents($source);

            if (false !== $imageFetch || 3 === $try) {
                $name = basename($path);
                file_put_contents($path, $imageFetch);
                echo "*** File downloaded successfully, $name, try $try\n";
                return;
            }

            $try++;
            retryFetchImage($path, $source, $try);
        }





        $i = 0;
        $fp_images1 = fopen( "data/wneo_dl_images.data", 'r' );
        echo "***PROCESS IMAGES DL FILE\n";

        while ( ( $line = fgets($fp_images1) ) != false ) {
            $newArray = explode('<>', $line);

            $image_name = trim($newArray[0]);
            $image_source = trim($newArray[1]);
            $image_path = trim($newArray[2]);
            $image_builder_id = trim($newArray[3]);

            // echo "***\n".print_r($newArray, true)."\n\n\n";

            $file = "$image_path/$image_name";

            // echo "\n***$i \t<>file\t<>$file\n";
            // echo "\n***$i \t<>image_source\t<>$image_source\n";

            if ( file_exists($file)   ) {
                echo "*** FILE($i) EXISTS, SKIPPING \n<> IMAGE_NAME =>$image_name, \n<> FILE =>$file\n";
            }else{


                if (file_put_contents($file, file_get_contents($image_source))) {
                    echo "*** File($i) DOWNLOADED SUCCESSFULLY, $image_name, $file, $image_builder_id\n";
                } else {
                    // echo "*** File downloading failed.";
                    retryFetchImage($file, $image_source);
                }





            }

            $i++;
            // if( $i > 1000 ) break;
        }

        fclose($fp_images1);

    }











    $pdo = null;

    $job_time_elapsed_secs = microtime(true) - $job_start;
    echo "\n\nJOB TIME ELAPSED:: $job_time_elapsed_secs\n\n";
?>
