<?php


namespace App\Service\Customer;


use App\Entity\Orders;
use App\Entity\Products;
use App\Exceptions\ServiceException;
use App\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
class CustomerService extends AbstractService
{
    /**
     * @var Products
     */
    private Products $product;


    private $user;


    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
        $this->user = $this->container->get('security.token_storage')->getToken()->getUser();
    }

    /**
     * @param $request
     * @return Orders
     * @throws \Exception
     */
    public function createOrder($request)
    {
        $data = json_decode($request->getContent());
        $this->checkProduct($data->productId);
        $this->checkQuantity($data->quantity);
        $date = new \DateTime('@'.strtotime($data->shippingDate));
        $order = new Orders();
        $order->setCustomer($this->user);
        $order->setProduct($this->product);
        $order->setAddress($data->address);
        $order->setOrderCode($this->generateOrderCode());
        $order->setShippingDate($date);
        $order->setQuantity($data->quantity);
        $this->product->setAvailablePieces($this->product->getAvailablePieces()-$data->quantity);
        $this->persist($order);
        return $order;
    }

    /**
     * @param $productId
     */
    private function checkProduct($productId)
    {
        $product = $this->em->getRepository(Products::class)->find($productId);
        if (is_null($product)) {
            throw new ServiceException("messages.warning.not_found_product", Response::HTTP_NOT_FOUND);
        }
        $this->product = $product;
    }

    /**
     * @param $quantityCount
     */
    private function checkQuantity($quantityCount)
    {
        if ($quantityCount < 1) {
            throw new ServiceException("messages.error.quatity_count", Response::HTTP_NOT_FOUND);
        }
        if ($this->product->getAvailablePieces() < $quantityCount) {
            throw new ServiceException("Mevcut stoktan fazla bir istekte bulundunuz. En fazla sipariş adeti " .
                $this->product->getAvailablePieces() . " olabilir.", Response::HTTP_MISDIRECTED_REQUEST);
        }
    }

    /**
     * @return string
     */
    private function generateOrderCode()
    {
        return $this->product->getId() . time() . mt_rand() . $this->user->getId();
    }
}