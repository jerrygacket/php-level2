<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.02.19
 * Time: 21:40
 */
trait GoodsFuncs {
    public function getSaleCount() {
        return 10;
    }

    public function calcSales() {
        $result = $this->getSalePrice() - $this->getBuyPrice();

        return $result * $this->getSaleCount();
    }

    public function newProduct() {
        if (!$this->getArticle()) {
            return false;
        }
        $sql = 'INSERT INTO ' . $this->getDbGoodsTable()
            . ' (article, name, price) VALUES ("'
            . $this->getArticle() . '", "'
            . $this->getTitle() . '", '
            . $this->getSalePrice() . ')';

        return $this->dbConnect->executeSafeQuery($sql);
    }

    public function saveToDB() {
        $sql = 'SELECT * FROM ' . $this->getDbGoodsTable() . ' WHERE article = '.$this->getArticle();
        $product = $this->dbConnect->getAssocResult($sql);
        if (!$product) {
            if (!$this->newProduct()) {
                return false;
            }
        }
        $sql = 'UPDATE ' . $this->getDbGoodsTable() . ' SET views = views + 1 WHERE article = '.$this->getArticle();

        return $this->dbConnect->executeQuery($sql);
    }

    public function loadFromDB() {
        $sql = 'SELECT * FROM ' . $this->getDbGoodsTable() . ' WHERE article = '.$this->getArticle();

        return $this->dbConnect->getAssocResult($sql);
    }

    public function getAllGoods() {
        $sql = 'SELECT * FROM ' . $this->getDbGoodsTable();

        return $this->dbConnect->getAssocResult($sql);
    }

}