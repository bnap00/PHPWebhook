<?php
if(!empty($_GET)){
    if(isset($_GET['ClearTheStuff'])){
        $cdir = scandir("counter");
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    
                }
                else
                {
                    echo("<br />".$value.":-".fread(fopen($cdir.$value,"r"),20));
                    unlink("./counter/".$value);
                    
                }
            }
        }
    } else {
        foreach(array_keys($_GET) as $key){
            $counter_file = "./counter/".$key;
            if ( ! file_exists( $counter_file ) ) {
                if ( ! ( $handle = fopen( $counter_file, 'w' ) ) ) {
                    die( 'Cannot create the counter file.' );
                } else {
                    fwrite( $handle, 1 );
                    fclose( $handle );
                }
            } else {
                $handle = fopen( $counter_file, 'r' );
                $counter = ( int ) fread( $handle, 20 );
                fclose( $handle );
                $counter++;
                echo '<p>Visited count: '.$counter. '</p>';
                
                if ( ! ( $handle = fopen( $counter_file, 'w' ) ) ){
                    die( "Can't write" );
                }
                
                fwrite( $handle, $counter );
                fclose( $handle );   
            }   
        }
    }
} else {
    $cdir = scandir("counter");
    foreach ($cdir as $key => $value)
    {
        if (!in_array($value,array(".","..")))
        {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
            {
                
            }
            else
            {
                $handle = fopen("./counter/".$value,"r");
                echo("<br />".$value.":-".fread($handle,20));
                fclose($handle);
            }
        }
    }
}
?>