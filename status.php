<?php 

class Status {
    private $date;
    private $content;
    private $dbh;
    private $error;

    public function __construct() {
        $this->dbh = new PDO("mysql:dbname=adrirlnu_posts;host=localhost;", 'adrirlnu_user1', 'database');
    }
    
    public function setByParams($date, $content) {
            $this->content = $content;
            $this->date = $date;
    }
    
    public function setByRow( $row ) {
        // print_r($row);
        $this->setByParams (
            $row['date'],
            $row['stat']
        );
    }

    public function SqlUpdateStatus( $content ) {
        $this->content = $content;
        $date = date("j/m/Y g:i");
        $this->date = $date;
        
        $query = '  UPDATE status SET 
                    date = :date,
                    stat = :stat
                    WHERE 1 = 1;';

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':date' => $date,
            ':stat' => $content
        ));

        

        return $result;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}

?>