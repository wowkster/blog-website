<?php 

class Entry {
    private $id;
    private $date;
    private $author;
    private $title;
    // private $excerpt;
    private $content;
    private $dbh;
    private $error;

    public function __construct() {
        $this->dbh = new PDO("mysql:dbname=adrirlnu_posts;host=localhost;", 'adrirlnu_user1', 'database');
    }

    public function createNew( $author, $title, $content ) {
        $this->setByParams( -1, $author, $title, $content, date("j/m/Y g:i"));
    }

    public function createNewFromPOST( $post ) {
        //print_r($post);
        $this->createNew(
            $post['entry_author'],
            $post['entry_title'],
            $post['entry_content']
        );
    }

    public function setByParams( $id, $author, $title,  $content, $date) {
        if (strlen($author) == 0) {
            $this->id = -1;
        } else {
            $this->id = $id;
            $this->author = $author;
            $this->title = $title;
            $this->content = $content;
            $this->date = $date;
        }
    }

    public function setByRow( $row ) {
        // print_r($row);
        $this->setByParams (
            $row['post_id'],
            $row['author'],
            $row['title'],
            $row['text'],
            $row['pub_time'],
            $row['entry_date']
        );
    }

    public function SqlInsertEntry() {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = ' 
            INSERT INTO allPosts (
                author, title, pub_time,
                text)
            VALUES (
                :entry_author, :entry_title, :entry_date,
                :entry_content);';

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_title' => $this->title,
            ':entry_date' => $this->date,
            ':entry_content' => $this->content
        ));
        $this->error = $this->dbh->errorInfo();

        $query = '  SELECT post_id 
                    FROM allPosts 
                    WHERE author= :entry_author 
                    ORDER BY post_id 
                    DESC LIMIT 1;';

        $stmt = $this->dbh->prepare($query);
        $stmt->execute(array(
            ':entry_author' => $this->author
        ));

        $this->error = $this->dbh->errorInfo();


        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['post_id'];

        return $result;
    }

    public function SqlSelectEntryById( $entry_id ) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM allPosts WHERE post_id = :entry_id;';

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_id' => $entry_id
        ));

        $this->error = $this->dbh->errorInfo();
        //print_r($this->error);

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->setByRow($entry);
        //print_r($entry);

        return $result;
    }

    public function SqlUpdateEntryById( $entry_id ) {
        $query = '  UPDATE allPosts SET 
                    author = :entry_author, 
                    title = :entry_title, 
                    text = :entry_content
                    WHERE post_id = :entry_id;';

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':entry_author' => $this->author,
            ':entry_title' => $this->title,
            ':entry_content' => $this->content
        ));

        return $result;
    }

    private function validateString() {
        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of excerpt
     */ 
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Set the value of excerpt
     *
     * @return  self
     */ 
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

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