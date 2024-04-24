<?php

namespace Vedian\Cms\View\Html;

use ArrayAccess;
use Illuminate\Support\Collection;
use Illuminate\View\ComponentAttributeBag;
use Vedian\Cms\Contracts\View\HtmlContainer;
use ArrayAccess;
use Illuminate\Support\Collection;
use Illuminate\View\ComponentAttributeBag;
use Vedian\Cms\Contracts\View\HtmlContainer;
use IteratorAggregate;

class Container extends Element implements HtmlContainer
{
    public $htmlClasses = [
        'mx-auto',
        'max-w-7xl',
        'py-6',
        'sm:px-6',
        'lg:px-8'
    ];

    // todo implement magic properties and methods for the container element
    // We need magic properties and methods for the container element to be able to 
    // set the classes and attributes of the container element.

    // We also need magic properties and methods in order to iterate over the container's children.
    // We need to be able to iterate over the container's children in order to render them.

    // Sometimes a container consists of a parent element with a couple of child elements
}
// <?php

// namespace Vedian\Cms\View\Html;

// class Container extends Element implements HtmlContainer, IteratorAggregate
// {
//     public $htmlClasses = [
//         'mx-auto',
//         'max-w-7xl',
//         'py-6',
//         'sm:px-6',
//         'lg:px-8'
//     ];

//     // todo implement magic properties and methods for the container element
//     // We need magic properties and methods for the container element to be able to 
//     // set the classes and attributes of the container element.

//     // We also need magic properties and methods in order to iterate over the container's children.
//     // We need to be able to iterate over the container's children in order to render them.

//     // Sometimes a container consists of a parent element with a couple of child elements

//     protected $children = [];

//     public function __get($name)
//     {
//         // Implement magic property getter for container element
//         // You can customize the behavior based on the property name
//     }

//     public function __set($name, $value)
//     {
//         // Implement magic property setter for container element
//         // You can customize the behavior based on the property name and value
//     }

//     public function __call($name, $arguments)
//     {
//         // Implement magic method for container element
//         // You can customize the behavior based on the method name and arguments
//     }

//     public function addChild(Element $child)
//     {
//         $this->children[] = $child;
//     }

//     public function getIterator()
//     {
//         return new ArrayIterator($this->children);
//     }

// }
