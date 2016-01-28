<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Article
{
    protected $articleId;
    protected $parentId;
    protected $name;
    protected $searchName;
    protected $body;
    protected $level;
    protected $sortOrder;
    protected $externalId;
    protected $source;
    protected $linkToOrignal;
    protected $revisionDate;
    protected $type;
    protected $language;

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getSearchName()
    {
        return $this->searchName;
    }
    
    public function setSearchName($searchName)
    {
        $this->searchName = $searchName;
    }
    
    public function getBody()
    {
        return $this->body;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
    }
}
