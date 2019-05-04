<?
class admin_menuModel extends Model
{
    public function getUsers()
    {
        $result;
        $result = array();
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public    function getBooks()
    {
        $resultz;
        $resultz = array();
        $sql = "SELECT * FROM books";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultz[$row['id']] = $row;
        }
        return $resultz;
    }

    public    function addOrderBook()
    {
        $receiv = $_POST['typeissue'];

        date_default_timezone_set('Europe/Moscow');
        $date1 = date('m/d/Y h:i:s a', time());
        if ($receiv=='По абонименту'){
            $date2=date('Y-m-d', strtotime($date1. ' + 7 days')) ;
            $date1=date('Y-m-d', strtotime($date1)) ;
        } else {
            $date2=date('Y-m-d', strtotime($date1. ' + 1 days'));
            $date1=date('Y-m-d', strtotime($date1));
        }

        $sql = "INSERT INTO readers(id_book,id_user,how_received,date_receiv,date_return)
                VALUES(:book,:user,:receiv,:date1,:date2)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":book", $book, PDO::PARAM_STR);
        $stmt->bindValue(":user", $user, PDO::PARAM_INT);
        $stmt->bindValue(":receiv", $receiv, PDO::PARAM_INT);
        $stmt->bindValue(":date1", $date1, PDO::PARAM_INT);
        $stmt->bindValue(":date2", $date2, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }
    public function getLoginId($login)
    {
        $sql = "SELECT id FROM users WHERE login ='$login'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach($result as $key=>$value){
            $user= $value;
        }
        return $user;
    }

    public function getBookId($book)
    {
        $sql = "SELECT id FROM books WHERE name = '$book'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        foreach($result as $key=>$value){
            $book= $value;
        }
        return $book;
    }
}
