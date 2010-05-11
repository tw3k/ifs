<?php

/**

 * Index that wraps a numeric array.
 * All five public methods are needed to implement
 * the Iterator interface.
 * @link
 * http://giorgiosironi.blogspot.com/2010/02/practical-php-patterns-iterator.html
 * Iterator Pattern
 */
class Index implements Iterator
{
    private $_content;
    private $_page = 0;
    public  $context = null;

    public function __construct(array $content, array $hit)
    {
        $this->_content = $content;
        return $this->context = $hit;
    }

    public function rewind()
    {
        return $this->_page = $this->_content[$this->_page];
    }

    public function valid()
    {
        return isset($this->_content[$this->_page]);
    }

    public function current()
    {
        return $this->context;
    }

    public function key()
    {
        return $this->_page;
    }

    public function next()
    {
        return array_shift($this->_content);
    }
}

/**
 * Usually IteratorAggregate is the interface to implement.
 * It has only one method, which must return an Iterator
 * already defined as another class (e.g. ArrayIterator)
 * Iterator gives a finer control over the algorithm,
 * because all the hook points of Iterator' contract
 * are available for implementation.
 */
class Page implements IteratorAggregate
{
    private $_content;

    public function __construct(array $content)
    {
        $this->_content = $content;
    }

    /**
     * Matches content pages with request
     * @return Arrary with string value of 'context'
     */
    public function contains($page)
    {
        return array_intersect($this->_content, $page);
    }

    /**
     * Only this method is necessary to implement IteratorAggregate.
     * @return Iterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->_content);
    }
}
