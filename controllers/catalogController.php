<?
class catalogController extends Controller
{
    private $pageTpl = '/views/catalog.tpl.php';

    public function __construct()
    {
		    $this->model = new catalogModel();
		    $this->view = new View();
    }

    public function index()
    {
        $results = $this->model->getCatalog();
        if(isset($_POST['search'])) {
            $results=$this->model->searchBooks();
			  }

        if(isset($_POST['nameBook'])){
            $user = $this->model->getLoginId('root');
            $book = $this->model->getBookId($_POST['nameBook']);
            $this->model->addOrderBook();
			  }

        $this->pageData['results'] = $results;
        $this->pageData['title'] = "Каталог";
        $this->view->render($this->pageTpl, $this->pageData);
    }
}
