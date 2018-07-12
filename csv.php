<?php
class csv extends mysqli
{
    private $state_csv= false;
    public  function __construct()
    {
        parent::__construct("localhost","root","","csv");
        if ($this->connect_error) {
            echo "Fail to connect to database:". $this-> connect_error;
        }
    }
    public function import ($file)
    {
        $file = fopen('file.csv','r');
    
        $q= "LOAD DATA LOCAL INFILE 'file.csv' INTO TABLE file FIELDS TERMINATED BY ','";
        if ($this->query($q)) {
            $this->state_csv=true;

        } else {
            $this->state_csv=false;
            echo $this->error;
        }
        if($this->state_csv) {
            echo "successfully Imported";

        }
        else{
            echo "import error";
        }

        $file = fopen('file2.csv','r');
        $q= "LOAD DATA LOCAL INFILE 'file2.csv' INTO TABLE file2 FIELDS TERMINATED BY ',' ";

        if ($this->query($q)) {
            $this->state_csv=true;

        } else {
            $this->state_csv=false;
            echo $this->error;
        }
        if($this->state_csv) {
            echo "file 2 successfully Imported";

        }
        else{
            echo "import error";
        }
    }


}
?>
