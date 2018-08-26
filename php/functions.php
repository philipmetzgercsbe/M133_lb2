    <?php
    /**
     * Created by PhpStorm.
     * User: vmadmin
     * Date: 26.08.2018
     * Time: 15:52
     */
    function isPost(){
        $_SERVER['REQUEST_METHOD'] == 'post'?true:false;
    }

    function isGet(){
        $_SERVER['REQUEST_METHOD'] == 'get'?true:false;
    }
    function minLength ($val,$minLength){
        if($val<=$minLength){
            return false;
        }else{
            return true;
        }


    }
    function maxLength($val,$maxLength){
        if($val>=$maxLength){
            return false;
        }else{
            return true;
        }
    }

    /**
     * @param string $name Reads Name out of $_GET[]
     */
    function loadFile ($name){
        if(isset($_GET[$name])) {
            $handle = fopen($name, 'r');
            $values = [];
            $values[] = json_decode(fread($handle, filesize($name)));
            for ($i = 0; $i < count($values); $i++) {
                //Add values to DOM Elements
                $_POST['hobby'] = $values[$i];
                $_POST['vehicle'] = $values[$i];
                $_POST['gender'] = $values[$i];
                $_POST['favDrink'] = $values[$i];
            }
        }else{
            //load values into HTML here with JS or something else
            echo '<script>customMessage("Values couldn\'t be loaded","The File is empty",false); </script>';
        }
        echo '<script>customMessage("File was successfully loaded","You can see your values now",true); </script>';
    }
    function createDir($dirname){
        if(!is_dir(dirname('../' .$dirname)) ){
            mkdir('../' . $dirname);

        }else{
            echo '<script>customMessage("Directory already exists","Directory already exists",false) </script>';
        }

    }
    /**
     * @param string $dir Requires the Name of the Directory in which the File will be saved
     * @param string $name  Name of the File Example: M133
     * @param array $option With which option the file should get created
     * @param array $fileEnd A Array in which u can choose the Files datatype
     */
    function saveFile ($dir ,  $name, array $option = ['w','r','x'], $fileEnd = array('json','text'))
    {
        if ($dir == null || empty($dir) || $dir == "") {
            $dir = '../saves/';
        }
        $hbn = $_POST['hobby'];
        $vehicle = $_POST['vehicle'];
        $genderval = $_POST['gender'];
        $drink = $_POST['favDrink'];
        $data[] = array('hobby' => $hbn, 'vehicle' => $vehicle, 'gender' => $genderval, 'favDrink' => $drink);
        $filename = fopen($dir . $name . $fileEnd, $option) or die('File couldn\'t be accessed');
        fwrite($filename, json_encode($data)) or die('An Error occured, couldn\'t write data to file');
        $val = count(glob(dir('../saves')("*.json"))) + 1;
        $val++;
    }