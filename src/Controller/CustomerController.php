<?php


namespace App\Controller;


use App\Entity\Orders;
use App\Entity\Products;
use App\Exceptions\ServiceException;
use App\Models\Request\Order\CreateOrder;
use App\Models\Request\Order\UpdateOrder;
use App\Service\Customer\CustomerService;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends BaseController
{
    /**
     * @Route("/api/test",name="test",methods={"GET"})
     */
    public function test()
    {
        $products = $this->getDoctrine()->getRepository(Products::class)->findAll();
        dd($products);
    }

    /**
     * @Route("/api/orders",name="all_order",methods={"GET"})
     * @param Request $request
     * @return Response
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getOrders(Request $request)
    {
        $user = $this->getUser();
        $userOrdersRepo = $this->getDoctrine()->getRepository(Orders::class);
        $userOrders = $userOrdersRepo->findBy(array("customer" => $user));
        $filter = $this->queryToFilter($request, count($userOrders));
        $filter['customer']['in'] = $user->getId();
        $data = $userOrdersRepo->findWithFilter($filter);

        return self::setGroups(['groups' => ["Order"]])
            ->setResponseType('orders')
            ->response($data);
    }

    /**
     * @Route("/api/order/new",name="new_order",methods={"POST"})
     * @param Request $request
     * @param CustomerService $service
     * @return Response
     * @throws \Exception
     */
    public function newOrder(Request $request, CustomerService $service)
    {
        $this->validateRequest($request->getContent(), CreateOrder::class);
        $response = $service->createOrder($request);
        return self::setGroups(['groups' => ["Order"]])
            ->setResponseType('orders')
            ->response($response);
    }

    /**
     * @Route("/api/order/{order}/update",name="update_order",methods={"PUT"})
     * @param Request $request
     * @param $order
     * @param CustomerService $service
     * @return Response
     */
    public function updateOrder(Request $request,$order,CustomerService $service)
    {
        $orderObject = $this->getRepo(Orders::class)->find($order);
        if (!$orderObject instanceof Orders){
            throw new ServiceException("Sipariş Bulunamadı.", Response::HTTP_NOT_FOUND);
        }
        $this->validateRequest($request->getContent(), UpdateOrder::class);
        $response = $service->updateOrder($orderObject,$request);
        return self::setGroups(['groups' => ["Order"]])
            ->setResponseType('orders')
            ->response($response);
    }
}