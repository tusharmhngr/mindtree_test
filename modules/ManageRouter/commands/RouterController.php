<?php

/**
 * RouterController controller
 * @author  Tushar Mahangare
 * @date 11 july 2020
 */

namespace app\modules\ManageRouter\commands;

use yii;
use yii\base\Exception;
use yii\console\Controller;
use yii\console\ExitCode;
use app\modules\ManageRouter\models\Router;

class RouterController extends Controller {

    public $number_of_records=0;
    public $sapid='';
    public $hostname='';
    public $ip_address='';
    public $mac_address='';


    public function actionSave($number_of_records) {
        
        $this->number_of_records=$number_of_records;
        if($this->number_of_records == 0 || !is_numeric($this->number_of_records)){
            echo 'please enter numeric value';
        }else{
            echo 'you have entered '. $this->number_of_records.' go ahead'.'\n';

            for ($i=1; $i<=$this->number_of_records ; $i++) {

                // $sapid=$hostname=$ip_address=$mac_address='';
                echo " \n". " Please enter sapid for $i record  : ";
                fscanf(STDIN, "%d\n", $this->sapid); 
                echo " \n". "Please enter hostname  for $i record : ";
                fscanf(STDIN, "%d\n", $this->hostname);
                echo " \n". "Please enter Loopback(ipv4)  for $i record : ";
                fscanf(STDIN, "%d\n", $this->ip_address);
                echo " \n". "Please enter Mac Address  for $i record : ";
                fscanf(STDIN, "%d\n", $this->mac_address);

                echo $this->sapid;
                echo $this->hostname;
                echo $this->ip_address;
                echo $this->mac_address;
                die('adadada');
                $routerModel=new Router();
                $routerModel->sapid=$sapid;
                $routerModel->hostname=$hostname;
                $routerModel->ip_address=$ip_address;
                $routerModel->mac_address=$mac_address;

                if($routerModel->save()){
                    echo "\n". "$i recrord inserted succesfully ";
                }else{
                    echo "\n". "$i recrord insertion failed !!";


                    echo '<pre>';print_r($routerModel->getErrors());die; ;
                }
                // echo "Answer for $i st iteration: " .($value1 + $value2) . "\n";
            }


            
        }
    }

    public function actionCreate($sapid,$hostname,$ip_address,$mac_address){
        echo "\n"."sapid = ".$sapid;
        echo "\n"."hostname = ".$hostname;
        echo "\n"."ip address =  ".$ip_address;
        echo "\n"."mac address = ".$mac_address;
        $routerModel=new Router();
        $routerModel->sapid=$sapid;
        $routerModel->hostname=$hostname;
        $routerModel->ip_address=$ip_address;
        $routerModel->mac_address=$mac_address;
        $routerModel->created_from='console';

        $exists = Router::find()
        ->where(['sapid' => $sapid])
        ->andWhere(['hostname'=> $hostname])
        ->andWhere(['ip_address'=> $ip_address])
        ->andWhere(['mac_address'=> $mac_address])
        ->andWhere(['is_active'=> 1])
        ->exists();

        if (empty($exists)) {
            if($routerModel->save()){
            echo "\n". " recrord inserted succesfully ";
            }else{
                echo "\n". " recrord insertion failed !!";
                echo '<pre>';print_r($routerModel->getErrors());die; ;
            }
        }else{
             echo "\n". " This router details already exists ";
        }

       
    }

    
}