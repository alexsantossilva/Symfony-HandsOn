<?php

namespace Merci\CartBundle\Tests\Unit\Entity;

use Merci\CartBundle\Entity\Cart;
use Merci\CatalogBundle\Entity\Product;

class CartTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     */
    public function testAdd($product)
    {

        $cart = new Cart();
        $cart->add($product);

        $this->assertEquals(1, $cart->getQuantity());
    }

    public function provider()
    {
        $products = array(
            array(
                'id' => 1,
                'name' => 'Oculos Bem Legal',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut facilisis sapien erat, vel vehicula risus hendrerit vel.',
                'price' => 299.9,
                'image_name' => 'fem-oculos',
            ),
            array(
                'id' => 1,
                'name' => 'Tenis Cor de Rosa',
                'description' => 'Pellentesque condimentum convallis consectetur. Aliquam dolor dolor, convallis eu arcu vitae, iaculis sagittis ipsum.',
                'price' => 359.9,
                'image_name' => 'fem-tenis',
            ),
            array(
                'id' => 1,
                'name' => 'Bota Trekking',
                'description' => 'Mauris faucibus magna arcu, id ultrices est consectetur vitae. Nunc id lorem rhoncus, auctor eros id, posuere quam.',
                'price' => 539.9,
                'image_name' => 'mas-bota',
            ),
            array(
                'id' => 1,
                'name' => 'Mochila Acampamento',
                'description' => 'Praesent a enim vestibulum, accumsan mauris id, mattis nibh. Donec euismod enim sit amet tellus blandit, sit amet condimentum tellus commodo.',
                'price' => 222.9,
                'image_name' => 'mas-mochila',
            ),
        );

        $result = array();
        foreach ($products as $product) {
            $entity = new Product();
            $entity->setId($product['id']);
            $entity->setName($product['name']);
            $entity->setDescription($product['description']);
            $entity->setPrice($product['price']);
            $entity->setImageName($product['image_name']);
            $result[] = array($entity);
        }

        return $result;
    }
}