<?php

class Good
{
    private $title = '';
    private $article;
    private $price = 0;
    private $height = 0;
    private $width = 0;
    private $popular = false;
    private $new = false;
    private $published = false;
    private $maker = '';

    function __construct($article,$title = '')
    {
        $this->setArticle($article);
        $this->setTitle($title);
    }

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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
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
}
