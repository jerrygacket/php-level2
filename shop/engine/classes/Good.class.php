<?php

abstract class Good
{
    private $title = '';
    private $article;
    private $popular = false;
    private $new = false;
    private $published = false;
    private $maker = '';
    private $description = '';

    private static $dbGoodsTable = 'goods';
    public $dbConnect;

    protected $buyPrice;
    protected $salePrice;

    function __construct($article,$title = '')
    {
        $this->dbConnect = DB::getConnect();

        $this->setArticle($article);
        $this->setTitle($title);
    }

    abstract public function getSalePrice();
    abstract public function setSalePrice($newPrice);
    abstract public function getBuyPrice();
    abstract public function setBuyPrice($newPrice);

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getArticle()
    {
        if (!isset($this->article)) {
            return false;
        }

        return $this->article;
    }

    /**
     * @param string $article
     */
    public function setArticle(string $article)
    {
        // добавить проверку на уникальность артикула в базе данных
        $this->article = $article;
    }

    /**
     * @return bool
     */
    public function isPopular()
    {
        return $this->popular;
    }

    /**
     * @param bool $popular
     */
    public function setPopular(bool $popular)
    {
        $this->popular = $popular;
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * @param bool $new
     */
    public function setNew(bool $new)
    {
        $this->new = $new;
    }

    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published)
    {
        $this->published = $published;
    }

    /**
     * @return string
     */
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @param string $maker
     */
    public function setMaker(string $maker)
    {
        $this->maker = $maker;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDbGoodsTable()
    {
        return Good::$dbGoodsTable;
    }

    /**
     * @param string $dbGoodsTable
     */
    public static function setDbGoodsTable($dbGoodsTable)
    {
        Good::$dbGoodsTable = $dbGoodsTable;
    }
}
